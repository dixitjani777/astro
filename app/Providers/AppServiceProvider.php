<?php

namespace App\Providers;

use App\Models\AdBanner;
use App\Models\DailyHoroscope;
use App\Models\Enquiry;
use App\Models\Offer;
use App\Models\Setting;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Defensive: prevent "Collection::links does not exist" crashes if a view expects a paginator
        // but receives a plain Eloquent/Support collection (e.g. get() used instead of paginate()).
        if (!EloquentCollection::hasMacro('links')) {
            EloquentCollection::macro('links', fn () => '');
        }
        if (!Collection::hasMacro('links')) {
            Collection::macro('links', fn () => '');
        }

        view()->composer('*', function ($view) {
            try {
                if (!Schema::hasTable('settings')) {
                    $view->with('siteSettings', []);
                    return;
                }

                $siteSettings = Cache::remember('settings.all', 3600, function () {
                    return Setting::pluck('value', 'key')->toArray();
                });
            } catch (QueryException $e) {
                $siteSettings = [];
            }

            $view->with('siteSettings', $siteSettings);
        });

        view()->composer('*', function ($view) {
            try {
                if (!Schema::hasTable('offers') || !Schema::hasTable('ad_banners')) {
                    return;
                }

                $now = now();

                $offers = Cache::remember('frontend.offers.active', 300, function () use ($now) {
                    return Offer::query()
                        ->where('is_active', true)
                        ->where(function ($q) use ($now) {
                            $q->whereNull('starts_at')->orWhere('starts_at', '<=', $now);
                        })
                        ->where(function ($q) use ($now) {
                            $q->whereNull('ends_at')->orWhere('ends_at', '>=', $now);
                        })
                        ->orderBy('sort_order')
                        ->orderByDesc('id')
                        ->get();
                });

                $placements = ['sidebar', 'query_sidebar', 'home_top', 'home_bottom'];

                $byPlacement = Cache::remember('frontend.ad_banners.by_placement', 300, function () use ($now, $placements) {
                    return AdBanner::query()
                        ->where('is_active', true)
                        ->whereIn('placement', $placements)
                        ->where(function ($q) use ($now) {
                            $q->whereNull('starts_at')->orWhere('starts_at', '<=', $now);
                        })
                        ->where(function ($q) use ($now) {
                            $q->whereNull('ends_at')->orWhere('ends_at', '>=', $now);
                        })
                        ->orderBy('sort_order')
                        ->orderByDesc('id')
                        ->get()
                        ->groupBy('placement');
                });

                $sidebarAdBanners = $byPlacement->get('sidebar', collect());
                $querySidebarAdBanners = $byPlacement->get('query_sidebar', collect());
                $homeTopAdBanners = $byPlacement->get('home_top', collect());
                $homeBottomAdBanners = $byPlacement->get('home_bottom', collect());

                $view->with([
                    'offers' => $offers,
                    'sidebarAdBanners' => $sidebarAdBanners,
                    'querySidebarAdBanners' => $querySidebarAdBanners,
                    'homeTopAdBanners' => $homeTopAdBanners,
                    'homeBottomAdBanners' => $homeBottomAdBanners,
                ]);
            } catch (QueryException $e) {
                // Ignore when running before migrations.
            }
        });

        view()->composer('frontend.account.sidebar.sidebar', function ($view) {
            try {
                if (!Schema::hasTable('enquiries')) {
                    return;
                }

                $user = Auth::user();
                if (!$user || empty($user->email)) {
                    return;
                }

                $email = $user->email;
                $totalEnquiries = Enquiry::query()->where('email', $email)->count();
                $ordersCount = Enquiry::query()
                    ->where('email', $email)
                    ->where(function ($q) {
                        $q->where('context', 'like', '%order%')
                            ->orWhere('subject', 'like', '%order%');
                    })
                    ->count();

                $view->with([
                    'myaccountCounts' => [
                        'enquiries' => $totalEnquiries,
                        'orders' => $ordersCount,
                    ],
                ]);
            } catch (QueryException $e) {
                // Ignore when running before migrations.
            }
        });

        view()->composer('frontend.layouts.footer', function ($view) {
            try {
                if (!Schema::hasTable('daily_horoscopes')) {
                    return;
                }

                $payload = Cache::remember('frontend.footer.daily_horoscopes.latest', 1800, function () {
                    $latestDate = DailyHoroscope::query()->max('for_date');
                    if (!$latestDate) {
                        return null;
                    }

                    $rows = DailyHoroscope::query()
                        ->whereDate('for_date', $latestDate)
                        ->get(['sign', 'for_date', 'description', 'admin_description']);

                    $bySign = $rows->keyBy(fn ($r) => strtolower((string) $r->sign));

                    $order = [
                        'aries',
                        'taurus',
                        'gemini',
                        'cancer',
                        'leo',
                        'virgo',
                        'libra',
                        'scorpio',
                        'sagittarius',
                        'capricorn',
                        'aquarius',
                        'pisces',
                    ];

                    $items = [];
                    foreach ($order as $sign) {
                        $row = $bySign->get($sign);
                        if (!$row) {
                            continue;
                        }
                        $text = (string) ($row->admin_description ?: $row->description ?: '');
                        $text = trim($text);
                        if ($text === '') {
                            continue;
                        }
                        $items[] = [
                            'sign' => ucfirst($sign),
                            'text' => $text,
                        ];
                    }

                    return [
                        'date' => (string) $latestDate,
                        'items' => $items,
                    ];
                });

                if (!$payload || empty($payload['items'])) {
                    return;
                }

                $view->with([
                    'footerDailyHoroscopeDate' => $payload['date'] ?? null,
                    'footerDailyHoroscopes' => $payload['items'] ?? [],
                ]);
            } catch (QueryException $e) {
                // Ignore when running before migrations / DB not ready.
            }
        });

        try {
            if (!Schema::hasTable('settings')) {
                return;
            }

            $settings = Cache::remember('settings.all', 3600, function () {
                return Setting::pluck('value', 'key')->toArray();
            });
        } catch (QueryException $e) {
            return;
        }

        // Apply SMTP config dynamically (admin-managed). Falls back to .env defaults when not set.
        if (!empty($settings['mail.mailer'])) {
            config(['mail.default' => $settings['mail.mailer']]);
        }

        config([
            'mail.mailers.smtp.host' => $settings['mail.host'] ?? config('mail.mailers.smtp.host'),
            'mail.mailers.smtp.port' => isset($settings['mail.port']) && $settings['mail.port'] !== '' ? (int) $settings['mail.port'] : config('mail.mailers.smtp.port'),
            'mail.mailers.smtp.username' => $settings['mail.username'] ?? config('mail.mailers.smtp.username'),
            'mail.mailers.smtp.password' => $settings['mail.password'] ?? config('mail.mailers.smtp.password'),
        ]);

        if (array_key_exists('mail.encryption', $settings)) {
            $enc = strtolower(trim((string) $settings['mail.encryption']));

            // Symfony Mailer only accepts `smtp` or `smtps` as the scheme.
            // The admin UI still lets us store `tls` / `ssl`, so normalize here.
            $scheme = match ($enc) {
                'ssl', 'smtps' => 'smtps',
                'tls', 'smtp' => 'smtp',
                default => null,
            };

            config(['mail.mailers.smtp.scheme' => $scheme]);
        }

        if (!empty($settings['mail.from_address'])) {
            config(['mail.from.address' => $settings['mail.from_address']]);
        }
        if (!empty($settings['mail.from_name'])) {
            config(['mail.from.name' => $settings['mail.from_name']]);
        }
    }
}
