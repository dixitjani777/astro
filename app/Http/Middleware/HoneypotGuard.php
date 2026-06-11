<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HoneypotGuard
{
    public function handle(Request $request, Closure $next): Response
    {
        if (strtoupper((string) $request->method()) !== 'POST') {
            return $next($request);
        }

        // Honeypot field: should always be empty.
        if ($request->filled('website')) {
            return $this->reject($request);
        }

        return $next($request);
    }

    private function reject(Request $request): Response
    {
        if ($request->expectsJson()) {
            return response()->json(['success' => false, 'message' => 'Request blocked.'], 422);
        }

        return back()->withErrors(['form' => 'Request blocked. Please try again.'])->withInput();
    }
}
