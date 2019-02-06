@extends('client_views.master')
@section('content')

			<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="inner-header-title no-br advance-header-title" style="background-image:url(public/client_assets/img/banner-10.jpg);">
				<div class="container">
					<h2><span>Work There.</span> Find the dream job</h2>
					<p><span>704</span> new job in the last <span>7</span> days.</p>
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
							<input type="text" class="form-control" placeholder="Searc By location">
						</div>
						<div class="col-md-3 col-sm-6">
							<select class="form-control">
							  <option>By Category</option>
							  <option>Information Technology</option>
							  <option>Mechanical</option>
							  <option>Hardware</option>
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
										  <option>Full Time</option>
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
							<!-- @foreach($job as $jobs)
								<article class="advance-search-job">
									<div class="row no-mrg">
										<div class="col-md-6 col-sm-6">
											<a href="job-details/{{$jobs->post_id}}" title="job Detail">
												<div class="advance-search-img-box">
													<img src="uploads/organization_images/{{$jobs->company_img}}" class="img-responsive" alt="">
												</div>
											</a>
											<div class="advance-search-caption">
												<a href="job-details/{{$jobs->post_id}}" title="Job Dtail"><h4>{{$jobs->job_title}}</h4></a>
												<span>{{$jobs->company_name}}</span>
											</div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="advance-search-job-locat">
												<p><i class="fa fa-map-marker"></i>{{$jobs->company_location}}</p>
											</div>
										</div>
										<div class="col-md-2 col-sm-2">
											<a href="javascript:void(0)"  data-toggle="modal" data-target="#apply-job" class="btn advance-search" title="apply">Apply</a>
										</div>
									</div>
									<span class="tg-themetag tg-featuretag">{{date('d M ',strtotime($jobs->created_at))}}</span>
								</article>
								
							@endforeach -->
					
					<article class="advance-search-job">
						<div class="row no-mrg">
							@foreach($job as $jobs)
							<div class="col-md-6 col-sm-6">
								<div class="grid-view brows-job-list">
								<div class="brows-job-company-img" style="width: 90px;">
									<img src="uploads/organization_images/{{$jobs->company_img}}" class="img-responsive" alt="" style="max-width: 90px;" />
								</div>
								<div class="brows-job-position">
									<h3><a>{{$jobs->job_title}}</a></h3>
									<p><span><i class="fa fa-arrow-right"></i>&nbsp&nbsp({{$jobs->company_name}})</span></p>
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
						    @endforeach
					    </div>
				    </article>

								<!-- <article class="advance-search-job">
									<div class="row no-mrg">
										<div class="col-md-6 col-sm-6">
											<a href="job-details/{{$jobs->post_id}}" title="job Detail">
												<div class="advance-search-img-box">
													<img src="assets/img/com-1.jpg" class="img-responsive" alt="">
												</div>
											</a>
											<div class="advance-search-caption">
												<a href="new-job-detail.html" title="Job Dtail"><h4>Web Designer</h4></a>
												<span>Autodesk Ltd</span>
											</div>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="advance-search-job-locat">
												<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
											</div>
										</div>
										<div class="col-md-2 col-sm-2">
											<a href="#" class="btn applied advance-search" title="applied"><i class="fa fa-check" aria-hidden="true"></i>Applied</a>
										</div>
									</div>
								</article> -->
								
							</div>
						</div>
						
						<!-- <div class="row">
							<ul class="pagination">
								
								<li><a href="#">&laquo;</a></li>
								<li class="active"><a>{{$job->currentPage()}}</a></li>
								<li><a href="{{$job->links()}}">2</a></li>
								<li><a href="#">&raquo;</a></li>
								
							</ul>
						</div> -->
						<div class="row">
							<ul class="pagination">
							 <h5 style="text-align:center">{{$job->links()}}</h5>
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

							<div class="side-widget">
								<h2 class="side-widget-title">Compensation</h2>
								<div class="widget-text padd-0">
									<ul>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="1">
												<label for="1"></label>
											</span>
											Under $10,000
											<span class="pull-right">102</span>
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="2">
												<label for="2"></label>
											</span>
											$10,000 - $15,000
											<span class="pull-right">78</span>
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="3">
												<label for="3"></label>
											</span>
											$15,000 - $20,000
											<span class="pull-right">12</span>
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="4">
												<label for="4"></label>
											</span>
											$20,000 - $30,000
											<span class="pull-right">85</span>
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="5">
												<label for="5"></label>
											</span>
											$30,000 - $40,000
											<span class="pull-right">307</span>
										</li>
									</ul>
								</div>
							</div>
							
							<div class="side-widget">
								<h2 class="side-widget-title"><a href="#designation" data-toggle="collapse">Designation<i class="pull-right fa fa-angle-double-down" aria-hidden="true"></i></a></h2>
								<div class="widget-text padd-0 collapse" id="designation">
									<ul>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="1">
												<label for="1"></label>
											</span>
											Web Designer
											<span class="pull-right">102</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="2">
												<label for="2"></label>
											</span>
											Php Developer
											<span class="pull-right">78</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="3">
												<label for="3"></label>
											</span>
											Project Manager
											<span class="pull-right">12</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="4">
												<label for="4"></label>
											</span>
											Human Resource
											<span class="pull-right">85</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="5">
												<label for="5"></label>
											</span>
											CMS Developer
											<span class="pull-right">307</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="6">
												<label for="6"></label>
											</span>
											App Developer
											<span class="pull-right">256</span>
										</li>
									</ul>
								</div>
							</div>
							
							<div class="side-widget">
								<h2 class="side-widget-title"><a href="#job-location" data-toggle="collapse">Location<i class="pull-right fa fa-angle-double-down" aria-hidden="true"></i></a></h2>
								<div class="widget-text padd-0 collapse" id="job-location">
									<ul>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="1">
												<label for="1"></label>
											</span>
											Mohali
											<span class="pull-right">102</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="2">
												<label for="2"></label>
											</span>
											Chandigarh
											<span class="pull-right">78</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="3">
												<label for="3"></label>
											</span>
											Chennai
											<span class="pull-right">12</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="4">
												<label for="4"></label>
											</span>
											Delhi
											<span class="pull-right">85</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="5">
												<label for="5"></label>
											</span>
											Noida
											<span class="pull-right">307</span>
										</li>
										
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="6">
												<label for="6"></label>
											</span>
											Chhatisgarh
											<span class="pull-right">256</span>
										</li>
										
									</ul>
								</div>
							</div>
							
							<div class="side-widget">
								<h2 class="side-widget-title"><a href="#job-type" data-toggle="collapse">Job type<i class="pull-right fa fa-angle-double-down" aria-hidden="true"></i></a></h2>
								<div class="widget-text padd-0 collapse" id="job-type">
									<ul>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="1">
												<label for="1"></label>
											</span>
											Full Time
											<span class="pull-right">102</span>
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="2">
												<label for="2"></label>
											</span>
											Part Time
											<span class="pull-right">78</span>
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="3">
												<label for="3"></label>
											</span>
											Internship
											<span class="pull-right">12</span>
										</li>
										<li>
											<span class="custom-checkbox">
												<input type="checkbox" id="4">
												<label for="4"></label>
											</span>
											Freelancer
											<span class="pull-right">85</span>
										</li>
									</ul>
								</div>
							</div>
							<div class="side-widget">
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
							</div>
							
						</div>
					</div>
					<!-- Sidebar End -->
					
				</div>
			</section>
			<!-- ========== Begin: Brows job Category End ===============  -->
		@endsection