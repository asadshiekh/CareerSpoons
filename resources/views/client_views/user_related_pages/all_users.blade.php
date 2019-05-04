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
					<!-- <div class="row">
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
					</div> -->
					<!-- search filter End -->
					
					<!-- Manage Employee -->
					<div class="row">
						<div class="col-sm-9">
					<?php 
                    if($candidates===0){ ?>
                    
                        <h4 style="color:red;text-align:center;font-size:17px">  Sorry! Record Not Found </h4>
                    
                    <?php }else{ ?>
						
						@foreach ($candidates as $value)
						<div class="col-md-4 col-sm-4">
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
										<img src="{{url('uploads/client_site/profile_pic')}}/{{$value->profile_image}}" class="img-responsive" alt="" />
									</div>
									<h4>{{$value->candidate_name}}</h4>
									<span>(<?php  
										if(empty($value->candidate_profession)){
											echo "Profession Not Set";
										}	
										else{

										   echo $value->candidate_profession;
										}
									 ?> )</span>
									<p><i>(<?php  
										if(empty($value->candidate_city)){
											echo "City Not Set";
										}	
										else{

										   echo $value->candidate_city;
										}
									 ?> )</i></p>
									<ul class="employee-social">
										<li><a href="{{$value->candidate_fackbook}}" title="" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<li><a href="{{$value->candidate_google}}" title="" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<li><a href="{{$value->candidate_twitter}}" title="" target="_blank"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="{{$value->candidate_linkedin}}" title="" target="_blank"><i class="fa fa-linkedin"></i></a></li>
										
									</ul>
									
								</div>
								<a href="{{url('candidate-profile')}}/{{$value->candidate_id}}" title="" class="cndt-profile-btn">View Profile</a>
							</div>
						</div>
						@endforeach
					<?php } ?>	
					<div class="row">
						<ul class="pagination">
							 <h5 style="text-align:center">
							 	<?php 
								if($candidates != "0"){ 

                                   echo $candidates->links();
								}	
								?>
							 	
							 </h5>
							</ul>
					</div>
                      
						</div>
						<div class="col-sm-3" style="background-color: white;">
							<h4>Filter User</h4>
							<form action="{{url('filter-user')}}" method="post">
								@csrf
							<div class="input-group col-sm-12">
								<br/>
								<label>&nbsp City</label>
								<select class="form-control" name="selected_city" id="selected_city">
									<option hidden selected value=" <?php if($cit){echo $cit;} ?> "><?php if($cit){echo $cit;}else{echo 'Select City';} ?></option>
									@foreach($city as $c)
									<option value="{{$c->company_city_name}}">{{$c->company_city_name}}</option>
									@endforeach
								</select>

							</div>
							<div class="input-group col-sm-12">
								<br/>
								<label>&nbsp Gender</label>
								<select class="form-control" name="selected_gender" id="selected_gender">
									<option hidden selected value="<?php if($gender){echo $gender;} ?>"><?php if($gender){echo $gender;}else{echo 'Select Gender';} ?></option>
									<option value="Male">Male</option>
									<option value="female">Female</option>


								</select>

							</div>
							<div class="input-group col-sm-12">
								<br/>
								<label>&nbsp Career Level</label>
								<select class="form-control" name="selected_career" id="selected_career">
								   <option hidden selected value="<?php if($career){echo $career;} ?>"><?php if($career){echo $career;}else{echo 'Select Career Level';} ?></option>
								   <option value="Entry Level">Entry Level</option>
	                               <option value="Intermediate">Intermediate</option>
	                               <option value="Experienced Professional">Experienced Professional</option>
	                               <option value="Department Head">Department Head</option>
	                               <option value="Gm / CEO / Country Head">Gm / CEO / Country Head</option>
								</select>

							</div>
							<div class="input-group col-sm-12">
								<br/>
								<label>&nbsp Qualification</label>
								<select class="form-control" name="selected_qual" id="selected_qual">
									<option hidden  selected value="<?php if($quali){echo $quali;} ?>"><?php if($quali){echo $quali;}else{echo 'Select Qualification';} ?></option>
									@foreach($qual as $q)
									<option value="{{$q->qualification_title}}">{{$q->qualification_title}}</option>
									@endforeach
								</select>

							</div>
							<div class="input-group col-sm-12">
								<br/>
								<label>&nbsp Industry</label>
								<select class="form-control" name="selected_indus" id="selected_indus">
									<option hidden selected value="<?php if($indus){echo $indus;} ?>"><?php if($indus){echo $indus;}else{echo 'Select Industry';} ?></option>
									@foreach($industry as $in)
									<option value="{{$in->company_industry_name}}">{{$in->company_industry_name}}</option>
									@endforeach
								</select>

							</div>
							<div class="input-group col-sm-12">
								<br/>
								<button class="btn btn-success" type="submit"> Filter User </button>
                                <br/><br/><br/>
							</div>
						</form>
						</div>
					</div>
					

				</div>
			</section>
			<!-- Employee List End -->
			
			
		@endsection