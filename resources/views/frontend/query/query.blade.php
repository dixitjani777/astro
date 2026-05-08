<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Ask query to astrologer : Accurate predictions - Astroduniya')
@section('description','Get in touch with our best astrologer who are best in world and provide accurate predictions.')
@section('keywords','astrologer near me, ask astrologer, ask astrologer free, ask astrologer free question, ask astrologer online, Ask query to astrologer, astrologer prediction, astrologer online, famous astrologer near me, world best astrologer')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Ask Free Query"; 
	$toolbar_title="Ask to our astrologer";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<!-- start :: content -->
<section>
	<div class="container"> 
		<div class="row">
			<div class="col-lg-9 order-1 order-lg-1">
				<div>
					<h5 class="font-weight-normal text-muted mb-4">
						Follow 3 Steps						
					</h5>
					

					<!-- <span class="sub_heading letter-spacing-1 badge badge-pill badge-warning font-weight-medium pl-2 pr-2 pt--6 pb--6 mb-2 fs--15">
						Follow 3 Steps
					</span><br/><br/> -->
					
					<div class="d-flex mb-3">

						<i class="styleColor fi fi-arrow-right-full"></i>
						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							Login / Sign Up
						</p>

					</div>

					<div class="d-flex mb-3">

						<i class="styleColor fi fi-arrow-right-full"></i>
						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							Fill out below form
						</p>

					</div>

					<div class="d-flex mb-3">

						<i class="styleColor fi fi-arrow-right-full"></i>
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

					<p class="text-muted letter-spacing-03 fs--15 mb-1">
						<span class="styleColor">*</span> You must <a href="{{ url('/account')}}" >Log in</a> to ask free query.
					</p>
				

					<!-- Query Form -->
					<form novalidate method="post" action="#" class="bs-validate d-block bg-white shadow-primary-xs rounded p-4 mb-5">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-label-group mb-3">
									<input required placeholder="Name" id="name" type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Name">
									<label for="comment_name">Name</label>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="form-label-group mb-3">
									<select id="select_options2" class="form-control">
										<option value="male">Male</option>
										<option value="female">Female</option>
										<option value="other">Other</option>
									</select>
									<label for="select_options2">Gender</label>
								</div>
							</div>

						</div>

						<div class="row">
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
										<label for="comment_name">Date of Birth and Time</label>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-label-group mb-3">
										<input required placeholder="Birth Place" id="timepickerT" type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Birth Place">
										<label for="comment_name">Birth Place</label>
										<span class="fs--14 styleColor letter-spacing-03">* Select location from the list only.</span>
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
							Submit Query
						</button>
					</form>
					<!-- /Query Form -->

					<p class="font-weight-normal"><span class="font-weight-normal">Note :</span> Your query will be answered very shortly and Will notify on your registered Email or Mobile. </p>

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
							<div class="badge badge-warning badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Examine the Sun at the time you were born.
							</p>
						</div>

						<div class="d-flex mb-3">
							<div class="badge badge-warning badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Examine twelve houses of your birth chart.
							</p>
						</div>

						<div class="d-flex mb-3">
							<div class="badge badge-warning badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Examine your strength and weaknesse.
							</p>
						</div>

						<div class="d-flex mb-3">
							<div class="badge badge-warning badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Recognize your characteristics.
							</p>
						</div>

						<div class="d-flex mb-3">
							<div class="badge badge-warning badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Examine your Horoscope with best technique.
							</p>
						</div>

						<div class="d-flex mb-3">
							<div class="badge badge-warning badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Follow the best principle of astrology.
							</p>
						</div>

						<div class="d-flex mb-3">
							<div class="badge badge-warning badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Suggest accurate powerfull gemstones.
							</p>
						</div>

						<div class="d-flex mb-3">
							<div class="badge badge-warning badge-ico-sm rounded-circle float-start">
								<i class="fi fi-check"></i>
							</div>

							<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
								Suggest Puja if any required.
							</p>
						</div>

					</div>
				</section>

			</div>

			<div class="col-lg-3 order-2 order-lg-2 mb-5">
				@include('frontend.query.sidebar.query_sidebar')
			</div>

		</div>

	</div>
</section>	
<!-- end :: content -->

@endsection
<!-- End Section -->



