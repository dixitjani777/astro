<!-- layout, title, description, keywords -->
@extends(app(\App\Support\FrontendTheme::class)->active() === 'light' ? 'frontend.themes.light.layouts.master' : 'frontend.layouts.master')
@section('title','Blogs : Astrological articles and discussion - Astroduniya')
@section('description','Get Astrological information, news, blogs, article of spiritual activities and many other subjects.')
@section('keywords','astrology blogs, astrology articles, astrology news, astrology discussion, popular blogs, read blogs, blog sites')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Blogs"; 
	$toolbar_title="Blog List";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@if(app(\App\Support\FrontendTheme::class)->active() === 'light')
<section class="hs_indx_title_main_wrapper">
	<div class="hs_title_img_overlay"></div>
	<div class="container"><div class="row">
		<div class="col-lg-12 full_width"><div class="hs_indx_title_left_wrapper"><h2>Blogs</h2></div></div>
		<div class="col-lg-12 full_width"><div class="hs_indx_title_right_wrapper"><ul><li><a href="{{ url('/') }}">Home</a> &nbsp;&nbsp;&nbsp;&gt;</li><li>Blogs</li></ul></div></div>
	</div></div>
</section>
@else
@include('frontend.layouts.subnav')
@endif
	
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-9 order-1 order-lg-1">
			<div>
				<!-- posts -->
				<div class="row">
					@forelse ($posts as $post)
						<a href='{{ url("/readblog/{$post->slug}") }}' class="col-12 col-md-6 mb-5 position-relative text-dark clearfix text-decoration-none">

							<figure class="d-block text-center overlay-dark-hover overlay-opacity-2 rounded overflow-hidden">
								<img class="img-fluid rounded" src="{{ asset('images/blog/birth_influence.jpg') }}" alt="{{ $post->title }}">
							</figure>

							<p class="mt-3 fs--20 mb-2">
								<span class="h6-xs text-dark d-block">
									{{ $post->title }}
								</span>

								<span class="d-block text-muted font-regular fs--14">
									Post Date:
									@if ($post->published_at)
										<time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('d M Y') }}</time>
									@else
										<time>—</time>
									@endif
								</span>
							</p>

						</a>
					@empty
						<div class="col-12">
							<p class="text-muted">No blog posts found.</p>
						</div>
					@endforelse


				</div>
				<!-- /posts -->

				@if (method_exists($posts, 'links'))
					<div class="mt-3">
						{{ $posts->links() }}
					</div>
				@endif
				
			</div>	
			</div>

		<div class="col-lg-3 order-2 order-lg-2 mb-5">
			@include('frontend.section.sidebar.sidebar')
		</div>

		</div>

	</div>
</section>

@endsection
<!-- End Section -->
