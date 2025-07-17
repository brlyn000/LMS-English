<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ForumController extends Controller
{

    public function index(Request $request) {
        $userProdiId = auth()->user()->program_studi_id;

        $threads = Thread::latest()
            ->with('user')
            ->where('program_studi', $userProdiId); // Hanya tampilkan yang sama prodi

        if (!auth()->user()->roles->pluck('id')->contains(fn($id) => in_array($id, [1]))) {
            $threads->where('program_studi', auth()->user()->program_studi_id);
        }

        if ($request->filled('category')) {
            $threads->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $threads->where('title', 'like', '%' . $request->search . '%');
        }


        $threads = $threads->paginate(10);

        return view('forum.index', compact('threads'));
    }


    public function show(Request $request, Thread $thread) {
        $query = $thread->replies()->with(['user']);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('subject') && $request->input('subject') !== null) {
            $subject = $request->input('subject');
            $query->where('subject', 'like', '%' . $subject . '%');
        }

        $replies = $query->latest()->get();

        return view('forum.show', compact('thread', 'replies'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
            'category' => 'required',
            'image' => 'nullable|image|max:2048', // optional upload image
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('threads', 'public');
        }

        Thread::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(),
            'category' => $request->category,
            'image' => $imagePath, // setelah upload
            'program_studi' => auth()->user()->program_studi_id,
        ]);

        return redirect()->route('forum.index')->with('success', 'Thread berhasil dibuat.');
    }

    public function edit(Thread $thread)
    {
    if (auth()->id() !== $thread->user_id && !auth()->user()->roles->pluck('id')->contains(fn($id) => in_array($id, [1, 2]))) {
        abort(403);
    }

        return view('forum.edit', compact('thread'));
    }

    public function update(Request $request, Thread $thread)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'category' => 'required',
        ]);

        if (auth()->id() !== $thread->user_id && !auth()->user()->roles->pluck('id')->contains(fn($id) => in_array($id, [1, 2]))) {
            abort(403);
        }

        $thread->update($request->only('title', 'body', 'category'));

        return redirect()->route('forum.index')->with('success', 'Thread berhasil diperbarui.');
    }

    public function destroy(Thread $thread)
    {
        // Hanya user yang membuat thread atau admin yang boleh hapus
        if (Auth::id() !== $thread->user_id && Auth::user()->role_id !== 1) {
            abort(403);
        }

        // Hapus gambar jika ada
        if ($thread->image) {
            Storage::disk('public')->delete($thread->image);
        }

        $thread->delete();

        return redirect()->route('forum.index')->with('success', 'Thread berhasil dihapus.');
    }

    public function admin(Request $request)
    {
        $query = Thread::with(['user', 'programStudi'])->latest();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('prodi')) {
            $query->whereHas('programStudi', function ($q) use ($request) {
                $q->where('nama_prodi', $request->prodi);
            });
        }

        $threads = $query->paginate(10);

        $listProdi = ['Teknologi Informasi', 'Teknologi Mesin', 'Akuntansi', 'Administrasi Perkantoran'];

        return view('admin.threads.index', compact('threads', 'listProdi'));
    }

}
