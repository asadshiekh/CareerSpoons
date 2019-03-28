@extends('client_views.master')
@section('content')

			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url(public/client_assets/img/banner-13.png);">
				<div class="container" style="margin-bottom: 100px;">
					<h1>Company Profile</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
		
		<!-- Candidate Profile Start -->
        <section class="detail-desc advance-detail-pr gray-bg">
            <div class="container white-shadow">
			
                <div class="row">
                    

                    <div class="detail-pic">
                    	<div id="Orgimg-div">
                    	<img src="{{url('uploads/organization_images/')}}/{{$fetch_pic->company_img}}" class="img" alt="" />
                        </div>
                    	<a data-toggle="modal" data-target="#uploadOrganization_profile" class="detail-edit" title="edit"><i class="fa fa-pencil"></i></a></div>


                    <div class="detail-status"><span>Active Now</span></div>
                

                </div>
				
                <div class="row bottom-mrg">
                    <div class="col-md-12 col-sm-12">
                        <div class="advance-detail detail-desc-caption">
                            
                        	<div id="typed-strings">
                        		<div class="contains_heading" style="font-size: 6px">
                        			<h4>{{$fetch_org->company_name}}</h4><span class="designation" style="color: limegreen">( {{$fetch_org->company_type}} )</span>

                        		</div>
                        	</div>
                        	<span id="typed"></span>
                            
                            <ul>
                                <li><strong class="j-view">85</strong>Total Visitors</li>
                                <li><strong class="j-applied">110</strong>Job Applied</li>
                                <li><strong class="j-shared">120</strong>Invitation</li>
                            </ul>


                        </div>
                    </div>
                </div>
				
                <div class="row no-padd">
                    <div class="detail pannel-footer">
                        <div class="col-md-5 col-sm-5">
                            <ul class="detail-footer-social">
                                <li><a href="{{$fetch_links->organization_fackbook}}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$fetch_links->organization_google}}"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="{{$fetch_links->organization_twitter}}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$fetch_links->organization_linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                                
                            </ul>
                        </div>
                        @if(Session::get('registeration_process')=="N")
                        <div class="col-md-7 col-sm-7">
                            <div class="detail-pannel-footer-btn pull-right"><a href="javascript:void(0)" data-toggle="modal" data-target="#info-modal" class="footer-btn grn-btn" title="">Add Info</a></div>
                        </div>
                        @elseif (Session::get('registeration_process')=="C")
                        <div class="col-md-7 col-sm-7">
                            <div class="detail-pannel-footer-btn pull-right"><a href="company-public-profile" class="footer-btn grn-btn" title="">Viewed as Public</a></div>
                        </div>
                        @endif
                    </div>
                </div>
				
            </div>
        </section>
@if(Session::get('registeration_process')=="N")
<section class="full-detail-description full-detail gray-bg">
	<div class="container">
		<div class="col-md-12 col-sm-12">
			<div class="full-card">
				<div class="tab-content" style="text-align: center;">
					<div style="border:none;border-radius: 20px; display: inline-block;margin-top:50px">
						<p align="center" style="margin-top:10px;"><i class="fas fa-exclamation-triangle"></i> First Add Some Information About You for People to Know Who are You <img height="70" width="60" src="{{url('public/client_assets/img/random/info.gif')}}"></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@elseif (Session::get('registeration_process')=="C")
        <section class="full-detail-description full-detail gray-bg">
            <div class="container">
                <div class="col-md-12 col-sm-12">
                    <div class="full-card">
                      <div class="deatil-tab-employ tool-tab">

					<ul class="nav nav-tabs" id="simple-design-tab">
						<li class="active"><a  data-toggle="tab" href="#bios">Bio</a></li>
						<li><a data-toggle="tab" href="#info" onclick="ref_info();">Info</a></li>
						<li><a data-toggle="tab" href="#new-job" onclick="ref_new();">New-Job-Post</a></li>
						<li><a data-toggle="tab" href="#total-posts" onclick="ref_total();">Total-Posts</a></li>
						<li><a data-toggle="tab" href="#social_media" onclick="ref_media();">Social-Media</a></li>
						<li><a data-toggle="tab" href="#setting" onclick="ref_setting();">Settings</a></li>
						<li><a data-toggle="tab" href="#insights" onclick="ref_insight();">Insights</a></li>
						<li><a data-toggle="tab" href="#reviews" onclick="ref_reviews();">Reviews</a></li>
						<li><a data-toggle="tab" href="#location" onclick="ref_loc();">Location</a></li>
						<?php 
						if(Session::get('company_package_status')=='0'){
						?>
						<li><a data-toggle="tab" href="#company_packages">Packages</a></li>
						<?php }else{ ?>
						<li><a data-toggle="tab" href="#Advertisement_Logo">Advertisement Logo</a></li>
						<?php } ?>	
					</ul>
							
							<!-- Start Bio Sec -->
							<div class="tab-content">

								<div id="bios" class="tab-pane fade in active">
									<h3>You Bio</h3>
									<p><!-- <?php
				                      // $fetch_org->company_info  = str_ireplace('<p>','',$fetch_org->company_info);
				                      // echo $fetch_org->company_info  = str_ireplace('</p>','',$fetch_org->company_info);

				                      ?> -->
				                     
										<form method="post" action="update-bio-front">
				                      	@csrf
				                      	<textarea name="update_bio" id="update_bio">{{$fetch_org->company_info}}</textarea>
									
				                  </p>
				                      <div class="col-sm-12">
				                      	<button type="submit" class="update-btn">Update Bio</button>
				                      </div>
				                      <br>
								</div>
								</form>
								<!-- End Bio Sec -->
							<!-- Start All Sec -->
<div id="info" class="tab-pane fade">
	<h3>Information About You</h3>
	<ul class="job-detail-des">
		<li><span>Company Name:</span>{{$fetch_org->company_name}}</li>
		<li><span>Company Type:</span>{{$fetch_org->company_type}}</li>
		<li><span>City:</span>{{$fetch_org->company_city}}</li>
		<li><span>Branch Name:</span>{{$fetch_org->company_branch}}</li>
		<li><span>Phone:</span>{{$fetch_org->company_phone}}</li>
		<li><span>Website:</span>{{$fetch_org->company_website}}</li>
		<li><span>Employees:</span>{{$fetch_org->company_employees}}</li>
		<li><span>Industry:</span>
		<?php
		$fetch_org->company_industry= str_replace("_"," ",$fetch_org->company_industry);
		echo $fetch_org->company_industry;
	?></li>
	
	<li><span>Since:</span>{{$fetch_org->company_since}}</li>
	<li><span>CNIC:</span>{{$fetch_org->company_cnic}}</li>
	<li><span>Location:</span>{{$fetch_org->company_location}}</li>
	
</ul>
<div class="col-sm-12">
	<button type="submit" data-toggle="modal" data-target="#updatedetailfront" title="edit" class="update-btn">Update Info</button>
</div>
<br>
</div>
<!-- End info Sec -->

<!-- Start new posts Sec -->
<div id="new-job" class="tab-pane fade">
<h3>New Job Post</h3>
<form method="post" action="{{url('front-org-post-job')}}">
	@csrf
	<div class="edit-pro">
		<div class="col-md-4 col-sm-6">
			<label>Job Title</label>
			<input type="text" class="form-control" placeholder="Enter Title" name="posted_job_title" id="posted_job_title">
		</div>
		<div class="col-md-4 col-sm-6">
			<label>Skills</label>
			<input type="text" class="form-control" placeholder="Enter Skills which are Required for Job" name="skill_tags" id="skill_tags">
		</div>
		<div class="col-md-4 col-sm-6">
			<label>Functional Area</label>
			<select class="form-control" name="req_functional_area" id="req_functional_area" onchange="select_functional_area_majors();">
				<option disabled="disabled" hidden="hidden" selected="selected">Select Required Functional area</option>
				@foreach($area as $area)
				<option id="industry-option" value="{{$area->area_title}}"><?php
						
						$area->area_title= str_replace("_"," ",$area->area_title);
								echo $area->area_title
					?>
					
				</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-4 col-sm-6">
			<label>Majors</label>
			<select class="form-control" name="selected_majors" id="selected_majors">
				<option selected="selected"  disabled="disabled" hidden="hidden">Select Required Majors</option>
				
			</select>
		</div>
		<div class="col-md-4 col-sm-6">
			<label>Industry</label>
			<select class="form-control" name="req_industry" id="req_industry">
				<option selected="selected"  disabled="disabled" hidden="hidden">Select Required Industry</option>
				@foreach($industry1 as $industry1)
				<option id="industry-option" value="{{$industry1->company_industry_name}}">
					<?php
					
					$industry1->company_industry_name= str_replace("_"," ",$industry1->company_industry_name);
					echo $industry1->company_industry_name;
					
					?>
				</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-4 col-sm-6">
			<label>Career Level</label>
			<select class="form-control" name="req_career_level" id="req_career_level">
				<option disabled="disabled" hidden="hidden">Select Required Career level</option>
				<option value="Entry Level">Entry Level</option>
				<option value="Intermediate">Intermediate</option>
				<option value="Experienced Professional">Experienced Professional</option>
				<option value="Department Head">Department Head</option>
				<option value="Gm / CEO / Country Head">Gm / CEO / Country Head</option>
			</select>
		</div>
		<div class="bgg col-md-12">
			<div class="col-md-3 col-sm-6">
				<label>Where You need Employee</label>
				<select class="form-control" name="selected_city[]" id="selected_city[]">
					<option disabled="disabled" hidden="hidden" selected="selected">Select City</option>
					@foreach($fetch_city as $fetch_city)
					<option value="{{$fetch_city->company_city_name}}">{{$fetch_city->company_city_name}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-3 col-sm-6">
				<label>Job Type</label>
				<select class="form-control" name="selected_type[]" id="selected_type[]">
					<option disabled="disabled" hidden="hidden" selected="selected">Select Type of Job</option>
					<option value="Full Time">Full Time</option>
					<option value="Part Time">Part Time</option>
				</select>
			</div>
			<div class="col-md-3 col-sm-6">
				<label>Job Shift</label>
				<select class="form-control" name="selected_shift[]" id="selected_shift[]">
					<option disabled="disabled" hidden="hidden" selected="selected">Select Shift of Job</option>
					<option value="Morning Shift">Morning Shift</option>
					<option value="Night Shift">Night Shift</option>
					<option value="Evening Shift">Evening Shift</option>
				</select>
			</div>
			<div class=" col-md-3 col-sm-6">
				<label>ADD</label>
				<div class="input-group">
					<button type="button" class="btn btn-primary" id="butn" onclick="addCityPreferenceAreafields();"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="clearfix"></div>
			<div id="content"></div>
		</div>
		<div class="col-md-4 col-sm-6">
			<label>Year of Experience Required</label>
			<input type="number" placeholder="Enter Required Experience" class="form-control" name="job_exp_req" id="job_exp_req">
		</div>
		<div class="col-md-4 col-sm-6">
			<label>Total positions</label>
			<input id="total_positions" name="total_positions" type="number" class="form-control" placeholder="Enter in Numbers" />
		</div>
		<div class="col-md-4 col-sm-6">
			<label>Working Hours</label>
			<input id="working_hour" name="working_hour" type="number" class="form-control" placeholder="Enter hours in Numbers" />
		</div>
		<div class="col-md-4 col-sm-6">
			<label>Minimum Salary:</label>
			<input id="min_salary" name="min_salary" type="number" class="form-control" placeholder="just Enter Amount"/>
		</div>
		<div class="col-md-4 col-sm-6">
			<label>Maximum Salary:</label>
			<input id="max_salary" name="max_salary" type="number" class="form-control" placeholder="just Enter Amount" />
		</div>
		<div class="col-md-4 col-sm-6">
			<label>Last Apply Date</label>
			<input type="date" id="last_apply" name="last_apply_date"  class="form-control" placeholder="11/25/2018" data-theme="my-style" data-format="S F- Y" data-large-mode="true" data-min-year="1970" data-max-year="2030" data-translate-mode="true" data-lang="en"/>
		</div>
		<div class="col-md-4 col-sm-6">
			<label>Post visibility Date:</label>
			<input type="date" class="form-control" id="post_visible" name="post_visibility_date" placeholder="select date" data-theme="my-style" data-format="S F- Y" data-large-mode="true" data-min-year="1970" data-max-year="2030" data-translate-mode="true" data-lang="en"/>
		</div>
		<div class="col-md-4 col-sm-6">
			<label>Gender Preferences</label>
			<select name="selected_gender" class="form-control" id="selected_gender">
				<option hidden="hidden" disabled="disabled" selected="selected">Select gender</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="None">None</option>
			</select>
		</div>
		<div class="col-md-4 col-sm-6">
			<label>Prefered Age Group</label>
			<select name="prefered_age" class="form-control" id="prefered_age">
				<option hidden disabled="disabled" selected="selected">Select Age GroupYou Required</option>
				<option value="under 20">Under 20</option>
				<option value="20 to 30">20 to 30</option>
				<option value="30 to 40">30 to 40</option>
				<option value="40 to 50">40 to 50</option>
				<option value="Above 50">Above 50</option>
			</select>
		</div>
		<div class="bgg col-md-12">
			<div class="col-md-4 col-sm-4">
				<label>Required Qualification</label>
				<select name="selected_qualificaltion[]" class="form-control" id="selected_qualificaltion[]">
					<option hidden disabled="disabled" selected="selected">Select Required Qualification</option>
					@foreach($qual as $qual)
					<option id="industry-option" value="{{$qual->qualification_title}}">{{$qual->qualification_title}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-4 col-sm-4">
				<label>Required Degree Level</label>
				<select name="req_degree[]" class="form-control" id="req_degree[]">
					<option hidden disabled="disabled" selected="selected">Select Required Degree Level</option>
					@foreach($degree as $degree)
					<option id="industry-option" value="{{$degree->degree_title}}">{{$degree->degree_title}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-sm-4 col-md-4">
				<label>ADD</label>
				<div class="input-group">
					<button type="button" class="btn btn-primary btn-xs" id="butn" onclick="add_qual_front_area();"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="clearfix"></div>
			<div id="content_qual"></div>
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Information About Post</label>
			<textarea class="form-control" id="post_information" name="post_information" class="post_information"></textarea>
		</div>
		
		<div class="col-sm-12">
			<button type="submit" class="update-btn">ADD Post</button>
		</div>
	</div>
	
</form>
</div>
<!-- End Address Sec -->



<div id="social_media" class="tab-pane fade">
<div class="row no-mrg">
<div class="col-md-6">	
<h3>Manage Social Links</h3>
</div>
<div class="col-md-2  col-md-offset-4">	
<!-- <input id="toggle-demo" type="checkbox" data-toggle="toggle">-->
 </div>
<br>
<form action="update-company-social-links" method="post">
{{ csrf_field() }}
<div class="edit-pro">
<div class="col-md-6 col-sm-12">
<label>Facebook</label>
<input type="text" class="form-control" name="organization_facebook_link" value="{{$fetch_links->organization_fackbook}}"  id="candidate_facebook_social_link"/>
</div>
<div class="col-md-6 col-sm-12">
<label>Google</label>
<input type="text" class="form-control" name="organization_google_link" value="{{$fetch_links->organization_google}}"  id="candidate_google_social_link"/>
</div>
<div class="col-md-6 col-sm-12">
<label>Twitter</label>
<input type="text" class="form-control" name="organization_twitter_link" value="{{$fetch_links->organization_twitter}}"  id="candidate_twitter_social_link"/>
</div>
<div class="col-md-6 col-sm-12">
<label>Linkedin</label>
<input type="text" class="form-control" name="organization_linkedin" value="{{$fetch_links->organization_linkedin}}"  id="candidate_linkedin_social_link"/>
</div>
<div class="col-sm-12">
<br>
<button type="submit" id="social_links_update_button" class="update-btn">Update Now</button>
</div>
</div>
</form>
</div>

</div>

								
		<!-- Start Job List -->
		<div id="total-posts" class="tab-pane fade">
			<h3>Total Posts</h3>
			<div class="row">
				@foreach($fetch_post as $fetch_post)
				
				<div class="col-md-12" id="post-del{{$fetch_post->post_id}}">
						<article id="post-show{{$fetch_post->post_id}}">
							<div class="brows-resume">
								<div class="row">
									<div class="col-md-4 col-sm-4">
										<div class="brows-resume-name">
											<h4 id="job_name{{$fetch_post->post_id}}">{{$fetch_post->job_title}}</h4>
											<span class="brows-resume-designation">( <i id="industry-td{{$fetch_post->post_id}}">
											<?php


												$fetch_post->req_industry= str_replace("_"," ",$fetch_post->req_industry);
												echo $fetch_post->req_industry;

											?> </i>)</span>

											<span class="cand-status"><i class="far fa-clock"></i> <?php 

   											// $this->load->helper('date');

    										//client created date get from database
											$date=$fetch_post->created_at; 

  											// Declare timestamps
											$last = new DateTime($date);
											$now = new DateTime( date( 'Y-m-d h:i:s', time() )) ; 
   											 // Find difference
											$interval = $last->diff($now);
    										// Store in variable to be used for calculation etc
											$years = (int)$interval->format('%Y');
											$months = (int)$interval->format('%m');
											$days = (int)$interval->format('%d');
											$hours = (int)$interval->format('%H');
											$minutes = (int)$interval->format('%i');
                                 			//   $now = date('Y-m-d H:i:s');
											if($years > 1)
											{
												echo $years.' Years Ago.' ;
											}
											else if($years == 1)
											{
											echo $years.' Year Ago.' ;
											}
											else if($months > 1)
											{
												echo $months.' Months Ago.' ;
											}
											else if($months == 1)
											{
												echo $months.' Month Ago.' ;
											}
											else if($days > 1)
											{
												echo $days.' Days Ago.' ;
											}
											else if($days == 1)
											{
												echo $days.' Day Ago.' ;
											}
											else if($hours > 1)
											{
												echo  $hours.' Hours Ago.' ;
											}
											else if($hours == 1)
											{
												echo  $hours.' Hour Ago.' ;

											}
											else
											{
												echo $minutes.' Minutes Ago.' ;
											}

											?></span>

										</div>
									</div>
									
									<div class="col-md-2 col-sm-2">
										<div class="brows-resume-name">
											<span><i class="fas fa-user-plus" id="position-td{{$fetch_post->post_id}}">&nbsp; 
												<?php 

													if($fetch_post->total_positions>1){

											echo   $fetch_post->total_positions.' 
											 Positions' ;
													}
													else{
														echo $fetch_post->total_positions.' Position' ;

													}	

												?>
												</i></span>
										</div>
									</div>

																	

									<div class="col-md-4 col-sm-4">
										<div class="brows-resume-name" style="text-align: center;">
											<span><i class="fa fa-yelp"></i>
											Exp. 
											  <span id="exp-td{{$fetch_post->post_id}}">{{$fetch_post->job_experience}} Year</span></span>
										</div>
									</div>

									<div class="col-md-2 col-sm-2">
										<div class="mng-resume-action" style="text-align: center;">

											<a type="button" onclick="update_front_post('{{$fetch_post->post_id}}');" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a> | 
											 <a type="button" onclick="delete_front_post('{{$fetch_post->post_id}}');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>

											
										</div>
									</div>

								</div>
								<div class="row extra-mrg row-skill">
									<div class="browse-resume-skills">
										<div class="col-md-7 col-sm-6">
											<div class="br-resume" id="skill-tags">
												<?php
												$str_tag=explode(",", $fetch_post->job_skills);
												$count_skill= count($str_tag);
                                                 for($i=0;$i<$count_skill;$i++){
                                                 	echo "<span>".$str_tag[$i]."</span>";
                                                 }
												 ?>
												
											</div>
										</div>
										<div class="col-md-5 col-sm-6">
											<div class="browse-resume-exp">
												

												<span class="resume-exp" style="margin-left:1%;"><button type="button" class="btn btn-success" onclick="view_post_private('{{$fetch_post->post_id}}');" style="height: 25px;padding-top: 1px;">view Detail</button></span>

												<!-- <span class="resume-exp"><button type="button" class="btn btn-success" onclick="view_applicants('{{$fetch_post->post_id}}');" style="height: 25px;padding-top: 1px;">view Applicants</button></span> -->

												<span class="resume-exp"><a href="{{url('applicants')}}/{{$fetch_post->post_id}}" class="btn btn-success" style="height: 25px;padding-top: 1px;">view Applicants</a></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<span class="tg-themetag tg-featuretag"><b>Posted At: {{ date('d M',strtotime($fetch_post->created_at)) }} </b></span>
						</article>

			    </div>
				@endforeach	
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
		</div>
		<!-- End Job List -->
		<!-- Start Friend List -->
		<div id="setting" class="tab-pane fade">
			<h3>Settings</h3>
			<div class="row">
				<!-- start email -->
				<div class="col-xs-12 col-md-6 col-md-offset-3">
					<div class="input-group">
						<a id="text-view" type="button" class="form-control" onclick="show_email_area();"><u>Edit Your Email</u></a>
						<div class="input-group-addon">
							<i class="fa fa-pencil"></i>
						</div>
					</div>
				</div>
					<!-- for check -->
					<div class="col-xs-12 col-md-6 col-md-offset-3" style="border:solid 1px #11b719; margin-bottom: 5%; margin-top:5%;padding: 2%;" id="email-area-setting">
				          <button type="button" class="close" onclick="hide_email_area();"><i class="fa fa-close"></i></button>
				          <hr/>
				        <div class="col-xs-12 col-md-12" id="email-error" style="color: red; text-align: center;">
				        	
				        </div>
				        <form id="updateEmailform">
					    <div class="col-xs-12 col-md-6">
							<label> Enter New Email</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Enter Email" name="new_email" id="new_email" />
								<div class="input-group-addon">
									<i class="fa fa-envelope"></i>
								</div>
							</div>
					    </div>
					    <div class="col-xs-12 col-md-6">
							<label> Enter Current Password</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Enter Password" name="curr_password" id="curr_password" />
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div>
							</div>
					    </div>
					    <div class="col-xs-12 col-md-6">
					    	<br/><br/>
							<a style="font-size:10px; color: grey; text-decoration: underline;" >Forget Email?</a>
					    </div>
					    <div class="col-xs-12 col-md-3 col-md-offset-3">
					    	<br/><br/>
							<button  type="button" class="btn btn-success" style="border:none; font-size:10px; color: white;" onclick="update_email_org();">Update Email</button>
					    </div>
					    </form>

				    </div>

					<!-- end chek -->

			    <!-- end email -->
				<!-- for password -->
				<div class="col-xs-12 col-md-6 col-md-offset-3">
					<div class="input-group">
						<a id="text-view" type="button" class="form-control" onclick="show_pass_area();"><u>Edit Your Password</u></a>
						<div class="input-group-addon">
							<i class="fa fa-pencil"></i>
						</div>
					</div>
				</div>
				<!-- for check -->
					<div class="col-xs-12 col-md-6 col-md-offset-3" style="border:solid 1px #11b719; margin-bottom: 5%; margin-top:5%;padding: 2%;" id="password-area-setting">
				          <button type="button" class="close" onclick="hide_pass_area();"><i class="fa fa-close"></i></button>
				          <hr/>
				        <div class="col-xs-12 col-md-12" id="password-error" style="color: red; text-align: center;">
				        	
				        </div>
				        <form id="updatepassform">
					    <div class="col-xs-12 col-md-6">
							<label> Enter New Password</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="New Password" name="new_password" id="new_password" />
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div>
							</div>
					    </div>
					    <div class="col-xs-12 col-md-6">
							<label> Enter Current Password</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Old Password" name="current_password" id="current_password" />
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div>
							</div>
					    </div>
					    <div class="col-xs-12 col-md-6">
					    	<br/><br/>
							<a style="font-size:10px; color: grey; text-decoration: underline;" >Forget Password?</a>
					    </div>
					    <div class="col-xs-12 col-md-4 col-md-offset-2">
					    	<br/><br/>
							<button type="button" class="btn btn-success" style="border:none; font-size:10px; color: white;margin-left: 8%;" onclick="update_org_pass();">Update Password</button>
					    </div>
						</form>

				    </div>

					<!-- end chek -->
				<!-- end password -->
			</div>
		</div>
		<!-- End Friend List -->

		<!--Company Insight -->
		<div id="insights" class="tab-pane fade">
			<div class="inbox-body inbox-widget">
				<h3>Company views</h3>
			</div>
		</div>
		<!-- Company Insight -->

		<!-- Company Review -->
		<div id="reviews" class="tab-pane fade">
			<div class="inbox-body inbox-widget">
				<h3>Company Reviews and Comments</h3>
		     </div>

		<?php 

		$id = 	Session::get('company_id');
		$org_reviews = DB::table('organization_reviews')->where('organization_id',$id)->first();
		
		if($org_reviews->review_description){

		}
		else{

			$org_reviews->review_description = "Enter Your Reviews About This Products!";
		}

		?>
		<form action="{{url('')}}" method="post">	
			<br/>
			<div class="col-sm-12">
				<label style="display:block">Rate out of 5</label>
				<div id="rateYo" style="display:inline-block;"></div>
				<div class="counter" style="display:inline-block;"></div>
			</div>

			<div class="col-sm-12">
			<br/>
				<textarea name="rating_pro" id="rating_pro">{{$org_reviews->review_description}}</textarea>
			</div>
			<div class="col-sm-12">
				<button type="button" onclick="company_review();" class="update-btn">Rate Product</button>
			</div>
			<br>
		</form>

		</div>
		<!-- Company Review -->

		<!--Company Location -->
		<div id="location" class="tab-pane fade" style="border-radius: 0px;">
			<div class="inbox-body inbox-widget">
				<h3> Company Location</h3>
				<p> Company location, through which users easily find you</p>
			</div>

			<button class="btn btn-lg btn btn-success"  href="#DemoModal2" data-toggle="modal"> See Location On Map</button>
			<!-- <div id="map">
				
			</div>
			<ul id="geoData">
			    <li>Latitude: <span id="lat-span"></span></li>
			    <li>Longitude: <span id="lon-span"></span></li>
			</ul> -->
		</div>


		<!-- Company Package -->
		<div id="company_packages" class="tab-pane fade">
			<div class="inbox-body inbox-widget">
				<div class="row">
					<div class="col-sm-8">
					<h3>Company Packages</h3>
					</div>
					<div class="col-sm-4">
					<img src="{{url('public/client_assets/img/stripe_3.png')}}" class="img-responsive payment-img" alt="" height="400" width="500" style="border-radius:0px">
					</div>
				</div>
				<br>
				
				<div class="row">
				<div class="col-md-4 col-sm-4">
						<div class="pr-table">
							<div class="pr-header">
								<div class="pr-plan">
									<h4>Free</h4>
								</div>
								<div class="pr-price">
									<h3><sub style="color:white">Already Availed</sub></h3>
								</div>
							</div>
							<div class="pr-features">
								<ul>
									<li>Unlimited featured jobs.</li>
									<li>Free view of Applicants Profiles/Resumes</li>
									<li>Free view of Applicants Profiles/Resumes</li>
									<li>----------</li>
									<li>----------</li>
									<li>----------</li>
								</ul>
							</div>
							<div class="pr-buy-button">
								<a href="#" class="pr-btn active" title="Price Button">More Details</a>
							</div>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-4">
						<div class="pr-table">
							<div class="pr-header active">
								<div class="pr-plan">
									<h4>Basic</h4>
								</div>
								<div class="pr-price">
									<h3><sub style="color:white">1,000 Rupees</sub></h3>
								</div>
							</div>
							<div class="pr-features">
								<ul>
									<li>Instant list of candidates matching your requirements.</li>
									<li>Advertisement of your company’s logo on our main page.</li>
									<li>Unlimited featured jobs.</li>
									<li>Free view of Applicants Profiles/Resumes</li>
									<li>Free view of Applicants Profiles/Resumes</li>
									
									
								</ul>
							</div>
							<div class="pr-buy-button">
								<!-- <a href="{{url('company-basic-payment-method')}}" class="pr-btn active" title="Price Button">Get Started</a> -->
							<form action="buy-package-basic" method="POST">
									{{ csrf_field() }}
									<script
									src="https://checkout.stripe.com/checkout.js" class="stripe-button"
									data-key="{{ env('STRIPE_KEY') }}"
									data-amount="100000"
									data-name="CareerSpoons"
									data-description="Purchase Basic Package"
									data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
									data-locale="auto"
									data-currency="pkr">
								</script>
							</form>


							</div>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-4">
						<div class="pr-table">
							<div class="pr-header">
								<div class="pr-plan">
									<h4>Premium</h4>
								</div>
								<div class="pr-price">
									<h3><sub style="color:white">Coming Soon<sub></h3>
								</div>
							</div>
							<div class="pr-features">
								<ul>
									<li>----------</li>
									<li>----------</li>
									<li>----------</li>
									<li>----------</li>
									<li>----------</li>
									<li>----------</li>
								</ul>
							</div>
							<div class="pr-buy-button">
								<a href="#" class="pr-btn active" title="Price Button">More Details</a>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
		<!-- Company Package -->


		<!-- Advertisement -->
		<div id="Advertisement_Logo" class="tab-pane fade">
			
			<div class="inbox-body inbox-widget">
				<h3>Advertisement Company Logo</h3>
				<br>

			
				<?php 
		
				if(Session::get('company_adverised_logo')=='0'){
					                                             ?>
				<form action="{{url('upload-company-logo')}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
				<div class="col-xs-12 col-md-6 col-md-offset-3">
					<div class="input-group">
						<a id="text-view" type="button" class="form-control"><input type="file" name="upload_company_logo"></a>
						<div class="input-group-addon">
							<i class="fa fa-image"></i>
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<button type="submit" class="update-btn">Upload logo</button>
				</div>
				</form>
				<br>

			<?php }else if(Session::get('company_package_status')=='1'){?>

				<table id="company_logo" class="display responsive no-wrap" style="width:100%">
					<thead>
						<tr>
							<th style="text-align: center;">Company</th>
							<th style="text-align: center;">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>asad</td>
							<td>asad</td>
						</tr>
					</tbody>
				</table>

			<?php } ?>

			

			</div>


		</div>
		<!-- Advertisement  -->





	</div>
	<!-- Start All Sec -->
						</div>  
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!-- Candidate Profile End -->

        <!-- model window for information -->
        <div id="info-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"> 
        	<div class="modal-dialog modal-lg">
        		<div class="modal-content">
        			<div class="modal-header"> <!-- modal header -->
        				<button type="button" class="close" 
        				data-dismiss="modal" aria-hidden="true">×</button>
        				<h4 class="modal-title">Information About You</h4>
        			</div>
        			<div class="modal-body"> <!-- modal body -->
        				<div class="row no-mrg">
        					<form method="post" action="{{url('adding-org-information')}}" enctype="Multipart/form-data">
        						@csrf
        						<div class="edit-pro" style="padding: 5%;">
        							<input type="hidden" name="id" value="{{$fetch_org->company_id}}">
        							<div class="col-md-6 col-sm-12">
        								<label>Branch Name or Code</label>
        								<input type="text" id="company_branch_name" name="company_branch_name" class="form-control" placeholder="Enter Branch name or code here">
        							</div>
        							<!-- Website link -->
        							<div class="col-md-6 col-sm-12">
        								<label>Website Link:</label>
        									<input type="link" placeholder="Insert Website Link Here" class="form-control" name="company_website" id="company_website">
        							</div>
        							<!-- No of Employees-->
        							<div class="col-md-6 col-sm-12">
        								<label>No of Employees:</label>
        									<select class="form-control" id="selected_employees" name="selected_employees">
        										<option value="" disabled="disabled" selected="selected">Select No of Employees</option>
        										<option value="Start Up">Start Up</option>
        										<option value="1 to 15">1 to 15</option>
        										<option value="15 to 25">15 to 25</option>
        										<option value="25 to 50">25 to 50</option>
        										<option value="50 to 100">50 to 100</option>
        										<option value="100 to 200">100 to 200</option>
        										<option value="more then 200">more then 200</option>
        									</select>
        								</div>
        								<!-- Industry -->
        								<div class="col-md-6 col-sm-12">
        									<label>Industry:</label>
        										<select name="selected_industry" class="form-control" placeholder="select industry" id="selected_industry">
        											<option id="industry-option" disabled="disabled" selected="selected">Select Industry</option>
        											<?php foreach($industry as $industry){?>
        											<option id="industry-option" value="{{$industry->company_industry_name}}">
        											<?php

        											$industry->company_industry_name= str_replace("_"," ",$industry->company_industry_name);
											echo $industry->company_industry_name;

        									
        											?></option>
        											<?php } ?>
        										</select>
        								</div>
        							<!-- Operating Since -->
        							<div class="col-md-6 col-sm-12">
        								<label>Operating Since:</label>
        									<input type="date" class="form-control" name="company_s" id="company_s" placeholder="11/25/2018" data-theme="my-style" data-format="S F, Y" data-large-mode="true" data-min-year="1970" data-max-year="2030" data-translate-mode="true" data-lang="en">
        								</div>

        								<!-- Address-->
        								<div class="col-md-6 col-sm-12">
        								<label>Location or Address:</label>
        								<input id="company_location" name="company_location" class="form-control" placeholder="Enter Address Here"/>
        								</div>

        								<!--  for Verification-->
        								<div class="col-md-6 col-sm-12">
        									<label>Gournment verification document:</label>
        									<span class="btn btn-success btn-file" style="width: 180px;margin-bottom: 3%;">
        										<i id="btn-up">Browse..</i><input type="file" name="company_doc" id="company_doc" >
        									</span>
        								</div>
        									<!-- About Company -->
        									<div class="col-md-12 col-sm-12">
        										<label>About Company (atleast  20 words):</label>
        											<textarea id="company_info" name="company_info" class="form-control"  placeholder="Enter Some Info About Your Company Here...."></textarea>
        									</div>
        						</div>		
        				</div>
        			</div>
        			<div class="modal-footer"> <!-- modal footer -->
        				<button type="submit"class="btn btn-success">Save</button>
        				<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
        			</div>
        			</form>
        		</div>
        	</div>
        </div>
		<!-- model window end -->
        <!-- model window for view single post  -->
        <div id="append-view-post"></div>
		<!-- model window end -->

		<!-- model window for view single post  -->
        <div id="append-edit-post"></div>
		<!-- model window end -->

<!-- edit detail -->
<div id="updatedetailfront" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Your Information</h4>
         
        </div>
        <div class="modal-body" id="modal-content">
        	<div class="row" style="padding: 5%;">
        		<form action="{{url('update-org-info-front')}}" method="post">
        		@csrf
        		<div class="col-md-6 col-sm-6">
        			<label>Company Name:</label>
        			<input class="form-control" placeholder="Enter Company Name" name="new_company_name" id="new_company_name" value="{{$data->company_name}}" />
        		</div>
        		<div class="col-md-6 col-sm-6">
        			<label>Company type:</label>
        			<select name="new_selected_company_type" class="form-control" placeholder="select no of Employees" id="new_selected_company_type">
					<option id="type-option" value="{{$data->company_type}}" selected="selected" hidden="hidden" readonly="readonly">{{$data->company_type}}</option>
					@foreach($fetch_up_type as $do_type)
					<option id="type-option" value="{{$do_type->company_type_name}}">{{$do_type->company_type_name}}</option>
					@endforeach
					</select>
        		</div>
        		<div class="col-md-6 col-sm-6">
        			<label>City:</label>
        			<select name="new_selected_city" class="form-control" placeholder="select city" id="new_selected_city">
					<option id="city-option" value="{{$data->company_city}}"  selected="selected" hidden="hidden" readonly="readonly">{{$data->company_city}}</option>
                    @foreach($fetch_up_city as $do_city)
					<option id="city-option" value="{{$do_city->company_city_name}}">{{$do_city->company_city_name}}</option>
					@endforeach

					</select>
        		</div>
        		<div class="col-md-6 col-sm-6">
        			<label>Branch Name OR Code:</label>
        			<input type="text" class="form-control" placeholder="Enter Branch Name or Code" name="new_company_branch_name" id="new_company_branch_name" value="{{$data->company_branch}}" />
        		</div>
        		<div class="col-md-6 col-sm-6">
        			<label>Company Phone no:</label>
        			<input type="text" placeholder="Enter Phone No" class="form-control" name="new_company_phone" id="new_company_phone" value="{{$data->company_phone}}" />
        		</div>
        		<div class="col-md-6 col-sm-6">
        			<label>Company Website Link:</label>
        			<input type="link" placeholder="Insert Website Link Here" class="form-control" name="new_company_website" id="new_company_website" value="{{$data->company_website}}" />
        		</div>
        		<div class="col-md-6 col-sm-6">
        			<label>Company Employees:</label>
        			<select class="form-control" id="new_selected_employees" name="new_selected_employees">
					<option value="{{$data->company_employees}}" hidden="hidden" readonly="readonly" selected="selected">{{$data->company_employees}}</option>
					<option value="Start Up">Start Up</option>
					<option value="1 to 15">1 to 15</option>
					<option value="15 to 25">15 to 25</option>
					<option value="25 to 50">25 to 50</option>
					<option value="50 to 100">50 to 100</option>
					<option value="100 to 200">100 to 200</option>
					<option value="more then 200">more then 200</option>
					</select>
        		</div>
        		<div class="col-md-6 col-sm-6">
        			<label>Company Industry</label>
        			<select name="new_selected_industry" class="form-control" placeholder="select industry" id="new_selected_industry">
					<option id="industry-option" selected="selected" value="{{$data->company_industry}}" hidden="hidden" readonly="readonly">{{$data->company_industry}}</option>
					@foreach($fetch_up_indus as $do_indus)
					<option id="industry-option" value="{{$do_indus->company_industry_name}}">

						<?php 

						$do_indus->company_industry_name= str_replace("_"," ",$do_indus->company_industry_name);
				         echo $do_indus->company_industry_name;
						
						?>

					</option>
					@endforeach
					</select>
        		</div>
        		<div class="col-md-6 col-sm-6">
        			<label>Company since:</label>
        			<input type="date" class="form-control" name="new_company_since" id="new_company_since"  data-theme="my-style" data-format="S F- Y" data-large-mode="true" data-min-year="1970" data-max-year="2030" data-translate-mode="true" data-lang="en" value="{{$data->company_since}}" data-default-date="{{$data->company_since}}" />
        			<!-- <input type="date" data-default-date="{{$data->company_since}}" id="new_company_since" name="new_company_since" class="form-control" data-min-year="1970" data-max-year="2030"> -->
        		</div>
        		<div class="col-md-6 col-sm-6">
        			<label>Company location OR Address</label>
        			<input id="new_company_location" name="new_company_location" class="form-control" placeholder="Enter Address Here" value="{{$data->company_location}}" />
        		</div>

        	</div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success upload-result">Update</button>
         	 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </form>
        </div>
      </div>
  </div>
</div>
<!-- end modal window -->

<!-- Profile Upload Model Window -->

<div id="uploadOrganization_profile" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Profile Image</h4>
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
        	<div class="col-md-12" style="margin-left:30px;"><input type="file" id="upload" name="org_img"></div>
            <div class="col-md-6 text-center">
                <div id="upload-demo" style="width:350px"></div>
            </div>
           <!--  <div class="col-md-6">
                <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
            </div> -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success upload-result">Upload</button>
         	 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
  </div>
</div>

<!-- model window for map -->

<!-- Modal Contents -->
    <div id="DemoModal2" class="modal fade "> <!-- class modal and fade -->
      
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
           <div class="modal-header"> <!-- modal header -->
            <button type="button" class="close" 
             data-dismiss="modal" aria-hidden="true">×</button>
			 
                    <h4 class="modal-title">Map</h4>
           </div>
		 
     <div class="modal-body" style="padding: 3%;"> <!-- modal body -->
            <div id="map">
				
			</div>
			<!-- <ul id="geoData" style="padding-top: 3%;">
			    <li>Latitude: <span id="lat-span"></span></li>
			    <li>Longitude: <span id="lon-span"></span></li>
			</ul> -->
     </div>
	 
     <div class="modal-footer"> <!-- modal footer -->
       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel!</button>
      </div>
				
      </div> <!-- / .modal-content -->
      
    </div> <!-- / .modal-dialog -->
      
 </div><!-- / .modal -->


<div id="view-user"></div>




<style type="text/css">
.DemoModal2{margin:20px;}
#text-view:hover {
	cursor:pointer;
	color: grey;
}
.bgg{
	padding: 2%;
	float: left;
	background-color: #F1F2F2;
	margin-bottom: 10px;
}
#butn{
	height: 43px;
	padding-top: 4%;
	border-radius: 25%;
	border:none;
}
#del_butn{
	margin-top: 3%;
	border-radius: 25%;
	border:none;
}
.btn-file {
	position: relative;
	overflow: hidden;
}
.btn-file input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	min-width: 100%;
	min-height: 100%;
	font-size: 100px;
	text-align: right;
	filter: alpha(opacity=0);
	opacity: 0;
	outline: none;
	background: white;
	cursor: inherit;
	display: block;
}
#foot-p{
	float: left;
	padding-left:5%;
	display: block;
	padding-top: 3%;
}
 #map {
            width: 100%;
            height: 400px;
        }

</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJjtzMZotb60YwDCSgUSmsj4i4oGFZLjQ &callback=initMap" async defer></script>
	   <script type="text/javascript">
		$(function() {

		  // We can attach the `fileselect` event to all file inputs on the page
		  $(document).on('change', ':file', function() {
		    var input = $(this),
		        numFiles = input.get(0).files ? input.get(0).files.length : 1,
		        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		    input.trigger('fileselect', [numFiles, label]);
		  });

		  // We can watch for our custom `fileselect` event like this
		  $(document).ready( function() {
		      $(':file').on('fileselect', function(event, numFiles, label) {

		          var input = $(this).parents('.input-group').find(':text'),
		              log = numFiles > 1 ? numFiles + ' files selected' : label;

		          if( input.length ) {
		              input.val(log);
		          } else {
		              //if( log ) alert("yes"+log);
		              $("#btn-up").html(log);
		          }

		      });
		  });
		  
		});
	   </script>


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
			            url: "company-upload-image",
			            type: "post",
			            data: {_token:CSRF_TOKEN,"image":resp},
			            success: function (data) {
			            // 	 html = '<img src="'+resp+'"/>';        
					          // $("#upload-demo-i").html(html);
					          if(data){
					             html = "<img class='img' src='{{url('uploads/organization_images')}}/"+data+"' alt='Avatar' title='Change the avatar'>";  
					             $("#Orgimg-div").html(html);
					            
					            $("#uploadOrganization_profile .close").click();
					          }
			                			                
			            }
			        });
			    });
			});



			</script>
			<script type="text/javascript">
				$(function() {
					$("#email-area-setting").hide();
					$("#password-area-setting").hide();
				});
				function hide_email_area(){
					$("#email-area-setting").hide();
				}
				function show_email_area(){
					$("#email-area-setting").show();
				}
				function hide_pass_area(){
					$("#password-area-setting").hide();
				}
				function show_pass_area(){
					$("#password-area-setting").show();
				}
			</script>


			<!-- <script>
				var x,y;
			function initMap() {
				
				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
				$.post("fetch-city",{_token:CSRF_TOKEN},function(data){
 
				
				var strn = data.split(" ");
				 x=strn[0];
				 y=strn[1];
				 var n=strn[2].split("_");
				 var res=n.join(" ");
				 //var res = str.replace("_"," ",strn[2]);
				  // alert(res);

			    var Pak = {lat: parseFloat(x), lng: parseFloat(y)};
			    var map = new google.maps.Map(document.getElementById('map'), {
			      center: Pak,
			      zoom: 14
			    });
			   

			  
			    var marker = new google.maps.Marker({
			          position: Pak,
			          map: map,
			          title: res,
			       
			        });
			  
			     google.maps.event.addListener(marker, 'dragend', function(marker) {
			        var latLng = marker.latLng;
			        document.getElementById('lat-span').innerHTML = latLng.lat();
			        document.getElementById('lon-span').innerHTML = latLng.lng();
			     });

			     });
			}
  
           </script> -->
<script type="text/javascript">
	function view_applicants(p_id){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.post("{{url('view-applicants')}}",{_token:CSRF_TOKEN,p_id:p_id},function(data){
          //alert(data);
          $("#view-user").html(data);
          $("#users_list").modal("show");
		});
	}

	function go(p,c,u){
		//alert("p= "+p+"c= "+c+"u= "+u);
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.post("{{url('change-view-status')}}",{_token:CSRF_TOKEN,p:p,c:c,u:u},function(data){
        //alert("yes");
		});

	}

	
</script>
<script type="text/javascript">
	
	function ref_info(){
    $("#info").load(location.href+" #info>*","");
	}
	function ref_new(){
	$("#new-job").load(location.href+" #new-job>*","");
	}
	function ref_total(){
	$("#total-posts").load(location.href+" #total-posts>*","");
	}
	function ref_media(){
	$("#social_media").load(location.href+" #social_media>*","");
	}
	// function ref_setting(){
	// $("#setting").load(location.href+" #setting>*","");
	// }
	function ref_insight(){
	$("#insights").load(location.href+" #insights>*","");
	}
	// function ref_reviews(){
	// $("#reviews").load(location.href+" #reviews>*","");
	// }
	function ref_loc(){
	$("#location").load(location.href+" #location>*","");
	}
	
</script>



@endsection