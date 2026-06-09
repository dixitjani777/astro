<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - {{ config('app.name') }}</title>

    <!-- Tabler (Bootstrap 5) via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/css/tabler.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.34.0/tabler-icons.min.css">

    <style>
        .admin-brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .admin-brand img {
            height: 55px;
            width: auto;
            max-width: 160px;
            object-fit: contain;
        }
        .admin-brand span {
            font-weight: 600;
            letter-spacing: .2px;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="page">
        <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#admin-sidebar" aria-controls="admin-sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark">
                    <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
                        <span class="admin-brand">
                            <img src="{{ asset('images/logo.png') }}" alt="AstroDuniya">
                        </span><br/>
                        <span>Admin Panel</span>
                    </a>
                </h1>

                <div class="collapse navbar-collapse" id="admin-sidebar">
                    <ul class="navbar-nav pt-lg-3">
                        @php($me = auth()->user())

                        @if($me && $me->hasPermission('admin.dashboard'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-dashboard"></i></span>
                                    <span class="nav-link-title">Dashboard</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.enquiries'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.enquiries.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-inbox"></i></span>
                                    <span class="nav-link-title">Enquiries</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.pages'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.pages.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-file-text"></i></span>
                                    <span class="nav-link-title">CMS Pages</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.blog'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.blog.posts.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-news"></i></span>
                                    <span class="nav-link-title">Blog Posts</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.blog'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.blog.categories.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-category"></i></span>
                                    <span class="nav-link-title">Blog Categories</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.blog'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.blog.comments.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-message-circle"></i></span>
                                    <span class="nav-link-title">Blog Comments</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.offers'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.offers.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-badge-percent"></i></span>
                                    <span class="nav-link-title">Offers</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.ad_banners'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.ad-banners.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-ad"></i></span>
                                    <span class="nav-link-title">Ad Banners</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.users'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.users.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-users"></i></span>
                                    <span class="nav-link-title">Users</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.roles'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.roles.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-shield"></i></span>
                                    <span class="nav-link-title">Roles</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.settings'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.settings.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-settings"></i></span>
                                    <span class="nav-link-title">Settings</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.daily_horoscopes'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.daily-horoscopes.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-calendar"></i></span>
                                    <span class="nav-link-title">Daily Horoscope</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.horoscope_content'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.horoscope-contents.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-zodiac-aries"></i></span>
                                    <span class="nav-link-title">Horoscope Content</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.home_services'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.home-services.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-layout-grid"></i></span>
                                    <span class="nav-link-title">Home Services</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.home_sliders'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.home-sliders.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-carousel-horizontal"></i></span>
                                    <span class="nav-link-title">Home Slider</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.pandit_services'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.pandit-services.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-briefcase"></i></span>
                                    <span class="nav-link-title">Pandit Services</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.smtp'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.smtp-settings.edit') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-mail"></i></span>
                                    <span class="nav-link-title">SMTP</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.contact'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.contact-settings.edit') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-phone"></i></span>
                                    <span class="nav-link-title">Contact &amp; Social</span>
                                </a>
                            </li>
                        @endif

                        @if($me && $me->hasPermission('admin.activity'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.activity.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-activity"></i></span>
                                    <span class="nav-link-title">Activity</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </aside>

        <div class="page-wrapper">
            <header class="navbar navbar-expand-md d-print-none">
                <div class="container-xl">
                    <div class="navbar-nav flex-row ms-md-auto align-items-center gap-2">
                        @if($me && $me->hasPermission('admin.tools'))
                            <form method="post" action="{{ route('admin.tools.clear-cache') }}" class="m-0">
                                @csrf
                                <button class="btn btn-sm btn-outline-secondary" type="submit">
                                    <i class="ti ti-refresh"></i>&nbsp;Clear cache
                                </button>
                            </form>
                        @endif
                        <a class="btn btn-sm btn-outline-secondary" href="{{ url('/') }}" target="_blank">
                            <i class="ti ti-external-link"></i>&nbsp;View site
                        </a>
                        <form method="post" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button class="btn btn-sm btn-outline-danger" type="submit">
                                <i class="ti ti-logout"></i>&nbsp;Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <div class="page-body">
                <div class="container-xl">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/js/tabler.min.js"></script>
    <script>
        (function () {
            function getBulkChecks(form) {
                const direct = Array.from(form.querySelectorAll('[data-bulk-check]'));
                const linked = Array.from(document.querySelectorAll(`[data-bulk-check][form="${form.id}"]`));
                const merged = direct.concat(linked);
                const seen = new Set();
                return merged.filter(el => {
                    if (seen.has(el)) return false;
                    seen.add(el);
                    return true;
                });
            }

            function syncBulk(form) {
                const checks = getBulkChecks(form);
                const anyChecked = checks.some(c => c.checked);
                const btn = form.querySelector('[data-bulk-submit]');
                if (btn) btn.disabled = !anyChecked;
                const all = form.querySelector('[data-bulk-check-all]');
                if (all) {
                    const allChecked = checks.length > 0 && checks.every(c => c.checked);
                    all.checked = allChecked;
                    all.indeterminate = !allChecked && anyChecked;
                }
            }

            document.addEventListener('change', function (e) {
                let form = e.target.closest('form[data-bulk-form]');
                if (!form && e.target.getAttribute && e.target.getAttribute('form')) {
                    form = document.getElementById(e.target.getAttribute('form'));
                    if (form && !form.matches('form[data-bulk-form]')) form = null;
                }
                if (!form) return;
                if (e.target.matches('[data-bulk-check-all]')) {
                    const checked = e.target.checked;
                    getBulkChecks(form).forEach(c => { c.checked = checked; });
                }
                if (e.target.matches('[data-bulk-check], [data-bulk-check-all]')) {
                    syncBulk(form);
                }
            });

            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('form[data-bulk-form]').forEach(syncBulk);
            });
        })();
    </script>
</body>
</html>
