@extends('client_views.master2')
@section('content')


<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url('uploads/client_site/cover_photo/cropped/{{$img->cover_image}}');">
				<div class="container">
					<h1>Resume Detail</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- Resume Detail Start -->
			<section class="detail-desc">
				<div class="container white-shadow">
					<div class="row mrg-0">
						<div class="detail-pic">
							<img src="{{url('uploads/client_site/profile_pic')}}/{{$img->profile_image}}" class="img" alt="" />
							<a href="#" class="detail-edit" title="Candidate Image" ><i class="fas fa-shield-alt"></i></a>
						</div>
						@if($info->verify_by_email=='1')
						<div class="detail-status" data-aos="flip-up"><span class="protip" data-pt-scheme="leaf" data-pt-gravity="top 0 -15; bottom 0 15" data-pt-title="Candidate is Verify By Email" data-pt-animate="bounceIn">Verified Candidate</span></div>
						@else
						<div class="detail-status"><span class="protip" data-pt-gravity="top 0 -15; bottom 0 15" data-pt-title="Candidate is not Verified By Email" data-pt-animate="shake" data-pt-scheme="red" style="background-color: red; color: white">UnVerified Candidate</span></div>
						@endif
					</div>
					<div class="row bottom-mrg mrg-0">
						<div class="col-md-8 col-sm-8">
							<div class="detail-desc-caption">
								<div id="new_typed-strings">
									<div class="contains_heading" style="font-size: 6px">
										<h4>{{$general_info->candidate_name}}</h4>
										
										<span class="designation">
										<?php 
											if(empty($general_info->candidate_profession)){
												echo "<p style='color:red'> Profession Not Set Yet </p>";
											}
											else{
												echo $general_info->candidate_profession;
											}
										?>
										</span>
										
										<p><?php 

										if(empty($general_info->candidate_website)){

										}else{
											echo $general_info->candidate_website; 
										}

										?></p>
									
									</div>
								</div>

								<span id="new_typed"></span>
								
								
								<br>
							</div>
							<div class="detail-desc-skill">
								@foreach ($get_candidate_skill_just_six as $skill)
								<span>{{$skill->skill_name}}</span>
								@endforeach
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="get-touch">
								<h4>Get in Touch</h4>
								<ul>
									<li><i class="fa fa-map-marker"></i><span>{{$general_info->candidate_city}}, {{$general_info->candidate_location}}</span></li>
									<li><i class="fa fa-envelope"></i><span>{{$info->user_email}}</span></li>
									
									<li><i class="fas fa-birthday-cake"></i><span>{{$general_info->candidate_dob}} , <b>{{$general_info->candidate_age}}</b> Year Old</span></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row no-padd mrg-0">
						<div class="detail pannel-footer">
							<div class="col-md-5 col-sm-5">
								<ul class="detail-footer-social">

									<li><a href="{{$links->candidate_fackbook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li><a href="{{$links->candidate_google}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="{{$links->candidate_twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<li><a href="{{$links->candidate_linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
									
								</ul>
							</div>
							<div class="col-md-7 col-sm-7">
								<div class="detail-pannel-footer-btn pull-right">
									<!-- <a href="#" class="footer-btn grn-btn" title="">Hire Now</a> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Resume Detail End -->
			
			<section class="full-detail-description full-detail">
				<div class="container">
				
					<div class="row row-bottom mrg-0">
						<h2 class="detail-title">About Resume</h2>
						<p>{{$general_info->candidate_resume_details}}</p>
					</div>
					
					<div class="row row-bottom mrg-0">
						<h2 class="detail-title">Education</h2>
						
						<?php 
							if($candidate_education===0){ ?>
								<h4 style="color:red; text-align: center;">  Dont Have Any Eduction Yet!</h4>
							<?php }else{ 	
								foreach ($candidate_education as $edu) { ?>

							<div class="media">
								<div class="media-left media-middle">
									<a href="#">
										<img class="media-object" src="{{url('public/client_assets/img/university/university.png')}}" alt="..." style="width:25px; height:25px">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">{{ $edu->Institute_name}}</h4>
									<h5>{{$edu->degree_level}} , 
										<?php  

										if($edu->selected_result=="CGPA"){

											echo $edu->cgpa." CGPA";
										}

										else{

											echo $edu->percentage." %";
										}

										?>


									</h5>
									<h5 style="color:gray"><?php echo  date('Y',strtotime($edu->edu_start)) ?> - <?php echo date('Y',strtotime($edu->edu_end))?></h5>
									{{$edu->edu_description}}
									<h6 style="color:gray">{{$edu->	degree_title}} With the Major in 
									<?php  
									$edu->majors= str_replace("_"," ",$edu->majors);
									echo $edu->majors
									?></h6>
								</div>
							</div>
							<hr>
							<?php }} ?>
					</div>
					<div class="row row-bottom mrg-0">
						<h2 class="detail-title">Work Experience</h2>
						<?php 
							if($candidate_experience===0){ ?>
								<h4 style="color:red; text-align: center;">  Dont Have Any Experience Yet!</h4>
							<?php }else{ 	
								foreach ($candidate_experience as $exp) { ?>

						<div class="media">
							<div class="media-left media-middle">
								<a href="#">
									<img class="media-object" src="{{url('public/client_assets/img/university/experience.png')}}" alt="..." style="width:25px; height:25px">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">{{$exp->job_title}} In {{$exp->company_name}}</h4>



								<h5 style="color:gray"><?php echo  date('Y',strtotime($exp->exp_start)) ?> - <?php echo date('Y',strtotime($exp->exp_end))?></h5>
								{{$exp->exp_description}}
								<h6 style="color:gray">Your Postion in Company <b>{{$exp->your_position}}</b></h6>
							</div>
						</div>
						<hr>
						<?php }} ?>
					</div>
					<div class="row row-bottom mrg-0">
						<h2 class="detail-title">Candidate Projects</h2>
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->

						<?php 
						if($candidate_project===0){ ?>
							<h4 style="color:red; text-align: center;">  Dont Have Any Project Yet!</h4>
						<?php }else{ 	
							foreach ($candidate_project as $pro) { ?>

						<div class="media">
							<div class="media-left media-middle">
								<a href="#">
									<img class="media-object" src="{{url('public/client_assets/img/university/project.png')}}" alt="..." style="width:25px; height:25px">
								</a>
							</div>
							<div class="media-body">


								<h4 class="media-heading">{{$pro->project_title}} In {{$pro->project_company_name}}</h4>
								<h5 style="color:gray"><?php echo  date('Y',strtotime($pro->pro_start))?> - <?php echo date('Y',strtotime($pro->pro_end))?></h5>
								{{$pro->project_description}}
								<h6 style="color:gray">Your Postion in Company <b>{{$pro->your_porject_position}}</b></h6>
							</div>
						</div>
						<hr>
						<?php }} ?>

					</div>
					
					<div class="row row-bottom mrg-0">
						<h2 class="detail-title">Skills</h2>
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
						<div class="ext-mrg row third-progress">
							<div class="col-md-12 col-sm-12">
								<div class="panel-body">
									<div class="row">

									<?php 
		                    if($candidate_skill===0){ ?>
		                   <h4 style="color:red;text-align:center;"> Dont Have Any Skill Yet!</h4>
		                  <?php } else{
		                  	foreach ($candidate_skill as $skill) { 
		                   ?> 
									<div class="col-md-6 col-sm-12">
									<h3 class="progressbar-title">{{ $skill->skill_name }}</h3>
									<div class="progress">
										<div class="progress-bar" style="width: {{ $skill->skill_percentage }}%; background: #26a9e1;">
											<span class="progress-icon fa fa-plus" style="border-color:#26a9e1; color:#26a9e1;"></span>
											<div class="progress-value">{{ $skill->skill_percentage }}%</div>
										</div>
									</div>
									</div>
									<?php  }}?>
									

									</div>
									
								<!-- 	<h3 class="progressbar-title">iPhone Development</h3>
									<div class="progress">
										<div class="progress-bar" style="width: 80%; background: #f6931e;">
											<span class="progress-icon fa fa-plus" style="border-color:#f6931e; color:#f6931e;"></span>
											<div class="progress-value">80%</div>
										</div>
									</div>
									
									<h3 class="progressbar-title">Digital Marketing</h3>
									<div class="progress">
										<div class="progress-bar" style="width: 65%; background: #8bc43f;">
											<span class="progress-icon fa fa-plus" style="border-color:#8bc43f; color:#8bc43f;"></span>
											<div class="progress-value">52%</div>
										</div>
									</div>
									
									<h3 class="progressbar-title">SEO/SMO</h3>
									<div class="progress">
										<div class="progress-bar" style="width: 52%; background: #d20001;">
											<span class="progress-icon fa fa-plus" style="border-color:#d20001; color:#d20001;"></span>
											<div class="progress-value">52%</div>
										</div>
									</div>
									
								</div>
							</div>
							
							<div class="col-sm-6 col-sm-6">
								<div class="panel-body">
									<h3 class="progressbar-title">Apps Development</h3>
									<div class="progress">
										<div class="progress-bar" style="width: 90%; background: #26a9e1;">
											<span class="progress-icon fa fa-plus" style="border-color:#26a9e1; color:#26a9e1;"></span>
											<div class="progress-value">90%</div>
										</div>
									</div>
									
									<h3 class="progressbar-title">iPhone Development</h3>
									<div class="progress">
										<div class="progress-bar" style="width: 80%; background: #f6931e;">
											<span class="progress-icon fa fa-plus" style="border-color:#f6931e; color:#f6931e;"></span>
											<div class="progress-value">80%</div>
										</div>
									</div>
									
									<h3 class="progressbar-title">Digital Marketing</h3>
									<div class="progress">
										<div class="progress-bar" style="width: 65%; background: #8bc43f;">
											<span class="progress-icon fa fa-plus" style="border-color:#8bc43f; color:#8bc43f;"></span>
											<div class="progress-value">52%</div>
										</div>
									</div>
									
									<h3 class="progressbar-title">SEO/SMO</h3>
									<div class="progress">
										<div class="progress-bar" style="width: 52%; background: #d20001;">
											<span class="progress-icon fa fa-plus" style="border-color:#d20001; color:#d20001;"></span>
											<div class="progress-value">52%</div>
										</div>
									</div> -->
									
								</div>
							</div>
						</div>
					</div>

					<div class="row row-bottom mrg-0">
						<h2 class="detail-title">Hobbies And Candidate Languages</h2>



						<div class="col-sm-6">
							<ul class="list-group">
									
							<?php 
		                    if($candidate_hobbies===0){ ?>
		                   <h4 style="color:red;"> Dont Have Any Hobbies Yet!</h4>
		                  <?php } else{
		                  	foreach ($candidate_hobbies as $hobbies) { 
		                   ?> 

								<li class="list-group-item">{{$hobbies->user_hobbies}}</li>
								<?php }}?>
							</ul>
						</div>
						


						<div class="col-sm-6">

							<ul class="list-group">


								<?php 
								if($candidate_languages===0){ ?>
									<h4 style="color:red;"> Dont Have Any Languages Yet!</h4>
								<?php } else{
									foreach ($candidate_languages as $languages) { 
										?> 

								<li class="list-group-item">{{$languages->user_language}}</li>
								<?php }} ?>
							</ul>
						</div>	
					</div>
					
				</div>
			</section>
		
@endsection