<!doctype html>
<html lang="en">

<head>
	<!-- Basic Page Needs
		================================================== -->
		<title>Job Stock - Responsive Job Portal Bootstrap Template | ThemezHub</title>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


		<!-- Font Awesome  ================================================== -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<!-- CSS
		================================================== -->
		<link rel="stylesheet" href="{{url('public/client_assets/plugins/css/plugins.css')}}">

		<!-- Custom style -->
		<link href="{{url('public/client_assets/css/style.css')}}" rel="stylesheet">
		<link type="text/css" rel="stylesheet" id="jssDefault" href="{{url('public/client_assets/css/colors/green-style.css')}}">
		<!-- Customization style tags -->
		<link rel="stylesheet" type="text/css" href="{{url('public/client_assets/css/customization_css/customization_of_form.css')}}">
		<!-- Sweet Alert Libery -->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<!-- Password Strength Meter Css -->
		<link rel="stylesheet" href="{{url('public/client_assets/css/customization_css/passwordscheck.css')}}">
		<!-- javascript Css notify -->
	<link rel="stylesheet" href="{{url('public/client_assets/css/notify/notyf.min.css')}}">

	</head>
	<body class="simple-bg-screen" style="background-image:url(public/client_assets/img/banner-10.jpg);">
		<div class="Loader"></div>
		<div class="wrapper">  
			<!-- Title Header Start -->
			<section class="signup-screen-sec">
				<div class="container">
					<div class="signup-screen">
						<a href="{{url('/')}}"><img src="{{url('public/client_assets/img/logo.png')}}" class="img-responsive" alt=""></a>
						<form>

							<div class="form-group">
								<label style="display: inline;">Full Name * </label><p id="name-error" style="display: inline; color: red"></p>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-user"></i>
									</div>
									<input type="text" id="candidate_name" class="form-control" placeholder="Enter Full Name" required onkeyup="checkname()">
								</div>
							</div>
							<div class="form-group">
								<label style="display: inline;">User Email *</label><p id="email-error" style="display: inline; color:red"></p>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</div>
									<input type="email" id="user_email" class="form-control" placeholder="User Email" required="required" onkeyup="checkemail()">
								</div>
							</div>

							<div class="row">
								
								<div class="col-xs-8">
									<label style="display: inline;">Password *</label><p id="pass-error" style="display: inline; color:red"></p>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-lock" style="position: relative; top:5px"></i>
										</div>
										<input type="text" id="password-field" class="form-control" placeholder="Enter Password" required="required" onkeyup="checkpass()">
										<div class="input-group-addon">
											<i toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></i>
										</div>
									</div>
									<!--Error Msges -->
								</div>
								<div class="col-xs-4" id="register">
									
									<span id="result" class="field-icon_1">Password Strength Meter</span>
								</div>
							</div>
							<div class="form-group"></div>

							<div class="row">
								<!-- <p id="user-error" style="display: inline;"></p> -->
								<div class="col-xs-6">
									<label>Username *</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input type="text" id="username" class="form-control" placeholder="Enter UserName" pattern="[a-zA-Z0-9_-]{6,12}" title="Must be Alphanumeric in 6-12 character" required onkeyup="checkuser()">
									</div>
									<p id="user-error" style="display: inline; color: red"></p>
									<!--Error Msges -->


								</div>
								<div class="col-xs-6">
									<label>Phone *</label><!-- <p id="user-error" style="display: inline;"></p> -->
									<div class="input-group">
										<div class="input-group-addon">
											<!-- <i class="fa fa-phone"></i> -->+92
										</div>
										<input type="text" name="phone" id="phone_number" class="form-control" placeholder="(334)-9974743" required="required" onkeyup="checknumber();">
									</div>
								</div>
								<p id="user-error" style="display: inline;"></p><p style="display: inline;color:red" id="phone-error"></p>
							</div>
							<div class="form-group"></div>
							<div class="form-group">
								<span class="form-check-label" style="font-weight: 500 ; text-align: left; font-size: 13px">
									<input class="form-check-input" type="checkbox" id="checkbox" onselect="check();">
									I Accept Terms & Conditions And Privacy Policy Of CareerSpoons.com
								</span>
							</div>

							<button type="button" class="btn btn-login" id="user_btn" onclick="user_register_validate();">Create Account</button>
							<span>Have You Account ? <a href="{{url('user-login')}}"> Login</a></span>
						</form>
					</div>
				</div>
			</section>
			<button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()"><i class="spin fa fa-cog" aria-hidden="true"></i></button>
			<div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
				<button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
				<ul id="styleOptions" title="switch styling">
					<li>
						<a href="javascript: void(0)" class="cl-box blue" data-theme="colors/blue-style"></a>
					</li>
					<li>
						<a href="javascript: void(0)" class="cl-box red" data-theme="colors/red-style"></a>
					</li>
					<li>
						<a href="javascript: void(0)" class="cl-box purple" data-theme="colors/purple-style"></a>
					</li>
					<li>
						<a href="javascript: void(0)" class="cl-box green" data-theme="colors/green-style"></a>
					</li>
					<li>
						<a href="javascript: void(0)" class="cl-box dark-red" data-theme="colors/dark-red-style"></a>
					</li>
					<li>
						<a href="javascript: void(0)" class="cl-box orange" data-theme="colors/orange-style"></a>
					</li>
					<li>
						<a href="javascript: void(0)" class="cl-box sea-blue" data-theme="colors/sea-blue-style "></a>
					</li>
					<li>
						<a href="javascript: void(0)" class="cl-box pink" data-theme="colors/pink-style"></a>
					</li>
				</ul>
			</div>
			
			<!-- Scripts
				================================================== -->
				<script type="text/javascript" src="{{url('public/client_assets/plugins/js/jquery.min.js')}}"></script>
				<script type="text/javascript" src="{{url('public/client_assets/plugins/js/viewportchecker.js')}}"></script>
				<script type="text/javascript" src="{{url('public/client_assets/plugins/js/bootstrap.min.js')}}"></script>
				<script type="text/javascript" src="{{url('public/client_assets/plugins/js/bootsnav.js')}}"></script>
				<script type="text/javascript" src="{{url('public/client_assets/plugins/js/select2.min.js')}}"></script>
				<script type="text/javascript" src="{{url('public/client_assets/plugins/js/wysihtml5-0.3.0.js')}}"></script>
				<script type="text/javascript" src="{{url('public/client_assets/plugins/js/bootstrap-wysihtml5.js')}}"></script>
				<script type="text/javascript" src="{{url('public/client_assets/plugins/js/datedropper.min.js')}}"></script>
				<script type="text/javascript" src="{{url('public/client_assets/plugins/js/dropzone.js')}}"></script>
				<script type="text/javascript" src="{{url('public/client_assets/plugins/js/loader.js')}}"></script>
				<script type="text/javascript" src="{{url('public/client_assets/plugins/js/owl.carousel.min.js')}}"></script>
				<script type="text/javascript" src="{{url('public/client_assets/plugins/js/slick.min.js')}}"></script>
				<script type="text/javascript" src="{{url('public/client_assets/plugins/js/gmap3.min.js')}}"></script>

				<!-- Custom Js -->
				<script src="{{url('public/client_assets/js/custom.js')}}"></script>
				<script src="{{url('public/client_assets/js/jQuery.style.switcher.js')}}"></script>
				<script src="{{url('public/client_assets/js/customization_js/user_registration.js')}}"></script>
				<!-- Masking Input Js -->
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
				<!-- Passsword Strength Checker -->
				<script src="{{url('public/client_assets/js/customization_js/passwordscheck.js')}}"></script>
				<!-- Passsword Strength Checker -->
				<script src="{{url('public/client_assets/js/placeholder/superplaceholder.min.js')}}"></script>
				<!-- Notify Javascript -->
		<script src="{{url('public/client_assets/js/notify/notyf.min.js')}}"></script>

				<script type="text/javascript">
					$(document).ready(function() {
						$('#styleOptions').styleSwitcher();
						$("#phone_number").mask("(999)-9999999");
						//$.mask.definitions['#'] = $.mask.definitions['9'];
						//$.mask.definitions['9'] = null; 
						//+7 ([000]) [000]-[0000]
						//$("#phone-number").mask("(?92) 00-000-0000");
					});
				</script>
				<script type="text/javascript">


					$(".toggle-password").click(function() {

						$(this).toggleClass("fa-eye-slash fa-eye");
						var input = $($(this).attr("toggle"));
						if (input.attr("type") == "password") {
							input.attr("type", "text");
						} else {
							input.attr("type", "password");
						}
					});

				</script>

				<script type="text/javascript">

					const instance = superplaceholder({
						el: document.querySelector('#candidate_name'),
						sentences: [ 'Muhammad Asad Afzal', 'Syeda Nayab Zahra'],
						options:{
							loop: true,
							letterDelay:50,
							sentenceDelay:1000,
							//onBlurAction: superplaceholder.Actions.[START|NOTHING|STOP]
						}
					});
					superplaceholder({
						el: document.querySelector('#user_email'),
						sentences: ['asadshiekh9@gmail.com'],
					});

					const instance_password = superplaceholder({
						el: document.querySelector('#password-field'),
						sentences: [ '1 Special Character', '1 Upper Alphabet', 'Eg. Chess-1234'],
						options: {
							loop: true,
							letterDelay: 50,
							sentenceDelay: 500,
							onFocusAction:superplaceholder.Actions.STOP,
							onBlurAction: superplaceholder.Actions.START,
						}
					});

					const instance_number = superplaceholder({
						el: document.querySelector('#phone_number'),
						sentences: ['(334)-9974743'],
						options: {
							letterDelay: 100,
							sentenceDelay: 1000,
						}
					});

					instance_password.start();
					instance_number.start();
				</script>

				<script>
					function openRightMenu() {
						document.getElementById("rightMenu").style.display = "block";
					}

					function closeRightMenu() {
						document.getElementById("rightMenu").style.display = "none";
					}
				</script>
			</div>
		</body>

		</html>
		<style type="text/css">


		.login-screen, .signup-screen, .lost-ps-screen {
			position: relative;
			max-width: 480px;
			margin:-5% auto 0 auto;
		}

		.field-icon_1{
			font-size: 12px;
			font-weight:bold;
			color: limegreen;
			float: left;
			position: relative;
			z-index:3;
			border: 1px solid red;
			top:12px;
		}


		.alert{
			color: red;
			font-size: 12px;
		}
		/*.user-danger{
			border: solid 2px red;
		}*/
		.success{
			color: green;
			font-size: 12px;
		}
		p{
			padding-left: 2%;
		}
		/*.user-success{
			border: solid 2px green;
		}*/

		




	</style>