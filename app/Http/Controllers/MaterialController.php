<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Module;
use Storage;

class MaterialController extends Controller
{
    // Tampilkan semua materi   
    public function admin($id)
    {
        // Cari modul berdasarkan id
        $module = Module::findOrFail($id);

        // Ambil semua materi yang terkait dengan modul ini
        $materials = Material::where('module_id', $id)->get();

        return view('admin.classes.material.index', compact('module', 'materials'));
    }

    public function index($id)
    {
        // Cari modul berdasarkan id
        $module = Module::findOrFail($id);

        // Ambil semua materi yang terkait dengan modul ini
        $materials = Material::where('module_id', $id)->get();

        return view('classes.material.index', compact('module', 'materials'));
    }


    // Form tambah materi
    public function create($id)
    {
        $module = Module::findOrFail($id);
        return view('admin.classes.material.create', compact('module'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,mp4,docx,zip,rar|max:20480',
            'type' => 'required|in:Dokumen,Video,Tugas,Link',
            'class_prodi_id' => 'required|in:1,2,3,4',
        ]);

        $filePath = $request->file('file')->store('materials', 'public');

        Material::create([
            'module_id' => $id,
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'type' => $request->type,
            'class_prodi_id' => $request->class_prodi_id,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('module.materials', $id)->with('success', 'Materi berhasil ditambahkan.');
    }

    // Form edit materi
    public function edit($id)
    {
        $material = Material::findOrFail($id);
        $module = $material->module; // Pastikan relasi 'module' sudah ada di model Material

        return view('admin.classes.material.edit', compact('material', 'module'));
    }

    // Update materi
  public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:video,dokumen,tugas',
            'file' => 'nullable|file|max:10240', // max 10MB
        ]);

        // Update basic fields
        $material->title = $validated['title'];
        $material->description = $validated['description'] ?? null;
        $material->type = $validated['type'];

        // Update file jika diupload ulang
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($material->file_path && Storage::exists($material->file_path)) {
                Storage::delete($material->file_path);
            }

            // Simpan file baru
            $file = $request->file('file');
            $filePath = $file->store('materi');
            $material->file_path = $filePath;
        }

        $material->save();

        return redirect()
            ->route('module.materials', ['id' => $material->module_id])
            ->with('success', 'Materi berhasil diperbarui.');
    }


    public function show($id)
    {
        $material = Material::findOrFail($id); // Pastikan data d
        // itemukan atau error 404
        $module = Module::findOrFail($id);

        return view('classes.material.show', compact('material', 'module'));
    }

    // Hapus materi
    public function destroy($id)
    {
        $material = Material::findOrFail($id);

        if ($material->file_path && Storage::exists($material->file_path)) {
            Storage::delete($material->file_path);
        }

        $material->delete();

        return redirect()
            ->route('module.materials', ['id' => $material->module_id])
            ->with('success', 'Materi berhasil dihapus.');
    }
}