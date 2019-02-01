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

                  <span class="img-view" id="img-div">
                   <img class="img-responsive avatar-view image" src="{{url('uploads/organization_images')}}<?php echo '/'.$org_IMG->company_img; ?>" alt="Avatar" title="Change the avatar"> 
                 </span>

                 <div class="overlay">
                  <a href="#" data-toggle="modal" data-target="#myModalimg" class="icon" title="Edit Picture">
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
              <?php 
              
              $org_page->company_industry= str_replace("_"," ",$org_page->company_industry);
              echo $org_page->company_industry;
              ?>
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
                                <th>Status</th>
                                <th>Change Status</th>
                                <th>Action</th>
                              </thead>
                              <tbody>

                                <!-- @foreach($org_post as $org_post) -->
                                <tr id="post-tr{{$org_post->post_id}}">
                                  <td id="title-td{{$org_post->post_id}}">{{$org_post->job_title}}</td>
                                  <td>{{$org_post->created_at}}</td>
                                  <td id="up-date-td{{$org_post->post_id}}">{{$org_post->updated_at}}</td>
                                  <td id="post-td{{$org_post->post_id}}">{{$org_post->post_status}}</td>
                                  <td><select id="post_state" name="post_state" onchange="change_post_status(this.value,'{{$org_post->post_id}}');">
                      <option disabled="disabled" selected="selected">Select Status</option>
                       <option value="Active">Active</option>
                       <option value="Block">Block</option>
                     </select>
                                    
                                  </td>
                                  <td class="vertical-align-mid">
                                    <a onclick="del_post('{{$org_post->post_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Post" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a> | <a onclick="update_post('{{$org_post->post_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Post" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a> | <a onclick="view_post('{{$org_post->post_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Post" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-eye"></i></span></a>

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
                                <input class="form-control" type="text" name="skill_tags" id="skill_tags" data-role="skill_tags"/>
                                <style type="text/css">
                                #skill_tags{
                                  width: 100%;
                                }
                              </style>
                            </div>     
                          </div>


                          <!-- Functional Area job-->
                          <div class="form-group col-sm-6">
                            <label>Functional Area:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-users"></i>
                              </div>
                              <select name="req_functional_area" class="form-control" placeholder="Select Functional Area" id="req_functional_area" onchange="select_major();">
                                <option value="" disabled="disabled" selected="selected">Select Your Career level</option>
                                @foreach($area as $area)
                                <option value="{{$area->area_title}}">
                                  <?php
                                    $area->area_title= str_replace("_"," ",$area->area_title);
                                    echo $area->area_title;
                                  ?>
                                </option>
                                @endforeach
                                
                              </select>
                            </div>
                          </div>
                          <!-- Search Result Title-->
                        <div class="form-group col-sm-6">
                          <label>Majors:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-trophy"></i>
                            </div>

                            <select name="selected_majors" class="form-control" id="selected_majors">
                              <option disabled="disabled" selected="selected">Select Majors</option> 
                              <!-- @foreach($major as $major)
                              <option value="{{$major->major_title}}">{{$major->major_title}}</option>
                              @endforeach -->
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
                                <option value="{{$industry->company_industry_name}}">
                                  <?php
                                    
                                    $industry->company_industry_name= str_replace("_"," ",$industry->company_industry_name);
                                        echo $industry->company_industry_name;
                                  ?></option>
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
                               <option value="Entry Level">Entry Level</option>
                               <option value="Intermediate">Intermediate</option>
                               <option value="Experienced Professional">Experienced Professional</option>
                               <option value="Department Head">Department Head</option>
                               <option value="Gm / CEO / Country Head">Gm / CEO / Country Head</option>
                             </select>
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
                                <option value="Evening Shift">Evening Shift</option>
                              </select>
                            </div>
                          </div>
                          <!------>
                          <div class="form-group col-sm-3">
                            <label>ADD</label>
                            <div class="input-group">

                             <button type="button" class="btn btn-primary" onclick="add_city_area();"><i class="fa fa-plus"></i></button>
                           </div>
                         </div>
                         <div class="clearfix"></div>
                         <div id="content">

                         </div>

                       </div>

                       <!------>
                        <!-- Experience for job -->
                         <div class="form-group col-sm-4">
                          <label>Year of Experience Required:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-external-link"></i>
                            </div>
                            <input type="number" placeholder="Enter Required Experience" class="form-control" name="job_exp_req" id="job_exp_req">
                          </div>
                        </div>

                       <!-- Search Result Title-->
                       <div class="form-group col-sm-4">
                        <label>Total Positions:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-sort-amount-asc"></i>
                          </div>

                          <input id="total_positions" name="total_positions" type="number" class="tags form-control" placeholder="Enter in Numbers" />
                        </div>
                      </div>
                      <!-- Search Result Title-->
                      <div class="form-group col-sm-4">
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
                          <input type="date" id="last_apply" name="last_apply_date"  class="form-control" placeholder="11/25/2018" data-theme="my-style" data-format="S F, Y" data-large-mode="true" data-min-year="1970" data-max-year="2030" data-translate-mode="true" data-lang="en"/>
                          
                        </div>
                      </div>
                      <!-- Search Result Title-->
                      <div class="form-group col-sm-6">
                        <label>Post visibility Date:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                          </div>

                          <input type="date" class="form-control" id="post_visible" name="post_visibility_date" placeholder="select date" data-theme="my-style" data-format="S F, Y" data-large-mode="true" data-min-year="1970" data-max-year="2030" data-translate-mode="true" data-lang="en"/>


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
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="None">None</option>
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

                          <input id="prefered_age" name="prefered_age" type="text" class="form-control" placeholder="Enter Prefered Age Group (20 to 25)" />
                        </div>
                      </div>
                      <!--Career criteria -->
                      <div class="bg">
                        <!-- Search Result Title-->
                        <div class="form-group col-sm-4">
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
                        
                        <!-- required degree level-->
                        <div class="form-group col-sm-4">
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
                        <div class="form-group col-sm-4">
                          <label>ADD</label>
                          <div class="input-group">

                           <button type="button" class="btn btn-primary" onclick="add_qual_area();"><i class="fa fa-plus"></i></button>
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
                      <li><span>Industry:</span><?php
                        
                        $org_page->company_industry= str_replace("_"," ",$org_page->company_industry);
                        echo $org_page->company_industry;
                      ?></li>
                      <li><span>Since:</span>{{$org_page->company_since}}</li>
                      <li><span>CNIC:</span>{{$org_page->company_cnic}}</li>
                      <li><span>Location:</span>{{$org_page->company_location}}</li>

                      <li><span style="display: block;">Organization Documents:</span>


                      </li>
                      <li><span style="display: block; padding-bottom: 3%;">Organization More Info or Introduction:</span><p style="padding-left: 5%;"><?php
                      $org_page->company_info  = str_ireplace('<p>','',$org_page->company_info);
                      echo $org_page->company_info  = str_ireplace('</p>','',$org_page->company_info);

                      ?></p></li>
                      <li><span style="display: block; padding-bottom: 3%;">Organization Document:</span><a class="btn btn-default" href="{{url('uploads/organization_documents')}}<?php echo '/'.$org_page->company_document;?>" target="_blank">view Document</a></li>
                      <li><span style="display: block; padding-bottom: 3%;">Organization Document:</span>

                        <a class="word" href="http://docs.google.com/gview?url=uploads/organization_documents<?php echo '/'.$org_page->company_document;?>&embedded=true">document view !!</a></li>

                      </ul>

                      <!-- end user projects -->
                    </div>

                  </div>
                  <!---------------------end Fourth content---------------------->
                  <!----------------------start fifth content-------------------------->
                  <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">
                    <div class="box-header">
                      <h3 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace">Organization Post Graph</h3>
                    </div>
                    <?php 
                    $comp_id=$org_page->company_id;
                    $info = DB::table('Add_organizations')->select('created_at')->first();
                    $new=$info->created_at;
  //print_r($info);
                    $date = explode(" ",$new);
  // echo $date[0];
  // echo date('Y-m-d', strtotime($date[0]. ' + 5 days'));

  //$NewDate=Date('y:m:d', strtotime("+7 days Last Sunday"));
  // $last_post = DB::table('organization_posts')->OrderBy('post_id','desc')->first();
  // print_r($last_post);
                    ?>
                    <canvas id="myChart" width="400" height="200"></canvas>
                  </div>
                  <!----------------------------------------------------->

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
<div id="myModalimg" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <form>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload image?</h4>
          <div style="padding-top:30px;">
            <strong>Select Image:</strong>
            <br/>
            <input type="file" id="upload">
            <br/>             
          </div>
        </div>
        <div class="modal-body" id="modal-content">
          <div class="container">
            <div class="row">
              <div class="col-md-5 text-center">
                <div id="upload-demo" style="width:350px"></div>
              </div>
              <div class="col-md-5" style="">
                <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success upload-result">Upload Image</button>
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

<!-- test -->
<div id="data_app"></div>



<script type="text/javascript">
  $(document).ready(function () {
    $('#blah').awesomeCropper({
      width: 150,
      height: 150,
      debug: false
    });

  });

  // function org_post(x){
  //   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  //   var a=$("#org_contact_phone").val();
  //   var b=$("#org_contact_email").val();
  //   var c=$("#posted_job_title").val();
  //   var d=$("#selected_career").val();
  //   var e=$("#job_exp_req").val();
  //   var f=$("#job_salary_range").val();
  //   var g=$("#job_skills").val();
  //   var h=$("#tags_1").val();
  //   var i=$("#gender").val();
  //   var j=CKEDITOR.instances['info'].getData();
  //   $.post('do-company-post',{_token:CSRF_TOKEN,a:a,b:b,c:c,d:d,e:e,f:f,g:g,h:h,i:i,j:j,x:x},function(data){
  //     swal("Successfully!", "Your Job is Successfully Posted!", "success");   
  //   }); 


  // }

  function del_post(id){
   var result = confirm("Really want to delete this?");
   if(result){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.post("delete-post",{_token:CSRF_TOKEN,id:id},function(data){
     if(data){
      $("#post-tr"+id).css('background-color','#2A3F54');
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
  $('#modal_last_date').dateDropper();
  $('#modal_post_visible').dateDropper();
  $("#modal_skill_tags").tagsinput({
   maxTags: 5,
 });
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
      $("#post-tr"+x).css("background",'#d8d8d8');
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


<!-- end info -->
<script type="text/javascript">
  $("#update_email").hide();
   $("#update_pass").hide();
   $("#close").hide();
   $("#pclose").hide();
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
  <script>
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

   $uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
      width: 200,
      height: 200,
      type: 'circle'
    },
    boundary: {
      width: 300,
      height: 300
    }
  });


   $('#upload').on('change', function () { 
    var reader = new FileReader();
    reader.onload = function (e) {
      $uploadCrop.croppie('bind', {
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });

    }
    reader.readAsDataURL(this.files[0]);
  });


   $('.upload-result').on('click', function (ev) {
    $uploadCrop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function (resp) {

        //alert(resp);
      // window.alert(this.href.substr(this.href.lastIndexOf('/') + 1));
      $.ajax({
        url: "upload-org-img/{{$org_page->company_id}}",
        type: "post",
        data: {_token:CSRF_TOKEN,"image":resp},
        success: function (data) {
          html = '<img src="'+resp+'"/>';        
          $("#upload-demo-i").html(html);
          if(data){
             html = '<img class="img-responsive avatar-view image" src="CareerSpoons.com/uploads/organization_images/'+data+'" alt="Avatar" title="Change the avatar">  ';  
             $("#img-div").html(html);
            
            $("#myModalimg .close").click();
          }

          }
        });
    });
  });

</script>
<!-- onchange for major selection -->
<script>
 function n_select_major(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var area=$("#n_req_functional_area").val();
    $.post("fetch_area_majors",{_token:CSRF_TOKEN,area:area},function(data){
            $('select[name="n_req_major"]').empty();
       $.each(data, function( key, value ) {
            $('select[name="n_req_major"]').append('<option value="'+ data[key].major_title +'">'+ data[key].major_title +'</option>');
               alert(data[key].major_title);
          });
           //alert(data[0].area_title);
        //var obj = jQuery.parseJSON(data);
        //var x = obj.info[0].major_title;
        // for (j in data.info[i].area_title) {
        //   x += data.info[i].area_title[j];
         //alert(x);
        // } 
    //alert(data.area_title[0]);
    //$("#data_app").append(data);
    //alert(data.info[0]);
    //  $('select[name="selected_majors"]').empty();
    //  $.each(data, function(key, value) {
    //   $('select[name="selected_majors"]').append('<option value="'+ key +'">'+ value +'</option>');
    // });

  });

  }
  function select_major(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var area=$("#req_functional_area").val();
    $.post("fetch_area_majors",{_token:CSRF_TOKEN,area:area},function(data){
        $('select[name="selected_majors"]').empty();
       $.each(data, function( key, value ) {
             var str = data[key].major_title;
            str = str.replace("_"," ");
            $('select[name="selected_majors"]').append('<option value="'+ data[key].major_title +'">'+  str +'</option>');
               //alert(data[key].major_title);
          });

  });

  }
</script>
<script type="text/javascript">
  function change_post_status(x,id){
//var x=$("#post_state").val();
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.post('change-post-status',{_token:CSRF_TOKEN,x:x,id:id},function(data){
        if(data){
            if(x == "Block"){
            
           swal("Oops", "Account Blocked.", "error");
         }else{
           swal("Success", "Account Activated.", "success");
         }
         $("#post-td"+id).html(x);
   }
     
    });
 //alert(x);
// alert(id);
  }
</script>

<!--   Styling on organization Image    -->
<style type="text/css">
#job-detail-des{
  text-decoration: none;
  margin: 5%;
  /*font-family: 'Montserrat', sans-serif;*/
}
#job-detail-des li{
  text-decoration: none;
  padding-bottom: 8px;
  padding-top: 7px;
  border-bottom: solid 1px #e0e0e0;
  padding-left: 1%;
}
#job-detail-des li:nth-child(even){
  background-color: #F9F9F9;
}
#job-detail-des li:first-child{
  border-top: solid 2px #e0e0e0;
}
#job-detail-des li:last-child{
  border-bottom: solid 2px #e0e0e0;
}
#job-detail-des li span{
  font-size: 14px;
  padding-right: 3%;
  font-weight: bold;
}
#heading-head{
  padding-top:4%;
  padding-bottom:5%;
  font-weight: bold;
}
.contain{
 position: relative;
 height: 200px;
 width: 200px;
 background-color: pink;
 border-radius: 50%;
 border:solid 3px #A5A9AC;
}

.image {
 display: block;
 width: 100%;
 height: auto;
 border-radius: 50%;
 border:solid 8px #F5F7FA;
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
  font-size: 60px;
  position: absolute;
  top: 45%;
  left: 45%;
  transform: translate(-30%, -30%);
  -ms-transform: translate(-30%, -30%);
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
<script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["2018", "2019", "2020", "2021", "2022", "2023"],
      datasets: [{
        label: '# of Votes',

        data: [12, 30, 3, 5, 2, 3],

        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
</script>


@endsection

