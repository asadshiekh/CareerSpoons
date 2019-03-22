@extends('client_views.master')
@section('content')
<!-- Title Header Start -->
			
			<section class="inner-header-title" style="background-image:url(../public/client_assets/img/banner-11.jpg);">
				<div class="container">
					<h1>Job Detail</h1>
				</div>

			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->

						<!-- Resume Detail Start -->
			<section class="detail-desc">
				<div class="container white-shadow">
					<div class="row mrg-0">
						
						<div class="detail-pic">
							<img src="../uploads/organization_images/{{$job_detail->company_img}}" class="img" alt="" />
							<a href="#" class="detail-edit" title="Company Profile Image" ><i class="fas fa-shield-alt"></i></a>
						</div>



						<div class="detail-status">
							<span>
							<?php

							echo  $date = date('d F Y',strtotime($job_detail->created_at));
							    
							 ?>
							</span>
						</div>


					</div>
					<div class="row bottom-mrg mrg-0">
						<div class="col-md-9 col-sm-9">

								
							<div class="detail-desc-caption">
								<h4 style="border-bottom:3px double black;display:inline;"><a href="{{url('single-company-profile')}}/{{$job_detail->company_id}}"> 
									{{$job_detail->company_name}}</a></h4>
								<span style="padding-top: 3%; display:block;" class="designation">{{$job_detail->company_type}} Company</span>

								<p><?php $job_detail->company_info= str_replace("<p>"," ",$job_detail->company_info);
								$job_detail->company_info= str_replace("</p>"," ",$job_detail->company_info);
								 ?>
									{{$job_detail->company_info}}.</p>
								
							</div>
								
								
							
							
						</div>
						<div class="col-md-3 col-sm-3">
							<div class="get-touch">
								<h4>Get in Touch</h4>
								<ul>
									<li><i class="fa fa-map-marker"></i><span>{{$job_detail->company_location}}</span></li>
									<li><i class="fa fa-envelope"></i><span>{{$job_detail->company_email}}</span></li>
									<li><i class="fa fa-globe"></i><span>{{$job_detail->company_website}}</span></li>
									<li><i class="fa fa-phone"></i><span>{{$job_detail->company_phone}}</span></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row no-padd mrg-0">
						<div class="detail pannel-footer">
							<div class="col-md-5 col-sm-5">
								<ul class="detail-footer-social">
									<li><a href="{{$job_detail->organization_fackbook}}"><i class="fa fa-facebook"></i></a></li>
									<li><a href="{{$job_detail->organization_google}}"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="{{$job_detail->organization_twitter}}"><i class="fa fa-twitter"></i></a></li>
									<li><a href="{{$job_detail->organization_linkedin}}"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
							<div class="col-md-7 col-sm-7">
								<div class="detail-pannel-footer-btn pull-right">
                                    <?php 
                                    //dd($job_detail);
                                    if(Session::has("id")){

                                    $c_id=$job_detail->company_id;
                                    $p_id=$job_detail->post_id;
                                    
                                    $count=DB::table('apllied_jobs')->where(['company_id'=>$c_id,'post_id'=>$p_id,'user_id'=>Session::get("id")])->count();
                                    if($count == "0"){
                                   	?>
									<button id="go" type="button" class="btn btn-success" onclick="apply_now('{{$job_detail->company_id}}')">Apply Now</button>
								<?php }else{?>
									<button id="done" type="button" class="btn btn-success"  disabled>Applied <i class="fa fa-check"></i></button>
								<?php } }else{?>

                                    <button href="javascript:void(0)"  data-toggle="modal" data-target="#signup" type="button" class="btn btn-success">Apply Now</button>

								<?php } ?>
									<a href="{{url('single-company-profile')}}/{{$job_detail->company_id}}" class="footer-btn blu-btn" title="">View Company</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Resume Detail End -->
			

			
			<!-- Job full detail Start -->
			<section class="full-detail-description full-detail gray-bg">
				<div class="container">
					<!-- Job Description -->
					<div class="col-md-9 col-sm-12">
						<div class="full-card">
						
							<div class="row row-bottom mrg-0">
								<h2 class="detail-title">Job Detail</h2>
								<ul class="job-detail-des">
									<li><span>Role:</span>{{$job_detail->job_title}}</li>
									<li><span>Salary:</span>{{$job_detail->min_salary}} - {{$job_detail->max_salary}} Rs</li>
									<li><span>Industry:</span><?php
										
								echo $data = str_replace("_"," ",$job_detail->req_industry);
										
									
									?></li>
									<li><span>Required Experience:</span>{{$job_detail->job_experience}}</li>
									<li><span>Total Positions:</span>{{$job_detail->total_positions}}</li>
									<li><span>Working Hours:</span>{{$job_detail->working_hours}}</li>
									
								
								</ul>
							</div>
							
							<div class="row row-bottom mrg-0">
								<h2 class="detail-title">Location</h2>
								<ul class="job-detail-des">
									<li><span>Address:</span>{{$job_detail->company_location}}</li>
									<li><span>State:</span>Punjab</li>
									<li><span>Country:</span>Pakistan</li>
									<li><span>Telephone:</span>{{$job_detail->company_phone}}</li>
									<li><span>Email:</span>{{$job_detail->company_email}}</li>
								</ul>
							</div>
							<div class="row row-bottom mrg-0">
								<h2 class="detail-title">Job Preferences Cities:</h2>
								<ul class="job-detail-des">
									
									@foreach($job_p as $job_p)
									<div class="media">
										<div class="media-left media-middle">
											<a href="#">
												<img class="media-object" src="{{url('public/client_assets/img/university/circle.png')}}" alt="..." style="width:30px; height:30px">
											</a>
										</div>
										<div class="media-body">
											<h4 class="media-heading" style="color:grey"><b>In {{$job_p->city}}</b></h4>
											<h5 style="color:gray"><li><b style="padding-right: 2%;">Job Type:</b> {{$job_p->job_type}}</li>
											</h5>
											<h5 style="color:gray"><li><b style="padding-right: 2%;">Job Shift:</b> {{$job_p->job_shift}}</li>
											</h5>
											
											<h5 style="color:gray"><li><b style="padding-right: 2%;">last date for Apply:</b> {{$job_detail->last_apply_date}}</li></h5>
										</div>
									</div>
									<hr>
									@endforeach
									
								</ul>
							</div>
							<div class="row row-bottom mrg-0">
								<h2 class="detail-title">Job Qualification Requirements:</h2>
								<ul class="job-detail-des">
									
									@foreach($job_req as $job_req)
									<div class="media">
										<div class="media-left media-middle">
											<a href="#">

												<img class="media-object" src="{{url('public/client_assets/img/university/circle.png')}}" alt="..." style="width:30px; height:30px">
											</a>
										</div>
										<div class="media-body">
											
											<h5 style="color:gray"><li><b style="padding-right: 2%;">Qualification:</b> {{$job_req->req_qualification}}</li>
											</h5>
											<h5 style="color:gray"><li><b style="padding-right: 2%;">Degree Level:</b> {{$job_req->req_degree_level}}</li>
											</h5>
											
											<h5 style="color:gray"><li><b style="padding-right: 2%;">last date for Apply:</b> {{$job_detail->last_apply_date}}</li></h5>
										</div>
									</div>
									<hr>
									@endforeach
									
								</ul>
							</div>
							
							<div class="row row-bottom mrg-0">
								<h2 class="detail-title">Job Responsibilities</h2>
								<p><?php 
								$job_detail->job_post_info=str_replace("<p>","",$job_detail->job_post_info);
								echo $job_detail->job_post_info=str_replace("</p>","",$job_detail->job_post_info);
								?></p>
							</div>
							
							<div class="row row-bottom mrg-0">
							<h2 class="detail-title">Required Skills</h2>
							<p>
								<!-- {{$job_detail->job_skills}} -->

							<div class="apply-job-detail">
								
								<ul class="skills">
									<?php  
									$skill = explode(',',$job_detail->job_skills);
									foreach ($skill as $key => $value){
									?>
									<li>{{$value}}</li>
									<?php } ?>
								</ul>
							</div>


							</p>
							
							</div>
							
							<div class="row row-bottom mrg-0">
								<div class="col-sm-12 col-md-12">
								<h2 class="detail-title">Map Location</h2>
								<div id="map">
									
									
								</div>
									<!-- <ul id="geoData" style="padding-top: 3%;">
								    <li>Latitude: <span id="lat-span"></span></li>
								    <li>Longitude: <span id="lon-span"></span></li>
								    </ul> -->
									 <style type="text/css">
			                     	#map {
							            width: 100%;
							            height: 400px;
							        }
			                     </style>
								</div>
							</div>
							
						</div>
					</div>
					<!-- End Job Description -->
					
					<!-- Start Sidebar -->
					<div class="col-md-3 col-sm-12">
						<div class="sidebar right-sidebar">
							
							
							<div class="side-widget">
								<h2 class="side-widget-title">Advertisment</h2>
								<div class="widget-text padd-0">
									<div class="ad-banner">
										<img src="http://via.placeholder.com/320x285" class="img-responsive" alt="">
									</div>
								</div>
							</div>


						<div class="sidebar-wrapper">
							<div class="sidebar-box-header bb-1">
								<h4>Similar Jobs</h4>
							</div>

						 <?php 
                    if($job_similar===0){ ?>

                    	<span class="cl-danger">( Sorry ! Record Not Found )</span>
                    <?php }else{ ?>
						@foreach($job_similar as $job_similar)
							<div class="member-profile-list">
								<div class="member-profile-thumb">
									<a href="../uploads/organization_images/{{$job_similar->company_img}}"><img src="../uploads/organization_images/{{$job_similar->company_img}}" class="img-responsive img-circle" alt="" /></a>
								</div>
								<div class="member-profile-detail">
									<h4><a href="{{$job_similar->post_id}}">{{$job_similar->company_name}}</a></h4>
									<span>{{$job_similar->job_title}}</span>
									<span class="cl-success"><?php
										
										echo $data = str_replace("_"," ",$job_similar->req_industry);

										?>
									</span>
								</div>
							</div>
							
						@endforeach

						<?php } ?>

						
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



							
						</div>
					</div>
					<!-- End Sidebar -->
				</div>
			</section>
			<!-- Job full detail End -->
			 <script type="text/javascript">
           	//$("#done").hide();
           	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
           	function apply_now(c_id){
            var pageURL = window.location.href;
			var p_id = pageURL.substr(pageURL.lastIndexOf('/') + 1);

			$.post("{{url('apply-now')}}",{_token:CSRF_TOKEN,c_id:c_id,p_id:p_id},function(data){
            // alert(data);
            if(data == "yes"){
			    swal("Success", "Applied Successfully.", "success");
			    $("#go").hide();
			    $("#done").show();

            }else{
            	swal("Oops", "Something Wents Wrong Plz Try Again.", "error");
            }

			});
           	}
           </script>

 <!--            <script>
			var x,y;
			function initMap() {
			var pageURL = window.location.href;
			var id = pageURL.substr(pageURL.lastIndexOf('/') + 1);
				
				
				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
				 $.post("{{url('fetch-city-single')}}",{_token:CSRF_TOKEN,id:id},function(data){
 
				//alert(data);
				var strn = data.split(" ");
				 x=strn[0];
				 y=strn[1];
				 var n=strn[2].split("_");
				 var res=n.join(" ");
				 var win="<div style='height:100px;width:50px;background-color:red;'>RED</div>";
				 
				

				 //var res = str.replace("_"," ",strn[2]);
				 // alert(data);
     
			   var Pak = {lat: parseFloat(x), lng: parseFloat(y)};
			  // var Pak = {lat: 30.3753, lng: 69.3451};
			    var map = new google.maps.Map(document.getElementById('map'), {
			      center: Pak,
			      zoom: 16
			    });
			    var contentString = '<div id="content">'+
				      '<div id="siteNotice">'+
				      '</div>'+
				      '<h5 id="firstHeading" class="firstHeading">'+res+'</h5>'+
				      '<div id="bodyContent">'+
				      '</div>'+
				      '</div>';

				  var infowindow = new google.maps.InfoWindow({
				    content: contentString
				  });
				                
			    var marker = new google.maps.Marker({
			          position: Pak,
			          map: map,
			          //title: "Click on marker to see full address",
			          
			        });
			  // draggable: true
			  marker.addListener('mouseover', function() {
			    infowindow.open(map, marker);
			  });
			   marker.addListener('mouseout', function() {
			    infowindow.close(map, marker);
			  });
			   
			    google.maps.event.addListener(marker, 'dragend', function(marker) {
			        var latLng = marker.latLng;
			        // document.getElementById('lat-span').innerHTML = latLng.lat();
			        // document.getElementById('lon-span').innerHTML = latLng.lng();
			     });


			     });

			}
  
           </script> -->
          

			

			@endsection