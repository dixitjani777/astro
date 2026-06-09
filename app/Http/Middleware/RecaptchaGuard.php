<?php

namespace App\Http\Middleware;

use App\Services\RecaptchaService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RecaptchaGuard
{
    public function __construct(private readonly RecaptchaService $recaptcha)
    {
    }

    public function handle(Request $request, Closure $next, string $action = 'default'): Response
    {
        if (strtoupper((string) $request->method()) !== 'POST' || ! $this->recaptcha->enabled()) {
            return $next($request);
        }

        $token = (string) $request->input('recaptcha_token', '');

        if (! $this->recaptcha->verify($token, $action, $request->ip())) {
            return $this->reject($request);
        }

        return $next($request);
    }

    private function reject(Request $request): Response
    {
        $message = 'Captcha verification failed. Please try again.';

        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $message,
                'errors' => [
                    'recaptcha_token' => [$message],
                ],
            ], 422);
        }

        return back()->withErrors(['recaptcha_token' => $message])->withInput();
    }
}
