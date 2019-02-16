@extends('client_views.master')
@section('content')

			<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="inner-header-title no-br advance-header-title" style="background-image:url(public/client_assets/img/banner-14.jpeg);">
				<div class="container">
					<h2><span>Work There.</span> Find the dream job</h2>
					<p style="margin-bottom:20px"><span>705</span> new job in the last <span>7</span> days.</p>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- bottom form section start -->
			<section class="bottom-search-form">
				<div class="container">
					<form class="bt-form" action="{{url('search-jobs')}}">
						<div class="col-md-3 col-sm-6">
							<input type="text" class="form-control" placeholder="Skills, Designations, Keyword">
						</div>
						<div class="col-md-3 col-sm-6">
							<input type="text" class="form-control" placeholder="location Or City">
						</div>
						<div class="col-md-3 col-sm-6">
							<select class="form-control">
							  <option>Functional Area</option>
							  <option>Information Technology</option>
							  
							</select>
						</div>
						<div class="col-md-3 col-sm-6">
							<button type="submit" class="btn btn-primary">Search Job</button>
						</div>
					</form>
				</div>
			</section>
			<!-- Bottom Search Form Section End -->
			
			<!-- ========== Begin: Brows job Category ===============  -->
			<section class="brows-job-category gray-bg">
				<div class="container">
					<div class="col-md-9 col-sm-12">
						<div class="full-card">
						
							<div class="card-header">
								<div class="row mrg-0">
									<div class="col-md-4 col-sm-4">
										<select class="selectpicker form-control" multiple title="Job Type">
										  <option>Full Times</option>
										  <option>Part Time</option>
										  <option>Freelancer</option>
										  <option>Internship</option>
										</select>
									</div>
									<div class="col-md-4 col-sm-4 small-padd">
										<select class="selectpicker form-control" multiple title="All Categories">
										  <option>Teacher Jobs</option>
										  <option>Consultant Jobs</option>
										  <option>IT Jobs</option>
										  <option>Sales Jobs</option>
										  <option>Graphic Designer Jobs</option>
										</select>
									</div>
									<div class="col-md-4 col-sm-4">
										<ol class="breadcrumb pull-right">
											<li><a href="#"><i class="fa fa-home"></i></a></li>
											<li><a href="#">Full Time</a></li>
											<li class="active">IT Jobs</li>
										</ol>
									</div>
								</div>
							</div>
							
							<div class="card-body">

					
					<article class="advance-search-job">
						<div class="row no-mrg">

					<?php 
                    if($job===0){ ?>
                    
                        <h4 style="color:red;text-align:center;font-size:17px">  Sorry! Record Not Found </h4>
                    
                    <?php }else{
                    foreach ($job as $jobs) { 
                    		date_default_timezone_set("Asia/Karachi");
                    		 $post_date = strtotime($jobs->post_visibility_date); 
               				//echo "  ----  ";
 	                   		$timenow = date('Y-m-d');
            				$timestamp = strtotime($timenow);
                   		    //echo "id " .$jobs->post_id ."=";
                    		if($post_date<$timestamp){
                    			
                    		}
                    		else{ ?>

                    			
                    		<div class="col-md-4 col-sm-4">
								<div class="grid-view brows-job-list">
								<div class="brows-job-company-img" style="width: 90px;">
									<img src="uploads/organization_images/{{$jobs->company_img}}" class="img-responsive" alt="" style="max-width: 90px;" />
								</div>
								<div class="brows-job-position">
									<h3><a>{{$jobs->job_title}}</a></h3>
									<p><span><i class="fa fa-arrow-right"></i>&nbsp&nbsp<a href="job-details/{{$jobs->post_id}}" >({{$jobs->company_name}})</span></a></p>
								</div>
								<div class="job-position">
									<span class="job-num"><?php 

													if($jobs->total_positions>1){

											echo   $jobs->total_positions.' 
											 Positions' ;
													}
													else{
														echo $jobs->total_positions.' Position' ;

													}	

												?></span>
								</div>
								<div class="brows-job-type">
									<span class="full-time">{{$jobs->req_industry}}</span>
								</div>
								<ul class="grid-view-caption">
									<li>
										<div class="brows-job-location">
											<p style="padding-top:10%;"><i class="fa fa-map-marker"></i>{{$jobs->company_location}}</p>
										</div>
									</li>
									<li>
										<p><a href="job-details/{{$jobs->post_id}}" class="btn advance-search" title="apply">View</a><!-- <a type="button"><i class="fa fa-eye"></i></a>--></p>
									</li>
								</ul>
								<span class="tg-themetag tg-featuretag"><?php 

   											// $this->load->helper('date');

    										//client created date get from database
											$date=$jobs->created_at; 

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




						   <?php }}} ?>
					    </div>
				    </article>

								
								
							</div>
						</div>
						
						
						<div class="row">
							<ul class="pagination">
								<h5 style="text-align:center"><?php 
								if($job===0){ 


								}else{
									echo $job->links();
								}	
								?></h5>
							</ul>
						</div>
						
						<!-- Ad banner -->
						<div class="row">
							<div class="ad-banner">
								<img src="http://via.placeholder.com/728x90" class="img-responsive" alt="">
							</div>
						</div>
					</div>
					
					<!-- Sidebar Start -->
					<div class="col-md-3 col-sm-12">
						<div class="sidebar right-sidebar">
                            <h2 class="title" style="text-align: center; font-size: 16px;"><i class="fa fa-arrow-right"></i> &nbsp<u>Filter Your Search</u></h2>
							<div class="side-widget">
								<h2 class="side-widget-title">City</h2>
								<div class="widget-text padd-0" id="city">
									<ul>
										<li>
											<select class="form-control">
												<option selected disabled hidden>Select City</option>
												<option>Lahore</option>
												<option>Karachi</option>
												<option>Islamabad</option>
											</select>
											<!-- <span class="custom-checkbox">
												<input type="checkbox" id="1">
												<label for="1"></label>
											</span>
											Web Designer
											<span class="pull-right">102</span> -->
										</li>
										
										
									</ul>
								</div>
							</div>
							<div class="side-widget">
								<h2 class="side-widget-title">Functional Area</h2>
								<div class="widget-text padd-0" id="area">
									<ul>
										<li>
											<select class="form-control">
												<option selected disabled hidden>Select Functional Area</option>
												<option>IT</option>
												<option>Accounts</option>
												<option>Law</option>
											</select>
											
										</li>
										
										
									</ul>
								</div>
							</div>
							
							<div class="side-widget">
								<h2 class="side-widget-title">Industry</h2>
								<div class="widget-text padd-0" id="indus">
									<ul>
										<li>
											<select class="form-control">
												<option selected disabled hidden>Select Industry</option>
												<option>Food</option>
												<option>Institutional</option>
												
											</select>
											
										</li>
										
										
										
									</ul>
								</div>
							</div>
							<div class="side-widget">
								<h2 class="side-widget-title">Qualification</h2>
								<div class="widget-text padd-0" id="qual">
									<ul>
										<li>
											<select class="form-control">
												<option selected disabled hidden>Select Qualification Level</option>
												<option>Matric</option>
												<option>Bechulars</option>
												
											</select>
											
										</li>
										
										
										
									</ul>
								</div>
							</div>
							<div class="side-widget">
								<h2 class="side-widget-title">Experience Level</h2>
								<div class="widget-text padd-0" id="exp">
									<ul>
										<li>
											<select class="form-control">
												<option selected disabled hidden>Select Experience Level</option>
												<option>fresh</option>
												<option>less then one year</option>
												
											</select>
											
										</li>
										
										
										
									</ul>
								</div>
							</div>
							
							<div class="side-widget">
								<h2 class="side-widget-title">Job type</h2>
								<div class="widget-text padd-0" id="job-type">
									<ul>
										<li>
											<select class="form-control">
												<option selected disabled hidden>Select Job Type</option>
												<option>Part time</option>
												<option>Full Time</option>
												<option>All types</option>
											</select>
										</li>
										
									</ul>
								</div>
							</div>
							<div class="side-widget">
								<h2 class="side-widget-title">Job Shift</h2>
								<div class="widget-text padd-0" id="job-shift">
									<ul>
										<li>
											<select class="form-control">
												<option selected disabled hidden>Select Job Shift</option>
												<option>Morning Shift</option>
												<option>Night Shift</option>
												<option>Evening Shift</option>
												<option>All Shifts</option>
											</select>
										</li>
										
									</ul>
								</div>
							</div>
							<div style="margin-bottom:10%;">
								<button class="btn btn-success" style="width: 100%;font-weight: bold;">Filter</button>
								
							</div>
<!-- 							<div class="side-widget">
								<h2 class="side-widget-title">Job Alert</h2>
								<div class="job-alert">
									<div class="widget-text">
										<form>
											<input type="text" name="keyword" class="form-control" placeholder="Job Keyword">
											<input type="email" name="email" class="form-control" placeholder="Email ID">
											<button type="submit" class="btn btn-alrt">Add Alert</button>
										</form>
									</div>
								</div>
							</div>
							
							<div class="side-widget">
								<h2 class="side-widget-title">Advertisment</h2>
								<div class="widget-text padd-0">
									<div class="ad-banner">
										<img src="http://via.placeholder.com/320x285" class="img-responsive" alt="">
									</div>
								</div>
							</div> -->
							
						</div>
					</div>
					<!-- Sidebar End -->
					
				</div>
			</section>
			<!-- ========== Begin: Brows job Category End ===============  -->
		@endsection