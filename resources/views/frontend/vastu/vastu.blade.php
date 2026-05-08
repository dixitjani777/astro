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

					<p class="text-muted sub_heading letter-spacing-03 badge badge-pill badge-primary badge-soft fs--15 mb-1">
						<span class="styleColor">*</span> You must <a href="#" ">Log in</a> to consult Us.
					</p><br><br>

					<!-- Query Form -->
					<form novalidate method="post" action="#" class="bs-validate d-block bg-white shadow-primary-xs rounded p-4 mb-5">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-label-group mb-3">
									<input required placeholder="Name" id="name" type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Name">
									<label for="comment_name">Property Occupant Name</label>
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
						
							<div class="row">
								<div class="col-12 col-md-6">
								<div class="form-label-group mb-3">
									<select id="select_options2" class="form-control">
										<option value="apartment">Apartment</option>
										<option value="bungalow">Bungalow</option>
										<option value="plot/land">Plot/Land</option>
										<option value="shop">Shop</option>
										<option value="factory">Factory</option>
										<option value="workplace">Workplace</option>
									</select>
									<label for="select_options2">Property Type</label>
								</div>
							</div>

							<div class="col-12 col-md-3">
								<div class="form-label-group mb-3">
									<select id="select_options2" class="form-control">
										<option value="visit">Personal Visit</option>
										<option value="phone">Phone Consultation</option>
										<option value="video">Video Consultation</option>
										
									</select>
									<label for="select_options2">Consultation Type</label>
								</div>
							</div>

							<div class="col-12 col-md-3">
								<div class="form-label-group mb-3">
									<select id="select_options2" class="form-control">
										<option value="basic">Basic Report</option>
										<option value="detail">Detailed Report with Remedies</option>
										
									</select>
									<label for="select_options2">Report</label>
								</div>
							</div>

						</div>
						
						<!-- AJAX -->
						<div class="mb-1">

							<label class="btn btn-warning cursor-pointer position-relative">

								<!-- 
									We use .absolute-full class instead of .viewport-out
									Just to make sure the element is working crossbrowser!
									-->
								<input 	name="file_input_name[]" 
										multiple=""
										type="file" 

										data-file-ext="mp3, jpg, png, gif" 
										data-file-max-size-kb-per-file="0"
										data-file-max-size-kb-total="0" 
										data-file-max-total-files="100"
										data-file-ext-err-msg="Allowed:" 
										data-file-exist-err-msg="File already exists:"
										data-file-size-err-item-msg="File too large!"
										data-file-size-err-total-msg="Total allowed size exceeded!"
										data-file-size-err-max-msg="Maximum allowed files:"
										data-file-toast-position="bottom-center"
										data-file-preview-container=".js-file-input-container-multiple-example-ajax" 
										data-file-preview-img-height="120" 
										data-file-preview-show-info="false" 
										data-file-preview-class="show-hover-container shadow-md m-2 rounded float-start" 
										data-file-preview-img-cover="false" 

										data-file-ajax-upload-enable="true"
										data-file-ajax-upload-url="../../html_frontend/demo.files/php/demo.ajax_file_upload.php"
										data-file-ajax-upload-params="['action','upload']['param2','value2']"

										data-file-ajax-delete-enable="true"
										data-file-ajax-delete-url="../../html_frontend/demo.files/php/demo.ajax_file_upload.php"
										data-file-ajax-delete-params="['action','delete_file']"

										data-file-ajax-reorder-enable="true"
										data-file-ajax-reorder-url="../../html_frontend/demo.files/php/demo.ajax_file_upload.php"
										data-file-ajax-reorder-params="['action','reorder']"
										data-file-ajax-reorder-toast-success="Order Saved!" 
										data-file-ajax-reorder-toast-position="bottom-center" 

										data-file-ajax-toast-success-txt="Successfully Uploaded!"
										data-file-ajax-toast-error-txt="One or more files not uploaded!"
										data-file-ajax-callback-function=""
										data-file-ajax-progressbar-custom=""
										data-file-ajax-progressbar-disable="false"

										class="custom-file-input absolute-full">

									Upload Images

							</label>

						</div>

						<div class="clearfix mb-3">
							<div class="form-label-group">
								<textarea required rows="3" id="comment_description"
										data-output-target=".js-form-advanced-char-left" 
										class="form-control js-form-advanced-char-count-down" 
										maxlength="3000" placeholder="Your comment"></textarea>
								<label for="comment_description">Specific Concerns / Problems </label>
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



