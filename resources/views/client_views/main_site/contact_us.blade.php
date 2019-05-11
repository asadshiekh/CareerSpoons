@extends('client_views.master')
@section('content')

			<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url(public/client_assets/img/banner-7.jpg);">
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
						<label style="display: inline-block;">Your Name</label><span style="display:inline;" id="contact_name_error"></span>
						<input type="text" class="form-control" id="candidate_name" placeholder="Your Name">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<label style="display: inline-block;">Your Email</label><span style="display:inline;" id="contact_email_error"></span>
						<input type="email" class="form-control" id="candidate_email" placeholder="Your Email">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<label style="display: inline-block;">Phone Number</label><span style="display:inline;" id="contact_phone_error"></span>
						<input type="text" class="form-control" id="candidate_number" placeholder="Phone Number">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<label style="display: inline-block;">Subject</label><span style="display:inline;" id="contact_subject_error"></span>
						<input type="text" class="form-control" id="candidate_subject" placeholder="Subject">
					</div>
					
					<div class="col-md-12 col-sm-12">
						<label style="display: inline-block;">Your Message</label><span style="display: inline;" id="contact_msg_error"></span>
						<textarea class="form-control" id="candidate_message" placeholder="Message"></textarea>
					</div>
					
					<div class="col-md-12 col-sm-12">
						<button type="button" onclick="main_contactUs_validation();" class="btn btn-primary">Submit</button>
					</div>
				</form>
					
				</div>
			</section>
			<!-- Contact form End -->
			
		  @endsection