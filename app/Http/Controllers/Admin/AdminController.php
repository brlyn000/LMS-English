<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $prodiCounts = User::whereHas('roles', function ($q) {
            $q->where('name', 'student');
        })->select('program_studi', DB::raw('count(*) as total'))
        ->groupBy('program_studi')
        ->get();

        $labels = $prodiCounts->pluck('program_studi');
        $data = $prodiCounts->pluck('total');

        return view('admin.dashboard', [
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}
