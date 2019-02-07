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
									<li><div class="verified-action">Verified</div></li>
								</ul>
							</div>
						</div>
						<div class="left-side-container">
							
							<div class="header-details">
								<!-- <h4>{{$fetch_company->company_name}}</h4>-->
								<p><?php 
								$fetch_company->company_info=str_replace("<p>"," ",$fetch_company->company_info);
								echo $fetch_company->company_info=str_replace("</p>"," ",$fetch_company->company_info);
								?></p> 
							
								
							</div>
						</div>
						<div class="right-side-detail">
							<ul class="social-info">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>
					
					<div class="col-md-4 bl-1 br-gary">
						<div class="right-side-detail">
							<ul>
								<li><span class="detail-info">Website:</span>{{$fetch_company->company_website}}</li>
								<li><span class="detail-info">Location:</span>{{$fetch_company->company_location}}</li>
								<li><span class="detail-info">City:</span>{{$fetch_company->company_city}}</li>
								<li><span class="detail-info">Phone no:</span>{{$fetch_company->company_phone}}</li>
								<li><span class="detail-info">Email:</span>{{$fetch_company->company_email}}</li>
								<li><span class="detail-info">Branch:</span>{{$fetch_company->company_branch}}</li>
								<li><span class="detail-info">No of Employees:</span>{{$fetch_company->company_employees}}</li>
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
											<span class="resume-exp"><button type="button" class="btn btn-success" onclick="view_post_private('{{$fetch_post->post_id}}');" style="height: 25px;padding-top: 1px;">view</button></span>
										</div>
										
									</div>
								</div>
							</div>
							<span class="tg-themetag tg-featuretag"><b>Posted At: {{ date('d M',strtotime($fetch_post->created_at)) }} </b></span>
						</article>
						@endforeach
						<div class="row">
							<ul class="pagination">
							 <h5 style="text-align:center">{{$fetch_posts->links()}}</h5>
							</ul>
						</div>
						</div>
						 <?php if(!Session::get("company_id")){
                                    ?>
						<div class="row no-mrg">
								<div class="comments-form"> 
									<div class="section-title2">
										<h3>Comments (2)</h3>
									</div>
									<form action="/review-comments" method="post">
										{{ csrf_field() }}
									<div class="col-md-6 col-sm-6">
										<input type="text" class="form-control" name="u_name" id="u_name" placeholder="Your Name">
									</div>
									<div class="col-md-6 col-sm-6">
										<input type="email" class="form-control" name="u_email" id="u_email" placeholder="Your Email">
									</div>
									<div class="col-md-12 col-sm-12">
										<textarea class="form-control" placeholder="Comment" name="u_comment" id="u_comment"></textarea>
									</div>
                                    <?php if(Session::get("login_status") == "Active"){
                                    ?>
									<button class="thm-btn btn-comment" type="button" onclick="add_review_comment();">submit now</button>
                                    <?php }else{ ?>
                                    <button class="btn btn-success btn-comment" style="pointer-events: none;" disabled="disabled">First Sign In to post a Comment</button>

                                    <?php } ?>
									</form>
								</div>
						</div>
						<?php  } ?>



						
						
					</div>






					<div class="col-md-5 col-sm-5">
						<!-- Similar Jobs -->
						<div class="container-detail-box">
						
							<div class="apply-job-header">
									<h4>Reviews</h4>
								</div>
							
							<div class="row">
								
								<!-- Single Review -->
								<div class="review-list">
									<div class="review-thumb">
										<img src="{{url('public/client_assets/img/client-1.jpg')}}" class="img-responsive img-circle" alt="" />
									</div>
									<div class="review-detail">
										<h4>Daniel Luke<span>3 days ago</span></h4>
										<span class="re-designation">Web Developer</span>
										<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et .</p>
									</div>
								</div>
								
								<!-- Single Review -->
								<div class="review-list">
									<div class="review-thumb">
										<img src="{{url('public/client_assets/img/client-2.jpg')}}" class="img-responsive img-circle" alt="" />
									</div>
									<div class="review-detail">
										<h4>Daniel Luke<span>3 days ago</span></h4>
										<span class="re-designation">Web Developer</span>
										<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis.</p>
									</div>
								</div>
								
								<!-- Single Review -->
								<div class="review-list">
									<div class="review-thumb">
										<img src="{{url('public/client_assets/img/client-3.jpg')}}" class="img-responsive img-circle" alt="" />
									</div>
									<div class="review-detail">
										<h4>Daniel Luke<span>3 days ago</span></h4>
										<span class="re-designation">Web Developer</span>
										<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis .</p>
									</div>
								</div>
								
								<!-- Single Review -->
								<div class="review-list">
									<div class="review-thumb">
										<img src="{{url('public/client_assets/img/client-4.jpg')}}" class="img-responsive img-circle" alt="" />
									</div>
									<div class="review-detail">
										<h4>Daniel Luke<span>3 days ago</span></h4>
										<span class="re-designation">Web Developer</span>
										<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum fuga.</p>
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
					<div class="col-sm-12 col-md-12">
												<!-- Similar Jobs -->
						<div class="container-detail-box">
						
							<div class="row">
								<div class="col-md-12">
									<h4>Similar Companies</h4>
								</div>
							</div>
							
							<div class="row">
								<div class="grid-slide-2">
									
									<!-- Single Freelancer & Premium job -->
									@foreach($fetch_similar as $fetch_s)
									<div class="freelance-box">
										<div class="popular-jobs-container">
											<div class="popular-jobs-box">
												<span class="popular-jobs-status bg-success">{{$fetch_s->company_location}}</span>
												<h4 class="flc-rate"><!-- $17/hr --></h4>
												<div class="popular-jobs-box">
													<div class="popular-jobs-box-detail">
														<h4>{{$fetch_s->company_name}}</h4>
														<span class="desination">{{$fetch_s->company_type}}</span>
													</div>
												</div>
												<div class="popular-jobs-box-extra">
													<ul class="employee-social">
										<li><a href="{{$fetch_org_links->organization_fackbook}}" title="" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<li><a href="{{$fetch_org_links->organization_google}}" title="" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<li><a href="{{$fetch_org_links->organization_twitter}}" title="" target="_blank"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="{{$fetch_org_links->organization_linkedin}}" title="" target="_blank"><i class="fa fa-linkedin"></i></a></li>
										
									</ul>
													<p><?php
													 $fetch_s->company_info = str_replace("<p>"," ",$fetch_s->company_info);
													 echo $fetch_s->company_info = str_replace("</p>"," ",$fetch_s->company_info);
													 ?></p>
												</div>
											</div>
											<a href="{{url('single-company-profile')}}/{{$fetch_s->company_id}}" class="btn btn-popular-jobs bt-1">View Detail</a>
										</div>
									</div>
									@endforeach
									
									
							
								</div>
							</div>
							
						</div>
					</div>
					
					
					
				</div>
			</section>

			<!-- Freelancer Detail End -->
<script type="text/javascript">
function add_review_comment(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 	alert(CSRF_TOKEN);
 //  var name= $("#u_name").val();
 //  var email= $("#u_email").val();
 //  var comment= $("#u_comment").val();
 // alert("name ="+name+" email ="+email+"comment ="+comment);
 $.post("/review-comments",{_token:CSRF_TOKEN},function(data){
   alert(data);
 });
}
</script>
@endsection