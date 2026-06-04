<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title', ($page->meta_title ?: $page->title) . ' - ' . ($siteSettings['site.name'] ?? 'Astroduniya'))
@section('description', $page->meta_description ?: ($page->title))
@section('keywords', $page->title)
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php
	$toolbar_page = $page->title;
	$toolbar_title = $page->title;
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<!-- CONTENT -->
<section>
	<div class="container">
		{!! $page->content !!}
	</div>
</section>
<!-- /CONTENT -->

@endsection
<!-- End Section -->

