@extends('client_views.master')
@section('content')
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url({{url('public/client_assets/img/banner-10.jpg')}});">
				<div class="container">
					<h1><?php if(Request::segment(2)){
						$u=str_replace("_"," ",Request::segment(2))?>
                     {{ $u }}
					<?php }else{
						echo "Browse Jobs";
					}?></h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- ========== Begin: Brows job Category ===============  -->
			<section class="brows-job-category">
				<div class="container">
					<!-- Company Searrch Filter End -->
					<div class="row extra-mrg">
						<div class="wrap-search-filter">
							<form action="{{url('search-by-industry')}}" method="POST">
								 {{ csrf_field() }}
								<div class="col-md-3 col-sm-6">
                                   <select class="form-control" name="company_industry" title="Industries">
									  <option disabled selected hidden >Select Industry</option>
									  <?php
									 	foreach ($industry as $indus) { 
									 	$value=str_replace("_"," ",$indus->company_industry_name);
									 	?>

									 	<option value="{{$indus->company_industry_name}}">{{$value}}</option>

									 <?php } ?>
									</select>
								</div>
								
								<div class="col-md-3 col-sm-6">
									<select class="form-control" name="select_career_level" title="Career-Level">
									 <option disabled selected hidden >Select Career Level</option>
									 <option value="Entry_Level">Entry Level</option>
									 <option value="Intermediate">Intermediate</option>
									 <option value="Experienced_Professional">Experienced Professional</option>
									 <option value="Department_Head">Department Head</option>
									 <option value="CEO">GM / CEO</option>

									</select>
								</div>

								<div class="col-md-3 col-sm-6">
									<select class="form-control" name="company_city" title="City">
									  <option disabled selected hidden >Select City</option>
									   <?php
									  foreach ($cities as $cty) { ?>
									  <option><?php echo $cty->company_city_name ?></option>
										
									<?php }	?>
									</select>
								</div>
								
								<div class="col-md-3 col-sm-6">
									<button type="submit" class="btn btn-success" style="width: 100%;font-weight: bold;">Filter</button>
								</div>
								
							</form>
						</div>
					</div>
					<!-- Company Searrch Filter End -->
					
					<div class="item-click">

						<?php 
						if($search_results=="0"){ ?>

							<h4 style="color:red;text-align:center;font-size:17px">  Sorry! Record Not Found </h4>

						<?php }else{

					  foreach ($search_results as $val) { 

					  	date_default_timezone_set("Asia/Karachi");
					  	$post_date = strtotime($val->post_visibility_date); 

					  	$timenow = date('Y-m-d');
					  	$timestamp = strtotime($timenow);

					  	if($post_date<$timestamp){?>

					  	<?php }
					  	else{ ?>

						<article>
							<div class="brows-job-list">
								<div class="col-md-1 col-sm-2 small-padding">
									<div class="brows-job-company-img">
										<a href="job-detail.html">
											<img src="uploads/organization_images/{{$val->company_img}}" class="img-responsive" alt="" />
										</a>
									</div>
								</div>
								<div class="col-md-6 col-sm-5">
									<div class="brows-job-position">
										<a href="job-detail.html"><h3>{{$val->job_title}}</h3></a>
										<p>
											<span>{{$val->company_name}}</span><span class="brows-job-sallery"><i class="fas fa-user-plus"></i><?php 
											if($val->total_positions>1){

												echo   $val->total_positions.' 
												Positions' ;
											}
											else{
												echo $val->total_positions.' Position' ;

											}	
											?></span>
											<span class="job-type cl-success bg-trans-success">
											<?php echo $val->req_industry=str_replace("_"," ",$val->req_industry); ?>

											</span>
										</p>
									</div>
								</div>
								<div class="col-md-3 col-sm-3">
									<div class="brows-job-location">
										<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
									</div>
								</div>
								<div class="col-md-2 col-sm-2">
									<div class="brows-job-link">
										<!-- <a href="job-detail.html" class="btn btn-success">View Details</a> -->
										<a href="job-details/{{$val->post_id}}" class="btn advance-search" title="apply">View</a>
									</div>
								</div>
							</div>
							<span class="tg-themetag tg-featuretag">								
							<?php 

							$date=$val->created_at;   											
							$last = new DateTime($date);
							$now = new DateTime( date( 'Y-m-d h:i:s', time() )) ; 
   											 
							$interval = $last->diff($now);
    									
							$years = (int)$interval->format('%Y');
							$months = (int)$interval->format('%m');
							$days = (int)$interval->format('%d');
							$hours = (int)$interval->format('%H');
							$minutes = (int)$interval->format('%i');
                                
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

							?>

							</span>
						</article>
					<?php }} ?>
					</div>
				

					<!--row-->
					<div class="row">
						<ul class="pagination">


							<?php 
						if($search_results=="0"){}else{ ?>

							{{ $search_results->links() }}

						<?php } ?>

							<!-- <li><a href="#">&laquo;</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li> 
							<li><a href="#">4</a></li> 
							<li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li> 
							<li><a href="#">&raquo;</a></li>  -->
						</ul>
					</div>

					<?php } ?>
					<!-- /.row-->
				</div>
			</section>
			<!-- ========== Begin: Brows job Category End ===============  -->
		
		@endsection