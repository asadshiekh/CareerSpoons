@extends('client_views.master')
@section('content')
<div class="clearfix"></div>

<!-- Title Header Start -->
<a href="http://careerspoons.com/uploads/client_site/cover_photo/cropped/{{Session::get('cropped_cover_image')}}" target="_blank"><section class="inner-header-title banner" style="background-image:url('uploads/client_site/cover_photo/cropped/{{Session::get('cropped_cover_image')}}');">

	<div class="container" style="margin-bottom: 100px">
		
	</div>

</section></a>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- Candidate Profile Start -->
<section class="detail-desc advance-detail-pr gray-bg">
	<div class="container white-shadow">

		<div class="row">

			<!-- <div class="pull-left">
				Profile Strength<div id="circle" ></div>
			</div> -->


			<div id="aniimated-thumbnials">
			<div class="detail-pic">

			<div id="image_div">

			<a href="{{url('uploads/client_site/profile_pic')}}/{{Session::get('profile_image')}}" target="_blank">
				
			<img src="{{url('uploads/client_site/profile_pic')}}/{{Session::get('profile_image')}}" class="img" alt="" />
				
			</a>
			</div>
				<a type="file" data-toggle="modal" data-target="#uploadUser_profile" class="detail-edit" title="Update Profile"><i class="fa fa-pencil"></i></a>

			</div>
			</div>


			@if(Session::get('email_status')=='1')
			<div class="detail-status" data-aos="flip-up"><span class="protip" data-pt-scheme="leaf" data-pt-gravity="top 0 -15; bottom 0 15" data-pt-title="Candidate is Verify By Email" data-pt-animate="bounceIn">Verified Candidate</span></div>
			@else
			<div class="detail-status" data-aos="flip-up"><span class="protip" data-pt-gravity="top 0 -15; bottom 0 15" data-pt-title="Verified Your Email To Became A Verified Candidate" data-pt-animate="shake" style="background-color: red; color: white">Verification Required</span></div>
			@endif

		</div>

		<div class="row bottom-mrg">
			<div class="col-md-12 col-sm-12">
				<div class="advance-detail detail-desc-caption">


					<div id="typed-strings">
						<div class="contains_heading" style="font-size: 6px">
							<h4>Welcome {{Session::get('candidate_name')}}</h4>
							<p style="color: limegreen">( 
								<!-- @if(Session::has('candidate_profession'))
								{{Session::get('candidate_profession')}}
								@else
								Your Profession Title
								@endif -->
								<?php 
								$id = 	Session::get('id');
								$users_pro = DB::table('add_user_generals_info')->select('candidate_profession')->where('candidate_id', $id)->first();

								if($users_pro->candidate_profession){

								echo $users_pro->candidate_profession;
								}
								else{
								echo "Your Profression Title";
								}

								?>

							)</p>

						</div>
					</div>

					<span id="typed"></span>


					<ul>
						<li><strong class="j-view">0</strong>Profile Visitor</li>
						<li><strong class="j-applied">0</strong>Job Applied</li>
						<li><strong class="j-shared">0</strong>Invitation</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row no-padd">
			<div class="detail pannel-footer">
				<div class="col-md-5 col-sm-5">
						<!-- 					
					<ul class="detail-footer-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul> -->

					<div class="detail-pannel-footer-btn pull-left"><a href="" class="footer-btn blu-btn" title="" data-toggle="modal" data-target="#uploadcoverphoto">Upload Cover</a>
					</div>
				</div>
				<div class="col-md-7 col-sm-7">
					@if(Session::get('cv_status')==0)
					<div class="detail-pannel-footer-btn pull-right"><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal" class="footer-btn grn-btn" title="">Upload Resume</a><a href="{{url('make-user-resume')}}" class="footer-btn blu-btn" title="">Make Resume</a>
					</div>
					@elseif (Session::get('cv_status')==1)
					<div class="detail-pannel-footer-btn pull-right"><a href="{{url('user-public-profile')}}" class="footer-btn grn-btn" title="">Viewed as Public</a>
					</div>
					<div class="detail-pannel-footer-btn pull-right"><a href="{{url('make-user-resume')}}" class="footer-btn blu-btn" title="">Make Resume</a>
					</div>
					@endif

				</div>
			</div>
		</div>

	</div>
</section>



@if(Session::get('cv_status')==0)
<section class="full-detail-description full-detail gray-bg">
	<div class="container">
		<div class="col-md-12 col-sm-12">
			<div class="full-card">
				<div class="tab-content" style="text-align: center;">
					<div style="border:none;border-radius: 20px; display: inline-block;margin-top:50px">
						<p align="center" style="margin-top:10px;"><i class="fas fa-exclamation-triangle"></i> Upload or Make Your Resume to Manage Your Profile <img height="70" width="60" src="{{url('public/client_assets/img/random/info.gif')}}"></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@elseif (Session::get('cv_status')==1)
<section class="full-detail-description full-detail gray-bg">
	<div class="container">
		<div class="col-md-12 col-sm-12">
			<div class="full-card">
				<div class="deatil-tab-employ tool-tab">

					<ul class="nav nav-tabs" id="simple-design-tab">
						<li class="active"><a  data-toggle="tab" href="#about">Bio</a></li>
						<li><a data-toggle="tab" href="#address">Info</a></li>
						<li><a data-toggle="tab" href="#education_table">Resume-Info</a></li>
						<li><a data-toggle="tab" href="#social_media">Social-Media</a></li>
						<li><a data-toggle="tab" href="#resume_templates">Templates</a></li>
						<li><a data-toggle="tab" href="#job_criteria">Job-Criteria</a></li>
						<li><a data-toggle="tab" href="#matches-job">Matches-Job</a></li>
						<li><a data-toggle="tab" href="#profile_meter" onclick="ref_profile_meter();">Profile-Insight</a></li>
						<li><a data-toggle="tab" href="#rating">Rating</a></li>
						<!-- <li><a data-toggle="tab" href="#friends">Friends</a></li> -->
						<!-- <li><a data-toggle="tab" href="#messages">Messages <span class="info-bar">6</span></a></li> -->
						<li><a data-toggle="tab" href="#applied">Applied Jobs</a></li>
						<li><a data-toggle="tab" href="#settings">Settings</a></li>
					</ul>


					<!-- Start All Sec -->
<div class="tab-content">
	<div id="about" class="tab-pane fade in active">
		<h3>Your Bio </h3>

	<?php 
	 $id = 	Session::get('id');
	$respose = DB::table('add_user_generals_info')->where('candidate_id', $id)->first();
	
	?>	
	<form action="{{url('update_candidate_resume_bio')}}" method="post">
		 {{ csrf_field() }}

		<textarea name="profile_bio" id="profile_bio">{{ $respose->candidate_resume_details}}</textarea>
		
		<div class="col-sm-12">
			<button type="submit" class="update-btn">Update Bio</button>
		</div>
		<br>
	</form>

	</div>


	<div id="rating" class="tab-pane fade">
		<h3>Rate Our Product</h3>
		<?php 

		$id = 	Session::get('id');
		$candidate_reviews = DB::table('candidate_reviews')->where('candidate_id', $id)->first();
		
		if($candidate_reviews->review_description){

		}
		else{

			$candidate_reviews->review_description = "Enter Your Reviews About This Products!";
		}

		?>
		<form action="{{url('')}}" method="post">
			{{ csrf_field() }}
			<br/>
			<div class="col-sm-12">
				<label style="display:block">Rate out of 5</label>
				<div id="rateYo" style="display:inline-block;"></div>
				<div class="counter" style="display:inline-block;"></div>
			</div>

			<div class="col-sm-12">
			<br/>
				<textarea name="rating_pro" id="rating_pro">{{$candidate_reviews->review_description}}</textarea>
			</div>
			<div class="col-sm-12">
				<button type="button" onclick="review();" class="update-btn">Rate Product</button>
			</div>
			<br>
		</form>

	</div>

	<!-- applied start -->
<div id="applied" class="tab-pane fade">
		<h3>Applied Jobs</h3>
		<div id="row">
			<?php if($applied_jobs === 0){?>
             <h4 style="text-align: center;color: red;">No Applied For Job</h4>
			<?php } else{
				?>
			@foreach($applied_jobs as $applied)
			<article class="advance-search-job">
			<div class="row no-mrg">
				<div class="col-md-12 col-sm-12">
		          <div class="manage-resume-box">
		          <div class="col-md-2 col-sm-2">
		          <div class="manage-resume-picbox" style="width: 120px;height: 130px;">
		          <img src="{{url('uploads/organization_images')}}/{{$applied->company_img}}" class="img-responsive" alt="" style="height: 80px;width:170px;" />
		          </div>
		          </div>
		          <div class="col-md-6 col-sm-6">
		          <h5>{{$applied->job_title}} In {{$applied->company_name}}</h5>
		          <span>{{$applied->company_email}}</span>
		          </div>
		          
		          <div class="col-md-2 col-sm-2">
		          	<?php if($applied->message){
                        $candy=Session::get('candidate_name');

		          		?>
		          		<div class="contact-box">
                      <button type="button" onclick="view_msg_notify('{{$applied->message}}','{{$applied->company_name}}','{{$candy}}','{{$applied->company_location}}');" style="background: none;border:none;"><img src="{{url('uploads/client_site/img/bells.gif')}}" style="height: 45px;width: 50px;margin-top: 0px;margin-left: 80%;"></button>
                  </div>
		          	<?php }  ?>
		          </div>
		          <div class="col-md-2 col-sm-2">
		          	<a href="{{url('single-company-profile')}}/{{$applied->company_id}}" class="btn btn-success" style="height:35px;padding-top:6px;width:150px;float: right;">View Company</a>
		          </div>
		          <div class="col-md-12 col-sm-12">
		          	<!-- Contact Page Section Start -->
		          	<div class="row no-mrg">
                        <div class="col-md-12 col-sm-12">
                        <span id="hide{{$applied->id}}" style="display: none;">
						<h5><button type="button" style="background-color: white;border:none;" onclick="hide_cv_status('{{$applied->id}}');"><i class="fa fa-arrow-right"></i>&nbsp;<u>CV Status</u>&nbsp;&nbsp; <i class="fas fa-angle-up"></i></button></h5>
					   </span>
					   <span id="show{{$applied->id}}">
						<h5><button type="button" style="background-color: white;border:none;" onclick="show_cv_status('{{$applied->id}}');"><i class="fa fa-arrow-right"></i>&nbsp;<u>CV Status</u>&nbsp;&nbsp; <i class="fas fa-angle-down"></i></button></h5>
					   </span>
					   </div>
					  
						<div id="status_bar{{$applied->id}}" style="display: none;">
							<div class="col-md-2 col-sm-2">
								<div class="contact-box">
									<i class="fas fa-paper-plane"></i>
									<p>Applied <br/><i class="fa fa-check" style="background: none;display:inline;"></i></p>
								</div>
							</div>							
							<div class="col-md-2 col-sm-2">
								<div class="contact-box">
									<i class="fa fa-eye"></i>
									<p>Viewed <br/>
									<?php if($applied->view_status === "0"){?>
										<i class="far fa-frown-open" style="background: none;display:inline;"></i>
									<?php }else{ ?>
										<i class="fa fa-check" style="background: none;display:inline;"></i>
									<?php } ?>
									</p>
								</div>
							</div>	
							<div class="col-md-2 col-sm-2">
								<div class="contact-box">
									<i class="fas fa-clipboard-list"></i>
									<p>Shortlisted <br/>
										<?php if($applied->shortlisted === "0"){?>
										<i class="far fa-frown-open" style="background: none;display:inline;"></i></p>
										<?php }else{ ?>
										<i class="fa fa-check" style="background: none;display:inline;"></i>
									    <?php } ?>

								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="contact-box">
									<i class="far fa-handshake"></i>
									<p>Interview <br/>
										<?php if($applied->interview_status === "0"){?>
										<i class="far fa-frown-open" style="background: none;display:inline;"></i></p>
										<?php }else{ ?>
										<i class="fa fa-check" style="background: none;display:inline;"></i>
									    <?php } ?>

								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="contact-box">
									<i class="fas fa-check-square"></i>
									<p>Selected <br/>
										<?php if($applied->selected === "0"){?>
										<i class="far fa-frown-open" style="background: none;display:inline;"></i></p>
										<?php }else{ ?>
										<i class="fa fa-check" style="background: none;display:inline;"></i>
									    <?php } ?>

								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="contact-box">
									<i class="fas fa-skull"></i>
									<p>Rejected <br/>
										<?php if($applied->rejected === "0"){?>
										<i class="far fa-frown-open" style="background: none;display:inline;"></i></p>
										<?php }else{ ?>
										<i class="fa fa-check" style="background: none;display:inline;"></i>
									    <?php } ?>

								</div>
							</div>
						</div>

					</div>
		          </div>
		          
		          </div>
		          </div>
		      </div>
		  </article>
		  @endforeach
		  <?php } ?>
		</div>
</div>
	<!-- applied end -->





<div id="job_criteria" class="tab-pane fade">

<div class="row">

<div class="col-md-8 col-sm-6">

<h3>Job Match Criteria </h3>
<form action="{{url('user_job_match_criteria')}}" method="post">
{{ csrf_field() }}
<div class="row no-mrg">
<div class="edit-pro">
<br>	


@foreach ($get_job_match as $val)
<div class="col-md-4 col-sm-6">
<label>Desired Designation</label>
<input type="text" name="candidate_dd"  class="form-control" placeholder="Desired Designation" value="{{$val->desired_designation}}">
</div>

<div class="col-md-4 col-sm-6">
<label>Functional Area</label>
<select class="form-control input-lg" name="candidate_crteria_function_area" id="candidate_functional_area" onchange="candidate_select_major_onchange()">
	
	<option value="" selected="selected" hidden="hidden"><?php if($val->functional_criteria){echo $val->functional_criteria;}else{echo "Select Functional Area";} ?></option>
	@foreach($get_area as $value)
	<option value="{{$value->area_title}}">
		<?php
		
		$value->area_title= str_replace("_"," ",$value->area_title);
		echo $value->area_title;
		?>
	</option>
	@endforeach
</select>
</div>


<div class="col-md-4 col-sm-6">
<label>Select Majors</label>
<select class="form-control input-lg" name="candidate_crteria_major"  id="candidate_majors_area">
	<option value="" disabled="disabled" selected="selected" hidden="hidden"><?php if($val->major_criteria){echo $val->major_criteria;}else{echo "Select Major";} ?></option>
	
</select>
</div>


<!-- <div class="col-md-4 col-sm-6">
<label>Desired Designation</label>
 <input class="form-control input-lg" list="desired_designation" name="candidate_desired_designation" placeholder="Select Desired Designation">
  <datalist id="desired_designation">
    <option value="Internet Explorer">
    <option value="Firefox">
    <option value="Chrome">
    <option value="Opera">
    <option value="Safari">
  </datalist>
</div> -->


<div class="col-md-4 col-sm-6">
<label>Preferred Job City</label>
<select class="form-control input-lg" name="candidate_criteria_city"  id="candidate_criteria_city">
	<option value=""  selected="selected" hidden="hidden"><?php if($val->preferred_city){echo $val->preferred_city;}else{echo "Select Job City";} ?></option>
	@foreach($get_cities as $value)
	<option value="{{$value->company_city_name}}">{{$value->company_city_name}}</option>
	@endforeach
</select>
</div>



<div class="col-md-4 col-sm-6">
<label>Minimum Experience</label>

<input type="number" name="candidate_criteria_Experience" id="candidate_experience_level"  class="form-control" placeholder="Total Experience`" value="{{$val->total_experience}}">


</div>

<div class="col-md-4 col-sm-6">
<label>Minimum Expected Salary</label>
<input type="text" value="{{$val->expected_salary}}" class="form-control" name="candidate_criteria_salary" placeholder="25000">
</div>

<div class="col-md-12 col-sm-6">
<label>Job Type</label>
<select class="form-control input-lg" name="candidate_criteria_job_type" id="candidate_job_type">
	<option value=""  selected="selected" hidden="hidden"><?php if($val->job_type_criteria){echo $val->job_type_criteria;}else{echo "Select Job Type";} ?></option>
	<option value="full time">Full Time</option>
	<option value="part time">Part Time</option>
	<option value="part time">Internship</option>
</select>
</div>

<div class="col-md-12 col-sm-6">
<label style="display:block">Primary Skill</label>
<input type="text" value="<?php if($val->candidate_primary_skill){echo $val->candidate_primary_skill;}else{echo "Enter Skills";} ?>" class="form-control input-lg" multiple data-role="tagsinput" name="candidate_skill_criteria[]" id="skilltags"/>

<!-- $primary_skill = explode(',',$val->candidate_primary_skill);-->

 
</div>
@endforeach



<div class="col-sm-12">
<br>
<button type="submit" class="update-btn">Update Now</button>
</div>
</div>
</div>
</form>	
</div>

<div class="col-md-4 col-sm-6">

<h4 style="text-align: center;font-style:bolder">Your Job Match Criteria </h4>

	<ul class="job-detail-des">
			@foreach ($get_job_match as $value)
			<li><span>D.D:</span>
				{{$value->desired_designation ? $value->desired_designation  : 'Not Set Yet'}}
			</li>
			<li><span>Functional Area:</span>
				{{$value->functional_criteria ? $value->functional_criteria  : 'Not Set Yet'}}
			</li>
			<li><span>Select Majors:</span>
				{{$value->major_criteria ? $value->major_criteria  : 'Not Set Yet' }}
			</li>
			<li><span>Preferred Job City:</span>
				{{$value->preferred_city ? $value->preferred_city  : 'Not Set Yet' }}
			</li>
			<li><span>Total Experience:</span>
				{{$value->total_experience ? $value->total_experience  : 'Not Set Yet' }}</li>
			<li><span>Expected Salary:</span>
				{{$value->expected_salary ? $value->expected_salary  : 'Not Set Yet' }}
			</li>
			<li><span>Job Type:</span>
				{{$value->job_type_criteria ? $value->job_type_criteria  : 'Not Set Yet' }}
			</li>
			<li><span>Primary Skill:</span>
				{{$value->candidate_primary_skill ? $value->candidate_primary_skill  : 'Not Set Yet' }}
			</li>
			@endforeach
		</ul>

</div>

</div> 
<!-- End Row -->

</div>

<!--  -->
<div id="resume_templates" class="tab-pane fade">
<h3>Resume Template</h3>



<div class="row">
  @foreach($templates as $get_templates)
  <div class="col-sm-4 col-md-4">
    <div class="thumbnail">
      <img src="{{url('public/client_assets/css/cv_temp')}}/{{$get_templates->template_folder}}/{{$get_templates->cover_img}}" style="border-radius: 0%;" alt="data">
      <div class="caption">
        <h3 style="text-align: center;margin-top: 0px;">{{$get_templates->temp_title}}</h3>
        <p>{{$get_templates->temp_info}}</p>
        <p> <?php if($get_templates->temp_id == $temp_in->temp_id){ ?>
        	<button class="btn btn-primary" disabled="disabled" style="background-color: red;">Applied</button>
        <?php }else{?>
        	<a href="{{url('applied-resume-theme')}}/{{$get_templates->temp_id}}" class="btn btn-primary" role="button">Apply</a>
        <?php } ?> 
        	<a href="{{url('show-temp-preview')}}/{{$get_templates->temp_id}}" class="btn btn-default" role="button">Preview</a></p>
      </div>
    </div>
  </div>
  @endforeach


</div>

</div>	


	





	<!-- End About Sec -->
	<!-- Start Address Sec -->
	<div id="address" class="tab-pane fade">
		<h3>Gerneral Info</h3>
		<ul class="job-detail-des">
			@foreach ($general_info as $user_general_info)
			<li><span>Full-Name:</span>{{$user_general_info->candidate_name}}</li>
			<li><span>Professional-Title:</span>{{$user_general_info->candidate_profession}}</li>
			<li><span>Region:</span>{{$user_general_info->candidate_city}}</li>
			<li><span>DOB:</span>{{$user_general_info->candidate_dob}}</li>
			<li><span>Gender:</span>{{$user_general_info->candidate_gender}}</li>
			<li><span>Web-Address:</span>{{$user_general_info->candidate_website}}</li>
			<li><span>Career-Level:</span>{{$user_general_info->candidate_career_level}}</li>
			<li><span>Candidate-Qualification:</span>{{$user_general_info->candidate_qualification}}</li>
			<li><span>Candidate-Industries:</span><?php

			$user_general_info->candidate_industries= str_replace("_"," ",$user_general_info->candidate_industries);
			echo $user_general_info->candidate_industries;
				
				?>
			</li>
			<li><span>Your Address:</span>{{$user_general_info->candidate_location}}</li>
			@endforeach
		</ul>
		<br/>
		<div class="col-sm-12">
			<a href="#UpdatePerionalInfo" data-toggle="modal"><button type="button" class="update-btn">Edit Info</button></a>
		</div>
		<br/>
	</div>
	<!-- End Address Sec -->
<!-- Start Address Sec -->
<div id="profile_meter" class="tab-pane fade">
	<div class="row">
		
		<div class="col-md-12 col-sm-12">
			<div class="input-group">
				<span class="input-group-addon"><i class="fas fa-list-ul"></i></span>
				<select class="form-control input-lg" name="user_category" onchange="change_candidate_charts_view()" id="candidate_chart_view">
					<option value="" disabled="disabled" selected="selected" hidden="hidden">Select Category</option>
					<option value="" disabled="disabled" selected="selected" hidden="hidden">Choose the Chart Type</option>
					<option>Bar</option>
					<option>Pie</option>
					<option>Profile-Strength-Meter</option>
				</select>
			</div>
			<br>
			<div class="pie_charts" id="pie_charts">
				<canvas id="piechart" style="height:40vh; width:60vw"></canvas>
				<p style="margin-top: 20px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore .</p>
			</div>
			<div class="line_charts" id="line_charts">
				<canvas id="linechart" style="height:40vh; width:60vw"></canvas>
				<p style="margin-top: 20px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore .</p>
			</div>
			<div class="ProfileStrengthMeter" id="ProfileStrengthMeter">
				<div id="GaugeChart"></div>
				<br/>
				<p style="margin-top: 20px;">Welcome, <b>{{Session::get('candidate_name')}}</b> to your Profile Strength Meter. It is Special Design for the Candidate to check how Healthy is your Profile. It will Check your profile as well as your Resume that how much it is Complete.</p>

			<div class="user-info">
				
			<div class="media">
				<span class="badge bg-danger">BAD</span>
				<div class="media-body">
					Between <b>1%</b> to <b>29%</b> Your Profile Will Rate as Bad and Your Profile Strenght Meter Will Tell You About By Showing You <b style="color: red">Red</b> Color...
				</div>
			</div>

			<div class="media">
				<span class="badge bg-warning">OK</span>
				<div class="media-body">
					Between <b>31%</b> to <b>60%</b> Your Profile Will Rate as Ok or fine and Your Profile Strenght Meter Will Tell You About By Showing You <b style="color:#F97600">GOLD</b> Color...
					
				</div>
			</div>

			<div class="media">
				<span class="badge bg-primary">GOOD</span>
				<div class="media-body">
					Between <b>61%</b> to <b>80%</b> Your Profile Will Rate as GOOD or Keep it Up and Your Profile Strenght Meter Will Tell You About By Showing You <b style="color: #1FB6FF">Light Blue</b> Color...
					
				</div>
			</div>

			<div class="media">
				<span class="badge bg-success">EXCELLENT</span>
				<div class="media-body">
					Between <b>81%</b> to <b>100%</b> Your Profile Will Rate as EXCELLENT and Your Profile Strenght Meter Will Tell You About By Showing You <b style="color: #60B044">Green</b> Color...
				</div>
			</div>

			</div>

			</div>
		</div>
	</div>
</div>




<div id="social_media" class="tab-pane fade">
<div class="row no-mrg">
<div class="col-md-6">	
<h3>Manage Social Links</h3>
</div>
<div class="col-md-2  col-md-offset-4">	
<input type="checkbox" id="toggle-two" data-onstyle="success" data-offstyle="danger">
</div>
<br>
<form action="update-social-links" method="post">
{{ csrf_field() }}
<div class="edit-pro">
<div class="col-md-6 col-sm-12">
<label>Facebook</label>
<input type="text" class="form-control" name="candidate_facebook_link" value="{{$social_link->candidate_fackbook}}" id="candidate_facebook_social_link" placeholder="Facebook Social Link">
</div>
<div class="col-md-6 col-sm-12">
<label>Google</label>
<input type="text" class="form-control" name="candidate_google_link" value="{{$social_link->candidate_google}}" id="candidate_google_social_link" placeholder="Google Plus Social Link">
</div>
<div class="col-md-6 col-sm-12">
<label>Twitter</label>
<input type="text" class="form-control" name="candidate_twitter_link" value="{{$social_link->candidate_twitter}}" id="candidate_twitter_social_link" placeholder="Twitter Social Link">
</div>
<div class="col-md-6 col-sm-12">
<label>Linkedin</label>
<input type="text" class="form-control" name="candidate_linkedin" value="{{$social_link->candidate_linkedin}}" id="candidate_linkedin_social_link"  placeholder="Linkedin Social Link">
</div>
<div class="col-sm-12">
<br>
<!-- <input type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled">
 -->
<button type="submit" id="social_links_update_button" class="update-btn">Update Now</button>


</div>
</div>
</form>
</div>


</div>

















<!-- End Address Sec -->
<div id="education_table" class="tab-pane fade">
	<h3 style="margin-bottom: 15px">Candidate-Resume</h3>
	
	<div class="input-group">
		<span class="input-group-addon"><i class="fas fa-list-ul"></i></span>
		<select class="form-control input-lg" name="user_category" onchange="change_category()" id="user_category">
			<option value="" disabled="disabled" selected="selected" hidden="hidden">Select Category</option>
			<option>Eduction</option>
			<option>Experience</option>
			<option>Project</option>
			<option>Skills</option>
			<option>Languages</option>
			<option>Hobbies</option>
		</select>
	</div>
<div class="candidate_eduction" id="candidate_eduction">
	<h3>Eduction-Info</h3>
	<br>
	<table id="myEduction" class="display responsive no-wrap" style="width:100%"> 
		<thead>
			<tr>
				<th>Degree Title</th>
				<th>Degree Level</th>
				<th>Institute Name</th>
				<th>Institute Location</th>
				<th>Majors</th>
				<th>Action</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach ($candidate_education as $edu)
			<tr id="edu_unique_row{{ $edu->id }}">
				<td id="unique_edu_degree_title{{ $edu->id }}">{{ $edu->degree_title }}</td>
				<td id="unique_edu_degree_level{{ $edu->id }}">{{ $edu->degree_level }}</td>
				<td id="unique_edu_institute_name{{ $edu->id }}">{{ $edu->Institute_name}}</td>
				<td id="unique_edu_location_name{{ $edu->id }}">{{ $edu->institute_location}}</td>
				<td id="unique_edu_majors{{ $edu->id }}"><?php
					
					$edu->majors = str_replace("_"," ",$edu->majors);
					echo $edu->majors 
				?></td>
				<td id="unique_edu_action{{ $edu->id }}"><a href="#DemoModal2" data-toggle="modal" onclick='viewed_edu("<?php echo $edu->degree_title ?>","<?php echo $edu->degree_level?>","<?php echo $edu->Institute_name ?>","<?php echo $edu->institute_location?>","<?php echo $edu->edu_start?>","<?php echo $edu->edu_end?>","<?php echo $edu->majors?>","<?php echo $edu->cgpa?>","<?php echo $edu->percentage?>","<?php echo $edu->edu_description?>");' ><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Eduction" data-pt-animate="flipInX"><i class="far fa-eye"></i></span></a> | <a onclick='update_edu("<?php echo $edu->id ?>","<?php echo $edu->selected_result ?>");'><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Eduction" data-pt-animate="flipInX"><i class="fas fa-edit"></i></span></a> | <a onclick="delete_edu(<?php echo $edu->id ?>)"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Eduction" data-pt-animate="flipInX"> <i class="fas fa-trash-alt"></i></span></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<br/>
	<div class="detail-pannel-footer-btn pull-left"><a href="#AddEductionModelWindow" data-toggle="modal" class="footer-btn blu-btn" title=""><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -15; bottom 0 -15" data-pt-title="Add Another Eduction" data-pt-animate="flipInX">Add Eduction</span></a></div>
	<br>
	<br>
	<hr>
</div>

<div class="candidate_experience" id="candidate_experience">
	<h3>Experenice-Info</h3>
	<br/>
	<table id="userExperience" class="display responsive no-wrap" style="width:100%">
		<thead>
			<tr>
				<th>Job Title</th>
				<th>Company Name</th>
				<th>Your Position</th>
				<th>Ref Email</th>
				<th>Ref Phone</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($candidate_experience as $exp)
			<tr id="exp_unique_row{{$exp->id}}">

				<td>{{ $exp->job_title }}</td>
				<td>{{ $exp->company_name }}</td>
				<td>{{ $exp->your_position}}</td>
				<td>{{ $exp->ref_email}}</td>
				<td>{{ $exp->ref_phone }}</td>
				<td><a href="#ExperienceViewed" data-toggle="modal" onclick='viewed_exp("<?php echo $exp->job_title ?>","<?php echo $exp->company_name?>","<?php echo $exp->ref_email ?>","<?php echo $exp->ref_phone?>","<?php echo $exp->your_position?>","<?php echo $exp->exp_start?>","<?php echo $exp->exp_end?>","<?php echo $exp->exp_description?>");' ><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Experience" data-pt-animate="flipInX"><i class="far fa-eye"></i></span></a> |<a onclick='update_exp("<?php echo $exp->id ?>");'><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Experience" data-pt-animate="flipInX"> <i class="fas fa-edit"></i></span></a> | <a onclick="delete_exp(<?php echo $exp->id ?>)"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Experience" data-pt-animate="flipInX"> <i class="fas fa-trash-alt"></i></span></a></td>

			</tr>
			@endforeach
		</tbody>
	</table>
		<br/>
	<div class="detail-pannel-footer-btn pull-left"><a href="#AddExperience" data-toggle="modal" class="footer-btn blu-btn" title=""><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -15; bottom 0 -15" data-pt-title="Add Another Experience" data-pt-animate="flipInX">Add Experience</span></a></div>
	<br>
	<br>
	<hr>
</div>

<div class="candidate_project" id="candidate_project">
	<h3>Project Info</h3>
	<br/>
	<table id="userProject" class="display responsive no-wrap" style="width:100%">
		<thead>
			<tr>
				<th>Project Title</th>
				<th>Project Company Name</th>
				<th>Project Ref Email</th>
				<th>Project Ref Phone</th>
				<th>Your Porject Position</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($candidate_project as $candidate_project)
			<tr id="pro_unique_row{{$candidate_project->id}}">
				
				<td>{{ $candidate_project->project_title }}</td>
				<td>{{ $candidate_project->project_company_name }}</td>
				<td>{{ $candidate_project->project_ref_email}}</td>
				<td>{{ $candidate_project->project_ref_phone }}</td>
				<td>{{ $candidate_project->your_porject_position }}</td>
				<td><a href="#ProjectViewed" data-toggle="modal" onclick='viewed_project("<?php echo $candidate_project->project_title ?>","<?php echo $candidate_project->project_company_name ?>","<?php echo $candidate_project->project_ref_email ?>","<?php echo $candidate_project->project_ref_phone ?>","<?php echo $candidate_project->your_porject_position ?>","<?php echo $candidate_project->pro_start ?>","<?php echo $candidate_project->pro_end ?>","<?php echo $candidate_project->project_description ?>");' ><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Project" data-pt-animate="flipInX"><i class="far fa-eye"></i></span></a> | <a onclick='update_pro(<?php echo $candidate_project->id ?>);'><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Project" data-pt-animate="flipInX"> <i class="fas fa-edit"></i></span></a> | <a onclick="delete_pro(<?php echo $candidate_project->id ?>)"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Project" data-pt-animate="flipInX"> <i class="fas fa-trash-alt"></i></span></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<br/>
	<div class="detail-pannel-footer-btn pull-left"><a href="#AddProject" data-toggle="modal" class="footer-btn blu-btn" title=""><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -15; bottom 0 -15" data-pt-title="Add Another Project" data-pt-animate="flipInX">Add Project</span></a></div>
	<br>
	<br>
	<hr>
</div>
<div class="candidate_skill" id="candidate_skill">
	<h3>Your Skills</h3>
	<br/>
	<table id="userSkills" class="display responsive no-wrap" style="width:100%">
		<thead>
			<tr>
				<th style="text-align: center;">Skill Name</th>
				<th style="text-align: center;">Skill Percentage</th>
				<th style="text-align: center;">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($candidate_skill as $skill)
			<tr id="skill_unique_row{{$skill->id}}" style="text-align: center;">
				
				<td>{{ $skill->skill_name }}</td>
				<td>{{ $skill->skill_percentage }}</td>
				<td><a href="#SkillViewed" data-toggle="modal" onclick='viewed_skill("<?php echo $skill->skill_name ?>","<?php echo $skill->skill_percentage ?>");' ><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Skill" data-pt-animate="flipInX"><i class="far fa-eye"></i></span></a> | <a onclick='update_sk(<?php echo $skill->id ?>);'><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Skill" data-pt-animate="flipInX"> <i class="fas fa-edit"></i></span></a> |<a onclick="dele_skill(<?php echo $skill->id ?>)"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Skill" data-pt-animate="flipInX"> <i class="fas fa-trash-alt"></i></span></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<br/>
	<div class="detail-pannel-footer-btn pull-left"><a href="#AddSkill" data-toggle="modal" class="footer-btn blu-btn" title=""><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -15; bottom 0 -15" data-pt-title="Add Another Skill" data-pt-animate="flipInX">Add Skill</span></a></div>
	<br>
	<br>
	<hr>
</div>

<div class="candidate_languages" id="candidate_languages">
	<h3>Your Languages</h3>
	<br/>
	<table id="userLanguage" class="display responsive no-wrap" style="width:100%">
		<thead>
			<tr>
				<th style="text-align: center;">User Language</th>
				<th style="text-align: center;">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($candidate_languages as $languages)
			<tr id="languages_unique_row{{$languages->id}}" style="text-align: center;">
				
				<td>{{ $languages->user_language }}</td>
				<td><a href="#Viewlanguages" data-toggle="modal" onclick='viewed_language("<?php echo $languages->user_language ?>");' ><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Languages" data-pt-animate="flipInX"><i class="far fa-eye"></i></span></a> | <a onclick='update_lang(<?php echo $languages->id ?>);'><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Language" data-pt-animate="flipInX"> <i class="fas fa-edit"></i></span></a> |<a onclick="dele_language(<?php echo $languages->id ?>)"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Language" data-pt-animate="flipInX"> <i class="fas fa-trash-alt"></i></span></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<br/>
	<div class="detail-pannel-footer-btn pull-left"><a href="#Addlanguage" data-toggle="modal" class="footer-btn blu-btn" title=""><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -15; bottom 0 -15" data-pt-title="Add Another Languages" data-pt-animate="flipInX">Add Languages</span></a></div>
	<br>
	<br>
	<hr>
</div>
<div class="candidate_hobbies" id="candidate_hobbies">
	<h3>Your Hobbies</h3>
	<br/>
	<table id="userHobbies" class="display responsive no-wrap" style="width:100%">
		<thead>
			<tr>
				<th style="text-align: center;">Hobbies</th>
				<th style="text-align: center;">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($candidate_hobbies as $hobbies)
			<tr id="hobbey_unique_row{{$hobbies->id}}" style="text-align: center;">
				
				<td>{{ $hobbies->user_hobbies }}</td>
				<td><a href="#ViewHobbies" data-toggle="modal" onclick='viewed_hobbies("<?php echo $hobbies->user_hobbies ?>");' ><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Hobbies" data-pt-animate="flipInX"><i class="far fa-eye"></i></span></a> | <a onclick='update_hobb(<?php echo $hobbies->id ?>);'><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Hobbey" data-pt-animate="flipInX"> <i class="fas fa-edit"></i></span></a> | <a onclick="dele_hobbey(<?php echo $hobbies->id ?>)"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Hobbey" data-pt-animate="flipInX"> <i class="fas fa-trash-alt"></i></span></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<br/>
	<div class="detail-pannel-footer-btn pull-left"><a href="#AddHobbey" data-toggle="modal" class="footer-btn blu-btn" title=""><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -15; bottom 0 -15" data-pt-title="Add Another Hobbey" data-pt-animate="flipInX">Add Hobbey</span></a></div>
	<br>
	<br>
	<hr>
</div>
</div>
<!-- End Address Sec -->

<!-- Start Job List -->
<div id="matches-job" class="tab-pane fade">
	<h3>Matches-job 122 new job</h3>




	<div class="row">
		<?php if($get_match_use_jobs === 0){ ?>
         <h4 style="text-align: center;color: red;"> No Match jobs found</h4>
		<?php }else{ ?>
		@foreach($get_match_use_jobs as $match)
		<article class="advance-search-job">
			<div class="row no-mrg">
				<div class="col-md-6 col-sm-6">
					<a href="new-job-detail.html" title="job Detail">
						<div class="advance-search-img-box"><img src="{{url('uploads/organization_images')}}/{{$match->company_img}}" class="img-responsive" alt=""></div>
					</a>
					<div class="advance-search-caption"><a href="new-job-detail.html" title="Job Dtail"><h4>{{$match->job_title}}</h4></a><span>{{$match->company_name}}</span></div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="advance-search-job-locat">
						<p><i class="fa fa-map-marker"></i>{{$match->company_location}}</p>
					</div>
				</div>
				<div class="col-md-2 col-sm-2"><a href="{{url('job-details')}}/{{$match->post_id}}" class="btn advance-search" title="view">View</a></div>
			</div>
		</article>
		@endforeach
	<?php }?>
			
	</div>

	<!-- <div class="row">
		<ul class="pagination">
			<li><a href="#">«</a></li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li>
			<li><a href="#">»</a></li>
		</ul>
	</div> -->
</div>
<!-- End Job List -->




<!-- Start Friend List -->
<div id="friends" class="tab-pane fade">
	<div class="row">
		<div class="col-md-4 col-sm-4">
			<div class="manage-cndt">
				<div class="cndt-status pending">Pending</div>
				<div class="cndt-caption">
					<div class="cndt-pic"><img src="{{url('public/client_assets/img/can-1.png')}}" class="img-responsive" alt=""></div>
					<h4>Charles Hopman</h4><span>Web designer</span>
					<p>Our analysis team at Megriosft use end to end innovation proces</p>
					</div><a href="#" title="" class="cndt-profile-btn">View Profile</a></div>
				</div>
<div class="col-md-4 col-sm-4">
	<div class="manage-cndt">
		<div class="cndt-status available">Available</div>
		<div class="cndt-caption">
			<div class="cndt-pic"><img src="{{url('public/client_assets/img/can-2.png')}}" class="img-responsive" alt=""></div>
			<h4>Ethan Marion</h4><span>IOS designer</span>
			<p>Our analysis team at Megriosft use end to end innovation proces</p>
			</div><a href="#" title="" class="cndt-profile-btn">View Profile</a></div>
		</div>
<div class="col-md-4 col-sm-4">
	<div class="manage-cndt">
		<div class="cndt-status pending">Pending</div>
		<div class="cndt-caption">
			<div class="cndt-pic"><img src="{{url('public/client_assets/img/can-3.png')}}" class="img-responsive" alt=""></div>
			<h4>Zara Clow</h4><span>UI/UX designer</span>
			<p>Our analysis team at Megriosft use end to end innovation proces</p>
			</div><a href="#" title="" class="cndt-profile-btn">View Profile</a></div>
		</div>
<div class="col-md-4 col-sm-4">
	<div class="manage-cndt">
		<div class="cndt-status pending">Pending</div>
		<div class="cndt-caption">
			<div class="cndt-pic"><img src="{{url('public/client_assets/img/can-4.png')}}" class="img-responsive" alt=""></div>
			<h4>Henry Crooks</h4><span>PHP Developer</span>
			<p>Our analysis team at Megriosft use end to end innovation proces</p>
			</div><a href="#" title="" class="cndt-profile-btn">View Profile</a></div>
		</div>
		<div class="col-md-4 col-sm-4">
			<div class="manage-cndt">
				<div class="cndt-status available">Available</div>
				<div class="cndt-caption">
					<div class="cndt-pic"><img src="{{url('public/client_assets/img/can-2.png')}}" class="img-responsive" alt=""></div>
					<h4>Joseph Macfarlan</h4><span>App Developer</span>
					<p>Our analysis team at Megriosft use end to end innovation proces</p>
					</div><a href="#" title="" class="cndt-profile-btn">View Profile</a></div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="manage-cndt">
						<div class="cndt-status pending">Pending</div>
						<div class="cndt-caption">
							<div class="cndt-pic"><img src="{{url('public/client_assets/img/can-1.png')}}" class="img-responsive" alt=""></div>
							<h4>Zane Joyner</h4><span>Html Expert</span>
							<p>Our analysis team at Megriosft use end to end innovation proces</p>
							</div><a href="#" title="" class="cndt-profile-btn">View Profile</a></div>
						</div>

<div class="col-md-4 col-sm-4">
	<div class="manage-cndt">
		<div class="cndt-status pending">Pending</div>
		<div class="cndt-caption">
			<div class="cndt-pic"><img src="{{url('public/client_assets/img/can-3.png')}}" class="img-responsive" alt=""></div>
			<h4>Anna Hoysted</h4><span>UI/UX Designer</span>
			<p>Our analysis team at Megriosft use end to end innovation proces</p>
			</div><a href="#" title="" class="cndt-profile-btn">View Profile</a></div>
		</div>
		<div class="col-md-4 col-sm-4">
			<div class="manage-cndt">
				<div class="cndt-status available">Available</div>
				<div class="cndt-caption">
					<div class="cndt-pic"><img src="{{url('public/client_assets/img/can-4.png')}}" class="img-responsive" alt=""></div>
					<h4>Spencer Birdseye</h4><span>SEO Expert</span>
					<p>Our analysis team at Megriosft use end to end innovation proces</p>
					</div><a href="#" title="" class="cndt-profile-btn">View Profile</a></div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="manage-cndt">
						<div class="cndt-status pending">Pending</div>
						<div class="cndt-caption">
							<div class="cndt-pic"><img src="{{url('public/client_assets/img/can-1.png')}}" class="img-responsive" alt=""></div>
							<h4>Eden Macaulay</h4><span>Web designer</span>
							<p>Our analysis team at Megriosft use end to end innovation proces</p>
							</div><a href="#" title="" class="cndt-profile-btn">View Profile</a></div>
						</div>
					</div>
					<div class="row">
						<ul class="pagination">
							<li><a href="#">«</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li>
							<li><a href="#">»</a></li>
						</ul>
					</div>
				</div>
				<!-- End Friend List -->

<!-- Start Message -->
<div id="messages" class="tab-pane fade">
	<div class="inbox-body inbox-widget">
		<div class="mail-card">
			<header class="card-header cursor-pointer collapsed" data-toggle="collapse" data-target="#full-message" aria-expanded="false">
				<div class="card-title flexbox">
					<img class="img-responsive img-circle avatar" src="{{url('public/client_assets/img/can-1.png')}}" alt="...">
					<div>
						<h6>Daniel Duke</h6>
						<small>Today at 07:34 AM</small>
						<small><a class="text-info collapsed" href="#detail-view" data-toggle="collapse" aria-expanded="false">View Detail</a></small>
						<div class="no-collapsing cursor-text collapse" id="detail-view" aria-expanded="false" style="height: 0px;">
							<small class="d-inline-block">From:</small>
							<small>theadmin@thetheme.io</small>
							<br>
							<small class="d-inline-block">To:</small>
							<small>subscriber@yahoo.com</small>
						</div>
					</div>
				</div>
			</header>
			<div class="collapse" id="full-message" aria-expanded="false" style="height: 0px;">
				<div class="card-body">
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
				</div>
			</div>
		</div>
		<div class="mail-card unread">
			<header class="card-header cursor-pointer collapsed" data-toggle="collapse" data-target="#meaages-2" aria-expanded="false">
				<div class="card-title flexbox">
					<img class="img-responsive img-circle avatar" src="{{url('public/client_assets/img/can-2.png')}}" alt="...">
					<div>
						<h6>Daniel Duke</h6>
						<small>Today at 07:34 AM</small>
						<small><a class="text-info collapsed" href="#detail-view1" data-toggle="collapse" aria-expanded="false">View Detail</a></small>
						<div class="no-collapsing cursor-text collapse" id="detail-view1" aria-expanded="false" style="height: 0px;">
							<small class="d-inline-block">From:</small>
							<small>theadmin@thetheme.io</small>
							<br>
							<small class="d-inline-block">To:</small>
							<small>subscriber@yahoo.com</small>
						</div>
					</div>
				</div>
			</header>
			<div class="collapse" id="meaages-2" aria-expanded="false" style="height: 0px;">
				<div class="card-body">
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
				</div>
			</div>
		</div>
		<div class="mail-card">
			<header class="card-header cursor-pointer collapsed" data-toggle="collapse" data-target="#meaages-3" aria-expanded="false">
				<div class="card-title flexbox">
					<img class="img-responsive img-circle avatar" src="{{url('public/client_assets/img/can-1.png')}}" alt="...">
					<div>
						<h6>Daniel Duke</h6>
						<small>Today at 07:34 AM</small>
						<small><a class="text-info collapsed" href="#detail-view2" data-toggle="collapse" aria-expanded="false">View Detail</a></small>
						<div class="no-collapsing cursor-text collapse" id="detail-view2" aria-expanded="false" style="height: 0px;">
							<small class="d-inline-block">From:</small>
							<small>theadmin@thetheme.io</small>
							<br>
							<small class="d-inline-block">To:</small>
							<small>subscriber@yahoo.com</small>
						</div>
					</div>
				</div>
			</header>
			<div class="collapse" id="meaages-3" aria-expanded="false" style="height: 0px;">
				<div class="card-body">
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
				</div>
			</div>
		</div>
		<div class="mail-card">
			<header class="card-header cursor-pointer collapsed" data-toggle="collapse" data-target="#meaages-4" aria-expanded="false">
				<div class="card-title flexbox">
					<img class="img-responsive img-circle avatar" src="{{url('public/client_assets/img/can-3.png')}}" alt="...">
					<div>
						<h6>Daniel Duke</h6>
						<small>Today at 07:34 AM</small>
						<small><a class="text-info collapsed" href="#detail-view3" data-toggle="collapse" aria-expanded="false">View Detail</a></small>
						<div class="no-collapsing cursor-text collapse" id="detail-view3" aria-expanded="false" style="height: 0px;">
							<small class="d-inline-block">From:</small>
							<small>theadmin@thetheme.io</small>
							<br>
							<small class="d-inline-block">To:</small>
							<small>subscriber@yahoo.com</small>
						</div>
					</div>
				</div>
			</header>
			<div class="collapse" id="meaages-4" aria-expanded="false" style="height: 0px;">
				<div class="card-body">
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
				</div>
			</div>
		</div>
		<div class="mail-card unread">
			<header class="card-header cursor-pointer collapsed" data-toggle="collapse" data-target="meaages-5" aria-expanded="false">
				<div class="card-title flexbox">
					<img class="img-responsive img-circle avatar" src="{{url('public/client_assets/img/can-4.png')}}" alt="...">
					<div>
						<h6>Daniel Duke</h6>
						<small>Today at 07:34 AM</small>
						<small><a class="text-info collapsed" href="#detail-view4" data-toggle="collapse" aria-expanded="false">View Detail</a></small>
						<div class="no-collapsing cursor-text collapse" id="detail-view4" aria-expanded="false" style="height: 0px;">
							<small class="d-inline-block">From:</small>
							<small>theadmin@thetheme.io</small>
							<br>
							<small class="d-inline-block">To:</small>
							<small>subscriber@yahoo.com</small>
						</div>
					</div>
				</div>
			</header>
			<div class="collapse" id="meaages-5" aria-expanded="false" style="height: 0px;">
				<div class="card-body">
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
				</div>
			</div>
		</div>
		<div class="mail-card">
			<header class="card-header cursor-pointer">
				<div class="card-title flexbox">
					<img class="img-responsive img-circle avatar" src="{{url('public/client_assets/img/can-4.png')}}" alt="...">
					<div>
						<h6>Daniel Duke</h6>
						<small>Today at 07:34 AM</small>
						<small><a class="text-info collapsed" href="#detail-view-6" data-toggle="collapse" aria-expanded="false">View Detail</a></small>
						<div class="no-collapsing cursor-text collapse" id="detail-view-6" aria-expanded="false" style="height: 0px;">
							<small class="d-inline-block">From:</small>
							<small>theadmin@thetheme.io</small>
							<br>
							<small class="d-inline-block">To:</small>
							<small>subscriber@yahoo.com</small>
						</div>
					</div>
				</div>
			</header>
			<div class="" id="meaages-6">
				<div class="card-body">
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. </p>
					<hr>
					<h5 class="text-lighter">
					<i class="fa fa-paperclip"></i>
					<small>Attchments (3)</small>
					</h5>
					<div class="attachment-block">
						<div class="thumb">
							<img src="{{url('public/client_assets/img/gallery1.jpg')}}" alt="img" class="img-responsive">
						</div>
						<div class="attachment-info">
							<h6>Profile Pic  <span>( 1.69 mb )</span></h6>
							<ul>
								<li style="margin-right:20px; "><a href="javascript:void(0)">Download</a></li>
								<li style="margin-left:10px;"><a href="javascript:void(0)">View</a></li>
							</ul>
						</div>
					</div>
<div class="attachment-block">
	<div class="thumb">
		<img src="{{url('public/client_assets/img/gallery2.jpg')}}" alt="img" class="img-responsive">
	</div>
	<div class="attachment-info">
		<h6>Profile Pic  <span>( 1.69 mb )</span></h6>
		<ul>
			<li style="margin-right:20px; "><a href="javascript:void(0)">Download</a></li>
			<li style="margin-left:10px;"><a href="javascript:void(0)">View</a></li>
		</ul>
	</div>
</div>
<div class="attachment-block">
	<div class="thumb">
		<img src="{{url('public/client_assets/img/gallery3.jpg')}}" alt="img" class="img-responsive">
	</div>
	<div class="attachment-info">
		<h6>Profile Pic  <span>( 1.69 mb )</span></h6>
		<ul>
			<li style="margin-right:20px; "><a href="javascript:void(0)">Download</a></li>
			<li style="margin-left:10px;"><a href="javascript:void(0)">View</a></li>
		</ul>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- End Message -->
<!-- Start Settings -->
<div id="settings" class="tab-pane fade">
<div class="row no-mrg">
<h3>Edit Profile</h3>
<div class="edit-pro">
<div class="col-md-4 col-sm-6">
<label>First Name</label>
<input type="text" class="form-control" placeholder="Matthew">
</div>
<div class="col-md-4 col-sm-6">
<label>Middle Name</label>
<input type="text" class="form-control" placeholder="Else">
</div>
<div class="col-md-4 col-sm-6">
<label>Last Name</label>
<input type="text" class="form-control" placeholder="Dana">
</div>
<div class="col-md-4 col-sm-6">
<label>Email</label>
<input type="email" class="form-control" placeholder="dana.mathew@gmail.com">
</div>
<div class="col-md-4 col-sm-6">
<label>Phone</label>
<input type="text" class="form-control" placeholder="+91 258 475 6859">
</div>
<div class="col-md-4 col-sm-6">
<label>Zip / Postal</label>
<input type="text" class="form-control" placeholder="258 457 528">
</div>
<div class="col-md-4 col-sm-6">
<label>Address</label>
<input type="text" class="form-control" placeholder="204 Lowes Alley">
</div>
<div class="col-md-4 col-sm-6">
<label>Address 2</label>
<input type="text" class="form-control" placeholder="Software Developer">
</div>
<div class="col-md-4 col-sm-6">
<label>Organization</label>
<input type="text" class="form-control" placeholder="Software Developer">
</div>
<div class="col-md-4 col-sm-6">
<label>City</label>
<input type="text" class="form-control" placeholder="Chandigarh">
</div>
<div class="col-md-4 col-sm-6">
<label>State</label>
<input type="text" class="form-control" placeholder="Punjab">
</div>
<div class="col-md-4 col-sm-6">
<label>Country</label>
<input type="text" class="form-control" placeholder="India">
</div>
<div class="col-md-4 col-sm-6">
<label>Old Password</label>
<input type="password" class="form-control" placeholder="*********">
</div>
<div class="col-md-4 col-sm-6">
<label>New Password</label>
<input type="password" class="form-control" placeholder="*********">
</div>
<div class="col-md-4 col-sm-6">
<label>Old Password</label>
<input type="password" class="form-control" placeholder="*********">
</div>
<div class="col-md-4 col-sm-6">
<label>About you</label>
<textarea class="form-control" placeholder="Write Something"></textarea>
</div>
<div class="col-md-4 col-sm-6">
<label>Upload Profile Pic</label>
<form action="http://codeminifier.com/upload-target" class="dropzone dz-clickable profile-pic">
<div class="dz-default dz-message">
	<i class="fa fa-cloud-upload"></i>
	<span>Drop files here to upload</span>
</div>
</form>
</div>
<div class="col-md-4 col-sm-6">
<label>Upload Profile Cover</label>
<form action="http://codeminifier.com/upload-target" class="dropzone dz-clickable profile-cover">
<div class="dz-default dz-message">
	<i class="fa fa-cloud-upload"></i>
	<span>Drop files here to upload</span>
</div>
</form>
</div>
<div class="col-sm-12">
<button type="button" class="update-btn">Update Now</button>
</div>
</div>
</div>
</div>
<!-- End Settings -->
</div>
<!-- Start All Sec -->
</div>
</div>
</div>
</div>
</section>
<!-- Candidate Profile End -->
@endif
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" style="margin-top:120px">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Upload Resume</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="{{url('upload-resume')}}" method="post" enctype="multipart/form-data" >
{{ csrf_field() }}
<div class="modal-body">
<div class="Uploadbtn">
<input type="file" class="input-upload" name="resume" />
<span>Upload<i class="fas fa-file-word" style="margin-left:10px;"></i></span>
</div>
</div>
<div class="modal-footer" style="margin-top: 20px;">
<button type="submit" class="btn btn-primary btn-sm" style="border-radius: 15px">Upload</button>
<button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal" style="border-radius: 15px">Close</button>
</div>
</form>
</div>
</div>
</div>



<!-- Upload Cover Photo -->

<div id="uploadcoverphoto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Cover Image</h4>
          <div class="col-sm-6 col-md-offset-4" id="loading-spin">
            <i id="i" style="font-size:100px"></i>
          </div>
          <div class="col-sm-6 col-md-offset-4" id="loading-true">
            <i id="tru" style="font-size:100px; color: #38b75e"></i>
          </div>
        </div>
    <form action="{{url('update-user-cover-pic')}}" method="post" enctype="multipart/form-data">
    	{{ csrf_field() }}
        <div class="modal-body" id="modal-content">
         	


        	<br>
        	<div class="form-group">
        		<label for="exampleInputFile">Upload Candidate Cover Image</label>
        		<input type="file" id="exampleInputFile" name="input_img">
        		<p class="help-block">Click To Choose Your Profile Pic.</p>
        	</div>


          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Upload</button>
         	 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    </form>
      </div>
  </div>
</div>





<!-- Upload Profile Pic -->


<div id="uploadUser_profile" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload image</h4>
          <div class="col-sm-6 col-md-offset-4" id="loading-spin">
            <i id="i" style="font-size:100px"></i>
          </div>
          <div class="col-sm-6 col-md-offset-4" id="loading-true">
            <i id="tru" style="font-size:100px; color: #38b75e"></i>
          </div>
        </div>
        <div class="modal-body" id="modal-content">
         	


        <div class="row">
        	<br>
        	<div class="col-md-12" style="margin-left:30px;"><input type="file" id="upload"></div>
            <div class="col-md-6 text-center">
                <div id="upload-demo" style="width:350px"></div>
            </div>
            <div class="col-md-6">
                <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
            </div>
        </div>







          <div class="modal-footer">
            <button class="btn btn-success upload-result">Upload</button>
         	 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
  </div>
</div>





<!-- Modal -->
<div id="DemoModal2" class="modal fade "> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header"> <!-- modal header -->
				<button type="button" class="close" 
				data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title">Eduction Viewed</h4>
			</div>

			<div class="modal-body"> <!-- modal body -->
				<div class="row no-mrg">
					<div class="edit-pro">
						<div class="col-md-4 col-sm-6">
							<label>Degree Title</label>
							<input type="text" id="viewed_edu_degree_title" readonly="readonly" class="form-control" placeholder="Matthew">
						</div>
						
						<div class="col-md-4 col-sm-6">
							<label>Degree Level</label>
							<input type="text" id="viewed_edu_degree_level" readonly="readonly" class="form-control" placeholder="Else">
						</div>
						
						<div class="col-md-4 col-sm-6">
							<label>Institute Name</label>
							<input type="text" id="viewed_edu_institute_name" readonly="readonly" class="form-control" placeholder="Dana">
						</div>
						
						<div class="col-md-4 col-sm-6">
							<label>Institute Location</label>
							<input type="email" id="viewed_edu_institute_location" readonly="readonly" class="form-control" placeholder="dana.mathew@gmail.com">
						</div>
						
						<div class="col-md-4 col-sm-6">
							<label>Date From</label>
							<input type="text" id="viewed_edu_date_from" readonly="readonly" class="form-control" placeholder="+91 258 475 6859">
						</div>
						
						<div class="col-md-4 col-sm-6">
							<label>Date To</label>
							<input type="text" id="viewed_edu_date_to" readonly="readonly" class="form-control" placeholder="258 457 528">
						</div>
						
						<div class="col-md-6 col-sm-6">
							<label>Majors</label>
							<input type="text" id="viewed_edu_majors" readonly="readonly"  class="form-control" placeholder="258 457 528">
						</div>

						<div class="col-md-6 col-sm-6">
							<label>CGP/Percentage</label>
							<input type="text" id="view_edu_cgp_percentage" readonly="readonly" class="form-control" placeholder="258 457 528">
						</div>
						
						<div class="col-sm-12">
							<label>Description</label>
							<textarea class="form-control" name="view_edu_description" id="view_edu_description" placeholder="Write Something"></textarea>
						</div>

					</div>
				</div>
			</div>

			<div class="modal-footer"> <!-- modal footer -->
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
				<!-- <button type="button" class="btn btn-primary">Download</button> -->
			</div>

		</div> <!-- / .modal-content -->

	</div> <!-- / .modal-dialog -->

</div><!-- / .modal -->



<!-- Modal -->
<div id="AddEductionModelWindow" class="modal fade"> 

	<div class="modal-dialog modal-lg">
		<div class="modal-content">

<div class="modal-header"> <!-- modal header -->
<button type="button" class="close"
data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title">Add Eduction</h4>
</div>
<div class="modal-body"> <!-- modal body -->
<div class="row no-mrg">
<form id="user_profile_add_edu">
<div class="edit-pro">
	<div class="col-md-4 col-sm-6">
		<label>Degree Title</label>
		<input type="text" id="degree_title" class="form-control" placeholder="Degree Title, e.g. Degree Name">
	</div>
	<div class="col-md-4 col-sm-6">
		<label>Degree Level</label>
		<select class="form-control input-lg" id="degree_level">
			<option value="" disabled="disabled" selected="selected" hidden="hidden">Degree Level</option>
			@foreach($get_degree as $get_degree)
			<option value="{{$get_degree->degree_title}}">{{$get_degree->degree_title}}</option>
			@endforeach
			
		</select>
	</div>
	<div class="col-md-4 col-sm-6">
		<label>Institute Name</label>
		<input type="text" id="institute_name" class="form-control" placeholder="Institute Name">
	</div>
	<div class="col-md-4 col-sm-6">
		<label>Institute Location</label>
		<input type="email" id="institute_location" class="form-control" placeholder="Institute Location: Address Details ">
	</div>
	<div class="col-md-4 col-sm-6">
		<label>Date From</label>
		<input type="date" id="edu-start" data-theme="my-style" data-translate-mode="true"  data-min-year="1980"  data-max-year="2020" data-large-mode="true"  class="form-control" placeholder="12/31/2016">
	</div>
	<div class="col-md-4 col-sm-6">
		<label>Date To</label>
		<input type="date" id="edu-end" data-theme="my-style" data-translate-mode="true" data-min-year="1980"  data-max-year="2020" data-large-mode="true" class="form-control" placeholder="12/31/2016" data-dd-default-date="12/31/2016">
	</div>
	<div class="col-md-4 col-sm-4">
		<label>Majors</label>
		<select class="form-control input-lg" id="majors">
			<option value="" disabled="disabled" selected="selected" hidden="hidden">Majors</option>
			@foreach($get_majors as $value)
			<option value="{{$value->major_title}}">
			 <?php
			 
			 $value->major_title= str_replace("_"," ",$value->major_title);
			echo $value->major_title 
			 ?></option>
			@endforeach

		</select>
	</div>
	<div class="col-md-4 col-sm-4">
		<label>CGP/Percentage</label>
		<select class="form-control input-lg" id="edu_result" onchange="change_fields()">
			<option value="" disabled="disabled" selected="selected" hidden="hidden">CGPA / Percentage</option>
			<option>CGPA</option>
			<option>Percentage</option>
		</select>
	</div>
	<div class="col-md-4 col-sm-6" id="CGPA_fields">
		<label>CGPA</label>
		<input type="text"  id="candidate_CGPA" class="form-control" placeholder="Enter CGPA e.g 2.0 , 3.5 etc">
	</div>
	<div class="col-md-4 col-sm-6" id="Percentage_fields">
		<label>Percentage</label>
		<input type="text" id="candidate_percentage" class="form-control"  placeholder="Enter Percentage e.g 60% , 70%">
	</div>
	
	<div class="col-sm-12">
		<label>Description</label>
		<textarea name="eduction" id="edu_description">Tell Us Something about Your Eduction Experience</textarea>
	</div>
</div>
</form>
</div>
<div class="modal-footer"> <!-- modal footer -->
<button type="button" onclick="addEduction2(2);" class="btn btn-success">Save</button>
<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
</div>
</div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->
</div><!-- / .modal -->
</div><!-- / .modal -->



<!-- Update Perional Info  Modal -->
<div id="UpdatePerionalInfo" class="modal fade"> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

<div class="modal-header"> <!-- modal header -->
<button type="button" class="close"
data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title">Edit Personal Info</h4>
</div>
<form action="{{url('update_candidate_Personal_Info')}}" method="post">
 {{ csrf_field() }}
<div class="modal-body"> <!-- modal body -->
<div class="row no-mrg">
<div class="edit-pro">
	@foreach ($general_info as $user_general_info)
	<div class="col-md-4 col-sm-6">
		<label>Full Name</label>
		<input type="text" name="candidate_name" id="candidate_name" value="{{$user_general_info->candidate_name}}" class="form-control">
	</div>
	<div class="col-md-4 col-sm-6">
		<label>Professional-Title</label>
		<input type="text" id="candidate_profession" name="candidate_profession" class="form-control" value="{{$user_general_info->candidate_profession}}">
	</div>
	<div class="col-md-4 col-sm-6">
		<label>City</label>
		<select class="form-control input-lg" name="candidate_city">
			<option value="{{$user_general_info->candidate_city}}" disabled="disabled" selected="selected">{{$user_general_info->candidate_city}}</option>
			@foreach($get_cities1 as $value)
			<option value="{{$value->company_city_name}}">{{$value->company_city_name}}</option>
			@endforeach
			
		</select>
	</div>
	<div class="col-md-4 col-sm-6">
		<label>DOB</label>
		<input type="text" value="{{$user_general_info->candidate_dob}}" id="update_dob" name="candidate_dob" class="form-control">
	</div>
	<div class="col-md-4 col-sm-6">
		<label>Gender</label>
		<select class="form-control input-lg" name="candidate_gender">
			<option value="{{$user_general_info->candidate_gender}}" disabled="disabled" selected="selected">{{$user_general_info->candidate_gender}}</option>
			<option>Male</option>
			<option>Female</option>
		</select>
	</div>
	<div class="col-md-4 col-sm-6">
		<label>Website-Link</label>
		<input type="text"  name="website_link" value="{{$user_general_info->candidate_website}}" class="form-control">
	</div>
	<div class="col-md-4 col-sm-4">
		<label>Career Level</label>
		<select class="form-control input-lg" name="candidate_career_level">
			<option value="{{$user_general_info->candidate_career_level}}" disabled="disabled" selected="selected">{{$user_general_info->candidate_career_level}}</option>
			<option>Entry Level</option>
			<option>Intermediate</option>
			<option>Experienced Professional</option>
			<option>Department Head</option>
			<option>Gm / CEO / Country Head</option>
		</select>
	</div>
	<div class="col-md-4 col-sm-4">
		<label>Qualification Level</label>
		<select class="form-control input-lg" name="candidate_qualification">
			<option value="{{$user_general_info->candidate_career_level}}" disabled="disabled" selected="selected">{{$user_general_info->candidate_qualification}}</option>
			@foreach($get_qualification as $value)
			<option value="{{$value->qualification_title}}"><?php
				
				$value->qualification_title= str_replace("_"," ",$value->qualification_title);
			echo $value->qualification_title;
			?></option>
			@endforeach		
		</select>
	</div>
	<div class="col-md-4 col-sm-4">
		<label>Candidate Industries</label>
		<select class="form-control input-lg" name="candidate_industries">
			<option value="{{$user_general_info->candidate_career_level}}" disabled="disabled" selected="selected">{{$user_general_info->candidate_industries}}</option>
			@foreach($get_industries as $value)
			<option value="{{$value->company_industry_name}}"><?php 
			$value->company_industry_name= str_replace("_"," ",$value->company_industry_name);
			echo $value->company_industry_name;
			?></option>
			@endforeach	
		
		</select>
	</div>
	<div class="col-sm-12">
		<label>Location/Address</label>
		<textarea name="profile_Address" id="profile_Address">{{$user_general_info->	candidate_location}}</textarea>
	</div>

	@endforeach
</div>
</div>
<div class="modal-footer"> <!-- modal footer -->
<button type="submit" class="btn btn-success">Update</button>
<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
</div>
</div> <!-- / .modal-content -->
</form>

</div> <!-- / .modal-dialog -->
</div><!-- / .modal -->
</div><!-- / .modal -->



<div id="model_div">
	

</div>






<!-- Experience -->



<!-- Experience Viewd -->

<!-- Modal -->
<div id="ExperienceViewed" class="modal fade "> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header"> <!-- modal header -->
				<button type="button" class="close" 
				data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title">Experience Viewed</h4>
			</div>

			<div class="modal-body"> <!-- modal body -->
				<div class="row no-mrg">
					<div class="edit-pro">
						
						<div class="col-md-4 col-sm-6">
							<label>Job Title</label>
							<input type="text" id="viewed_exp_job_title" readonly="readonly" class="form-control" placeholder="Else">
						</div>
						
						<div class="col-md-4 col-sm-6">
							<label>Company Name</label>
							<input type="text" id="viewed_exp_company_name" readonly="readonly" class="form-control" placeholder="Dana">
						</div>
						
						<div class="col-md-4 col-sm-6">
							<label>Referance Email</label>
							<input type="email" id="viewed_exp_referance_email" readonly="readonly" class="form-control" placeholder="dana.mathew@gmail.com">
						</div>
						
						
						<div class="col-md-6 col-sm-6">
							<label>Reference Number</label>
							<input type="text" id="viewed_exp_referance_number" readonly="readonly"  class="form-control" placeholder="258 457 528">
						</div>

						<div class="col-md-6 col-sm-6">
							<label>Your Position</label>
							<input type="text" id="view_exp_your_position" readonly="readonly" class="form-control" placeholder="258 457 528">
						</div>

						<div class="col-md-6 col-sm-6">
							<label>Date From</label>
							<input type="text" id="viewed_exp_date_from" readonly="readonly" class="form-control" placeholder="+91 258 475 6859">
						</div>
						
						<div class="col-md-6 col-sm-6">
							<label>Date To</label>
							<input type="text" id="viewed_exp_date_to" readonly="readonly" class="form-control" placeholder="258 457 528">
						</div>
						
						<div class="col-sm-12">
							<label>Description</label>
							<textarea class="form-control" name="view_exp_description" id="view_exp_description" placeholder="Write Something"></textarea>
						</div>

					</div>
				</div>
			</div>

			<div class="modal-footer"> <!-- modal footer -->
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
				<!-- <button type="button" class="btn btn-primary">Download</button> -->
			</div>

		</div> <!-- / .modal-content -->

	</div> <!-- / .modal-dialog -->

</div><!-- / .modal -->




<!-- Add Experience  -->


<!-- Modal -->
<div id="AddExperience" class="modal fade "> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header"> <!-- modal header -->
				<button type="button" class="close" 
				data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title">Add Experience</h4>
			</div>

			<div class="modal-body"> <!-- modal body -->
				<div class="row no-mrg">
					<form id="user_profile_add_exp">
						<div class="edit-pro">

							<div class="col-md-4 col-sm-6">
								<label>Job Title</label>
								<input type="text" id="job_title" class="form-control" placeholder="Job Title">
							</div>

							<div class="col-md-4 col-sm-6">
								<label>Company Name</label>
								<input type="text" id="company_name" class="form-control" placeholder="Company Name">
							</div>

							<div class="col-md-4 col-sm-6">
								<label>Referance Email</label>
								<input type="email" id="ref_email"  class="form-control" placeholder="Reference Email">
							</div>


							<div class="col-md-6 col-sm-6">
								<label>Reference Number</label>
								<input type="text" id="exp_ref_phone"  class="form-control" placeholder="Reference Number">
							</div>

							<div class="col-md-6 col-sm-6">
								<label>Your Position</label>
								<input type="text" id="your_position"  class="form-control" placeholder="Position, e.g. Web Designer">
							</div>

							<div class="col-md-6 col-sm-6">
								<label>Date From</label>
								<input type="text" id="exp-start" data-lang="en" data-large-mode="true" data-min-year="1990" data-max-year="2019" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" placeholder="11/25/2018">
							</div>

							<div class="col-md-6 col-sm-6">
								<label>Date To</label>
								<input type="text" id="exp-end" data-lang="en" data-large-mode="true" data-min-year="1990" data-max-year="2019" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="" placeholder="11/25/2018">
							</div>

							<div class="col-sm-12">
								<label>Description</label>
								<textarea name="work_history" id="project_descrption">Describe Your Experience</textarea>
							</div>

						</div>
					</form>
				</div>
			</div>

			<div class="modal-footer"> <!-- modal footer -->
				<button type="button" onclick="addExperience(2);" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
				<!-- <button type="button" class="btn btn-primary">Download</button> -->
			</div>

		</div> <!-- / .modal-content -->

	</div> <!-- / .modal-dialog -->

</div><!-- / .modal -->





<!-- Project  -->


<!-- Project Viewed  -->


<!-- Modal -->
<div id="ProjectViewed" class="modal fade "> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header"> <!-- modal header -->
				<button type="button" class="close" 
				data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title">Project Viewed</h4>
			</div>

			<div class="modal-body"> <!-- modal body -->
				<div class="row no-mrg">
					<div class="edit-pro">
						
						<div class="col-md-4 col-sm-6">
							<label>Project Title</label>
							<input type="text" id="viewed_pro_job_title" readonly="readonly" class="form-control" placeholder="Project Title">
						</div>
						
						<div class="col-md-4 col-sm-6">
							<label>Company Name</label>
							<input type="text" id="viewed_pro_company_name" readonly="readonly" class="form-control" placeholder="Client Name">
						</div>
						
						<div class="col-md-4 col-sm-6">
							<label>Reference Email</label>
							<input type="email" id="viewed_pro_referance_email" readonly="readonly" class="form-control" placeholder="Client Number">
						</div>
						
						
						<div class="col-md-6 col-sm-6">
							<label>Reference Number</label>
							<input type="text" id="viewed_pro_referance_number" readonly="readonly"  class="form-control" placeholder="258 457 528">
						</div>

						<div class="col-md-6 col-sm-6">
							<label>Your Position</label>
							<input type="text" id="view_pro_your_position" readonly="readonly" class="form-control" placeholder="Your Position">
						</div>

						<div class="col-md-6 col-sm-6">
							<label>Date From</label>
							<input type="text" id="viewed_pro_date_from" readonly="readonly" class="form-control" placeholder="+91 258 475 6859">
						</div>
						
						<div class="col-md-6 col-sm-6">
							<label>Date To</label>
							<input type="text" id="viewed_pro_date_to" readonly="readonly" class="form-control" placeholder="258 457 528">
						</div>
						
						<div class="col-sm-12">
							<label>Description</label>
							<textarea class="form-control" name="view_pro_description" id="view_pro_description" placeholder="Description"></textarea>
						</div>

					</div>
				</div>
			</div>

			<div class="modal-footer"> <!-- modal footer -->
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
				<!-- <button type="button" class="btn btn-primary">Download</button> -->
			</div>
		</div> <!-- / .modal-content -->
	</div> <!-- / .modal-dialog -->
</div><!-- / .modal -->


<!-- Add Project -->

<!-- Modal -->
<div id="AddProject" class="modal fade "> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header"> <!-- modal header -->
				<button type="button" class="close" 
				data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title">Add Project</h4>
			</div>

			<div class="modal-body"> <!-- modal body -->
				<div class="row no-mrg">
					<form id="user_profile_add_pro">
						<div class="edit-pro">

							<div class="col-md-4 col-sm-6">
							<label>Project Title</label>
							<input type="text" id="project_title" class="form-control" placeholder="Project Title">
						</div>
						
						<div class="col-md-4 col-sm-6">
							<label>Company Name</label>
							<input type="text" id="pro_company_name" class="form-control" placeholder="Client Name">
						</div>
						
						<div class="col-md-4 col-sm-6">
							<label>Client Email</label>
							<input type="email" id="project_ref_email" class="form-control" placeholder="Client Email">
						</div>
						
						<div class="col-md-6 col-sm-6">
							<label>Client Number</label>
							<input type="text" id="project_ref_phone"  class="form-control" placeholder="Client Number">
						</div>

						<div class="col-md-6 col-sm-6">
							<label>Your Position</label>
							<input type="text" id="your_porject_position" class="form-control" placeholder="Your Position">
						</div>

						<div class="col-md-6 col-sm-6">
							<label>Date From</label>
							<input type="text" id="pro-start" class="form-control" placeholder="12/9/2019">
						</div>
						
						<div class="col-md-6 col-sm-6">
							<label>Date To</label>
							<input type="text" id="pro-end" class="form-control" placeholder="12/9/2019">
						</div>
						
						<div class="col-sm-12">
							<label>Description</label>
							<textarea class="form-control" name="project" id="project_des" placeholder="Description"></textarea>
						</div>


						</div>
					</form>
				</div>
			</div>

			<div class="modal-footer"> <!-- modal footer -->
				<button type="button" onclick="addPro(2);" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
				<!-- <button type="button" class="btn btn-primary">Download</button> -->
			</div>

		</div> <!-- / .modal-content -->

	</div> <!-- / .modal-dialog -->

</div><!-- / .modal -->





<!-- Skill -->

<!-- Modal -->
<div id="SkillViewed" class="modal fade "> 
	<div class="modal-dialog modal-md">
		<div class="modal-content">

			<div class="modal-header"> <!-- modal header -->
				<button type="button" class="close" 
				data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title">Skill Viewed</h4>
			</div>

			<div class="modal-body"> <!-- modal body -->
				<div class="row no-mrg">
					<div class="edit-pro">
						
						<div class="col-md-6 col-sm-6">
							<label>Skill Name</label>
							<input type="text" id="viewed_skill_name" readonly="readonly" class="form-control" placeholder="Skill Name">
						</div>
						
						<div class="col-md-6 col-sm-6">
							<label>Skill Percentage</label>
							<input type="text" id="viewed_skill_precentage" readonly="readonly" class="form-control" placeholder="Skill Percentage">
						</div>

					</div>
				</div>
			</div>

			<div class="modal-footer"> <!-- modal footer -->
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
				<!-- <button type="button" class="btn btn-primary">Download</button> -->
			</div>
		</div> <!-- / .modal-content -->
	</div> <!-- / .modal-dialog -->
</div><!-- / .modal -->




<!-- Add Skill -->

<!-- Modal -->
<div id="AddSkill" class="modal fade "> 
	<div class="modal-dialog modal-md">
		<div class="modal-content">

			<div class="modal-header"> <!-- modal header -->
				<button type="button" class="close" 
				data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title">Add Skill</h4>
			</div>

			<div class="modal-body"> <!-- modal body -->
				<div class="row no-mrg">
					<form id="user_profile_add_skill">
						<div class="edit-pro">

							<div class="col-md-12 col-sm-12">
								<label>Skill Name</label>
								<input type="text" id="skill_name" class="form-control" placeholder="Skill Name">
							</div>

							<div class="col-md-12 col-sm-12">
								<div class="slidecontainer">
									<input type="range" min="1" max="100" value="50" class="slider" id="skill_percentage">
									<p><b>Value : </b> <span id="demo"></span></p>
								</div>
							</div>

						</div>
					</form>
				</div>
			</div>

			<div class="modal-footer"> <!-- modal footer -->
				<button type="button" onclick="addnewskill(2);" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
				<!-- <button type="button" class="btn btn-primary">Download</button> -->
			</div>
		</div> <!-- / .modal-content -->
	</div> <!-- / .modal-dialog -->
</div><!-- / .modal -->




<!-- Hobbies -->


<!-- View Hobbies -->

<!-- Modal -->
<div id="ViewHobbies" class="modal fade "> 
	<div class="modal-dialog modal-md">
		<div class="modal-content">

			<div class="modal-header"> <!-- modal header -->
				<button type="button" class="close" 
				data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title">View Hobbey</h4>
			</div>

			<div class="modal-body"> <!-- modal body -->
				<div class="row no-mrg">
					<form id="user_profile_add_pro_hobby">
						<div class="edit-pro">

							<div class="col-md-12 col-sm-12">
							<label>Hobbey Name</label>
							<input type="text" id="view_hobby_name" class="form-control" placeholder="Hobbies eg Cricket,Football" readonly="readonly">
						</div>
						

						</div>
					</form>
				</div>
			</div>

			<div class="modal-footer"> <!-- modal footer -->
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
				<!-- <button type="button" class="btn btn-primary">Download</button> -->
			</div>

		</div> <!-- / .modal-content -->

	</div> <!-- / .modal-dialog -->

</div><!-- / .modal -->




<!-- Add Hobbey -->


<!-- Modal -->
<div id="AddHobbey" class="modal fade "> 
	<div class="modal-dialog modal-md">
		<div class="modal-content">

			<div class="modal-header"> <!-- modal header -->
				<button type="button" class="close" 
				data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title">Add Hobbey</h4>
			</div>

			<div class="modal-body"> <!-- modal body -->
				<div class="row no-mrg">
					<form id="user_profile_add_hobbey">
						<div class="edit-pro">

							<div class="col-md-12 col-sm-12">
							<label>Hobbey Name</label>
							<input type="text" id="user_hobbies" class="form-control" placeholder="Hobbies eg Cricket,Football">
						</div>
						

						</div>
					</form>
				</div>
			</div>

			<div class="modal-footer"> <!-- modal footer -->
				<button type="button" onclick="addnewHobbey(2);" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
				<!-- <button type="button" class="btn btn-primary">Download</button> -->
			</div>

		</div> <!-- / .modal-content -->
	</div> <!-- / .modal-dialog -->
</div><!-- / .modal -->




<!-- Languages -->


<!-- View Languages -->

<div id="Viewlanguages" class="modal fade "> 
	<div class="modal-dialog modal-md">
		<div class="modal-content">

			<div class="modal-header"> <!-- modal header -->
				<button type="button" class="close" 
				data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title">View Hobbey</h4>
			</div>

			<div class="modal-body"> <!-- modal body -->
				<div class="row no-mrg">
					<form id="user_profile_add_pro">
						<div class="edit-pro">

							<div class="col-md-12 col-sm-12">
							<label>Hobbey Name</label>
							<input type="text" id="view_user_language" class="form-control" placeholder="Your Languages" readonly="readonly">
						</div>
						

						</div>
					</form>
				</div>
			</div>

			<div class="modal-footer"> <!-- modal footer -->
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
				<!-- <button type="button" class="btn btn-primary">Download</button> -->
			</div>

		</div> <!-- / .modal-content -->

	</div> <!-- / .modal-dialog -->

</div><!-- / .modal -->




<!-- Add Languages -->

<div id="Addlanguage" class="modal fade "> 
	<div class="modal-dialog modal-md">
		<div class="modal-content">

			<div class="modal-header"> <!-- modal header -->
				<button type="button" class="close" 
				data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title">Add Languages</h4>
			</div>

			<div class="modal-body"> <!-- modal body -->
				<div class="row no-mrg">
					<form id="user_profile_add_language">
						<div class="edit-pro">

							<div class="col-md-12 col-sm-12">
							<label>Hobbey Name</label>
							<input type="text" id="user_language" class="form-control" placeholder="Your Languages">
						</div>
						

						</div>
					</form>
				</div>
			</div>

			<div class="modal-footer"> <!-- modal footer -->
				<button type="button" onclick="addnewlanguage(2);" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
				<!-- <button type="button" class="btn btn-primary">Download</button> -->
			</div>

		</div> <!-- / .modal-content -->

	</div> <!-- / .modal-dialog -->

</div><!-- / .modal -->


<!-- Modal Contents for message -->
    <div id="message" class="modal fade "> <!-- class modal and fade -->
      
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
           <div class="modal-header"> <!-- modal header -->
            <button type="button" class="close" 
             data-dismiss="modal" aria-hidden="true">×</button>
			 
                    <h4 class="modal-title">Message</h4>
           </div>
		 <form>
		     		
		     <div class="modal-body"style="padding: 3%;width: 100%;min-height: 200px;background-color: #e1e1e1;font-family: georgia regular;"> <!-- modal body -->
		     	
		     		<div class="row">
		     			<div class="col-sm-12">
		     			<div id="msg-label" style="margin-bottom: 3%;"></div>
		     			<div  id="msg-text" style="background-color: white;padding: 5%;"></div>
		     			<div id="msg-add"  style="margin-top: 5%;"></div>
		     			</div>
		     		</div>
		     	
		            
		     </div>
	 
     <div class="modal-footer"> <!-- modal footer -->
       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel!</button>
      </div>
      </form>
				
      </div> <!-- / .modal-content -->
      
    </div> <!-- / .modal-dialog -->
      
 </div><!-- / .modal -->






<script type="text/javascript">
				

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

			$uploadCrop = $('#upload-demo').croppie({
			    enableExif: true,
			    viewport: {
			        width: 200,
			        height: 200,
			        type: 'circle'
			    },
			    boundary: {
			        width: 300,
			        height: 300
			    }
			});


			$('#upload').on('change', function () { 
			    var reader = new FileReader();
			    reader.onload = function (e) {
			        $uploadCrop.croppie('bind', {
			            url: e.target.result
			        }).then(function(){
			            console.log('jQuery bind complete');
			        });
			        
			    }
			    reader.readAsDataURL(this.files[0]);
			});


			$('.upload-result').on('click', function (ev) {
			    $uploadCrop.croppie('result', {
			        type: 'canvas',
			        size: 'viewport'
			    }).then(function (resp) {

			        //alert(resp);

			        $.ajax({
			            url: "update-user-profile-pic",
			            type: "post",
			            data: {_token:CSRF_TOKEN,"image":resp},
			            success: function (data) {
			                html = '<img src="'+resp+'"/>';
			                $("#upload-demo-i").html(html);
			                html1 = "<a href={{url('uploads/client_site/profile_pic')}}/"+data+"' target='_blank'><img src='{{url('uploads/client_site/profile_pic')}}/"+data+"' /></a>";
			                $("#image_div").html(html1);
			                setTimeout(
			                	function(){

			                		swal('Profile Updated Successfully!','','success');
			                	},
			                	500
			                	);

			                setTimeout(
			                	function(){

			                		$("#uploadUser_profile .close").click();

			                	},
			                	500
			                	);
			                
			                
			            }
			        });
			    });
			});



			</script>


			

<!-- <img src="http://careerspoons.com/uploads/client_site/profile_pic/{{Session::get('profile_image')}}" class="img" alt="" /> -->

<style type="text/css">
.Uploadbtn {
	position: relative;
	overflow: hidden;
	padding:10px 20px;
	text-transform: uppercase;
	color:#fff;
	background:#03A9F4;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	-ms-border-radius: 4px;
	-o-border-radius: 4px;
	border-radius: 4px;
	width:50%;
	text-align:center;
	cursor: pointer;
	margin-top:20px;
	margin-left:25%;
}
.Uploadbtn .input-upload {
	position: absolute;
	top: 0;
	right: 0;
	padding: 0;
	opacity: 0;
	height:100%;
	width:100%;
}


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

<script>
var slider = document.getElementById("skill_percentage");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>
<script type="text/javascript">

	function hide_cv_status(id){
		//alert(id);
		$("#status_bar"+id).hide();
		$("#hide"+id).hide();
		$("#show"+id).show();
	}
	function show_cv_status(id){
		//alert(id);
		$("#status_bar"+id).show();
		$("#hide"+id).show();
		$("#show"+id).hide();
	}
	function view_msg_notify(msg,c_name,candy,loc){
      $("#message").modal("show");
      $("#msg-text").html(msg);
      $("#msg-label").html("<b>To: </b>"+candy+"<br/><b>From:</b> "+c_name);
      $("#msg-add").html("<b>Company location:</b> "+loc);
	}

function ref_profile_meter(){


	$("#profile_meter").load(location.href+" #profile_meter>*","");
	
	// $("#pie_charts").hide();
	// $("#line_charts").hide();
	// $("#ProfileStrengthMeter").hide();
}

</script>


@endsection