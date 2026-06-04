<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class IpGeolocation
{
    public static function lookup(?string $ip): ?array
    {
        $ip = trim((string) $ip);
        if ($ip === '') {
            return null;
        }

        // Do not attempt to geolocate private/local IPs.
        if (
            $ip === '127.0.0.1' ||
            $ip === '::1' ||
            filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false
        ) {
            return [
                'ip' => $ip,
                'label' => 'Local/Private IP',
                'country' => null,
                'region' => null,
                'city' => null,
                'zip' => null,
                'lat' => null,
                'lon' => null,
            ];
        }

        return Cache::remember("ipgeo:{$ip}", 86400, function () use ($ip) {
            try {
                // Simple, no-key provider. If blocked/unavailable, we just return null.
                $res = Http::timeout(5)->acceptJson()->get("http://ip-api.com/json/{$ip}", [
                    'fields' => 'status,message,country,regionName,city,zip,lat,lon,query',
                ]);

                if (!$res->ok()) {
                    return null;
                }

                $json = $res->json();
                if (($json['status'] ?? null) !== 'success') {
                    return null;
                }

                $country = $json['country'] ?? null;
                $region = $json['regionName'] ?? null;
                $city = $json['city'] ?? null;
                $zip = $json['zip'] ?? null;

                $parts = array_values(array_filter([$city, $region, $country]));
                $label = implode(', ', $parts);
                if ($zip) {
                    $label = $label ? "{$label} ({$zip})" : $zip;
                }

                return [
                    'ip' => $json['query'] ?? $ip,
                    'label' => $label ?: null,
                    'country' => $country,
                    'region' => $region,
                    'city' => $city,
                    'zip' => $zip,
                    'lat' => $json['lat'] ?? null,
                    'lon' => $json['lon'] ?? null,
                ];
            } catch (\Throwable $e) {
                return null;
            }
        });
    }
}

