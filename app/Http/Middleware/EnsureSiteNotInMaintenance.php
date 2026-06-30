<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class EnsureSiteNotInMaintenance
{
    public function handle(Request $request, Closure $next)
    {
        if ($this->shouldBypass($request)) {
            return $next($request);
        }

        if (!Schema::hasTable('settings')) {
            return $next($request);
        }

        $enabled = strtolower((string) Setting::plainValue('site.maintenance.enabled', '0'));
        $isOn = in_array($enabled, ['1', 'true', 'yes', 'on'], true);

        if (! $isOn) {
            return $next($request);
        }

        if ($request->user()?->isAdmin()) {
            return $next($request);
        }

        return response()->view('frontend.maintenance', [
            'message' => (string) Setting::plainValue(
                'site.maintenance.message',
                'We are currently making AstroDuniya even better. Please check back shortly.'
            ),
            'socialLinks' => [
                'facebook' => Setting::plainValue('site.maintenance.facebook_url'),
                'instagram' => Setting::plainValue('site.maintenance.instagram_url'),
                'youtube' => Setting::plainValue('site.maintenance.youtube_url'),
                'whatsapp' => Setting::plainValue('site.maintenance.whatsapp_url'),
            ],
        ], 503);
    }

    private function shouldBypass(Request $request): bool
    {
        return $request->is('admin', 'admin/*')
            || $request->is('admin/login')
            || $request->routeIs('admin.login', 'admin.login.post');
    }
}
