<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\ActivityLog;
use App\Models\Material;
use App\Models\Module;
use App\Models\Reply;
use App\Models\Submission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $totalAssignments = Material::where('type', 'Tugas')
            ->where('class_prodi_id', auth()->user()->program_studi_id)
            ->count();
            
        $userSubmissions = Submission::where('user_id', $user->id)->count();
        
        // Prevent division by zero
        $assignmentSubmission = $totalAssignments > 0 ? round(($userSubmissions / $totalAssignments) * 100) : 0;

        $userReplies = Reply::where('user_id', $user->id)->count();

        $recentActivities = ActivityLog::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('profile.profile', compact(
            'user',
            'totalAssignments',
            'userSubmissions',
            'userReplies',
            'recentActivities',
            'assignmentSubmission'
        ));
    }

    /**
     * Tampilkan form edit profil pengguna.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Perbarui informasi profil pengguna.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validated();
        $user->fill($validated);

        // Jika email berubah, set ulang verifikasi email
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        Log::info('Profile updated', ['user_id' => $user->id]);
        Session::flash('success', 'Profile updated successfully.');

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = $request->user();
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'password successfully updated.');
    }

    /**
     * Hapus akun pengguna.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        $userId = $user->id;

        Auth::logout();

        // Hapus akun
        $user->delete();

        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Log::warning('Account deleted by user', ['user_id' => $userId]);
        Session::flash('danger', 'Your account has been successfully deleted.');

        return Redirect::to('/');
    }
}
