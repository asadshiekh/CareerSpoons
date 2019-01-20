@extends('client_views.master')
@section('content')

			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url(public/client_assets/img/banner-10.jpg);">
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
                    <div class="detail-pic"><img src="{{url('uploads/organization_images/')}}/{{$fetch_pic->company_img}}" class="img" alt="" /><a href="#" class="detail-edit" title="edit"><i class="fa fa-pencil"></i></a></div>
                    <div class="detail-status"><span>Active Now</span></div>
                </div>
				
                <div class="row bottom-mrg">
                    <div class="col-md-12 col-sm-12">
                        <div class="advance-detail detail-desc-caption">
                            <h4>{{$fetch_org->company_name}}</h4><span class="designation">( {{$fetch_org->company_type}} )</span>
                            <ul>
                                <li><strong class="j-view">85</strong>New Post</li>
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
                        <div class="col-md-7 col-sm-7">
                            <div class="detail-pannel-footer-btn pull-right"><a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="footer-btn grn-btn" title="" onclick="nayab();">Add Info</a></div>
                        </div>
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
						<li><a data-toggle="tab" href="#setting">Settings <span class="info-bar">6</span></a></li>
						<li><a data-toggle="tab" href="#insights">Insights</a></li>
						<li><a data-toggle="tab" href="#reviews">Reviews</a></li>
					</ul>
							
							<!-- Start Bio Sec -->
							<div class="tab-content">
								<div id="bios" class="tab-pane fade in active">
									<h3>You Bio</h3>
									<p>{{$fetch_org->company_info}}</p>
								</div>
								<!-- End Bio Sec -->
							<!-- Start All Sec -->
							
								<div id="info" class="tab-pane fade">
									<h3>Information About You</h3>
									<ul class="job-detail-des">
										<li><span>Address:</span>SCO 210, Neez Plaza</li>
										
									</ul>
								</div>
								<!-- End info Sec -->
								
								<!-- Start new posts Sec -->
								<div id="new-job" class="tab-pane fade">
									<h3>New Job Post</h3>
									<form>
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
													<option value="">yes</option>
												</select>
											</div>
											<div class="col-md-4 col-sm-6">
												<label>Majors</label>
												<select class="form-control" name="selected_majors" id="selected_majors">
													<option disabled="disabled" hidden="hidden">Select Required Majors</option>
													<option value="">yes</option>
												</select>
											</div>
											<div class="col-md-4 col-sm-6">
												<label>Industry</label>
												<select class="form-control" name="req_industry" id="req_industry">
													<option disabled="disabled" hidden="hidden">Select Required Industry</option>
													<option value="">yes</option>
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
												<input type="date" id="last_apply" name="last_apply_date"  class="form-control" placeholder="11/25/2018" data-theme="my-style" data-format="S F, Y" data-large-mode="true" data-min-year="1970" data-max-year="2030" data-translate-mode="true" data-lang="en"/>
											</div>
											<div class="col-md-4 col-sm-6">
												<label>Post visibility Date:</label>
												<input type="date" class="form-control" id="post_visible" name="post_visibility_date" placeholder="select date" data-theme="my-style" data-format="S F, Y" data-large-mode="true" data-min-year="1970" data-max-year="2030" data-translate-mode="true" data-lang="en"/>
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
												<select name="selected_qualification[]" class="form-control" id="selected_qualification[]">
					                            <option hidden disabled="disabled" selected="selected">Select Required Qualification</option>
					                            <option value="">yes</option>
					                          </select>
											</div>
											<div class="col-md-4 col-sm-4">
												<label>Required Degree Level</label>
												<select name="req_degree[]" class="form-control" id="req_degree[]">
					                            <option hidden disabled="disabled" selected="selected">Select Required Degree Level</option>
					                            <option value="">yes</option>
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
												<label>Required Degree Level</label>
												<textarea class="form-control" id="post_information" class="post_information"></textarea>
											</div>
											
											<div class="col-sm-12">
												<button type="button" class="update-btn">ADD Post</button>
											</div>
										</div>
										
									</form>
								</div>
								<!-- End Address Sec -->
								
		<!-- Start Job List -->
		<div id="total-posts" class="tab-pane fade">
			<h3>Matches-job 122 new job</h3>
			<div class="row">
				<article class="advance-search-job">
					<div class="row no-mrg">
						<div class="col-md-6 col-sm-6">
							<a href="new-job-detail.html" title="job Detail">
								<div class="advance-search-img-box"><img src="{{url('public/client_assets/img/com-2.jpg')}}" class="img-responsive" alt=""></div>
							</a>
							<div class="advance-search-caption"><a href="new-job-detail.html" title="Job Dtail"><h4>Product Designer</h4></a><span>Google Ltd</span></div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="advance-search-job-locat">
								<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
							</div>
						</div>
						<div class="col-md-2 col-sm-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="btn advance-search" title="apply">View</a></div>
					</div>
					
				</article>	
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
		<div class="row"></div>
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
        @endif
		<!-- Candidate Profile End -->
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

	   </style>
@endsection