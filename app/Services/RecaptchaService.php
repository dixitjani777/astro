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

    public function verify(?string $token, string $action, ?string $ip = null): bool
    {
        if (! $this->enabled()) {
            return true;
        }

        if (blank($token)) {
            return false;
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
            return false;
        }

        if (! is_array($response)) {
            return false;
        }

        $expectedAction = trim($action);
        $actualAction = (string) ($response['action'] ?? '');
        $score = (float) ($response['score'] ?? 0);
        $threshold = (float) config('services.recaptcha.threshold', 0.5);

        return ! empty($response['success'])
            && ($actualAction === '' || $actualAction === $expectedAction)
            && $score >= $threshold;
    }
}
