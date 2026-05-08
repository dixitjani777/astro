<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Book Pandit Online - Astroduniya')
@section('description','Book your Pandit online to perform your pujas. Perform your puja with our Pandits at best price including all puja materials')
@section('keywords','book pandit, book pandit online, book pandit ji, pandit ji for puja near me, online pandit near me, book my purohit, online pandit consultation, pandit for puja in mumbai, astroduniya pandit ji')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php
	$toolbar_page="Book Pandit Ji"; 
	$toolbar_title="Book Pandit Ji";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')


<section>
	<div class="container">
		<div class="row">
			
			<div class="col-lg-9 order-1 order-lg-1">
				<div>
					<span class="sub_heading letter-spacing-1 badge badge-pill badge-primary badge-soft font-weight-medium pl-2 pr-2 pt--6 pb--6 mb-2 fs--15">
						Follow 3 Steps
					</span><br/><br/>
					
					<div class="d-flex mb-3">

						<div class="badge badge-ico-sm rounded-circle float-start">
							<i class="fi fi-arrow-right"></i>
						</div>
						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							Login / Sign Up
						</p>

					</div>

					<div class="d-flex mb-3">

						<div class="badge badge-ico-sm rounded-circle float-start">
							<i class="fi fi-arrow-right"></i>
						</div>
						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							Fill out below form
						</p>

					</div>

					<div class="d-flex mb-3">

						<div class="badge badge-ico-sm rounded-circle float-start">
							<i class="fi fi-arrow-right"></i>
						</div>
						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							Check status in your Account
						</p>

					</div>
				</div>

				<!-- Query -->
				<div class="clearfix mt-5">
					<h3 class="font-weight-normal text-muted mb-4">
						Enter Details						
					</h3>

					<p class="text-muted sub_heading letter-spacing-03 badge badge-pill badge-primary badge-soft fs--15 mb-1">
						<span class="styleColor">*</span> You must <a href="{{ url('/account')}}" >Log in</a> to Book PanditJi.
					</p>

					<!-- Query Form -->
					<form novalidate method="post" action="#" class="bs-validate d-block bg-white shadow-primary-xs rounded p-4 mb-5">
						<!-- <div class="row">
							<div class="col-12 col-md-6">
								<div class="form-label-group mb-3">
									<input required placeholder="Name" id="name" type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Name">
									<label for="comment_name">Name</label>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="form-label-group mb-3">
									<select id="select_options2" class="form-control">
										<option value="1">Male</option>
										<option value="2">Female</option>
									</select>
									<label for="select_options2">Gender</label>
								</div>
							</div>

						</div> -->
						<div class="row">
								<div class="col-12">
									<div class="form-label-group mb-3">
										<select id="select_options2" class="form-control">
											<option value="1">Pandit Ji's Place : You have to come at Panditji's Place.(In Mumbai)</option>
											<option value="2">My Place : Pandit Ji will come at your place.</option>
											<option value="1">Online E-Puja : You need to have is internet connection, a smartphone along with some household Puja items.</option>
											
										</select>
										<label for="select_options2">Select location</label>
									</div>
								</div>
						</div>

						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-label-group mb-3">
									<input required placeholder="Name" id="name" type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Name">
									<label for="comment_name">Your Location</label>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="form-label-group mb-3">
									<input required autocomplete="off" type="text" name="my_daterange" class="form-control rangepicker" placeholder="Date of Birth and Time" data-toggle="tooltip" data-placement="top" data-original-title="Date of Birth and Time"
										data-layout-rounded="false" 
										data-single-datepicker="true" 
										data-interval-years='[1982,2020]'
										data-timepicker="true" 
										
										data-date-format="DD/MM/YYYY hh:mm: A" 
											
										data-quick-locale='{
											"lang_apply"	: "Apply",
											"lang_cancel"	: "Cancel",
											"lang_crange"	: "Custom Range",
											"lang_months" 	: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
											"lang_weekdays" : ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"]
										}'
									>
									<label for="comment_name">Desire Date and Time</label>
								</div>
							</div>

						</div>

						
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-label-group mb-3">
									<select id="select_options2" class="form-control">
										<option value="1">Puja Service</option>
										<option value="2">Hawan Service</option>
										<option value="1">Jaap & Shanti Pujas</option>
										<option value="2">Katha</option>
										<option value="2">Other</option>
									</select>
									<label for="select_options2">Prayer Service</label>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="form-label-group mb-3">
									<select id="select_options2" class="form-control">
										<option value="1">Puja Service</option>
										<option value="2">Hawan Service</option>
										<option value="1">Jaap & Shanti Pujas</option>
										<option value="2">Katha</option>
										<option value="2">Other</option>
									</select>
									<label for="select_options2">Suncategory</label>
								</div>
							</div>

						</div>

						
						
						<div class="clearfix mb-3">
							<div class="form-label-group">
								<textarea required rows="3" id="comment_description"
										data-output-target=".js-form-advanced-char-left" 
										class="form-control js-form-advanced-char-count-down" 
										maxlength="3000" placeholder="Your comment"></textarea>
								<label for="comment_description">Enter your query here..</label>
							</div>
							<span class="fs--12 text-muted text-align-end float-end mt-1">
								characters left: <span class="js-form-advanced-char-left">3000</span>
							</span>

						</div>

						<button type="submit" class="btn btn-warning btn-sm">
							Request to book PanditJi
						</button>
					</form>
					<!-- /Query Form -->

					<!-- <p class="font-weight-normal"><span class="styleColor font-weight-normal">Note :</span> You will get instant call from our end.</p> -->
					<p class="font-weight-normal"><span class="font-weight-bold">Note :</span> Your request will be processed soon. Updates will be sent to your registered email or mobile number, and you can also check the status in your account. </p>
						<br><br>

						
				</div>
				<!-- /Query -->

				<h2 class="mb-4 my-4 text-muted">Our Prayer Service</h2>
				<div class="row">
					<div class="col-6 mb-5">

						<div class="bg-white p-2 shadow-primary-xs transition-hover-top transition-all-ease-250">
							<a href="portfolio-single-1.html" class="d-block overflow-hidden overlay-dark-hover overlay-opacity-2 text-decoration-none text-dark">
								<img class="img-fluid lazy rounded" data-src="{{ asset('images/services/pt2.jpg') }}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAEsCAQAAACoWRFeAAAAE0lEQVR42mNkYGAcRaNoFA0cAgAUvAEtNFICWAAAAABJRU5ErkJggg==" alt="...">
							</a>

							<div class="p-3">

								<h5 class="m-0">
									Puja Services
								</h5>

								<ul class="list-inline fs--13 m-0">
									<li class="list-inline-item">
										<a href="#!" class="text-gray-500">Photography</a>
									</li>

									<li class="list-inline-item">
										<a href="#!" class="text-gray-500">Design</a>
									</li>
								</ul>

							</div>
						</div>

					</div>


					<div class="col-6 mb-5">

						<div class="bg-white p-2 shadow-primary-xs transition-hover-top transition-all-ease-250">
							<a href="portfolio-single-1.html" class="d-block overflow-hidden overlay-dark-hover overlay-opacity-2 text-decoration-none text-dark">
								<img class="img-fluid lazy rounded" data-src="{{ asset('images/services/pt2.jpg') }}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAEsCAQAAACoWRFeAAAAE0lEQVR42mNkYGAcRaNoFA0cAgAUvAEtNFICWAAAAABJRU5ErkJggg==" alt="...">
							</a>

							<div class="p-3">

								<h5 class="m-0">
									Havan Services
								</h5>

								<ul class="list-inline fs--13 m-0">
									<li class="list-inline-item">
										<a href="#!" class="text-gray-500">Photography</a>
									</li>

									<li class="list-inline-item">
										<a href="#!" class="text-gray-500">Design</a>
									</li>
								</ul>

							</div>
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-6 mb-5">

						<div class="bg-white p-2 shadow-primary-xs transition-hover-top transition-all-ease-250">
							<a href="portfolio-single-1.html" class="d-block overflow-hidden overlay-dark-hover overlay-opacity-2 text-decoration-none text-dark">
								<img class="img-fluid lazy rounded" data-src="{{ asset('images/services/pt2.jpg') }}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAEsCAQAAACoWRFeAAAAE0lEQVR42mNkYGAcRaNoFA0cAgAUvAEtNFICWAAAAABJRU5ErkJggg==" alt="...">
							</a>

							<div class="p-3">

								<h5 class="m-0">
									Jaap & Shanti Pujas
								</h5>

								<ul class="list-inline fs--13 m-0">
									<li class="list-inline-item">
										<a href="#!" class="text-gray-500">Photography</a>
									</li>

									<li class="list-inline-item">
										<a href="#!" class="text-gray-500">Design</a>
									</li>
								</ul>

							</div>
						</div>

					</div>


					<div class="col-6 mb-5">

						<div class="bg-white p-2 shadow-primary-xs transition-hover-top transition-all-ease-250">
							<a href="portfolio-single-1.html" class="d-block overflow-hidden overlay-dark-hover overlay-opacity-2 text-decoration-none text-dark">
								<img class="img-fluid lazy rounded" data-src="{{ asset('images/services/pt2.jpg') }}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAEsCAQAAACoWRFeAAAAE0lEQVR42mNkYGAcRaNoFA0cAgAUvAEtNFICWAAAAABJRU5ErkJggg==" alt="...">
							</a>

							<div class="p-3">

								<h5 class="m-0">
									Katha
								</h5>

								<ul class="list-inline fs--13 m-0">
									<li class="list-inline-item">
										<a href="#!" class="text-gray-500">Photography</a>
									</li>

									<li class="list-inline-item">
										<a href="#!" class="text-gray-500">Design</a>
									</li>
								</ul>

							</div>
						</div>

					</div>
				</div>


			</div>
			
			
			<div class="col-lg-3 order-2 order-lg-2 mb-5">
				@include('frontend.panditji.sidebar.sidebar')
			</div>

		</div>
	</div>
</section>

@endsection
<!-- End Section -->



