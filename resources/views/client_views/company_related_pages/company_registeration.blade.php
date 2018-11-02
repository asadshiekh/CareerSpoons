<!doctype html>
<html lang="en">

<!-- Mirrored from codeminifier.com/updated-job-stock-preview/job-stock/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Oct 2018 10:43:40 GMT -->
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
		<link href="{{url('public/client_assets/css/style.css')}}" rel="stylesheet">
		<link type="text/css" rel="stylesheet" id="jssDefault" href="{{url('public/client_assets/css/colors/green-style.css')}}">
		<!-- Customization style tags -->
		<link rel="stylesheet" type="text/css" href="{{url('public/client_assets/css/customization_css/customization_of_form.css')}}"> 
		<!-- Sweet Alert Libery -->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	</head>
	<body class="simple-bg-screen" style="background-image:url(public/client_assets/img/banner-10.jpg); ">
		<div class="Loader"></div>
		<div class="wrapper">  
			
			<!-- Title Header Start -->
			<section class="signup-screen-sec">
				<div class="container">
					<div class="signup-screen">
						<a href="{{url('/')}}"><img src="{{url('public/client_assets/img/logo.png')}}" class="img-responsive" alt=""></a>
						<form>

							<div class="row">
								<div class="col-xs-6">
									<label>Company Name *</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<input type="text" class="form-control" placeholder="Enter Company Name"  id="company_name">
									</div>
									<!--Error Msges -->
								</div>
								<div class="col-xs-6">
									<label>Company Email *</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-envelope"></i>
										</div>
										<input type="email" class="form-control" placeholder="Enter Company Email"  id="company_email">
									</div>
								</div>
							</div>
							<br/>
							<div class="row">
								<div class="col-xs-6">
									<label>Password *</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-lock"></i>
										</div>
										<input type="password" class="form-control" placeholder="Password"  id="company_password">
									</div>
								</div>
								<div class="col-xs-6">
									<label>Company Type *</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<select class="form-control"  id="company_type">
											<option value="" disabled="disabled" selected="selected" hidden="hidden" >Please Choose...</option>
											<option>Private</option>
											<option>Public</option>
											<option>NGO</option>
											<option>Default select</option>
										</select>
									</div>
								</div>
							</div>
							<br/>
							<div class="row">
								<div class="col-xs-6">
									<label>City *</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-map-marker"></i>
										</div>
										<select class="form-control"  id="company_city">
											<option value="" disabled selected hidden>Please Choose...</option>
											<option>Lahore</option>
											<option>Karachi</option>
											<option>Islamabad</option>
											<option>Quetta</option>
											<option>Multan</option>khaber pakhtoon khwa
											<option>Khaber Pakhtoon Khwa</option>
										</select>
									</div>
								</div>
								<div class="col-xs-6">
									<label>Branch Name / Code *</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-map-marker"></i>
										</div>
										<input type="text" class="form-control" placeholder="Branch Name / Branch Code"  id="company_branch">
									</div>
								</div>
							</div>
							<br/>
							<div class="row">
								<div class="col-xs-6">
									<label>Industry *</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-industry"></i>
										</div>
										<select class="form-control" id="company_industry">
											<option value="" disabled selected hidden>Please Choose...</option>
											<option>IT</option>
											<option>ETC</option>
											<option>ETC</option>
										</select>
									</div>
								</div>
								<div class="col-xs-6">
									<label>Operating Since *</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="date" id="company_operating_since" placeholder="DD/MM/YY" class="form-control"/>
									</div>
								</div>
							</div>
							<br/>
							<div class="row">
								<div class="col-xs-6">
									<label>Phone *</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-phone"></i>
										</div>
										<input type="text" id="company_phone_number"  class="form-control" placeholder="03234976389" >
									</div>
								</div>
								<div class="col-xs-6">
									<label>CNIC *</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa">&#xf2c3;</i>
										</div>
										<input type="text" id="company_cnic" class="form-control" placeholder="35202-2608620-7">
									</div>
								</div>
							</div>
							<br/>
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<label>Company Address *</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa">&#xf2b9;</i>
											</div>
											<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="100">Company Address</textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<span class="form-check-label" style="font-weight: 500 ; text-align: left; font-size: 13px">
									<input class="form-check-input" type="checkbox" id="checkbox">
									I Accept Terms & Conditions And Privacy Policy Of CareerSpoons.com
								</span>
							</div>

							<button class="btn btn-login" onclick="register_company();" type="button" >Create Account</button>
							<span>Have You Account ? <a href="{{url('company-login')}}"> Login</a></span>
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
				<!-- Custom Js -->
				<script src="{{url('public/client_assets/js/custom.js')}}"></script>
				<!-- Masking Input Js -->
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
				<!-- Customization Register Company -->
				<script src="{{url('public/client_assets/js/customization_js/company_registration.js')}}"></script>

				
				<script type="text/javascript">
					$(document).ready(function() {
						$('#styleOptions').styleSwitcher();
						$("#company_phone_number").mask("(0399) 999-9999");
						$("#company_cnic").mask("99999-9999999-9");
						//$('#date').mask('00/00/0000');
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
			</div>
		</body>

		<!-- Mirrored from codeminifier.com/updated-job-stock-preview/job-stock/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Oct 2018 10:43:40 GMT -->
		</html>
