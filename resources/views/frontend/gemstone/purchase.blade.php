<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Buy Gemstones Online : Certified Gemstones - Astroduniya')
@section('description','Buy government certified Gemstones at best prices. It comes with extra powerfull because pandit ji add extra effect by his Prayer.')
@section('keywords','buy gemstones online, government certified gemstones, gemstones, lucky gemstone, gemstones online, buy gemstones, gemstones buy, gemstones buy online, gemstones near me')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Buy Gemstone"; 
	$toolbar_title="Buy Gemstone";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')


<section>
	<div class="container">
				
		<div class="row">
			<div class="col-lg-4 col-md-4">
				<!-- IMAGES -->
				<div class="row no-gutters">

					<div class="col-12 position-relative z-index-2">

						<a href="demo.files/images/unsplash/products/smartwatch_3.jpg" data-photoswipe="product-images-group" class="photoswipe d-block m-1">
							<div class="clearfix text-center bg-light bg-light-radial rounded position-relative">
								<div class="thumbnail-shadow-drop">

									<div class="overflow-hidden position-relative">
										<div class="animate-shine"> 
											
											<img src="{{ asset('images/stones/stone.png') }}" alt="..." class="img-fluid max-h-500 max-h-300-xs bg-suprime my-5 ml-4 mr-4 opacity-9 animate-bounceinup"> 

										</div>
									</div>

								</div>
							</div>
						</a>

					</div>

					<div class="col-12 col-12 col-md-6 d-none d-lg-block">
						<a href="demo.files/images/unsplash/products/smartwatch_2.jpg" data-photoswipe="product-images-group" class="d-block m-1 bg-light bg-light-radial text-center photoswipe">
							<img class="img-fluid bg-suprime" src="{{ asset('images/stones/stn2.png') }}" alt="...">
						</a>
					</div>

					<div class="col-12 col-12 col-md-6 d-none d-lg-block">
						<a href="demo.files/images/unsplash/products/smartwatch_1.jpg" data-photoswipe="product-images-group" class="d-block m-1 bg-light bg-light-radial text-center photoswipe">
							<img class="img-fluid bg-suprime" src="{{ asset('images/stones/stone.png') }}" alt="...">
						</a>
					</div>

					<!-- mobile "view more" indicator -->
					<div class="col-12 d-block d-lg-none">
						
						<div class="position-relative bg-theme-color-light clearfix text-center p-4 mt-3 text-gray-500">
							<i class="arrow arrow-lg arrow-top arrow-center border-theme-color-light"></i>
							
							<span class="text-gray-500">
								click to view more
							</span>

						</div>

					</div>
					<!-- /mobile "view more" indicator -->

				</div>
				<!-- /IMAGES -->
			</div>

			<div class="col-lg-5 col-md-5">

				<div class="clearfix"><!-- sticky-kit -->

					<!-- TITLE -->
					<h1 class="h2 h3-xs font-weight-medium mb-3">
						Blue Sapphire / Neelam
						<span class="d-block text-muted fs--14">LAB CERTIFIED</span>
					</h1>



					<!-- Form -->
					<form novalidate class="bs-validate" method="post" action="#" data-error-scroll-up="true">
						
						
						<!-- PRICE -->
						<div class="clearfix mb-3">

							<!-- <p class="text-muted m-0">
								<del>₹ 4500</del> 
								<span class="text-success font-light fs--14">(– 30%) / 
									<span class="font-weight-medium">you save $31.00</span>
								</span>
							</p> -->

							<p class="fs--25 m-0 font-weight-medium text-danger">

								<!-- 
									counter used because of configurator to do the math.
									If configurator not used, just add the price instead ($149.99)
								-->
								<span class="item-price text-success" 
											data-toggle="count" 
											data-count-decimals="2"
											data-count-from="144.99" 
											data-count-to="144.99" 
											data-count-duration="250">$ 144.99</span>
							</p>

						</div>

						<!-- CARATE -->
						<div class="clearfix mb-3">
							<a class="js-ajax-modal h6 font-weight-medium" href="#"
								data-href="_ajax/modal_shop_size_guide.html" 
								data-ajax-modal-size="modal-xl" 
								data-ajax-modal-centered="true">Select Carate
							</a>

							<div class="row no-gutters mt-2">

								<div class="col-6 col-md-4">
									<label class="form-selector form-selector-lg d-block p-0 m-1">
										<input required type="radio" name="size" disabled="">
										<span class="w-100">2</span>
									</label>
								</div>

								<div class="col-6 col-md-4">
									<label class="form-selector form-selector-lg d-block p-0 m-1">
										<input required type="radio" name="size">
										<span class="w-100">3</span>
									</label>
								</div>

								<div class="col-6 col-md-4">
									<label class="form-selector form-selector-lg d-block p-0 m-1">
										<input required type="radio" name="size">
										<span class="w-100">5</span>
									</label>
								</div>

								<div class="col-6 col-md-4">
									<label class="form-selector form-selector-lg d-block p-0 m-1">
										<input required type="radio" name="size">
										<span class="w-100">7</span>
									</label>
								</div>

								<div class="col-6 col-md-4">
									<label class="form-selector form-selector-lg d-block p-0 m-1">
										<input required type="radio" name="size">
										<span class="w-100">7</span>
									</label>
								</div>

								<div class="col-6 col-md-4">
									<label class="form-selector form-selector-lg d-block p-0 m-1">
										<input required type="radio" name="size">
										<span class="w-100">7</span>
									</label>
								</div>

							</div>

						</div>
						<!-- /SIZE -->

						<!-- SIZE -->
						<div class="clearfix mb-3">
							<a class="js-ajax-modal h6 font-weight-medium" href="#"
								data-href="_ajax/modal_shop_size_guide.html" 
								data-ajax-modal-size="modal-xl" 
								data-ajax-modal-centered="true">Size Guide
							</a>

							<div class="row no-gutters mt-2">

								<div class="col-6 col-md-4">
									<label class="form-selector form-selector-lg d-block p-0 m-1">
										<input required type="radio" name="size" disabled="">
										<span class="w-100">EU 35</span>
									</label>
								</div>

								<div class="col-6 col-md-4">
									<label class="form-selector form-selector-lg d-block p-0 m-1">
										<input required type="radio" name="size">
										<span class="w-100">EU 36</span>
									</label>
								</div>

								<div class="col-6 col-md-4">
									<label class="form-selector form-selector-lg d-block p-0 m-1">
										<input required type="radio" name="size">
										<span class="w-100">EU 37</span>
									</label>
								</div>

								

							</div>

						</div>
						<!-- /SIZE -->


					



							
						<!-- ADD TO CART BUTTON -->
						<button class="btn btn-red btn-soft btn-block"> 
							<span class="px-4 p-0-xs">
								<span class="fs--18">Buy Now</span>
							</span>

							

						</button>
						<!-- /ADD TO CART BUTTON -->


					</form>
					<!-- /Form -->

				</div>



			</div>

			<div class="col-lg-3 col-md-3">
				<div>
					<a href="#!" class="mt-5 d-block text-center overlay-dark-hover overlay-opacity-2 rounded overflow-hidden">
						<img class="w-100 img-fluid rounded" src="http://lc.smartastro.com/images/offers/off_1.png" alt="...">
					</a>

					<h4 class="fs--13 text-gray-500 font-weight-normal mt-1 mb-0">
						Sponsored Ad
					</h4>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- DESCRIPTION -->
<section>
	<div class="container">

		<h2>
			Description
		</h2>

		<div class="lead article-format">

			<p>A product description is the <b>marketing copy</b> used to describe a product’s value proposition to potential customers. A compelling product description provides customers with details around features, problems it solves and other benefits to help generate a sale.</p>
			<p>Whether your products have a specific function, like a camera, or a personal purpose, like fashion, all products exist to enhance or improve the purchaser’s quality of life in one way or another. As the shopper browses, they instinctively imagine having each product in hand, using it and enjoying it.</p>
			<p>The more powerful the customer’s fantasy of owning the product, the more likely they are to buy it. Therefore, I like to think of product descriptions as storytelling and psychology, incorporating the elements of both prose writing and journalism. A “good” product description will not do. Competition is getting too fierce. It must be great!</p>

		</div>

	</div>
</section>
<!-- /DESCRIPTION -->

<!-- SPECIFICATIONS -->
<section class="border-top">
	<div class="container">

		<h2 class="font-weight-light mb-4 text-center-xs">
			Specifications
		</h2>


		<div class="table-responsive">


			<h3 class="h5">
				Video
			</h3>

			<table class="table table-striped">
				<tbody>

					<tr>
						<td class="text-muted w-50">Display Type</td>
						<td>Flat LCD 55"</td>
					</tr>

					<tr>
						<td class="text-muted w-50">Resolution</td>
						<td>
							1200 x 450 <br> 
							1366 x 768 <br> 
							1920 x 768
						</td>
					</tr>

				</tbody>
			</table>





			<h3 class="h5">
				Connectors
			</h3>

			<table class="table table-striped">
				<tbody>

					<tr>
						<td class="text-muted w-50">Network Connector</td>
						<td>No</td>
					</tr>

					<tr>
						<td class="text-muted w-50">USB</td>
						<td>1</td>
					</tr>

					<tr>
						<td class="text-muted w-50">HDMI</td>
						<td>&ndash;</td>
					</tr>

					<tr>
						<td class="text-muted w-50">PCMCIA</td>
						<td>1</td>
					</tr>

				</tbody>
			</table>


		</div>
									
	</div>
</section>
<!-- /SPECIFICATIONS -->

<!-- REVIEWS -->
<section class="border-top">
	<div class="container">

		<h2 class="font-weight-light mb-5 text-center-xs">
			Reviews 
			<small class="text-muted fs--16 d-block-xs">(32 reviews)</small>
		</h2>



		<!-- summary -->
		<div class="shadow-xs p-4 mb-5 rounded">
			
			<div class="row my-2">

				<div class="col-md-4 col-sm-6 text-center-xs">

					<h6 class="mb-3">Overall Product Rating</h6>
					<span class="rating-4_5 text-warning fs--30"></span>
					<h6 class="mt-3">4.39 (172 reviews)</h6>

				</div>


				<div class="col-12 d-block d-sm-none my-5"><hr><!-- mobile spacer --></div>


				<div class="col-md-4 hidden-md-down">

					<div class="row mb--6">
						<div class="col-2 p-0">
							<a class="text-decoration-none" href="#"> 5 <i class="mx-1 fi fi-star-full text-warning"></i> </a>
						</div>
						<div class="col">
							<div class="progress mt-1">
								<div class="progress-bar bg-warning" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100">
									<span class="text-align-start d-inline-block px-2">33 votes</span>
								</div>
							</div>
						</div>
					</div>

					<div class="row mb--6">
						<div class="col-2 p-0">
							<a class="text-decoration-none" href="#"> 4 <i class="mx-1 fi fi-star-full text-warning"></i> </a>
						</div>
						<div class="col">
							<div class="progress mt-1">
								<div class="progress-bar bg-warning" role="progressbar" style="width: 34%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100">
									<span class="text-align-start d-inline-block px-2">16 votes</span>
								</div>
							</div>
						</div>
					</div>

					<div class="row mb--6">
						<div class="col-2 p-0">
							<a class="text-decoration-none" href="#"> 3 <i class="mx-1 fi fi-star-full text-warning"></i> </a>
						</div>
						<div class="col">
							<div class="progress mt-1">
								<div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
									<span class="text-align-start d-inline-block px-2">12 votes</span>
								</div>
							</div>
						</div>
					</div>

					<div class="row mb--6">
						<div class="col-2 p-0">
							<a class="text-decoration-none" href="#"> 2 <i class="mx-1 fi fi-star-full text-warning"></i> </a>
						</div>
						<div class="col">
							<div class="progress mt-1">
								<div class="progress-bar bg-warning" role="progressbar" style="width: 9%" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100">
									<span class="text-align-start d-inline-block px-2">3 votes</span>
								</div>
							</div>
						</div>
					</div>

					<div class="row mb--6">
						<div class="col-2 p-0">
							<a class="text-decoration-none" href="#"> 1 <i class="mx-1 fi fi-star-full text-warning"></i> </a>
						</div>
						<div class="col">
							<div class="progress mt-1">
								<div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
									<span class="text-align-start d-inline-block px-2">12 votes</span>
								</div>
							</div>
						</div>
					</div>

				</div>


				<div class="col-md-4 col-sm-6 text-center">
					<h3 class="fs--20 mt-0 mb--25">Already used this product?</h3>
					
					<a href="#" 
						data-href="_ajax/modal_shop_review.html" 
						data-ajax-modal-size="modal-md" 
						data-ajax-modal-backdrop="static" 
						data-ajax-modal-centered="true" 
					 	class="js-ajax-modal btn btn-warning">
						<i class="fi fi-pencil"></i>
						WRITE A REVIEW
					</a>

					<!-- IF NOT LOGGED IN : MODAL PROMPT -->
					<!--
					<a href="#" 
						data-href="_ajax/modal_signin_md.html" 
						data-ajax-modal-size="modal-md" 
						data-ajax-modal-backdrop="static" 
						data-ajax-modal-centered="true" 
					 	class="js-ajax-modal btn btn-secondary">
						<i class="fi fi-pencil"></i>
						WRITE A REVIEW
					</a>
					-->

				</div>


				<div class="col-12 hidden-md-up mt--40"><!-- mobile spacer --></div>

			</div>

		</div>
		<!-- /summary -->



		<!-- REVIEW FILTER -->
		<div class="clearfix shadow-xs rounded px-3 py-3 mb-5">

			<h6 class="fs--14 mb-3 font-weight-normal">SORT BY</h6>

			<div class="w--200 w-100-xs float-start float-none-xs mb-1">
				<select class="form-control">
					<option value="0" data-icon="fi fi-bell-active float-start">New</option>
					<option value="1" data-icon="fi fi-like float-start">Popular</option>
				</select>
			</div>

			<div class="w--150 w-100-xs float-start float-none-xs mb-1">
				<select class="form-control">
					<option value="0" data-icon="fi fi-star-full text-warning float-start">All</option>
					<option value="5" data-icon="fi fi-star-full text-warning float-start">5 stars</option>
					<option value="4" data-icon="fi fi-star-full text-warning float-start">4 stars</option>
					<option value="3" data-icon="fi fi-star-full text-warning float-start">3 stars</option>
					<option value="2" data-icon="fi fi-star-full text-warning float-start">2 stars</option>
					<option value="1" data-icon="fi fi-star-full text-warning float-start">1 star</option>
				</select>
			</div>

		</div>
		<!-- /REVIEW FILTER -->





		<!-- review 1 -->
		<div class="row mb-5">

			<div class="col-md-2 text-center">

				<!-- avatar -->
				<span class="w--80 h--80 rounded-circle d-inline-block bg-cover" style="background-image:url('http://lc.smartastro.com/images/other/photowe.jpg')"></span>

				<div class="mt-2">
					<a href="#">John Doe</a>
					<p class="d-block fs--12 text-muted sow-util-timeago"
						data-time="2019-09-17T23:59:17" 
						data-live="true" 
						data-lang='{
							"seconds" 		: "less than a minute ago",
							"minute" 		: "about a minute ago",
							"minutes" 		: "%d minutes ago",
							"hour" 			: "about an hour ago",
							"hours" 		: "about %d hours ago",
							"day" 			: "a day ago",
							"days" 			: "%d days ago",
							"month" 		: "about a month ago",
							"months" 		: "%d months ago",
							"year" 			: "about a year ago",
							"years" 		: "%d years ago"
						}'>
					</p>
				</div>

			</div>

			<div class="col-md-10">

				<div class="mb-2">
					<h5>This product is awesome!</h5>
					<i class="rating-4_5 text-warning"></i>
				</div>

				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>

				<!-- user images -->
				<div class="clearfix">

					<a class="photoswipe" data-photoswipe="gallery-review-id-1" href="demo.files/images/unsplash/products/julian-o-hayon-oW4tZeidfkA-unsplash-min.jpg">
						<img height="80" class="float-start mb-1 rounded lazy" data-src="http://lc.smartastro.com/images/other/photowe.jpg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
					</a>

					<a class="photoswipe" data-photoswipe="gallery-review-id-1" href="demo.files/images/unsplash/products/julian-o-hayon-sDU_o416hlE-unsplash-min.jpg">
						<img height="80" class="float-start mb-1 rounded lazy" data-src="http://lc.smartastro.com/images/other/photowe.jpg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
					</a>

					<a class="photoswipe" data-photoswipe="gallery-review-id-1" href="demo.files/images/unsplash/products/julian-o-hayon-w4znns7NTA0-unsplash-min.jpg">
						<img height="80" class="float-start mb-1 rounded lazy" data-src="http://lc.smartastro.com/images/other/photowe.jpg" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="...">
					</a>

				</div>
				<!-- /user images -->

				<!-- review options -->
				<ul class="list-inline my-4">
					<li class="list-inline-item d-block-xs m-0-xs">

						<!-- 
							NOTE: working ajax button! Check console for debug 
							No security implemented to block multiple votes
							So on page refresh, should be handled by backend!
						-->
						<a href="#" class="btn-toggle btn btn-light py-1 px-2 mb-1 fs--14 d-block-xs text-align-start"
							data-toggle-ajax-url-on="demo.files/php/demo.ajax_request.php?review_id=1&amp;vote=1">
							
							<span class="group-icon">
								<i class="fi fi-like"></i>
								<i class="fi fi-like text-primary"></i>
							</span>

							<span>LIKE</span>
						</a>

					</li>

					<li class="list-inline-item d-block-xs m-0-xs">
						<a class="btn btn-light btn-toggle py-1 px-2 mb-1 fs--14 d-block-xs text-align-start" href="#replies-review-id-1" data-toggle="collapse">
							<span class="group-icon">
								<i class="fi fi-chat"></i> 
								<i class="fi fi-close"></i> 
							</span>

							<span class="group-icon">
								<i>VIEW REPLIES</i>
								<i>HIDE REPLIES</i>
							</span>

							(21)
						</a>
					</li>

					<li class="list-inline-item d-block-xs m-0-xs">

						<!-- 

							Replies are using an ajax modal!

						-->
						<a href="#" class="js-ajax-modal btn btn-light font-weight-medium py-1 px-2 mb-1 fs--14 d-block-xs text-align-start" 
							data-href="_ajax/modal_shop_review_reply.html?review_id=1"
							data-ajax-modal-size="modal-md"
							data-ajax-modal-centered="false"
							data-ajax-modal-backdrop="static">
							<i class="fi fi-plus"></i> 
							REPLY
						</a>

						<!-- IF NOT LOGGED IN : MODAL PROMPT -->
						<!--
						<a href="#" class="js-ajax-modal btn btn-light font-weight-medium py-1 px-2 mb-1 fs--14 d-block-xs text-align-start" 
							data-href="_ajax/modal_signin_md.html"
							data-ajax-modal-size="modal-md"
							data-ajax-modal-centered="false"
							data-ajax-modal-backdrop="static">
							<i class="fi fi-plus"></i> 
							REPLY
						</a>
						-->

					</li>
				</ul>
				<!-- /review options -->


				<!-- replies -->
				<div id="replies-review-id-1" class="collapse">

					<!-- reply 1 -->
					<div class="row">

						<div class="col-lg-1 col-sm-2 col-3">
							<span class="w--60 h--60 rounded-circle d-inline-block bg-cover" style="background-image:url('demo.files/images/unsplash/team/thumb_330/erik-mclean-06vpBIHmiYc-unsplash.jpg')"></span>
						</div>

						<div class="col-lg-11 col-sm-10 col-9">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							</p>

							<p class="d-block fs--12 text-muted">By <a href="#">John Doe</a> on June 29, 2018</p>
						</div>

					</div>
					<!-- /reply 1 -->

					<!-- reply 2 -->
					<div class="row">

						<div class="col-lg-1 col-sm-2 col-3">
							<span data-initials="John Doe" data-assign-color="true" class="sow-util-initials bg-light h5 m-0 w--60 h--60 rounded-circle d-inline-flex justify-content-center align-items-center">
								<i class="fi fi-circle-spin fi-spin"></i>
							</span>
						</div>

						<div class="col-lg-11 col-sm-10 col-9">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							</p>

							<p class="d-block fs--12 text-muted">By <a href="#">John Doe</a> on June 29, 2018</p>
						</div>

					</div>
					<!-- /reply 2 -->



					<!-- more replies : collapsed -->
					<div id="reply_more_review_id_1" class="collapse">

						<!-- reply 3 -->
						<div class="row">

							<div class="col-lg-1 col-sm-2 col-3">
								<span class="w--60 h--60 rounded-circle d-inline-block bg-cover" style="background-image:url('demo.files/images/unsplash/team/thumb_330/erik-mclean-06vpBIHmiYc-unsplash.jpg')"></span>
							</div>

							<div class="col-lg-11 col-sm-10 col-9">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
								</p>

								<p class="d-block fs--12 text-muted">By <a href="#">John Doe</a> on June 29, 2018</p>
							</div>

						</div>
						<!-- /reply 3 -->

					</div>
					<!-- /more replies : collapsed -->



					<a href="#reply_more_review_id_1" data-toggle="collapse" class="fs--13 btn-toggle text-decoration-none">
						<span class="group-icon">
							<i>VIEW MORE (+1)</i>
							<i>VIEW LESS</i>
						</span>
					</a>

				</div>
				<!-- /replies -->


			</div>

		</div>
		<!-- /review 1 -->




		<!-- review 2 -->
		<div class="row mb-5">

			<div class="col-md-2 text-center">

				<!-- avatar -->
				<span data-initials="Felicia Doe" data-assign-color="true" class="sow-util-initials bg-light h5 m-0 w--80 h--80 rounded-circle d-inline-flex justify-content-center align-items-center">
					<i class="fi fi-circle-spin fi-spin"></i>
				</span>

				<div class="mt-2">
					<a href="#">Felicia Doe</a>
					<p class="d-block fs--12 text-muted sow-util-timeago"
						data-time="2019-04-17T23:59:17" 
						data-live="true" 
						data-lang='{
							"seconds" 		: "less than a minute ago",
							"minute" 		: "about a minute ago",
							"minutes" 		: "%d minutes ago",
							"hour" 			: "about an hour ago",
							"hours" 		: "about %d hours ago",
							"day" 			: "a day ago",
							"days" 			: "%d days ago",
							"month" 		: "about a month ago",
							"months" 		: "%d months ago",
							"year" 			: "about a year ago",
							"years" 		: "%d years ago"
						}'>
					</p>
				</div>

			</div>

			<div class="col-md-10">

				<div class="mb-2">
					<h5>Lorem Ipsum Dolor</h5>
					<i class="rating-3 text-warning"></i>
				</div>

				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>

				<!-- review options -->
				<ul class="list-inline my-4">
					<li class="list-inline-item d-block-xs m-0-xs">

						<!-- 
							NOTE: working ajax button! Check console for debug 
							No security implemented to block multiple votes
							So on page refresh, should be handled by backend!
						-->
						<a href="#" class="btn-toggle btn btn-light py-1 px-2 mb-1 fs--14 d-block-xs text-align-start"
							data-toggle-ajax-url-on="demo.files/php/demo.ajax_request.php?review_id=1&amp;vote=1">
							
							<span class="group-icon">
								<i class="fi fi-like"></i>
								<i class="fi fi-like text-primary"></i>
							</span>

							<span>LIKE</span>
						</a>

					</li>

					<li class="list-inline-item d-block-xs m-0-xs">

						<!-- 

							Replies are using an ajax modal!

						-->
						<a href="#" class="js-ajax-modal btn btn-light font-weight-medium py-1 px-2 mb-1 fs--14 d-block-xs text-align-start" 
							data-href="_ajax/modal_shop_review_reply.html?review_id=1"
							data-ajax-modal-size="modal-md"
							data-ajax-modal-centered="false"
							data-ajax-modal-backdrop="static">
							<i class="fi fi-plus"></i> 
							REPLY
						</a>

						<!-- IF NOT LOGGED IN : MODAL PROMPT -->
						<!--
						<a href="#" class="js-ajax-modal btn btn-light font-weight-medium py-1 px-2 mb-1 fs--14 d-block-xs text-align-start" 
							data-href="_ajax/modal_signin_md.html"
							data-ajax-modal-size="modal-md"
							data-ajax-modal-centered="false"
							data-ajax-modal-backdrop="static">
							<i class="fi fi-plus"></i> 
							REPLY
						</a>
						-->

					</li>
				</ul>
				<!-- /review options -->


			</div>

		</div>
		<!-- /review 2 -->

	</div>
</section>
<!-- /REVIEWS -->


@endsection
<!-- End Section -->



