@extends('client_views.master')
@section('content')

<div class="clearfix"></div>
<!-- Main Banner Section Start -->
<div class="banner" style="background-image:url('public/client_assets/img/banner-9.jpg');">  
	<div class="container">
		<div class="banner-caption">
			<div class="col-md-12 col-sm-12 banner-text">
				<h1>7,000+ Browse Jobs</h1>
				<form class="form-horizontal" action="{{url('search-jobs')}}">
					<div class="col-md-4 no-padd">
						<div class="input-group">
							<input type="text" class="form-control right-bor" placeholder="Skills, Designations, Companies">
						</div>
					</div>
					<div class="col-md-3 no-padd">
						<div class="input-group">
							<input type="text" class="form-control right-bor" placeholder="Search By Location..">
						</div>
					</div>

					<div class="col-md-3 no-padd">
						<div class="input-group">
							<select id="choose-city" class="form-control">
								<option disabled="disabled" selected="selected" hidden="hidden">Choose City</option>
							@foreach($get_cities as $get_cities)
								<option value="{{$get_cities->company_city_name}}">{{$get_cities->company_city_name}}</option>
								
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
				<div class="brand-img">
					<img src="{{url('public/client_assets/img/microsoft-home.png')}}" class="img-responsive" alt="" />
				</div>
				<div class="brand-img">
					<img src="{{url('public/client_assets/img/img-home.png')}}" class="img-responsive" alt="" />
				</div>
				<div class="brand-img">
					<img src="{{url('public/client_assets/img/mothercare-home.png')}}" class="img-responsive" alt="" />
				</div>
				<div class="brand-img">
					<img src="{{url('public/client_assets/img/paypal-home.png')}}" class="img-responsive" alt="" />
				</div>
				<div class="brand-img">
					<img src="{{url('public/client_assets/img/serv-home.png')}}" class="img-responsive" alt="" />
				</div>
				<div class="brand-img">
					<img src="{{url('public/client_assets/img/xerox-home.png')}}" class="img-responsive" alt="" />
				</div>
				<div class="brand-img">
					<img src="{{url('public/client_assets/img/yahoo-home.png')}}" class="img-responsive" alt="" />
				</div>
				<div class="brand-img">
					<img src="{{url('public/client_assets/img/mothercare-home.png')}}" class="img-responsive" alt="" />
				</div>
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
				<h2>New & Random <span>Jobs</span></h2>
			</div>
		</div>
		<!--/row-->

		<!--Browse Job In Grid-->
		<div class="row extra-mrg">

			<!-- Single Job Grid -->
			<div class="col-md-3 col-sm-6">
				<div class="grid-view brows-job-list">
					<div class="brows-job-company-img">
						<img src="{{url('public/client_assets/img/com-1.jpg')}}" class="img-responsive" alt="" />
					</div>
					<div class="brows-job-position">
						<h3><a href="job-detail.html">Web Developer</a></h3>
						<p><span>Google</span></p>
					</div>
					<div class="job-position">
						<span class="job-num">5 Position</span>
					</div>
					<div class="brows-job-type">
						<span class="part-time">Part Time</span>
					</div>
					<ul class="grid-view-caption">
						<li>
							<div class="brows-job-location">
								<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
							</div>
						</li>
						<li>
							<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
						</li>
					</ul>
				</div>
			</div>

			<!-- Single Job Grid -->
			<div class="col-md-3 col-sm-6">
				<div class="grid-view brows-job-list">
					<div class="brows-job-company-img">
						<img src="{{url('public/client_assets/img/com-2.jpg')}}" class="img-responsive" alt="" />
					</div>
					<div class="brows-job-position">
						<h3><a href="job-detail.html">Web Developer</a></h3>
						<p><span>Google</span></p>
					</div>
					<div class="job-position">
						<span class="job-num">5 Position</span>
					</div>
					<div class="brows-job-type">
						<span class="freelanc">Freelancer</span>
					</div>
					<ul class="grid-view-caption">
						<li>
							<div class="brows-job-location">
								<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
							</div>
						</li>
						<li>
							<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
						</li>
					</ul>
					<span class="tg-themetag tg-featuretag">Premium</span>
				</div>
			</div>

			<!-- Single Job Grid -->
			<div class="col-md-3 col-sm-6">
				<div class="grid-view brows-job-list">
					<div class="brows-job-company-img">
						<img src="{{url('public/client_assets/img/com-3.jpg')}}" class="img-responsive" alt="" />
					</div>
					<div class="brows-job-position">
						<h3><a href="job-detail.html">Web Developer</a></h3>
						<p><span>Google</span></p>
					</div>
					<div class="job-position">
						<span class="job-num">5 Position</span>
					</div>
					<div class="brows-job-type">
						<span class="enternship">Enternship</span>
					</div>
					<ul class="grid-view-caption">
						<li>
							<div class="brows-job-location">
								<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
							</div>
						</li>
						<li>
							<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
						</li>
					</ul>
				</div>
			</div>

			<!-- Single Job Grid -->
			<div class="col-md-3 col-sm-6">
				<div class="grid-view brows-job-list">
					<div class="brows-job-company-img">
						<img src="{{url('public/client_assets/img/com-4.jpg')}}" class="img-responsive" alt="" />
					</div>
					<div class="brows-job-position">
						<h3><a href="job-detail.html">Web Developer</a></h3>
						<p><span>Google</span></p>
					</div>
					<div class="job-position">
						<span class="job-num">5 Position</span>
					</div>
					<div class="brows-job-type">
						<span class="full-time">Full Time</span>
					</div>
					<ul class="grid-view-caption">
						<li>
							<div class="brows-job-location">
								<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
							</div>
						</li>
						<li>
							<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
						</li>
					</ul>
				</div>
			</div>

			<!-- Single Job Grid -->
			<div class="col-md-3 col-sm-6">
				<div class="grid-view brows-job-list">
					<div class="brows-job-company-img">
						<img src="{{url('public/client_assets/img/com-5.jpg')}}" class="img-responsive" alt="" />
					</div>
					<div class="brows-job-position">
						<h3><a href="job-detail.html">Web Developer</a></h3>
						<p><span>Google</span></p>
					</div>
					<div class="job-position">
						<span class="job-num">5 Position</span>
					</div>
					<div class="brows-job-type">
						<span class="part-time">Part Time</span>
					</div>
					<ul class="grid-view-caption">
						<li>
							<div class="brows-job-location">
								<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
							</div>
						</li>
						<li>
							<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
						</li>
					</ul>
					<span class="tg-themetag tg-featuretag">Premium</span>
				</div>
			</div>

			<!-- Single Job Grid -->
			<div class="col-md-3 col-sm-6">
				<div class="grid-view brows-job-list">
					<div class="brows-job-company-img">
						<img src="{{url('public/client_assets/img/com-6.jpg')}}" class="img-responsive" alt="" />
					</div>
					<div class="brows-job-position">
						<h3><a href="job-detail.html">Web Developer</a></h3>
						<p><span>Google</span></p>
					</div>
					<div class="job-position">
						<span class="job-num">5 Position</span>
					</div>
					<div class="brows-job-type">
						<span class="full-time">Full Time</span>
					</div>
					<ul class="grid-view-caption">
						<li>
							<div class="brows-job-location">
								<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
							</div>
						</li>
						<li>
							<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
						</li>
					</ul>
				</div>
			</div>

			<!-- Single Job Grid -->
			<div class="col-md-3 col-sm-6">
				<div class="grid-view brows-job-list">
					<div class="brows-job-company-img">
						<img src="{{url('public/client_assets/img/com-7.jpg')}}" class="img-responsive" alt="" />
					</div>
					<div class="brows-job-position">
						<h3><a href="job-detail.html">Web Developer</a></h3>
						<p><span>Google</span></p>
					</div>
					<div class="job-position">
						<span class="job-num">5 Position</span>
					</div>
					<div class="brows-job-type">
						<span class="freelanc">Freelancer</span>
					</div>
					<ul class="grid-view-caption">
						<li>
							<div class="brows-job-location">
								<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
							</div>
						</li>
						<li>
							<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
						</li>
					</ul>
				</div>
			</div>

			<!-- Single Job Grid -->
			<div class="col-md-3 col-sm-6">
				<div class="grid-view brows-job-list">
					<div class="brows-job-company-img">
						<img src="{{url('public/client_assets/img/com-1.jpg')}}" class="img-responsive" alt="" />
					</div>
					<div class="brows-job-position">
						<h3><a href="job-detail.html">Web Developer</a></h3>
						<p><span>Google</span></p>
					</div>
					<div class="job-position">
						<span class="job-num">5 Position</span>
					</div>
					<div class="brows-job-type">
						<span class="enternship">Enternship</span>
					</div>
					<ul class="grid-view-caption">
						<li>
							<div class="brows-job-location">
								<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
							</div>
						</li>
						<li>
							<p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
						</li>
					</ul>
				</div>
			</div>

		</div>
		<!--/.Browse Job In Grid-->

	</div>
</section>

<!-- Latest Job End-->




<section style="padding:0px;margin-bottom:50px;">
	<div class="container">

		<div class="row">
			<div class="main-heading">
				<h2>Browse Jobs By <span>Category</span></h2>
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
							<h4> <a href="browse-jobs-grid.html">Accounting & Finance</a></h4>
							<p><?php 

							if($get_AccountingFinance===0){
								echo $get_AccountingFinance;
							}
							else{
								echo $get_AccountingFinance;
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
							<h4> <a href="browse-jobs-grid.html">Automotive Jobs</a></h4>
							<p><?php 

							if($get_Automotive===0){
								echo $get_Automotive;
							}
							else{
								echo $get_Automotive;
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
							<h4> <a href="browse-jobs-grid.html">Business</a></h4>
							<p><?php 

							if($get_business===0){
								echo $get_business;
							}
							else{
								echo $get_business;
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
							<h4> <a href="browse-jobs-grid.html">Education Training</a></h4>
							<p><?php 

							if($get_eduction===0){
								echo $get_eduction;
							}
							else{
								echo $get_eduction;
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
							<h4> <a href="browse-jobs-grid.html">Healthcare</a></h4>
							<p><?php 
							
							if($get_healthcare===0){
								echo $get_healthcare;
							}
							else{
								echo $get_healthcare;
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
							<h4> <a href="browse-jobs-grid.html">Restaurant & Food</a></h4>
							<p><?php 
							
							if($get_RestaurantFood===0){
								echo $get_RestaurantFood;
							}
							else{
								echo $get_RestaurantFood;
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
							<h4> <a href="browse-jobs-grid.html">Transportation</a></h4>
							<p> 
							<?php 
							
							if($get_Transportation===0){
								echo $get_Transportation;
							}
							else{
								echo $get_Transportation;
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
							<h4> <a href="browse-jobs-grid.html">Telecommunications</a></h4>
							<p><?php 
							
							if($get_Telecommunications===0){
								echo $get_Telecommunications;
							}
							else{
								echo $get_Telecommunications;
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
				<h2>Our Success <span>Stories</span></h2>
			</div>
		</div>
		<!--/row-->
		<div class="row">

			<div id="client-testimonial-slider" class="owl-carousel">
                <?php if(Session::get("id")){ ?>
				@foreach ($get_reviews as $row)
				<div class="client-testimonial">
								<div class="pic">
									<img src="{{url('uploads/client_site/profile_pic')}}/{{$row->profile_image}}" alt="">
								</div>
								<p class="client-description">
									{{$row->review_description}}.
								</p>
								<h3 class="client-testimonial-title">{{$row->candidate_name}}</h3>
								<ul class="client-testimonial-rating">
									<span class="protip" data-pt-scheme="leaf" data-pt-gravity="bottom 50 40; top 0 15" data-pt-title="Rating is {{$row->rating_points}}" data-pt-animate="swing">
									<?php $n=5-$row->rating_points; ?>
								<?php for($i=1;$i<=$row->rating_points;$i++){ ?>
									<li class="fa fa-star"></li>

								<?php }for($i=1;$i<=$n;$i++){?>
									<li class="fa fa-star-o"></li>

								<?php } ?>
							</span>
								</ul>
							</div>
				@endforeach
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

					<div class="detail">
						<span class="protip" data-pt-scheme="leaf" data-pt-gravity="bottom 50 40; top 0 15" data-pt-title="Rating is {{$org->rating_points}}" data-pt-animate="swing">
							<?php $n=5-$org->rating_points; ?>
								<?php for($i=1;$i<=$org->rating_points;$i++){ ?>
									<li class="fa fa-star"></li>

								<?php }for($i=1;$i<=$n;$i++){?>
									<li class="fa fa-star-o"></li>

								<?php } ?>
						</span>
					</div>

				</div>
				@endforeach
					<?php } ?>



			</div>
		</div>
	</section>
	<!-- testimonial section End -->

	<!-- pricing Section Start -->
<!-- 		<section class="pricing">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="main-heading">
							<p>Top Freelancer</p>
							<h2>Hire Expert <span>Freelancer</span></h2>
						</div>
					</div>
				</div>
				
				
				<div class="row">
					
					
					<div class="col-md-4 col-sm-6">
						<div class="freelance-container style-2">
							<div class="freelance-box">
								<span class="freelance-status">Available</span>
								<h4 class="flc-rate">$17/hr</h4>
								<div class="freelance-inner-box">
									<div class="freelance-box-thumb">
										<img src="{{url('public/client_assets/img/can-5.jpg')}}" class="img-responsive img-circle" alt="" />
									</div>
									<div class="freelance-box-detail">
										<h4>Agustin L. Smith</h4>
										<span class="location">Australia</span>
									</div>
									<div class="rattings">
										<i class="fa fa-star fill"></i>
										<i class="fa fa-star fill"></i>
										<i class="fa fa-star fill"></i>
										<i class="fa fa-star-half fill"></i>
										<i class="fa fa-star"></i>
									</div>
								</div>
								<div class="freelance-box-extra">
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
									<ul>
										<li>Php</li>
										<li>Android</li>
										<li>Html</li>
										<li class="more-skill bg-primary">+3</li>
									</ul>
								</div>
								<a href="freelancer-detail.html" class="btn btn-freelance-two bg-default">View Detail</a>
								<a href="freelancer-detail.html" class="btn btn-freelance-two bg-info">View Detail</a>
							</div>
						</div>
					</div>
					
					
					<div class="col-md-4 col-sm-6">
						<div class="freelance-container style-2">
							<div class="freelance-box">
								<span class="freelance-status bg-warning">At Work</span>
								<h4 class="flc-rate">$22/hr</h4>
								<div class="freelance-inner-box">
									<div class="freelance-box-thumb">
										<img src="{{url('public/client_assets/img/can-5.jpg')}}" class="img-responsive img-circle" alt="" />
									</div>
									<div class="freelance-box-detail">
										<h4>Delores R. Williams</h4>
										<span class="location">United States</span>
									</div>
									<div class="rattings">
										<i class="fa fa-star fill"></i>
										<i class="fa fa-star fill"></i>
										<i class="fa fa-star fill"></i>
										<i class="fa fa-star-half fill"></i>
										<i class="fa fa-star"></i>
									</div>
								</div>
								<div class="freelance-box-extra">
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
									<ul>
										<li>Php</li>
										<li>Android</li>
										<li>Html</li>
										<li class="more-skill bg-primary">+3</li>
									</ul>
								</div>
								<a href="freelancer-detail.html" class="btn btn-freelance-two bg-default">View Detail</a>
								<a href="freelancer-detail.html" class="btn btn-freelance-two bg-info">View Detail</a>
							</div>
						</div>
					</div>
					
					
					<div class="col-md-4 col-sm-6">
						<div class="freelance-container style-2">
							<div class="freelance-box">
								<span class="freelance-status">Available</span>
								<h4 class="flc-rate">$19/hr</h4>
								<div class="freelance-inner-box">
									<div class="freelance-box-thumb">
										<img src="{{url('public/client_assets/img/can-5.jpg')}}" class="img-responsive img-circle" alt="" />
									</div>
									<div class="freelance-box-detail">
										<h4>Daniel Disroyer</h4>
										<span class="location">Bangladesh</span>
									</div>
									<div class="rattings">
										<i class="fa fa-star fill"></i>
										<i class="fa fa-star fill"></i>
										<i class="fa fa-star fill"></i>
										<i class="fa fa-star-half fill"></i>
										<i class="fa fa-star"></i>
									</div>
								</div>
								<div class="freelance-box-extra">
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
									<ul>
										<li>Php</li>
										<li>Android</li>
										<li>Html</li>
										<li class="more-skill bg-primary">+3</li>
									</ul>
								</div>
								<a href="freelancer-detail.html" class="btn btn-freelance-two bg-default">View Detail</a>
								<a href="freelancer-detail.html" class="btn btn-freelance-two bg-info">View Detail</a>
							</div>
						</div>
					</div>
					
				</div>
				
				
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="text-center">
							<a href="freelancers-2.html" class="btn btn-primary">Load More</a>
						</div>
					</div>
				</div>
				
			</div>
		</section> -->
		<!-- End Pricing Section -->
		
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
						<p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui non, semper orci. Curabitur blandit, diam ut ornare ultricies.</p>
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