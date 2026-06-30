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
				@if(request('service'))
					<div class="alert alert-info border-0">
						Booking for: <strong>{{ request('service') }}</strong>
					</div>
				@endif

					@guest
						<p class="text-muted sub_heading letter-spacing-03 badge badge-pill badge-primary badge-soft fs--15 mb-1">
							<span class="styleColor">*</span> You must <a href="{{ url('/account')}}" >Log in</a> to Book PanditJi.
						</p>
					@endguest

					<!-- Query Form -->
<x-enquiry-form
	layout="floating"
	class="bs-validate d-block bg-white shadow-primary-xs rounded p-4 mb-5"
	source="pandit"
	context="pandit_booking"
	subject="Panditji Booking"
	:show-name="false"
	:show-email="false"
	:show-phone="false"
	:show-message="false"
	message-label="Enter your query here.."
	submit-label="Request to book PanditJi"
>
	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<input required placeholder="Your Name" type="text" class="form-control" name="name" value="{{ old('name', auth()->user()?->name) }}">
				<label>Your Name</label>
				@error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>

		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<select id="pandit_location_type" class="form-control" name="meta[location_type]">
					<option value="pandit_place">Pandit Ji's Place (Mumbai)</option>
					<option value="my_place">My Place</option>
					<option value="online_e_puja">Online E-Puja</option>
				</select>
				<label for="pandit_location_type">Select location</label>
				@error('meta.location_type')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<input required placeholder="Your Location" type="text" class="form-control" name="meta[location]" data-astro-location="location" autocomplete="off">
				<label>Your Location</label>
				<input type="hidden" name="meta[location_details][display_name]" value="{{ old('meta.location_details.display_name') }}">
				<input type="hidden" name="meta[location_details][city]" value="{{ old('meta.location_details.city') }}">
				<input type="hidden" name="meta[location_details][state]" value="{{ old('meta.location_details.state') }}">
				<input type="hidden" name="meta[location_details][country]" value="{{ old('meta.location_details.country') }}">
				<input type="hidden" name="meta[location_details][lat]" value="{{ old('meta.location_details.lat') }}">
				<input type="hidden" name="meta[location_details][lon]" value="{{ old('meta.location_details.lon') }}">
				@error('meta.location')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>

		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<input required autocomplete="off" type="text" name="meta[desired_datetime]" class="form-control rangepicker" placeholder="Desire Date and Time"
					data-layout-rounded="false"
					data-single-datepicker="true"
					data-interval-years='[1982,2020]'
					data-timepicker="true"
					data-date-format="DD/MM/YYYY hh:mm: A"
					data-quick-locale='{
						"lang_apply" : "Apply",
						"lang_cancel": "Cancel",
						"lang_crange": "Custom Range",
						"lang_months": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
						"lang_weekdays": ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"]
					}'>
				<label>Desire Date and Time</label>
				@error('meta.desired_datetime')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<select id="pandit_prayer_service" class="form-control" name="meta[prayer_service]">
					<option value="puja_service">Puja Service</option>
					<option value="hawan_service">Hawan Service</option>
					<option value="jaap_shanti_pujas">Jaap & Shanti Pujas</option>
					<option value="katha">Katha</option>
					<option value="other">Other</option>
				</select>
				<label for="pandit_prayer_service">Prayer Service</label>
				@error('meta.prayer_service')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>

		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<select id="pandit_subcategory" class="form-control" name="meta[subcategory]">
					<option value="puja_service">Puja Service</option>
					<option value="hawan_service">Hawan Service</option>
					<option value="jaap_shanti_pujas">Jaap & Shanti Pujas</option>
					<option value="katha">Katha</option>
					<option value="other">Other</option>
				</select>
				<label for="pandit_subcategory">Subcategory</label>
				@error('meta.subcategory')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>
	</div>

	<div class="clearfix mb-3">
		<div class="form-label-group">
			<textarea required rows="3" class="form-control js-form-advanced-char-count-down" name="message" maxlength="3000" placeholder="Your comment">{{ old('message') }}</textarea>
			<label>Enter your query here..</label>
			@error('message')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
		</div>
		<span class="fs--12 text-muted text-align-end float-end mt-1">
			characters left: <span class="js-form-advanced-char-left">3000</span>
		</span>
	</div>
</x-enquiry-form>
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




