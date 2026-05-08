<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Account - Astroduniya')
@section('description','Account')
@section('keywords','Account')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Account"; 
	$toolbar_title="Reset Password";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')


<section>
	<div class="container">
		<div class="row ">
			<div class="col-12 col-sm-8 col-md-8 col-lg-6 offset-sm-2 offset-md-2 offset-lg-3">
				<!-- PASSWD RESET -->
				<form method="post" action="#" id="accordionAccountPasswd" data-parent="#accordionAccount">
					
					<!-- title -->
					
					<!-- <p class="mb-4 font-weight-medium b-0">
						&nbsp; Type your Mobile Number to continue
					</p> -->

					<div class="p-4 rounded shadow-xs">

						
						
						<p class="mb-4 font-weight-normal fs--16 styleColor b-0">
							We will sent an OTP to the mobile number to complete verification.
						</p>

						<!--
						<p class="text-danger">
							Ups! Please check again
						</p>
						-->


						<div class="mb-3">
							<label for="forgor_mobile" class="fs--16 text-muted">Enter Mobile Number</label>
							<input id="fg_mobile" name="fg_mobile" type="number" class="form-control">
							<span id="valid-msg" class="hide fs--13 font-weight-medium">Valid</span>
							<span id="error-msg" class="hide fs--15 font-weight-normal letter-spacing-03 styleColor"></span>
						</div>

						<div class="fp hide">

							<div class="mb-3">
								<label for="account_otp" class="fs--16 text-muted">Enter OTP</label>
								<input id="fp_otp" name="fp_otp" type="number" class="form-control">
							</div>

							<div class="input-group-over">
								<div class="mb-3">
									<label for="account_password" class="fs--16 text-muted">Enter New Password</label>
									<input required placeholder="At least 6 characters" id="nfp_password" name="nfp_password" type="password" class="form-control">
									
								</div>

								<!-- `SOW : Form Advanced` plugin used -->
								<a href="account-sign-password.html" class="btn fs--12 btn-password-type-toggle mt-3" data-target="#nfp_password">
									<span class="group-icon">
										<i class="fi fi-eye m-0"></i>
										<i class="fi fi-close m-0"></i>
									</span>
								</a>

							</div>
						</div>

						<div>
							<button type="button" class="send-otp btn btn-soft btn-warning btn-block" onclick="sendOtp()">Continue
                            </button>
                        </div>

                        <div>
                            <button class="fgb_otp hide btn btn-soft btn-warning btn-block">Login
                            </button>
						</div>
						
						<button type="submit" onclick="history.back()" class="btn btn-soft btn-link btn-block text-muted mt--0">back to log in</button>

						

					</div>

				</form>
				<!-- /PASSWD RESET -->
			</div>
		</div>
	</div>
</section>

<script>
var input = document.querySelector("#fg_mobile"),
  errorMsg = document.querySelector("#error-msg"),
  validMsg = document.querySelector("#valid-msg");

// Error messages based on the code returned from getValidationError
var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// Initialise plugin
var intl = window.intlTelInput(input, {
    initialCountry: "auto",
    geoIpLookup: function(success, failure) {
        $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "";
            success(countryCode);
        });
    },
    utilsScript: "../js/utils.js"
});

var reset = function() {
  input.classList.remove("error");
  errorMsg.innerHTML = " ";
  errorMsg.classList.add("hide");
  validMsg.classList.add("hide");
  validMsg.classList.remove("logvalidation");
  $('.fgb_otp').hide();
  $('.send-otp').show();
  $('.fp').hide();
  $('input[name=fp_otp').val('');
  $('input[name=nfp_password').val('');
};

// Validate on blur event
input.addEventListener('blur', function() {
  reset();
  if(input.value.trim()){
    if(intl.isValidNumber()){
      //validMsg.classList.remove("hide");
      validMsg.classList.add("logvalidation");
    }else{
      input.classList.add("error");
      var errorCode = intl.getValidationError();
      errorMsg.innerHTML = errorMap[errorCode];
      errorMsg.classList.remove("hide");
    }
  }
});

// Reset on keyup/change event
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);    
</script>

<script>
	
    function sendOtp() {
    	var data =$(".logvalidation").html();
    	
    	alert(data);
       /* $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });*/

        // alert($('#mobile').val());
        /*$.ajax( {
            url:'sendOtp',
            type:'post',
            data: {'mobile': $('#reg_mobile').val()},
            success:function(data) {
                 alert(data);
                if(data != 0){
                    $('.log_otp').show();
                    $('.send-otp').hide();
                }else{
                    alert('Mobile No not found');
                }

            },
            error:function () {
                console.log('error');
            }
        });*/
        //
        //var data = "1";
        if(data == 'Valid'){
            $('.fgb_otp').show();
            $('.fp').show();
            $('.send-otp').hide();
           return false;    // or return;
			// or
			throw new Error("Here we stop");
        }else{
            alert('Mobile No not found');
        	return false;
        	throw new Error('controlledError');
        }
    }
</script>

@endsection