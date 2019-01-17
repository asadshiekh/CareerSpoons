@extends('client_views.master')
@section('content')
<!-- Title Header Start -->
			
			<section class="inner-header-title" style="background-image:url(assets/img/banner-10.jpg);">
				<div class="container">
					<h1>Job Detail</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			<br/>
			<br/>

			
			<!-- Job full detail Start -->
			<section class="full-detail-description full-detail gray-bg">
				<div class="container">
					<!-- Job Description -->
					<div class="col-md-9 col-sm-12">
						<div class="full-card">
						
							<div class="row row-bottom mrg-0">
								<h2 class="detail-title">Job Detail</h2>
								<ul class="job-detail-des">
									<li><span>Salary:</span>$10,000 - $12,000 P.A.</li>
									<li><span>Industry:</span>IT-Software / Software Services</li>
									<li><span>Role Category:</span>Programming & Design</li>
									<li><span>Role:</span>Product Designer</li>
									<li><span>Job Type:</span>Full Time</li>
								</ul>
							</div>
							
							<div class="row row-bottom mrg-0">
								<h2 class="detail-title">Location</h2>
								<ul class="job-detail-des">
									<li><span>Address:</span>SCO 210, Neez Plaza</li>
									<li><span>City:</span>Mohali</li>
									<li><span>State:</span>Punjab</li>
									<li><span>Country:</span>India</li>
									<li><span>Zip:</span>520 548</li>
									<li><span>Telephone:</span>+91 123 456 7854</li>
									<li><span>Fax:</span>(622) 123 456</li>
									<li><span>Email:</span>youremail@gmail.com</li>
								</ul>
							</div>
							
							<div class="row row-bottom mrg-0">
								<h2 class="detail-title">Job Responsibilities</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							</div>
							
							<div class="row row-bottom mrg-0">
							<h2 class="detail-title">Skill Requirement</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<ul class="detail-list">
								<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</li>
								<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
								<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
								<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
								<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
							</ul>
							</div>
							
							<div class="row row-bottom mrg-0">
								<div class="col-sm-12 col-md-12">
								<h2 class="detail-title">Map Location</h2>
								<div id="map_full_width_one" class="full-width" style="height:400px;"></div>
								</div>
							</div>
							
						</div>
					</div>
					<!-- End Job Description -->
					
					<!-- Start Sidebar -->
					<div class="col-md-3 col-sm-12">
						<div class="sidebar right-sidebar">
							<div class="side-widget">
								<h2 class="side-widget-title">Job Alert</h2>
								<div class="job-alert">
									<div class="widget-text">
										<form>
											<input type="text" name="keyword" class="form-control" placeholder="Job Keyword">
											<input type="email" name="email" class="form-control" placeholder="Email ID">
											<button type="submit" class="btn btn-alrt">Add Alert</button>
										</form>
									</div>
								</div>
							</div>
							
							<div class="side-widget">
								<h2 class="side-widget-title">Advertisment</h2>
								<div class="widget-text padd-0">
									<div class="ad-banner">
										<img src="http://via.placeholder.com/320x285" class="img-responsive" alt="">
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<!-- End Sidebar -->
				</div>
			</section>
			<!-- Job full detail End -->

			

			@endsection