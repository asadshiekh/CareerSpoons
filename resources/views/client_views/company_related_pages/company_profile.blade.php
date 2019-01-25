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
                    

                    <div class="detail-pic"><img src="{{url('uploads/organization_images/')}}/{{$fetch_pic->company_img}}" class="img" alt="" /><a data-toggle="modal" data-target="#uploadOrganization_profile" class="detail-edit" title="edit"><i class="fa fa-pencil"></i></a></div>


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
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        @if(Session::get('registeration_process')=="N")
                        <div class="col-md-7 col-sm-7">
                            <div class="detail-pannel-footer-btn pull-right"><a href="javascript:void(0)" data-toggle="modal" data-target="#info-modal" class="footer-btn grn-btn" title="">Add Info</a></div>
                        </div>
                        @elseif (Session::get('registeration_process')=="C")
                        <div class="col-md-7 col-sm-7">
                            <div class="detail-pannel-footer-btn pull-right"><a href="javascript:void(0)" class="footer-btn grn-btn" title="">Viewed as Public</a></div>
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
						<li><a data-toggle="tab" href="#info">Info</a></li>
						<li><a data-toggle="tab" href="#new-job">New-Job-Post</a></li>
						<li><a data-toggle="tab" href="#total-posts">Total-Posts</a></li>
						<li><a data-toggle="tab" href="#social_media">Social-Media</a></li>
						<li><a data-toggle="tab" href="#setting">Settings <span class="info-bar">6</span></a></li>
						<li><a data-toggle="tab" href="#insights">Insights</a></li>
						<li><a data-toggle="tab" href="#reviews">Reviews</a></li>
					</ul>
							
							<!-- Start Bio Sec -->
							<div class="tab-content">
								<div id="bios" class="tab-pane fade in active">
									<h3>You Bio</h3>
									<p><?php
				                      $fetch_org->company_info  = str_ireplace('<p>','',$fetch_org->company_info);
				                      echo $fetch_org->company_info  = str_ireplace('</p>','',$fetch_org->company_info);

				                      ?></p>
								</div>
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
				                      <li><span>Industry:</span>{{$fetch_org->company_industry}}</li>
				                      <li><span>Since:</span>{{$fetch_org->company_since}}</li>
				                      <li><span>CNIC:</span>{{$fetch_org->company_cnic}}</li>
				                      <li><span>Location:</span>{{$fetch_org->company_location}}</li>
										
									</ul>
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
												<select class="form-control" name="req_functional_area" id="req_functional_area">
													<option disabled="disabled" hidden="hidden">Select Required Functional area</option>
													@foreach($area as $area)
        											<option id="industry-option" value="{{$area->area_title}}">{{$area->area_title}}</option>
        											@endforeach
												</select>
											</div>
											<div class="col-md-4 col-sm-6">
												<label>Majors</label>
												<select class="form-control" name="selected_majors" id="selected_majors">
													<option disabled="disabled" hidden="hidden">Select Required Majors</option>
													@foreach($major as $major)
        											<option id="industry-option" value="{{$major->major_title}}">{{$major->major_title}}</option>
        											@endforeach
												</select>
											</div>
											<div class="col-md-4 col-sm-6">
												<label>Industry</label>
												<select class="form-control" name="req_industry" id="req_industry">
													<option disabled="disabled" hidden="hidden">Select Required Industry</option>
													@foreach($industry1 as $industry1)
        											<option id="industry-option" value="{{$industry1->company_industry_name}}">{{$industry1->company_industry_name}}</option>
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
<input type="checkbox" id="toggle-two" data-onstyle="success" data-offstyle="danger">
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
<button type="submit" class="update-btn">Update Now</button>
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
									<!-- <div class="col-md-2 col-sm-2">
										<div class="brows-resume-pic">
											<img src="assets/img/can-4.png" class="img-responsive" alt="" />
										</div>
									</div> -->
									<div class="col-md-4 col-sm-4">
										<div class="brows-resume-name">
											<h4 id="job_name{{$fetch_post->post_id}}">{{$fetch_post->job_title}}</h4>
											<span class="brows-resume-designation">( <i id="industry-td{{$fetch_post->post_id}}">{{$fetch_post->req_industry}} </i>)</span>

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
										<div class="col-md-9 col-sm-8">
											<div class="br-resume">
												<?php
												$str_tag=explode(",", $fetch_post->job_skills);
												$count_skill= count($str_tag);
                                                 for($i=0;$i<$count_skill;$i++){
                                                 	echo "<span>".$str_tag[$i]."</span>";
                                                 }
												 ?>
												
											</div>
										</div>
										<div class="col-md-3 col-sm-4">
											<div class="browse-resume-exp">
												<span class="resume-exp"><button type="button" class="btn btn-success" onclick="view_post_private('{{$fetch_post->post_id}}');" style="height: 25px;padding-top: 1px;">view</button></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<span class="tg-themetag tg-featuretag"><b>Posted At: {{ date('d M',strtotime($fetch_post->created_at)) }} </b></span>
						</article>

			    </div>
				@endforeach	
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
		<!-- End Job List -->
		<!-- Start Friend List -->
		<div id="setting" class="tab-pane fade">
			<h3>Settigs</h3>
		<div class="row">
			
		</div>
		</div>
		<!-- End Friend List -->

		<!-- Start Message -->
		<div id="insights" class="tab-pane fade">
			<div class="inbox-body inbox-widget">
				<h3>Company views</h3>
			</div>
		</div>
		<!-- End Message -->

		<!-- Start Message -->
		<div id="reviews" class="tab-pane fade">
			<div class="inbox-body inbox-widget">
				<h3>Company Reviews and Comments</h3>
			</div>
		</div>
		<!-- End Message -->

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
        					<form method="post" action="{{url('company-profile/adding-org-information')}}" enctype="Multipart/form-data">
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
        											@foreach($industry as $industry)
        											<option id="industry-option" value="{{$industry->company_industry_name}}">{{$industry->company_industry_name}}</option>
        											@endforeach
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






		<style type="text/css">
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

	   </style>
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
			            url: "",
			            type: "post",
			            data: {_token:CSRF_TOKEN,"image":resp},
			            success: function (data) {
			                // html = '<img src="'+resp+'"/>';
			                // $("#upload-demo-i").html(html);
			                // html1 = '<a href="http://careerspoons.com/uploads/client_site/profile_pic/'+data+'" target="_blank"><img src="http://careerspoons.com/uploads/client_site/profile_pic/'+data+'" /></a>';
			                // $("#image_div").html(html1);
			                // setTimeout(
			                // 	function(){

			                // 		swal('Profile Updated Successfully!','','success');
			                // 	},
			                // 	500
			                // 	);

			                // setTimeout(
			                // 	function(){

			                // 		$("#uploadUser_profile .close").click();

			                // 	},
			                // 	500
			                // 	);
			                			                
			            }
			        });
			    });
			});



			</script>


@endsection