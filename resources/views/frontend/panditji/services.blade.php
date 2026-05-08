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
			
			<!-- INFO -->
			
			<div class="col-lg-3 order-2 order-lg-2 mb-5">
				@include('frontend.panditji.sidebar.sidebar')
			</div>

		</div>
	</div>
</section>

@endsection
<!-- End Section -->



