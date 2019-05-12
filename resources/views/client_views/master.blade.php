<!doctype html>
<html lang="en">


<head>
<!-- Basic Page Needs
	================================================== -->
	<title><?php if($page_title){echo $page_title;}else{echo "CareerSpoons";} ?></title>
	<link rel="icon" href="{{url('public/client_assets/img/log.png')}}" sizes="16x16">
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Font Awesome  ================================================== -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<!-- CSS  ================================================== -->
	<link rel="stylesheet" href="{{url('public/client_assets/plugins/css/plugins.css')}}">

	<!-- Custom style -->
	<link href="{{url('public/client_assets/css/style.css')}}" rel="stylesheet">
	<link type="text/css" rel="stylesheet" id="jssDefault" href="assets/css/colors/green-style.css">
	<!-- Sweet Alert -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.css">
	<!-- Pro Tip javaScript -->
	<link rel="stylesheet" href="//gitcdn.link/repo/wintercounter/Protip/master/protip.min.css">
	<!-- JQuery Data Tables -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<!-- javascript Css notify -->
	<link rel="stylesheet" href="{{url('public/client_assets/css/notify/notyf.min.css')}}">
	<!--  Css Effects -->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

	<!--  Chart(Js) css Wigets -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/billboard.js/1.6.2/billboard.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/billboard.js/1.6.2/theme/insight.css" rel="stylesheet">
	<!-- Input Tags -->
	<link href="{{url('public/client_assets/css/bootstrap_tags/bootstrap-tagsinput.css')}}" rel="stylesheet">
	<!-- Zoom in Effect  -->
	<link href="https://cdn.jsdelivr.net/npm/lightgallery.js@1.1.2/dist/css/lightgallery.min.css" rel="stylesheet">
	<!-- / Cropper Files -->
	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
	<script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
	<link rel="stylesheet" type="text/css" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
	<!-- / Cropper Files  -->

	<!-- Toggle Button -->
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

	<!-- Css rating -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

	<!-- Password Strength Meter Css -->
		<link rel="stylesheet" href="{{url('public/client_assets/css/customization_css/passwordscheck.css')}}">

	<!-- Video Pop Up -->
		<link rel="stylesheet" href="{{url('public/client_assets/css/video_css/videopopup.css')}}">

	<!-- data table Responsive -->
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

	<link rel="stylesheet" href="//min.gitcdn.xyz/repo/daneden/animate.css/master/animate.css">



</head>
<body>
	<div class="Loader"></div>
	<div class="wrapper">  
		<!-- Start Navigation -->
		<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">

			<div class="container">            
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
					<i class="fa fa-bars"></i>
				</button>
				<!-- Start Header Navigation -->
				<div class="navbar-header">
					<a class="navbar-brand" href="{{url('/')}}">
						<img src="{{url('public/client_assets/img/career_white.png')}}" class="logo logo-display" alt="">
						<img src="{{url('public/client_assets/img/career_white.png')}}" class="logo logo-scrolled" alt="">
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
						<li><a href="{{url('all-jobs')}}"><i class="fa fa-spinner fa-pulse"></i>All Jobs</a></li>
						<li><a href="{{url('search-company')}}"><i class="fas fa-city"></i>Companies</a></li>
						<li><a href="pricing.html"><i class="fas fa-file-signature"></i>Create Resume</a></li>
						@if(Session::has('user_status'))
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="{{url('user-profile')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
								Candidate Profile
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<li><a class="dropdown-item" href="{{url('user-profile')}}" style="text-align:left;"><i class="fas fa-sign-out-alt"></i>&nbsp&nbsp&nbsp&nbspYour Profile</a></li>
								<li><a class="dropdown-item" href="#CandidateSetting" data-toggle="modal" style="text-align:left;"><i class="fas fa-sign-out-alt"></i>&nbsp&nbsp&nbsp&nbspSetting</a></li>		
								<li><a type="button" class="dropdown-item" style="text-align:left;" onclick="logout_all();" id="btn-log"><i class="fas fa-sign-out-alt"></i>&nbsp&nbsp&nbsp&nbspLogout</a></li>

							</ul>
						</li>
						@elseif (Session::has('company_status'))
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
								Company Profile
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<li><a class="dropdown-item" href="{{url('company-profile')}}" style="text-align:left;"><i class="fas fa-city"></i>&nbsp&nbsp&nbsp&nbspProfile</a></li>

								<li><a type="button" class="dropdown-item" onclick="company_logout();" style="text-align:left;"><i class="fas fa-sign-out-alt"></i>&nbsp&nbsp&nbsp&nbspLogout</a></li>
							</ul>
						</li>

						@else						
						<li class="left-br"><a href="javascript:void(0)"  data-toggle="modal" data-target="#signup" class="signin">Sign In Now</a></li>
						@endif

					</ul>
					<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
						<!-- <li class="dropdown megamenu-fw"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Brows</a>
						</li> -->
						<li><a href="{{url('all-candidates')}}"><i class="fas fa-users"></i>Candidates </a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>   
		</nav>
		<!-- End Navigation -->
		@yield('content');


		<!-- Footer Section Start -->
		<footer class="footer">
			<div class="row lg-menu">
				<div class="container">
					<div class="col-md-4 col-sm-4">
						<img src="{{url('public/client_assets/img/career_grey.png')}}" class="img-responsive" alt="" /> 
					</div>
					<div class="col-md-8 co-sm-8 pull-right">
						<ul>
							<li><a href="{{url('/')}}" title="">Home</a></li>
							<!-- <li><a href="blog.html" title="">Blog</a></li> -->
							<li><a href="{{url('about-us')}}" title="">About Us</a></li>
							<li><a href="{{url('faq')}}" title="">FAQ</a></li>
							<li><a href="{{url('contact-us')}}" title="">Contact Us</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row no-padding">
				<div class="container">
					<div class="col-md-3 col-sm-12">
						<div class="footer-widget">
							<h3 class="widgettitle widget-title">About CareerSpoons</h3>
							<div class="textwidget">
								<?php $about=DB::table('about_us_content')->first(); ?>
								<p>{{$about->about_qoute}}</p>
								<p>{{$about->about_address}}</p>
								<p><strong>Email:</strong> {{$about->about_email}}</p>
								<p><strong>Call:</strong> <a href="tel:+15555555555">{{$about->about_no}}</a></p>
								<ul class="footer-social">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-4">
						<div class="footer-widget">
							<h3 class="widgettitle widget-title">All Navigation</h3>
							<div class="textwidget">
								<div class="textwidget">
									<ul class="footer-navigation">
										<li><a href="manage-company.html" title="">Front-end Design</a></li>
										<li><a href="manage-company.html" title="">Android Developer</a></li>
										<li><a href="manage-company.html" title="">CMS Development</a></li>
										<li><a href="manage-company.html" title="">PHP Development</a></li>
										<li><a href="manage-company.html" title="">IOS Developer</a></li>
										<li><a href="manage-company.html" title="">Iphone Developer</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-4">
						<div class="footer-widget">
							<h3 class="widgettitle widget-title">All Categories</h3>
							<div class="textwidget">
								<ul class="footer-navigation">
									<li><a href="{{url('all-jobs')}}/Accounting_&_Finance" title="">Accounting & Finance</a></li>
									<li><a href="{{url('all-jobs')}}/Automotive" title="">Automotive</a></li>
									<li><a href="{{url('all-jobs')}}/Education_Training" title="">Education Training</a></li>
									<li><a href="{{url('all-jobs')}}/Healthcare" title="">Healthcare</a></li>
									<li><a href="{{url('all-jobs')}}/Restaurant_&_Food" title="">Restaurant & Food</a></li>
									<li><a href="{{url('all-jobs')}}/Telecommunications" title="">IT & Computer Science </a></li>
									
								</ul>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-4">
						<div class="footer-widget">
							<h3 class="widgettitle widget-title">Connect Us</h3>
							<div class="textwidget">
								<form class="footer-form" id="contact_us">
									<input type="text" id="candidate_name1" class="form-control" placeholder="Your Name"> 
									<input type="text" id="candidate_email1" class="form-control" placeholder="Your Email">
									<input type="hidden" id="candidate_number1" value="0000" class="form-control"> 
									<input type="hidden" id="candidate_subject1" value="no-subject"  class="form-control">
									<textarea class="form-control" id="candidate_message1" placeholder="Message"></textarea>
									<button type="button" onclick="contactUs1();" class="btn btn-primary">Send</button>
								</form>
								<style type="text/css">
									#contact_us ::placeholder{
                                     color: white;
                                     font-size: 10px;
									}
								</style>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row copyright">
				<div class="container">
					<p>Copyright CareerSpoons © 2018. All Rights Reserved </p>
				</div>
			</div>
		</footer>
		<div class="clearfix"></div>
		<!-- Footer Section End -->

		<!-- Sign Up Window Code -->
		<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<div class="tab" role="tabpanel">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">As Candidate</a></li>
								<li role="presentation"><a href="#register" role="tab" data-toggle="tab">As Company</a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content" id="myModalLabel2">
								<div role="tabpanel" class="tab-pane fade in active" id="login">
									<img src="{{url('public/client_assets/img/logo.png')}}" class="img-responsive" alt="" />
									<div class="subscribe wow fadeInUp">
										<form class="form-inline" method="post">
											<div class="col-sm-12">
												<div class="form-group">
													<span id="email-error"></span>
													<input type="email"  name="email" class="form-control" placeholder="Enter Username" required="" id="user_email" onkeyup="checkemail();">
													<span id="pass-error"></span>
													<input type="password" name="password" class="form-control"  placeholder="Password" required="" id="user_password" onkeyup="checkpass()">
													<div class="center">
														<button type="button" id="login-btn" class="submit-btn" onclick="validate_user_login();"> Login </button>
														<span style="display: block; margin-top:40px"><a href="{{url('user-registeration')}}">Not Account Yet? Create Your Account</a></span>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>

								<div role="tabpanel" class="tab-pane fade" id="register">
									<img src="{{url('public/client_assets/img/logo.png')}}" class="img-responsive" alt="" />
									<form class="form-inline" method="post">
										<div class="col-sm-12">
											<div class="form-group">
												<span id="emailc-error"></span>
												<input type="email"  name="email" class="form-control" id="company_email" placeholder="Company Email" required="" onkeyup="checkCemail()">
												<span id="passc-error"></span>
												<input type="password" name="password" class="form-control" id="company_password"  placeholder="Password" required="" onkeyup="checkpass()">
												<div class="center">
													<button type="button" onclick="validate_company_login();" id="subscribe" class="submit-btn"> Login </button>
													<span style="display: block; margin-top:40px"><a href="{{url('company-registeration')}}">Not Account Yet? Create Your Company Account</a></span>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>   
		<!-- End Sign Up Window -->



		<!-- Candidate Setting -->


<div id="CandidateSetting" class="modal fade "> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header"> <!-- modal header -->
				<button type="button" class="close" 
				data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title">Candidate Setting</h4>
			</div>

			<div class="modal-body"> <!-- modal body -->
				<div class="row no-mrg">
						<div class="edit-pro">
							
							<div class="col-md-4">
								<br>
								<br>
								<div class="list-group">
									<a data-toggle="tab" href="#CandidatePhone" class="list-group-item">Candidate Phone Setting</a>
									<a data-toggle="tab" href="#CandidateEmail" class="list-group-item">Candidate Email Setting</a>
									<a data-toggle="tab" href="#CandidatePassword" class="list-group-item">Candidate Password Setting</a>
									<a data-toggle="tab" href="#CandidateCloseAccount" class="list-group-item">Delete Account</a>
								</div>

							</div>

<div class="col-md-8">
	<div class="tab-content">
		<div id="CandidatePhone" class="tab-pane fade in active">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" style="text-align:center;">Candidate Phone Setting</h3>
				</div>
				<div class="panel-body">
					
					<div class="table-bordered">
					<form>
						<table class="table">
							<tr>
								<th>Phone Number</th>
								<th style="text-align: center;">Visibility Status</th>
								<th style="text-align: center;">Action</th>
							</tr>
							<tr style="border:1px solid #DDDDDD">
								<td>{{Session::get('phone_number')}}</td>

								<td id="status-td">
									<?php if(Session::get('phone_status') == "1" ){?>
                                          <p style="text-align:center; color:green">Visible</p>
								<?php }else{ ?>
									<p style="text-align:center; color:red;">Not Visible</p>
								<?php }?>
								</td>
								<td>
									<select class="form-control input-md" id="select_phone_status" onchange="change_phone_status(this.value);">
										<option  disabled="disabled" selected hidden="hidden">Select Status</option>
										<option value="1">Visible</option>
										<option value="0" >Not Visible</option>
									</select>
								</td>
							</tr>
						</table>
					</form>
					</div>
				</div>
			</div>
		</div>
		<div id="CandidateEmail" class="tab-pane fade">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" style="text-align:center;">Candidate Email Setting</h3>
				</div>
				<div class="panel-body">

					<form id="user_profile_add_pro">
						    <h5 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace;font-weight: bold;">Change Email Here</h5>
						    <br/>
							<div class="col-sm-12 col-md-6">
								<label>Enter New Email:</label>
								<input type="text" id="new_email" name="new_email" class="form-control" placeholder="Write Your New Email">
							</div>
							<div class="col-sm-12 col-md-6">
								<label>Enter Current Password:</label>
								<input type="password" name="password_email" id="password_email" class="form-control" placeholder="Your password?">
							</div>
							
							<div class="col-sm-12 col-md-4 col-md-offset-4">
								<br/>
								<input type="button" onclick="change_email_setting();" class="btn btn-success" value="Save Changes">
							</div>


					</form>
						
				</div>
			</div>
		</div>
		<div id="CandidatePassword" class="tab-pane fade">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" style="text-align:center;">Candidate Password Setting</h3>
				</div>
				<div class="panel-body">


					<form id="user_profile_add_pro">
						<h5 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace;font-weight: bold;">Change Password Here</h5>
						<br/>
						<div class="col-sm-12 col-md-12">
							<label>Enter Current Password:</label>
							<input type="text" id="new_password" name="new_password" class="form-control" placeholder="Enter Current Password">
						</div>
						<div class="col-sm-12 col-md-8">
							<label>Enter New Password:</label>
							<input type="password" name="password-field" id="password-field" class="form-control" placeholder="Enter New Password?">
						</div>

						<div class="col-sm-12 col-md-4" id="register">
							<br/>
							<span id="result" class="field-icon_1">Password Strength Meter</span>
						</div>
                        <div class="col-sm-12 col-md-6">
							<br/>
							<br/>
							<a href="" style="text-decoration: underline;">Forget-Password?</a>
						</div>
						<div class="col-sm-12 col-md-6" style="text-align: right;">
							<br/>
							
							<input type="button" onclick="change_password();" class="btn btn-success" value="Save Changes">
						</div>
					</form>
					
				</div>
			</div>
		</div>
		
		<div id="CandidateCloseAccount" class="tab-pane fade">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" style="text-align:center;">Candidate Delete Account</h3>
				</div>
				<div class="panel-body">
					<h5 class="box-title text-left" id="heading-head" style="font-family:'Courier New', Courier, monospace;font-weight: bold;">Dear {{Session::get('candidate_name')}}:</h5>
					<h5 class="box-title text-left" id="heading-head" style="font-family:'Courier New', Courier, monospace;">Alert: Once Your User Account Has Been Deleted, CarrerSpoons Cannot Restore Your Content.</h5>


					<div class="col-sm-12 col-md-4 col-md-offset-4">
						<br/>

						<input type="button" onclick="delete_account();"  class="btn btn-success" value="Delete Account">
					</div>


				</div>
			</div>
		</div>
		
	</div>
</div>

						

						</div>
				</div>
			</div>

			<div class="modal-footer"> <!-- modal footer -->
				
				<!-- <button type="button" class="btn btn-primary">Download</button> -->
			</div>

		</div> <!-- / .modal-content -->

	</div> <!-- / .modal-dialog -->

</div><!-- / .modal -->



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
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJjtzMZotb60YwDCSgUSmsj4i4oGFZLjQ &callback=initMap" async defer></script>
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
			<!-- Date dropper js-->
			<script src="http://themezhub.com/"></script>

			<script src="{{url('public/client_assets/js/jQuery.style.switcher.js')}}"></script>
			<!-- Sweet Alert -->
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.all.min.js"></script>
			<!-- Custom Js for USER Login -->
			<script src="{{url('public/client_assets/js/customization_js/user_login.js')}}"></script>
			<!-- Custom Js for Company-Login -->
			<script src="{{url('public/client_assets/js/customization_js/company_login.js')}}"></script>
			<!-- Pro Tip javaScript -->
			<script src="//gitcdn.link/repo/wintercounter/Protip/master/protip.min.js"></script>
			<!-- Ck Editors Basic -->
			<script src="//cdn.ckeditor.com/4.11.1/basic/ckeditor.js"></script>
			<!-- Masking Input Js -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
			<!-- Add Eduction Resume -->
			<script src="{{url('public/client_assets/js/customization_js/add_eduction_resume.js')}}"></script>
			<!-- Add Eduction Resume -->
			<script src="{{url('public/client_assets/js/customization_js/add_experience_resume.js')}}"></script>
			<!-- Add Project Resume -->
			<script src="{{url('public/client_assets/js/customization_js/add_project_resume.js')}}"></script>
			<!-- Add Skill Resume -->
			<script src="{{url('public/client_assets/js/customization_js/add_skill_resume.js')}}"></script>
			<!-- Add Language Resume -->
			<script src="{{url('public/client_assets/js/customization_js/add_language_resume.js')}}"></script>
			<!-- Add Hobbies Resume -->
			<script src="{{url('public/client_assets/js/customization_js/add_hobbies_resume.js')}}"></script>
			<!-- Manage Catgeory of Data Tables -->
			<script src="{{url('public/client_assets/js/customization_js/manage_user_category.js')}}"></script>
			<!-- Contact Us -->
			<script src="{{url('public/client_assets/js/customization_js/contact_us.js')}}"></script>
			<!-- Review -->
			<script src="{{url('public/client_assets/js/customization_js/review.js')}}"></script>
			<!-- Candiadte Setting -->
			<script src="{{url('public/client_assets/js/customization_js/candidate_setting.js')}}"></script>
			<!--Company Profile -->
			<script src="{{url('public/client_assets/js/customization_js/company_profile.js')}}"></script>
			<script src="{{url('public/client_assets/js/customization_js/candidate_profile.js')}}"></script>
			<!--Company Profile -->
			<script src="{{url('public/client_assets/js/customization_js/job_match_criteria.js')}}"></script>
			<!-- Typed .Js -->
			<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
			<!-- Jquery data Tables .Js -->
			<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<!--Js Charts Link -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
			<!-- Notify Javascript -->
			<script src="{{url('public/client_assets/js/notify/notyf.min.js')}}"></script>
			<!-- Passsword Strength Checker -->
			<script src="{{url('public/client_assets/js/customization_js/passwordscheck.js')}}"></script>
			
			<!-- css effect link -->
			<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
			<!-- Chart(Js) Javascript cdn link -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/billboard.js/1.6.2/billboard.js"></script>
			<!-- Chart(Js) Javascript cdn link -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/billboard.js/1.6.2/billboard.pkgd.js"></script>
			<!-- Input Tags -->
			<script src="{{url('public/client_assets/js/bootstrap_tags/bootstrap-tagsinput.js')}}"></script>
			<!-- Zoom in Zoom Out -->
			<script src="https://cdn.jsdelivr.net/npm/lightgallery.js@1.1.2/dist/css/lightgallery.min.css"></script>
			<!-- Toggle Button -->
			<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
			<!-- Script  -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
			<!-- Video Pop Up -->
			<script src="{{url('public/client_assets/js/video_js/videopopup.js')}}"></script>
			<!-- data table Responsive -->
			<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
			<!-- Count UP -->
			<script src="{{url('public/client_assets/js//countup/countUp.min.js')}}"></script>
			
			

			<style type="text/css">
				
			.field-icon_1{
				font-size: 12px;
				font-weight:bold;
				color: limegreen;
				float: left;
				position: relative;
				z-index:3;
				border: 1px solid red;
				top:8px;
				left:5px;
			}
			#btn-log{
				cursor: pointer;
			}

			</style>
			<style type="text/css">
				span{
					padding-left: 3%;
				}
				.alert{
					color: red;
					font-size: 12px;
				}
				.user-danger{
					border: solid 2px red;
				}
				.success{
					color: green;
					font-size: 12px;
				}
				.user-success{
					border: solid 2px green;
				}

				</style>
			
			<script>
					
			@if (Session::has('candidate_rating'))	

				$("#rateYo").rateYo({
					rating:{{Session::get('candidate_rating')}},
					fullStar: true,
					onChange: function (rating, rateYoInstance){

						$(this).next().text(rating);
					}
				});

			@elseif (Session::has('organization_rating'))

			$("#rateYo").rateYo({
					rating:{{Session::get('organization_rating')}},
					fullStar: true,
					onChange: function (rating, rateYoInstance){

						$(this).next().text(rating);
					}
				});

			@endif
			</script>

			


			<script>
				$('#dob').dateDropper();
			</script>
			
			<script>
				$('#candidate_dob').dateDropper();
			</script>

			<script>
				$('#update_dob').dateDropper();
			</script>

			<script>
				$('#exp-start').dateDropper();
			</script>

			<script>
				$('#exp-end').dateDropper();
			</script>

			<script>
				$('#edu-start').dateDropper();
			</script>

			<script>
				$('#edu-end').dateDropper();
			</script>
			
			<script>
				$('#pro-start').dateDropper();
			</script>

			<script>
				$('#pro-end').dateDropper();
			</script>

			<script>
				$('#last_apply').dateDropper();
			</script>

			<script>
				$('#post_visible').dateDropper();
			</script>
			
			<script>
				$('#company_s').dateDropper();
			</script>
			
			<script>
				$('#new_company_since').dateDropper();
			</script>



			<script>
				$("#skilltags").tagsinput({
					maxTags: 5,
				});
			</script>

			<!-- Bio Ck Editor -->
			<script>
				CKEDITOR.replace( 'editor1' );
			</script>

			<!-- Add Eduction Ck Editior -->
			<script>
				CKEDITOR.replace( 'eduction' );
			</script>

			<!-- Viewd Eduction Ck Editior -->
			<script>
				CKEDITOR.replace( 'view_edu_description' );	
			</script>

			<!-- Viewd Experience Ck Editior -->
			<script>
				CKEDITOR.replace( 'view_exp_description' );	
			</script>


			<script>
				CKEDITOR.replace( 'work_history' );
			</script>
			
			<script>
				CKEDITOR.replace( 'project' );	
			</script>

			<!-- User Profile Update Bio Ck Editor -->
			<script>
				CKEDITOR.replace( 'profile_bio' );	
			</script>

			<!-- User Profile Update Address Ck Editor -->
			<!-- <script>
				CKEDITOR.replace( 'profile_Address' );	
			</script> -->
            <!-- Organiation Job Post CK Editor -->
			<script>
				CKEDITOR.replace( 'post_information' );	
			</script>

			<script>
				CKEDITOR.replace( 'company_info' );	
			</script>
			<script>
				CKEDITOR.replace( 'update_bio' );	
			</script>

			<!-- Rating Prtoduct -->
			<script>

				CKEDITOR.replace( 'rating_pro' );
				// var j = 'Enter Your Reviews About This Products!';
				// CKEDITOR.instances['rating_pro'].setData();
			</script>


			<script>
				lightGallery(document.getElementById('aniimated-thumbnials'), {
					thumbnail:true
				}); 
			</script>


			<script>
				$(function() {
					$('#toggle-two').bootstrapToggle({
						on: 'Enabled',
						off: 'Disabled',
						width: 120,
						height:40
					});
				})
			</script>


			<script>
				$(function(){
					$('#toggle-two').change(function() {

						var value = $(this).prop('checked');

						if(value==true){

							$("#candidate_facebook_social_link").prop('disabled',false);
							$("#candidate_google_social_link").prop('disabled',false);
							$("#candidate_twitter_social_link").prop('disabled',false);
							$("#candidate_linkedin_social_link").prop('disabled',false);
							$("#social_links_update_button").prop("disabled",false);
						}

						else if(value==false){

							$("#candidate_facebook_social_link").prop('disabled',true);
							$("#candidate_google_social_link").prop('disabled',true);
							$("#candidate_twitter_social_link").prop('disabled',true);
							$("#candidate_linkedin_social_link").prop('disabled',true);
							$("#social_links_update_button").prop("disabled",true);


						}

					})
				})
				
			</script>
				
			

			<script>			

				var typed = new Typed('#typed', {
					stringsElement: '#typed-strings',
					typeSpeed: 100,
					showCursor: false,
					startDelay: 500,
					bindInputFocusEvents: true,

				});
			</script>

			<script>
				AOS.init();
			</script>

			<script type="text/javascript">
				$(function() {
					$('#vidBox').VideoPopUp({
						backgroundColor: "#17212a",
						opener: "video1",
						idvideo: "v1",
						pausevideo: false,
					});
				});
			</script>

		<script type="text/javascript">
				$('#map_full_width_one').gmap3({
					map: {
						options: {
							zoom: 5,
							center: [41.785091, -73.968285],
							mapTypeControl: true,
							mapTypeControlOptions: {
								style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
							},
							mapTypeId: "style1",
							mapTypeControlOptions: {
								mapTypeIds: [google.maps.MapTypeId.ROADMAP, "style1"]
							},
							navigationControl: true,
							scrollwheel: false,
							streetViewControl: true
						}
					},
					marker: {
						latLng: [40.785091, -73.968285],
						options: {animation:google.maps.Animation.BOUNCE, icon: 'assets/img/marker.png' }
					},
					styledmaptype: {
						id: "style1",
						options: {
							name: "Style 1"
						},

					}
				});

			</script>




			<script type="text/javascript">


				<?php 

				$id = 	Session::get('id');
				$user_edu=DB::table('add_user_eductions')->where('candidate_id', $id)->get()->count();
				$user_exp=DB::table('add_user_experiences')->where('candidate_id', $id)->get()->count();
				$user_pro=DB::table('add_user_projects')->where('candidate_id', $id)->get()->count();
				$user_skill=DB::table('add_user_skills')->where('candidate_id', $id)->get()->count();
				$user_lanaguage=DB::table('add_user_languages')->where('candidate_id', $id)->get()->count();
				$user_hobbies=DB::table('add_user_hobbies')->where('candidate_id', $id)->get()->count();


				?>	

				var ctx = document.getElementById("piechart");
				var myChart = new Chart(ctx, {
					type: 'pie',
					data: {
						labels: ["Eduction", "Experience", "Project", "Skills", "Languages", "Hobbies"],
						datasets: [{
							data: [{{$user_edu}},{{$user_exp}},{{$user_pro}},{{$user_skill}},{{$user_lanaguage}},{{$user_hobbies}}],
							backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)',
							'rgba(255, 159, 64, 0.2)'
							],
							borderColor: [
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
							],
							borderWidth: 1
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero:true
								}
							}]
						}
					}
				});


				var ctx = document.getElementById("linechart");
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: ["User Resume info"],
						datasets: [{
							label: 'Eduction',
							data: [{{$user_edu}}],
							backgroundColor: [
							'rgba(255, 99, 132, 0.2)'
							],
							borderColor: [
							'rgba(255,99,132,1)'
							],
							borderWidth: 1
						},{
							label: 'Experience',
							data: [{{$user_exp}}],
							backgroundColor: [
							'rgba(54, 162, 235, 0.2)'
							],
							borderColor: [
							'rgba(54, 162, 235, 1)'
							],
							borderWidth: 1
						},{
							label: 'Project',
							data: [{{$user_pro}}],
							backgroundColor: [
							'rgba(255, 206, 86, 0.2)'
							],
							borderColor: [
							'rgba(255, 206, 86, 1)'
							],
							borderWidth: 1
						},{
							label: 'Skills',
							data: [{{$user_skill}}],
							backgroundColor: [
							'rgba(75, 192, 192, 0.2)'
							],
							borderColor: [
							'rgba(75, 192, 192, 1)'
							],
							borderWidth: 1
						},{
							label: 'Languages',
							data: [{{$user_lanaguage}}],
							backgroundColor: [
							'rgba(153, 102, 255, 0.2)'
							],
							borderColor: [
							'rgba(153, 102, 255, 1)'
							],
							borderWidth: 1
						},{
							label: 'Hobbies',
							data: [{{$user_hobbies}}],
							backgroundColor: [
							'rgba(255, 159, 64, 0.2)'
							],
							borderColor: [
							'rgba(255, 159, 64, 1)'
							],
							borderWidth: 1
						}
						]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero:true
								}
							}]
						}
					}
				});


				function strengthMeter() {

					<?php 
					
					$id = 	(Session::get('id') ? Session::get('id') : "0");
					$law_rule = 1;

					$user_edu=DB::table('user_profile_strength')->where([
						['candidate_id','=',[$id]],
						['education_category','=',[$law_rule]],
					])->first();

					$user_exp=DB::table('user_profile_strength')->where([
						['candidate_id','=',[$id]],
						['experience_category','=',[$law_rule]],
					])->first();


					$user_pro=DB::table('user_profile_strength')->where([
						['candidate_id','=',[$id]],
						['project_category','=',[$law_rule]],
					])->first();


					$user_skill=DB::table('user_profile_strength')->where([
						['candidate_id','=',[$id]],
						['skill_category','=',[$law_rule]],
					])->first();



					$user_hobbey=DB::table('user_profile_strength')->where([
						['candidate_id','=',[$id]],
						['hobbies_category','=',[$law_rule]],
					])->first();

					$edu_data = ($user_edu ? $user_edu->education_value : "0");
					$exp_data = ($user_exp ? $user_exp->experience_value : "0");
					$pro_data = ($user_pro ? $user_pro->project_value : "0");
					$sk_data = ($user_skill ? $user_skill->skill_value : "0");
					$hob_data = ($user_hobbey ? $user_hobbey->hobbies_value : "0");


					$total_strength = $edu_data+$exp_data+$pro_data+$sk_data+$hob_data;

					?>

					var chart = bb.generate({
						data: {
							columns: [
							["Profile-Strength-Meter", 91.4]
							],
							type: "gauge",
							onclick: function(d, i) {
								console.log("onclick", d, i);
							},
							onover: function(d, i) {
								console.log("onover", d, i);
							},
							onout: function(d, i) {
								console.log("onout", d, i);
							}
						},
						gauge: {},
						color: {
							pattern: [
							"#FF0000",
							"#F97600",
							"#1FB6FF",
							"#60B044"
							],
							threshold: {
								values: [
								30,
								60,
								80,
								100
								]
							}
						},
						size: {
							height: 180
						},
						bindto: "#GaugeChart"
					});

					setTimeout(function() {
						chart.load({
							columns: [["Profile-Strength-Meter", 10]]
						});
					}, 1000);

					setTimeout(function() {
						chart.load({
							columns: [["Profile-Strength-Meter", 50]]
						});
					}, 2000);

					setTimeout(function() {
						chart.load({
							columns: [["Profile-Strength-Meter", 70]]
						});
					}, 3000);

					setTimeout(function() {
						chart.load({
							columns: [["Profile-Strength-Meter", 2]]
						});
					}, 4000);

					setTimeout(function() {
						chart.load({
							columns: [["Profile-Strength-Meter",{{$total_strength}}]]
						});
					}, 5000);

				}


			</script>

			<?php 

			date_default_timezone_set("Asia/Karachi");
			$timenow = date('Y-m-d');
			$timestamp = strtotime($timenow);
			$total_posts = DB::table('organization_posts')->where('post_status','!=','Block')->where('post_visibility_date','>',$timestamp)->count();
			?>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#styleOptions').styleSwitcher();
					$.protip();
					
					//Add Edcution Field both in resume and in profile 
					$("#Percentage_fields").hide();
					$("#CGPA_fields").hide();


					$("#exp_ref_phone").mask("(0399) 999-9999");
					$("#project_ref_phone").mask("(0399) 999-9999");
					$("#candidate_number").mask("(0399) 999-9999");

					// load All Data Tables
					$('#myEduction').DataTable();
					$('#userProject').DataTable();
					$('#userExperience').DataTable();
					$('#userSkills').DataTable();
					$('#userLanguage').DataTable();
					$('#userHobbies').DataTable();
					$('#company_logo').DataTable();

					// Data Tables Show and Hide
					$("#candidate_eduction").hide();
					$("#candidate_experience").hide();
					$("#candidate_project").hide();
					$("#candidate_skill").hide();
					$("#candidate_languages").hide();
					$("#candidate_hobbies").hide();

					// Chart Show and Hide
					$("#pie_charts").hide();
					$("#line_charts").hide();
					$("#ProfileStrengthMeter").hide();


					$("#candidate_facebook_social_link").prop('disabled', true);
					$("#candidate_google_social_link").prop('disabled', true);
					$("#candidate_twitter_social_link").prop('disabled', true);
					$("#candidate_linkedin_social_link").prop('disabled', true);

					$("#social_links_update_button").prop("disabled",true);
					$("#social_links_update_button").attr("aria-disabled",true);

					

					var options = {
						  useEasing: true, 
						  useGrouping: true, 
						  separator: ',', 
						  decimal: '.', 
						  suffix: '+' 
					};

						var c = new CountUp("counter",0,{{$total_posts}},0,6,options);
						c.start();
				});
			</script>

			@include('client_views.main_site.flash-message')
			@include('client_views.main_site.alerts') 



			<script>
				function openRightMenu() {
					document.getElementById("rightMenu").style.display = "block";
				}

				function closeRightMenu() {
					document.getElementById("rightMenu").style.display = "none";
				}
			</script>
			<script type="text/javascript">
				function logout_all(){
					//alert("yes");
					var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
					var l = window.location;

					var base_url = l.protocol + "//" + l.host + "/logout";
					var pro = l.protocol + "//" + l.host + "/user-profile";
					var mak = l.protocol + "//" + l.host + "/make-user-resume";
                    // alert(mak);
					$.post(base_url,{_token:CSRF_TOKEN},function(data){
						if(data == "yes"){
							// alert(window.location);
							if(window.location == pro || window.location == mak){
							window.location.replace('/');
						}else{
							window.location.replace(window.location);
						}
						}
					 });
				}

				function company_logout(){
					
					var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
					var l = window.location;

					var base_url = l.protocol + "//" + l.host + "/company-logout";
					var pub = l.protocol + "//" + l.host + "/company-public-profile";
					$.post(base_url,{_token:CSRF_TOKEN},function(data){
						if(data == "yes"){
							// alert(window.location);
							if(window.location == "http://careerspoons.com/company-profile" || window.location == pub){
							window.location.replace('/');
						}else{
							window.location.replace(window.location);
						}
						}
					 });
				}
			</script>
			
		</div>





	</body>
	</html>