<style>
.sticky_footer_horoscope {
    overflow: hidden;
    background: #fff;
    padding: 10px 0;
}

.mar_horoscope {
    display: inline-block;
    white-space: nowrap;
    animation: scroll-left 125s linear infinite;
}

@keyframes scroll-left {
    0% { transform: translateX(18%); }   /* show content earlier */
    100% { transform: translateX(-100%); }
}

.mar_align {
    display: inline-block;
    padding-right: 50px;
}

.marquee-container:hover {
    animation-play-state: paused;
}
</style>


<section class="py-4 bg-elight shadow-md">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <h3 class="m-0 font-weight-medium text-muted">Grow your business with <span class="styleColor">XYZ Infotech</span></h3>
                <p class="m-0 letter-spacing-1">Our pofessionals are here for your business!</p>
            </div>
            
            <div class="col-12 mt-4 d-block d-md-none"><!-- mobile spacer bdfooter --></div>

            <div class="col-12 col-md-4 text-align-end text-center-xs">
                <a href="https://www.janiinfotech.com" class="btn btn-sm btn-warning" target="_blank">Visit Now</a>
            </div>
        </div>
    </div>
</section>

<footer id="footer" class="fbg">
    <div class="container">
        <div class="row">
            <div class="spaced col-md-4 col-sm-4 brdr">
               <h4 class="pb-3"><strong>Contact Us</strong></h4>
               
                <div class="clearfix pb-1">
                    Address: <span class="text-muted">N-1, Baldev Jyot<br/> Modi Patel Road, Bhayander<br/> Thane 401101, India</span>
                </div>
                
                <div class="clearfix pb-1">
                    Phone: <a href="tel:+91-2818-7280" class="d-inline-block link-muted">(+91) 2818-7280</a>
                </div>

                <div class="clearfix pb-3">
                    Email: <a href="email:support@astroduniya.com" class="d-inline-block link-muted">support@astroduniya.com</a>
                </div>

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

                    <a href="#!" target="_blank" aria-label="youtube page">
                        <img src="{{ asset('images/social/utube.png') }}" width="30px" height="30px" alt="youtube">
                    </a>&nbsp;
                   
                    <a href="#!" target="_blank" aria-label="instagram page">
                       <img src="{{ asset('images/social/instagram.png') }}" width="30px" height="30px" alt="instagram">
                    </a>
                </div>
                <!-- /social -->

            </div>
             
           
            <div class="spaced col-md-4 col-sm-4 brdr">
                 <h4 class="pb-3"><strong>About Us</strong></h4>
                   <p>Thank you very much for your interest in AstroDuniya. If you have questions, please contact us using our form or by adress/phone.</p>
                   <h5>Have any specific query ?</h5>
                    <div class="dropdown">
                        <div class="dropdown">
                            <a href="#" id="dropdownMenuContact" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <u class="styleColor h5">Ask Here</u>
                            </a>

                            <div class="dropdown-menu dropdown-click-ignore shadow-lg w-100 max-w-350 p-0" aria-labelledby="dropdownMenuContact">

                                <div class="accordion" id="accordionDropdownContact">
                                    <form novalidate="" action="_ajax/ajax_form_test_submit.html" method="GET" data-ajax-container="#ajax_dd_contact_response_container" data-ajax-update-url="false" data-ajax-show-loading-icon="true" data-ajax-callback-function="" data-error-scroll-up="true" data-error-toast-text="<i class='fi fi-circle-spin fi-spin float-start'></i> Please, complete all required fields!" data-error-toast-delay="2000" data-error-toast-position="bottom-center" data-parent="#accordionDropdownContact" class="collapse bs-validate js-ajax show" id="accordionDropdownContactForm">

                                        <input type="hidden" name="action" value="contact_form_submit" tabindex="-1"> 
                                        
                                        <input type="text" name="norobot" value="" class="hide" tabindex="-1"> 
                                        
                                        <div class="p--30 pt--0">

                                            <h3 class="h5 text-center pt-4 pb-3">
                                                Contact Us
                                            </h3>

                                            <div id="ajax_dd_contact_response_container"><!-- ajax response container --></div>

                                            <div class="form-label-group mb-3">
                                                <input required="" placeholder="Name" id="contact_name" type="text" class="form-control form-control-clean">
                                                <label for="contact_name">Name</label>
                                            </div>

                                            <div class="form-label-group mb-3">
                                                <input required="" placeholder="Email" id="contact_email" type="email" class="form-control form-control-clean">
                                                <label for="contact_email">Email</label>
                                            </div>

                                            <div class="form-label-group mb-3">
                                                <input required="" placeholder="Phone" id="contact_phone" type="text" class="form-control form-control-clean">
                                                <label for="contact_phone">Phone</label>
                                            </div>

                                            <div class="form-label-group mb-4">
                                                <textarea required="" placeholder="Message" id="contact_message" class="form-control form-control-clean" rows="3"></textarea>
                                                <label for="contact_message">Message</label>
                                            </div>

                                            <button type="submit" class="btn btn-sm btn-soft btn-warning btn-block">
                                                Send Message
                                            </button>

                                            <div class="text-center mt--30">
                                                <a href="#accordionDropdownContactDetail" class="d-block text-success text-decoration-none" data-toggle="collapse" aria-expanded="true" aria-controls="accordionDropdownContactDetail">
                                                    Contact Detail
                                                </a>
                                            </div>

                                        </div>
                                    </form>
                                    
                                    <form action="#" method="get" class="collapse" id="accordionDropdownContactDetail" data-parent="#accordionDropdownContact">


                                        <div class="p--30 pt--0">

                                            <h3 class="h5 text-center pt-4 pb-3">
                                                Contact Detail
                                            </h3>

                                            <p class="font-weight-light fs--15">
                                                Thank you very much for your interest in AstroDuniya. If you have questions, please contact us using our form or by adress/phone.
                                            </p>

                                            <div class="h5 font-weight-medium pb-2 pt-3">
                                                astroduniya.com
                                            </div>

                                            <div class="clearfix pb-1">
                                                Address: <span class="text-muted">N-1, Baldev Jyot<br/> Modi Patel Road, Bhayander<br/> Thane 401101, India</span>
                                            </div>
                                            
                                            <div class="clearfix pb-1">
                                                Phone: <a href="tel:+91-2818-7280" class="d-inline-block link-muted">(+91) 2818-7280</a>
                                            </div>

                                            <div class="clearfix pb-3">
                                                Email: <a href="email:support@astroduniya.com" class="d-inline-block link-muted">support@astroduniya.com</a>
                                            </div>

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

                                                <a href="#!" target="_blank" aria-label="youtube page">
                                                    <img src="{{ asset('images/social/utube.png') }}" width="30px" height="30px" alt="youtube">
                                                </a>&nbsp;
                                               
                                                <a href="#!" target="_blank" aria-label="instagram page">
                                                   <img src="{{ asset('images/social/instagram.png') }}" width="30px" height="30px" alt="instagram">
                                                </a>
                                            </div>
                                            <!-- /social -->

                                            <div class="text-center mt--30">
                                                <a href="#accordionDropdownContactForm" class="d-block text-muted text-decoration-none" data-toggle="collapse" aria-expanded="true" aria-controls="accordionDropdownContactForm">
                                                    Back to contact form
                                                </a>
                                            </div>

                                        </div>
                                    </form>
                                    <!-- /DETAIL -->
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <br>

            <div class="spaced col-md-4 col-sm-4">
                <h4 class="pb-3"><strong>Secure Payment</strong></h4>
                <p>A secure payment page means that the webpage where credit card numbers are entered is secured via Secure Sockets Layer (SSL) 128 bit encryption.</p><br>
                <p> 
                    <img src="{{ asset('images/payment/visa.png') }}" width="54px" height="35px" alt="visa">&nbsp;&nbsp;
                    <img src="{{ asset('images/payment/mastercard.png') }}" width="54px" height="35px" alt="mastercard">&nbsp;&nbsp;
                    <img src="{{ asset('images/payment/maestro.png') }}" width="54px" height="35px" alt="maestro">&nbsp;&nbsp;
                    <img src="{{ asset('images/payment/paytm.png') }}" width="54px" height="35px" alt="paytm">&nbsp;&nbsp;
                    <img src="{{ asset('images/payment/paypal.png') }}" width="54px" height="35px" alt="paypal">
                </p>
            </div>
        </div>

    </div>

    <div class="fborderm"></div>

    <div class="copyright">
        <div class="container ftlinkmar">
            <div class="float-end nomargin list-inline">
                 <a class="fcusc text-muted" href="{{ url('/disclaimer')}}">&bull; Disclaimer</a>
                 <a class="fcusc text-muted" href="{{ url('/feedback')}}">&bull; Feedback</a>
                 <a class="fcusc text-muted" href="{{ url('/payment')}}">&bull; Payment</a>
                <a class="fcusc text-muted" href="{{ url('/privacy')}}">&bull; Privacy</a>
                <a class="fcusc text-muted" href="{{ url('/terms')}}">&bull; Terms &amp; Conditions</a>
            </div>
            © All Rights Reserved, Astroduniya.com
        </div>
    </div>
</footer>
<br/><br>


<!--  shadow-xs -->
<!-- <div class="sticky_footer_horoscope">
    <marquee onmouseover="this.stop();" onmouseout="this.start();" class="mar_horosope"><span class="mar_align"><strong class="items bold styleColor">Aries - </strong>You may need it more often as you are always working hard to claim the top spot in every facet of life in the fastest way possible. || <strong class="items bold styleColor">Taurus - </strong>The Moon in Aquarius, today, will make you desire to work on those negatives. || <strong class="items bold styleColor">Gemini - </strong>Since you are such a versatile person, you are quite sure of your capabilities and perform most tasks quite effortlessly. || <strong class="items bold styleColor">Cancer - </strong>Students will settle down to study seriously for some competitive exams. Blue will attract positive energy for you. || <strong class="items bold styleColor">Leo - </strong>The Moon in Aquarius will today stress you out with situations not under your control. || <strong class="items bold styleColor">Virgo - </strong>You are constantly looking for perfection and so your mind works overtime to achieve it. || <strong class="items bold styleColor">Libra - </strong>East direction will be lucky for you and so would be the colour grey. || <strong class="items bold styleColor">Sagittarius - </strong>You are an escapist, running from feelings, conflicts and responsibilities. || <strong class="items bold styleColor">Sagittarius - </strong>Daily Horoscope App Download You are an escapist, running from feelings, conflicts and responsibilities. || <strong class="items bold styleColor">Capricorn - </strong>Blessed with a good constitution, you basically have to be careful of your bones and muscles. || <strong class="items bold styleColor">Aquarius - </strong>You are one of the coolest of all the zodiacs and prefer remaining aloof. || <strong class="items bold styleColor">Pisces - </strong>Because of your creative nature, you can work only in jobs where you can apply your creativity.</span></marquee>
</div> -->

<!-- <div class="sticky_footer_horoscope">
    <div class="mar_horoscope">
        <span class="mar_align">
            <strong class="items bold styleColor">Aries - </strong>You may need it more often as you are always working hard to claim the top spot in every facet of life in the fastest way possible. ||
            <strong class="items bold styleColor">Taurus - </strong>The Moon in Aquarius, today, will make you desire to work on those negatives. ||
            <strong class="items bold styleColor">Gemini - </strong>Since you are such a versatile person, you are quite sure of your capabilities and perform most tasks quite effortlessly. ||
            <strong class="items bold styleColor">Cancer - </strong>Students will settle down to study seriously for some competitive exams. Blue will attract positive energy for you. ||
            <strong class="items bold styleColor">Leo - </strong>The Moon in Aquarius will today stress you out with situations not under your control. ||
            <strong class="items bold styleColor">Virgo - </strong>You are constantly looking for perfection and so your mind works overtime to achieve it. ||
            <strong class="items bold styleColor">Libra - </strong>East direction will be lucky for you and so would be the colour grey. ||
            <strong class="items bold styleColor">Sagittarius - </strong>You are an escapist, running from feelings, conflicts and responsibilities. ||
            <strong class="items bold styleColor">Capricorn - </strong>Blessed with a good constitution, you basically have to be careful of your bones and muscles. ||
            <strong class="items bold styleColor">Aquarius - </strong>You are one of the coolest of all the zodiacs and prefer remaining aloof. ||
            <strong class="items bold styleColor">Pisces - </strong>Because of your creative nature, you can work only in jobs where you can apply your creativity.
        </span>
    </div>
</div> -->

<div class="dhoroscope-container">
  <div class="title">
      &nbsp;&nbsp;Horosope&nbsp;&nbsp;
  </div>

  <ul>
      <li>
        <strong class="styleColor">Aries - </strong>You may need it more often as you are always working hard to claim the top spot in every facet of life in the fastest way possible.
      </li>

      <li>
        <strong class="styleColor">Taurus - </strong>You may need it more often as you are always working hard to claim the top spot in every facet of life in the fastest way possible.
      </li>

      <li>
        <strong class="styleColor">Gemini - </strong>You may need it more often as you are always working hard to claim the top spot in every facet of life in the fastest way possible.
      </li>

      <li>
        <strong class="styleColor">Cancer - </strong>You may need it more often as you are always working hard to claim the top spot in every facet of life in the fastest way possible.
      </li>

      <li>
        <strong class="styleColor">Leo - </strong>You may need it more often as you are always working hard to claim the top spot in every facet of life in the fastest way possible.
      </li>

      <li>
        <strong class="styleColor">Virgo - </strong>You may need it more often as you are always working hard to claim the top spot in every facet of life in the fastest way possible.
      </li>

      <li>
        <strong class="styleColor">Libra - </strong>You may need it more often as you are always working hard to claim the top spot in every facet of life in the fastest way possible.
      </li>

      <li>
        <strong class="styleColor">Sagittarius - </strong>You may need it more often as you are always working hard to claim the top spot in every facet of life in the fastest way possible.
      </li>

      <li>
        <strong class="styleColor">Sagittarius - </strong>You may need it more often as you are always working hard to claim the top spot in every facet of life in the fastest way possible.
      </li>

      <li>
        <strong class="styleColor">Capricorn - </strong>You may need it more often as you are always working hard to claim the top spot in every facet of life in the fastest way possible.
      </li>

      <li>
        <strong class="styleColor">Aquarius - </strong>You may need it more often as you are always working hard to claim the top spot in every facet of life in the fastest way possible.
      </li>

      <li>
        <strong class="styleColor">Pisces - </strong>You may need it more often as you are always working hard to claim the top spot in every facet of life in the fastest way possible.
      </li>

  </ul>
</div>




<!-- <div class="position-fixed bottom-46 start-6 z-index-10 m-4 dropdown">
            
            <a href="#" id="exbutton" class="exbutton btn rounded-circle-xs btn-light btn-pill js-stoppropag bhide" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                <span class="group-icon">
                    <i class="fi mdi-format_line_spacing fs--30"></i>
                    <i class="fi mdi-close fs--30"></i>
                </span>
                <span class="font-weight-bold">&nbsp;Quick <b class="styleColor">Links</b></span>
            </a>
            

    <div class="dropdown-menu mboxpad">
       
        <button type="submit" class="btn btn-sm btn-red btn-block">
            Ask a Free Query
        </button>
        <div class="text-center">or</div>
        <button type="button" class="btn btn-sm btn-red btn-block" data-toggle="modal" data-target="#exampleModalScrollable">
            Book Astrologer&nbsp;&nbsp;<span class="badge badge-pill badge-light">paid</span>
        </button>

      
        <hr/>
        
        <div class="clearfix"> 
             <a href="https://wa.me/919699342442/?text=subscribe" target="_blank" aria-label="whatsapp page">
               &nbsp;&nbsp;&nbsp;<img src="{{ asset('images/social/whatsapp.png') }}" width="30px" height="30px" alt="whatsapp">
            </a>
            <a href="#!" target="_blank" aria-label="facebook page">
               <img src="{{ asset('images/social/facebook.png') }}" width="30px" height="30px" alt="facebook">
            </a>
            <a href="#!" target="_blank" aria-label="twitter page">
                <img src="{{ asset('images/social/twitter.png') }}" width="30px" height="30px" alt="twitter">
            </a>
            <a href="#!" target="_blank" aria-label="youtube page">
                <img src="{{ asset('images/social/utube.png') }}" width="30px" height="30px" alt="youtube">
            </a>        
            <a href="#!" target="_blank" aria-label="instagram page">
               <img src="{{ asset('images/social/instagram.png') }}" width="30px" height="30px" alt="instagram">
            </a>
        </div>
        
    </div>


</div> -->
<!-- / + tab -->

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Book Astrologer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="fi fi-close fs--18" aria-hidden="true"></span>
                </button>
            </div>

            <div class="modal-body">

                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                

            </div>

            <center>
            <div class="modal-footer container">
                <button type="button" class="btn btn-sm btn-primary fs--14">On Call</button>
                <button type="button" class="btn btn-sm btn-primary fs--14">On Video Call</button>
                <button type="button" class="btn btn-sm btn-primary fs--14">Meet Personally</button>
            </div>
            </center>

        </div>
    </div>
</div>

<!-- some js are is in master. dont touch or change their place without asking jani -->
<script src="{{asset('js/core.min.js')}}"></script>
<script src="{{asset('js/vendor_bundle.js')}}"></script>
<!-- <script src="{{asset('plugins/styleswitcher/styleswitcher.js')}}"></script> -->

<script src="{{asset('plugins/date_time_picker/mdtimepicker.js')}}"></script>
<script src="{{asset('plugins/date_time_picker/duDatepicker.js')}}"></script>


<script>

jQuery(window).on("load", function() {
   
    jQuery('#preloader').fadeOut(1000, function() {
        jQuery('#preloader').remove();
    });
    // setTimeout(function() {}, 1000); 
});

</script>
<script>
$(document).ready(function(){
 $('#timepicker').mdtimepicker();
});

$(document).ready(function(){
 $('#datepicker').duDatepicker({theme: 'green',format: 'dd-mm-yyyy'}); 
 
});
</script>

<script>
$(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
</script>



<script>

/*$(document).scroll(function() {
bID = document.getElementById("exbutton");
var myScrollFunc = function () {
    var y = window.scrollY;
    if (y >= 200) {
        bID.className  = "exbutton bshow"
    } else {
        bID.className  = "exbutton bhide"       
    }
};
window.addEventListener("scroll", myScrollFunc);
});*/

</script>