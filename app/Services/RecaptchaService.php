<?php

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecaptchaService
{
    public function enabled(): bool
    {
        return filled(config('services.recaptcha.site_key')) && filled(config('services.recaptcha.secret_key'));
    }

    public function verify(?string $token, string $action, ?string $ip = null): array
    {
        if (! $this->enabled()) {
            return ['ok' => true, 'reason' => null, 'response' => null];
        }

        if (blank($token)) {
            return ['ok' => false, 'reason' => 'Missing reCAPTCHA token.', 'response' => null];
        }

        try {
            $response = Http::asForm()
                ->timeout(5)
                ->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => (string) config('services.recaptcha.secret_key'),
                    'response' => $token,
                    'remoteip' => $ip,
                ])
                ->throw()
                ->json();
        } catch (RequestException|\Throwable $e) {
            report($e);
            return ['ok' => false, 'reason' => 'Unable to contact reCAPTCHA verification service.', 'response' => null];
        }

        if (! is_array($response)) {
            return ['ok' => false, 'reason' => 'Invalid response from reCAPTCHA verification service.', 'response' => null];
        }

        $expectedAction = trim($action);
        $actualAction = (string) ($response['action'] ?? '');
        $score = (float) ($response['score'] ?? 0);
        $threshold = (float) config('services.recaptcha.threshold', 0.5);
        $errorCodes = (array) ($response['error-codes'] ?? []);

        if (empty($response['success'])) {
            $reason = ! empty($errorCodes)
                ? 'reCAPTCHA rejected the token: ' . implode(', ', $errorCodes)
                : 'reCAPTCHA rejected the token.';

            return ['ok' => false, 'reason' => $reason, 'response' => $response];
        }

        if ($actualAction !== '' && $actualAction !== $expectedAction) {
            return [
                'ok' => false,
                'reason' => "reCAPTCHA action mismatch. Expected {$expectedAction}, got {$actualAction}.",
                'response' => $response,
            ];
        }

        if ($score < $threshold) {
            return [
                'ok' => false,
                'reason' => "reCAPTCHA score too low ({$score}).",
                'response' => $response,
            ];
        }

        return ['ok' => true, 'reason' => null, 'response' => $response];
    }
}
