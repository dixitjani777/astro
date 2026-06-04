<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
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
}
