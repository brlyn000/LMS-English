<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roleIds)
    {
        $user = Auth::user();

        if (!$user || !$user->roles()->whereIn('role_id', $roleIds)->exists()) {
            return response()->view('errors.403', [], 403);
        }

        return $next($request);
    }
}
