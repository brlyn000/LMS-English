<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\CardHomeController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UserController;
use App\Models\ActivityLog;
use App\Models\CardHome;
use App\Http\Controllers\MaterialController;
use App\Models\Material;
use App\Models\Module;
use App\Models\Reply;
use App\Models\Submission;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('dashboard');
});

Route::get('/class', [ModuleController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('class');
    
Route::get('/modules/{id}/materials', [MaterialController::class, 'index'])->name('module.materials');
Route::get('material/{id}', [MaterialController::class, 'show'])->name('material.show');
// Untuk mahasiswa mengumpulkan tugas
Route::middleware(['auth'])->post('/materials/{material}/submit', [SubmissionController::class, 'store'])->name('submissions.store');
// Untuk admin/instruktur melihat semua submission
Route::middleware(['auth', 'role:1,2'])->get('/admin/materials/{material}/submissions', [SubmissionController::class, 'index'])->name('submissions.index');
Route::delete('/submissions/{id}', [SubmissionController::class, 'destroy'])->name('submissions.destroy');

Route::middleware(['auth'])->group(function () {
    Route::patch('/submissions/{id}/comment', [SubmissionController::class, 'addComment'])->name('submissions.comment');
    Route::patch('/submissions/{id}/score', [SubmissionController::class, 'addScore'])->name('submissions.score');

});

// Route admin dan instructor
Route::middleware(['auth', 'role:1,2'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');

    //Class
    Route::get('/module/show', [ModuleController::class, 'show'])->name('admin.module.show');
    Route::get('/module/create', [ModuleController::class, 'create'])->name('admin.module.create');
    Route::post('/module/store', [ModuleController::class, 'store'])->name('admin.module.store');
    Route::get('/module/{id}/edit', [ModuleController::class, 'edit'])->name('admin.module.edit');
    Route::put('/module/{id}/update', [ModuleController::class, 'update'])->name('admin.module.update');
    Route::get('/module/{id}', [ModuleController::class, 'show'])->name('admin.module.show');
    Route::delete('/module/{classProdi}/delete', [ModuleController::class, 'destroy'])->name('admin.module.destroy'); 

    // Material
    Route::get('/admin/material/{id}/create', [MaterialController::class, 'create'])->name('admin.material.create');
    Route::post('/admin/material/{id}/store', [MaterialController::class, 'store'])->name('admin.material.store');
    Route::get('/material/{id}/edit', [MaterialController::class, 'edit'])->name('admin.material.edit');
    Route::put('/material/{id}/update', [MaterialController::class, 'update'])->name('admin.material.update');
    Route::delete('admin/material/{material}', [MaterialController::class, 'destroy'])->name('admin.material.destroy');
});


Route::middleware(['auth','role:1' ])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
    // Users
    Route::get('/admin/users', [DashboardController::class, 'users'])->name('admin.users');
    Route::post('/admin/users', [DashboardController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/search', [DashboardController::class, 'search'])->name('admin.users.search');
    Route::get('/admin/users/export', [DashboardController::class, 'export'])->name('admin.users.export');
    Route::get('/admin/users/{id}/edit', [DashboardController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [DashboardController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [DashboardController::class, 'destroy'])->name('admin.users.destroy');
    // CMS
    Route::get('/content', [CardHomeController::class, 'admin'])->name('admin.content.index');
    Route::get('/content/create', [CardHomeController::class, 'create'])->name('admin.content.create');
    Route::post('/content', [CardHomeController::class, 'store'])->name('admin.content.store');
    Route::get('/content/{id}/edit', [CardHomeController::class, 'edit'])->name('admin.content.edit');
    Route::put('/content/{id}', [CardHomeController::class, 'update'])->name('admin.content.update');
    Route::delete('/content/{id}', [CardHomeController::class, 'destroy'])->name('admin.content.destroy');
    //Class
    Route::get('/module', [ModuleController::class, 'admin'])->name('admin.module.index');
    Route::get('/module/show', [ModuleController::class, 'show'])->name('admin.module.show');
    //Material
    Route::get('admin/material/{id}', [MaterialController::class, 'admin'])->name('admin.material.admin');
    //Threads
        Route::get('/admin/threads', [ForumController::class, 'admin'])->name('admin.threads.index');
    //grades
    Route::get('/admin/nilai-ti', [DashboardController::class, 'nilaiTI'])->name('admin.nilaiTi');
    Route::get('/admin/nilai-tm', [DashboardController::class, 'nilaiTM'])->name('admin.nilaiTm');
    Route::get('/admin/nilai-ak', [DashboardController::class, 'nilaiAK'])->name('admin.nilaiAk');
    Route::get('/admin/nilai-ap', [DashboardController::class, 'nilaiAP'])->name('admin.nilaiAp');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name(name: 'password.update');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/threads/{thread}/replies', [ReplyController::class, 'store'])->name('replies.store');
    Route::get('/replies/{reply}/edit', [ReplyController::class, 'edit'])->name('replies.edit');
    Route::put('/replies/{reply}', [ReplyController::class, 'update'])->name('replies.update');
    Route::delete('/replies/{reply}', [ReplyController::class, 'destroy'])->name('replies.destroy');
});

Route::middleware(['auth', 'role:1,2'])->group(function () {
    Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::delete('/forum/{thread}', [ForumController::class, 'destroy'])->name('forum.destroy');
    Route::get('/forum/{thread}/edit', [ForumController::class, 'edit'])->name('forum.edit');     
    Route::put('/forum/{thread}', [ForumController::class, 'update'])->name('forum.update'); 
});

Route::middleware(['auth'])->group(function () {
    Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
    Route::get('/forum/{thread}', [ForumController::class, 'show'])->name('forum.show');
});

require __DIR__.'/auth.php';
