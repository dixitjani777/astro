
<!-- mobile trigger : expand -->
<button class="clearfix btn btn-toggle btn-sm btn-block text-align-left shadow-md border rounded mb-1 d-block d-lg-none" data-target="#sidebar_expand_mobile" data-toggle-container-class="d-none d-sm-block bg-white shadow-md border animate-fadein rounded p-3">
	<span class="group-icon px-2 py-2 float-start">
		<i class="fi fi-bars-2"></i>
		<i class="fi fi-close"></i>
	</span>

	<span class="h5 py-2 m-0 float-start">
		Explore
	</span>
</button>


<div id="sidebar_expand_mobile" class="d-none d-lg-block">

	<h3 class="h4 mt-3 mt-0-xs mb-3">
		QUICK LINKS
	</h3>
	<ul class="list-unstyled">

		<li class="list-item border-bottom py-1">
			<a class="text-dark font-weight-light fs--15" href="{{ url('/astrology/planets') }}">Planets</a>
		</li>

		<li class="list-item border-bottom py-1">
			<a class="text-dark font-weight-light fs--15" href="{{ url('/astrology/signs') }}">Zodiac Signs</a>
		</li>

		<li class="list-item border-bottom py-1">
			<a class="text-dark font-weight-light fs--15" href="{{ url('/query') }}">Ask Query to Astrologer</a>
		</li>

		<li class="list-item border-bottom py-1">
			<a class="text-dark font-weight-light fs--15" href="{{ url('/horoscope/minihreport') }}">Horoscope Report<span class="badge badge-secondary badge-soft position-absolute absolute-top right-0 ml-2 mr-2">Offer</span></a>
		</li>

		<li class="list-item border-bottom py-1">
			<a class="text-dark font-weight-light fs--15" href="{{ url('/horoscope/minimreport') }}">Match-Making Report</a>
		</li>

		<li class="list-item border-bottom py-1">
			<a class="text-dark font-weight-light fs--15" href="{{ url('/astrologer/callbooking') }}">Book Astrologer<span class="badge badge-secondary badge-soft position-absolute absolute-top right-0 ml-2 mr-2">Trend</span></a>
		</li>

	</ul>

	<div id="clipboard_2" class="mb-3">
		<!-- Youtube -->
		<h3 class="h4 pt-3 pb-3 m-1 d-lg-block mb-2">
			FEATURED VIDEO
		</h3>
		<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/XMYpzc5jhzc"></iframe>
		</div>
		<h4 class="fs--13 text-gray-500 font-weight-normal mt-1 mb-0">
			How it work ? 
		</h4>
	</div><br/>

	<div>	
		<h3 class="h4 pt-3 pb-3 m-1 d-lg-block mb-2">
			OFFER
		</h3>
		<div class="swiper-container swiper-preloader swiper-btn-group swiper-btn-group-end text-white" 
			data-swiper='{
				"slidesPerView": 1,
				"spaceBetween": 0,
				"autoplay": true,
				"loop": true,
				"pagination": { "type": "bullets" }
			}'>

			<div class="swiper-wrapper h--400">

				<div class="swiper-slide h-100 d-middle bg-white bg-cover" style="background:url('{{ url('/images/offers/off_1.png') }}')">
					
				</div>

				<div class="swiper-slide h-100 d-middle bg-white bg-cover" style="background:url('{{ url('/images/offers/off_2.png') }}')">
					
				</div>

			</div>

			<!-- Add Arrows -->
			<div class="swiper-button-next swiper-button-white"></div>
			<div class="swiper-button-prev swiper-button-white"></div>

			<!-- Add Pagination -->
			<div class="swiper-pagination"></div>

		</div>

	</div><br/><br/><br/>
	

	<div>
		<iframe 
		src="http://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fstepofweb&amp;width=263&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" style="border:none; overflow:hidden; width:263px;height:200px;">
		</iframe>
	</div>

	<div class="media">
		<img src="{{ asset('images/other/photowe.jpg') }}" class="h--60 float-start" alt="...">
		
		<div class="media-body">
			<h5 class="mt-0">Dixit Jani</h5>
			<p class="fs--13">The brain behind astroduniya. <br/><span><a href="">Know more about him</a></span> </p>
			
		</div>
	</div><br/>

	<div>
		<h3 class="h4 mt-0-xs mb-3">
			Follow Us
		</h3>
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

            <a href="#!" target="_blank" aria-label="youtube page">
                <img src="{{ asset('images/social/utube.png') }}" width="30px" height="30px" alt="youtube">
            </a>&nbsp;
           
            <a href="#!" target="_blank" aria-label="instagram page">
               <img src="{{ asset('images/social/instagram.png') }}" width="30px" height="30px" alt="instagram">
            </a>
        </div>
        <!-- /social -->
	</div>


	<?php if ( Request::segment(1)=='gemstone' && Request::segment(2)=='about'  ? 'active' : '' ) : ?><br/>
	<div>
		<a href="#!" class="mt-5 d-block text-center overlay-dark-hover overlay-opacity-2 rounded overflow-hidden">
			<img class="w-100 img-fluid rounded" src="{{ asset('images/offers/off_1.png') }}" alt="...">
		</a>

		<h4 class="fs--13 text-gray-500 font-weight-normal mt-1 mb-0">
			Sponsored Ad
		</h4>
	</div>

	<div>
		<a href="#!" class="mt-5 d-block text-center overlay-dark-hover overlay-opacity-2 rounded overflow-hidden">
			<img class="w-100 img-fluid rounded" src="{{ asset('images/offers/off_1.png') }}" alt="...">
		</a>

		<h4 class="fs--13 text-gray-500 font-weight-normal mt-1 mb-0">
			Sponsored Ad
		</h4>
	</div>

	<div>
		<a href="#!" class="mt-5 d-block text-center overlay-dark-hover overlay-opacity-2 rounded overflow-hidden">
			<img class="w-100 img-fluid rounded" src="{{ asset('images/offers/off_1.png') }}" alt="...">
		</a>

		<h4 class="fs--13 text-gray-500 font-weight-normal mt-1 mb-0">
			Sponsored Ad
		</h4>
	</div>

	<div>
		<a href="#!" class="mt-5 d-block text-center overlay-dark-hover overlay-opacity-2 rounded overflow-hidden">
			<img class="w-100 img-fluid rounded" src="{{ asset('images/offers/off_1.png') }}" alt="...">
		</a>

		<h4 class="fs--13 text-gray-500 font-weight-normal mt-1 mb-0">
			Sponsored Ad
		</h4>
	</div>

	<div>
		<a href="#!" class="mt-5 d-block text-center overlay-dark-hover overlay-opacity-2 rounded overflow-hidden">
			<img class="w-100 img-fluid rounded" src="{{ asset('images/offers/off_1.png') }}" alt="...">
		</a>

		<h4 class="fs--13 text-gray-500 font-weight-normal mt-1 mb-0">
			Sponsored Ad
		</h4>
	</div>

	<div>
		<a href="#!" class="mt-5 d-block text-center overlay-dark-hover overlay-opacity-2 rounded overflow-hidden">
			<img class="w-100 img-fluid rounded" src="{{ asset('images/offers/off_1.png') }}" alt="...">
		</a>

		<h4 class="fs--13 text-gray-500 font-weight-normal mt-1 mb-0">
			Sponsored Ad
		</h4>
	</div>

	<div>
		<a href="#!" class="mt-5 d-block text-center overlay-dark-hover overlay-opacity-2 rounded overflow-hidden">
			<img class="w-100 img-fluid rounded" src="{{ asset('images/offers/off_1.png') }}" alt="...">
		</a>

		<h4 class="fs--13 text-gray-500 font-weight-normal mt-1 mb-0">
			Sponsored Ad
		</h4>
	</div>

	<div>
		<a href="#!" class="mt-5 d-block text-center overlay-dark-hover overlay-opacity-2 rounded overflow-hidden">
			<img class="w-100 img-fluid rounded" src="{{ asset('images/offers/off_1.png') }}" alt="...">
		</a>

		<h4 class="fs--13 text-gray-500 font-weight-normal mt-1 mb-0">
			Sponsored Ad
		</h4>
	</div>
	<?php endif; ?>

</div>