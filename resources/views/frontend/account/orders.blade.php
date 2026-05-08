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

				<div class="clearfix mb-5">

					<!-- Order Period -->
					<div class="dropdown bootstrap-select form-control b-0 bg-light bs-select w--250 w-100-xs float-start float-none-xs mb-2"><select class="form-control b-0 bg-light bs-select w--250 w-100-xs float-start float-none-xs mb-2 js-bselectified" data-style="bg-light select-form-control" title="Order Period" data-header="Order Period" onchange="window.location=this.value" tabindex="null"><option class="bs-title-option" value=""></option>
						<option value="#">All (12)</option>
						<option value="?filter_order_period=1">Last 3 months</option>
						<option value="?filter_order_period=2">Last 6 months</option>
						<option value="?filter_order_period=2019">Year 2019</option>
					</select><button type="button" tabindex="-1" class="btn dropdown-toggle bg-light select-form-control bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-1" aria-haspopup="listbox" aria-expanded="false" title="Order Period"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Order Period</div></div> </div></button><div class="dropdown-menu "><div class="popover-header"><button type="button" class="close" aria-hidden="true">×</button>Order Period</div><div class="inner show" role="listbox" id="bs-select-1" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>

					<!-- Order Status -->
					<div class="dropdown bootstrap-select form-control b-0 bg-light bs-select w--250 w-100-xs float-start float-none-xs mb-2"><select class="form-control b-0 bg-light bs-select w--250 w-100-xs float-start float-none-xs mb-2 js-bselectified" data-style="bg-light select-form-control" title="Order Status" data-header="Order Status" onchange="window.location=this.value"><option class="bs-title-option" value=""></option>
						<option value="#">Any</option>
						<option value="?filter_order_status=1">Completed</option>
						<option value="?filter_order_status=2">Canceled</option>
						<option value="?filter_order_status=3">Refunded</option>
					</select><button type="button" tabindex="-1" class="btn dropdown-toggle bg-light select-form-control bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-2" aria-haspopup="listbox" aria-expanded="false" title="Order Status"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Order Status</div></div> </div></button><div class="dropdown-menu "><div class="popover-header"><button type="button" class="close" aria-hidden="true">×</button>Order Status</div><div class="inner show" role="listbox" id="bs-select-2" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>

				</div>

				<!-- order -->
				<div class="clearfix p-3 shadow-xs shadow-md-hover mb-3 rounded bg-white">

					<h2 class="fs--18">
						<a href="account-order-detail.html" class="float-end fs--12">
							ORDER DETAIL
						</a>
						<a href="account-order-detail.html" class="text-dark">
							Order #1487
						</a>
					</h2>

					<p class="mb-0 fs--14">
						Date: November 23, 2019, 11:38 | Total: $2796.45
					</p>

					<p class="mb-0 fs--14">
						Status:&nbsp;
						<span class="text-warning font-weight-normal">Pending / New</span>
					</p>

				</div>
				<!-- /order -->



				<!-- order -->
				<div class="clearfix p-3 shadow-xs shadow-md-hover mb-3 rounded bg-white">

					<h2 class="fs--18">
						<a href="account-order-detail.html" class="float-end fs--12">
							ORDER DETAIL
						</a>
						<a href="account-order-detail.html" class="text-dark">
							Order #1123
						</a>
					</h2>

					<p class="mb-0 fs--14">
						Date: November 23, 2019, 11:38 | Total: $2796.45
					</p>

					<p class="mb-0 fs--14">
						Status:&nbsp;
						<span class="text-info font-weight-normal">Refunded</span>
					</p>

				</div>
				<!-- /order -->



				<!-- order -->
				<div class="clearfix p-3 shadow-xs shadow-md-hover mb-3 rounded bg-white">

					<h2 class="fs--18">
						<a href="account-order-detail.html" class="float-end fs--12">
							ORDER DETAIL
						</a>
						<a href="account-order-detail.html" class="text-dark">
							Order #1009
						</a>
					</h2>

					<p class="mb-0 fs--14">
						Date: November 23, 2019, 11:38 | Total: $2796.45
					</p>

					<p class="mb-0 fs--14">
						Status:&nbsp;
						<span class="text-danger font-weight-normal">Canceled</span>
					</p>

				</div>
				<!-- /order -->




				<!-- order -->
				<div class="clearfix p-3 shadow-xs shadow-md-hover mb-3 rounded bg-white">

					<h2 class="fs--18">
						<a href="account-order-detail.html" class="float-end fs--12">
							ORDER DETAIL
						</a>
						<a href="account-order-detail.html" class="text-dark">
							Order #987
						</a>
					</h2>

					<p class="mb-0 fs--14">
						Date: November 23, 2019, 11:38 | Total: $2796.45
					</p>

					<p class="mb-0 fs--14">
						Status:&nbsp;
						<span class="text-success font-weight-normal">Completed</span>
					</p>

				</div>
				<!-- /order -->



				<!-- pagination -->
				<nav aria-label="pagination" class="mt-5">
					<ul class="pagination pagination-pill justify-content-end justify-content-center justify-content-md-end">

						<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
						</li>
						
						<li class="page-item active">
							<a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
						</li>
						
						<li class="page-item" aria-current="page">
							<a class="page-link" href="#">2</a>
						</li>
						
						<li class="page-item">
							<a class="page-link" href="#">3</a>
						</li>
						
						<li class="page-item">
							<a class="page-link" href="#">Next</a>
						</li>

					</ul>
				</nav>
				<!-- pagination -->
						
			</div>

		</div>

	</div>
</section>

@endsection
<!-- End Section -->
