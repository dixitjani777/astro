<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->validateCsrfTokens(except: [
            'chatbot/ai',
            'chatbot/submit',
        ]);

        $middleware->web(append: [
            \App\Http\Middleware\SetSiteLanguage::class,
            \App\Http\Middleware\AutoTranslateHtml::class,
        ]);

        $middleware->alias([
            'admin' => \App\Http\Middleware\EnsureAdmin::class,
            'admin.log' => \App\Http\Middleware\AdminActivityLogger::class,
            'perm' => \App\Http\Middleware\EnsurePermission::class,
            'honeypot' => \App\Http\Middleware\HoneypotGuard::class,
            'recaptcha' => \App\Http\Middleware\RecaptchaGuard::class,
        ]);

        Authenticate::redirectUsing(function (Request $request) {
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login');
            }

            // Frontend: OTP login remains available (optional)
            return route('otp.show');
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
