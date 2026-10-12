@extends('frontend.themes.light.layouts.inner')

@section('title', 'Astrology Blog')
@section('inner-content')
    <div class="light-blog-list">
        <h2>Astrology Blog</h2>
        @forelse($posts as $post)
            <article class="light-blog-card">
                @if($post->image_path)
                    <img src="{{ asset('storage/' . ltrim($post->image_path, '/')) }}" alt="{{ $post->title }}" class="img-responsive">
                @endif
                <h3><a href="{{ url('/readblog/' . $post->slug) }}">{{ $post->title }}</a></h3>
                <p>{{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->body), 180) }}</p>
                <a href="{{ url('/readblog/' . $post->slug) }}">Read more</a>
            </article>
        @empty
            <p>No blog posts are available.</p>
        @endforelse
        {{ $posts->links() }}
    </div>
@endsection

@section('sidebar')
    @include('frontend.themes.light.partials.sidebar')
@endsection
