@extends('client_views.master2')
@section('content')

		<section class="inner-header-page">
			<div class="container">
				
				<div class="col-md-8">
					<div class="left-side-container">
						<div class="freelance-image"><a href="company-detail.html"><img src="{{url('public/client_assets/img/can-5.jpg')}}" class="img-responsive img-circle" alt=""></a></div>
						<div class="header-details">
							<h4>{{$fetch_company->company_name}}</h4>
							<p>(<?php
								
								$fetch_company->company_industry= str_replace("_"," ",$fetch_company->company_industry);
								echo $fetch_company->company_industry;

							?>)</p>
							<ul>
								<li><img class="flag" src="assets/img/gb.svg" alt="">Pakistan</li>
								<?php if($fetch_company->company_verify_status == "0"){?>
                                <li>
                                	<div style="background-color:red;padding: 2%;border-radius: 11%;color:white;font-weight: bold;padding:5px;"><span class="protip" data-pt-scheme="purple" data-pt-gravity="top 0 -15; bottom 0 15" data-pt-title="CareerSpoons Encourages all employers to verify their companies by providing us a copy of their CNIC or Government issues Identification in the form of image. Please keep in mind that not all employers submit this details. Those who don't are therefore listed on our website as “Unverified.”" data-pt-animate="shake" style="line-height:2">
                                		UnVerified</span>
                                	</div>
                        		</li>
								<?php }else{ ?>
								<li><div class="verified-action">Verified</div></li>
							<?php } ?>
							</ul>
						</div>
					</div>
					<div class="left-side-container">
						
						<div class="header-details">
							<!-- <h4>{{$fetch_company->company_name}}</h4>-->
							<p><?php 

							if(empty($fetch_company->company_info)){

								echo "<span style='color:red'> Company Details Not Given By the Company Yet </span>";
							}
							else{

							$fetch_company->company_info=str_replace("<p>"," ",$fetch_company->company_info);
							echo $fetch_company->company_info=str_replace("</p>"," ",$fetch_company->company_info);
							}


							?>
								

							</p> 
						
							
						</div>
					</div>
					<div class="right-side-detail">
						<ul class="social-info">
							<li><a href="{{$company_social_links->organization_fackbook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="{{$company_social_links->organization_twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<li><a href="{{$company_social_links->	organization_linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="{{$company_social_links->	organization_google}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4 bl-1 br-gary">
					<div class="right-side-detail">
						<ul>
								<li><span class="detail-info">Website:</span><?php
								if($fetch_company->company_website == 'www.example.com'){
									echo "<span style='color:red'> Not Given Yet </span>";
								}else{
									echo $fetch_company->company_website; 
								}									
								?></li>
								<li><span class="detail-info">Location:</span><?php 

								if(empty($fetch_company->company_location)){
									echo "<span style='color:red'> Not Given Yet </span>";
								}else{
									echo $fetch_company->company_location; 
								}	

								?></li>
								<li><span class="detail-info">City:</span>{{$fetch_company->company_city}}</li>
								<li><span class="detail-info">Phone no:</span>{{$fetch_company->company_phone}}</li>
								<li><span class="detail-info">Email:</span>{{$fetch_company->company_email}}</li>
								<li><span class="detail-info">Branch:</span>
								<?php

									if(empty($fetch_company->company_branch)){
									echo "<span style='color:red'> Not Given Yet </span>";
								}else{
									echo $fetch_company->company_branch; 
								}	

								?></li>
								<li><span class="detail-info">No of Employees:</span><?php 

								if($fetch_company->company_employees=='0'){
									echo "<span style='color:red'> Not Given Yet </span>";
								}
								else{
									echo $fetch_company->company_employees;
								}

								?></li>
							</ul>
						
					</div>
				</div>
				
			</div>
		</section>
		<div class="clearfix"></div>
		<!-- Title Header End -->
		
		<!-- Freelancer Detail Start -->
		<section>
			<div class="container">
				
				<div class="col-md-7 col-sm-7">
					<div class="container-detail-box">
					   
						<div class="apply-job-header">
							<h4>Posted Jobs</h4>
							<!-- <a href="company-detail.html" class="cl-success"><span><i class="fa fa-building"></i>App Developer</span></a>
							<span><i class="fa fa-map-marker"></i>United Kingdom</span> -->
						</div>
						<?php if($fetch_posts === 0){
							echo "<span style='color:red;'>No Post Yet!</span>";
						} else{?>
						
					@foreach($fetch_posts as $fetch_post)	
					<article id="post-show{{$fetch_post->post_id}}">
						<div class="brows-resume">
							<div class="row">
								
								<div class="col-md-4 col-sm-4">
									<div class="brows-resume-name">
										<h4 id="job_name{{$fetch_post->post_id}}">{{$fetch_post->job_title}}</h4>
										<span class="brows-resume-designation">( <i id="industry-td{{$fetch_post->post_id}}">
										<?php
											
											$fetch_post->req_industry= str_replace("_"," ",$fetch_post->req_industry);
											echo $fetch_post->req_industry;

										?> </i>)</span>

										<span class="cand-status"><i class="far fa-clock"></i> <?php 

											// $this->load->helper('date');

										//client created date get from database
										$date=$fetch_post->created_at; 

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
								
								<div class="col-md-4 col-sm-4">
									<div class="brows-resume-name">
										<span><i class="fas fa-user-plus" id="position-td{{$fetch_post->post_id}}">&nbsp; 
											<?php 

												if($fetch_post->total_positions>1){

										echo   $fetch_post->total_positions.' 
										 Positions' ;
												}
												else{
													echo $fetch_post->total_positions.' Position' ;

												}	

											?>
											</i></span>
									</div>
								</div>

																

								<div class="col-md-4 col-sm-4">
									<div class="brows-resume-name" style="text-align: center;">
										<span><i class="fa fa-yelp"></i>
										Exp. 
										  <span id="exp-td{{$fetch_post->post_id}}">{{$fetch_post->job_experience}} Year</span></span>
									</div>
								</div>

								

							</div>
							<div class="row extra-mrg row-skill">
								<div class="browse-resume-skills">
									<div class="col-md-9 col-sm-9">
										<div class="br-resume" id="skill-tags">
											<?php
											$str_tag=explode(",", $fetch_post->job_skills);
											$count_skill= count($str_tag);
                                             for($i=0;$i<$count_skill;$i++){
                                             	echo "<span>".$str_tag[$i]."</span>";
                                             }
											 ?>
											
										</div>
									</div>
									<div class="col-md-3 col-sm-3">
										<span class="resume-exp"><a href="{{('job-details')}}/{{$fetch_post->post_id}}" class="btn btn-success" style="height: 25px;padding-top: 1px;">view</button></span>
									</div>
									
								</div>
							</div>
						</div>
						<span class="tg-themetag tg-featuretag"><b>Posted At: {{ date('d M',strtotime($fetch_post->created_at)) }} </b></span>
					</article>
					@endforeach
				<?php } ?>
					<div class="row">
						<ul class="pagination">
						 <h5 style="text-align:center"><?php if($fetch_posts===0){}else{echo $fetch_posts->links();} ?></h5>
						</ul>
					</div>
					</div>
					



					
					
				</div>






				<div class="col-md-5 col-sm-5">
					<!-- Similar Jobs -->
					<div class="container-detail-box">
						
							<div class="apply-job-header">
									<h4>Reviews</h4>
								</div>
							
							<div class="row">
								<span id="reviews_c"></span>
								<!-- Single Review -->
								
							   <?php if(Session::get("id")){
						 	   $u_id=Session::get("id");
						 	   $data=DB::table('reviews_comments')->where(['company_id'=>$fetch_company->company_id,'user_id'=>$u_id,])->count();
  									if($data>0){
  										$data1=DB::table('reviews_comments')->where(['company_id'=>$fetch_company->company_id,'user_id'=>$u_id,])->first();
  										$user_img=DB::table('user_profile_images')->where(['candidate_id'=>$u_id])->select('profile_image')->first();
                                    ?>
								<div class="review-list" id="personal_comment">
									<div class="review-thumb" style="width: 95px;">
										<img src="{{url('uploads/client_site/profile_pic')}}/{{$user_img->profile_image}}" class="img-responsive img-circle" style="border solid 3px grey;" alt="" />
									</div>
									
									<div class="review-detail">

										<h4 class="col-sm-7" id="name-user">{{$data1->user_name}}</h4>
										<span class="col-sm-5" style="font-size: 12px; font-family: Georgia,Regular"><span class="cand-status"><i class="far fa-clock"></i> <?php 

   											// $this->load->helper('date');

    										//client created date get from database
											$date=$data1->created_at; 

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

											?></span></span>
										<span class="re-designation col-sm-12" style="font-size: 12px;" id="email-user">({{$data1->user_email}})</span>
										<p class="col-sm-12" style="font-family: Georgia,Regular;margin-top: 8px;" id="comment-user">{{$data1->user_comments}}.</p>
										<p class="col-sm-12" style="text-align: right;margin-top: 0px;margin-bottom: 0px;">
											<a type="button" onclick="edit_model('{{$data1->comment_id}}');" data-toggle="tooltip" title="Edit" style="color: green;font-size: 20px;"><i class="fa fa-edit"></i></a>&nbsp&nbsp|&nbsp&nbsp
											<a href="{{url('delete-review-comments')}}/{{$data1->comment_id}}" data-toggle="tooltip" title="Delete" style="color: red;font-size: 20px;"><i class="fa fa-trash-o"></i></a>
										
									</p>
									</div>

								</div>
								<hr/>
								<?php }
							    } 
								if($fetch_comments===0){
									if(!Session::get("id")){
									 echo "<p style='text-align:center;'><span style='color:red;' id='comm-id'>No Comments</span></p>";
									}
								 }else{
                                 
							    ?>
								@foreach($fetch_comments as $comm)
								<div class="review-list">
									<div class="review-thumb" style="width: 95px;">
										<img src="{{url('uploads/client_site/profile_pic')}}/{{$comm->profile_image}}" class="img-responsive img-circle" style="border solid 3px grey;" alt="" />
									</div>
									
									<div class="review-detail">

										<h4 class="col-sm-7">{{$comm->user_name}}</h4>
										<span class="col-sm-5" style="font-size: 12px; font-family: Georgia,Regular"><span class="cand-status"><i class="far fa-clock"></i> <?php 

   											// $this->load->helper('date');

    										//client created date get from database
											$date=$comm->created_at; 

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

											?></span></span>
										<span class="re-designation col-sm-12" style="font-size: 12px;">({{$comm->user_email}})</span>
										<p class="col-sm-12" style="font-family: Georgia,Regular;margin-top: 8px;">{{$comm->user_comments}}.</p>
										<span class="col-sm-12"></span>

									</div>
								</div>
								@endforeach
								<?php }?>
							</div>
							
						</div>
				</div>
				
				
				
				
			</div>
		</section>

		@endsection


	