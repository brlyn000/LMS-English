<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;

class AdminController extends Controller
{
    // Middleware untuk memastikan hanya admin yang bisa akses
    public function __construct()
    {
        $this->AdminMiddleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role === 'admin') {
                return $next($request);
            }

            abort(403, 'Akses hanya untuk admin.');
        });
    }

    public function index()
    {
        // Data yang akan ditampilkan di dashboard admin
        return view('admin.dashboard'); // Buat file ini di resources/views/admin/dashboard.blade.php
    }
}
