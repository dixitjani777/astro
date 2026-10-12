@extends('frontend.themes.light.layouts.inner')

@section('title', $page->title)
@section('description', $page->meta_description ?: $page->title)
@section('inner-content')
    <article class="light-cms-page">
        <h2>{{ $page->title }}</h2>
        <div>{!! $page->content !!}</div>
    </article>
@endsection

@section('sidebar')
    @include('frontend.themes.light.partials.sidebar')
@endsection
