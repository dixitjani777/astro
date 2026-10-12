@extends('frontend.themes.light.layouts.inner')

@section('title', $signLabel . ' Daily Horoscope')
@section('inner-content')
    <article class="light-horoscope-page">
        <h2>{{ $signLabel }} Daily Horoscope</h2>
        <p>{{ $forDate->format('d M Y') }} ({{ $timezone }})</p>
        @if($pageContent)
            @if($pageContent->title)<h3>{{ $pageContent->title }}</h3>@endif
            <div>{!! $pageContent->content !!}</div>
        @endif
        @if($horoscope && $horoscope->description)
            <div>{!! nl2br(e($horoscope->description)) !!}</div>
        @else
            <p>Today's horoscope is currently unavailable.</p>
        @endif
    </article>
@endsection

@section('sidebar')
    @include('frontend.themes.light.partials.sidebar')
@endsection
