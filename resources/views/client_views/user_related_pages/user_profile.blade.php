@extends('client_views.master')
@section('content')
<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url('public/client_assets/img/gtrr.jpg');">

	<div class="container" style="margin-bottom: 280px">
		
	</div>

</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- Candidate Profile Start -->
<section class="detail-desc advance-detail-pr gray-bg">
	<div class="container white-shadow">

		<div class="row">

			<!-- <div class="pull-left">
				Profile Strength<div id="circle" ></div>
			</div> -->


			<div class="detail-pic"><img src="{{url('public/client_assets/img/can-1.png')}}" class="img" alt="" /><a href="#" class="detail-edit" title="edit"><i class="fa fa-pencil"></i></a></div>


			@if(Session::get('email_status')=='1')
			<div class="detail-status"><span class="protip" data-pt-scheme="leaf" data-pt-gravity="top 0 -15; bottom 0 15" data-pt-title="Candidate is Verify By Email" data-pt-animate="bounceIn">Verified Candidate</span></div>
			@else
			<div class="detail-status"><span class="protip" data-pt-gravity="top 0 -15; bottom 0 15" data-pt-title="Verified Your Email To Became A Verified Candidate" data-pt-animate="shake" style="background-color: red; color: white">Verification Required</span></div>
			@endif

		</div>

		<div class="row bottom-mrg">
			<div class="col-md-12 col-sm-12">
				<div class="advance-detail detail-desc-caption">


					<div id="typed-strings">
						<div class="contains_heading" style="font-size: 6px">
							<h4>Welcome {{Session::get('candidate_name')}}</h4>
							<p style="color: limegreen">( 
								@if(Session::has('candidate_profession'))
								{{Session::get('candidate_profession')}}
								@else
								Your Profession Title
								@endif



							)</p>

						</div>
					</div>

					<span id="typed"></span>


					<ul>
						<li><strong class="j-view">0</strong>New Post</li>
						<li><strong class="j-applied">0</strong>Job Applied</li>
						<li><strong class="j-shared">0</strong>Invitation</li>
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
					@if(Session::get('cv_status')==0)
					<div class="detail-pannel-footer-btn pull-right"><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal" class="footer-btn grn-btn" title="">Upload Resume</a><a href="{{url('make-user-resume')}}" class="footer-btn blu-btn" title="">Make Resume</a>
					</div>
					@elseif (Session::get('cv_status')==1)
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
					<div class="alert alert-info" style="border:none;border-radius: 20px; display: inline-block;margin-top:50px">
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
						<li class="active"><a  data-toggle="tab" href="#about">About</a></li>
						<li><a data-toggle="tab" href="#address">Info</a></li>
						<li><a data-toggle="tab" href="#education_table">Resume Info</a></li>
						<li><a data-toggle="tab" href="#profile_meter">Profile Strength</a></li>
						<li><a data-toggle="tab" href="#address">Skills</a></li>
						<li><a data-toggle="tab" href="#matches-job">Matches-Job</a></li>
						<li><a data-toggle="tab" href="#matches-job">Insight</a></li>
						<!-- <li><a data-toggle="tab" href="#friends">Friends</a></li> -->
						<!-- <li><a data-toggle="tab" href="#messages">Messages <span class="info-bar">6</span></a></li> -->
						<li><a data-toggle="tab" href="#settings">Settings</a></li>
					</ul>


					<!-- Start All Sec -->
					<div class="tab-content">

						<div id="about" class="tab-pane fade in active">
							<h3>Your Bio </h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore .</p>
							<div class="col-sm-12">
								<button type="button" class="update-btn">Update Bio</button>
							</div>
							<br>
						</div>
						<!-- End About Sec -->

						<!-- Start Address Sec -->
						<div id="address" class="tab-pane fade">
							<h3>Address Info</h3>
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
										</select>
									</div>
									<br>
									<div class="pie_charts" id="pie_charts">

										<canvas id="piechart" style="height:40vh; width:80vw"></canvas>
										<p style="margin-top: 20px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore .</p>

									</div>


									<div class="line_charts" id="line_charts">
										
										<canvas id="linechart" style="height:40vh; width:80vw"></canvas>
										<p style="margin-top: 20px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore .</p>

									</div>

								</div>
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
								<table id="myEduction" class="display">
									<thead>
										<tr>
											<th>ID</th>
											<th>Insistute Name</th>
											<th>Location</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Punjab College</td>
											<td>Lahore Cantt</td>

										</tr>
										<tr>
											<td>2</td>
											<td>South Aisa</td>
											<td>Mall Of Lahore</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Catherdal</td>
											<td>Lahore Cantt</td>
										</tr>
									</tbody>
								</table>
								<br/><hr>
							</div>

							<div class="candidate_experience" id="candidate_experience">
								<h3>Experenice-Info</h3>
								<br/>
								<table id="userExperience" class="display">
									<thead>
										<tr>
											<th>ID</th>
											<th>Insistute Name</th>
											<th>Location</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Punjab College</td>
											<td>Lahore Cantt</td>

										</tr>
										<tr>
											<td>2</td>
											<td>South Aisa</td>
											<td>Mall Of Lahore</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Catherdal</td>
											<td>Lahore Cantt</td>
										</tr>
									</tbody>
								</table>
								<hr>
							</div>

							<div class="candidate_project" id="candidate_project">
								<h3>Project Info</h3>
								<br/>
								<table id="userProject" class="display">
									<thead>
										<tr>
											<th>ID</th>
											<th>Insistute Name</th>
											<th>Location</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Punjab College</td>
											<td>Lahore Cantt</td>

										</tr>
										<tr>
											<td>2</td>
											<td>South Aisa</td>
											<td>Mall Of Lahore</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Catherdal</td>
											<td>Lahore Cantt</td>
										</tr>
									</tbody>
								</table>
								<br/><hr>
							</div>

							<div class="candidate_skill" id="candidate_skill">
								<h3>Your Skills</h3>
								<br/>
								<table id="userSkills" class="display">
									<thead>
										<tr>
											<th>ID</th>
											<th>Insistute Name</th>
											<th>Location</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Punjab College</td>
											<td>Lahore Cantt</td>

										</tr>
										<tr>
											<td>2</td>
											<td>South Aisa</td>
											<td>Mall Of Lahore</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Catherdal</td>
											<td>Lahore Cantt</td>
										</tr>
									</tbody>
								</table>
								<br/><hr>
							</div>

							<div class="candidate_languages" id="candidate_languages">
								<h3>Your Languages</h3>
								<br/>
								<table id="userLanguage" class="display">
									<thead>
										<tr>
											<th>ID</th>
											<th>Insistute Name</th>
											<th>Location</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Punjab College</td>
											<td>Lahore Cantt</td>

										</tr>
										<tr>
											<td>2</td>
											<td>South Aisa</td>
											<td>Mall Of Lahore</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Catherdal</td>
											<td>Lahore Cantt</td>
										</tr>
									</tbody>
								</table>
								<br/><hr>
							</div>

							<div class="candidate_hobbies" id="candidate_hobbies">
								<h3>Your Hobbies</h3>
								<br/>
								<table id="userHobbies" class="display">
									<thead>
										<tr>
											<th>ID</th>
											<th>Insistute Name</th>
											<th>Location</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Punjab College</td>
											<td>Lahore Cantt</td>

										</tr>
										<tr>
											<td>2</td>
											<td>South Aisa</td>
											<td>Mall Of Lahore</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Catherdal</td>
											<td>Lahore Cantt</td>
										</tr>
									</tbody>
								</table>
								<br/><hr>
							</div>


						</div>
						<!-- End Address Sec -->

						<!-- Start Job List -->
						<div id="matches-job" class="tab-pane fade">
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
										<div class="col-md-2 col-sm-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="btn advance-search" title="apply">Apply</a></div>
									</div>
									<span class="tg-themetag tg-featuretag">Premium</span>
								</article>

								<article class="advance-search-job">
									<div class="row no-mrg">
										<div class="col-md-6 col-sm-6">
											<a href="new-job-detail.html" title="job Detail">
												<div class="advance-search-img-box"><img src="{{url('public/client_assets/img/com-6.jpg')}}" class="img-responsive" alt=""></div>
											</a>
											<div class="advance-search-caption"><a href="new-job-detail.html" title="Job Dtail"><h4>Project Manager</h4></a><span>Vertue Ltd</span></div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="advance-search-job-locat">
												<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
											</div>
										</div>
										<div class="col-md-2 col-sm-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="btn advance-search" title="apply">Apply</a></div>
									</div>
								</article>

								<article class="advance-search-job">
									<div class="row no-mrg">
										<div class="col-md-6 col-sm-6">
											<a href="new-job-detail.html" title="job Detail">
												<div class="advance-search-img-box"><img src="{{url('public/client_assets/img/com-7.jpg')}}" class="img-responsive" alt=""></div>
											</a>
											<div class="advance-search-caption"><a href="new-job-detail.html" title="Job Dtail"><h4>Database Designer</h4></a><span>Twitter Ltd</span></div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="advance-search-job-locat">
												<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
											</div>
										</div>
										<div class="col-md-2 col-sm-2"><a href="#" class="btn applied advance-search" title="applied"><i class="fa fa-check" aria-hidden="true"></i>Applied</a></div>
									</div>
								</article>

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
										<div class="col-md-2 col-sm-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="btn advance-search" title="apply">Apply</a></div>
									</div>
									<span class="tg-themetag tg-featuretag">Premium</span>
								</article>

								<article class="advance-search-job">
									<div class="row no-mrg">
										<div class="col-md-6 col-sm-6">
											<a href="new-job-detail.html" title="job Detail">
												<div class="advance-search-img-box"><img src="{{url('public/client_assets/img/com-5.jpg')}}" class="img-responsive" alt=""></div>
											</a>
											<div class="advance-search-caption"><a href="new-job-detail.html" title="Job Dtail"><h4>Human Resource</h4></a><span>Skype Ltd</span></div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="advance-search-job-locat">
												<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
											</div>
										</div>
										<div class="col-md-2 col-sm-2"><a href="#" class="btn applied advance-search" title="applied"><i class="fa fa-check" aria-hidden="true"></i>Applied</a></div>
									</div>
								</article>

								<article class="advance-search-job">
									<div class="row no-mrg">
										<div class="col-md-6 col-sm-6">
											<a href="new-job-detail.html" title="job Detail">
												<div class="advance-search-img-box"><img src="{{url('public/client_assets/img/com-6.jpg')}}" class="img-responsive" alt=""></div>
											</a>
											<div class="advance-search-caption"><a href="new-job-detail.html" title="Job Dtail"><h4>Project Manager</h4></a><span>Vertue Ltd</span></div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="advance-search-job-locat">
												<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
											</div>
										</div>
										<div class="col-md-2 col-sm-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="btn advance-search" title="applied">Apply</a></div>
									</div>
									<span class="tg-themetag tg-featuretag">Premium</span>
								</article>

								<article class="advance-search-job">
									<div class="row no-mrg">
										<div class="col-md-6 col-sm-6">
											<a href="new-job-detail.html" title="job Detail">
												<div class="advance-search-img-box"><img src="{{url('public/client_assets/img/com-7.jpg')}}" class="img-responsive" alt=""></div>
											</a>
											<div class="advance-search-caption"><a href="new-job-detail.html" title="Job Dtail"><h4>CEO &amp; Manager</h4></a><span>Twitter</span></div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="advance-search-job-locat">
												<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
											</div>
										</div>
										<div class="col-md-2 col-sm-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="btn advance-search" title="apply">Apply</a></div>
									</div>
								</article>

								<article class="advance-search-job">
									<div class="row no-mrg">
										<div class="col-md-6 col-sm-6">
											<a href="new-job-detail.html" title="job Detail">
												<div class="advance-search-img-box"><img src="{{url('public/client_assets/img/com-4.jpg')}}" class="img-responsive" alt=""></div>
											</a>
											<div class="advance-search-caption"><a href="new-job-detail.html" title="Job Dtail"><h4>Product Designer</h4></a><span>Microsoft Ltd</span></div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="advance-search-job-locat">
												<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
											</div>
										</div>
										<div class="col-md-2 col-sm-2"><a href="#" class="btn applied advance-search" title="applied"><i class="fa fa-check" aria-hidden="true"></i>Applied</a></div>
									</div>
								</article>

								<article class="advance-search-job">
									<div class="row no-mrg">
										<div class="col-md-6 col-sm-6">
											<a href="new-job-detail.html" title="job Detail">
												<div class="advance-search-img-box"><img src="{{url('public/client_assets/img/com-3.jpg')}}" class="img-responsive" alt=""></div>
											</a>
											<div class="advance-search-caption"><a href="new-job-detail.html" title="Job Dtail"><h4>PHP Developer</h4></a><span>Honda Ltd</span></div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="advance-search-job-locat">
												<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
											</div>
										</div>
										<div class="col-md-2 col-sm-2"><a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="btn advance-search" title="apply">Apply</a></div>
									</div>
									<span class="tg-themetag tg-featuretag">Premium</span>
								</article>

								<article class="advance-search-job">
									<div class="row no-mrg">
										<div class="col-md-6 col-sm-6">
											<a href="new-job-detail.html" title="job Detail">
												<div class="advance-search-img-box"><img src="{{url('public/client_assets/img/com-1.jpg')}}" class="img-responsive" alt=""></div>
											</a>
											<div class="advance-search-caption"><a href="new-job-detail.html" title="Job Dtail"><h4>Web Designer</h4></a><span>Autodesk Ltd</span></div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="advance-search-job-locat">
												<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
											</div>
										</div>
										<div class="col-md-2 col-sm-2"><a href="#" class="btn applied advance-search" title="applied"><i class="fa fa-check" aria-hidden="true"></i>Applied</a></div>
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

								</style>


								@endsection

