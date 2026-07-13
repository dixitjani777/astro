<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class HoroscopeApiClient
{
    public function fetchDaily(string $sign): array
    {
        return $this->fetchPeriod('daily', $sign);
    }

    public function fetchPeriod(string $period, string $sign): array
    {
        $period = strtolower(trim($period));
        $sign = strtolower(trim($sign));

        $baseUrl = $this->endpointForPeriod($period);
        if ($baseUrl === '') {
            return [];
        }

        try {
            $response = Http::timeout((int) env('HOROSCOPE_HTTP_TIMEOUT', 15))
                ->retry(2, 400)
                ->get($baseUrl, ['sign' => $sign, 'period' => $period])
                ->throw();
        } catch (ConnectionException|RequestException $e) {
            throw $e;
        }

        $json = $response->json();
        if (! is_array($json)) {
            return [];
        }

        $data = $json['data'] ?? null;
        if (! is_array($data)) {
            return [];
        }

        return [
            'date' => $data['date'] ?? null,
            'period' => $data['period'] ?? $period,
            'sign' => $data['sign'] ?? null,
            'description' => $data['horoscope'] ?? null,
            'raw' => $json,
        ];
    }

    private function endpointForPeriod(string $period): string
    {
        $period = strtolower(trim($period));

        if ($period === 'daily') {
            return (string) env('HOROSCOPE_API_URL', 'https://freehoroscopeapi.com/api/v1/get-horoscope/daily');
        }

        $key = match ($period) {
            'weekly' => 'HOROSCOPE_API_URL_WEEKLY',
            'monthly' => 'HOROSCOPE_API_URL_MONTHLY',
            'yearly' => 'HOROSCOPE_API_URL_YEARLY',
            default => '',
        };

        if ($key === '') {
            return '';
        }

        return (string) env($key, '');
    }
}
