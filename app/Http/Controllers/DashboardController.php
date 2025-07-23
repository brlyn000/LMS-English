<?php

// app/Http/Controllers/ClassroomController.php

namespace App\Http\Controllers;


use App\Models\ActivityLog;
use App\Models\ProgramStudi;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::get();
        $programStudi = ProgramStudi::count();

        $prodiCounts = User::whereHas('roles', function ($q) {
            $q->where('name', 'student');
        })->select('program_studi_id', DB::raw('count(*) as total'))
        ->groupBy('program_studi_id')
        ->get();
                
        $activityUsers = User::withCount('submissions')
            ->whereHas('roles', fn($q) => $q->where('name', 'student'))
            ->with('programStudi')
            ->get();

        $grouped = $activityUsers->groupBy('program_studi_id');

        $labels = [];
        $courseData = [];

        foreach ($grouped as $prodiId => $users) {
            $prodiName = $users->first()->programStudi->nama_prodi ?? 'Unknown';
            $labels[] = $prodiName;
            $courseData[] = $users->sum('submissions_count');
        }

        // Ambil ID prodi dari hasil query
        $prodiIds = $prodiCounts->pluck('program_studi_id');

        // Ambil nama prodi sesuai ID
        $prodiNames = ProgramStudi::whereIn('id', $prodiIds)->pluck('nama_prodi', 'id');
        $enrollData = $prodiCounts->pluck('total');

        // Ubah labels menjadi array nama prodi
        $labels = $prodiCounts->map(function ($item) use ($prodiNames) {
            return $prodiNames[$item->program_studi_id] ?? 'Unknown';
        });

        // Hitung total user dengan role 'student'
        $totalUsers = User::whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->count();

        // Recent Activity
        $activities = ActivityLog::with('user')->latest()->take(10)->get(); // recent 10


        return view('admin.dashboard', [
            'users' => $users,
            'totalUsers' => $totalUsers,
            'programStudi' => $programStudi,
            'labels' => $labels,
            'enrollData' => $enrollData,
            'courseData' => $courseData,
            'activities'=> $activities,
         ]);
    }

    public function users(Request $request)
    {
        $users = User::paginate(10);

        // Statistik user
        $totalUsers = User::count();
        $thisMonth = User::whereMonth('created_at', now()->month)->count();
        $lastMonth = User::whereMonth('created_at', now()->subMonth()->month)->count();
        $growth = $lastMonth > 0 ? (($thisMonth - $lastMonth) / $lastMonth) * 100 : 0;

        // Statistik login
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $activeToday = User::whereDate('last_login_at', $today)->count();
        $activeYesterday = User::whereDate('last_login_at', $yesterday)->count();
        $activeGrowth = $activeYesterday > 0 
            ? (($activeToday - $activeYesterday) / $activeYesterday) * 100 
            : 0;
        
        $adminUsers = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id', '1') // atau role_id = 1, sesuaikan
            ->count();

        return view('admin.users', [
            'header' => 'User Management',
            'users' => $users,
            'totalUsers' => $totalUsers,
            'growth' => $growth,
            'activeToday' => $activeToday,
            'activeGrowth' => $activeGrowth,
            'adminUsers' => $adminUsers,

        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'int'],
            'program_studi_id' => ['required', 'int'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'program_studi_id' => $request->program_studi_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->attach(3); // Role ID 3 sebagai default (misal: mahasiswa)

        return redirect()->route('admin.users')->with('success', 'User added successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $role = $request->role;

        $users = User::with('roles')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('nim', 'like', "%{$search}%");
                });
            })
            ->when($role, function ($query, $role) {
                $query->whereHas('roles', function ($q) use ($role) {
                    $q->where('name', $role);
                });
            })
            ->get();

        return response()->json($users);
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $programStudis = ProgramStudi::all();

        return view('admin.users.edit', compact('user', 'roles', 'programStudis'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'nim' => 'nullable|string|max:30',
            'program_studi_id' => 'nullable|exists:program_studi,id',
            'password' => 'nullable|string|min:6|confirmed',
            'is_active' => 'nullable|boolean',
            'role_id' => 'required|exists:roles,id', 
        ]);

        // Update data user
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->nim = $validated['nim'];
        $user->program_studi_id = $validated['program_studi_id'];
        $user->is_active = $request->has('is_active');

        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        // Ganti role di tabel pivot role_user
        $user->roles()->sync([$validated['role_id']]);

        return redirect()->back()->with('success', 'User updated successfully!');
    }
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.users')->with('success', 'User has been successfully deleted.');
    }

    public function nilaiTI()
    {
        $students = User::with(['submissions.material', 'programStudi'])
            ->whereHas('roles', function ($query) {
                $query->where('name', 'student');
            })
            ->whereHas('programStudi', function ($query) {
                $query->where('nama_prodi', 'Teknologi Informasi');
            })
            ->get();

        return view('admin.grades.ti', compact('students'));
    }

    public function nilaiTM()
    {
        $students = User::with(['submissions.material', 'programStudi'])
            ->whereHas('roles', function ($query) {
                $query->where('name', 'student');
            })
            ->whereHas('programStudi', function ($query) {
                $query->where('nama_prodi', 'Teknologi Mesin');
            })
            ->get();

        return view('admin.grades.tm', compact('students'));
    }

    public function nilaiAK()
    {
        $students = User::with(['submissions.material', 'programStudi'])
            ->whereHas('roles', function ($query) {
                $query->where('name', 'student');
            })
            ->whereHas('programStudi', function ($query) {
                $query->where('nama_prodi', 'Akuntansi');
            })
            ->get();

        return view('admin.grades.ak', compact('students'));
    }

        public function nilaiAP()
    {
        $students = User::with(['submissions.material', 'programStudi'])
            ->whereHas('roles', function ($query) {
                $query->where('name', 'student');
            })
            ->whereHas('programStudi', function ($query) {
                $query->where('nama_prodi', 'Administrasi Perkantoran');
            })
            ->get();

        return view('admin.grades.ap', compact('students'));
    }

}
