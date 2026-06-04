<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetSiteLanguage
{
    public function handle(Request $request, Closure $next): Response
    {
        $supported = array_keys((array) config('auto_translate.locales', ['en' => 'English']));
        $cookieName = (string) config('auto_translate.cookie', 'site_lang');
        $default = (string) config('auto_translate.source_locale', 'en');

        $lang = (string) ($request->query('lang') ?: $request->header('X-Site-Lang') ?: $request->cookie($cookieName) ?: $default);
        $lang = strtolower(trim($lang));
        if (!in_array($lang, $supported, true)) {
            $lang = $default;
        }

        app()->setLocale($lang);

        view()->share('currentLang', $lang);
        view()->share('supportedLangs', (array) config('auto_translate.locales', []));

        /** @var Response $response */
        $response = $next($request);

        if ($request->query->has('lang')) {
            $response->headers->setCookie(cookie()->forever($cookieName, $lang));
        }

        return $response;
    }
}

