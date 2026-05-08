<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Blog : Birth month influence - Astroduniya')
@section('description','Get Astrological information, news, blogs, article of spiritual activities and many other subjects.')
@section('keywords','astrology blogs, astrology articles, astrology news, astrology discussion, popular blogs, read blogs, blog sites')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Blog"; 
	$toolbar_title="Read Blog";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')
	
<section>
<div class="container">
	<div class="row">
		<!-- BLOG ARTICLE -->
		<div class="col-lg-9 order-1 order-lg-1">
			<div>
				<h2>Birth month influence</h2>

				<p class="text-muted fs--18">How the month you're born matters for helth and character ?</p>	
				
				<img class="img-responsive" src="{{ asset('images/blog/birth_influence_people.jpg') }}" width="880" alt="about astrology"><br/><br/>
				<p>The day of a person's birth is thought by many to play a significant role in their character. Person's birth month influence their personality to a great degree. It can also determine what kind of diseases they most likely to contract.</p>
				
				<div class="mb-5 my-5">	
					<h3>January</h3>
					<p>
						People born in January are talkative and bold.<br/>
						Those born in the first month of the year are smart, active and the sexiest among all.<br/>They mostly experience gastric ulcers, constipation, heart attacks, migraine.
					</p><br/>

					<h3>February</h3>
					<p>
						People born in February are loyal and free-bird.<br/>
						Those born in the second month of the year are blessed with a wealth of creativity.<br/>They mostly experience thyroid gland problems, heart diseases.
					</p><br/>

					<h3>March</h3>
					<p>
						People born in March are charismatic and genius.<br/>
						Those born in the march are kind, gentle and naughty.<br/>They mostly experience asthma, heart problems, arthritis.
					</p><br/>

					<h3>April</h3>
					<p>
						People born in April are caring and Charming.<br/>
						Those born in the april are strong, straightforward.<br/>They mostly experience bronchitis, tumors, asthma.
					</p><br/>

					<h3>May</h3>
					<p>
						People born in May are Lover and socially active.<br/>
						Those born in the may are intelligence, motivating, diplomatic and bored very easily.<br/>They mostly experience bronchitis, tumors, asthma.
					</p><br/>

					<h3>June</h3>
					<p>
						People born in June are perfectionist and curious.<br/>
						Those born in the june are sensitive and lovable.<br/>They mostly experience heart diseases, rheumatism, arthritis.
					</p><br/>

					<h3>July</h3>
					<p>
						People born in July are flirty and adventurous.<br/>
						Those born in the july are honest, cheerful, supportive and can easily hurt.<br/>They mostly experience arthritisasthma, tumors, neck pain.
					</p><br/>

					<h3>August</h3>
					<p>
						People born in August are Creative and hardworking.<br/>
						Those born in the august are active, kind-hearted.<br/>They mostly experience osteoporosis, asthma, and thyroid gland problems.
					</p><br/>

					<h3>September</h3>
					<p>
						People born in September are sensitive and pretty.<br/>
						Those born in the september are Intelligent, spiritual and geniuses in their own fields.<br/>They mostly experience osteoporosis and thyroid gland problems.
					</p><br/>

					<h3>October</h3>
					<p>
						People born in October are stylish and friendly.<br/>
						Those born in the october are passionate, lucky and secretive in nature.<br/>They mostly experience thyroid gland problems and migraines and high levels of cholesterol.
					</p><br/>

					<h3>November</h3>
					<p>
						People born in November are diligent and adventurous.<br/>
						Those born in the november are strong-willed, sharp and unfathomable.<br/>They mostly experience thyroid gland problems, heart attacks, constipation.
					</p><br/>

					<h3>December</h3>
					<p>
						People born in December are beautiful and confident.<br/>
						Those born in the last month of the year are responsive, risk-takers, patriotic.<br/>They mostly experience heart problems, chronic bronchitis.
					</p>
					
				</div>

				<p class="text-muted border-bottom pb-2 fs--13">
					Last Update: Feb 07, 2019 / 02:49 AM
				</p>
				<!-- Tags and share -->
				<div class="row">
					<div class="col-6">

						<h4 class="fs--13 text-muted">
							Similar posts by tag
						</h4>

						<a href="#!" class="text-dark bg-light fs--13 rounded py-2 px-3 m-1 text-decoration-none" rel="nofollow">
							tag 1
						</a>

						<a href="#!" class="text-dark bg-light fs--13 rounded py-2 px-3 m-1 text-decoration-none" rel="nofollow">
							tag 2
						</a>

						<a href="#!" class="text-dark bg-light fs--13 rounded py-2 px-3 m-1 text-decoration-none" rel="nofollow">
							tag 3
						</a>

					</div>

					<div class="col-6 col-6 text-align-end">

						<h4 class="fs--13 text-muted">
							Share with your friends &amp; family
						</h4>

						<!-- social -->
		                <div class="clearfix"> 
		                    <a href="https://wa.me/919699342442/?text=subscribe" target="_blank" aria-label="whatsapp page">
		                       <img src="{{ asset('images/social/whatsapp.png') }}" width="30px" height="30px" alt="whatsapp">
		                    </a>&nbsp;

		                    <a href="#!" target="_blank" aria-label="facebook page">
		                       <img src="{{ asset('images/social/facebook.png') }}" width="30px" height="30px" alt="facebook">
		                    </a>&nbsp;

		                    <a href="#!" target="_blank" aria-label="twitter page">
		                        <img src="{{ asset('images/social/twitter.png') }}" width="30px" height="30px" alt="twitter">
		                    </a>&nbsp;

		                </div>
		                <!-- /social -->

					</div>
				</div>
				<!-- /Tags and share -->


			</div>


		</div>
		<!-- /BLOG ARTICLE -->

		<!-- BLOG SIDEBAR -->
		<div class="col-lg-3 order-2 order-lg-2 mb-5">
			@include('frontend.section.sidebar.sidebar')
		</div>
		<!-- /BLOG SIDEBAR -->

	</div>


</div>
</section>
	
@endsection
<!-- End Section -->
