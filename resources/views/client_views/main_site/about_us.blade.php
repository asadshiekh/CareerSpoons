@extends('client_views.master')
@section('content')

			<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url(public/client_assets/img/banner-3.jpg);">
				<div class="container">
					<h1>About Us</h1>
				</div>
			</section>
			<div class="clearfix"></div>




		<section class="how-it-works">
			<div class="container">
				
				<div class="row" data-aos="fade-up">
					<div class="col-md-12">
						<div class="main-heading">
							<p>Working Process</p>
							<h2>How It <span>Works</span></h2>
						</div>
					</div>
				</div>
				
				<div class="row">
				
					<div class="col-md-4 col-sm-4">
						<div class="working-process">
							<span class="process-img">
								<img src="{{url('public/client_assets/img/step-1.png')}}" class="img-responsive" alt="" />
								<span class="process-num">01</span>
							</span>
							<h4>Create An Account</h4>
							<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-4">
						<div class="working-process">
							<span class="process-img">
								<img src="{{url('public/client_assets/img/step-2.png')}}" class="img-responsive" alt="" />
								<span class="process-num">02</span>
							</span>
							<h4>Search Jobs</h4>
							<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-4">
						<div class="working-process">
							<span class="process-img">
								<img src="{{url('public/client_assets/img/step-3.png')}}" class="img-responsive" alt="" />
								<span class="process-num">03</span>
							</span>
							<h4>Save & Apply</h4>
							<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
						</div>
					</div>
					
				</div>
				
			</div>
		</section>
		<div class="clearfix"></div>

		<!-- video section Start -->
		<section class="video-sec dark" id="video" style="background-image:url('public/client_assets/img/banner-5.jpg');">
			<div class="container">
				<div class="row">
					<div class="main-heading">
						<p>Best For Your Projects</p>
						<h2>Watch Our <span>video</span></h2>
					</div>
				</div>
				<!--/row-->
				<div class="video-part">
					<a href="#" data-toggle="modal" data-target="#my-video" class="video-btn"><i class="fa fa-play"></i></a>
				</div>
			</div>
		</section>
		<div class="clearfix"></div>
		<br><br>


			
@endsection