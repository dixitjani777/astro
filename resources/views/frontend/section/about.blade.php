<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title',"About Us : World's Best Astrologer & Pandit Ji - Astroduniya")
@section('description','About Us')
@section('keywords','astrologer near me')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="About Us"; 
	$toolbar_title="About Us";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')
	
<section>
<div class="container">
	<div class="row">
		
		<div>
			
			<section class="overflow-hidden">
				<div class="container">
				
					<div class="row d-flex flex-wrap align-items-center">
					
						<div class="order-2 order-md-1 col-12 col-md-6 mb-5">

							<h1 class="h2-xs font-weight-light mb-3">
								About <b>Astro</b><span class="text-primary font-weight-medium">Duniya</span> 
							</h1>
							<p class="mb-5">
								Answering those questions and more is a tall order, but one you should approach with enthusiasm. After all, this is the one place you can and should sing your own praises.Answering those questions and more is a tall order, but one you should approach with enthusiasm.<br/><br/> After all, this is the one place you can and should sing your own praises.Answering those questions and more is a tall order, but one you should approach with enthusiasm. After all, this is the one place you can and should sing your own praises.
							</p>


							<!-- play -->
							<div class="clearfix d-flex align-items-center">

								<!-- play button : based on SOW : Ajax Modal -->
								<span class="d-inline-block rounded-circle border border-light bw--3 p-1 transition-hover-zoom transition-all-ease-150 shadow-primary-lg">
									<a aria-label="See our video" href="https://www.youtube.com/watch?v=I_fQh_HmF6s" class="js-ajax-modal d-inline-flex bg-primary text-white rounded-circle w--60 h--60 align-items-center justify-content-center text-decoration-none js-modalified" data-ajax-modal-type="video" data-ajax-modal-size="modal-xl" data-ajax-modal-centered="true">
										<i class="fi fi-arrow-end-full fs--25 mt--3"></i>
									</a>
								</span> 

								<span class="d-inline-block px-3 text-primary">
									<b>SEE OUR VIDEO</b>
								</span>

							</div>
							<!-- /play -->

						</div>

						<div class="order-1 order-md-2 col-12 col-md-6 mb-5">

							<!-- 
								Image set as cover, loaded via lazyload - better for height custom calibration via py-*
								Base64 image is an empty landscape png for better autoresize
								Classes: rounded, rounded-xl, py-* 
							-->
							<div class="py-5 rounded-xl bg-light bg-cover lazy" data-loaded="true" style="background-image: url(&quot;demo.files/images/unsplash/covers/austin-distel-wD1LRb9OeEo-unsplash.jpg&quot;);">
								<img class="w-100" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAKCAQAAADxnt1TAAAAEUlEQVR42mNkIBowjiodaKUACusAC4zze1kAAAAASUVORK5CYII=" alt="...">
							</div>		

						</div>

					</div>

				</div>
			</section>

			
			<div class="container"> 

				<div class="row">

					<div class="col-12 col-lg-6 mb-5">

						<div class="row">

							<div class="col-6">
								<img class="img-fluid rounded shadow-primary-lg aos-init aos-animate" data-aos="fade-up" data-aos-delay="0" data-aos-offset="0" src="demo.files/images/unsplash/team/thumb_330/craig-mckay-jmURdhtm7Ng-unsplash.jpg" alt="...">
							</div>

							<div class="col-6">
								<img class="img-fluid rounded mt-5 shadow-primary-lg aos-init aos-animate" data-aos="fade-up" data-aos-delay="150" data-aos-offset="0" src="demo.files/images/unsplash/covers/thumb_330/austin-distel-wD1LRb9OeEo-unsplash.jpg" alt="...">
								<img class="img-fluid rounded mt-4 shadow-primary-lg aos-init aos-animate" data-aos="fade-up" data-aos-delay="250" data-aos-offset="0" src="demo.files/images/unsplash/covers/thumb_330/austin-distel-mpN7xjKQ_Ns-unsplash.jpg" alt="...">
							</div>

							<div class="col-6">
								<img class="img-fluid rounded shadow-primary-lg aos-init aos-animate" data-aos="fade-up" data-aos-delay="0" data-aos-offset="0" src="demo.files/images/unsplash/team/thumb_330/craig-mckay-jmURdhtm7Ng-unsplash.jpg" alt="...">
							</div>

							<div class="col-6">
								<img class="img-fluid rounded mt-5 shadow-primary-lg aos-init aos-animate" data-aos="fade-up" data-aos-delay="150" data-aos-offset="0" src="demo.files/images/unsplash/covers/thumb_330/austin-distel-wD1LRb9OeEo-unsplash.jpg" alt="...">
								<img class="img-fluid rounded mt-4 shadow-primary-lg aos-init aos-animate" data-aos="fade-up" data-aos-delay="250" data-aos-offset="0" src="demo.files/images/unsplash/covers/thumb_330/austin-distel-mpN7xjKQ_Ns-unsplash.jpg" alt="...">
							</div>

						</div>

					</div>


					<div class="col-12 col-lg-6 mb-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="0" data-aos-offset="0">

						<h2 class="mb-5 font-weight-medium">
							<span class="font-weight-light">Passion /</span> <span class="font-weight-normal">Creativity /</span> <span class="font-weight-medium">Innovation</span>
						</h2>


						<div class="d-flex mb-4">

							<!-- icon -->
							<div class="text-primary">
								<img width="50" height="50" src="demo.files/svg/icons/startup/017-megaphone.svg" alt="...">
							</div>

							<div class="ml-4 mr-4">

								<!-- heading -->
								<h3 class="h5 mb-1">
									Who we are?
								</h3>

								<!-- text -->
								<p>
									<span class="text-dark">Smarty</span> is the creative agency you are looking for since always: recognized professionals with many years of experience in all areas of digital, specialized in coordinated online corporate image.
								</p>

							</div>

						</div>


						<div class="d-flex mb-4">

							<!-- icon -->
							<div class="text-primary">
								<img width="50" height="50" src="demo.files/svg/icons/startup/017-growth.svg" alt="...">
							</div>

							<div class="ml-4 mr-4">

								<!-- heading -->
								<h3 class="h5 mb-1">
									What we do?
								</h3>

								<!-- text -->
								<p>
									Together we can weave your story online, creating the perfect digital image, and using technology as a means, and never as an end. Why choose us among so many agencies? Because we are different from others: because also us, as you, have decided to fly high.
								</p>

							</div>

						</div>



						<div class="d-flex mb-4">

							<!-- icon -->
							<div class="text-primary">
								<img width="50" height="50" src="demo.files/svg/icons/startup/017-networking.svg" alt="...">
							</div>

							<div class="ml-4 mr-4">

								<!-- heading -->
								<h3 class="h5 mb-1">
									Core Values
								</h3>

								<!-- text -->
								<p>
									Listening, research, detail and time are our core values, to accompany you from the first meeting until the end of the realization of your dream, and if you want it even after. Quality, simplicity, functionality, modernity, cleanliness and minimalism are the keys to each of our projects.
								</p>

							</div>

						</div>

						

					</div>

				</div>

			</div>
			
		</div>
		
	</div>


</div>
@endsection
<!-- End Section -->
