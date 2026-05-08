<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','My Account - Astroduniya')
@section('description','My Account')
@section('keywords','My Account')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Account"; 
	$toolbar_title="My Account";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<section>
	<div class="container">

		<div class="row">

			<div class="col-12 col-sm-12 col-md-12 col-lg-3 mb--60">

				@include('frontend.account.sidebar.sidebar')

			</div>


			<div class="col-12 col-sm-12 col-md-12 col-lg-9">

				<!-- portlet -->
				<div class="portlet">
					
					<!-- portlet : header -->
					<div class="portlet-header border-bottom">

						<div class="float-end">

							<a href="message-write.html" class="btn btn-sm btn-primary btn-pill px-2 py-1 fs--15 mt--n3">
								+ write
							</a>

						</div>

						<span class="d-block text-muted text-truncate font-weight-medium pt-1">
							Your Query&nbsp;&nbsp;&nbsp; <b class="bgylw">* You Can Ask Maximum 3 free query</b>
						</span>
					</div>
					<!-- /portlet : header -->


					<!-- portlet : body -->
					<div class="portlet-body pt-0">


						<form novalidate class="bs-validate" id="form_id" method="post" action="#!">


							<!-- 

								IMPORTANT
								The "action" hidden input is updated by javascript according to button params/action:
									data-js-form-advanced-hidden-action-id="#action"
									data-js-form-advanced-hidden-action-value="delete"

								In your backend, should process data like this (PHP example):

									if($_POST['action'] === 'delete') {

										foreach($_POST['item_id'] as $item_id) {
											// ... delete $item_id from database
										}

									}

							-->
							<input type="hidden" id="action" name="action" value=""><!-- value populated by js -->



							<div class="table-responsive">

								<table class="table table-align-middle border-bottom mb-6">

									<thead>
										<tr class="text-muted fs--13">
											
											<th>
												<span class="px-2 p-0-xs">
													SUBJECT
												</span>
											</th>
											<th class="w--200 hidden-lg-down">SENDER</th>
											<th class="w--200 hidden-lg-down">DATE</th>
											<th class="w--200 hidden-lg-down">STATUS</th>
											<th class="w--60">&nbsp;</th>
										</tr>
									</thead>

									<tr id="message_id_1" class="text-muted">

										

										<td>

											<a href="message-detail.html" class="font-weight-medium text-muted mx-2 m-0-xs">
												Adipiscium
											</a>

											<!-- MOBILE ONLY -->
											<div class="fs--13 d-block d-xl-none">
												<span class="d-block text-muted">Jan 22, 2019 / 02:21</span>
												<span class="d-block font-weight-medium">Melissa Doe</span>
											</div>
											<!-- /MOBILE ONLY -->

										</td>

										<td class="hidden-lg-down">
											Melissa Doe
										</td>

										<td class="hidden-lg-down">
											Jan 22, 2019 / 02:21
										</td>

										<td class="hidden-lg-down">
											Pending
										</td>

									</tr>

									<tr id="message_id_2" class="text-muted">

										

										<td>

											<a href="message-detail.html" class="font-weight-medium text-muted mx-2 m-0-xs">
												Adipiscium
											</a>

											<!-- MOBILE ONLY -->
											<div class="fs--13 d-block d-xl-none">
												<span class="d-block text-muted">Jan 22, 2019 / 02:21</span>
												<span class="d-block font-weight-medium">Melissa Doe</span>
											</div>
											<!-- /MOBILE ONLY -->

										</td>

										<td class="hidden-lg-down">
											Melissa Doe
										</td>

										<td class="hidden-lg-down">
											Jan 22, 2019 / 02:21
										</td>

										<td class="hidden-lg-down">
											Pending
										</td>

									</tr>

									<tr id="message_id_3" class="text-muted">

										

										<td>

											<a href="message-detail.html" class="font-weight-medium text-muted mx-2 m-0-xs">
												Adipiscium
											</a>

											<!-- MOBILE ONLY -->
											<div class="fs--13 d-block d-xl-none">
												<span class="d-block text-muted">Jan 22, 2019 / 02:21</span>
												<span class="d-block font-weight-medium">Melissa Doe</span>
											</div>
											<!-- /MOBILE ONLY -->

										</td>

										<td class="hidden-lg-down">
											Melissa Doe
										</td>

										<td class="hidden-lg-down">
											Jan 22, 2019 / 02:21
										</td>

										<td class="hidden-lg-down">
											Pending
										</td>

									</tr>

									

								</table>

							</div>



							

						</form>

					</div>
					<!-- /portlet : body -->

				</div>
				<!-- /portlet -->

			</div>

		</div>

	</div>
</section>

@endsection
<!-- End Section -->
