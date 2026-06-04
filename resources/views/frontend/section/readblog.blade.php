<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title', ($post->meta_title ?: ('Blog : ' . $post->title)) . ' - Astroduniya')
@section('description', $post->meta_description ?: ($post->excerpt ?: 'Get Astrological information, news, blogs, article of spiritual activities and many other subjects.'))
@section('keywords','astrology blogs, astrology articles, astrology news, astrology discussion, popular blogs, read blogs, blog sites')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Blog"; 
	$toolbar_title="Read Blog";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')
	
<section>
<div class="container">
	<div class="row">
		<!-- BLOG ARTICLE -->
		<div class="col-lg-9 order-1 order-lg-1">
			<div>
				<h2>{{ $post->title }}</h2>

				@if ($post->excerpt)
					<p class="text-muted fs--18">{{ $post->excerpt }}</p>
				@endif	
				
				<img class="img-responsive" src="{{ asset('images/blog/birth_influence_people.jpg') }}" width="880" alt="about astrology"><br/><br/>

				<div class="mb-5 my-5">
					{!! $post->content !!}
				</div>

				<p class="text-muted border-bottom pb-2 fs--13">
					@if ($post->updated_at)
						Last Update: {{ $post->updated_at->format('M d, Y / h:i A') }}
					@endif
				</p>
				<!-- Tags and share -->
				<div class="row">
					<div class="col-6">

						<h4 class="fs--13 text-muted">
							Similar posts by tag
						</h4>

						<a href="#!" class="text-dark bg-light fs--13 rounded py-2 px-3 m-1 text-decoration-none" rel="nofollow">
							tag 1
						</a>

						<a href="#!" class="text-dark bg-light fs--13 rounded py-2 px-3 m-1 text-decoration-none" rel="nofollow">
							tag 2
						</a>

						<a href="#!" class="text-dark bg-light fs--13 rounded py-2 px-3 m-1 text-decoration-none" rel="nofollow">
							tag 3
						</a>

					</div>

					<div class="col-6 col-6 text-align-end">

						<h4 class="fs--13 text-muted">
							Share with your friends &amp; family
						</h4>

						<!-- social -->
		                <div class="clearfix"> 
		                    <a href="https://wa.me/919699342442/?text=subscribe" target="_blank" aria-label="whatsapp page">
		                       <img src="{{ asset('images/social/whatsapp.png') }}" width="30px" height="30px" alt="whatsapp">
		                    </a>&nbsp;

		                    <a href="#!" target="_blank" aria-label="facebook page">
		                       <img src="{{ asset('images/social/facebook.png') }}" width="30px" height="30px" alt="facebook">
		                    </a>&nbsp;

		                    <a href="#!" target="_blank" aria-label="twitter page">
		                        <img src="{{ asset('images/social/twitter.png') }}" width="30px" height="30px" alt="twitter">
		                    </a>&nbsp;

		                </div>
		                <!-- /social -->

					</div>
				</div>
				<!-- /Tags and share -->


			</div>


		</div>
		<!-- /BLOG ARTICLE -->

		<!-- BLOG SIDEBAR -->
		<div class="col-lg-3 order-2 order-lg-2 mb-5">
			@include('frontend.section.sidebar.sidebar')
		</div>
		<!-- /BLOG SIDEBAR -->

	</div>


</div>
</section>
	
@endsection
<!-- End Section -->
