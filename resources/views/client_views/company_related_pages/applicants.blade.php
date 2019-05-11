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
			


 <section class="full-detail-description full-detail gray-bg" style="margin-top: 5%;" id="uls">
            <div class="container">
                <div class="col-md-12 col-sm-12">
                    <div class="full-card">
                      <div class="deatil-tab-employ tool-tab">

					<ul class="nav nav-tabs" id="simple-design-tab">
						<li class="active">
							<a data-toggle="tab" href="#all" onclick="ref_all();">
							All Applicants	
							
					       </a>
					    </li>
						<li><a data-toggle="tab" href="#viewed" onclick="ref_viewed();">
							Viewed Applicants
							 </a>
						</li>
						<li><a data-toggle="tab" href="#short" onclick="ref_short();">
							Shortlisted
                              </a></li>
					    <li><a data-toggle="tab" href="#sele_for_inter" onclick="ref_sele();">
					        Applicants for Interview
					   
					    </a></li>
						<li><a data-toggle="tab" href="#inter" onclick="ref_inter();">
						     Candidate Results

					    </a></li>
					    <li><a data-toggle="tab" href="#matched">
					    	Matched Candidate
					    	
					    </a></li>
						
					</ul>
							
							<!-- Start Bio Sec -->
							<div class="tab-content">

								<div id="all" class="tab-pane fade in active" style="min-height: 500px;">
									<h3>All Applicants 
										<?php if($users === 0){?>
			                             (0)
										 <?php }else{ ?>
									      ({{$users->count()}})
									      <?php } ?>
									  </h3>
									<!-- start row -->
									 <div class="row">
									
									  <div class="col-md-9 col-sm-9">
									  	<?php if($users === 0){?>
                                            <h4 style="color: red;text-align: center;">No Users</h4>
									 	<?php }else{ ?>
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
										            <div class="col-md-2 col-sm-2">
											       <!-- <?php // if($us->shortlisted === "1"){?>
											            <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;background-color:white;color:green;margin-top: 25px;">Short Listed <i class="fa fa-check" disabled></i></button>
												        <?php//  }else{ ?>
												        <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;width:150px;margin-top: 25px;" onclick="change_status('{{$p_id}}','{{$c_id}}','{{$us->id}}');">Short List</button>
												        <?php //   } ?> -->
										            </div>
										            <div class="col-md-3 col-sm-3">
												        <?php if($us->view_status === "1"){?>
												        <a href="{{url('show-candidate-resume')}}/{{$us->id}}" data-toggle="tooltip" title="View" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;background-color:white;color:green;width: 100%;" onclick="go('{{$p_id}}','{{$c_id}}','{{$us->id}}');">Viewed</a>
												        <?php }else{ ?>
												        <a href="{{url('show-candidate-resume')}}/{{$us->id}}" data-toggle="tooltip" title="View" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;width: 100%;" onclick="go('{{$p_id}}','{{$c_id}}','{{$us->id}}');">View Resume</a>
												        <?php } ?>
												        <a href="{{url('candidate-profile')}}/{{$us->id}}" data-toggle="tooltip" title="View" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;width: 100%;">View Profile</a>
										            </div>
									          </div>
								          </div>
								          @endforeach
								           <?php } ?>
							          </div>


							          <?php
							          if(Session::get('company_package_status')=='1'){
										?>
							          <div class="col-md-3 col-sm-3">
							          	<div style="border:solid 1px #e1e1e1;padding:5%;font-size: 12px;min-height: 450px;box-shadow: 0px 3px 15px -4px;">
							          	<h5 style="text-align: center;margin-bottom: 15%;"><u>Filter User CVs</u></h5>
							          	<form action="{{url('filter-applicants')}}/{{$p_id}}" method="post">
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
							          		<button type="submit" class="btn btn-success" style="height:30px;padding-top:2px;width:150px;margin-top: 25px;margin-left: 18%;">Filter</button>
							          	</form>
							          	</div>
							          </div>

							      <?php }else{ ?>
							      	 <div class="col-md-3 col-sm-3">
							      	<div class="alert alert-info">
							      		<strong>Note *</strong> Purchase Package to Avail Resume Sorting System.
							      	</div>
							      </div>

							      <?php }?>

							      
							          </div>
                                     <!-- end row -->

								</div>

								<!-- Viewed Applicants -->

								<div id="viewed" class="tab-pane fade" style="min-height: 500px;">
									<h3>Viewed Applicants
									 <?php if($viewed_users === 0){?>
		                               (0) 
									 <?php  }else{ ?>
									    ({{$viewed_users->count()}})
									 <?php } ?></h3>
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
							          <div class="col-md-5 col-sm-5">
							          <h5 style="margin-top: 25px;">{{$us->candidate_name}}</h5>
							          <span>{{$us->user_email}}</span>
							          </div>
							          <div class="col-md-2 col-sm-2">
							         <?php  if($us->shortlisted === "1"){?>
							            <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;background-color:white;color:green;margin-top: 25px;">Short Listed <i class="fa fa-check" disabled></i></button>
							         <?php  }else{ ?>
							          <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;width:100%;margin-top: 25px;" onclick="change_status('{{$p_id}}','{{$c_id}}','{{$us->id}}');">Short List</button>
							          <?php    } ?>
							          </div>
							          <div class="col-md-2 col-sm-2">
							          <?php  if($us->shortlisted === "1"){?>
							          	 <a href="{{url('show-temp-preview')}}/{{$us->id}}" data-toggle="tooltip" title="View" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;width:100%" onclick="go('{{$p_id}}','{{$c_id}}','{{$us->id}}');">Viewed</a>
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
									<h3>Short listed Applicants
									<?php if($short_users === 0){?>
		                               (0) 
									 <?php  }else{ ?>
									    ({{$short_users->count()}})
									 <?php } ?>
									 	
									 </h3>
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
							          <div class="col-md-5 col-sm-5">
							          <h5 style="margin-top: 25px;">{{$us->candidate_name}}</h5>
							          <span>{{$us->user_email}}</span>
							          </div>
							          <div class="col-md-2 col-sm-2">
							         
							          <!-- <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;background-color:white;color:green;margin-top: 25px;">Short Listed <i class="fa fa-check" disabled></i></button> -->
							          <?php  if($us->message === "0"){?>
							          <button title="Msg to inform his/her for interview" type="button" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;width:100%" onclick="send_message('{{$p_id}}','{{$c_id}}','{{$us->id}}');">Inform</button>
							          <?php }else{?>
							           <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;background-color:white;color:green;margin-top: 25px;" disabled>Message Send <i class="fa fa-check"></i></button>
							           <?php }?>
							          <!-- data-toggle="modal" data-target="#interview" -->
							       
							          </div>
							          <div class="col-md-2 col-sm-2">
							          <?php  if($us->message === "0"){
							          ?>
							          <button data-toggle="tooltip" title="Remove from Shortlist" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;width:100%" onclick="change_short_status('{{$p_id}}','{{$c_id}}','{{$us->id}}');">Remove</button>
							      <?php } ?>
							          </div>
							          </div>
							          </div>
							           @endforeach
							       <?php } ?>
							          </div>
                                     <!-- end row -->
								</div>
								<!--  Applicants selected for interview -->

								<div id="sele_for_inter" class="tab-pane fade" style="min-height: 500px;">
									<h3>Applicants Selected for Interview
                                    <?php if($app_users === 0){?>
		                               (0) 
									 <?php  }else{ ?>
									    ({{$app_users->count()}})
									 <?php } ?>
									</h3>
									
									<!-- start row -->
									 <div class="row">
									 	<?php if($app_users === 0){?>
                                            <h4 style="color: red;text-align: center;">No USers selected for interview</h4>
									 	<?php }else{ ?>
							          @foreach($app_users as $us)
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
							          <div class="col-md-3 col-sm-3" id="btn-inter">
							         
							          <!-- <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;background-color:white;color:green;margin-top: 25px;">Short Listed <i class="fa fa-check" disabled></i></button> -->
							           <?php  if($us->interview_status === "1"){?>
							          <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;background-color:white;color:green;" disabled>Interview Conducted<i class="fa fa-check"></i></button>
							          <?php }if($us->interview_status === "0"){?>
							          	 <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;background-color:white;color:green;"  disabled>Interview Pending <i class="far fa-frown-open"></i></button>
							           <?php }?>
							          
							          </div>
							          <div class="col-sm-2 col-md-2">
							          <select class="form-control" onchange="change_inter_status(this.value,'{{$p_id}}','{{$c_id}}','{{$us->id}}');" style="margin-top: 20px;">
							          		<option selected>Select Status</option>
							          		<option value="conducted">Conducted</option>
							          		<option value="pending">pending</option>
							          	</select>
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
									<h3>Applicants Result
									<?php if($call_users === 0){?>
		                               (0) 
									 <?php  }else{ ?>
									    ({{$call_users->count()}})
									 <?php } ?>
									 	
									 </h3>
									
									<!-- start row -->
									 <div class="row">
									 	<?php if($call_users === 0){?>
                                            <h4 style="color: red;text-align: center;">No USers selected for interview</h4>
									 	<?php }else{ ?>
							          @foreach($call_users as $us)
							          <div class="col-md-12 col-sm-12" id="user-short-{{$us->id}}">
							          <div class="manage-resume-box">
							          <div class="col-md-3 col-sm-3">
							          <div class="manage-resume-picbox" style="height: 100px;width: 105px;border:solid 5px #e1e1e1;">
							          <img src="{{url('uploads/client_site/profile_pic')}}/{{$us->profile_image}}" class="img-responsive" alt="" />
							          </div>
							          </div>
							          <div class="col-md-5 col-sm-5">
							          <h5 style="margin-top: 25px;">{{$us->candidate_name}}</h5>
							          <span>{{$us->user_email}}</span>
							          </div>
							          <div class="col-md-2 col-sm-2" id="btn-data">
							         
							          <!-- <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;background-color:white;color:green;margin-top: 25px;">Short Listed <i class="fa fa-check" disabled></i></button> -->
							           <?php  if($us->selected === "1"){?>
							          <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;background-color:white;color:green;" disabled>Selected<i class="fa fa-check"></i></button>
							          <?php }if($us->rejected === "1"){?>
							          	 <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;background-color:white;color:green;"  disabled>Rejected <i class="far fa-frown-open"></i></button>
							           <?php }?>
							          
							          </div>
							          <div class="col-sm-2 col-md-2">
							          <select class="form-control" onchange="change_sr(this.value,'{{$p_id}}','{{$c_id}}','{{$us->id}}');" style="margin-top: 20px;">
							          		<option selected hidden disabled>Select Status</option>
							          		<option value="selected">Selected</option>
							          		<option value="rejected">Rejected</option>
							          	</select>
							          </div>
							         
							          </div>
							          </div>
							           @endforeach
							       <?php } ?>
							          </div>
                                     <!-- end row -->
								</div>

								<!-- Interviewed Applicants -->

								<div id="matched" class="tab-pane fade" style="min-height: 500px;">
									<h3>Matched Candidates
										<?php if($match_users === 0){?>
		                               (0) 
									 <?php  }else{ ?>
									    ({{$match_users->count()}})
									 <?php } ?>
									 	
									 </h3>
									
									<!-- start row -->
									 <div class="row">
									 	<?php if($match_users === 0){?>
                                            <h4 style="color: red;text-align: center;">No USers selected for interview</h4>
									 	<?php }else{ ?>
							          @foreach($match_users as $us)
							          <div class="col-md-12 col-sm-12" id="user-short-{{$us->id}}">
							          <div class="manage-resume-box">
							          <div class="col-md-3 col-sm-3">
							          <div class="manage-resume-picbox" style="height: 100px;width: 105px;border:solid 5px #e1e1e1;">
							          <img src="{{url('uploads/client_site/profile_pic')}}/{{$us->profile_image}}" class="img-responsive" alt="" />
							          </div>
							          </div>
							          <div class="col-md-5 col-sm-5">
							          <h5 style="margin-top: 25px;">{{$us->candidate_name}}</h5>
							          <span>{{$us->user_email}}</span>
							          </div>
							          <div class="col-md-2 col-sm-2" id="btn-data">
							         
							          <!-- <button type="button" class="btn btn-success" style="height:30px;padding-top:2px;background-color:white;color:green;margin-top: 25px;">Short Listed <i class="fa fa-check" disabled></i></button> -->
							         
							          
							          </div>
							          <div class="col-sm-2 col-md-2">
							          <a href="{{url('show-temp-preview')}}/{{$us->id}}" data-toggle="tooltip" title="View" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;width: 100%;">View</a>
							          </div>
							         
							          </div>
							          </div>
							           @endforeach
							       <?php } ?>
							          </div>
                                     <!-- end row -->
								</div>

								


							</div>

						</div>
					</div>
				</div>
			</div>
</section>

<!-- model window for map -->

<!-- Modal Contents -->
    <div id="interview" class="modal fade "> <!-- class modal and fade -->
      
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
           <div class="modal-header"> <!-- modal header -->
            <button type="button" class="close" 
             data-dismiss="modal" aria-hidden="true">×</button>
			 
                    <h4 class="modal-title">Message to call Him/Her for Interview</h4>
           </div>
		 <form>
		     		
		     <div class="modal-body" style="padding: 3%;"> <!-- modal body -->
		     	
		     		<div class="row">
		     			<div class="col-sm-12">
		     			<label>Enter Message</label>
		     			<textarea type="text" name="message" id="message" class="form-control" rows="3"></textarea>
		     			</div>
		     		</div>
		     	
		            
		     </div>
	 
     <div class="modal-footer"> <!-- modal footer -->
       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel!</button>
       <button type="button" class="btn btn-success" id="send-btn">send!</button>
      </div>
      </form>
				
      </div> <!-- / .modal-content -->
      
    </div> <!-- / .modal-dialog -->
      
 </div><!-- / .modal -->

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
	function change_status(p,c,u){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.post("{{url('change-short-status')}}",{_token:CSRF_TOKEN,p:p,c:c,u:u},function(data){
        //alert("yes");
        swal("Success", "Candidate is short listed.", "success");
		});
	}
	function go(p,c,u){
		//alert("p= "+p+"c= "+c+"u= "+u);
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.post("{{url('change-view-status')}}",{_token:CSRF_TOKEN,p:p,c:c,u:u},function(data){
        //alert("yes");
		});

	}
	function send_message(p,c,u){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$("#interview").modal("show");
       
           
		    document.getElementById("send-btn").onclick = function fun() {
			        //alert("hello");
			        var msg= $("#message").val();
			       $.post("{{url('send-messg-interview')}}",{_token:CSRF_TOKEN,p:p,c:c,u:u,msg:msg},function(data){
			        //alert(data);
			        swal("Success", "Msg Send Successfully.", "success");
			        $("#interview").modal("close");
					});
			    }

			
	}
	function change_sr(v,p,c,u){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		// alert(v);
			  	$.post("{{url('change-SR-status')}}",{_token:CSRF_TOKEN,p:p,c:c,u:u,v:v},function(data){
			  		if(data == "yes"){
			  		$("#btn-data").html('<button type="button" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;background-color:white;color:green;"  disabled>Selected <i class="fa fa-check"></i></button>');

			  		}else{
                     $("#btn-data").html('<button type="button" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;background-color:white;color:green;"  disabled>Rejected <i class="far fa-frown-open"></i></button>');
			  		}
                    swal("Success", "Status Change Successfully.", "success");
                 
		        });
			   
			 
		
	}
	function change_inter_status(v,p,c,u){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		// alert(v);
			  	$.post("{{url('change-interstatus')}}",{_token:CSRF_TOKEN,p:p,c:c,u:u,v:v},function(data){
			  		if(data == "yes"){
			  		$("#btn-inter").html('<button type="button" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;background-color:white;color:green;"  disabled>Interview Conducted <i class="fa fa-check"></i></button>');

			  		}else{
                     $("#btn-inter").html('<button type="button" class="btn btn-success" style="height:30px;padding-top:2px;margin-top: 25px;background-color:white;color:green;"  disabled>Interview Pending <i class="far fa-frown-open"></i></button>');
			  		}
                    swal("Success", "Status Change Successfully.", "success");
                 
		        });
			   
	}
    function ref_all(){
    	$("#all").load(location.href+" #all>*","");
    }
	function ref_viewed(){
		//$("#viewed").load();
		$("#viewed").load(location.href+" #viewed>*","");
		}
    function ref_sele(){
        $("#sele_for_inter").load(location.href+" #sele_for_inter>*","");
    }
    function ref_short(){
        $("#short").load(location.href+" #short>*","");
    }
    function ref_inter(){
    	$("#inter").load(location.href+" #inter>*","");
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