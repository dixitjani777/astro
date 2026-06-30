<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="{{ $currentLang ?? 'en' }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="google-site-verification" content="N8-iuALS6XDPx-lz8XaBHgnHXNiwEZFfi76X4aGzVZQ"/>
    <meta name="msapplication-TileColor" content="#ffffff">
    <link rel="canonical" href="https://www.astroduniya.com/" />
    <meta property="caption" content="astroduniya.com" />
    <title>@yield('title','Master Page')</title>
    <meta name="description" content="@yield('description','Master Page')">
    <meta name="Keywords" content="@yield('keywords','Master Page')">
    <meta name="copyright" content="astroduniya.com" />
    <meta name="robots" content="index" />
    <meta name="googlebot" content="NOODP" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta name="og:title" content="@yield('title','Master Page')">
    <meta name="og:description" content="@yield('description','Master Page')">
    <meta property="og:image" content="https://www.astroduniya.com/favicon.png">
    <meta property="og:url" content="https://www.astroduniya.com/" />
    <meta property="og:site_name" content="Astroduniya" />
    <meta property="article:modified_time" content="<?php echo date('d-m-y');?>" >
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content='@qsasacuttertutor'>
    <meta name="twitter:creator" content="@narayanprusty">
    <meta name="twitter:description" content="@yield('description','Master Page')">
    <meta name="twitter:title" content="@yield('title','Master Page')">
    <meta property="fb:pages" content="169185460831452" />
    <meta property="fb:admins" content="Facebook numberic ID" />
    <meta name="author" content="astrologer" />
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">

    <!-- up to 10% speed up for external res -->
    <link rel="dns-prefetch" href="https://fonts.googleapis.com/">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com/">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- preloading icon font is helping to speed up a little bit -->
    <link rel="preload" href="{{asset('fonts/flaticon/Flaticon.woff2')}}" as="font" type="font/woff2" crossorigin>
     <!-- CSS -->
    <link href="{{asset('css/core.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/vendor_bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/intlTelInput.css')}}" rel="stylesheet">
    <link href="{{ asset('css/chatbot.css') }}" rel="stylesheet">
    <link href="{{ asset('css/site-overrides.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">
    <style>
        .astro-location-suggest {
            position: absolute;
            z-index: 1050;
            width: 100%;
            margin-top: 4px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.14);
            background: #fff;
            border: 1px solid rgba(15, 23, 42, 0.08);
        }
        .astro-location-suggest button {
            width: 100%;
            border: 0;
            background: #fff;
            padding: 10px 12px;
            text-align: left;
            font-size: 14px;
            color: #1f2937;
        }
        .astro-location-suggest button:hover {
            background: #f5f7fa;
        }
    </style>
    
    <!-- some js are is in footer. dont touch or change their place without asking jani -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/intlTelInput.js')}}"></script>
    <link rel="shortcut icon" href="{{asset('favicon.png')}}">
    <meta name="author" content="Astroduniya">
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs/dist/tf.min.js"> </script>
<x-recaptcha-script />

</head><!--/head-->

<body class="astroduniya header-sticky ">

<!-- PRELOADER -->
<!-- <div id="preloader">
    <div class="inner">
        <span>
            <img src="{{ asset('images/loaders/9.gif') }}" width="55px" height="55px" alt="loader" />
        </span>
    </div>
</div> -->
<!-- /PRELOADER -->

@include('frontend.layouts.header')
@yield('content')
@include('frontend.layouts.footer')
<x-chatbot-widget />
<script src="{{ asset('js/chatbot.js') }}"></script>
<script>
	(function () {
		function addHoneypot(form) {
			if (!form || !form.querySelector) return;
			var method = (form.getAttribute('method') || '').toLowerCase();
			if (method !== 'post') return;

			if (!form.querySelector('input[name="hp_time"]')) {
				var t = document.createElement('input');
				t.type = 'hidden';
				t.name = 'hp_time';
				t.value = String(Math.floor(Date.now() / 1000));
				form.appendChild(t);
			}

			if (!form.querySelector('input[name="website"]')) {
				var w = document.createElement('input');
				w.type = 'text';
				w.name = 'website';
				w.autocomplete = 'off';
				w.tabIndex = -1;
				w.value = '';
				w.style.position = 'absolute';
				w.style.left = '-10000px';
				w.style.top = 'auto';
				w.style.width = '1px';
				w.style.height = '1px';
				w.style.opacity = '0';
				form.appendChild(w);
			}
		}

		document.addEventListener('DOMContentLoaded', function () {
			Array.prototype.forEach.call(document.querySelectorAll('form'), addHoneypot);
		});
	})();
</script>
<script>
    (function () {
        var timers = new WeakMap();

        function ensureContainer(input) {
            var parent = input.closest('.form-label-group') || input.parentElement;
            if (!parent) return null;
            if (parent.style.position === '') {
                parent.style.position = 'relative';
            }
            var box = parent.querySelector('.astro-location-suggest');
            if (!box) {
                box = document.createElement('div');
                box.className = 'astro-location-suggest d-none';
                parent.appendChild(box);
            }
            return box;
        }

        function fillDetails(input, item) {
            var form = input.closest('form');
            if (!form) return;
            var map = {
                display_name: item.display_name || '',
                city: item.city || '',
                state: item.state || '',
                country: item.country || '',
                lat: item.lat || '',
                lon: item.lon || '',
            };

            Object.keys(map).forEach(function (key) {
                var hidden = form.querySelector('input[name="meta[' + input.dataset.astroLocation + '_details][' + key + ']"]');
                if (hidden) hidden.value = map[key];
            });
        }

        function renderSuggestions(input, items) {
            var box = ensureContainer(input);
            if (!box) return;

            if (!items.length) {
                box.classList.add('d-none');
                box.innerHTML = '';
                return;
            }

            box.innerHTML = '';
            items.forEach(function (item) {
                var btn = document.createElement('button');
                btn.type = 'button';
                btn.textContent = item.display_name || '';
                btn.addEventListener('click', function () {
                    input.value = item.display_name || input.value;
                    fillDetails(input, item);
                    box.classList.add('d-none');
                });
                box.appendChild(btn);
            });
            box.classList.remove('d-none');
        }

        async function fetchLocations(input) {
            var q = (input.value || '').trim();
            if (q.length < 2) {
                renderSuggestions(input, []);
                return;
            }

            var response = await fetch("{{ route('locations.search') }}?q=" + encodeURIComponent(q), {
                headers: { 'Accept': 'application/json' }
            });
            if (!response.ok) return;
            var data = await response.json();
            renderSuggestions(input, Array.isArray(data.items) ? data.items : []);
        }

        document.addEventListener('input', function (event) {
            var input = event.target;
            if (!input || !input.matches || !input.matches('[data-astro-location]')) return;

            clearTimeout(timers.get(input));
            timers.set(input, setTimeout(function () {
                fetchLocations(input).catch(function () {});
            }, 300));
        });

        document.addEventListener('click', function (event) {
            document.querySelectorAll('.astro-location-suggest').forEach(function (box) {
                if (!box.contains(event.target)) {
                    box.classList.add('d-none');
                }
            });
        });
    })();
</script>

</body>
</html>
