@extends('frontend.themes.light.layouts.inner')

@section('title', $pageTitle ?? 'Services')
@section('inner-content')
    <article class="light-services-page">
        <h2>{{ $pageTitle ?? 'Our Services' }}</h2>
        @if(!empty($panditServices))
            <div class="row">
                @foreach($panditServices as $service)
                    <div class="col-md-6">
                        <div class="light-service-card">
                            <h3>{{ $service->title }}</h3>
                            @if($service->description)<p>{{ $service->description }}</p>@endif
                            <a href="{{ url('/panditji/book') }}">Book now</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Explore our spiritual and astrology services.</p>
            <a class="hs_btn_hover" href="{{ url('/contact') }}">Contact us</a>
        @endif
    </article>
@endsection

@section('sidebar')
    @include('frontend.themes.light.partials.sidebar')
@endsection
