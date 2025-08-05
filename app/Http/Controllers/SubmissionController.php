<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Submission;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;
use App\Services\NotificationService;

class SubmissionController extends Controller
{
    public function index($material_id)
    {
        $material = Material::findOrFail($material_id);
        $submissions = Submission::with('user')->where('material_id', $material_id)->get();
    
        return view('admin.submissions.index', compact('material', 'submissions'));
    }
    
    public function store(Request $request, $material_id)
    {
        $material = Material::findOrFail($material_id);

        // Validasi hanya untuk type tugas
        if ($material->type !== 'Tugas') {
            return redirect()->back()->with('error', 'Materi ini bukan tugas.');
        }

        // Cek apakah user sudah pernah submit
        if (Submission::where('material_id', $material->id)->where('user_id', Auth::id())->exists()) {
            return back()->with('error', 'Tugas sudah dikumpulkan.');
        }

        $request->validate([
            'files' => 'required|array|min:1|max:5',
            'files.*' => 'file|max:30720', // 30MB max per file
            'notes' => 'nullable|string'
        ]);

        // Simpan multiple files
        $filePaths = [];
        foreach ($request->file('files') as $file) {
            $filePaths[] = $file->store('submissions', 'public');
        }

        // Buat submission baru
        $submission = Submission::create([
            'material_id' => $material->id,
            'user_id' => Auth::id(),
            'file_paths' => $filePaths,
            'notes' => $request->notes,
            'submitted_at' => now(),
        ]);
        
        NotificationService::create('submission_created', [
            'message' => Auth::user()->name . ' mengumpulkan tugas: ' . $material->title,
            'user' => Auth::user()->name,
            'material' => $material->title
        ]);

        // Log aktivitas
        logActivity('Submission', 'User mengumpulkan tugas: ' . $material->title);

        return redirect()
            ->route('material.show', $material->id)
            ->with('success', 'The task was sent successfully')
            ->with('submission', $submission);
    }
    
    public function update(Request $request, $id)
    {
        $submission = Submission::findOrFail($id);
        
        // Check if user owns this submission
        if (Auth::id() !== $submission->user_id) {
            return redirect()->back()->with('error', 'Akses ditolak.');
        }
        
        $request->validate([
            'files' => 'nullable|array|max:5',
            'files.*' => 'file|max:30720', // 30MB max per file
            'notes' => 'nullable|string'
        ]);
        
        // Update files if new files are uploaded
        if ($request->hasFile('files')) {
            // Delete old files
            if ($submission->file_paths) {
                foreach ($submission->file_paths as $oldPath) {
                    if (Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                }
            }
            
            // Store new files
            $filePaths = [];
            foreach ($request->file('files') as $file) {
                $filePaths[] = $file->store('submissions', 'public');
            }
            $submission->file_paths = $filePaths;
        }
        
        // Update notes
        $submission->notes = $request->notes;
        $submission->submitted_at = now();
        $submission->save();
        
        return redirect()->back()->with('success', 'Tugas berhasil diperbarui.');
    }



    public function destroy($id)
    {
        $submission = Submission::findOrFail($id);

        // Cek apakah submission milik user yang sedang login (opsional, untuk keamanan)
        if (Auth::id() !== $submission->user_id && Auth::user()->role_id != 1) {
            return redirect()->back()->with('error', 'Akses ditolak.');
        }

        // Hapus files dari penyimpanan
        if ($submission->file_paths) {
            foreach ($submission->file_paths as $filePath) {
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }
        }

        // Hapus record dari database
        $submission->delete();

        return redirect()->back()->with('success', 'Tugas berhasil dihapus.');
    }

    public function addComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'nullable|string|max:1000',
        ]);

        $submission = Submission::findOrFail($id);

        // Periksa apakah user punya role admin (1) atau instruktur (2)
        if (!Auth::user()->roles->pluck('id')->intersect([1, 2])->count()) {
            abort(403);
        }

        $submission->comment = $request->comment;
        $submission->save();

        return redirect()->back()->with('success', 'Komentar berhasil disimpan.');
    }

        public function addScore(Request $request, $id)
    {
        $request->validate([
            'score' => 'nullable|int|max:255',
        ]);

        $submission = Submission::findOrFail($id);

        // Periksa apakah user punya role admin (1) atau instruktur (2)
        if (!Auth::user()->roles->pluck('id')->intersect([1, 2])->count()) {
            abort(403);
        }

        $submission->score = $request->score;
        $submission->save();

        return redirect()->back()->with('success', 'Score berhasil disimpan.');
    }


}
