<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocationLookupController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->validate([
            'q' => ['required', 'string', 'min:2', 'max:255'],
        ]);

        $response = Http::withHeaders([
                'User-Agent' => 'AstroDuniya/1.0 (location lookup)',
                'Accept-Language' => 'en',
            ])
            ->timeout(8)
            ->get('https://nominatim.openstreetmap.org/search', [
                'q' => $data['q'],
                'format' => 'jsonv2',
                'addressdetails' => 1,
                'limit' => 6,
            ]);

        if (! $response->ok()) {
            return response()->json(['items' => []]);
        }

        $items = collect($response->json() ?: [])
            ->map(function ($row) {
                $address = (array) ($row['address'] ?? []);

                return [
                    'display_name' => (string) ($row['display_name'] ?? ''),
                    'city' => $address['city'] ?? $address['town'] ?? $address['village'] ?? $address['municipality'] ?? null,
                    'state' => $address['state'] ?? $address['region'] ?? null,
                    'country' => $address['country'] ?? null,
                    'lat' => $row['lat'] ?? null,
                    'lon' => $row['lon'] ?? null,
                    'type' => $row['type'] ?? null,
                ];
            })
            ->filter(fn ($row) => ! empty($row['display_name']))
            ->values();

        return response()->json(['items' => $items]);
    }
}
