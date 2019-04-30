@extends('client_views.master')
@section('content')

<div class="clearfix"></div>
<!-- Main Banner Section Start -->
<div class="banner" style="background-image:url('public/client_assets/img/banner-9.jpg');">  
	<div class="container">
		<div class="banner-caption">
			<div class="col-md-12 col-sm-12 banner-text">
				<h1><span style="color:white;" id="counter"></span> Browse Jobs</h1>
				<form class="form-horizontal" action="{{url('search-jobs')}}" method="post">
				  {{ csrf_field() }}
					<div class="col-md-4 no-padd">
						<div class="input-group">
							<input type="text" class="form-control right-bor" placeholder="Skills, Designations, Companies" name="title">
						</div>
					</div>
					<div class="col-md-3 no-padd">
						<div class="input-group">
							<select id="city" class="form-control" name="city">
								<option disabled="disabled" selected="selected" hidden="hidden">Choose City</option>
							@foreach($get_cities as $get_cities)
								<option value="{{$get_cities->company_city_name}}">{{$get_cities->company_city_name}}</option>
								
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-md-3 no-padd">
						<div class="input-group">
							<select id="area" class="form-control" name="area">
								<option disabled="disabled" selected="selected" hidden="hidden">Choose Functional Area</option>
							@foreach($get_areas as $area)
								<option value="{{$area->area_title}}">{{$area->area_title}}</option>
								
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-md-2 no-padd">
						<div class="input-group">
							<button type="submit" class="btn btn-primary">Search Job</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="company-brand">
		<div class="container">
			<div id="company-brands" class="owl-carousel">
				<?php foreach($logo as $log):
                $post_date = $log->display_end_date; 

				$timenow = date('Y.m.d');
				if($post_date<$timenow){?>
					<!-- <h4 style="color:red;text-align:center;font-size:17px">  Sorry! Record Not Found </h4> -->
				<?php }
				else{
					?>
				<div class="brand-img">
					<img src="{{url('uploads/company_add_logo/')}}/{{$log->company_logo}}" class="img-responsive" alt="" />
				</div>
				<?php } endforeach; ?>
				
			</div>
		</div>
	</div>

</div>
<div class="clearfix"></div>
<!-- Main Banner Section End -->


<!-- Job List-->
<section>
	<div class="container">

		<div class="row">
			<div class="main-heading">
				<p>200 New Jobs</p>
				<h2>New & Random <span style="padding-left: 1%;">Jobs</span></h2>
			</div>
		</div>
		<!--/row-->

		<!--Browse Job In Grid-->
		<div class="row extra-mrg">


			<?php 
			$error=" "; 
			if($random_jobs===0){

				$error= '<h4 style="color:red;text-align:center;font-size:17px">  Sorry! Record Not Found </h4>';
			
			 }else{ 


			foreach ($random_jobs as $val) { 

				date_default_timezone_set("Asia/Karachi");
				$post_date = strtotime($val->post_visibility_date); 

				$timenow = date('Y-m-d');
				$timestamp = strtotime($timenow);
                 		   
				if($post_date<$timestamp){
				$error= '<h4 style="color:red;text-align:center;font-size:17px">  Sorry! Record Not Found </h4>'; 
				 }
				else{ ?>


			<!-- Single Job Grid -->
			<div class="col-md-3 col-sm-6">
				<div class="grid-view brows-job-list">
					<div class="brows-job-company-img">						
						<img src="uploads/organization_images/{{$val->company_img}}" class="img-responsive" alt="" />
					</div>
					<div class="brows-job-position">
						<h3><a href="job-details/{{$val->post_id}}">{{$val->job_title}}</a></h3>
						<p><span>{{$val->company_name}}</span></p>
					</div>
					<div class="job-position">
						<span class="job-num"><?php 
						if($val->total_positions>1){

							echo   $val->total_positions.' 
							Positions' ;
						}
						else{
							echo $val->total_positions.' Position' ;

						}	
						?></span>
					</div>
					<div class="brows-job-type">
						<span class="full-time">
							
							<?php 

							$date=$val->created_at; 

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

							?>

						</span>
					</div>
					<ul class="grid-view-caption">
						<li>
							<div class="brows-job-location">
								<p style="display:block;padding-top:15px;"><i class="fa fa-map-marker"></i>{{$val->company_city}}</p>
							</div>
						</li>
						<li>
							<p><a href="job-details/{{$val->post_id}}" class="btn advance-search" title="apply">View</a></p>
						</li>
					</ul>
				</div>
			</div>
		<?php }
		
	}
	
} 
if($error){
echo $error;
}?>


		</div>
		<!--/.Browse Job In Grid-->

	</div>
</section>

<!-- Latest Job End-->




<section style="padding:0px;margin-bottom:50px;">
	<div class="container">

		<div class="row">
			<div class="main-heading">
				<h2>Browse Jobs By<span style="padding-left: 1%;">Category</span></h2>
			</div>
		</div>

		<div class="row">

			<div class="col-md-3 col-sm-6">
				<div class="category-box" data-aos="fade-up">
					<div class="category-desc">
						<div class="category-icon">
							<i class="icon-bargraph" aria-hidden="true"></i>
							<i class="icon-bargraph abs-icon" aria-hidden="true"></i>
						</div>

						<div class="category-detail category-desc-text">
							<h4> <a href="{{url('all-jobs')}}/Accounting_&_Finance">Accounting & Finance</a></h4>
							<p><?php 

							if($get_AccountingFinance===0){
								echo $get_AccountingFinance;
							}
							else{
								foreach ($get_AccountingFinance as $val) { 

								date_default_timezone_set("Asia/Karachi");
								$post_date = strtotime($val->post_visibility_date); 

								$timenow = date('Y-m-d');
								$timestamp = strtotime($timenow);
				                $coun=$get_AccountingFinance->count();
								if($post_date<$timestamp){
									$coun=$coun-1;
								}
								
							    echo $coun;
						        }
								//echo $get_AccountingFinance;
							}
							?>
							 Jobs</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="category-box" data-aos="fade-up">
					<div class="category-desc">
						<div class="category-icon">
							<i class="icon-tools-2" aria-hidden="true"></i>
							<i class="icon-tools-2 abs-icon" aria-hidden="true"></i>
						</div>

						<div class="category-detail category-desc-text">
							<h4> <a href="{{url('all-jobs')}}/Automotive">Automotive Jobs</a></h4>
							<p><?php 

							if($get_Automotive===0){
								echo $get_Automotive;
							}
							else{
								foreach ($get_Automotive as $val) { 

								date_default_timezone_set("Asia/Karachi");
								$post_date = strtotime($val->post_visibility_date); 

								$timenow = date('Y-m-d');
								$timestamp = strtotime($timenow);
				                $coun=$get_Automotive->count();
								if($post_date<$timestamp){
									$coun=$coun-1;
								}
								
							    echo $coun;
						        }
								//echo $get_Automotive;
							}
							?>	
							Jobs</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="category-box" data-aos="fade-up">
					<div class="category-desc">
						<div class="category-icon">
							<i class="icon-briefcase" aria-hidden="true"></i>
							<i class="icon-briefcase abs-icon" aria-hidden="true"></i>
						</div>

						<div class="category-detail category-desc-text">
							<h4> <a href="{{url('all-jobs')}}/Business">Business</a></h4>
							<p><?php 

							if($get_business===0){
								echo $get_business;
							}
							else{
								foreach ($get_business as $val) { 

								date_default_timezone_set("Asia/Karachi");
								$post_date = strtotime($val->post_visibility_date); 

								$timenow = date('Y-m-d');
								$timestamp = strtotime($timenow);
				                $coun=$get_business->count();
								if($post_date<$timestamp){
									$coun=$coun-1;
								}
								
							    echo $coun;
						        }
								//echo $get_business;
							}
							?>		
							Jobs</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="category-box" data-aos="fade-up">
					<div class="category-desc">
						<div class="category-icon">
							<i class="icon-edit" aria-hidden="true"></i>
							<i class="icon-edit abs-icon" aria-hidden="true"></i>
						</div>

						<div class="category-detail category-desc-text">
							<h4> <a href="{{url('all-jobs')}}/Education_Training">Education Training</a></h4>
							<p><?php 

							if($get_eduction===0){
								echo $get_eduction;
							}
							else{
								foreach ($get_eduction as $val) { 

								date_default_timezone_set("Asia/Karachi");
								$post_date = strtotime($val->post_visibility_date); 

								$timenow = date('Y-m-d');
								$timestamp = strtotime($timenow);
				                $coun=$get_eduction->count();
								if($post_date<$timestamp){
									$coun=$coun-1;
								}
								
							    echo $coun;
						        }
								//echo $get_eduction;
							}
							?>  Jobs</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="category-box" data-aos="fade-up">
					<div class="category-desc">
						<div class="category-icon">
							<i class="icon-heart" aria-hidden="true"></i>
							<i class="icon-heart abs-icon" aria-hidden="true"></i>
						</div>

						<div class="category-detail category-desc-text">
							<h4> <a href="{{url('all-jobs')}}/Healthcare">Healthcare</a></h4>
							<p><?php 
							
							if($get_healthcare===0){
								echo $get_healthcare;
							}
							else{
								foreach ($get_healthcare as $val) { 

								date_default_timezone_set("Asia/Karachi");
								$post_date = strtotime($val->post_visibility_date); 

								$timenow = date('Y-m-d');
								$timestamp = strtotime($timenow);
				                $coun=$get_healthcare->count();
								if($post_date<$timestamp){
									$coun=$coun-1;
								}
								
							    echo $coun;
						        }
								//echo $get_healthcare;
							}
							?>
							 Jobs</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="category-box" data-aos="fade-up">
					<div class="category-desc">
						<div class="category-icon">
							<i class="icon-wine" aria-hidden="true"></i>
							<i class="icon-wine abs-icon" aria-hidden="true"></i>
						</div>

						<div class="category-detail category-desc-text">
							<h4> <a href="{{url('all-jobs')}}/Restaurant_&_Food">Restaurant & Food</a></h4>
							<p><?php 
							
							if($get_RestaurantFood===0){
								echo $get_RestaurantFood;
							}
							else{
                  
								foreach ($get_RestaurantFood as $val) { 

								date_default_timezone_set("Asia/Karachi");
								$post_date = strtotime($val->post_visibility_date); 

								$timenow = date('Y-m-d');
								$timestamp = strtotime($timenow);
				                $coun=$get_RestaurantFood->count();
								if($post_date<$timestamp){
									$coun=$coun-1;
								}
								
							    echo $coun;
						        }
							}
							?> 
							Jobs</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="category-box" data-aos="fade-up">
					<div class="category-desc">
						<div class="category-icon">
							<i class="icon-map" aria-hidden="true"></i>
							<i class="icon-map abs-icon" aria-hidden="true"></i>
						</div>

						<div class="category-detail category-desc-text">
							<h4> <a href="{{url('all-jobs')}}/Transportation">Transportation</a></h4>
							<p> 
							<?php 
							
							if($get_Transportation===0){
								echo $get_Transportation;
							}
							else{
								foreach ($get_Transportation as $val) { 

								date_default_timezone_set("Asia/Karachi");
								$post_date = strtotime($val->post_visibility_date); 

								$timenow = date('Y-m-d');
								$timestamp = strtotime($timenow);
				                $coun=$get_Transportation->count();
								if($post_date<$timestamp){
									$coun=$coun-1;
								}
								
							    echo $coun;
						        }
								//echo $get_Transportation;
							}
							?> 	
							Jobs</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="category-box" data-aos="fade-up">
					<div class="category-desc">
						<div class="category-icon">
							<i class="icon-desktop" aria-hidden="true"></i>
							<i class="icon-desktop abs-icon" aria-hidden="true"></i>
						</div>

						<div class="category-detail category-desc-text">
							<h4> <a href="{{url('all-jobs')}}/Telecommunications">Telecommunications</a></h4>
							<p><?php 
							
							if($get_Telecommunications===0){
								echo $get_Telecommunications;
							}
							else{
								foreach ($get_Telecommunications as $val) { 

								date_default_timezone_set("Asia/Karachi");
								$post_date = strtotime($val->post_visibility_date); 

								$timenow = date('Y-m-d');
								$timestamp = strtotime($timenow);
				                $coun=$get_Telecommunications->count();
								if($post_date<$timestamp){
									$coun=$coun-1;
								}
								
							    echo $coun;
						        }
								//echo $get_Telecommunications;
							}
							?> 	
							Jobs</p>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
</section>
<!-- Job By Category End-->


<!-- testimonial section Start -->
<section class="testimonial" id="testimonial">
	<div class="container">
		<div class="row">
			<div class="main-heading">
				<p>What Say Our Client</p>
				<h2>Our Success <span style="padding-left: 1%;">Stories</span></h2>
			</div>
		</div>
		<!--/row-->
		<div class="row">

			<div id="client-testimonial-slider" class="owl-carousel">
                
					<?php if(Session::has("company_id")){ 	

	if($org_reviews===0){ ?>

		<div class="container">
					<div class="row">
				<h4 style="color:red;text-align:center;font-size:17px"> No Company Review Found</h4>
			</div>
		</div>

	<?php }else{ ?>

				@foreach ($org_reviews as $org)
				<div class="client-testimonial">
								<div class="pic">
									<img src="{{url('uploads/organization_images')}}/{{$org->company_img}}" alt="">
								</div>
								<p class="client-description">
									<?php $org->company_info =str_replace("<p>"," ",$org->company_info);
									echo $org->company_info =str_replace("</p>"," ",$org->company_info);  ?> ..
								</p>
								<h3 class="client-testimonial-title">{{$org->company_name}}</h3>
								<ul class="client-testimonial-rating">
									<span class="protip" data-pt-position="bottom" data-pt-size="small"  data-pt-scheme="leaf" data-pt-gravity="bottom 0 12;" data-pt-title="Rating is {{$org->rating_points}}" data-pt-animate="swing">
							<?php $n=5-$org->rating_points; 
								 for($i=1;$i<=$org->rating_points;$i++){ ?>
									<li class="fa fa-star"></li>

								<?php }for($i=1;$i<=$n;$i++){?>
									<li class="fa fa-star-o"></li>

								<?php } ?>
						</span>
								</ul>
							</div>
				@endforeach
				<?php }}else{ 

				if($get_reviews===0){ ?>

					<div class="container">
					<div class="row">

							<h4 style="color:red;text-align:center;font-size:17px">  No Candidate Review Found </h4>
					</div>
				</div>

				<?php }else{ ?>
                @foreach ($get_reviews as $row)
				<div class="client-testimonial">
					<div class="pic">
						<img src="{{url('uploads/client_site/profile_pic')}}/{{$row->profile_image}}" alt="">
					</div>
					<p class="client-description">

						<?php 
						 	$row->review_description =str_replace("<p>"," ",$row->review_description);
						 echo $row->review_description =str_replace("</p>"," ",$row->review_description); 
						 ?>
						
					</p>
					<h3 class="client-testimonial-title">{{$row->candidate_name}}</h3>

					<div class="detail">
						<ul class="client-testimonial-rating">
							<span class="protip" data-pt-position="bottom" data-pt-size="small" data-pt-scheme="leaf" data-pt-gravity="bottom 0 12;" data-pt-title="Rating is {{$row->rating_points}}" data-pt-animate="swing">
								<?php $n=5-$row->rating_points; ?>
								<?php for($i=1;$i<=$row->rating_points;$i++){ ?>
									<li class="fa fa-star"></li>

								<?php }for($i=1;$i<=$n;$i++){?>
									<li class="fa fa-star-o"></li>

								<?php } ?>
							</span>
						</ul>
					</div>

				</div>
				@endforeach
					<?php }} ?>


			</div>
		</div>
	</section>
	<!-- testimonial section End -->


		
		<!-- Download app Section Start -->
		<section class="download-app" style="background-image:url('public/client_assets/img/banner-7.jpg');">
			<div class="container">
				<div class="col-md-5 col-sm-5 hidden-xs">
					<img src="{{url('public/client_assets/img/iphone.png')}}" alt="iphone" class="img-responsive" />
				</div>
				<div class="col-md-7 col-sm-7">
					<div class="app-content">
						<h2>Download Our Best Apps</h2>
						<h4>Best oppertunity in your hand</h4>
						<p>Description......</p>
						<a href="#" class="btn call-btn"><i class="fa fa-apple"></i>Download</a>
						<a href="#" class="btn call-btn"><i class="fa fa-android"></i>Download</a>
					</div>
				</div>
				<!--/row-->
			</div>
		</section>
		<div class="clearfix"></div>
		<!-- Download app Section End -->
		



		
		@endsection