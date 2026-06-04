<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class HoroscopeApiClient
{
    public function fetchDaily(string $sign): array
    {
        $sign = strtolower(trim($sign));

        $baseUrl = (string) env('HOROSCOPE_API_URL', 'https://freehoroscopeapi.com/api/v1/get-horoscope/daily');

        try {
            $response = Http::timeout((int) env('HOROSCOPE_HTTP_TIMEOUT', 15))
                ->retry(2, 400)
                ->get($baseUrl, ['sign' => $sign])
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
            'period' => $data['period'] ?? null,
            'sign' => $data['sign'] ?? null,
            'description' => $data['horoscope'] ?? null,
            'raw' => $json,
        ];
    }
}

