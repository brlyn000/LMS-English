<?php

// app/Http/Controllers/ClassroomController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardHome;
use Storage;

class CardHomeController extends Controller
{
    public function index()
    {
        $card_home = CardHome::where('status', 'Active')->orderBy('name')->get();
        return view('dashboard', compact('card_home'));
    }

    public function admin()
    {
        $contents = CardHome::latest()->get();
        return view('admin.content', compact('contents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:0,1',
            'schedule' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('content_images', 'public');
        }

        $validated['status'] = $request->input('status');

        CardHome::create($validated);

        return redirect()->route('admin.content.index')->with('success', 'Konten berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $content = CardHome::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:0,1',
            'link' => 'nullable|url|max:255',
            'schedule' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($content->image && Storage::disk('public')->exists($content->image)) {
                Storage::disk('public')->delete($content->image);
            }
            $validated['image'] = $request->file('image')->store('content_images', 'public');
        }

        $validated['status'] = $request->input('status');
        $content->update($validated);

        return redirect()->route('admin.content.index')->with('success', 'Konten berhasil diperbarui!');
    }

    public function create()
    {
        return view('admin.content.create');
    }

    // Menampilkan form edit konten
    public function edit($id)
    {
        $content = CardHome::findOrFail($id);
        return view('admin.content.edit', compact('content'));
    }

    // Menghapus konten
    public function destroy($id)
    {
        $content = CardHome::findOrFail($id);

        // Hapus gambar jika ada
        if ($content->image && Storage::disk('public')->exists($content->image)) {
            Storage::disk('public')->delete($content->image);
        }

        $content->delete();

        return redirect()->route('admin.content.index')->with('success', 'Konten berhasil dihapus!');
    }
}
