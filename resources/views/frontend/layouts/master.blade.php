<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">
    
    <!-- some js are is in footer. dont touch or change their place without asking jani -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/intlTelInput.js')}}"></script>
    <link rel="shortcut icon" href="{{asset('favicon.png')}}">
    <meta name="author" content="Astroduniya">
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs/dist/tf.min.js"> </script>

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

</body>
</html>