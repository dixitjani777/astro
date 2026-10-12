@extends('frontend.themes.light.layouts.master')

@section('title', 'Astroduniya - Astrology and Horoscope')
@section('description', 'Astrology, horoscope, gemstones and Panditji services from Astroduniya.')

@section('content')
    <section class="slider-area" style="background-image:url('{{ asset('themes/light/images/header/slide1.jpg') }}');">
        <div id="light-home-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
            @if(!empty($homeSlides) && $homeSlides->isNotEmpty())
                @foreach($homeSlides as $slide)
                    <div class="item {{ $loop->first ? 'active' : '' }}"><div class="carousel-captions caption-{{ $loop->iteration }}"><div class="container"><div class="content">
                        <h1 data-animation="animated bounceInLeft">{{ $slide->title }}</h1>
                        @if($slide->subtitle)
                            <p data-animation="animated bounceInUp">{{ $slide->subtitle }}</p>
                        @endif
                        @if($slide->button_url)
                            <div class="hs_effect_btn"><ul><li data-animation="animated flipInX"><a class="hs_btn_hover" href="{{ $slide->button_url }}">{{ $slide->button_text ?: 'Read More' }}</a></li></ul></div>
                        @endif
                    </div></div></div></div>
                @endforeach
            @else
                <div class="item active"><div class="carousel-captions caption-1"><div class="container"><div class="content"><h1 data-animation="animated bounceInLeft">Welcome To</h1><h2 data-animation="animated zoomInDown">the <span>Jyotish</span> Astrology</h2><p data-animation="animated bounceInUp">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi<br> elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio.</p><div class="hs_effect_btn"><ul><li data-animation="animated flipInX"><a class="hs_btn_hover" href="{{ url('/query') }}">Read More</a></li></ul></div></div></div></div></div>
            @endif
            </div>
            <a class="left carousel-control" href="#light-home-carousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control" href="#light-home-carousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </section>

    <section class="hs_about_indx_main_wrapper light-about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="hs_about_left_img_wrapper">
                        <img src="{{ asset('themes/light/images/content/about_img.jpg') }}" alt="About astrology" class="img-responsive">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="hs_about_heading_main_wrapper">
                        <div class="hs_about_heading_wrapper">
                            <h2>About <span>Astrology</span></h2>
                            <h4><span>&nbsp;</span></h4>
                        </div>
                    </div>
                    <div class="hs_about_right_cont_wrapper">
                        <h1>+91 2818-7280</h1>
                        <h2>Astrology for your journey</h2>
                        <p>Astrology helps you understand your strengths, opportunities, and path in life through the wisdom of the stars.</p>
                        <div class="hs_effect_btn hs_about_btn"><ul><li><a href="{{ url('/astrology/about') }}" class="hs_btn_hover">Read more</a></li></ul></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(!empty($homeTopAdBanners) && $homeTopAdBanners->isNotEmpty())
        <section class="container light-home-ads">@foreach($homeTopAdBanners as $banner)<a href="{{ $banner->link_url ?: '#' }}"><img src="{{ asset('storage/' . ltrim($banner->image_path, '/')) }}" alt="{{ $banner->title ?: 'Advertisement' }}" class="img-responsive"></a>@endforeach</section>
    @endif

    <section class="hs_service_main_wrapper">
        <div class="container">
            <div class="hs_about_heading_main_wrapper text-center"><h2>Our Most <span>Services</span></h2><h4><span>&nbsp;</span></h4><p>Explore our astrology and spiritual services.</p></div>
            <div class="row">
                @forelse(($homeServices ?? collect()) as $service)
                    <div class="col-md-4 col-sm-6">
                        <div class="hs_title_box_main_wrapper light-service-card text-center">
                            <div class="hs_title_img_wrapper"><img src="{{ asset('themes/light/images/content/title_img' . (($loop->index % 3) + 1) . '.jpg') }}" alt="{{ $service->title }}" class="img-responsive"></div>
                            <div class="hs_title_img_cont_wrapper">
                            <h3>{{ $service->title }}</h3>
                            @if($service->description)<p>{{ $service->description }}</p>@endif
                            </div>
                        </div>
                    </div>
                @empty
                    @foreach(['Astrology Guidance', 'Horoscope Reading', 'Spiritual Services'] as $serviceTitle)
                        <div class="col-md-4 col-sm-6"><div class="hs_title_box_main_wrapper light-service-card text-center"><div class="hs_title_img_wrapper"><img src="{{ asset('themes/light/images/content/title_img' . (($loop->index % 3) + 1) . '.jpg') }}" alt="{{ $serviceTitle }}" class="img-responsive"></div><div class="hs_title_img_cont_wrapper"><h3>{{ $serviceTitle }}</h3><p>Guidance and support for your journey.</p></div></div></div>
                    @endforeach
                @endforelse
            </div>
            <div class="text-center light-services-more"><a class="hs_btn_hover" href="{{ url('/panditji/services') }}">View All Services</a></div>
        </div>
    </section>

    @php($astrologyServices = [
        ['icon' => 'flaticon-success', 'title' => 'Career'],
        ['icon' => 'flaticon-marry-me', 'title' => 'Marriage'],
        ['icon' => 'flaticon-islamic-temple', 'title' => 'Worship Lesson'],
        ['icon' => 'flaticon-pregnancy', 'title' => 'Pregnancy'],
        ['icon' => 'flaticon-engagement-ring', 'title' => 'Manglik Dosha'],
        ['icon' => 'flaticon-animal', 'title' => 'Kundli Dosha'],
        ['icon' => 'flaticon-giftboxes', 'title' => 'Festivals'],
        ['icon' => 'flaticon-baby-with-diaper', 'title' => 'Name Analysis'],
    ])
    <section class="hs_service_main_wrapper light-astrology-services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hs_about_heading_main_wrapper">
                        <div class="hs_about_heading_wrapper">
                            <h2>Our <span>Services</span></h2>
                            <h4><span>&nbsp;</span></h4>
                            <p>Explore astrology guidance for the important questions and moments in your life.</p>
                        </div>
                    </div>
                </div>
                @foreach($astrologyServices as $astrologyService)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="hs_service_main_box_wrapper">
                            <div class="hs_service_icon_wrapper">
                                <i class="{{ $astrologyService['icon'] }}" aria-hidden="true"></i>
                                <div class="btc_step_overlay"></div>
                            </div>
                            <div class="hs_service_icon_cont_wrapper">
                                <h2>{{ $astrologyService['title'] }}</h2>
                                <p>Get personal astrology guidance and insights for your journey.</p>
                                <h5><a href="{{ url('/query') }}">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @php($zodiacSigns = ['aries' => 'Aries', 'taurus' => 'Taurus', 'gemini' => 'Gemini', 'cancer' => 'Cancer', 'leo' => 'Leo', 'virgo' => 'Virgo', 'libra' => 'Libra', 'scorpio' => 'Scorpio', 'sagittarius' => 'Sagittarius', 'capricorn' => 'Capricorn', 'aquarius' => 'Aquarius', 'pisces' => 'Pisces'])
    <section class="hs_sign_wrapper light-theme-section">
        <div class="container">
            <div class="hs_about_heading_main_wrapper text-center"><h2>Choose Your <span>Zodiac Sign</span></h2><h4><span>&nbsp;</span></h4><p>Read your daily horoscope and discover what the stars have in store for you.</p></div>
            <div class="row">
                @foreach($zodiacSigns as $slug => $label)
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <a href="{{ url('/horoscope/daily/' . $slug) }}" class="hs_sign_box">
                            <div class="sign_box_img"><img src="{{ asset('themes/light/images/content/icon' . $loop->iteration . '.png') }}" alt="{{ $label }}"></div>
                            <div class="sign_box_cont"><h2>{{ $label }}</h2><p>Daily Horoscope</p></div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="hs_about_main_wrapper light-theme-section">
        <div class="container"><div class="row align-items-center">
            <div class="col-md-6 col-md-push-6"><img src="{{ asset('themes/light/images/content/title_img3.jpg') }}" alt="Who we are" class="img-responsive"></div>
            <div class="col-md-6 col-md-pull-6"><div class="hs_about_heading_main_wrapper"><h2>Who <span>We Are</span>?</h2><h4><span>&nbsp;</span></h4><p>Astroduniya brings together astrology knowledge, experienced guidance, horoscope insights, gemstones, and spiritual services in one trusted place.</p><a class="hs_btn_hover" href="{{ url('/about') }}">Know More</a></div></div>
        </div></div>
    </section>

    @if(!empty($offers) && $offers->isNotEmpty())
        <section class="container light-home-offers"><h2 class="text-center">Special Offers</h2><div class="row">
            @foreach($offers as $offer)<div class="col-md-4"><a href="{{ $offer->link_url ?: '#' }}"><div class="light-offer-card">@if($offer->image_path)<img src="{{ asset('storage/' . ltrim($offer->image_path, '/')) }}" alt="{{ $offer->title }}" class="img-responsive">@endif<h3>{{ $offer->title }}</h3></div></a></div>@endforeach
        </div></section>
    @endif

    @if(!empty($homeBottomAdBanners) && $homeBottomAdBanners->isNotEmpty())
        <section class="container light-home-ads">@foreach($homeBottomAdBanners as $banner)<a href="{{ $banner->link_url ?: '#' }}"><img src="{{ asset('storage/' . ltrim($banner->image_path, '/')) }}" alt="{{ $banner->title ?: 'Advertisement' }}" class="img-responsive"></a>@endforeach</section>
    @endif
@endsection
