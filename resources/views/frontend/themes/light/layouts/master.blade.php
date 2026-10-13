<!doctype html>
<html lang="{{ $currentLang ?? 'en' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <title>@yield('title', 'Astroduniya')</title>
    <meta name="description" content="@yield('description', 'Astroduniya astrology services')">
    <link rel="shortcut icon" href="{{ asset('themes/light/images/header/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('themes/light/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/light/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/light/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/light/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/light/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/light/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/light/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/light/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/light/css/astro-integration.css?v=20261013-101') }}">
    <link rel="stylesheet" href="{{ asset('css/chatbot.css') }}">
    @stack('styles')
</head>
<body data-frontend-theme="light">
    @include('frontend.themes.light.partials.header')
    <main class="light-legacy-content">@yield('content')</main>
    @include('frontend.themes.light.partials.footer')
    <x-chatbot-widget />
    <script src="{{ asset('themes/light/js/jquery_min.js') }}"></script>
    <script src="{{ asset('themes/light/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('themes/light/js/custom.js') }}"></script>
    <script src="{{ asset('js/chatbot.js') }}"></script>
    <script>
        (function () {
            var header = document.querySelector('.hs_header_Wrapper');
            if (!header) return;
            var updateHeader = function () {
                header.classList.toggle('menu_fixed', window.scrollY > 160);
            };
            window.addEventListener('scroll', updateHeader, { passive: true });
            updateHeader();
        })();
    </script>
    @stack('scripts')
</body>
</html>
