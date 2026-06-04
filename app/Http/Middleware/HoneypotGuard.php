<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HoneypotGuard
{
    private const MIN_FILL_SECONDS = 2;

    public function handle(Request $request, Closure $next): Response
    {
        if (strtoupper((string) $request->method()) !== 'POST') {
            return $next($request);
        }

        // Honeypot field: should always be empty.
        if ($request->filled('website')) {
            return $this->reject($request);
        }

        // Timing field: should be set and not instantly submitted.
        $hpTime = $request->input('hp_time');
        if ($hpTime !== null && $hpTime !== '') {
            $submittedAt = is_numeric($hpTime) ? (int) $hpTime : 0;
            if ($submittedAt > 0) {
                $age = time() - $submittedAt;
                if ($age >= 0 && $age < self::MIN_FILL_SECONDS) {
                    return $this->reject($request);
                }
            }
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

