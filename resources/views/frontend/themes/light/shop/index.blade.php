@extends('frontend.themes.light.layouts.inner')

@section('title', $pageTitle ?? 'Gemstones')
@section('inner-content')
    <article class="light-shop-page">
        <h2>{{ $pageTitle ?? 'Gemstones' }}</h2>
        @if(!empty($gemstone))
            <div class="light-product-card">
                <h3>{{ ucwords(str_replace('_', ' ', $gemstone)) }}</h3>
                <p>Discover the traditional astrological benefits and guidance for this gemstone.</p>
                <a class="hs_btn_hover" href="{{ url('/contact') }}">Enquire now</a>
            </div>
        @else
            <div class="row">
                @foreach(['blue_sapphire', 'ruby', 'emerald', 'pearl', 'red_coral', 'yellow_sapphire', 'diamond', 'hessonite', 'cats_eye'] as $item)
                    <div class="col-md-4 col-sm-6">
                        <div class="light-product-card text-center">
                            <img class="light-product-icon" src="{{ asset('images/stones/stone.png') }}" alt="{{ ucwords(str_replace('_', ' ', $item)) }} gemstone">
                            <h3>{{ ucwords(str_replace('_', ' ', $item)) }}</h3>
                            <a href="{{ url('/gemstone/purchase/' . $item) }}">View gemstone</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </article>
@endsection

@section('sidebar')
    @include('frontend.themes.light.partials.sidebar')
@endsection
