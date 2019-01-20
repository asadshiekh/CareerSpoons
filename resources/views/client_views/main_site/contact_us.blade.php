@extends('client_views.master')
@section('content')

			<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url(public/client_assets/img/banner-10.jpg);">
				<div class="container">
					<h1>Contact Page</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			
			
			<!-- contact form -->
			<br/><br/>
			<section class="contact-form">
				<div class="container">
					<h2>Drop A Mail</h2>
					<br/>
					<form id="contact_us">
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" id="candidate_name" placeholder="Your Name">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<input type="email" class="form-control" id="candidate_email" placeholder="Your Email">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" id="candidate_number" placeholder="Phone Number">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" id="candidate_subject" placeholder="Subject">
					</div>
					
					<div class="col-md-12 col-sm-12">
						<textarea class="form-control" id="candidate_message" placeholder="Message"></textarea>
					</div>
					
					<div class="col-md-12 col-sm-12">
						<button type="button" onclick="contactUs();" class="btn btn-primary">Submit</button>
					</div>
				</form>
					
				</div>
			</section>
			<!-- Contact form End -->
			
		  @endsection