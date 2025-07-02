<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil kode program studi user, misalnya TI, TM, AP, AK
        $prodi = strtoupper($user->programStudi->kode_prodi ?? 'TI'); // default 'TI'

        // Ambil modul berdasarkan prodi
        $modules = Module::where('program_studi', $prodi)
                ->paginate(6)
                ->withQueryString();

        return view('classes.index', compact('modules', 'user'));
    }

    public function admin(Request $request)
    {
        $prodi = $request->get('program_studi');
        $modulsByProdi = [
            'TI' => Module::where('program_studi', 'TI')->get(),
            'TM' => Module::where('program_studi', 'TM')->get(),
            'AK' => Module::where('program_studi', 'AK')->get(),
            'AP' => Module::where('program_studi', 'AP')->get(),
        ];

        return view('admin.class', compact('modulsByProdi', 'prodi'));
    }

    public function create()
    {
        return view('admin.classes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'program_studi' => 'required|in:TI,TM,AK,AP',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('images/modul', 'public');
        }

        Module::create($validated);

        return redirect()->route('admin.module.index')->with('success', 'Modul berhasil ditambahkan');
    }

    public function edit(Module $module , $id)
    {
        $module = Module::where('id', $id)->first();
        return view('admin.classes.edit', compact('module'));
    }

    public function update(Request $request, $id)
    {
        $module = Module::findOrFail($id); // ambil modul dari ID

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'program_studi' => 'required',
            'image_path' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('images/modul', 'public');
        }

        $module->update($validated); // lakukan update

        return redirect()->route('admin.module.index')->with('success', 'Modul berhasil diperbarui');
    }

    public function destroy(Module $classProdi)
    {
        $classProdi->delete();
        return back()->with('success', 'Modul dihapus');
    }
}
