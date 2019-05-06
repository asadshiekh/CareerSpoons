@extends('client_views.master')
@section('content')


<div class="clearfix"></div>

<!-- Header Title Start -->
<section class="inner-header-title" style="background-image:url('public/client_assets/img/blog/6.png');" >
	<div class="container" style="margin-bottom: 70px">
		<h1 style="margin-bottom:20px">Create Resume</h1>
	</div>
</section>
<div class="clearfix"></div>
<!-- Header Title End -->

<!-- General Detail Start -->
<!-- <div class="section detail-desc">
	<div class="container white-shadow">

		

		<div class="row bottom-mrg">
			<h2 class="detail-title">Profile Information</h2>
				<div class="col-md-6 col-sm-6">
					<div class="input-group">
						<input type="text" name="candidate_name" value="{{Session::get('candidate_name')}}" class="form-control" placeholder="Your Name">
					</div>
				</div>

				<div class="col-md-6 col-sm-6">
					<div class="input-group">
						<input type="email" name="candidate_email" value="{{Session::get('user_email')}}" disabled="disabled" readonly="true" class="form-control" placeholder="Your Email">
					</div>
				</div>

				<div class="col-md-12 col-sm-12">
					<div class="input-group">
						<input type="text" name="candidate_profession" class="form-control" placeholder="Professional Title">
					</div>
				</div>

				<div class="col-md-6 col-sm-6">
					<div class="input-group">
						<select class="form-control input-lg">
							<option>All Categories</option>
							<option>Software</option>
							<option>Hardware</option>
							<option>Machanical</option>
							<option>HR/Manager</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row no-padd">
				<div class="detail pannel-footer">
					<div class="col-md-12 col-sm-12">
						<div class="detail-pannel-footer-btn pull-right">
							<a href="#" class="footer-btn choose-cover">Choose Cover Image</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div> -->
	<!-- General Detail End -->

	<!-- full detail SetionStart-->
	<form id="can_general_form" action="{{url('add-user-resume-info')}}" method="POST">
		{{ csrf_field() }}
		<section class="full-detail">
			<div class="container">
				<div class="row bottom-mrg extra-mrg">
					<h2 class="detail-title">General Information</h2>


					<div class="col-md-6 col-sm-6">
						<span id="can_name_error" style="display: inline;"></span>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="text" value="{{Session::get('candidate_name')}}" name="candidate_name" id="candidate_name" class="form-control" placeholder="User name">
						</div>	
					</div>

					<div class="col-md-6 col-sm-6">
						<span id="" style="display: inline;"></span>
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-envelope"></i></span>
							<input type="text" value="{{Session::get('user_email')}}"  name="candidate_email" disabled="disabled" readonly="readonly" class="form-control" placeholder="Phone Number">
						</div>	
					</div>

					<div class="col-md-12 col-sm-12">
						<span id="can_protitle_error" style="display: inline;"></span>
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-envelope"></i></span>
							<input type="text" name="candidate_profession" id="candidate_profession" class="form-control" placeholder="Professional Title">
						</div>
					</div>


					<div class="col-md-4 col-sm-4">
						<span id="can_addr_error" style="display: inline;"></span>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
							<input type="text" name="candidate_location" id="candidate_location" class="form-control" placeholder="Location: Your Address Full ">
						</div>	
					</div>


					<div class="col-md-4 col-sm-4">
						<span id="can_DOB_error" style="display: inline;"></span>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
							<input type="text" id="candidate_dob" name="candidate_dob" data-lang="en" data-large-mode="true" data-min-year="1980" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="">
						</div>	
					</div>


					<div class="col-md-4 col-sm-4">
						<span id="can_city_error" style="display: inline;"></span>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-flag"></i></span>
							<select class="form-control input-lg" name="candidate_city" id="candidate_city">
								<option value="" selected="selected" hidden="hidden">Select City</option>
								@foreach($get_cities as $get_cities)
								<option value="{{$get_cities->company_city_name}}">{{$get_cities->company_city_name}}</option>
								@endforeach
							</select>
						</div>	
					</div>


					<div class="col-md-6 col-sm-6">
						<span id="can_weblink_error" style="display: inline;"></span>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-globe"></i></span>
							<input type="text" name="candidate_website" id="website_link" class="form-control" placeholder="Website Address">
						</div>	
					</div>

					<div class="col-md-6 col-sm-6">
						<span id="can_gender_error" style="display: inline;"></span>
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-mars"></i></span>
							<select class="form-control input-lg" id="candidate_gender" name="candidate_gender">
								<option value="" selected="selected" hidden="hidden">Select Gender</option>
								<option value="male">Male</option>
								<option value="femaile">Female</option>
							</select>
						</div>	
					</div>

					<div class="col-md-6 col-sm-6">
						<span id="can_career_error" style="display: inline;"></span>
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-university"></i></span>
							<select class="form-control input-lg" name="candidate_career_level"  id="candidate_career_level">
								<option value="" selected="selected" hidden="hidden">Select Career Level</option>
								<option value="Entry Level">Entry Level</option>
								<option value="Intermediate">Intermediate</option>
								<option value="Experienced Professional">Experienced Professional</option>
								<option value="Department Head">Department Head</option>
								<option value="Gm/CEO/Country Head">Gm / CEO / Country Head</option>
							</select>
						</div>	
					</div>



<!-- 					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-graduation-cap"></i></span>
							<select class="form-control input-lg" name="candidate_degree_level">
								<option value="" disabled="disabled" selected="selected" hidden="hidden">Select Degree Level</option>
								@foreach($get_degree as $get_degree)
								<option value="{{$get_degree->degree_title}}">{{$get_degree->degree_title}}</option>
								@endforeach
								
							</select>
						</div>	
					</div> -->


					<div class="col-md-6 col-sm-6">
						<span id="can_qual_error" style="display: inline;"></span>
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-university"></i></span>
							<select class="form-control input-lg" id="candidate_qualification" name="candidate_Qualification">
								<option value="" selected="selected" hidden="hidden">Select Qualification</option>
								@foreach($get_qualification as $value)
								<option value="<?php

								$value->qualification_title= str_replace("_"," ",$value->qualification_title);
								echo $value->qualification_title;

									?>"><?php

								$value->qualification_title= str_replace("_"," ",$value->qualification_title);
								echo $value->qualification_title;

									?>
								</option>
								@endforeach
							</select>
						</div>	
					</div>

					<div class="col-md-12 col-sm-12">
						<span id="can_indus_error" style="display: inline;"></span>
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-university"></i></span>
							<select class="form-control input-lg" name="candidate_Indutries" id="candidate_industries">
								<option value="" selected="selected" hidden="hidden">Select Indutries</option>
								@foreach($get_indutries as $value)
								<option value="<?php 
								
								$value->company_industry_name= str_replace("_"," ",$value->company_industry_name);
								echo $value->company_industry_name;

								?>"><?php 
								
								$value->company_industry_name= str_replace("_"," ",$value->company_industry_name);
								echo $value->company_industry_name;

								?>	
								</option>
								
								@endforeach
							</select>
						</div>	
					</div>



				</div>

				<div class="row bottom-mrg extra-mrg">
					<h2 class="detail-title">Social Profile</h2>

					<div class="col-md-6 col-sm-6">
						<!-- <span id="can_facebook_error" style="display: inline;"></span> -->
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-facebook"></i></span>
							<input type="text" name="candidate_facebook_link" class="form-control" placeholder="Profile Link">
						</div>	
					</div>

					<div class="col-md-6 col-sm-6">
						<!-- <span id="can_google_error" style="display: inline;"></span> -->
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
							<input type="text" name="candidate_google_link" class="form-control" placeholder="Profile Link">
						</div>	
					</div>

					<div class="col-md-6 col-sm-6">
						<!-- <span id="can_twitter_error" style="display: inline;"></span> -->
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-twitter"></i></span>
							<input type="text" name="candidate_twitter_link" class="form-control" placeholder="Profile Link">
						</div>	
					</div>


					<div class="col-md-6 col-sm-6">
						<!-- <span id="can_linkedin_error" style="display: inline;"></span> -->
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
							<input type="text" name="candidate_linkedin" class="form-control" placeholder="Profile Link">
						</div>	
					</div>

				</div>

				<div class="row bottom-mrg extra-mrg">

					<h2 class="detail-title">Resume Content</h2>
					<div class="col-md-12 col-sm-12">
						<span id="can_bio_error" style="display: inline;"></span>
						<textarea name="editor1" id="profile_bio"></textarea>
					</div>	
				</div>

				<div class="row bottom-mrg extra-mrg">
					<div class="col-md-12">
							<button type="submit" class="add-field">Save</button>
					</div>
				</div>
			</form>

			<div class="row bottom-mrg extra-mrg" id="eduction_div">
				<form id="edu_form">
					<h2 class="detail-title">Add Education</h2>
					<div class="extra-field-box">
						<div class="multi-box">	
							<div class="dublicat-box">

						<div class="col-md-6 col-sm-6">
							<span id="degree-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-user-graduate"></i></span>
								<input type="text" id="degree_title" class="form-control" placeholder="Degree Title, e.g. Degree Name">
							</div>	
						</div>

						<div class="col-md-6 col-sm-6">
							<span id="qual-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-graduation-cap"></i></span>
								<select class="form-control input-lg" id="degree_level">
									<option value="" disabled="disabled" selected="selected" hidden="hidden">Degree Level</option>
									@foreach($get_degree1 as $get_degree1)
								<option value="{{$get_degree1->degree_title}}">{{$get_degree1->degree_title}}</option>
								@endforeach
								</select>
							</div>	
						</div>


						<div class="col-md-6 col-sm-6">
							<span id="ins-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-university"></i></span>
								<input type="text" id="institute_name" class="form-control" placeholder="Institute Name">
							</div>	
						</div>
						<div class="col-md-6 col-sm-6">
							<span id="loc-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
								<input type="text" id="institute_location" class="form-control" placeholder="Institute Location: Address Details ">
							</div>	
						</div>

						<div class="col-md-6 col-sm-6">
							<span id="dfrom-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon">Date From</span>
								<input type="text" id="edu-start" data-lang="en" data-large-mode="true" data-min-year="1990" data-max-year="2019" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" placeholder="11/25/2018">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<span id="dateto-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon">Date To</span>
								<input type="text" id="edu-end" data-lang="en" data-large-mode="true" data-min-year="1990" data-max-year="2019" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" placeholder="11/25/2018">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<span id="major-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-book"></i></span>
								<select class="form-control input-lg" id="majors">
									<option value="" disabled="disabled" selected="selected" hidden="hidden">Majors</option>
									@foreach($get_majors as $get_majors)
									<option value="{{$get_majors->major_title}}">{{$get_majors->major_title}}</option>
									@endforeach
								</select>
							</div>	
						</div>

						<div class="col-md-6 col-sm-6">
							<span id="choose-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-poll"></i></span>
								<select class="form-control input-lg" id="edu_result" onchange="change_fields()">
									<option value="" disabled="disabled" selected="selected" hidden="hidden">CGPA / Percentage</option>
									<option>CGPA</option>
									<option>Percentage</option>
								</select>
							</div>	
						</div>

						<div class="col-md-12 col-sm-12" id="CGPA_fields">
							<span id="cgpa-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-poll"></i></span>
								<input type="text" id="candidate_CGPA" class="form-control" placeholder="Enter CGPA e.g 2.0 , 3.5 etc">
							</div>	
						</div>

						<div class="col-md-12 col-sm-12" id="Percentage_fields">
							<span id="per-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-poll"></i></span>
								<input type="text" id="candidate_percentage" class="form-control"  placeholder="Enter Percentage e.g 60% , 70%">
							</div>	
						</div>

						<div class="col-md-12 col-sm-12">
							<span id="edu_deserror" style="display: inline;"></span>
							<textarea name="eduction" id="edu_description">Tell Us Something about Your Eduction Experience</textarea>
						</div>

						<button type="reset" class="btn remove-field">Clear</button>
					</div>
				</div>									
				<button type="button" onclick="main_validation_edu('low');" class="add-field">Save & Add More</button>
				<button type="button" onclick="main_validation_edu('good');" class="add-field">Save</button>
			</div>
		</form>
	</div>

	<div class="row bottom-mrg extra-mrg" id="experience_div">
		<form id="exp_form">
			<h2 class="detail-title">Add Experience</h2>
			<div class="extra-field-box">
				<div class="multi-box">	
					<div class="dublicat-box">
						<div class="col-md-6 col-sm-6">
							<span id="exp_job-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-briefcase"></i></span>
								<input type="text" id="job_title" class="form-control" placeholder="Job Title">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<span id="exp_cname-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-city"></i></span>
								<input type="text" id="company_name" class="form-control" placeholder="Company Name">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<span id="exp_email-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-envelope"></i></span>
								<input type="text" id="ref_email" class="form-control" placeholder="Reference Email">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<span id="exp_no-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone"></i></span>
								<input type="text" id="exp_ref_phone" class="form-control" placeholder="Reference Number">
							</div>
						</div>

						<div class="col-md-12 col-sm-12">
							<span id="exp_pos-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-level-up-alt"></i></span>
								<input type="text" id="your_position" class="form-control" placeholder="Position, e.g. Web Designer">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<span id="exp_datefrom-error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon">Date From</span>
								<input type="text" id="exp-start" data-lang="en" data-large-mode="true" data-min-year="1990" data-max-year="2019" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" placeholder="11/25/2018">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<span id="exp_datetoerror" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon">Date To</span>
								<input type="text" id="exp-end" data-lang="en" data-large-mode="true" data-min-year="1990" data-max-year="2019" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" placeholder="11/25/2018">
							</div>
						</div>

						<div class="col-md-12 col-sm-12">
							<span id="exp_deserror" style="display: inline;"></span>
							<textarea name="work_history" id="project_descrption">Describe Your Project</textarea>
						</div>

						<button type="reset" class="btn remove-field">Clear</button>
					</div>
				</div>									
				<button type="button" onclick="validate_main_exp('good');" class="add-field">Save & Add More</button>
				<button type="button" onclick="validate_main_exp('sad');" class="add-field">Save</button>
			</div>
		</form>
	</div>

	<div class="row bottom-mrg extra-mrg" id="project_div">
		<form id="project_form">
			<h2 class="detail-title">Add Projects</h2>
			<div class="extra-field-box">
				<div class="multi-box">	
					<div class="dublicat-box">

						<div class="col-md-6 col-sm-6">
							<span id="pro_title_error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-project-diagram"></i> </span>
								<input type="text" id="project_title" class="form-control" placeholder="Project Title">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<span id="pro_cname_error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-city"></i></span>
								<input type="text" id="pro_company_name" class="form-control" placeholder="Company Name">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<span id="pro_email_error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-envelope"></i></span>
								<input type="text" id="project_ref_email" class="form-control" placeholder="Client / Customer Email">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<span id="pro_no_error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone"></i></span>
								<input type="text" id="project_ref_phone" class="form-control" placeholder="Client / Customer Number">
							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							<span id="pro_pos_error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-level-up-alt"></i></span>
								<input type="text" id="your_porject_position" class="form-control" placeholder="Position/Role in Project, e.g. Web Designer, Developer">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<span id="pro_datefromerror" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon">Date From</span>
								<input type="text" id="pro-start" data-lang="en" data-large-mode="true" data-min-year="1990" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" placeholder="11/25/2018">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<span id="pro_enderror" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon">Date To</span>
								<input type="text" id="pro-end" data-lang="en" data-large-mode="true" data-min-year="1990" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" placeholder="11/25/2018">
							</div>
						</div>

						<div class="col-md-12 col-sm-12">
							<span id="pro_des_error" style="display: inline;"></span>
							<textarea name="project" id="project_des">Description About Project</textarea>
						</div>

						<button type="reset" class="btn remove-field">Clear</button>
					</div>
				</div>									
				<button type="button" onclick="validate_main_pro('good');" class="add-field">Save & Add More</button>

				<button type="button" onclick="validate_main_pro('sad');" class="add-field">Save</button>
			</div>
		</form>
	</div>

	<div class="row bottom-mrg extra-mrg" id="skill_div">
		<form id="skill_form">
			<h2 class="detail-title">Add Skills</h2>
			<div class="extra-field-box">
				<div class="multi-box">	
					<div class="dublicat-box">
                        <div class="col-sm-12"><span id="skill_name_error" style="display: inline;"></span></div>
						<div class="col-md-6 col-sm-6">
							<!-- <span id="skill_name_error" style="display: inline;"></span> -->
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-poll"></i></span>
								<input type="text" id="skill_name" class="form-control" placeholder="Skills, e.g. Css, Html...">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<!-- <div class="input-group">
								<span class="input-group-addon"><i class="fas fa-percentage"></i></span>
								<input type="text" id="skill_percentage" class="form-control" placeholder="Enter Percentage e.g 60% , 70%">
							</div> -->
							<div class="slidecontainer">
								<input type="range" min="1" max="100" value="50" class="slider" id="skill_percentage">
								<p><b>Value : </b> <span id="demo"></span></p>
							</div>
						</div>

						<button type="reset" class="btn remove-field">Clear</button>
					</div>
				</div>									
				<button type="button" class="add-field" onclick="validate_main_skill('good');">Save & Add More</button>
				<button type="button" class="add-field" onclick="validate_main_skill('sad');">Save</button>
			</div>
		</form>
	</div>

	<div class="row bottom-mrg extra-mrg" id="language_div">
		<form id="language_form">
			<h2 class="detail-title">Add Languages</h2>
			<div class="extra-field-box">
				<div class="multi-box">	
					<div class="dublicat-box">


						<div class="col-md-12 col-sm-12">
							<span id="lang_lname_error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-language"></i></span>
								<input type="text" id="user_language" class="form-control" placeholder="Languages, e.g. English Urdu Punjabi etc...">
							</div>
						</div>

						<button type="reset" class="btn remove-field">Clear</button>
					</div>
				</div>									
				<button type="button" onclick="validate_main_language('good');"  class="add-field">Save & Add More</button>
				<button type="button" onclick="validate_main_language('sad');" class="add-field">Save</button>
			</div>
		</form>
	</div>


	<div class="row bottom-mrg extra-mrg" id="hobbies_div">
		<form id="hobbies_form">
			<h2 class="detail-title">Add Hobbies</h2>
			<div class="extra-field-box">
				<div class="multi-box">	
					<div class="dublicat-box">

						<div class="col-md-12 col-sm-12">
							<span id="hobb_name_error" style="display: inline;"></span>
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-gamepad"></i></span>
								<input type="text" id="user_hobbies" class="form-control" placeholder="Hobbies, e.g. Cricket Football Collection...">
							</div>
						</div>

						<button type="reset" class="btn remove-field">Clear</button>
					</div>
				</div>									
				<button type="button" onclick="validate_main_hobb('good');" class="add-field">Save & Add More</button>
				<button type="button" onclick="validate_main_hobb('sad');" class="add-field">Save</button>
			</div>
		</form>
	</div>					
</div>
</section>
<!-- full detail SetionStart-->	
<style type="text/css">
	

	<style>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}
</style>

</style>

<script>
var slider = document.getElementById("skill_percentage");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>

@endsection