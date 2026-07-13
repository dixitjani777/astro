<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index', [
            'settings' => Setting::orderBy('key')->paginate(50),
        ]);
    }

    public function create()
    {
        return view('admin.settings.form', ['setting' => new Setting()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key' => ['required', 'string', 'max:120', 'unique:settings,key'],
            'type' => ['required', 'string', 'max:20'],
            'value' => ['nullable', 'string'],
        ]);
        Setting::create($data);
        Cache::forget('settings.all');
        return redirect()->route('admin.settings.index')->with('status', 'Setting created.');
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.form', ['setting' => $setting]);
    }

    public function update(Request $request, Setting $setting)
    {
        $data = $request->validate([
            'key' => ['required', 'string', 'max:120', 'unique:settings,key,' . $setting->id],
            'type' => ['required', 'string', 'max:20'],
            'value' => ['nullable', 'string'],
        ]);
        $setting->update($data);
        Cache::forget('settings.all');
        return redirect()->route('admin.settings.index')->with('status', 'Setting updated.');
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
        Cache::forget('settings.all');
        return redirect()->route('admin.settings.index')->with('status', 'Setting deleted.');
    }

    public function bulkDestroy(Request $request)
    {
        $data = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['integer', 'distinct'],
        ]);

        Setting::query()->whereIn('id', $data['ids'])->get()->each->delete();
        Cache::forget('settings.all');

        return redirect()->route('admin.settings.index')->with('status', 'Selected settings deleted.');
    }

    public function siteControls()
    {
        $keys = [
            'site.mode',
            'site.maintenance.message',
            'site.maintenance.facebook_url',
            'site.maintenance.instagram_url',
            'site.maintenance.youtube_url',
            'site.maintenance.whatsapp_url',
            'site.coming_soon.message',
            'site.coming_soon.launch_date',
            'site.coming_soon.newsletter_label',
            'site.youtube_url',
        ];

        $settings = Setting::query()->whereIn('key', $keys)->pluck('value', 'key')->toArray();

        return view('admin.settings.site-controls', [
            'settings' => $settings,
        ]);
    }

    public function updateSiteControls(Request $request)
    {
        $data = $request->validate([
            'site.mode' => ['required', 'in:normal,coming_soon,maintenance'],
            'site.maintenance.message' => ['nullable', 'string', 'max:2000'],
            'site.maintenance.facebook_url' => ['nullable', 'url', 'max:2048'],
            'site.maintenance.instagram_url' => ['nullable', 'url', 'max:2048'],
            'site.maintenance.youtube_url' => ['nullable', 'url', 'max:2048'],
            'site.maintenance.whatsapp_url' => ['nullable', 'url', 'max:2048'],
            'site.coming_soon.message' => ['nullable', 'string', 'max:2000'],
            'site.coming_soon.launch_date' => ['nullable', 'date'],
            'site.coming_soon.newsletter_label' => ['nullable', 'string', 'max:120'],
            'site.youtube_url' => ['nullable', 'url', 'max:2048'],
        ]);
        $data = Arr::dot($data);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $value ?? '',
                    'type' => match ($key) {
                        'site.mode' => 'string',
                        'site.coming_soon.launch_date' => 'string',
                        default => 'text',
                    },
                ]
            );
        }

        Cache::forget('settings.all');
        foreach (array_keys($data) as $key) {
            Cache::forget("setting.value.{$key}");
        }

        return redirect()->route('admin.settings.site-controls')->with('status', 'Site controls updated.');
    }
}
