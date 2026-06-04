<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','My Orders - Astroduniya')
@section('description','My Orders')
@section('keywords','My Orders')
<!-- End of layout, title, description, keywords -->

<?php
	$toolbar_page="Account";
	$toolbar_title="My Orders";
?>

@section('content')
@include('frontend.layouts.subnav')

<section>
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-3 mb--60">
				@include('frontend.account.sidebar.sidebar')
			</div>

			<div class="col-12 col-sm-12 col-md-12 col-lg-9">
				<div class="portlet">
					<div class="portlet-header border-bottom">
						<span class="d-block text-muted text-truncate font-weight-medium pt-1">
							Orders history (currently tracked via your enquiries until the Orders module is added)
						</span>
					</div>

					<div class="portlet-body pt-0">
						@if($enquiries->count() === 0)
							<div class="alert alert-secondary mt-3 mb-0">
								No orders found. You can place an order from
								<a href="{{ url('/gemstone/buy') }}">Gemstones</a>.
							</div>
						@else
							@include('frontend.account.partials.enquiries_table', ['enquiries' => $enquiries])
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

