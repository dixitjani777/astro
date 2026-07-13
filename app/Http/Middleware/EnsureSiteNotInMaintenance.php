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

        $mode = strtolower(trim((string) Setting::plainValue('site.mode', 'normal')));

        if ($mode === 'normal' || $mode === '') {
            return $next($request);
        }

        if ($request->user()?->isAdmin()) {
            return $next($request);
        }

        $view = $mode === 'coming_soon' ? 'frontend.coming-soon' : 'frontend.maintenance';
        $status = $mode === 'coming_soon' ? 200 : 503;

        return response()->view($view, [
            'mode' => $mode,
            'siteName' => config('app.name'),
            'message' => $mode === 'coming_soon'
                ? (string) Setting::plainValue(
                    'site.coming_soon.message',
                    'We are preparing something new for you. Please check back soon.'
                )
                : (string) Setting::plainValue(
                    'site.maintenance.message',
                    'We are currently making AstroDuniya even better. Please check back shortly.'
                ),
            'launchDate' => Setting::plainValue('site.coming_soon.launch_date'),
            'newsletterLabel' => (string) Setting::plainValue('site.coming_soon.newsletter_label', 'Get launch updates'),
            'socialLinks' => [
                'facebook' => Setting::plainValue('site.maintenance.facebook_url'),
                'instagram' => Setting::plainValue('site.maintenance.instagram_url'),
                'youtube' => Setting::plainValue('site.maintenance.youtube_url'),
                'whatsapp' => Setting::plainValue('site.maintenance.whatsapp_url'),
            ],
        ], $status);
    }

    private function shouldBypass(Request $request): bool
    {
        return $request->is('admin', 'admin/*')
            || $request->is('admin/login')
            || $request->routeIs('admin.login', 'admin.login.post')
            || $request->is('up');
    }
}
