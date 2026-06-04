<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ContactSettingsController extends Controller
{
    public function edit()
    {
        $settings = Setting::whereIn('key', [
            'site.phone',
            'site.email',
            'contact.address_html',
            'contact.business_hours',
            'social.whatsapp',
            'social.facebook',
            'social.twitter',
            'social.youtube',
            'social.instagram',
        ])->pluck('value', 'key')->toArray();

        return view('admin.contact-settings', ['settings' => $settings]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_phone' => ['nullable', 'string', 'max:100'],
            'site_email' => ['nullable', 'email', 'max:255'],
            'contact_address_html' => ['nullable', 'string', 'max:5000'],
            'contact_business_hours' => ['nullable', 'string', 'max:255'],
            'social_whatsapp' => ['nullable', 'string', 'max:2048'],
            'social_facebook' => ['nullable', 'string', 'max:2048'],
            'social_twitter' => ['nullable', 'string', 'max:2048'],
            'social_youtube' => ['nullable', 'string', 'max:2048'],
            'social_instagram' => ['nullable', 'string', 'max:2048'],
        ]);

        $map = [
            'site.phone' => $data['site_phone'] ?? null,
            'site.email' => $data['site_email'] ?? null,
            'contact.address_html' => $data['contact_address_html'] ?? null,
            'contact.business_hours' => $data['contact_business_hours'] ?? null,
            'social.whatsapp' => $data['social_whatsapp'] ?? null,
            'social.facebook' => $data['social_facebook'] ?? null,
            'social.twitter' => $data['social_twitter'] ?? null,
            'social.youtube' => $data['social_youtube'] ?? null,
            'social.instagram' => $data['social_instagram'] ?? null,
        ];

        foreach ($map as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['type' => str_contains($key, 'address_html') ? 'text' : 'string', 'value' => $value]
            );
        }

        Cache::forget('settings.all');

        return redirect()->route('admin.contact-settings.edit')->with('status', 'Contact & social settings updated.');
    }
}

