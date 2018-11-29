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
	<form action="{{url('add-user-resume-info')}}" method="POST">
		{{ csrf_field() }}
		<section class="full-detail">
			<div class="container">
				<div class="row bottom-mrg extra-mrg">
					<h2 class="detail-title">General Information</h2>


					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="text" value="{{Session::get('candidate_name')}}" name="candidate_name" class="form-control" placeholder="User name">
						</div>	
					</div>

					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-envelope"></i></span>
							<input type="text" value="{{Session::get('user_email')}}"  name="candidate_email" disabled="disabled" readonly="readonly" class="form-control" placeholder="Phone Number">
						</div>	
					</div>

					<div class="col-md-12 col-sm-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-envelope"></i></span>
							<input type="text" name="candidate_profession" class="form-control" placeholder="Professional Title">
						</div>
					</div>

					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-phone"></i></span>
							<input type="text" id="candidate_number" name="candidate_number" class="form-control" placeholder="Phone Number">
						</div>	
					</div>

					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-flag"></i></span>
							<select class="form-control input-lg" name="candidate_city">
								<option value="" disabled="disabled" selected="selected" hidden="hidden">Select Region</option>
								<option>Lahore</option>
								<option>Karachi</option>
								<option>Multan</option>
								<option>Peshawar</option>
								<option>Quette</option>
							</select>
						</div>	
					</div>

					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
							<input type="text" name="candidate_location" class="form-control" placeholder="Location: Your Address Full ">
						</div>	
					</div>


					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
							<input type="text" id="dob" name="candidate_dob" data-lang="en" data-large-mode="true" data-min-year="1980" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="">
						</div>	
					</div>


					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-globe"></i></span>
							<input type="text" name="candidate_website" class="form-control" placeholder="Website Address">
						</div>	
					</div>

					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-mars"></i></span>
							<select class="form-control input-lg" name="candidate_gender">
								<option value="" disabled="disabled" selected="selected" hidden="hidden">Select Gender</option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</div>	
					</div>

					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-university"></i></span>
							<select class="form-control input-lg" name="candidate_career_level">
								<option value="" disabled="disabled" selected="selected" hidden="hidden">Select Career Level</option>
								<option>Entry Level</option>
								<option>Intermediate</option>
								<option>Experienced Professional</option>
								<option>Department Head</option>
								<option>Gm / CEO / Country Head</option>
							</select>
						</div>	
					</div>



					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-graduation-cap"></i></span>
							<select class="form-control input-lg" name="candidate_degree_level">
								<option value="" disabled="disabled" selected="selected" hidden="hidden">Select Degree Level</option>
								<option value="1">Non-Matriculation</option>
								<option value="2">Matriculation/O-Level</option>
								<option value="3">Intermediate/A-Level</option>
								<option value="4">Bachelors</option>
								<option value="5">Masters</option>
								<option value="6">MPhil/MS</option>
								<option value="7">PHD/Doctorate</option>
								<option value="8">Certification</option>
								<option value="9">Diploma</option>
								<option value="10">Short Course</option>
							</select>
						</div>	
					</div>
				</div>

				<div class="row bottom-mrg extra-mrg">
					<h2 class="detail-title">Social Profile</h2>

					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-facebook"></i></span>
							<input type="text" name="candidate_facebook_link" class="form-control" placeholder="Profile Link">
						</div>	
					</div>

					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
							<input type="text" name="candidate_google_link" class="form-control" placeholder="Profile Link">
						</div>	
					</div>

					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-twitter"></i></span>
							<input type="text" name="candidate_twitter_link" class="form-control" placeholder="Profile Link">
						</div>	
					</div>


					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
							<input type="text" name="candidate_linkedin" class="form-control" placeholder="Profile Link">
						</div>	
					</div>

				</div>

				<div class="row bottom-mrg extra-mrg">

					<h2 class="detail-title">Resume Content</h2>
					<div class="col-md-12 col-sm-12">
						<textarea name="editor1">Your Details Example (BIO)</textarea>
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


							<!-- <div class="col-md-12 col-sm-12">
								<input type="text" class="form-control" placeholder="School Name, e.g. Master Of Technology">
							</div>

							<div class="col-md-12 col-sm-12">
								<input type="text" class="form-control" placeholder="Qualification, e.g. Master Of Arts">
							</div>
						-->
						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-user-graduate"></i></span>
								<input type="text" id="degree_title" class="form-control" placeholder="Degree Title, e.g. Degree Name">
							</div>	
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-graduation-cap"></i></span>
								<select class="form-control input-lg" id="degree_level">
									<option value="" disabled="disabled" selected="selected" hidden="hidden">Degree Level</option>
									<option>Non-Matriculation</option>
									<option>Matriculation/O-Level</option>
									<option>Intermediate/A-Level</option>
									<option>Bachelors</option>
									<option>Masters</option>
									<option>MPhil/MS</option>
									<option>PHD/Doctorate</option>
									<option>Certification</option>
									<option>Diploma</option>
									<option>Short Course</option>
								</select>
							</div>	
						</div>


						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-university"></i></span>
								<input type="text" id="institute_name" class="form-control" placeholder="Institute Name">
							</div>	
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
								<input type="text" id="institute_location" class="form-control" placeholder="Institute Location: Address Details ">
							</div>	
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon">Date From</span>
								<input type="text" id="edu-start" data-lang="en" data-large-mode="true" data-min-year="1990" data-max-year="2019" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" placeholder="11/25/2018">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon">Date To</span>
								<input type="text" id="edu-end" data-lang="en" data-large-mode="true" data-min-year="1990" data-max-year="2019" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" placeholder="11/25/2018">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-book"></i></span>
								<select class="form-control input-lg" id="majors">
									<option value="" disabled="disabled" selected="selected" hidden="hidden">Majors</option>
									<option>Accounting</option>
									<option>Actuarial Sciences</option>
									<option>Aerospace Engineering</option>
								</select>
							</div>	
						</div>

						<div class="col-md-6 col-sm-6">
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
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-poll"></i></span>
								<input type="text" id="candidate_CGPA" class="form-control" placeholder="Enter CGPA e.g 2.0 , 3.5 etc">
							</div>	
						</div>

						<div class="col-md-12 col-sm-12" id="Percentage_fields">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-poll"></i></span>
								<input type="text" id="candidate_percentage" class="form-control"  placeholder="Enter Percentage e.g 60% , 70%">
							</div>	
						</div>

						<div class="col-md-12 col-sm-12">
							<textarea name="eduction" id="edu_description">Tell Us Something about Your Eduction Experience</textarea>
						</div>

						<button type="reset" class="btn remove-field">Clear</button>
					</div>
				</div>									
				<button type="button" onclick="addEduction(1);" class="add-field">Save & Add More</button>
				<button type="button" onclick="addEduction1(0);" class="add-field">Save</button>
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
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-briefcase"></i></span>
								<input type="text" id="job_title" class="form-control" placeholder="Job Title">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-city"></i></span>
								<input type="text" id="company_name" class="form-control" placeholder="Company Name">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-envelope"></i></span>
								<input type="text" id="ref_email" class="form-control" placeholder="Reference Email">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone"></i></span>
								<input type="text" id="exp_ref_phone" class="form-control" placeholder="Reference Number">
							</div>
						</div>

						<div class="col-md-12 col-sm-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-level-up-alt"></i></span>
								<input type="text" id="your_position" class="form-control" placeholder="Position, e.g. Web Designer">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon">Date From</span>
								<input type="text" id="exp-start" data-lang="en" data-large-mode="true" data-min-year="1990" data-max-year="2019" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" placeholder="11/25/2018">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon">Date To</span>
								<input type="text" id="exp-end" data-lang="en" data-large-mode="true" data-min-year="1990" data-max-year="2019" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" placeholder="11/25/2018">
							</div>
						</div>

						<div class="col-md-12 col-sm-12">
							<textarea name="work_history" id="project_descrption">Describe Your Project</textarea>
						</div>

						<button type="reset" class="btn remove-field">Clear</button>
					</div>
				</div>									
				<button type="button" onclick="addExperience(1);" class="add-field">Save & Add More</button>
				<button type="button" onclick="addExperience1(0)" class="add-field">Save</button>
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
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-project-diagram"></i> </span>
								<input type="text" id="project_title" class="form-control" placeholder="Project Title">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-city"></i></span>
								<input type="text" id="pro_company_name" class="form-control" placeholder="Company Name">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-envelope"></i></span>
								<input type="text" id="project_ref_email" class="form-control" placeholder="Client / Customer Email">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone"></i></span>
								<input type="text" id="project_ref_phone" class="form-control" placeholder="Client / Customer Number">
							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-level-up-alt"></i></span>
								<input type="text" id="your_porject_position" class="form-control" placeholder="Position/Role in Project, e.g. Web Designer, Developer">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon">Date From</span>
								<input type="text" id="pro-start" data-lang="en" data-large-mode="true" data-min-year="1990" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" placeholder="11/25/2018">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon">Date To</span>
								<input type="text" id="pro-end" data-lang="en" data-large-mode="true" data-min-year="1990" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" placeholder="11/25/2018">
							</div>
						</div>

						<div class="col-md-12 col-sm-12">
							<textarea name="project" id="project_des">Description About Project</textarea>
						</div>

						<button type="reset" class="btn remove-field">Clear</button>
					</div>
				</div>									
				<button type="button" onclick="addProject(1)" class="add-field">Save & Add More</button>

				<button type="button" onclick="addProject1(0)" class="add-field">Save</button>
			</div>
		</form>
	</div>

	<div class="row bottom-mrg extra-mrg" id="skill_div">
		<form id="skill_form">
			<h2 class="detail-title">Add Skills</h2>
			<div class="extra-field-box">
				<div class="multi-box">	
					<div class="dublicat-box">

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-poll"></i></span>
								<input type="text" id="skill_name" class="form-control" placeholder="Skills, e.g. Css, Html...">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-percentage"></i></span>
								<input type="text" id="skill_percentage" class="form-control" placeholder="Enter Percentage e.g 60% , 70%">
							</div>
						</div>

						<button type="reset" class="btn remove-field">Clear</button>
					</div>
				</div>									
				<button type="button" class="add-field" onclick="addSkill(1)">Save & Add More</button>
				<button type="button" class="add-field" onclick="addSkill1(0)">Save</button>
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
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-language"></i></span>
								<input type="text" id="user_language" class="form-control" placeholder="Languages, e.g. English Urdu Punjabi etc...">
							</div>
						</div>

						<button type="reset" class="btn remove-field">Clear</button>
					</div>
				</div>									
				<button type="button" onclick="addLanguage(1)"  class="add-field">Save & Add More</button>
				<button type="button" onclick="addLanguage1(0)" class="add-field">Save</button>
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
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-gamepad"></i></span>
								<input type="text" id="user_hobbies" class="form-control" placeholder="Hobbies, e.g. Cricket Football Collection...">
							</div>
						</div>

						<button type="reset" class="btn remove-field">Clear</button>
					</div>
				</div>									
				<button type="button" onclick="addHobbies(1)" class="add-field">Save & Add More</button>
				<button type="button" onclick="addHobbies1(0)" class="add-field">Save</button>
			</div>
		</form>
	</div>					
</div>
</section>
<!-- full detail SetionStart-->	


@endsection