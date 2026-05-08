<?php 
    $assume_login = 0; 
?>
<!-- HEADER -->
<header id="header" class="shadow-md2">

    <!-- TOP BAR -->
    <div id="top_bar" class="bg-top fs--14"  style="border-top : 3px solid #Ee6c4d"> <!-- optional if body.header-sticky is present: add .js-ignore class to ignore autohide and stay visible all the time -->
        <div class="container">

            <div class="text-nowrap"><!-- change with .scrollable-horizontal to horizontally scroll, if -only- no dropdown is present -->
                <div class="d-flex justify-content-between">

                   <div class="d-inline-block clrlb float-start marghed1">
                        <ul class="list-inline m-0">
                            <li class="dropdown list-inline-item m-0">
                                <a href="#!" class="py-2 d-inline-block">
                                    <span class="pl-2 pr-2"><span class="letter-spacing-1 text-muted font-weight-medium">WORLD OF ASTROLOGY</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="d-inline-block clrlb float-end marghed2">
                        <ul class="list-inline m-0">
                            <!-- <li class="dropdown list-inline-item">
                                &nbsp;&nbsp;
                                <a href="{{ url('/contact')}}" class="p-2 d-inline-block font-weight-medium">
                                    <span class="text-muted"><i class="float-start fi fi-shape-star styleColor"></i>Contact</span> 
                                </a>
                                <a href="https://www.youtube.com/" target="_blank" class="p-2 d-inline-block font-weight-medium">
                                    <span class="text-muted"><i class="float-start styleColor fi fi-social-youtube"></i>Youtube</span> 
                                </a>
                            </li> -->
                            <!-- LANGUAGE -->
							<li class="dropdown list-inline-item m-2">

								<a id="topDDLanguage" href="#!" class="d-inline-block  text-muted font-weight-medium" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
									
									<span class="pl-2 pr-2">ENGLISH</span>
								</a>

								<div aria-labelledby="topDDLanguage" class="dropdown-menu fs--13 px-1 pt-1 pb-0 m-0 max-h-50vh scrollable-vertical list-inline-item  dropdown-menu-right">
									<a href="#!" class="active dropdown-item text-muted text-truncate line-height-1 rounded p--12 mb-1">
										ENGLISH
									</a>
									<a href="#!" class="dropdown-item text-muted text-truncate line-height-1 rounded p--12 mb-1">
										HINDI
									</a>
									<a href="#!" class="dropdown-item text-muted text-truncate line-height-1 rounded p--12 mb-1">
										GUJARATI
									</a>
								</div>

							</li>
							<!-- /LANGUAGE -->

                            <!-- Country -->
							<li class="dropdown list-inline-item m-2 text-muted font-weight-medium">

								<span class="text-muted">/</span><!-- optional separator -->

								<a id="topDDCurrency" href="#" class="d-inline-block  text-muted font-weight-medium" data-toggle="dropdown" aria-expanded="false">
									<span class="pl-2 pr-2">INDIA</span>
								</a>

								<div aria-labelledby="topDDCurrency" class="dropdown-menu text-center fs--13 px-1 pt-1 pb-0 m-0 max-h-50vh w-auto scrollable-vertical dropdown-menu-right">
									<a href="#!" class="active dropdown-item text-muted text-truncate line-height-1 rounded pt--12 pb--12 mb-1">
									INDIA
									</a>
									<a href="#!" class="dropdown-item text-muted text-truncate line-height-1 rounded pt--12 pb--12 mb-1">
									UAE
									</a>
									<a href="#!" class="dropdown-item text-muted text-truncate line-height-1 rounded pt--12 pb--12 mb-1">
									USA
									</a>
								</div>

							</li>
							<!-- /Country -->
                        </ul>
                    </div>

                </div>
            </div>

        </div>
        <hr class="m-0 opacity-2">
    </div>
    <!-- /TOP BAR -->


    <!-- NAVBAR -->
    <div class="container position-relative">
        <nav class="navbar navbar-expand-lg navbar-light justify-content-lg-between justify-content-md-inherit">
            <div class="align-items-start">
                <!-- mobile menu button : show -->
               <!-- mobile menu button : show -->
                <button class="navbar-toggler font-weight-bolder" type="button" data-toggle="collapse" data-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="group-icon">
                        <i>
                            <svg width="25" viewBox="0 0 20 20">
                                <path d="M 19.9876 1.998 L -0.0108 1.998 L -0.0108 -0.0019 L 19.9876 -0.0019 L 19.9876 1.998 Z"></path>
                                <path d="M 19.9876 7.9979 L -0.0108 7.9979 L -0.0108 5.9979 L 19.9876 5.9979 L 19.9876 7.9979 Z"></path>
                                <path d="M 19.9876 13.9977 L -0.0108 13.9977 L -0.0108 11.9978 L 19.9876 11.9978 L 19.9876 13.9977 Z"></path>
                                <path d="M 19.9876 19.9976 L -0.0108 19.9976 L -0.0108 17.9976 L 19.9876 17.9976 L 19.9876 19.9976 Z"></path>
                            </svg>
                        </i>

                        <i>
                            <svg width="25" viewBox="0 0 47.971 47.971">
                                <path d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z"></path>
                            </svg>
                        </i>
                    </span>
                    <!-- <i class="fi fi-bars fs--30 font-weight-bolder "></i> -->
                </button>

                <a class="navbar-brand m-0" href="{{ url('/')}}">
                   <!-- <img src="{{ asset('images/logo.png')}}" width="185px" height="60px" class="logom" alt="Logo" /> -->
                   <img src="{{ asset('images/logo.png')}}" width="210px" height="95px" alt="Logo" />
                </a>
            </div>

            


            <!-- OPTIONS -->
            <ul class="list-inline list-unstyled my-1 d-flex align-items-end my-2"> 
                <!-- my account -->
                <?php if(isset($assume_login) && ($assume_login == 1)) { ?>

                 <li class="list-inline-item dropdown">

                     <a href="#" aria-label="Account Options" id="dropdownAccountOptions" class="btn btn-sm rounded-circle btn-softlight dropdown-toggle " data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        <span class="group-icon">
                            <i class="fi fi-user-male fs--18 font-weight-bolder"></i>
                            <i class="fi fi-close fs--18 font-weight-bolder"></i>
                        </span>
                        
                    </a>
                    <span class="d-block fs--13 font-weight-medium">Account</span>


                    <!-- If already sign in -dropdown dropdownAccountOptions, group icn <i class="fi fi-close fs--18 font-weight-bolder"></i> -->
                    <div aria-labelledby="dropdownAccountOptions" class="prefix-link-icon prefix-icon-dot dropdown-menu dropdown-menu-clean dropdown-menu-invert dropdown-click-ignore p-0 fs--15">
                        <div class="dropdown-header">
                           Dixit Jani
                        </div>

                        <div class="dropdown-divider"></div>

                        
                        <a href="{{ url('/myaccount/querystatus')}}" title="Account Settings" class="dropdown-item text-truncate font-weight-light">
                            Query Status
                        </a>

                        <a href="{{ url('/myaccount/report')}}" title="Account Settings" class="dropdown-item text-truncate font-weight-light">
                            Report
                        </a>

                        <a href="{{ url('/myaccount/astrologerbooking')}}" title="Account Settings" class="dropdown-item text-truncate font-weight-light">
                            Astrologer Booking
                        </a>

                        <a href="{{ url('/myaccount/gemstonesuggestion')}}" title="Account Settings" class="dropdown-item text-truncate font-weight-light">
                            Gemstone Recommendations
                        </a>

                        <a href="{{ url('/myaccount/bookpanditJi')}}" title="Account Settings" class="dropdown-item text-truncate font-weight-light">
                            Book PanditJi
                        </a>

                        <a href="{{ url('/myaccount/vastu-specific')}}" title="Account Settings" class="dropdown-item text-truncate font-weight-light">
                            Vastu & Specific Query
                        </a>

                        <a href="account-orders.html" title="My Orders" class="dropdown-item text-truncate font-weight-light">
                            My Orders <small>(2)</small>
                        </a>

                        <a href="{{ url('/myaccount/setting')}}" title="Account Settings" class="dropdown-item text-truncate font-weight-light">
                            Account Settings
                        </a>

                        <div class="dropdown-divider mb-0"></div>

                        <a href="#!" title="Log Out" class="prefix-icon-ignore dropdown-footer dropdown-custom-ignore">
                            <i class="fi fi-power float-start"></i>
                            Log Out
                        </a>

                    </div>

                </li>
                <?php } ?>

                 <?php if(isset($assume_login) && ($assume_login !== 1)) { ?>
                    <li class="list-inline-item dropdown">

                         <a href="{{ url('/account')}}" class="btn btn-sm rounded-circle btn-softlight dropdown-toggle">
                            <span class="group-icon">
                                <i class="fi fi-user-male fs--18 font-weight-bolder"></i>
                                <i class="fi fi-close fs--18 font-weight-bolder"></i>
                            </span>
                            
                        </a>
                        <span class="d-block fs--13 font-weight-medium">My Account</span>

                    </li>
               
                <?php } ?>

               

                

               

            </ul>
            <!-- /OPTIONS -->


        </nav>

    </div>
    <!-- /NAVBAR bgclh-->




    <div class="clearfix">
        
        <!-- line -->
        <hr class="m-0 opacity-3">
        
        <div class="container">

            <nav class="navbar h-auto navbar-expand-lg navbar-light justify-content-lg-between justify-content-md-inherit">
                <div class="collapse navbar-collapse navbar-animate-fadein" id="navbarMainNav">

                    <!-- MOBILE MENU NAVBAR -->
                    <div class="navbar-xs d-none"><!-- .sticky-top -->

                        <!-- mobile menu button : close -->
                        <button class="navbar-toggler pt-0" type="button" data-toggle="collapse" data-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false" aria-label="Toggle navigation">
                            <svg width="20" viewBox="0 0 20 20">
                                <path d="M 20.7895 0.977 L 19.3752 -0.4364 L 10.081 8.8522 L 0.7869 -0.4364 L -0.6274 0.977 L 8.6668 10.2656 L -0.6274 19.5542 L 0.7869 20.9676 L 10.081 11.679 L 19.3752 20.9676 L 20.7895 19.5542 L 11.4953 10.2656 L 20.7895 0.977 Z"></path>
                            </svg>
                        </button>

                        <h3 class="navbar-brand">Explore <span class="styleColor font-weight-bolder">AstroDuniya</span></h3>

                    </div>
                    <!-- /MOBILE MENU NAVBAR -->

                   <!-- NAVIGATION -->
                    <ul class="navbar-nav navbar-sm">

                        <li class="nav-item dropdown {{ Request::is('/') ? 'activeMenu' : '' }}">
                            <a href="{{ url('/') }}" id="mainNavHome" class="nav-link brdrr brdrl">
                                <span>Home</span>
                            </a>
                        </li>

                        <!-- Query -->
                        <li class="nav-item dropdown {{ Request::segment(1) == 'query' ? 'activeMenu' : '' }}">
                            <a href="{{ url('/query') }}" id="mainNavAskquery" class="nav-link brdrr">
                                <span>Ask&nbsp;Free&nbsp;Query</span>
                            </a>
                        </li>

                        <!-- Astrology -->
                        <li class="nav-item dropdown {{ Request::segment(1) == 'astrology' ? 'activeMenu' : '' }}">
                            <a href="#" id="mainNavAstrology" class="nav-link brdrr dropdown-toggle"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                                Astrology
                            </a>
                            <div aria-labelledby="mainNavAstrology" class="dropdown-menu dropdown-menu-clean dropdown-menu-hover">
                                <ul class="list-unstyled m-0 p-0">
                                    <li class="dropdown-item"><a href="{{ url('/astrology/about') }}" class="dropdown-link">About&nbsp;Astrology</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{ url('/astrology/planets') }}" class="dropdown-link">The&nbsp;Planets</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{ url('/astrology/signs') }}" class="dropdown-link">Signs&nbsp;of&nbsp;Zodiac</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{ url('/astrology/houses') }}" class="dropdown-link">The&nbsp;Astrological&nbsp;Houses</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- Horoscope -->
                        <li class="nav-item dropdown {{ Request::segment(1) == 'horoscope' ? 'activeMenu' : '' }}">
                            <a href="#" id="mainNavHoroscope" class="nav-link brdrr dropdown-toggle"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                                Horoscope
                            </a>
                            <div aria-labelledby="mainNavHoroscope" class="dropdown-menu dropdown-menu-clean dropdown-menu-hover">
                                <ul class="list-unstyled m-0 p-0">
                                    <li class="dropdown-item"><a href="{{ url('/horoscope/about') }}" class="dropdown-link">About&nbsp;Horoscope</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{ url('/horoscope/prediction/daily') }}" class="dropdown-link">
                                        <!-- <span class="badge badge-secondary badge-soft position-absolute absolute-top right-0 ml-2 mr-2">HOT</span> -->
                                        Daily&nbsp;Horoscope
                                    </a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{ url('/horoscope/prediction/weekly') }}" class="dropdown-link">Weekly&nbsp;Horoscope</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{ url('/horoscope/prediction/monthly') }}" class="dropdown-link">Monthly&nbsp;Horoscope</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{ url('/horoscope/prediction/yearly') }}" class="dropdown-link">Yearly&nbsp;Horoscope</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{ url('/horoscope/report') }}" class="dropdown-link">
                                        <!-- <span class="badge badge-secondary badge-soft position-absolute absolute-top right-0 ml-2 mr-2">UNIQUE</span> -->
                                        Horoscope&nbsp;Report
                                    </a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{ url('/horoscope/matching') }}" class="dropdown-link">Horoscope&nbsp;Matching&nbsp;Report</a></li>
                                </ul>
                            </div>
                        </li>


                        <!-- Astrologer -->
                        <li class="nav-item dropdown {{ Request::segment(1) == 'astrologer' ? 'activeMenu' : '' }}">
                            <a href="{{ url('/astrologer/book') }}" id="mainNavBookAstrologer" class="nav-link brdrr">
                                <span>Book&nbsp;Astrologer</span>
                            </a>
                        </li>


                        <!-- Astrologer 2 -->
                        <!-- <li class="nav-item dropdown {{ Request::segment(1) == 'astrologer' ? 'activeMenu' : '' }}">
                            <a href="#" id="mainNavAstrologer" class="nav-link brdrr dropdown-toggle"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                                Book Astrologer
                            </a>
                            <div aria-labelledby="mainNavAstrologer" class="dropdown-menu dropdown-menu-clean dropdown-menu-hover">
                                <ul class="list-unstyled m-0 p-0">
                                    <li class="dropdown-item"><a href="{{ url('/astrologer/call') }}" class="dropdown-link">
                                        <span class="badge badge-secondary badge-soft position-absolute absolute-top right-0 ml-2 mr-2">TRENDING</span>
                                        Astrologer&nbsp;on&nbsp;Call
                                    </a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{ url('/astrologer/videocall') }}" class="dropdown-link">Video&nbsp;Call&nbsp;to&nbsp;Astrologer</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{ url('/astrologer/meet') }}" class="dropdown-link">Meet&nbsp;Astrologer&nbsp;Personally</a></li>
                                </ul>
                            </div>
                        </li> -->

                        <!-- Gemstone -->
                        <li class="nav-item dropdown {{ Request::segment(1) == 'gemstone' ? 'activeMenu' : '' }}">
                            <a href="#" id="mainNavGemstone" class="nav-link brdrr dropdown-toggle"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                                Gemstone
                            </a>
                            <div aria-labelledby="mainNavGemstone" class="dropdown-menu dropdown-menu-clean dropdown-menu-hover">
                                <ul class="list-unstyled m-0 p-0">
                                    <li class="dropdown-item"><a href="{{ url('/gemstone/about') }}" class="dropdown-link">About&nbsp;Gemstone</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{ url('/gemstone/recommendations') }}" class="dropdown-link">Gemstone&nbsp;Recommendations</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{ url('/gemstone/buy') }}" class="dropdown-link">
                                        <!-- <span class="badge badge-secondary badge-soft position-absolute absolute-top right-0 ml-2 mr-2">TRENDING</span> -->
                                        Buy&nbsp;Gemstone
                                    </a></li>
                                </ul>
                            </div>
                        </li>


                        <!-- Pandit Ji -->
                        <li class="nav-item dropdown {{ Request::segment(1) == 'panditji' ? 'activeMenu' : '' }}">
                            <a href="#" id="mainNavPanditji" class="nav-link brdrr dropdown-toggle"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                                Pandit&nbsp;Ji
                            </a>

                            <div aria-labelledby="mainNavPanditji" class="dropdown-menu dropdown-menu-clean dropdown-menu-hover">
                                <ul class="list-unstyled m-0 p-0">
                                    <li class="dropdown-item">
                                        <a href="{{ url('/panditji/book') }}" class="dropdown-link">
                                            <!-- <span class="badge badge-secondary badge-soft position-absolute absolute-top right-0 ml-2 mr-2">PRO</span> -->
                                            Book&nbsp;Pandit&nbsp;Ji
                                        </a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item">
                                        <a href="{{ url('/panditji/services') }}" class="dropdown-link">Puja&nbsp;&amp;&nbsp;Other&nbsp;Services</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <!-- Vastu -->
                        <li class="nav-item dropdown {{ Request::segment(1) == 'vastu' ? 'activeMenu' : '' }}">
                            <a href="{{ url('/vastu') }}" id="mainNavVastu" class="nav-link brdrr">
                                <span>Vastu</span>
                            </a>
                        </li>
                        
                        <!-- More -->
                        <li class="nav-item dropdown {{ in_array(Request::segment(1), ['blogs','teamactivity','about','contact']) ? 'activeMenu' : '' }}">
                            <a href="#" id="mainNavMore" class="nav-link brdrr dropdown-toggle"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                                More
                            </a>

                            <div aria-labelledby="mainNavMore" class="dropdown-menu dropdown-menu-clean dropdown-menu-hover">
                                <ul class="list-unstyled m-0 p-0">
                                    <li class="dropdown-item">
                                        <a href="{{ url('/blogs') }}" class="dropdown-link">Blogs</a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item">
                                        <a href="{{ url('/teamactivity') }}" class="dropdown-link">Team&nbsp;Activity</a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item">
                                        <a href="{{ url('/about') }}" class="dropdown-link">About&nbsp;US</a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item">
                                        <a href="{{ url('/contact') }}" class="dropdown-link">Contact&nbsp;US</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <!-- social : mobile only (d-block d-sm-none)-->
                        <li class="nav-item d-block d-sm-none text-center mb-4">

                            <h3 class="h6 text-muted">Follow Us</h3>

                            <a href="#!" class="btn btn-sm btn-facebook transition-hover-top mb-2 rounded-circle text-white" rel="noopener">
                                <i class="fi fi-social-facebook"></i> 
                            </a>

                            <a href="#!" class="btn btn-sm btn-twitter transition-hover-top mb-2 rounded-circle text-white" rel="noopener">
                                <i class="fi fi-social-twitter"></i> 
                            </a>

                            <a href="#!" class="btn btn-sm btn-linkedin transition-hover-top mb-2 rounded-circle text-white" rel="noopener">
                                <i class="fi fi-social-linkedin"></i> 
                            </a>

                            <a href="#!" class="btn btn-sm btn-youtube transition-hover-top mb-2 rounded-circle text-white" rel="noopener">
                                <i class="fi fi-social-youtube"></i> 
                            </a>

                        </li>

                    
                    </ul>
                    <!-- /NAVIGATION -->

                </div>
            </nav>
        </div>
        <hr class="m-0 opacity-4">
    </div>

</header>
<!-- /HEADER -->
