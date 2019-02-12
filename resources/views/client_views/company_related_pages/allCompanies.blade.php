@extends('client_views.master2')
@section('content')
			
			<!-- Title Header Start -->
			<section class="inner-header-page">
				<div class="container">
					
					<h2>Hire The Best UI Specialists</h2>
					<p>Work with the world’s best talent on Upwork — the top freelancing website trusted by over 5 million businesses.</p>
					
				</div>
			</section>
			<div class="clearfix"></div>


			<!-- Employee list start -->
			<section class="manage-employee gray">
				<div class="container">
					<!-- search filter -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="search-filter">
							
								<div class="col-md-4 col-sm-5">
									<div class="filter-form">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Search…">
											<span class="input-group-btn">
												<button type="button" class="btn btn-default">Go</button>
											</span>
										</div>
									</div>
								</div>
									
								<div class="col-md-8 col-sm-7">
									<div class="short-by pull-right">
										Short By
										<div class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <i class="fa fa-angle-down" aria-hidden="true"></i></a>
										<ul class="dropdown-menu">
											<li><a href="#">Short By Date</a></li>
											<li><a href="#">Short By Views</a></li>
											<li><a href="#">Short By Popular</a></li>
										</ul>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<!-- search filter End -->
					
					<!-- Manage Employee -->
					<div class="row">
						<?php 
                    if($org===0){ ?>
                    
                        <h4 style="color:red;text-align:center;font-size:17px">  Sorry! Record Not Found </h4>
                    
                    <?php }else{ ?>
						
						@foreach ($org as $orgs)
						<div class="col-md-3 col-sm-3">
							<div class="manage-cndt">

							<div class="pull-right">
									<div class="btn-group action-btn">
										<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<i class="fa fa-ellipsis-v"></i>
										</button>
										<ul class="dropdown-menu pull-right" role="menu">
											<li><a href="#">Profile</a>
											</li>
											<li><a href="#">Preview Resume</a>
											</li>
											<li><a href="#">User Summery</a>
											</li>
										</ul>
									</div>
								</div>
								
								<div class="cndt-caption">
									<div class="cndt-pic" style="margin-left: 25%;">
										<img src="{{url('uploads/organization_images')}}/{{$orgs->company_img}}" class="img-responsive" alt="" />
									</div>
									<h4><a href="{{url('single-company-profile')}}/{{$orgs->company_id}}" title="view company">{{$orgs->company_name}}</a></h4>
									<span>( {{$orgs->company_type}} )</span>
									<p><i>{{$orgs->company_city}}</i></p>
									<ul class="employee-social">
										<li><a href="{{$orgs->organization_fackbook}}" title="" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<li><a href="{{$orgs->organization_google}}" title="" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<li><a href="{{$orgs->organization_twitter}}" title="" target="_blank"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="{{$orgs->organization_linkedin}}" title="" target="_blank"><i class="fa fa-linkedin"></i></a></li>
										
									</ul>
									
								</div>
								<a href="{{url('single-company-profile')}}/{{$orgs->company_id}}" title="" class="cndt-profile-btn">View Profile</a>
							</div>
						</div>
						@endforeach
					<?php } ?>



						

					</div>
					<div class="row">
							<ul class="pagination">
							 <h5 style="text-align:center">
							 	<?php 
								if($org != "0"){ 

									echo $org->links();

								}	
								?>
							 	
							 </h5>
							</ul>
						</div>
				</div>
			</section>
			<!-- Employee List End -->
			
			
		@endsection