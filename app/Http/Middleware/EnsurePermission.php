<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsurePermission
{
    public function handle(Request $request, Closure $next, string $permissionKey)
    {
        $user = $request->user();
        if (!$user) {
            abort(403);
        }

        if (method_exists($user, 'hasPermission') && $user->hasPermission($permissionKey)) {
            return $next($request);
        }

        abort(403);
    }
}

