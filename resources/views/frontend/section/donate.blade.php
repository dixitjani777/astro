<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
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
@include('frontend.layouts.subnav')

<!-- CSS -->
<link href="{{asset('css/flexslider.css') }}" rel="stylesheet" type="text/css">
<!-- /CSS -->

<section class="nopadding-bottom">
	<div class="container">
		<div class="row">
			<!-- FLEX SLIDER -->
			<div class="slider" class="slick-frame" style="margin-top:-60px;">
				<div class="flexslider flexFull">
					<!-- height-150, height-200 , height-250 ... height-600 -->
					<ul class="slides height-400">
						<li>
							<div style="background: transparent url('../images/donate/childdonation2.jpg') no-repeat center;" class="img-responsive img_style2">

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
							<div style="background: transparent url('../images/donate/old age.jpg') no-repeat center;" class="img-responsive img_style3">

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
							<div style="background: transparent url('../images/donate/panditji_meal.jpg') no-repeat top;" class="img-responsive img_style1">

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
			</script>
			<!-- /JS -->
			<!-- /FLEX SLIDER -->

			<!-- INFO BAR -->
			<section id="infbr" class="info-bar info-bar-bordered">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<img src="{{ asset('images/donate/infobar/donate.png') }}" class="info_img" alt="expert astrologer">
							<h2 class="letter-spacing-1 fnt" style=""><b>DONATE FOR CHILD EDUCATION</b></h2>
							<h3 class="letter-spacing-1"><b class="info_sub_clr">Gift a child a life of hope</b></h3>				
						</div>

						<div class="col-md-4">
							<img src="{{ asset('images/donate/infobar/donate.png') }}" class="info_img" alt="online support">
							<h2 class="letter-spacing-1 fnt"><b>DONATE TO OLD AGE HOME</b></h2>
							<h3 class="letter-spacing-1"><b class="info_sub_clr">Help the elderly</b></h3>
						</div>

						<div class="col-md-4">					
							<img src="{{ asset('images/donate/infobar/donate.png') }}" class="info_img" alt="secure payment">
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


<section>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
			
			<div class="row">
			<div class="col-md-6">
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
			
			<div class="col-md-6 text-center"> 
				<br/><br/><br/>
				<div class="embed-responsive embed-responsive-16by9 margin-bottom-60" style="margin-top:-6px;">
					<iframe class="embed-responsive-item" src="http://player.vimeo.com/video/8408210" width="800" height="450"></iframe>
				</div><br/><br/><br/>
				<h4 class="items font500 cus_clrg cusmafq">Help with your donation.&nbsp;
						<a href="{{ url('/query')}}" class="btn btn-primary noradius cusmarb" rel="noopener" title="ask free query to astrologer"><span>Donate Now</span></a>
				 </h4>
			</div>
		</div><br/><br/>
			<!-- QUERY FORM -->
			<div>
				<form action="#" method="post" class="sky-form boxed">
					<header class="styleColor font500">Enter Details <span style="font-size:15px;color: #444444;background-color:#ffff83d4;"> &nbsp;You must log in.&nbsp; </span></header>	
					<fieldset>	
						<div class="col-md-8">			
							<div class="row">
								<section class="col col-lg-6 col-md-6 col-sm-6">
									<label class="input">
										<i class="icon-prepend fa fa-user"></i>
										<input type="text" placeholder="Name" data-toggle="tooltip" data-placement="top" data-original-title="Name">
									</label>
								</section>
								<section class="col col-lg-6 col-md-6 col-sm-6">
									<div>
										<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4" style="padding-left: 0px;padding-right: 0px;">
										<label class="select">
											<select>
												<option value="0" selected="" disabled="">IN +91</option>
												<option value="IN +91">IN +91</option>
												<option value="IN +91">UK +44</option>
												<option value="IN +91">US +1</option>
											</select>
											<i></i>
										</label>
										</div>

										<div class="col-md-8 col-lg-8 col-sm-8 col-xs-8" style="padding-left: 5px;padding-right: 0px;">
										<label class="input">
											<i class="icon-prepend fa fa-volume-control-phone"></i>
											<input type="text" name="mobile" placeholder="Number" required="required">
										</label>
										</div>
									</div>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-6">
									<label class="select">
										<select>
											<option value="0" selected="" disabled="">Select Prayer Service</option>
											<option value="">Puja Services</option>
											<option value="">Hawan Services</option>
											<option value="">Jaap & Shanti Pujas</option>
											<option value="">Katha</option>
										</select>
									</label>
								</section>

								<section class="col col-md-6">
									<label class="select">
										<select>
											<option value="0" selected="" disabled="">Select Subcategory</option>
											<option value="">Puja Services</option>
											<option value="">Hawan Services</option>
											<option value="">Jaap & Shanti Pujas</option>
											<option value="">Katha</option>
										</select>
										<i></i>
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-12">
									<label class="select">
										<select id="place">
											<option value="0" selected="" disabled="">Select Location</option>
											<option value="panditji_place"> Pandit Ji's Place : You have to come at Panditji's Place.</option>
											<option value="my_place"> My Place : Pandit Ji will come at your place.</option>
											<option value="epuja"> Online E-Puja : You need to have is internet connection, a smartphone along with some household Puja items. </option>
										</select>
									</label>
								</section>
							</div>


							<div class="row" style="display:none;" id="myLocation">
								<section class="col col-md-12">
									<label class="input">
										<i class="icon-prepend fa fa-map-marker"></i>
										<input type="text" placeholder="Birth Place" data-toggle="tooltip" data-placement="top" data-original-title="Select Birth Place from list only">
									</label>
									<span class="fcusc font500">* Select location from the list only. </span>
								</section>
							</div>		
						</div>

						<div class="col-md-4">	
							<textarea class="form-control" rows="9" placeholder="Enter your query here.." data-toggle="tooltip" data-placement="top" data-original-title="Enter Your Query"></textarea>	
						</div>
						</fieldset>
					<footer>
						<button type="submit" class="button font600">Send Enquiry & Get Quotes</button>
					</footer>
				</form>
					<h5 class="font600 letter-spacing-1 styleColor">Note: You will get instant call from our end.</h5>
					{{-- <h5 class="cus_clrg letter-spacing-0_6"><b style="background-color:#ffff83d4;">You will get instant call from our end.</b></h5> --}}
					
				</div>
				<!-- QUERY FORM END -->

			</div>
			
			<!-- INFO -->
			
			<div class="col-md-3">
				@include('frontend.panditji.sidebar.sidebar')
			</div>

		</div>
	</div>
</section>

@endsection
<!-- End Section -->



