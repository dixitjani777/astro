@extends('frontend.themes.light.layouts.inner')

@section('title', $post->title)
@section('inner-content')
    <article class="light-blog-single">
        <h2>{{ $post->title }}</h2>
        @if($post->published_at)<p>{{ $post->published_at->format('d M Y') }}</p>@endif
        @if($post->image_path)
            <img src="{{ asset('storage/' . ltrim($post->image_path, '/')) }}" alt="{{ $post->title }}" class="img-responsive">
        @endif
        <div>{!! $post->body !!}</div>
    </article>
@endsection

@section('sidebar')
    @include('frontend.themes.light.partials.sidebar')
@endsection
