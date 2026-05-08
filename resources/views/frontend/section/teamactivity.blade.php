<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Team Activity : We Work To Make Smile On Each Face - Astroduniya')
@section('description','Our team provide services of astrology, horoscope, astrologer, panditji booking, buy gemstones and much more. Our mission is to make to smile on each face.')
@section('keywords','astroduniya team , astroduniya activity, astrology, astrologer, horoscope, panditji, gemstones')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Team Activity"; 
	$toolbar_title="Team Activity";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<section class="position-relative">
	<div class="container">

		<!-- Timeline : Styled -->
		<div class="timeline-container mb-6">

			<h2 class="font-weight-normal timeline-title border-primary mb-5 pt-2 pb-2">
				Our History
				<small class="d-block text-muted fs--15">
					<b>Know us better!</b> Built from scratch with your business in mind!
				</small>
			</h2>

			<div class="d-flex mb-4 aos-init aos-animate" data-aos="fade-in" data-aos-delay="150" data-aos-offset="0">
				<i class="badge badge-primary rounded-circle shadow-primary-md animate-pulse"></i>
				<div class="w--120 mx-1 flex-none">
					<p class="w--90 fs--14 text-break">
						<b class="d-block text-primary">Present</b>
						We always fight for the better!
					</p>
				</div>
				<div class="flex-grow-1 lead bg-light p--15 position-relative transition-hover-end transition-all-ease-250">
					<i class="arrow arrow-start border-light mt-2"></i>
					As a leader, my goal is not actually the same as heroism. Instead, I strive in helping to create and celebrate the heroic acts of my employees. <a href="#!" class="link-muted">Read more</a>
				</div>
			</div>

			<div class="d-flex mb-4 aos-init aos-animate" data-aos="fade-in" data-aos-delay="150" data-aos-offset="0">
				<i class="badge badge-primary rounded-circle shadow-primary-md animate-pulse"></i>
				<div class="w--120 mx-1 flex-none">
					<p class="w--90 fs--14 text-break">
						<b class="d-block text-primary">2018</b>
						#1 growing company in United States
					</p>
				</div>
				<div class="flex-grow-1 lead bg-light p--15 position-relative transition-hover-end transition-all-ease-250">
					<i class="arrow arrow-start border-light mt-2"></i>
					Set the expectation that as a leader you wonâ€™t be perfect, but youâ€™ll give everyday all you've got. Letâ€™s say youâ€™ll try one percent more than the day before.
				</div>
			</div>

			<div class="d-flex mb-4 aos-init aos-animate" data-aos="fade-in" data-aos-delay="150" data-aos-offset="0">
				<i class="badge badge-primary rounded-circle shadow-primary-md animate-pulse"></i>
				<div class="w--120 mx-1 flex-none">
					<p class="w--90 fs--14 text-break">
						<b class="d-block text-primary">2014</b>
						120+ finished successfully projects
					</p>
				</div>
				<div class="flex-grow-1 lead bg-light p--15 position-relative transition-hover-end transition-all-ease-250">
					<i class="arrow arrow-start border-light mt-2"></i>
					Constantly celebrate victories and the team members who go above and beyond the call of duty. Itâ€™s a scary world in which to try to be a leader alone.
				</div>
			</div>

			<div class="d-flex mb-4 aos-init aos-animate" data-aos="fade-in" data-aos-delay="150" data-aos-offset="0">
				<i class="badge badge-primary rounded-circle shadow-primary-md animate-pulse"></i>
				<div class="w--120 mx-1 flex-none">
					<p class="w--90 fs--14 text-break">
						<b class="d-block text-primary">2010</b>
						Company grown to 20 seniors
					</p>
				</div>
				<div class="flex-grow-1 lead bg-light p--15 position-relative transition-hover-end transition-all-ease-250">
					<i class="arrow arrow-start border-light mt-2"></i>
					Focus your valuable energy on the only two groups who have more power than you to make your company successful: your customers and your employees. Everything else is a distraction.
				</div>
			</div>

			<div class="d-flex mb-4 aos-init aos-animate" data-aos="fade-in" data-aos-delay="150" data-aos-offset="0">
				<i class="badge badge-primary rounded-circle shadow-primary-md animate-pulse"></i>
				<div class="w--120 mx-1 flex-none">
					<p class="w--90 fs--14 text-break">
						<b class="d-block text-primary">2005</b>
						Proudly started our adventures
					</p>
				</div>
				<div class="flex-grow-1 lead bg-light p--15 position-relative transition-hover-end transition-all-ease-250">
					<i class="arrow arrow-start border-light mt-2"></i>
					You live and breathe the success of the organization. Leadership isn't about the destination. Itâ€™s about enjoying the journey.
				</div>
			</div>

			<p class="timeline-content">
				Culture is a team sport. As humans, we all strive to feel important. Embrace the idea of empowering others to step up to the plate and take responsibility. <a href="https://www.forbes.com/sites/entrepreneursorganization/2015/02/11/5-steps-to-effectively-leading-your-company/#7252cf2b7ef7" target="smarty">Source: Forbes</a>
			</p>

		</div>


		<div class="row">

			<!--
				In order for lazyload to work, a height is required, else all images are in viewport.
				By default, an empty png is set with 400px height:
				http://png-pixel.com/
			-->
			<div class="col-12 col-lg-7">

				<div class="bg-white shadow-primary-xs mb-5">
					<img height="500" class="img-fluid lazy rounded" src="demo.files/images/unsplash/portfolio/boxed-water-is-better-CYEgCGYm2JY-unsplash-min.jpg" alt="..." data-loaded="true">
				</div>

			</div>

			<div class="col-12 col-lg-5 mb-5">
				<h2 class="m-0 fs-25">
					Boxed water is better
				</h2>
				<h6 class="font-weight-normal mb-4">
					June 29, 2019 – Present
				</h6>

				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				</p>

				<div class="border-left border-primary bw--3 py-1 px-3 my-5">
					<h2 class="mb-0 h5">Beyond the future</h2>
					<p class="mb-0 text-gray-500">Healthy! 100% Natural!</p>
				</div>

				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				</p>

				
			</div>

			<div class="col-12 col-lg-7">

				<div class="bg-white shadow-primary-xs mb-5">
					<img height="500" class="img-fluid lazy rounded" src="demo.files/images/unsplash/portfolio/boxed-water-is-better-CYEgCGYm2JY-unsplash-min.jpg" alt="..." data-loaded="true">
				</div>

			</div>

			<div class="col-12 col-lg-5 mb-5">
				<h2 class="m-0 fs-25">
					Boxed water is better
				</h2>
				<h6 class="font-weight-normal mb-4">
					June 29, 2019 – Present
				</h6>

				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				</p>

				<div class="border-left border-primary bw--3 py-1 px-3 my-5">
					<h2 class="mb-0 h5">Beyond the future</h2>
					<p class="mb-0 text-gray-500">Healthy! 100% Natural!</p>
				</div>

				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				</p>

				
			</div>
			

		</div>

		<br/><br/><br/>
		<h3>More story will post soon..</h3>
	</div>
</section>
	
@endsection
<!-- End Section -->
