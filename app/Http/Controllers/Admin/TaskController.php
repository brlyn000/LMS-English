<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Module;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Material::with('module')->withCount('submissions')->paginate(10);
        $modules = Module::all();

        return view('admin.tasks.index', compact('tasks', 'modules'));
    }

    public function show($id)
    {
        $task = Material::findOrFail($id);
        return view('admin.tasks.show', compact('task'));
    }

    // Tambahkan create/edit/submission jika dibutuhkan nanti
}
