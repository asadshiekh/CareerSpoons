@extends('client_views.master')
@section('content')
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url(public/client_assets/img/banner-10.jpg);" >
				<div class="container">
					<h1>Applicants</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			


 <section class="full-detail-description full-detail gray-bg">
            <div class="container">
                <div class="col-md-12 col-sm-12">
                    <div class="full-card">
                      <div class="deatil-tab-employ tool-tab">

					<ul class="nav nav-tabs" id="simple-design-tab">
						<li class="active">
							<a  data-toggle="tab" href="#all">
							<?php if($users === 0){?>
                              All Applicants (0)
							 <?php }else{ ?>
						      All Applicants ({{$users->count()}})
						      <?php } ?>
					       </a>
					    </li>
						<li><a data-toggle="tab" href="#viewed">
							<?php if($viewed_users === 0){?>
                                Viewed Applicants (0) 
							 <?php }else{ ?>
							    Viewed Applicants ({{$viewed_users->count()}})
							<?php } ?>
							 </a>
						</li>
						<li><a data-toggle="tab" href="#short">
                             <?php if($short_users === 0){?>
                            Shortlisted (0)
							 <?php }else{ ?>
							Shortlisted ({{$short_users->count()}})
							<?php } ?>
					    </a></li>
						<li><a data-toggle="tab" href="#inter">For Interview</a></li>
						<li><a data-toggle="tab" href="#rejected">Rejected</a></li>
						
					</ul>
							
							<!-- Start Bio Sec -->
							<div class="tab-content">

								<div id="all" class="tab-pane fade in active" style="min-height: 500px;">
									<h3>All Applicants</h3>
									<!-- start row -->
									 <div class="row">
									<?php if($users === 0){?>
                                            <h4 style="color: red;text-align: center;">No Users</h4>
									 	<?php }else{ ?>
									  <div class="col-md-9 col-sm-9">
								          @foreach($users as $us)
								          <div class="col-md-12 col-sm-12">
									          <div class="manage-resume-box">
											        <div class="col-md-3 col-sm-3">
												        <div class="manage-resume-picbox" style="height: 100px;width: 105px;border:solid 5px #e1e1e1;">
												        <img src="{{url('uploads/client_site/profile_pic')}}/{{$us->profile_image}}" class="img-responsive" alt="" />
												        </div>
											        </div>
										            <div class="col-md-4 col-sm-4">
											            <h5 style="margin-top: 25px;">{{$us->candidate_name}}</h5>
											            <span>{{$us->user_email}}</span>
										            </div>
										            <div class="col-md-3 col-sm-3">
											       <!-- <?php // if($us->shortlisted === "1"){?>
											            <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;background-color:white;color:green;margin-top: 25px;">Short Listed <i class="fa fa-check" disabled></i></button>
												        <?php//  }else{ ?>
												        <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;width:150px;margin-top: 25px;" onclick="change_status('{{$p_id}}','{{$c_id}}','{{$us->id}}');">Short List</button>
												        <?php //   } ?> -->
										            </div>
										            <div class="col-md-2 col-sm-2">
												        <?php if($us->view_status === "1"){?>
												        <a href="{{url('show-temp-preview')}}/{{$us->id}}" data-toggle="tooltip" title="View" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;" onclick="go('{{$p_id}}','{{$c_id}}','{{$us->id}}');">Viewed</a>
												        <?php }else{ ?>
												        <a href="{{url('show-temp-preview')}}/{{$us->id}}" data-toggle="tooltip" title="View" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;" onclick="go('{{$p_id}}','{{$c_id}}','{{$us->id}}');">View</a>
												        <?php } ?>
										            </div>
									          </div>
								          </div>
								          @endforeach
							          </div>
							          <div class="col-md-3 col-sm-3">
							          	<div style="border:solid 1px #e1e1e1;padding:5%;font-size: 12px;min-height: 450px;box-shadow: 0px 3px 15px -4px;">
							          	<h5 style="text-align: center;margin-bottom: 15%;"><u>Filter User CVs</u></h5>
							          	<form>
							          		<label>Select Gender</label>
							          		<select class="form-control">
							          			<option>Select Gender</option>
							          		</select>

							          		<label>Select Gender</label>
							          		<select class="form-control">
							          			<option>Select Gender</option>
							          		</select>
							          		<button type="button" class="btn btn-success" style="height:30px;padding-top:2px;width:150px;margin-top: 25px;margin-left: 18%;">Filter</button>
							          	</form>
							          	</div>
							          </div>
							       <?php } ?>
							          </div>
                                     <!-- end row -->

								</div>

								<!-- Viewed Applicants -->

								<div id="viewed" class="tab-pane fade" style="min-height: 500px;">
									<h3>Viewed Applicants</h3>
									<!-- start row -->
									 <div class="row">
									 <?php if($viewed_users === 0){?>
                                            <h4 style="color: red;text-align: center;">No Viewed User</h4>
									 	<?php }else{ ?>
							          @foreach($viewed_users as $us)
							          <div class="col-md-12 col-sm-12">
							          <div class="manage-resume-box">
							          <div class="col-md-3 col-sm-3">
							          <div class="manage-resume-picbox" style="height: 100px;width: 105px;border:solid 5px #e1e1e1;">
							          <img src="{{url('uploads/client_site/profile_pic')}}/{{$us->profile_image}}" class="img-responsive" alt="" />
							          </div>
							          </div>
							          <div class="col-md-4 col-sm-4">
							          <h5 style="margin-top: 25px;">{{$us->candidate_name}}</h5>
							          <span>{{$us->user_email}}</span>
							          </div>
							          <div class="col-md-3 col-sm-3">
							         <?php  if($us->shortlisted === "1"){?>
							            <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;background-color:white;color:green;margin-top: 25px;">Short Listed <i class="fa fa-check" disabled></i></button>
							         <?php  }else{ ?>
							          <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;width:150px;margin-top: 25px;" onclick="change_status('{{$p_id}}','{{$c_id}}','{{$us->id}}');">Short List</button>
							          <?php    } ?>
							          </div>
							          <div class="col-md-2 col-sm-2">
							          <?php  if($us->shortlisted === "1"){?>
							          	 <a href="{{url('show-temp-preview')}}/{{$us->id}}" data-toggle="tooltip" title="View" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;" onclick="go('{{$p_id}}','{{$c_id}}','{{$us->id}}');">Viewed</a>
							          <?php }else{ ?>
							          <a href="{{url('show-temp-preview')}}/{{$us->id}}" data-toggle="tooltip" title="View" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;" onclick="go('{{$p_id}}','{{$c_id}}','{{$us->id}}');">View</a>
							       <?php }?>
							          </div>
							          </div>
							          </div>
							           @endforeach
							       <?php } ?>
							          </div>
                                     <!-- end row -->
								</div>

								<!-- Shortlisted Applicants -->

								<div id="short" class="tab-pane fade" style="min-height: 500px;">
									<h3>Short listed Applicants</h3>
									<!-- start row -->
									 <div class="row">
									 	<?php if($short_users === 0){?>
                                            <h4 style="color: red;text-align: center;">No Shortlisted User</h4>
									 	<?php }else{ ?>
							          @foreach($short_users as $us)
							          <div class="col-md-12 col-sm-12" id="user-short-{{$us->id}}">
							          <div class="manage-resume-box">
							          <div class="col-md-3 col-sm-3">
							          <div class="manage-resume-picbox" style="height: 100px;width: 105px;border:solid 5px #e1e1e1;">
							          <img src="{{url('uploads/client_site/profile_pic')}}/{{$us->profile_image}}" class="img-responsive" alt="" />
							          </div>
							          </div>
							          <div class="col-md-4 col-sm-4">
							          <h5 style="margin-top: 25px;">{{$us->candidate_name}}</h5>
							          <span>{{$us->user_email}}</span>
							          </div>
							          <div class="col-md-3 col-sm-3">
							         
							          <!-- <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;background-color:white;color:green;margin-top: 25px;">Short Listed <i class="fa fa-check" disabled></i></button> -->
							          <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;background-color:white;color:green;margin-top: 25px;" onclick="">Call For Interview <i class="fa fa-phone"></i></button>
							       
							          </div>
							          <div class="col-md-2 col-sm-2">
							          
							          <button data-toggle="tooltip" title="Remove from Shortlist" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;" onclick="change_short_status('{{$p_id}}','{{$c_id}}','{{$us->id}}');">Remove</button>
							          </div>
							          </div>
							          </div>
							           @endforeach
							       <?php } ?>
							          </div>
                                     <!-- end row -->
								</div>

								<!-- Interviewed Applicants -->

								<div id="inter" class="tab-pane fade" style="min-height: 500px;">
									<h3>Applicants for Interview</h3>
									<p></p>
								</div>

								<!-- rejected Applicants -->

								<div id="rejected" class="tab-pane fade" style="min-height: 500px;">
									<h3>Rejected Applicants</h3>
									<p></p>
								</div>


							</div>

						</div>
					</div>
				</div>
			</div>
</section>


<script type="text/javascript">
	function change_short_status(p,c,u) {
		//alert(p);alert(c);alert(u);
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.post("{{url('revert-short-status')}}",{_token:CSRF_TOKEN,p:p,c:c,u:u},function(data){
        //alert("yes");
        $("#user-short-"+u).hide(100);
        swal("Success", "Candidate is Removed From short listed.", "success");
		});
	}
</script>















			<!-- ========== Begin: Brows job Category ===============  -->
			<!-- <section class="brows-job-category">
				<div class="container">
					<!-- Company Searrch Filter End 
					<div class="row extra-mrg">
						<div class="wrap-search-filter">
							<form>
								<div class="col-md-3 col-sm-6">
                                   <input type="text" class="form-control" placeholder="Location: City, State, Zip">
								</div>
								
								<div class="col-md-3 col-sm-6">
									<select class="selectpicker form-control" multiple title="All Categories">
									  <option>Information Technology</option>
									  <option>Mechanical</option>
									  <option>Hardware</option>
									</select>

								</div>
								
								<div class="col-md-6 col-sm-12">
									<div class="job-types">
										<label>
											<input type="checkbox" class="full-time check-option checkbox" CHECKED />
											Full Time
										</label>
										
										<label>
											<input type="checkbox" class="part-time check-option checkbox" />
											Part Time
										</label>
										
										<label>
											<input type="checkbox" class="freelancer check-option checkbox" />
											Freelancer
										</label>
										
										<label>
											<input type="checkbox" class="internship check-option checkbox" />
											Internship
										</label>
										
									</div>
								</div>
								
							</form>
						</div>
					</div>
					<!-- Company Searrch Filter End 
					
					<div class="item-click">
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
										<a href="job-detail.html" class="btn btn-default">Apply Now</a>
									</div>
								</div>
							</div>
							<span class="tg-themetag tg-featuretag">Premium</span>
						</article>
					</div>

					<!--row
					<div class="row">
						<ul class="pagination">
							<li><a href="#">&laquo;</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li> 
							<li><a href="#">4</a></li> 
							<li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li> 
							<li><a href="#">&raquo;</a></li> 
						</ul>
					</div>
					<!-- /.row
				</div>
			</section> -->
			<!-- ========== Begin: Brows job Category End ===============  -->
		
		@endsection