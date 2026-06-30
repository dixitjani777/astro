<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WhatsappSettingsController extends Controller
{
    private array $keys = [
        'whatsapp.enabled',
        'whatsapp.api_url',
        'whatsapp.api_token',
        'whatsapp.api_key',
        'whatsapp.timeout',
        'whatsapp.sender',
        'whatsapp.default_country',
        'whatsapp.user',
        'whatsapp.pass',
    ];

    public function edit()
    {
        return view('admin.whatsapp.settings', [
            'settings' => Setting::query()
                ->whereIn('key', $this->keys)
                ->pluck('value', 'key')
                ->toArray(),
        ]);
    }

    public function update(Request $request)
    {
        $current = Setting::query()
            ->whereIn('key', $this->keys)
            ->pluck('value', 'key')
            ->toArray();

        $data = $request->validate([
            'whatsapp_enabled' => ['nullable', 'boolean'],
            'whatsapp_api_url' => ['nullable', 'string', 'max:2048'],
            'whatsapp_api_token' => ['nullable', 'string', 'max:2048'],
            'whatsapp_api_key' => ['nullable', 'string', 'max:2048'],
            'whatsapp_timeout' => ['nullable', 'integer', 'min:5', 'max:120'],
            'whatsapp_sender' => ['nullable', 'string', 'max:120'],
            'whatsapp_default_country' => ['nullable', 'string', 'max:8'],
            'whatsapp_user' => ['nullable', 'string', 'max:120'],
            'whatsapp_pass' => ['nullable', 'string', 'max:120'],
        ]);

        $payload = [
            'whatsapp.enabled' => (bool) ($data['whatsapp_enabled'] ?? false) ? '1' : '0',
            'whatsapp.api_url' => $data['whatsapp_api_url'] ?? '',
            'whatsapp.api_token' => $data['whatsapp_api_token'] ?? '',
            'whatsapp.api_key' => $data['whatsapp_api_key'] ?? '',
            'whatsapp.timeout' => (string) ($data['whatsapp_timeout'] ?? 20),
            'whatsapp.sender' => $data['whatsapp_sender'] ?? '',
            'whatsapp.default_country' => strtolower(trim((string) ($data['whatsapp_default_country'] ?? 'in'))) ?: 'in',
            'whatsapp.user' => trim((string) ($data['whatsapp_user'] ?? '')) !== ''
                ? $data['whatsapp_user']
                : ($current['whatsapp.user'] ?? ''),
            'whatsapp.pass' => trim((string) ($data['whatsapp_pass'] ?? '')) !== ''
                ? $data['whatsapp_pass']
                : ($current['whatsapp.pass'] ?? ''),
        ];

        foreach ($payload as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['type' => 'string', 'value' => $value]
            );
        }

        Cache::forget('settings.all');
        Cache::forget('whatsapp.settings');

        return redirect()->route('admin.whatsapp.settings.edit')->with('status', 'WhatsApp settings updated.');
    }
}
