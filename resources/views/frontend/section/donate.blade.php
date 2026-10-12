<!-- layout, title, description, keywords -->
@extends(app(\App\Support\FrontendTheme::class)->active() === 'light' ? 'frontend.themes.light.layouts.master' : 'frontend.layouts.master')
@section('title','Donate - Astroduniya')
@section('description','A donation is a gift for charity, humanitarian aid, or to benefit a cause.')
@section('keywords','donate, donation, donate for child education, donate for old age home, donate for pandit ji meal, ')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php
	$toolbar_page="Donate"; 
	$toolbar_title="Your support matters";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@if(app(\App\Support\FrontendTheme::class)->active() === 'light')
<section class="hs_indx_title_main_wrapper">
	<div class="hs_title_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 full_width"><div class="hs_indx_title_left_wrapper"><h2>Your support matters</h2></div></div>
			<div class="col-lg-12 full_width">
				<div class="hs_indx_title_right_wrapper"><ul><li><a href="{{ url('/') }}">Home</a> &nbsp;&nbsp;&nbsp;&gt;</li><li>Donate</li></ul></div>
			</div>
		</div>
	</div>
</section>
@else
@include('frontend.layouts.subnav')
@endif

<!-- CSS -->
<link href="{{asset('css/flexslider.css') }}" rel="stylesheet" type="text/css">
<!-- /CSS -->

<section class="nopadding-bottom light-donate-page">
	<div class="container">
		<div class="row">
			<!-- FLEX SLIDER -->
			<div class="slider slick-frame donate-slider-wrap">
				<div class="flexslider flexFull donate-slider">
					<!-- height-150, height-200 , height-250 ... height-600 -->
					<ul class="slides height-400">
						<li>
							<div class="img-responsive img_style2">
								<img class="donate-slide-image" src="{{ asset('images/other/baby_name.jpg') }}" alt="Donate for child education">

								<div class="container">
									<div class="box right">
										<h3 class="subTitle">Donate for child education</h3>
										<p>Gift a child a life of hope.</p>
										<p><a href="{{ url('/donate#donatenow')}}" class="btn btn-small btn-primary">Donate Now</a>
									</div>
								</div>

							</div>
						</li>
						<li>
							<div class="img-responsive img_style3">
								<img class="donate-slide-image" src="{{ asset('images/services/team_activity.jpg') }}" alt="Donate to an old age home">

								<div class="container">
									<div class="box right">
										<h3 class="subTitle">Donate for old age home</h3>
										<p>Help the elderly.</p>
										<p><a href="{{ url('/donate#donatenow')}}" class="btn btn-small btn-primary">Donate Now</a>
									</div>
								</div>

							</div>
						</li>
						<li>
							<div class="img-responsive img_style1">
								<img class="donate-slide-image" src="{{ asset('images/services/pt2.jpg') }}" alt="Donate for Pandit Ji meal">

								<div class="container">
									<div class="box right">
										<h3 class="subTitle">Donate for Pandit Ji Meal</h3>
										<p>Take blessing from Pandit Ji.</p>
										<p><a href="{{ url('/donate#donatenow')}}" class="btn btn-small btn-primary">Donate Now</a>
									</div>
								</div>

							</div>
						</li>
					</ul>
				</div>	
			</div>

			<!-- JS -->
			<script src="{{asset('plugins/flexslider/jquery.flexslider-min.js')}}"></script>
			
			<script type="text/javascript">
			    var flex_options = {
			       /* animation: "fade",*/
			       slideshowSpeed: 7000,
			        animationSpeed: 600,
			        pauseOnAction: true,
			        controlNav: true,             
			        directionNav: true
			    }
			    jQuery(function ($) {
			        $('.donate-slider').flexslider(flex_options);
			    });
			</script>
			<!-- /JS -->
			<!-- /FLEX SLIDER -->

			<!-- INFO BAR -->
			<section id="infbr" class="info-bar info-bar-bordered">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<i class="fa fa-graduation-cap donate-info-icon" aria-hidden="true"></i>
							<h2 class="letter-spacing-1 fnt" style=""><b>DONATE FOR CHILD EDUCATION</b></h2>
							<h3 class="letter-spacing-1"><b class="info_sub_clr">Gift a child a life of hope</b></h3>				
						</div>

						<div class="col-md-4">
							<i class="fa fa-heart donate-info-icon" aria-hidden="true"></i>
							<h2 class="letter-spacing-1 fnt"><b>DONATE TO OLD AGE HOME</b></h2>
							<h3 class="letter-spacing-1"><b class="info_sub_clr">Help the elderly</b></h3>
						</div>

						<div class="col-md-4">					
							<i class="fa fa-cutlery donate-info-icon" aria-hidden="true"></i>
							<h2 class="letter-spacing-1 fnt"><b>DONATE FOR PANDIT JI MEAL</b></h2>
							<h3 class="letter-spacing-1"><b class="info_sub_clr">Take blessing from Pandit JI</b></h3>
						</div>

					</div>
				</div>
			</section>
			<!-- /INFO BAR -->
		</div>
	</div>
</section><br/>

{{-- <section>
<div class="container">	
	<div class="row">
		<div class="col-md-7">
			<header>
			<h1 class="font500 styleColor">Donate & Help
				<p class="sub_heading letter-spacing-1">Help with your little donation.</p>
			</h1>
			<div class="divider half-margins"></div>				
			</header>
			
			<p>Astrology is an spiritual science and early culture which says that the quality and fortune of human depend on the situation of the planets at the time of birth. It is guiding thread which help you to upgrade the quality of life. It helps you to make best decisions in life.Astrology is an spiritual science and early culture which says that the quality and at the time of birth.</p>

			<hr class="cus">

			<ul class="list-icon cus_clrg spaced check-circle">
				<li>It makes you better person.</li>
				<li>It help you to make a happy work life.</li>
				<li>It tell you to move with changing of times.</li>
				<li>It tell your real strength and weaknesse.</li>
				<br/>				
			</ul>
		</div>
		
		<div class="col-md-5 text-center"> 
			<br/>
			<div class="embed-responsive embed-responsive-16by9 margin-bottom-60" style="margin-top:-6px;">
				<iframe class="embed-responsive-item" src="http://player.vimeo.com/video/8408210" width="800" height="450"></iframe>
			</div><br/><br/><br/>
			<h4 class="items font500 cus_clrg cusmafq">Help with your little donation.&nbsp;
					<a href="{{ url('/query')}}" class="btn btn-primary noradius cusmarb" rel="noopener" title="ask free query to astrologer"><span>Donate Now</span></a>
			 </h4>
		</div>
	</div>
</div>
</section> --}}


<section class="light-donate-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9 donate-main-column">
			
			<div class="row donate-intro-grid">
			<div class="col-md-6 donate-copy-column">
				<header>
				<h1 class="font500 styleColor">Donate &amp; Help</h1>
				<p class="sub_heading letter-spacing-1">Help with your little donation.</p>
				<div class="divider half-margins"></div>				
				</header>
				
				<p>Astrology is an spiritual science and early culture which says that the quality and fortune of human depend on the situation of the planets at the time of birth. It is guiding thread which help you to upgrade the quality of life. It helps you to make best decisions in life.Astrology is an spiritual science and early culture which says that the quality and at the time of birth.</p>

				<hr class="cus">

				<ul class="list-icon cus_clrg spaced check-circle">
					<li>It makes you better person.</li>
					<li>It help you to make a happy work life.</li>
					<li>It tell you to move with changing of times.</li>
					<li>It tell your real strength and weaknesse.</li>
					<br/>				
				</ul>
			</div>
			
			<div class="col-md-6 text-center donate-video-column">
				<div class="embed-responsive embed-responsive-16by9 margin-bottom-60">
					<iframe class="embed-responsive-item" src="http://player.vimeo.com/video/8408210" width="800" height="450"></iframe>
				</div>
				<h4 class="items font500 cus_clrg cusmafq">Help with your donation.&nbsp;
						<a href="{{ url('/query')}}" class="btn btn-primary noradius cusmarb" rel="noopener" title="ask free query to astrologer"><span>Donate Now</span></a>
				 </h4>
			</div>
		</div>
			<!-- QUERY FORM -->
			<div>
				<x-enquiry-form layout="floating" class="bs-validate d-block bg-white shadow-primary-xs rounded p-4 mb-5" source="donate" context="donation_request" subject="Donation Request" :show-name="false" :show-email="false" :show-phone="false" :show-message="false" message-label="Enter your query here.." submit-label="Send Enquiry & Get Quotes">
					<div class="row">
						<div class="col-12 col-md-6"><div class="form-label-group mb-3"><input required placeholder="Name" type="text" class="form-control" name="name" value="{{ old('name', auth()->user()?->name) }}"><label>Name</label></div></div>
						<div class="col-12 col-md-6"><div class="form-label-group mb-3"><input required placeholder="Number" type="tel" class="form-control" name="phone" value="{{ old('phone', auth()->user()?->phone) }}"><label>Number</label></div></div>
					</div>
					<div class="row">
						<div class="col-12 col-md-6"><div class="form-label-group mb-3"><select class="form-control" name="meta[prayer_service]"><option value="" selected disabled>Select Prayer Service</option><option value="puja_service">Puja Services</option><option value="hawan_service">Hawan Services</option><option value="jaap_shanti_pujas">Jaap &amp; Shanti Pujas</option><option value="katha">Katha</option></select><label>Prayer Service</label></div></div>
						<div class="col-12 col-md-6"><div class="form-label-group mb-3"><select class="form-control" name="meta[subcategory]"><option value="" selected disabled>Select Subcategory</option><option value="puja_service">Puja Services</option><option value="hawan_service">Hawan Services</option><option value="jaap_shanti_pujas">Jaap &amp; Shanti Pujas</option><option value="katha">Katha</option></select><label>Subcategory</label></div></div>
					</div>
					<div class="form-label-group mb-3"><select id="place" class="form-control" name="meta[location_type]"><option value="" selected disabled>Select Location</option><option value="panditji_place">Pandit Ji's Place</option><option value="my_place">My Place</option><option value="epuja">Online E-Puja</option></select><label for="place">Location</label></div>
					<div class="form-label-group mb-4"><textarea required class="form-control" rows="4" name="message" maxlength="3000" placeholder="Enter your query here..">{{ old('message') }}</textarea><label>Enter your query here..</label></div>
				</x-enquiry-form>
					<h5 class="font600 letter-spacing-1 styleColor">Note: You will get instant call from our end.</h5>
					{{-- <h5 class="cus_clrg letter-spacing-0_6"><b style="background-color:#ffff83d4;">You will get instant call from our end.</b></h5> --}}
					
				</div>
				<!-- QUERY FORM END -->

			</div>
			
			<!-- INFO -->
			
			<div class="col-md-3 donate-sidebar">
				@include('frontend.panditji.sidebar.sidebar')
			</div>

		</div>
	</div>
</section>

@endsection
<!-- End Section -->



