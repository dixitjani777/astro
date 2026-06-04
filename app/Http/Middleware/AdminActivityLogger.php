<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog;
use Closure;
use Illuminate\Http\Request;

class AdminActivityLogger
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        try {
            ActivityLog::create([
                'user_id' => optional($request->user())->id,
                'method' => $request->method(),
                'path' => $request->path(),
                'action' => $request->route()?->getName(),
                'ip' => $request->ip(),
                'user_agent' => (string) $request->userAgent(),
                'meta' => [
                    'status' => $response->status(),
                    'query' => $request->query(),
                ],
            ]);
        } catch (\Throwable $e) {
            // ignore logging failures
        }

        return $response;
    }
}

