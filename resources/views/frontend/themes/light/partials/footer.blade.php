<footer class="hs_footer_main_wrapper light-footer">
    <div class="newsletter_section">
        <div class="container">
            <div class="newsletter_box">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="newsletter_cont"><h2>Subscribe Our <span>Newsletter</span></h2></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="newsletter_form">
                            <form method="get" action="{{ url('/contact') }}">
                                <input name="email" type="email" placeholder="Email Address..." aria-label="Email address">
                                <button type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hs_footer_top_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="hs_footer_logo_wrapper light-footer-brand">
                        <img src="{{ asset('images/logo.png') }}" alt="AstroDuniya" class="img-responsive light-footer-logo">
                        <div class="light-footer-address">{!! $siteSettings['contact.address_html'] ?? 'N-1, Baldev Jyot<br>Modi Patel Road, Bhayander<br>Thane 401101, India' !!}</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="hs_footer_list_wrapper">
                        <h2>Our <span>Services</span></h2>
                        <ul class="hs_footer_list">
                            <li><a href="{{ url('/astrologer/book') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> How to book</a></li>
                            <li><a href="{{ url('/panditji/services') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Panditji Services</a></li>
                            <li><a href="{{ url('/gemstone/buy') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Gemstones</a></li>
                            <li><a href="{{ url('/horoscope/about') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Horoscope</a></li>
                            <li><a href="{{ url('/contact') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="hs_footer_list_wrapper">
                        <h2>Useful <span>Links</span></h2>
                        <ul class="hs_footer_list">
                            <li><a href="{{ url('/about') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> About Us</a></li>
                            <li><a href="{{ url('/blogs') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Blogs</a></li>
                            <li><a href="{{ url('/privacy') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Privacy Policy</a></li>
                            <li><a href="{{ url('/terms') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Terms &amp; Conditions</a></li>
                            <li><a href="{{ url('/query') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Ask Free Query</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="hs_download_wrapper">
                        <h2>Download <span>App</span></h2>
                        <p>Download Our Mobile App</p>
                        <div class="hs_download_btn_wrapper">
                            <a href="#"><img src="{{ asset('themes/light/images/content/App-Store.png') }}" class="img-responsive" alt="Download on the App Store"></a>
                            <a href="#"><img src="{{ asset('themes/light/images/content/Google-Play.png') }}" class="img-responsive" alt="Get it on Google Play"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="hs_bottom_footer_main_wrapper light-bottom-footer">
    <a href="#top" id="return-to-top" aria-label="Back to top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div class="footer_bottom_cont_wrapper"><p>&copy; {{ date('Y') }} Astroduniya. All rights reserved.</p></div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="footer_bottom_list_wrapper"><ul>
                    <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ url('/terms') }}">Terms &amp; Conditions</a></li>
                    <li><a href="{{ url('/refund') }}">Refund Policy</a></li>
                </ul></div>
            </div>
        </div>
    </div>
</div>
