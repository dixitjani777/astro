<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Puja, Other Religious Services - Astroduniya')
@section('description','Book online Pandit for any occasions in anywhere. Online pandit booking available for Havan, Marriage, Katha, Karmkand, Yagya, Griha Pravesh puja and much more.')
@section('keywords','online pandit booking, panditji for griha pravesh, pandit for satyanarayan katha, book pandit online, pandit for marriage, purohit, maharaj, gor maharaj, panditji for havan, pandit for yagaya, pandit for pooja, katha vanchan, shrimad bhagwat katha, vastu pooja, shrimant, mundan, karmkand, marriage')
@section('keywords','online puja services, puja online, panditji for puja, panditji for puja, panditji for puja, panditji for havan, rudraksha beads, online hindu puja services')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php
	$toolbar_page="Puja & Other Services"; 
	$toolbar_title="Prayer Services";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-9 order-1 order-lg-1">
				<div class="row">
					@forelse(($panditServices ?? []) as $svc)
						@php
							$img = $svc->image_path;
							$isUrl = is_string($img) && preg_match('/^https?:\\/\\//i', $img);
							$imgUrl = $img ? ($isUrl ? $img : asset($img)) : '';
							$link = $svc->link_url ?: '#!';
						@endphp

						<div class="col-6 mb-5">
							<div class="bg-white p-2 shadow-primary-xs transition-hover-top transition-all-ease-250">
								<a href="{{ url($link) }}" class="d-block overflow-hidden overlay-dark-hover overlay-opacity-2 text-decoration-none text-dark">
									@if($imgUrl)
										<img class="img-fluid lazy rounded" src="{{ $imgUrl }}" alt="{{ $svc->title }}">
									@endif
								</a>

								<div class="p-3">
									<h5 class="m-0">
										{{ $svc->title }}
									</h5>

									@if($svc->short_text)
										<ul class="list-inline fs--13 m-0">
											<li class="list-inline-item">
												<a href="{{ url($link) }}" class="text-gray-500">{{ $svc->short_text }}</a>
											</li>
										</ul>
									@endif
								</div>
							</div>
						</div>
					@empty
						<div class="col-12">
							<div class="alert alert-secondary mb-0">No services are available right now.</div>
						</div>
					@endforelse
				</div>

			</div>
			
			<!-- INFO -->
			
			<div class="col-lg-3 order-2 order-lg-2 mb-5">
				@include('frontend.panditji.sidebar.sidebar')
			</div>

		</div>
	</div>
</section>

@endsection
<!-- End Section -->


