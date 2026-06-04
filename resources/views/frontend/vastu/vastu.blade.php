<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Vastu Services Near Me : Office, House & More - Astroduniya')
@section('description','Get vastu tips which help you get rid of health problems, financial crisis, career concerns. Vastu Shastra Tips for house and more at astroduniya.com.')
@section('keywords','vastu consultant, vastu services, vastu shastra, vastu for office, vastu for home, vastu for flats,vastu dosh, near me')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Vastu"; 
	$toolbar_title="Vastu Services";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<section>
	<div class="container">
		<div class="row">	
			<div class="col-lg-9 order-1 order-lg-1">
				
				<div>
					<p>
						At AstroDuniya, we help transform your space into a source of positivity and growth by addressing Vastu imbalances—without the need for costly structural changes.

Our expert approach combines Vastu Shastra, astrology insights, and color therapy to create a well-balanced and energized environment. With our specialized energizers and Vastu remedies, we aim to improve the flow of energy and support your overall well-being.
					</p>
				</div><br/>

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
							Check query status in your Account
						</p>

					</div>
				</div>

				<!-- Query -->
				<div class="clearfix mt-5">
					<h3 class="font-weight-normal text-muted mb-4">
						Enter Details						
					</h3>

					@guest
						<p class="text-muted sub_heading letter-spacing-03 badge badge-pill badge-primary badge-soft fs--15 mb-1">
							<span class="styleColor">*</span> You must <a href="{{ url('/account') }}">Log in</a> to consult Us.
						</p>
					@endguest
					<br><br>

					<!-- Query Form -->
<x-enquiry-form
	layout="floating"
	class="bs-validate d-block bg-white shadow-primary-xs rounded p-4 mb-5"
	source="vastu"
	context="vastu_consultation"
	subject="Vastu Consultation"
	:show-name="false"
	:show-email="false"
	:show-phone="false"
	:show-message="false"
	message-label="Specific Concerns / Problems"
	submit-label="Submit Query"
	enctype="multipart/form-data"
>
	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<input required placeholder="Property Occupant Name" type="text" class="form-control" name="name" value="{{ old('name', auth()->user()?->name) }}">
				<label>Property Occupant Name</label>
				@error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>

		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<select id="vastu_gender" class="form-control" name="meta[gender]">
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
				<label for="vastu_gender">Gender</label>
				@error('meta.gender')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<input required autocomplete="off" type="text" name="meta[dob_time]" class="form-control rangepicker" placeholder="Date of Birth and Time"
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
				<label>Date of Birth and Time</label>
				@error('meta.dob_time')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<input required placeholder="Birth Place" type="text" class="form-control" name="meta[birth_place]">
				<label>Birth Place</label>
				<span class="fs--14 styleColor letter-spacing-03">* Select location from the list only.</span>
				@error('meta.birth_place')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<select id="vastu_property_type" class="form-control" name="meta[property_type]">
					<option value="apartment">Apartment</option>
					<option value="bungalow">Bungalow</option>
					<option value="plot_land">Plot/Land</option>
					<option value="shop">Shop</option>
					<option value="factory">Factory</option>
					<option value="workplace">Workplace</option>
				</select>
				<label for="vastu_property_type">Property Type</label>
				@error('meta.property_type')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>

		<div class="col-12 col-md-3">
			<div class="form-label-group mb-3">
				<select id="vastu_consultation_type" class="form-control" name="meta[consultation_type]">
					<option value="visit">Personal Visit</option>
					<option value="phone">Phone Consultation</option>
					<option value="video">Video Consultation</option>
				</select>
				<label for="vastu_consultation_type">Consultation Type</label>
				@error('meta.consultation_type')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>

		<div class="col-12 col-md-3">
			<div class="form-label-group mb-3">
				<select id="vastu_report_type" class="form-control" name="meta[report_type]">
					<option value="basic">Basic Report</option>
					<option value="detail">Detailed Report with Remedies</option>
				</select>
				<label for="vastu_report_type">Report</label>
				@error('meta.report_type')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>
	</div>

	<div class="mb-3">
		<label class="btn btn-warning cursor-pointer position-relative">
			<input name="attachments[]" multiple type="file" accept="image/*,application/pdf" class="custom-file-input absolute-full">
			Upload Images
		</label>
		<div class="form-hint mt-2">Allowed: images and PDF files.</div>
		@error('attachments')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
		@error('attachments.*')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
	</div>
</x-enquiry-form>
<!-- /Query Form -->

					<p class="font-weight-normal"><span class="styleColor font-weight-normal">Note :</span> Your query will be answered very shortly and Will notify on your registered Email or Mobile. </p>

				</div>
				<!-- /Query -->

				<section>
					<div>
						<h2 class="h4 text-muted mb-4">
							How It works ?
						</h2>

						<p>
							Our astrologer conclude the solutions by understanding your birth chart with the best skills.
						</p>

						<div class="d-flex mb-3">
							<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Examine the Sun at the time you were born.
							</p>
						</div>

						<div class="d-flex mb-3">
							<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Examine twelve houses of your birth chart.
							</p>
						</div>

						<div class="d-flex mb-3">
							<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Examine your strength and weaknesse.
							</p>
						</div>

						<div class="d-flex mb-3">
							<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Recognize your characteristics.
							</p>
						</div>

						<div class="d-flex mb-3">
							<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Examine your Horoscope with best technique.
							</p>
						</div>

						<div class="d-flex mb-3">
							<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Follow the best principle of astrology.
							</p>
						</div>

						<div class="d-flex mb-3">
							<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Suggest accurate powerfull gemstones.
							</p>
						</div>

						<div class="d-flex mb-3">
							<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Suggest Puja if any required.
							</p>
						</div>

					</div>
				</section>
				

			</div>
			
			<!-- SIDEBAR -->
			<div class="col-lg-3 order-2 order-lg-2 mb-5">
				@include('frontend.vastu.sidebar.sidebar')
			</div>
			<!-- / SIDEBAR -->

		</div>
	</div>
</section>

@endsection
<!-- End Section -->




