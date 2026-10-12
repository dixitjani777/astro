@extends('frontend.themes.light.layouts.inner')

@section('title', $pageTitle ?? 'Horoscope')
@section('inner-content')
    <article class="light-horoscope-page">
        <h2>{{ $pageTitle ?? 'Horoscope' }}</h2>
        @if(!empty($cms))
            @if($cms->title)<h3>{{ $cms->title }}</h3>@endif
            <div>{!! $cms->content !!}</div>
        @else
            <p>Horoscope information will be available here.</p>
        @endif
    </article>
@endsection

@section('sidebar')
    @include('frontend.themes.light.partials.sidebar')
@endsection
