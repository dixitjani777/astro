<!-- 
	SWIPER 

	Buttons position:
		.swiper-btn-group-start
		.swiper-btn-group-end
		"effect": "fade"
		swiper-preloader 
		"autoplay": { "delay" : 3500, "disableOnInteraction": false },
	"pagination": { "type": "bullets" }
-->
<section class="swiper-container swiper-btn-group swiper-btn-group-end text-white p-0 home-main-slider"
	data-swiper='{
		"slidesPerView": 1,
		"spaceBetween": 0,
		"autoplay": { "delay" : 5500, "disableOnInteraction": false },
		"loop": true,
		"effect": "fade",
		"pagination": { "type": "bullets" },
		
	}'>

	<div class="swiper-wrapper h-100">

		@if(isset($homeSlides) && $homeSlides->count())
			@foreach($homeSlides as $slide)
				<div class="swiper-slide h-100 bg-white bg-cover" style="background-image:url('{{ asset($slide->image_path) }}')">
					<div class="container z-index-10 text-white slidintext">

						<h2 class="fs--30 line-height-1">
							{{ $slide->title }}
						</h2>

						@if($slide->subtitle || $slide->button_url)
							<p>
								@if($slide->subtitle)
									{!! nl2br(e($slide->subtitle)) !!}
								@endif
								@if($slide->button_url)
									<br/><br/>
									<a href="{{ url($slide->button_url) }}" class="btn btn-sm btn-warning">
										{{ $slide->button_text ?: 'Check it out' }}
									</a>
								@endif
							</p>
						@endif

					</div>
				</div>
			@endforeach
		@else

		<!-- slide 1 -->
		<div class="swiper-slide h-100 bg-white bg-cover" style="background-image:url('images/slider/gemstones.jpg')">
			<div class="container z-index-10 text-white slidintext">

				<h1 class="fs--30 line-height-1">
					Buy Gemstones
					
				</h1>

				<p>
					Order powerfull certified gemstones.
					<br/><br/>
					<a href="#" class="btn btn-sm btn-warning">
						
						Check it out
					</a>
				</p>

				<!-- <p class="mt-5" data-swiper-parallax="-200">

					<a href="#" class="btn btn-danger transition-hover-top">
						<i class="fi fi-arrow-end"></i>
						Check it out
					</a>

				</p> -->

			</div>
		</div>
		<!-- /slide 1 -->


		<!-- slide 2 -->
		<div class="lazy swiper-slide h-100 bg-white bg-cover" style="background-image:url('images/slider/panditji.png')">
			<div class="container z-index-10 text-white slidintext">

				<h2 class="fs--30 line-height-1">
					Book Pandit Ji<br>
					
				</h2>

				<p>
					Consult pandit ji online instantly.
					<br><br>
					<a href="#" class="btn btn-sm btn-warning">
						
						Check it out
					</a>
				</p>

				<!-- <p class="mt-5" data-swiper-parallax="-200">

					<a href="#" class="btn btn-secondary transition-hover-top">
						<i class="fi fi-arrow-end"></i>
						Check it out
					</a>

				</p> -->

			</div>
		</div>
		<!-- /slide 2 -->


		<!-- slide 3 h2-xs  -->
		<div class="lazy swiper-slide h-100 bg-white bg-cover" style="background-image:url('images/slider/online_communication.jpg')">
			<div class="container z-index-10 text-white slidintext">

				<h2 class="fs--30 line-height-1">
					Book Astrologer
				</h2>

				<p>
					Consult astrologer online instantly.
					<br><br>
					<a href="#" class="btn btn-sm btn-warning">
						
						Check it out
					</a>
				</p>

				<!-- <p class="mt-5" data-swiper-parallax="-200">

					<a href="#" class="btn btn-pill btn-warning transition-hover-top">
						<i class="fi fi-arrow-end"></i>
						Check it out
					</a>

				</p> -->

			</div>
		</div>
		<!-- /slide 3 -->

		@endif

	</div>

	<!-- Add Arrows -->
	<div class="swiper-button-next swiper-button-white"></div>
	<div class="swiper-button-prev swiper-button-white"></div>

	<!-- Add Pagination -->
	<!-- <div class="swiper-pagination"></div> -->

</section>	
<!-- /SWIPER -->
