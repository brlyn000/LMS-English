<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    
    public function store(Request $request, Thread $thread)
    {
        $request->validate([
            'subject' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // max 2MB
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('replies', 'public');
        }

        $thread->replies()->create([
            'subject' => $request->subject,
            'deskripsi' => $request->deskripsi,
            'image' => $imagePath,
            'user_id' => auth()->id(),
        ]);
        logActivity('Thread', 'User add thread :'. $request->subject);

        return back()->with('success', 'Balasan berhasil dikirim.');
    }
    
    
    // Form edit
    public function edit(Reply $reply)
    {
        $this->authorizeAccess($reply);
        return view('forum.reply.edit', compact('reply'));
    }

    // Proses update
    public function update(Request $request, Reply $reply)
    {
        $this->authorizeAccess($reply);

        $request->validate([
            'subject' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('replies', 'public');
            $reply->image = $imagePath;
        }

        $reply->update([
            'subject' => $request->subject,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('forum.show', $reply->thread_id)->with('success', 'Balasan berhasil diperbarui.');
    }

    // Menghapus balasan
    public function destroy(Reply $reply)
    {
        $this->authorizeAccess($reply);
        $reply->delete();

        return back()->with('success', 'Balasan berhasil dihapus.');
    }

    // Akses hanya untuk pemilik atau admin (role 1/2)
    private function authorizeAccess(Reply $reply)
    {
        $user = Auth::user();
        $isOwner = $reply->user_id === $user->id;
        $isAdmin = $user->roles->pluck('id')->intersect([1, 2])->isNotEmpty();

        if (!($isOwner || $isAdmin)) {
            abort(403);
        }
    }

}
