@extends('client_views.master')
@section('content')
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url(public/client_assets/img/banner-10.jpg);">
				<div class="container">
					<h1>Browse Jobs</h1>
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

					  foreach ($search_results as $val) { ?>

						<article>
							<div class="brows-job-list">
								<div class="col-md-1 col-sm-2 small-padding">
									<div class="brows-job-company-img">
										<a href="job-detail.html"><img src="{{url('public/client_assets/img/com-1.jpg')}}" class="img-responsive" alt="" /></a>
									</div>
								</div>
								<div class="col-md-6 col-sm-5">
									<div class="brows-job-position">
										<a href="job-detail.html"><h3>Senior front-end Developer</h3></a>
										<p>
											<span>Autodesk</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$750 - 800</span>
											<span class="job-type cl-success bg-trans-success">Full Time</span>
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
										<a href="job-detail.html" class="btn btn-success">View Details</a>
									</div>
								</div>
							</div>
							<span class="tg-themetag tg-featuretag">Premium</span>
						</article>
					<?php } ?>
					
					</div>
				

					<!--row-->
					<div class="row">
						<ul class="pagination">

							{{ $search_results->links() }}
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