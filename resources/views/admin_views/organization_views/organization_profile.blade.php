@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>{{$org_page->company_name}}</i></h3>
      </div>
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2 style="font-family:'italic',bold">Profile View<small style="font-family:'italic',bold"> </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a href="{{url('admin-dashboard')}}"><i class="fa fa-dashboard"></i></a>
              </li>
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Start Content-->

            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <!-- <i class="fa fa-pencil edit-pic"></i> -->
                  <span class="img-view">
                  <img class="img-responsive avatar-view" src="{{url('public/admin_assets/production/images/user.png')}}" alt="Avatar" title="Change the avatar"/>
                </span>
                  
                </div>
              </div>
              <h3>{{$org_page->company_name}}</h3>

              <ul class="list-unstyled user_data">
                <li><i class="fa fa-map-marker user-profile-icon"></i> {{$org_page->company_location}}
                </li>
                <li class="m-top-xs">
                  <i class="fa fa-flag-o"></i>
                  <a href="http://www.kimlabs.com/profile/" target="_blank">{{$org_page->company_city}}</a>
                </li>

                <li>
                  <i class="fa fa-briefcase user-profile-icon"></i> 
                  {{$org_page->company_industry}}
                </li>

                <li class="m-top-xs">
                  <i class="fa fa-external-link user-profile-icon"></i>
                  <a href="http://www.kimlabs.com/profile/" target="_blank">{{$org_page->company_website}}</a>
                </li>
              </ul>

              <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
              <br/>

              <!--  start skills -->
                     <!--  <h4>Skills</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Web Applications</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                        <li>
                          <p>Website Design</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                          </div>
                        </li>
                        <li>
                          <p>Automation & Testing</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                          </div>
                        </li>
                        <li>
                          <p>UI / UX</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                      </ul> -->
                      <!-- end of skills --> 

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          
                         <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Total Posts</a>
                         </li>
                         <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Post Job</a>
                         </li>
                       </ul>
                       <div id="myTabContent" class="tab-content">

                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                          <!-- start user projects -->
                          <table class="data table table-striped no-margin">
                            <thead>
                              <th>Post Name</th>
                              <th>Posted Date</th>
                              <th>Action</th>
                            </thead>
                            <tbody>

                              @foreach($org_post as $org_post)
                              <tr id="post-tr{{$org_post->post_id}}">
                                <td>{{$org_post->posted_job_title}}</td>
                                <td>{{$org_post->created_at}}</td>
                                <td class="vertical-align-mid">
                                  <a onclick="del_post('{{$org_post->post_id}}');"><i class="fa fa-trash"></i></a> | <a href=""><i class="fa fa-eye"></i></a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <!-- end user projects -->

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">



                          <!-- start add post -->




                          <form id="data_org">
                             <!-- Contact Details-->
                            <div class="form-group col-sm-12">

                              <div class="input-group" style="margin-bottom: 0px">

                                <label><b style="font-size: 16px;">Contact Info</b> <i class="glyphicon glyphicon-info-sign"></i> :</label>
                                
                                
                              </div>

                            </div>

                            <div class="form-group col-sm-6">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-phone"></i>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter Phone" name="org_contact_phone" id="org_contact_phone"> 
                              </div>

                            </div>
                            <div class="form-group col-sm-6">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="glyphicon glyphicon-envelope"></i>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter Email" name="org_contact_email" id="org_contact_email"> 
                              </div>       
                            </div>

                            <div class="form-group col-sm-12">
                              <div class="input-group" style="margin-bottom: 0px">
                                <label><b style="font-size: 16px;">Job Requirements</b> <i class="glyphicon glyphicon-info-sign"></i> :</label> 
                              </div>

                            </div>
                            
                            <!-- Job Title -->
                            <div class="form-group col-sm-6">
                              <label>Job Title:</label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="glyphicon glyphicon-tree-conifer"></i>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter Job Title" name="posted_job_title" id="posted_job_title">
                              </div>     
                            </div>
                           
                            <!-- Career Level-->
                            <div class="form-group col-sm-6">
                              <label>Required Career Level for This Job:</label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-barcode"></i>
                                </div>
                                <select name="selected_career" class="form-control" placeholder="select Career" id="selected_career">
                                  <option value="" disabled="disabled" selected="selected">Select Your Career level</option>
                                  <option value="Matriculation">Matriculation</option>
                                  <option value="Intermediate">Intermediate</option>
                                  <option value="Bechulars">Bechulars</option>
                                  <option value="Masters">Masters</option>
                                  <option value="PHD">PHD</option>
                                </select>
                              </div>
                            </div>




                            <!-- Experience for job -->
                            <div class="form-group col-sm-6">
                              <label>Year of Experience Required:</label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-external-link"></i>
                                </div>
                                <input type="text" placeholder="Enter Experience demands" class="form-control" name="job_exp_req" id="job_exp_req">
                              </div>
                            </div>
                            <!-- Salary for job-->
                            <div class="form-group col-sm-6">
                              <label>Salary Range:</label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-users"></i>
                                </div>
                                <input type="text" placeholder="Enter Salary" class="form-control" name="job_salary_range" id="job_salary_range">
                              </div>
                            </div>
                           
                            

                             <!-- Skills -->
                            <div class="form-group col-sm-6">
                              <label>What Skills are Required for Job?:</label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-barcode"></i>
                                </div>
                                <textarea name="job_skills" id="job_skills" rows="4" class="tags form-control"></textarea>
                                <div id="suggestions-container" ></div> 
                              </div>     
                            </div>
                             <!-- Search Result Title-->
                            <div class="form-group col-sm-6">
                              <label>Search Result Title:</label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="glyphicon glyphicon-subscript"></i>
                                </div>
                               
                                <input id="tags_1" type="text" class="tags form-control"/>
                                <!-- <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div> -->
                              </div>
                              
                            </div>
                            <!-- Job Preferences -->
                            <div class="form-group col-sm-10 col-md-offset-1">
                              <label>Gender Prefrences:</label>
                              <p style="font-style: bold; font-size: 12px;">
                                Male:
                                <input type="radio" class="flat" name="gender" id="gender" value="Male" checked="" required /> Female:
                                <input type="radio" class="flat" name="gender" id="gender" value="Female" />
                                None:
                                <input type="radio" class="flat" name="gender" id="gender" value="None" />
                              </p>

                            </div>



                            <!-- About Job -->
                            <div class="form-group col-sm-10 col-md-offset-1">
                              <label>Job Details:</label>
                              <div class="input-group">

                                <textarea name="company_info" id="info"></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-1">
                                <button type="button" class="btn btn-primary">Cancel</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="button" class="btn btn-success" onclick="org_post('{{$org_page->company_id}}');">POST</button> 
                              </div>
                            </div>

                          </form>


                          <!-- end add post -->





                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- End Content-->


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--model-->
      <div  id="exampleModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div id="edit_text">
            </div>

          </div>
        </div>
      </div>
      <!--/model-->
<script type="text/javascript">

function org_post(x){
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var a=$("#org_contact_phone").val();
var b=$("#org_contact_email").val();
var c=$("#posted_job_title").val();
var d=$("#selected_career").val();
var e=$("#job_exp_req").val();
var f=$("#job_salary_range").val();
var g=$("#job_skills").val();
var h=$("#tags_1").val();
var i=$("#gender").val();
var j=CKEDITOR.instances['info'].getData();
 $.post('do-company-post',{_token:CSRF_TOKEN,a:a,b:b,c:c,d:d,e:e,f:f,g:g,h:h,i:i,j:j,x:x},function(data){
        swal("Successfully!", "Your Job is Successfully Posted!", "success");   
 }); 
alert(x);

}

function del_post(id){
   var result = confirm("Really want to delete this?");
if(result){
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$.post("delete-post",{_token:CSRF_TOKEN,id:id},function(data){
 if(data){
      $("#post-tr"+id).css('background-color','red');
      $("#post-tr"+id).hide(3000);
    }
});
}
}
</script>


@endsection

