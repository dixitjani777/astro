@extends('frontend.themes.light.layouts.master')

@section('title', $pageTitle ?? 'Astroduniya')
@section('description', $pageDescription ?? 'Astroduniya astrology services')

@section('content')
    <section class="hs_indx_title_main_wrapper">
        <div class="hs_title_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 full_width">
                    <div class="hs_indx_title_left_wrapper">
                        <h2>@yield('title', $pageTitle ?? ($page->title ?? 'Astroduniya'))</h2>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 full_width">
                    <div class="hs_indx_title_right_wrapper">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a> &nbsp;&nbsp;&nbsp;&gt;</li>
                            <li>@yield('title', $pageTitle ?? ($page->title ?? 'Page'))</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hs_inner_content_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @yield('inner-content')
                </div>
                @hasSection('sidebar')
                    <aside class="col-md-4">
                        @yield('sidebar')
                    </aside>
                @endif
            </div>
        </div>
    </section>
@endsection
