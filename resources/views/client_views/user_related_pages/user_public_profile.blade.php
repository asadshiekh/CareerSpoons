<!doctype html>
<html lang="en">
<head>
	<!-- Basic Page Needs
		================================================== -->
		<title>Job Stock - Responsive Job Portal Bootstrap Template | ThemezHub</title>
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

		<!--Sweet ALerts  Css ================================================== -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
		<!-- Sweet Alert Libery Css -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
		<!-- Pro Tip javaScript -->
		<link rel="stylesheet" href="//gitcdn.link/repo/wintercounter/Protip/master/protip.min.css">

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
							<img src="{{url('public/client_assets/img/logo-white.png')}}" class="logo logo-display" alt="">
							<img src="{{url('public/client_assets/img/logo-white.png')}}" class="logo logo-scrolled" alt="">
						</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="navbar-menu">
						<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
							<li><a href="{{url('all-jobs')}}" ><i class="fa fa-spinner fa-pulse"></i>All Jobs</a></li>
							<li><a href="pricing.html" ><i class="fas fa-city"></i>Companies</a></li>
							<li><a href="pricing.html" ><i class="fas fa-file-signature"></i>Create Resume</a></li>
							@if(Session::has('user_status'))
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fa fa-user"></i>
									Candidate Profile
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<li><a class="dropdown-item" href="{{url('user-profile')}}" style="text-align:left;"><i class="fas fa-sign-out-alt"></i>&nbsp&nbsp&nbsp&nbspYour Profile</a></li>
									<li><a class="dropdown-item" href="{{url('logout')}}" style="text-align:left;"><i class="fas fa-sign-out-alt"></i>&nbsp&nbsp&nbsp&nbspLogout</a></li>
								</ul>
							</li>
							@elseif (Session::has('company_status'))
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fa fa-user"></i>
									Company Profile
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<li><a class="dropdown-item" href="{{url('user-profile')}}" style="text-align:left;"><i class="fas fa-city"></i>&nbsp&nbsp&nbsp&nbspProfile</a></li>
									<li><a class="dropdown-item" href="{{url('company-logout')}}" style="text-align:left;"><i class="fas fa-sign-out-alt"></i>&nbsp&nbsp&nbsp&nbspLogout</a></li>
								</ul>
							</li>

							@else						
							<li class="left-br"><a href="javascript:void(0)"  data-toggle="modal" data-target="#signup" class="signin">Sign In Now</a></li>
							@endif

						</ul>
						<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
							<li class="dropdown megamenu-fw"><a href="#" class="dropdown-toggle" data-toggle="dropdown" >Brows</a>
								<ul class="dropdown-menu megamenu-content" role="menu">
									<li>
										<div class="row">
											<div class="col-menu col-md-3">
												<h6 class="title">Main Pages</h6>
												<div class="content">
													<ul class="menu-col">
														<li><a href="index.html">Home Page 1</a></li>
														<li><a href="index-2.html">Home Page 2</a></li>
														<li><a href="index-3.html">Home Page 3</a></li>
														<li><a href="index-4.html">Home Page 4</a></li>
														<li><a href="index-5.html">Home Page 5</a></li>
														<li><a href="freelancing.html">Freelancing</a></li>
														<li><a href="signin-signup.html">Sign In / Sign Up</a></li>
														<li><a href="search-job.html">Search Job</a></li>
														<li><a href="accordion.html">Accordion</a></li>
														<li><a href="tab.html">Tab Style</a></li>
													</ul>
												</div>
											</div><!-- end col-3 -->
											<div class="col-menu col-md-3">
												<h6 class="title">For Candidate</h6>
												<div class="content">
													<ul class="menu-col">
														<li><a href="browse-jobs.html">Browse Jobs</a></li>
														<li><a href="browse-company.html">Browse Companies</a></li>
														<li><a href="create-resume.html">Create Resume</a></li>
														<li><a href="resume-detail.html">Resume Detail</a></li>
														<li><a href="#">Manage Jobs</a></li>
														<li><a href="job-detail.html">Job Detail</a></li>
														<li><a href="browse-jobs-grid.html">Job In Grid</a></li>
														<li><a href="candidate-profile.html">Candidate Profile</a></li>
														<li><a href="manage-resume-2.html">Manage Resume 2</a></li>
														<li><a href="company-detail.html">Company Detail</a></li>														
													</ul>
												</div>
											</div><!-- end col-3 -->
											<div class="col-menu col-md-3">
												<h6 class="title">For Employer</h6>
												<div class="content">
													<ul class="menu-col">
														<li><a href="create-job.html">Create Job</a></li>
														<li><a href="create-company.html">Create Company</a></li>
														<li><a href="manage-company.html">Manage Company</a></li>
														<li><a href="manage-candidate.html">Manage Candidate</a></li>
														<li><a href="manage-employee.html">Manage Employee</a></li>
														<li><a href="browse-resume.html">Browse Resume</a></li>
														<li><a href="search-new.html">New Search Job</a></li>
														<li><a href="employer-profile.html">Employer Profile</a></li>
														<li><a href="manage-resume.html">Manage Resume</a></li>
														<li><a href="new-job-detail.html">New Job Detail</a></li>
													</ul>
												</div>
											</div>    
											<div class="col-menu col-md-3">
												<h6 class="title">Extra Pages <span class="new-offer">New</span></h6>
												<div class="content">
													<ul class="menu-col">
														<li><a href="freelancer-detail.html">Freelancer detail</a></li>
														<li><a href="job-apply-detail.html">New Apply Job</a></li>
														<li><a href="payment-methode.html">Payment Methode</a></li>
														<li><a href="new-login-signup.html">New LogIn / SignUp</a></li>
														<li><a href="freelancing-jobs.html">Freelancing Jobs</a></li>
														<li><a href="freelancers.html">Freelancers</a></li>
														<li><a href="freelancers-2.html">Freelancers 2</a></li>
														<li><a href="premium-candidate.html">Premium Candidate</a></li>
														<li><a href="premium-candidate-detail.html">Premium Candidate Detail</a></li>
														<li><a href="blog-detail.html">Blog detail</a></li>
													</ul>
												</div>
											</div><!-- end col-3 -->
										</div><!-- end row -->
									</li>
								</ul>
							</li>
							<li><a href="login.html"><i class="fas fa-users"></i>Candidates </a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>   
			</nav>
			<!-- End Navigation -->

			<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<a href="http://careerspoons.com/uploads/client_site/cover_photo/cropped/{{Session::get('cropped_cover_image')}}" target="_blank"><section class="inner-header-title banner" style="background-image:url('uploads/client_site/cover_photo/cropped/{{Session::get('cropped_cover_image')}}');">

				<div class="container" style="margin-bottom: 280px">
					
				</div>

			</section></a>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- Resume Detail Start -->
			<section class="detail-desc">
				<div class="container white-shadow">
					<div class="row mrg-0">
						<div class="detail-pic">

							<div id="image_div">

								<a href="http://careerspoons.com/uploads/client_site/profile_pic/{{Session::get('profile_image')}}" target="_blank">

									<img src="http://careerspoons.com/uploads/client_site/profile_pic/{{Session::get('profile_image')}}" class="img" alt="" />

								</a>
							</div>
							<a type="file" data-toggle="modal" data-target="#uploadUser_profile" class="detail-edit" title="Update Profile"><i class="fas fa-shield-alt"></i></a>

						</div>

						@if(Session::get('email_status')=='1')
						<div class="detail-status" data-aos="flip-up"><span class="protip" data-pt-scheme="leaf" data-pt-gravity="top 0 -15; bottom 0 15" data-pt-title="Candidate is Verify By Email" data-pt-animate="bounceIn">Verified Candidate</span></div>
						@else
						<div class="detail-status"><span class="protip" data-pt-gravity="top 0 -15; bottom 0 15" data-pt-title="Verified Your Email To Became A Verified Candidate" data-pt-animate="shake" style="background-color: red; color: white">Verification Required</span></div>
						@endif

					</div>
					<div class="row bottom-mrg mrg-0">
						<div class="col-md-8 col-sm-8">

							<div class="detail-desc-caption">
								
								<div id="typed-strings">
									<div class="contains_heading" style="font-size: 6px">
										<h4>{{$general_info->candidate_name}}</h4>
										<span class="designation">{{$general_info->	candidate_profession}}</span>
										<p>{{$general_info->candidate_website}}</p>
									</div>
								</div>

								<span id="typed"></span>
								
								
								<br>
							</div>
							<div class="detail-desc-skill">
								@foreach ($get_candidate_skill_just_six as $skill)
								<span>{{$skill->skill_name}}</span>
								@endforeach
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="get-touch pull-right">
								<h4>Get in Touch</h4>
								<ul>
									<li><i class="fa fa-map-marker"></i><span>{{$general_info->candidate_city}}, {{$general_info->candidate_location}}</span></li>
									<li><i class="fa fa-envelope"></i><span>{{Session::get('user_email')}}</span></li>
									
									<li><i class="fas fa-birthday-cake"></i><span>{{$general_info->candidate_dob}} , <b>{{$general_info->candidate_age}}</b> Year Old</span></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row no-padd mrg-0">
						<div class="detail pannel-footer">
							<div class="col-md-5 col-sm-5">
								<ul class="detail-footer-social">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
							<div class="col-md-7 col-sm-7">
								<div class="detail-pannel-footer-btn pull-right">
									<a href="#" class="footer-btn grn-btn" title="">Hire Now</a>
									<a href="#" class="footer-btn blu-btn" title="">Edit</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Resume Detail End -->
			
			<section class="full-detail-description full-detail">
				<div class="container">

					<div class="row row-bottom mrg-0">
						<h2 class="detail-title">About Resume</h2>
						<p>{{$general_info->candidate_resume_details}}</p>
					</div>
					
					<div class="row row-bottom mrg-0">
						<div class="col-xs-12">
							<h2 class="detail-title">Education</h2>
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->

							@foreach ($candidate_education as $edu)
							<div class="media">
								<div class="media-left media-middle">
									<a href="#">
										<img class="media-object" src="{{url('public/client_assets/img/university/university.png')}}" alt="..." style="width:25px; height:25px">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">{{ $edu->Institute_name}}</h4>
									<h5>{{ $edu->degree_level}} , 
										<?php  

										if($edu->selected_result=="CGPA"){

											echo $edu->cgpa." CGPA";
										}

										else{

											echo $edu->percentage." %";
										}

										?>


									</h5>
									<h5 style="color:gray">{{ $edu->edu_start}} - {{ $edu->edu_end}}r</h5>
									{{$edu->edu_description}}
									<h6 style="color:gray">{{$edu->	degree_title}} With the Major in {{$edu->majors}}</h6>
								</div>
							</div>
							<hr>
							@endforeach



						</div>

					</div>
					<div class="row row-bottom mrg-0">
						<h2 class="detail-title">Work Experience</h2>
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->

						@foreach ($candidate_experience as $exp)
						<div class="media">
							<div class="media-left media-middle">
								<a href="#">
									<img class="media-object" src="{{url('public/client_assets/img/university/experience.png')}}" alt="..." style="width:25px; height:25px">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">{{$exp->job_title}} In {{$exp->company_name}}</h4>
								<h5 style="color:gray">{{$exp->exp_start}} - {{ $exp->exp_end}}</h5>
								{{$exp->exp_description}}
								<h6 style="color:gray">Your Postion in Company <b>{{$exp->your_position}}</b></h6>
							</div>
						</div>
						<hr>
						@endforeach

					</div>




					<div class="row row-bottom mrg-0">
						<h2 class="detail-title">Candidate Projects</h2>
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->

						@foreach ($candidate_project as $pro)
						<div class="media">
							<div class="media-left media-middle">
								<a href="#">
									<img class="media-object" src="{{url('public/client_assets/img/university/project.png')}}" alt="..." style="width:25px; height:25px">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">{{$pro->project_title}} In {{$pro->project_company_name}}</h4>
								<h5 style="color:gray">{{$pro->pro_start}} - {{ $pro->pro_end}}</h5>
								{{$pro->project_description}}
								<h6 style="color:gray">Your Postion in Company <b>{{$pro->your_porject_position}}</b></h6>
							</div>
						</div>
						<hr>
						@endforeach

					</div>
					
					<div class="row row-bottom mrg-0">
						<h2 class="detail-title">Skills</h2>
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
						<div class="ext-mrg row third-progress">
							<div class="col-md-12 col-sm-12">
								<div class="panel-body">
									<div class="row">
									@foreach ($candidate_skill as $skill)
									<div class="col-md-6 col-sm-12">
									<h3 class="progressbar-title">{{ $skill->skill_name }}</h3>
									<div class="progress">
										<div class="progress-bar" style="width: {{ $skill->skill_percentage }}%; background: #26a9e1;">
											<span class="progress-icon fa fa-plus" style="border-color:#26a9e1; color:#26a9e1;"></span>
											<div class="progress-value">{{ $skill->skill_percentage }}%</div>
										</div>
									</div>
									</div>
									@endforeach
									</div>
									
								<!-- 	<h3 class="progressbar-title">iPhone Development</h3>
									<div class="progress">
										<div class="progress-bar" style="width: 80%; background: #f6931e;">
											<span class="progress-icon fa fa-plus" style="border-color:#f6931e; color:#f6931e;"></span>
											<div class="progress-value">80%</div>
										</div>
									</div>
									
									<h3 class="progressbar-title">Digital Marketing</h3>
									<div class="progress">
										<div class="progress-bar" style="width: 65%; background: #8bc43f;">
											<span class="progress-icon fa fa-plus" style="border-color:#8bc43f; color:#8bc43f;"></span>
											<div class="progress-value">52%</div>
										</div>
									</div>
									
									<h3 class="progressbar-title">SEO/SMO</h3>
									<div class="progress">
										<div class="progress-bar" style="width: 52%; background: #d20001;">
											<span class="progress-icon fa fa-plus" style="border-color:#d20001; color:#d20001;"></span>
											<div class="progress-value">52%</div>
										</div>
									</div>
									
								</div>
							</div>
							
							<div class="col-sm-6 col-sm-6">
								<div class="panel-body">
									<h3 class="progressbar-title">Apps Development</h3>
									<div class="progress">
										<div class="progress-bar" style="width: 90%; background: #26a9e1;">
											<span class="progress-icon fa fa-plus" style="border-color:#26a9e1; color:#26a9e1;"></span>
											<div class="progress-value">90%</div>
										</div>
									</div>
									
									<h3 class="progressbar-title">iPhone Development</h3>
									<div class="progress">
										<div class="progress-bar" style="width: 80%; background: #f6931e;">
											<span class="progress-icon fa fa-plus" style="border-color:#f6931e; color:#f6931e;"></span>
											<div class="progress-value">80%</div>
										</div>
									</div>
									
									<h3 class="progressbar-title">Digital Marketing</h3>
									<div class="progress">
										<div class="progress-bar" style="width: 65%; background: #8bc43f;">
											<span class="progress-icon fa fa-plus" style="border-color:#8bc43f; color:#8bc43f;"></span>
											<div class="progress-value">52%</div>
										</div>
									</div>
									
									<h3 class="progressbar-title">SEO/SMO</h3>
									<div class="progress">
										<div class="progress-bar" style="width: 52%; background: #d20001;">
											<span class="progress-icon fa fa-plus" style="border-color:#d20001; color:#d20001;"></span>
											<div class="progress-value">52%</div>
										</div>
									</div> -->
									
								</div>
							</div>
						</div>
					</div>



					<div class="row row-bottom mrg-0">
						<h2 class="detail-title">Hobbies And Candidate Languages</h2>



						<div class="col-sm-6">
							<ul class="list-group">
								@foreach ($candidate_hobbies as $hobbies)
								<li class="list-group-item">{{$hobbies->user_hobbies}}</li>
								@endforeach
							</ul>
						</div>
						


						<div class="col-sm-6">

							<ul class="list-group">
								@foreach ($candidate_languages as $languages)
								<li class="list-group-item">{{$languages->user_language}}</li>
								@endforeach
							</ul>
						</div>	



					</div>



					
				</div>
			</section>
			
			<!-- Footer Section Start -->
			<footer class="footer">
				<div class="row lg-menu">
					<div class="container">
						<div class="col-md-4 col-sm-4">
							<img src="{{url('public/client_assets/img/footer-logo.png')}}" class="img-responsive" alt="" /> 
						</div>
						<div class="col-md-8 co-sm-8 pull-right">
							<ul>
								<li><a href="index.html" title="">Home</a></li>
								<li><a href="blog.html" title="">Blog</a></li>
								<li><a href="pricing.html" title="">Pricing</a></li>
								<li><a href="faq.html" title="">FAQ</a></li>
								<li><a href="contact.html" title="">Contact Us</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row no-padding">
					<div class="container">
						<div class="col-md-3 col-sm-12">
							<div class="footer-widget">
								<h3 class="widgettitle widget-title">About Job Stock</h3>
								<div class="textwidget">
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>
									<p>7860 North Park Place<br>
									San Francisco, CA 94120</p>
									<p><strong>Email:</strong> Support@careerdesk</p>
									<p><strong>Call:</strong> <a href="tel:+15555555555">555-555-1234</a></p>
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

						<div class="col-md-3 col-sm-4">
							<div class="footer-widget">
								<h3 class="widgettitle widget-title">Connect Us</h3>
								<div class="textwidget">
									<form class="footer-form">
										<input type="text" class="form-control" placeholder="Your Name"> 
										<input type="text" class="form-control" placeholder="Email">
										<textarea class="form-control" placeholder="Message"></textarea>
										<button type="submit" class="btn btn-primary">Login</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row copyright">
					<div class="container">
						<p>Copyright Job Stock © 2017. All Rights Reserved </p>
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
														<input type="email"  name="email" class="form-control" placeholder="Enter Username" required="" id="user_email">
														<input type="password" name="password" class="form-control"  placeholder="Password" required="" id="user_password">
														<div class="center">
															<button type="button" id="login-btn" class="submit-btn" onclick="user_login()"> Login </button>
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
													<input type="email"  name="email" class="form-control" placeholder="Company Email" required="">
													<input type="password" name="password" class="form-control"  placeholder="Password" required="">
													<div class="center">
														<button type="submit" id="subscribe" class="submit-btn"> Login </button>
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
				<!-- Custom Js for USER Login -->
				<script src="{{url('public/client_assets/js/customization_js/user_login.js')}}"></script>
				<!-- Typed .Js -->
				<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
				<!-- Pro Tip javaScript -->
				<script src="//gitcdn.link/repo/wintercounter/Protip/master/protip.min.js"></script>

				<script>			

					var typed = new Typed('#typed', {
						stringsElement: '#typed-strings',
						typeSpeed: 200,
						showCursor: false,
						startDelay: 800,
						bindInputFocusEvents: true,

					});
				</script>

				<script type="text/javascript">
					$(document).ready(function() {
						$('#styleOptions').styleSwitcher();
						$.protip();
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
		</html>