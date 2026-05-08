<nav class="nav-deep nav-deep-light">

	<!-- mobile only -->
	<button class="clearfix btn btn-toggle btn-sm btn-block text-align-left shadow-md border rounded mb-1 d-block d-lg-none" data-target="#nav_responsive" data-toggle-container-class="d-none d-sm-block bg-white shadow-md border animate-fadein rounded p-3">
		<span class="group-icon px-2 py-2 float-start">
			<i class="fi fi-bars-2"></i>
			<i class="fi fi-close"></i>
		</span>

		<span class="h5 py-2 m-0 float-start">
			Account Menu
		</span>
	</button>

	<!-- desktop only -->
	<h5 class="pt-3 pb-3 m-0 d-none d-lg-block">
		Account Menu
	</h5>

	<!-- navigation -->
	<ul id="nav_responsive" class="nav flex-column d-none d-lg-block">
		<li class="nav-item {{ Request::segment(2)=='querystatus' ? 'active' : '' }} ">
			<a class="nav-link px-0" href="{{ url('/myaccount/querystatus')}}">
				<i class="fi fi-arrow-end m-0 fs--12"></i> 
				<span class="px-2 d-inline-block">
					Query Status 
				</span>
			</a>
		</li>
		<li class="nav-item {{ Request::segment(2)=='report' ? 'active' : '' }} ">
			<a class="nav-link px-0" href="{{ url('/myaccount/report')}}">
				<i class="fi fi-arrow-end m-0 fs--12"></i> 
				<span class="px-2 d-inline-block">
					Report
				</span>
			</a>
		</li>
		
		<li class="nav-item {{ Request::segment(2)=='astrologerbooking' ? 'active' : '' }} ">
			<a class="nav-link px-0" href="{{ url('/myaccount/astrologerbooking')}}">
				<i class="fi fi-arrow-end m-0 fs--12"></i> 
				<span class="px-2 d-inline-block">
					Astrologer Booking
				</span>
			</a>
		</li>
		<li class="nav-item {{ Request::segment(2)=='gemstonesuggestion' ? 'active' : '' }} ">
			<a class="nav-link px-0" href="#">
				<i class="fi fi-arrow-end m-0 fs--12"></i> 
				<span class="px-2 d-inline-block">
					Gemstone Recommendations
				</span>
			</a>
		</li>
		<li class="nav-item {{ Request::segment(2)=='bookpanditJi' ? 'active' : '' }} ">
			<a class="nav-link px-0" href="{{ url('/myaccount/bookpanditJi')}}">
				<i class="fi fi-arrow-end m-0 fs--12"></i> 
				<span class="px-2 d-inline-block">
					Book PanditJi
				</span>
			</a>
		</li>

		<li class="nav-item {{ Request::segment(2)=='vastu-specific' ? 'active' : '' }} ">
			<a class="nav-link px-0" href="{{ url('/myaccount/vastu-specific')}}">
				<i class="fi fi-arrow-end m-0 fs--12"></i>
				<span class="px-2 d-inline-block">
					Vastu & Specific Query
				</span>
			</a>
		</li>

		<li class="nav-item {{ Request::segment(2)=='orders' ? 'active' : '' }} " >
			<a class="nav-link px-0" href="{{ url('/myaccount/orders')}}">
				<i class="fi fi-arrow-end m-0 fs--12"></i> 
				<span class="px-2 d-inline-block">
					My Orders (2)
				</span>
			</a>
		</li>

		<li class="nav-item {{ Request::segment(2)=='setting' ? 'active' : '' }} " >
			<a class="nav-link px-0" href="{{ url('/myaccount/setting')}}">
				<i class="fi fi-arrow-end m-0 fs--12"></i> 
				<span class="px-2 d-inline-block">
					Account Settings
				</span>
			</a>
		</li>

		<li class="nav-item">
			<a class="nav-link px-0" href="#">
				<i class="fi fi-power"></i> 
				Log Out
			</a>
		</li>

	</ul>

</nav>