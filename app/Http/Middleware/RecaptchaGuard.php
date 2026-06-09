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
        $result = $this->recaptcha->verify($token, $action, $request->ip());

        if (! ($result['ok'] ?? false)) {
            return $this->reject($request, (string) ($result['reason'] ?? 'Captcha verification failed. Please try again.'));
        }

        return $next($request);
    }

    private function reject(Request $request, string $detail): Response
    {
        $message = 'Captcha verification failed. Please try again.';
        $fullMessage = trim($message . ($detail ? ' ' . $detail : ''));

        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $fullMessage,
                'errors' => [
                    'recaptcha_token' => [$fullMessage],
                ],
            ], 422);
        }

        return back()->withErrors(['recaptcha_token' => $fullMessage])->withInput();
    }
}
