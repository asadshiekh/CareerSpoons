@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3 id="c_name">{{$org_page->company_name}}</i></h3>
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
                  
                 <!--  <span class="img-view">
                  
                  <img class="img-responsive avatar-view" src="{{url('public/admin_assets/production/images/user.png')}}" alt="Avatar" title="Change the avatar"/>

                  
                </span> -->
                <div class="contain">

                <span class="img-view">
                 <img class="img-responsive avatar-view image" src="{{url('uploads/organization_images')}}<?php echo '/'.$org_IMG->company_img; ?>" alt="Avatar" title="Change the avatar"> 
               </span>

               <div class="overlay">
                <a href="#" data-toggle="modal" data-target="#myModal1" class="icon" title="Edit Picture">
                  <i class="fa fa-pencil"></i>
                </a>
              </div>
    </div> 

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

        <!-- <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a> -->
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
                         <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Password Setting</a>
                         </li>
                         <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Company info</a>
                         </li>
                         <li role="presentation" class=""><a href="#tab_content6" role="tab" id="profile-tab5" data-toggle="tab" aria-expanded="false">Insights </a>
                         </li>
                       </ul>
                       <div id="myTabContent" class="tab-content">

                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <div id="first-part">
                          <div class="box-header">
            <h3 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace">All Posts</h3>
          </div>
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <th>Post Name</th>
                                <th>Posted Date</th>
                                <th>Updated Date</th>
                                <th>Action</th>
                              </thead>
                              <tbody>

                                <!-- @foreach($org_post as $org_post) -->
                                <tr id="post-tr{{$org_post->post_id}}">
                                  <td id="title-td{{$org_post->post_id}}">{{$org_post->job_title}}</td>
                                  <td>{{$org_post->created_at}}</td>
                                  <td id="up-date-td{{$org_post->post_id}}">{{$org_post->updated_at}}</td>
                                  <td class="vertical-align-mid">
                                    <a onclick="del_post('{{$org_post->post_id}}');"><i class="fa fa-trash"></i></a> | <a onclick="update_post('{{$org_post->post_id}}');"><i class="fa fa-pencil"></i></a> | <a onclick="view_post('{{$org_post->post_id}}');"><i class="fa fa-eye"></i></a>

                                  </td>
                                </tr>
                                <!-- @endforeach -->
                              </tbody>
                            </table>
                            <!-- end user projects -->
                          </div>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <div class="box-header">
            <h3 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace">New Post</h3>
          </div>
                         <!-- start add post -->
                         <form id="data_org" action="organization-post-data" method="post" enctype="Multipart/form-data">
                          @csrf
                          @if (session()->has('success'))
                           <script type="text/javascript">
                            swal("success!", "Your Post added", "success");
                          </script>
                          @endif

                           <input type="hidden" name="org_id" value="{{$org_page->company_id}}">

                           <!-- Job Title -->
                           <div class="form-group col-sm-12">
                            <label>Job Title:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="glyphicon glyphicon-tree-conifer"></i>
                              </div>
                              <input type="text" class="form-control" placeholder="Enter Job Title" name="posted_job_title" id="posted_job_title">
                            </div>     
                          </div>

                          <!-- Skills -->
                          <div class="form-group col-sm-12">
                            <label>What Skills are Required for Job?:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="glyphicon glyphicon-subscript"></i>
                              </div>
                              <textarea name="tags_1" id="tags_1" rows="5" class="tags form-control"></textarea>
                              <div id="suggestions-container" ></div> 
                            </div>     
                          </div>


                          <!-- Functional Area job-->
                          <div class="form-group col-sm-6">
                            <label>Functional Area:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-users"></i>
                              </div>
                              <select name="req_functional_area" class="form-control" placeholder="Select Functional Area" id="req_functional_area">
                                <option value="" disabled="disabled" selected="selected">Select Your Career level</option>
                                @foreach($area as $area)
                                <option value="{{$area->area_title}}">{{$area->area_title}}</option>
                                @endforeach
                                
                              </select>
                            </div>
                          </div>
                          <!-- Industry job-->
                          <div class="form-group col-sm-6">
                            <label>Industry:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-building"></i>
                              </div>
                              <select name="req_industry" class="form-control" placeholder="select Industry" id="req_industry">
                                <option value="" disabled="disabled" selected="selected">Select Your Industry</option>
                                @foreach($industry as $industry)
                                <option value="{{$industry->company_industry_name}}">{{$industry->company_industry_name}}</option>
                                @endforeach
                              </select>

                            </div>
                          </div>
                          <!-- Career Level-->
                          <div class="form-group col-sm-6">
                            <label>Required Career Level for This Job:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fas fa-level-up"></i>
                              </div>
                              <select name="req_career_level" class="form-control" placeholder="select Career" id="req_career_level">
                               <option value="" disabled="disabled" selected="selected" hidden="hidden">Select Career Level</option>
                               <option>Entry Level</option>
                               <option>Intermediate</option>
                               <option>Experienced Professional</option>
                               <option>Department Head</option>
                               <option>Gm / CEO / Country Head</option>
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
                            <input type="number" placeholder="Enter Required Experience" class="form-control" name="job_exp_req" id="job_exp_req">
                          </div>
                        </div>
                        <!-- Ciities criteria-->
                        <div class="bg">
                          <div class="form-group col-sm-3">
                            <label>City:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                              </div>
                              <select name="selected_city[]" class="form-control" placeholder="select Career" id="selected_city[]">
                                <option value="" disabled="disabled" selected="selected">Select City</option>
                                @foreach($city as $city)
                                <option id="city-option" value="{{$city->company_city_name}}">{{$city->company_city_name}}</option>
                                @endforeach

                              </select>
                            </div>
                          </div>
                          <!-- Job type -->
                          <div class="form-group col-sm-3">
                            <label>Job Type:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-barcode"></i>
                              </div>
                              <select name="selected_type[]" class="form-control" placeholder="select Job Type" id="selected_type[]">
                                <option value="" disabled="disabled" selected="selected">Select Type</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                              </select>
                            </div>
                          </div>
                          <!-- job shift-->
                          <div class="form-group col-sm-3">
                            <label>Job Shift:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-barcode"></i>
                              </div>
                              <select name="selected_shift[]" class="form-control" placeholder="select Shift" id="selected_shift[]">
                                <option value="" disabled="disabled" selected="selected">Select Shift</option>
                                <option value="Morning Shift">Morning Shift</option>
                                <option value="Night Shift">Night Shift</option>
                              </select>
                            </div>
                          </div>
                          <!------>
                          <div class="form-group col-sm-3">
                            <label>ADD</label>
                            <div class="input-group">

                             <button class="btn btn-primary" onclick="add_city_area();"><i class="fa fa-plus"></i></button>
                           </div>
                         </div>
                         <div class="clearfix"></div>
                         <div id="content">

                         </div>

                       </div>

                       <!------>

                       <!-- Search Result Title-->
                       <div class="form-group col-sm-6">
                        <label>Total Positions:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-sort-amount-asc"></i>
                          </div>

                          <input id="total_positions" name="total_positions" type="number" class="tags form-control" placeholder="Enter in Numbers" />
                        </div>
                      </div>
                      <!-- Search Result Title-->
                      <div class="form-group col-sm-6">
                        <label>Working Hours:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>

                          <input id="working_hour" name="working_hour" type="number" class="tags form-control" placeholder="Enter hours in Numbers" />
                        </div>
                      </div>
                      <!-- Search Result Title-->
                      <div class="form-group col-sm-6">
                        <label>Minimum Salary:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-dollar"></i>
                          </div>
                          <input id="min_salary" name="min_salary" type="number" class="tags form-control" placeholder="just Enter Amount"/>
                        </div>
                      </div>
                      <!-- Search Result Title-->
                      <div class="form-group col-sm-6">
                        <label>Maximum Salary:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-dollar"></i>
                          </div>

                          <input id="max_salary" name="max_salary" type="number" class="tags form-control" placeholder="just Enter Amount" />
                        </div>
                      </div>
                      <!-- Search Result Title-->
                      <div class="form-group col-sm-6">
                        <label>Last Apply Date:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                          </div>

                          <input id="single_cal4" name="last_apply_date" type="text" class="tags form-control" placeholder="select date" />
                        </div>
                      </div>
                      <!-- Search Result Title-->
                      <div class="form-group col-sm-6">
                        <label>Post visibility Date:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                          </div>

                          <input type="text" class="form-control" id="single_cal2" name="post_visibility_date" placeholder="select date">


                        </div>
                      </div>
                      <!-- Search Result Title-->
                      <div class="form-group col-sm-6">
                        <label>Gender Preferences:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-female"></i>
                          </div>
                          <select name="selected_gender" class="form-control" id="selected_gender">
                            <option value="select gender preferences" disabled="disabled" selected="selected">Select gender</option>
                            <option value="PHD">Male</option>
                            <option value="PHD">Female</option>
                            <option value="PHD">None</option>
                          </select>
                        </div>
                      </div>
                      <!-- Search Result Title-->
                      <div class="form-group col-sm-6">
                        <label>Prefered Age Group:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-birthday-cake"></i>
                          </div>

                          <input id="prefered_age" name="prefered_age" type="text" class="tags form-control" placeholder="Enter Prefered Age Group (20 to 25)" />
                        </div>
                      </div>
                      <!--Career criteria -->
                      <div class="bg">
                        <!-- Search Result Title-->
                        <div class="form-group col-sm-3">
                          <label>Required Qualification:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-globe"></i>
                            </div>
                            <select name="selected_qualificaltion[]" class="form-control" id="selected_qualification[]">
                              <option value="select gender preferences" disabled="disabled" selected="selected">Select Qualification</option>
                              @foreach($qual as $qual)
                              <option value="{{$qual->qualification_title}}">{{$qual->qualification_title}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <!-- Search Result Title-->
                        <div class="form-group col-sm-3">
                          <label>Majors:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-trophy"></i>
                            </div>

                            <select name="selected_majors[]" class="form-control" id="selected_majors[]">
                              <option disabled="disabled" selected="selected">Select Majors</option>
                              @foreach($major as $major)
                              <option value="{{$major->major_title}}">{{$major->major_title}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <!-- required degree level-->
                        <div class="form-group col-sm-3">
                          <label>Required Degree Level:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-mortar-board"></i>
                            </div>

                            <select name="req_degree[]" class="form-control" id="req_degree[]">
                              <option value="select Degree" disabled="disabled" selected="selected">Select Degree Level</option>
                              @foreach($degree as $degree)
                              <option value="{{$degree->degree_title}}">{{$degree->degree_title}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <!------>
                        <div class="form-group col-sm-3">
                          <label>ADD</label>
                          <div class="input-group">

                           <button class="btn btn-primary" onclick="add_qual_area();"><i class="fa fa-plus"></i></button>
                         </div>
                       </div>
                       <div class="clearfix"></div>
                       <div id="content_qual">

                       </div>
                     </div>
                     <!---end criteria--->
                     <!-- About Job -->
                     <div class="form-group col-sm-12">
                      <label>Job Description:</label>
                      <div class="input-group col-sm-12">

                        <textarea name="company_info" id="company_info"></textarea>
                      </div>
                    </div>
                    

                    <div class="form-group">
                      <div class="col-xs-12">

                        <button type="button" class="btn btn-primary">Cancel</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <!-- <button type="button" class="btn btn-success" onclick="org_post('{{$org_page->company_id}}');">POST</button> --> 
                        <button type="submit" class="btn btn-success">POST</button>
                      </div>
                    </div>

                  </form>


                  <!-- end add post -->





                </div>

<!---------------------third content---------------------->
<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
  <div id="first-part">

    <!-- start user projects -->
          <div class="box-header">
            <h3 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace">UPDATE ACCOUNT</h3>
          </div>
          <div class="box-body">

            <div id="update_email">

              <form mmethod="post" action="" enctype="multipart/form-data" id="form" name="form">
                @csrf
                <!-- IP mask -->

                <div class="form-group col-sm-6 col-md-offset-3">
                  <div class="input-group">
                    <label>Existing Password:  <p id="error" style="color:red"></p></label>
                  </div>
                  <div class="input-group">

                    <input type="text" class="form-control" placeholder="Enter password" name="exist_password" id="exist_password">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>

                  </div>

                  <!-- /.input group -->
                </div>
                <div class="form-group col-sm-6 col-md-offset-3">
                  <label>Create New User:</label>

                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter new user" name="new_email" id="new_email">
                    <div class="input-group-addon">
                      <a  id="emailbtn"onclick="email_update('{{$org_page->company_id}}');">Update</a>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>


                <!-- /.form group -->
              </form>

            </div>
            <div id="current">
              <div class="form-group col-sm-6 col-md-offset-3">

                <div class="input-group">

                  <input type="text" class="form-control" value="edit email" disabled="disabled">
                  <div class="input-group-addon" id="e_pencil">
                    <a onclick="update_email_field();"><i class="fa fa-pencil"></i></a>
                  </div>
                  <div class="input-group-addon" id="close">
                    <a onclick="update_close();"><i class="glyphicon glyphicon-remove-circle"></i></a>
                  </div>
                </div>
                <div class="input-group">

                  <input type="text" class="form-control" value="edit password" disabled="disabled">
                  <div class="input-group-addon" id="p_pencil">
                    <a onclick="update_pass_field();"><i class="fa fa-pencil"></i></a>
                  </div>
                  <div class="input-group-addon" id="pclose">
                    <a onclick="pass_close();"><i class="glyphicon glyphicon-remove-circle"></i></a>
                  </div>
                </div>
                <!-- /.input group -->
              </div>
            </div>

            <!-- Date dd/mm/yyyy -->

            <!-- /.box-body -->
            <!-- update pass -->



            <div id="update_pass">
              <form mmethod="post" action="" enctype="multipart/form-data" id="form" name="form">
                @csrf
                <div class="form-group col-sm-6 col-md-offset-3">
                  <label>Existing Password:   <p id="perror" style="color:red"></p></label>
                  <div class="input-group">

                    <input type="text" class="form-control" placeholder="Enter password" name="ex_password" id="ex_password">
                    <div class="input-group-addon">
                      <i class="fa fa-lock"></i>
                    </div>
                  </div>

                </div>

                <div class="form-group col-sm-6 col-md-offset-3">
                  <label>Create New Password:</label>
                  <div class="input-group">

                    <input type="text" class="form-control" placeholder="Enter password" name="password" id="password">
                    <div class="input-group-addon">
                      <a onclick="pass_update('{{$org_page->company_id}}');">Update</a>
                    </div>
                  </div>
                </div>

              </form>
            </div>


            <!-- update pass -->
          </div>
          <!-- /.box -->
   
    <!-- end user projects -->
  </div>

</div>
<!---------------------end third content---------------------->
<!---------------------forth content---------------------->
<div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
  <div id="first-part">

    <!-- start user projects -->
          <div class="box-header">
            <h3 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace">Organization full Information</h3>
          </div>
    <ul class="list-unstyled" id="job-detail-des">
      <li><span>Organization Name:</span>{{$org_page->company_name}}</li>
      <li><span>Professional Type:</span>{{$org_page->company_type}}</li>
      <li><span>City:</span>{{$org_page->company_city}}</li>
      <li><span>Branch Name:</span>{{$org_page->company_branch}}</li>
      <li><span>Phone:</span>{{$org_page->company_phone}}</li>
      <li><span>Website:</span>{{$org_page->company_website}}</li>
      <li><span>Employees:</span>{{$org_page->company_employees}}</li>
      <li><span>Industry:</span>{{$org_page->company_industry}}</li>
      <li><span>Since:</span>{{$org_page->company_since}}</li>
      <li><span>CNIC:</span>{{$org_page->company_cnic}}</li>
      <li><span>Location:</span>{{$org_page->company_location}}</li>
      <li><span style="display: block;">Organization More Info or Introduction:</span>{{$org_page->company_info}}</li>
      <li><span style="display: block;">Organization More Info or Introduction:</span>

       
        

      </li>
    </ul>
   
    <!-- end user projects -->
  </div>

</div>
<!---------------------end Fourth content---------------------->


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
<!-- Modal window for add City-->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="upload-org-img/{{$org_page->company_id}}" method="post" enctype="Multipart/form-data">
      @csrf

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload image?</h4>
          <div class="col-sm-6 col-md-offset-4" id="loading-spin">
            <i id="i" style="font-size:100px"></i>
          </div>
          <div class="col-sm-6 col-md-offset-4" id="loading-true">
            <i id="tru" style="font-size:100px; color: #38b75e"></i>
          </div>
        </div>
        <div class="modal-body" id="modal-content">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-yelp"></i>
            </div>
            <input type="file" class="form-control" name="org_picture" id="org_img">
          </div>
          <input id="demo" type="hidden" name="test[image]">
          <div id="img_or">
            <img src="#" id="blah" height="250px" width="200px">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-default">Upload</button>
          </div>
        </div>

      </div>
    </form>

  </div>
</div>
<!--/End model window-->
<!--/model-->
<!-- model append -->
<div id="up-post"></div>
<div id="view-post-div">

</div>
<!-- end div-->



<script type="text/javascript">
  $(document).ready(function () {
    $('#blah').awesomeCropper({
      width: 150,
      height: 150,
      debug: false
    });
  });

  function org_post(x){
    alert(x);
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
$( document ).ready(function() {
 $("#img_or").hide();
});
function readURL(input) {
  $("#img_or").show();
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
$("#org_img").change(function() {
  readURL(this);
});
//add city and type and shift more fields
function add_city_area(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var x="yes";
  $.post('fetch-cities-preferences-data',{_token:CSRF_TOKEN,x:x},function(data){ 
   $("#content").append(data);
 });

}
function add_modal_area(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var x="yes";
  $.post('fetch-cities-preferences-data',{_token:CSRF_TOKEN,x:x},function(data){ 
   $("#content_modal_area").append(data);
 });

}
function add_qual_area(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var x="yes";
  $.post('fetch-qual-preferences-data',{_token:CSRF_TOKEN,x:x},function(data){ 

   $("#content_qual").append(data);
  // $("#content_modal_qual").html(data);
});

}
function add_modal_qual_area(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var x="yes";
  $.post('fetch-qual-preferences-data',{_token:CSRF_TOKEN,x:x},function(data){ 

    $("#content_modal_qual").append(data);
  });

}
//delete field from modal window
function del_qual_area(x){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post('del-qual-field',{_token:CSRF_TOKEN,x:x},function(data){ 
    alert(data);
    if(data){
      $("#fields"+x).remove();
    }
  });
  
}
function del_fields(x){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post('del-city-field',{_token:CSRF_TOKEN,x:x},function(data){ 
    alert(data);
    if(data){
      $("#Cityfields"+x).remove();
    }
  });
  
}

//delete fields which is append on add button
function del_field(x){
  $("#fields"+x).remove();
}


//organization post 
// $("form#data_org").submit(function(event){
//   $y=$("#posted_job_title").val();
//   var d = new Date($.now());
//   var i=d.getDate()+"-"+(d.getMonth() + 1)+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
//   $.ajaxSetup({
//     headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
//   });

//   //disable the default form submission
//   event.preventDefault();

//   //grab all form data  
//   var formData = new FormData($(this)[0]);

//   $.ajax({
//     url: 'organization-post-data',
//     type: 'POST',
//     data: formData,
//     async: false,
//     cache: false,
//     contentType: false,
//     processData: false,
//     success: function (returndata) {
//       swal("Successfully!", "Your Job is Successfully Posted!", "success");
//       //alert(returndata);
//       $("#post-tr:last-child").after('<tr id="post-tr'+returndata+'"><td id="title-td'+returndata+'">'+y+'</td><td>'+i+'</td><td id="up-date-td'+returndata+'">'+i+'</td><td class="vertical-align-mid"><a><i class="fa fa-trash"></i></a> | <a><i class="fa fa-eye"></i></a></td></tr>');

//     }
//   });

//   return false;
// });

function update_post(x){
 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//alert(x);
$.post('update-post',{_token:CSRF_TOKEN,x:x},function(data){
//alert(data);
if(data){
  $("#up-post").html(data);
  $("#mymodalpost").modal('show');
  CKEDITOR.replace( 'user_info' );
}
});
}
function view_post(x){
  var y=$("#c_name").html();
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//alert(y);
$.post('view-post-data',{_token:CSRF_TOKEN,x:x,y:y},function(data){
//alert(data);
if(data){
  //alert(data);
  $("#view-post-div").html(data);
  $("#mymodalview").modal('show');
  CKEDITOR.replace( 'user_info' );
}
});
}

function update_post_info(x){
  var y= $("#u_posted_job_title").val();
  
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    //disable the default form submission
    event.preventDefault();
  //grab all form data  
  var formData = new FormData($("#info_post")[0]);
  $.ajax({
    url: 'post-update-data',
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (returndata) {
      $("#mymodalpost").modal('hide');
      $("#title-td"+x).html(y);
      $("#up-date-td"+x).html(returndata);
      var originalColor = $("#post-tr"+x).css("background-color");
      $("#post-tr"+x).css("background",'#84D285');
     // swal("Successfully!", "Your Post is Successfully Updated!", "success");
     setTimeout(function(){

      $("#post-tr"+x).css("background",originalColor);
    },2000);

      //alert(returndata);
    }
  });

  return false;

}



</script>
<script type="text/javascript">
    $( document ).ready(function() {
       $("#update_email").hide();
       $("#update_pass").hide();
       $("#close").hide();
       $("#pclose").hide();
    });
    function update_email_field(){
        $("#e_pencil").hide();
        $("#update_email").show();
        $("#close").show();
        var x= $("#exist_password").val();
        var y= $("#new_email").val();
    }
    function email_update(id){
       
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var x= $("#exist_password").val();
        var y= $("#new_email").val();
       // alert("x");
     $.post("org-email-up",{_token:CSRF_TOKEN,x:x,y:y,id:id},function(data){
        $("#error").html(data);
     });
    }
    function update_pass_field(){
       $("#p_pencil").hide();
        $("#update_pass").show();
        $("#pclose").show();
    }
    function pass_update(id){
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var x= $("#ex_password").val();
        var y= $("#password").val();
        alert(id+"     "+x+"     "+y);
     $.post("org-pass-up",{_token:CSRF_TOKEN,x:x,y:y,id:id},function(data){
        $("#perror").html(data);
     });
    }
    function update_close(){
        $("#update_email").hide();
        $("#close").hide();
        $("#e_pencil").show();
         



    }
    function pass_close(){
        $("#update_pass").hide();
        $("#pclose").hide();
        
        $("#p_pencil").show();
         
    }

</script>

<!--   Styling on organization Image    -->
<style type="text/css">
#job-detail-des{
  text-decoration: none;
  font-family: 'Montserrat', sans-serif;
}
#job-detail-des li{
text-decoration: none;
}
#job-detail-des li span{
font-size: 14px;
padding-right: 3%;
font-weight: bold;
}
#heading-head{
  padding-top:4%;
  padding-bottom:5%;
}
.contain{
  position: relative;
  /*width: 100%;*/
  background-color: pink;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .3s ease;
  background:transparent;
}

.contain:hover .overlay {
  opacity: 0.5;
}

.icon {
  color: white;
  font-size: 70px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.fa-user:hover {
  color: #eee;
}
.bg{
  padding: 2%;
  float: left;
  background-color: #F1F2F2;
  margin-bottom: 10px;
}

.chil{
  padding-top: 25px;
  font-size: 20px;
}

/*badges*/
.model-head{
  font-size: 30px;
}
.heading{
    font-size: 14px;
}

</style>


@endsection

