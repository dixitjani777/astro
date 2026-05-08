<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Team Work : We Work To Make Smile On Each Face - Astroduniya')
@section('description','Our team provide services of astrology, horoscope, astrologer, panditji booking, buy gemstones and much more. Our mission is to make to smile on each face.')
@section('keywords','astroduniya team , astroduniya activity, astrology, astrologer, horoscope, panditji, gemstones')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Team Work"; 
	$toolbar_title="Team Work";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<!-- CSS -->
<link href="{{asset('css/layout-blog.css') }}" rel="stylesheet" type="text/css">
<!-- /CSS -->

<!-- CONTENT -->
<section>
	<div class="container">

		<div>

			<!-- BLOG ARTICLE LIST -->
			<div class="col-md-9 col-sm-9">
				<div id="blog" class="row">
				<!-- article - image -->
				<div class="prev-article row">
					<div class="blog-prev-date col-md-3 col-sm-3">
						<span class="date">
							29 <small>JUN 2014</small>
						</span>
						<span class="info hidden-xs">
							<span class="block"><i class="fa fa-user"></i> BY <a href="blog-without-sidebar.html">ADMIN</a></span>
							<span class="block"><i class="fa fa-folder-open-o"></i> POSTED IN <a href="blog.html">UNCATEGORIZED</a></span>
							<span class="block"><i class="fa fa-comments"></i> WITH <a href="blog-single-sidebar.html#comments">3 COMMENTS</a></span>
							<span class="block"><i class="fa fa-link"></i> <a href="blog-single-sidebar.html">PERMALINK</a></span>
						</span>
					</div>

					<div class="col-md-9 col-sm-9">

						<h2 class="article-title"><a href="blog-single-sidebar.html">This is an <span>Image Post</span></a></h2>

						<!-- image -->
						<figure>
							<a href="blog-single-sidebar.html">
								<img src="{{ asset('images/blog/birth_influence.jpg') }}" class="img-responsive" alt="blog" />
							</a>
						</figure>

						<!-- blog short preview -->
						<p>
							Praesent augue arcu, ornare ut tincidunt eu, mattis a libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In elit purus, ullamcorper vel luctus vitae, venenatis eu odio. Vivamus tincidunt, urna quis consectetur venenatis, quam urna tincidunt mi, quis convallis enim dolor sed elit. Pellentesque ultricies congue lacus, eget elementum erat lobortis et. Sed non velit neque.
						</p>

						<!-- read more button -->
						<div class="text-right">
							<a href="blog-single-sidebar.html" class="read-more btn btn-xs"><i class="fa fa-sign-out"></i> READ MORE</a>
						</div>

					</div>
				</div>
				<!-- /article - image -->

				<!-- article - gallery -->
				<div class="prev-article row">
					<div class="blog-prev-date col-md-3 col-sm-3">
						<span class="date">
							29 <small>JUN 2014</small>
						</span>
						<span class="info hidden-xs">
							<span class="block"><i class="fa fa-user"></i> BY <a href="blog-without-sidebar.html">ADMIN</a></span>
							<span class="block"><i class="fa fa-folder-open-o"></i> POSTED IN <a href="blog.html">UNCATEGORIZED</a></span>
							<span class="block"><i class="fa fa-comments"></i> WITH <a href="blog-single-sidebar.html#comments">3 COMMENTS</a></span>
							<span class="block"><i class="fa fa-link"></i> <a href="blog-single-sidebar.html">PERMALINK</a></span>
						</span>
					</div>

					<div class="col-md-9 col-sm-9">

						<h2 class="article-title"><a href="blog-single-sidebar.html">This is a <span>Gallery Post</span></a></h2>

						<!-- carousel -->
						<div class="owl-carousel text-center controlls-over" data-plugin-options='{"items": 1, "singleItem": true, "navigation": true, "pagination": true, "autoPlay": true, "transitionStyle":"fadeUp"}'><!-- transitionStyle: fade, backSlide, goDown, fadeUp,  -->
							<div class="item">
								<img src="{{ asset('images/blog/birth_influence.jpg') }}" class="img-responsive" alt="img" />
							</div>
							<div class="item">
								<img src="{{ asset('images/blog/birth_influence.jpg') }}" class="img-responsive" alt="img" />
							</div>
						</div>
						<!-- /carousel -->

						<!-- blog short preview -->
						<p>
							Praesent augue arcu, ornare ut tincidunt eu, mattis a libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In elit purus, ullamcorper vel luctus vitae, venenatis eu odio. Vivamus tincidunt, urna quis consectetur venenatis, quam urna tincidunt mi, quis convallis enim dolor sed elit. Pellentesque ultricies congue lacus, eget elementum erat lobortis et. Sed non velit neque.
						</p>

						<!-- read more button -->
						<div class="text-right">
							<a href="blog-single-sidebar.html" class="read-more btn btn-xs"><i class="fa fa-sign-out"></i> READ MORE</a>
						</div>

					</div>

				</div>
				<!-- /article - gallery -->

				<!-- article - gallery -->
				<div class="prev-article row">
					<div class="blog-prev-date col-md-3 col-sm-3">
						<span class="date">
							29 <small>JUN 2014</small>
						</span>
						<span class="info hidden-xs">
							<span class="block"><i class="fa fa-user"></i> BY <a href="blog-without-sidebar.html">ADMIN</a></span>
							<span class="block"><i class="fa fa-folder-open-o"></i> POSTED IN <a href="blog.html">UNCATEGORIZED</a></span>
							<span class="block"><i class="fa fa-comments"></i> WITH <a href="blog-single-sidebar.html#comments">3 COMMENTS</a></span>
							<span class="block"><i class="fa fa-link"></i> <a href="blog-single-sidebar.html">PERMALINK</a></span>
						</span>
					</div>

					<div class="col-md-9 col-sm-9">

						<h2 class="article-title"><a href="blog-single-sidebar.html">This is a <span>Gallery Post</span></a></h2>

						<!-- carousel -->
						<div class="owl-carousel text-center controlls-over" data-plugin-options='{"items": 1, "singleItem": true, "navigation": true, "pagination": true, "autoPlay": true, "transitionStyle":"fadeUp"}'><!-- transitionStyle: fade, backSlide, goDown, fadeUp,  -->
							<div class="item">
								<img src="{{ asset('images/blog/birth_influence.jpg') }}" class="img-responsive" alt="img" />
							</div>
							<div class="item">
								<img src="{{ asset('images/blog/birth_influence.jpg') }}" class="img-responsive" alt="img" />
							</div>
						</div>
						<!-- /carousel -->

						<!-- blog short preview -->
						<p>
							Praesent augue arcu, ornare ut tincidunt eu, mattis a libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In elit purus, ullamcorper vel luctus vitae, venenatis eu odio. Vivamus tincidunt, urna quis consectetur venenatis, quam urna tincidunt mi, quis convallis enim dolor sed elit. Pellentesque ultricies congue lacus, eget elementum erat lobortis et. Sed non velit neque.
						</p>

						<!-- read more button -->
						<div class="text-right">
							<a href="blog-single-sidebar.html" class="read-more btn btn-xs"><i class="fa fa-sign-out"></i> READ MORE</a>
						</div>

					</div>

				</div>
				<!-- /article - gallery -->
				</div>
			</div>
			<!-- /BLOG ARTICLE LIST -->

			
			<div class="col-md-3 col-sm-3">
				@include('frontend.section.sidebar.sidebar')
			</div>

		</div>


	</div>
</section>
<!-- /CONTENT -->
	
@endsection
<!-- End Section -->
