<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;

class EnsureAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if (!$user) {
            abort(403);
        }

        $role = $user->role ?? 'user';
        if ($role === 'admin') {
            return $next($request);
        }

        if ($role === 'user') {
            abort(403);
        }

        if (!Role::query()->where('slug', $role)->exists()) {
            abort(403);
        }

        return $next($request);
    }
}
