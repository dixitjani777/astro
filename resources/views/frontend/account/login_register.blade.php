
<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Account - Astroduniya')
@section('description','Account')
@section('keywords','Account')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Account"; 
	$toolbar_title="My Account";
?>
<!-- /toolbar page title -->


<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')


<section>
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-5 col-lg-5">
				<div class="accordion" id="accordionAccount">

					<!-- SIGN IN -->
					<form method="post" action="#">
						
						<b class="mb-4 b-0 fs--18">
							&nbsp;Login to your account
						</b>
						
						<div class="p-4 rounded shadow-xs">
							<!--
							<p class="text-danger">
								Ups! Please check again
							</p>
							-->
						<div class="input-group-over">
							<div class="form-label-group mb-3">
								<label for="account_mobile" class="fs--16">Enter Mobile</label><br>
								<input required class="form-control" id="account_mobile" name="account_mobile" type="number">
								<span id="valid-msg-account" class="hide fs--15">Valid</span>
								<span id="error-msg-account" class="hide fs--15 font-weight-normal letter-spacing-03 styleColor"></span>
							</div>		
						</div>


							<div class="input-group-over">
								<div class="mb-3">
									<label for="account_password" class="fs--16"> Enter Password</label>
									<input required placeholder="Password" id="account_password" name="account_password" type="password" class="form-control">
									
								</div>

								<a href="{{ url('/account/resetpassword')}}" class="btn btn-pill mt-3  fs--12">
									FORGOT?
								</a>

							</div>

							<div class="form-check mb-2">
								<label class="form-checkbox form-checkbox-warning form-check-label fs--15">
									<input type="checkbox" name="checkbox_w" checked="">
									<i></i>Remember Me
								</label>
	                        </div>

	                        <p class="mb-2 fs--12 p-2"> 	
								I consent that my data is being stored in 
								line with the guidelines set out in  
								<a href="page-terms-and-conditions.html" target="_blank">Privacy Policy</a>. 
							</p>

	                        <div class="row">
		                        <div class="col-12 col-sm-6 col-md-6 mb-2">

									<button type="submit" class="btn btn-warning btn-block">
										Sign In
									</button>
								</div>

								<div class="col-12 col-sm-6 col-md-6">
									<center>
										<a href="{{ url('/account/loginwithotp')}}" class="btn btn-soft btn-link text-dark btn-block">
											login With Otp ?
										</a>
										
									</center>
								</div>
							</div>

						</div>
						
					</form>
					<!-- /SIGN IN -->

				</div>

			</div>

			<div class="col-12 col-sm-12 col-md-2 col-lg-2">
				<center><h2 class="or mt-7 mb-7 font-weight-normal">OR</h2></center>
			</div>

			<div class="col-12 col-sm-12 col-md-5 col-lg-5">

				<!-- SIGN UP -->
					<form method="#" action="#">
						<!-- @csrf -->
							<b class="mb-4 b-0 fs--18">
								&nbsp;&nbsp;Create account
							</b>
						
						<div class="p-4 rounded shadow-xs">


							<!-- <div class="mb-3">
								<label for="reg_first_name" class="reg_mobile fs--16">Enter Full Name</label>
								<input required id="reg_first_name" name="reg_first_name" type="text" placeholder="Name Surname" class="form-control">
							</div> -->

							<div class="mb-3">
								<label class="reg_mobile fs--16">Enter Name</label>

								<div class="row">
									<div class="col-md-6">
										<input 
											required 
											id="first_name" 
											name="first_name" 
											type="text" 
											placeholder="First Name" 
											class="form-control">
									</div>

									<div class="col-md-6">
										<input 
											required 
											id="last_name" 
											name="last_name" 
											type="text" 
											placeholder="Last Name" 
											class="form-control">
									</div>
								</div>
							</div>

							
							<div class="form-label-group mb-3">
								<label for="reg_email" class="fs--16">Enter Mobile</label>
								<input required id="reg_mobile" name="reg_mobile" type="number" class="form-control">
								<span id="valid-msg-reg" class="hide fs--15 font-weight-normal">Valid</span>
								<span id="error-msg-reg" class="hide fs--15 font-weight-normal letter-spacing-03 styleColor"></span>
								
							</div>

							

							<div class="input-group-over">
								<div class="mb-3">
									<label for="reg_password"  class="fs--16">Enter Password</label>
									<input required id="reg_password" name="reg_password" type="password" placeholder="At least 6 characters" class="form-control">
								</div>

								<!-- `SOW : Form Advanced` plugin used -->
								<a href="account-sign-password.html" class="btn fs--12 btn-password-type-toggle mt-3" data-target="#reg_password">
									<span class="group-icon">
										<i class="fi fi-eye m-0"></i>
										<i class="fi fi-close m-0"></i>
									</span>
								</a>

							</div>

							<div class="mb-3 regi_otp hide">
								<label for="reg_otp"  class="fs--16">Enter OTP</label>
								<input placeholder="Enter OTP Number" id="reg_otp" name="reg_otp" type="number" class="form-control">
							</div>

							<p class="mb-3 fs--12 p-2"> 	
								I consent that my data is being stored in 
								line with the guidelines set out in  
								<a href="page-terms-and-conditions.html" target="_blank">Privacy Policy</a>. 
							</p>

							<div>
								<button type="button" class="send-otp btn btn-warning btn-block" onclick="sendOtp()">Continue
	                            </button>
	                        </div>

	                        <div>
	                            <button class="regi_otp hide btn btn-soft btn-warning btn-block">Login
	                            </button>
							</div>
                            

	                        

	                        

						</div>

					</form>
					<!-- /SIGN UP -->

			</div>

		</div>

	</div>
</section>




<script>
var input1 = document.querySelector("#account_mobile"),
  errorMsgAccount = document.querySelector("#error-msg-account"),
  validMsgAccount = document.querySelector("#valid-msg-account");

// Error messages based on the code returned from getValidationError
var errorMapAccount = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// Initialise plugin
var intl1 = window.intlTelInput(input1, {
    initialCountry: "auto",
    geoIpLookup: function(success, failure) {
        $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "";
            success(countryCode);
        });
    },
    utilsScript: "js/utils.js"
});

var reset = function() {
  input1.classList.remove("error");
  errorMsgAccount.innerHTML = "";
  errorMsgAccount.classList.add("hide");
  validMsgAccount.classList.add("hide");
};

// Validate on blur event
input1.addEventListener('blur', function() {
  reset();
  if(input1.value.trim()){
    if(intl1.isValidNumber()){
      //validMsgAccount.classList.remove("hide");
    }else{
      input1.classList.add("error");
      var errorCodeAccount = intl1.getValidationError();
      errorMsgAccount.innerHTML = errorMapAccount[errorCodeAccount];
      errorMsgAccount.classList.remove("hide");
    }
  }
});

// Reset on keyup/change event
input1.addEventListener('change', reset);
input1.addEventListener('keyup', reset);    
</script>


<script>
var input = document.querySelector("#reg_mobile"),
  errorMsgReg = document.querySelector("#error-msg-reg"),
  validMsgReg = document.querySelector("#valid-msg-reg");

// Error messages based on the code returned from getValidationError
var errorMapReg = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// Initialise plugin
var intl = window.intlTelInput(input, {
    initialCountry: "auto",
    geoIpLookup: function(success, failure) {
        $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "";
            success(countryCode);
        });
    },
    utilsScript: "js/utils.js"
});

var reset = function() {
  input.classList.remove("error");
  errorMsgReg.innerHTML = "";
  errorMsgReg.classList.add("hide");
  validMsgReg.classList.add("hide");
  validMsgReg.classList.remove("regvalidation");
  $('.regi_otp').hide();
  $('.send-otp').show();
  $('input[name=reg_otp').val('');
};

// Validate on blur event
input.addEventListener('blur', function() {
  reset();
  if(input.value.trim()){
    if(intl.isValidNumber()){
      //validMsgReg.classList.remove("hide");
      validMsgReg.classList.add("regvalidation");
    }else{
      input.classList.add("error");
      var errorCode = intl.getValidationError();
      errorMsgReg.innerHTML = errorMapReg[errorCode];
      errorMsgReg.classList.remove("hide");
    }
  }
});

// Reset on keyup/change event
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);    
</script>



<script>
	/*$(document).ready(function() {
		$('.regi_otp').hide();
	}); */	
    
    function sendOtp() {
    	var data =$(".regvalidation").html();
    	
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
                    $('.regi_otp').show();
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
            $('.regi_otp').show();
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
<!-- End Section -->
