<!doctype html>
<html lang="en">

<head>
	<!-- Basic Page Needs
		================================================== -->
		<title>Job Stock - Responsive Job Portal Bootstrap Template | ThemezHub</title>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
		================================================== -->
		<link rel="stylesheet" href="{{url('public/client_assets/plugins/css/plugins.css')}}">

		<!-- Custom style -->
		<link href="{{url('public/client_assets/css/mystyle.css')}}" rel="stylesheet">
		<link type="text/css" rel="stylesheet" id="jssDefault" href="{{url('public/client_assets/css/colors/green-style.css')}}">
		<!-- Customization style tags -->
		<link rel="stylesheet" type="text/css" href="{{url('public/client_assets/css/customization_css/customization_of_form.css')}}">
		<!-- Sweet Alert Libery -->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<!-- Password Strength Meter Css -->
		<link rel="stylesheet" href="{{url('public/client_assets/css/customization_css/passwordscheck.css')}}">  
	</head>

	<body class="simple-bg-screen" id="body-f">
		
		<div class="Loader"></div>
		<div class="wrapper">  
			
			<!-- Title Header Start -->
			<section class="lost-ps-screen-sec">



				<div class="container">
					<div class="lost-ps-screen">

						<a href="{{url('/')}}"><img src="{{url('public/client_assets/img/career_black.png')}}" class="img-responsive" alt=""></a>


						<form>
							

<!-- 	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-envelope"></i>
			</div>
			<input type="password" name="new_candidate_password" class="form-control" placeholder="Enter Your New Password">

		</div>
	</div> -->




	<div class="row">
		<div class="col-xs-8">
			<label>Company New Password *</label>
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-lock" style="position: relative; top:5px"></i>
				</div>
				<input type="text" id="password-field" class="form-control" placeholder="Enter Password" required="required">
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

	<br>

	<button class="btn btn-login" id="updated_button" type="button" onclick="updatepassword()">Submit</button>
	<span><a href="{{url('company-login')}}">Back to Login</a></span>
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
				<!-- Notify Javascript -->
				<script src="{{url('public/client_assets/js/notify/notyf.min.js')}}"></script>
				<!-- Passsword Strength Checker -->
				<script src="{{url('public/client_assets/js/customization_js/passwordscheck.js')}}"></script>
				<!-- Customization Company Login -->
				<script src="{{url('public/client_assets/js/customization_js/company_login.js')}}"></script>

				<script src="{{url('public/client_assets/js/customization_js/company_forget_password.js')}}"></script>


				<script type="text/javascript">
					$(document).ready(function() {
						$('#styleOptions').styleSwitcher();
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


				<script>
					function openRightMenu() {
						document.getElementById("rightMenu").style.display = "block";
					}

					function closeRightMenu() {
						document.getElementById("rightMenu").style.display = "none";
					}
				</script>
				<style type="text/css">
				#body-f{
					background-image: url('public/client_assets/img/banner-5.jpg');
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
			</style>
		</div>
	</body>

	</html>
