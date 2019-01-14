@extends('admin_views.template.master')
@section('content')


<!--content-->


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3 id="c_name">{{Session::get('admin_name')}}</i></h3>
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

            <div class="col-md-3 col-sm-3 col-xs-12 profile_left admin-img">

              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <div class="contain">
                    <span class="img-view" id="img-div">
                     <img class="img-responsive avatar-view image" src="{{url('uploads/admin_img/')}}/{{$ad_img->admin_img}}" alt="Avatar" title="Change the avatar"> 
                   </span>

                   <div class="overlay">
                    <a href="#" data-toggle="modal" data-target="#mymodalimg" class="icon" title="Edit Picture">
                      <i class="fa fa-pencil"></i>
                    </a>
                  </div>
                </div> 

              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12 profile_left admin-text">
            <!-- <h3 id="typed-strings">nayab</h3> -->
            
            <h3 style="font-size: 18px; font-weight: 400">{{$ad_info->admin_fullname}}

            </h3>
            

            <div id="typed-strings">
             <!--  <p>Typed.js is a <strong>JavaScript</strong> library.</p>
              <p>It <em>types</em> out sentences.</p> -->



              <ul class="list-unstyled user_data">

                <li><i class="fa fa-map-marker user-profile-icon"></i> {{$ad_info->admin_address}}
                </li>

                <li class="m-top-xs">
                  <i class="fa fa-phone"></i>
                  <a href="http://www.kimlabs.com/profile/" target="_blank">{{$ad_info->admin_phone}}</a>
                </li>

                <!-- <li>
                  <i class="fa fa-briefcase user-profile-icon"></i> 
                  agriculture
                </li>

                <li class="m-top-xs">
                  <i class="fa fa-external-link user-profile-icon"></i>
                  <a href="http://www.kimlabs.com/profile/" target="_blank">www.website.com</a>
                </li> -->
              </ul>
            </div>
            <span id="typed"></span>

            <!-- <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a> -->
            <br/>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

               <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Personal Information</a>
               </li>
               <?php if(session()->get('account_right') == "admin" || session()->get('account_right') == "superadmin"){?>
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">New Employees</a>
               </li> 
               <?php }?>
               <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Account Setting</a>
               </li>
               <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Send Email</a>
               </li>
               <!-- <li role="presentation" class=""><a href="#tab_content6" role="tab" id="profile-tab5" data-toggle="tab" aria-expanded="false">Insights</a>
               </li> -->
             </ul>
             <div id="myTabContent" class="tab-content">

              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <div id="first-part">
                  <div class="box-header">
                    <h3 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace">Personal Information</h3>
                  </div>
                  <!-- swall atart  -->
                 <!--  @if (session()->has('success'))
                  <script type="text/javascript">
                    swal("success!", "Your information is successfully Updated.", "success");
                  </script>
                  @endif -->
                  <!-- swall end -->

                  <ul class="list-unstyled" id="job-detail-des">
                   
                    <li><span>Full Name:</span>
                    {{$ad_info->admin_fullname}}</li>
                    <li><span>Right:</span>{{$ad_info->account_right}}</li>
                    <li><span>Phone:</span>{{$ad_info->admin_phone}}</li>
                    <li><span>Address:</span>{{$ad_info->admin_address}}</li>
                    <li><span>Email:</span>{{$ad_info->admin_email}}</li>
                    
                    <li><a data-toggle="modal" data-target="#myModaladmin" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Info</a></li>
                 

                  </ul>
                </div>

              </div>

              <!--------------------second content ------------------>
              <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                <div class="box-header">
                  <h3 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace"> Add New Employee</h3>
                </div>
                <form action="{{url('add_new_employee')}}" method="post">
                  @csrf
                  @if (session()->has('employee'))
                  <script type="text/javascript">
                    swal("success!", "Employee Added to your Record.", "success");
                  </script>
                  @endif
                  <div style="padding: 3%;padding-left: 20%;padding-right: 20%;">
                    <label>Full Name:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-male"></i>
                      </div>
                      <input type="text" class="form-control" name="employee_name" id="employee_name" placeholder="Enter Full Name">
                    </div>
                    <label style="margin-top:1%;">Phone Number:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="number" class="form-control" name="employee_phone" id="employee_phone" placeholder="Enter Phone No">
                    </div>
                    <label style="margin-top:1%;">Address:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-map-marker"></i>
                      </div>
                      <input type="text" class="form-control" name="employee_address" id="employee_address" placeholder="Enter Address">
                    </div>
                    <label style="margin-top:1%;">Email:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                      </div>
                      <input type="text" class="form-control" name="employee_email" id="employee_email" placeholder="Enter Email">
                    </div>
                    <label style="margin-top:1%;">Select Right:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-external-link"></i>
                      </div>
                      <select class="form-control" name="employee_right" id="employee_right" >
                        <option class="form-control" value="admin">Admin</option>
                        <option class="form-control" value="editor">Editor</option>
                        <option class="form-control" value="analytics">Analytics</option>
                      </select>
                    </div>
                    <label style="margin-top:1%;">Account Detail:</label>
                    <div class="input-group" style="margin-bottom:10%;">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input type="text" class="form-control" name="employee_user" placeholder="Enter User Name" id="employee_user" style="width: 50%;">
                      <input type="text" class="form-control" name="employee_pass" placeholder="Enter Password" id="employee_pass" style="width: 50%;">
                      <div class="input-group-addon">
                        <i class="fa fa-lock"></i>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto">Add Employee</button>

                  </div>
                </form>

                <div class="box-header">
                  <h3 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace"> All Employee</h3>
                </div>
                <div id="my-employees">
                  <table id="employee" class="table table-striped table-bordered bulk_action">
                    <thead>
                      <tr>
                       <th><input type="checkbox" id="select-all" class="flat"> Select All </th>  
                       <th>Employee Name</th>
                       <th>Employee Phone No</th>
                       <th>Employee Email</th>
                       <th>Current Status</th>     
                       <th>Change Status</th>            
                       <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    <!-- <tr id="employee-tr"></tr> -->
                    @foreach($em_info as $em_info)
                    <tr id="employee-tr{{$em_info->account_id}}" class="employee-tr"> 
                     <th><input type="checkbox" name="check_all_org[]" class="flat" value="{{$em_info->account_id}}"></th> 
                     <td id="name-td{{$em_info->account_id}}">{{$em_info->admin_fullname}}</td>
                     <td id="phone-td{{$em_info->account_id}}">{{$em_info->admin_phone}}</td>
                     <td id="email-td{{$em_info->account_id}}">{{$em_info->admin_email}}</td>
                     <td id="status-td{{$em_info->account_id}}">{{$em_info->account_activation}}</td>
                     <td> 
                      <select id="select_status" name="select_status" onchange="change_status(this.value,'{{$em_info->account_id}}');"> <option disabled="disabled" selected="selected">Select Status</option>
                        <option value="Active">Active</option>
                        <option value="Block">Block</option>
                      </select>
                     </td>
                     <!-- <td>
                      <?php// if($em_info->account_activation == 'true'){?>
                        <input type="checkbox" id="toggle-account" data-toggle="toggle" data-on="Active" data-off="Block" data-size="normal" data-width="null" checked data-offstyle="danger" value="{{$em_info->account_id}}">

                      <?php// }else if($em_info->account_activation == 'false'){ ?>
                        <input type="checkbox" id="toggle-account-b" data-toggle="toggle" data-on="Active" data-off="Block" data-size="normal" data-width="null"  data-offstyle="danger" value="{{$em_info->account_id}}">
                      <?php// }?>
                    </td> -->

                    <td><a onclick="edit_employee('{{$em_info->account_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Organization" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a> | <a onclick="delete_employee('{{$em_info->account_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Employee Account" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a> | <a onclick="view_employee('{{$em_info->account_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Employee Details" data-pt-animate="flipInX" data-pt-size="small"><i class="glyphicon glyphicon-eye-open"></i></span></a></a></td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <!-- <tr id="employee-tr"></tr> -->
                  
                </tfoot>

              </table>
            </div>


          </div>

          <!---------------------third content---------------------->
          <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
            <div id="first-part">

              <!-- start user projects -->
              <div class="box-header">
                <h3 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace">ACCOUNT Setting</h3>
              </div>
              <div class="box-body">

                <div id="update_email">

                  <form mmethod="post" action="" enctype="multipart/form-data" id="updateEmailform" name="form">
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
                      <label>Create New Username:</label>

                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter new username" name="new_email" id="new_email">
                        <div class="input-group-addon">
                          <a  id="emailbtn"onclick="email_update('{{Session::get('account_id')}}');">Update</a>
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

                      <input type="text" class="form-control" value="Edit OR Change Username" disabled="disabled">
                      <div class="input-group-addon" id="e_pencil">
                        <a onclick="update_email_field();"><i class="fa fa-pencil"></i></a>
                      </div>
                      <div class="input-group-addon" id="close">
                        <a onclick="update_close();"><i class="glyphicon glyphicon-remove-circle"></i></a>
                      </div>
                    </div>
                    <div class="input-group">

                      <input type="text" class="form-control" value="Edit OR Change Password" disabled="disabled">
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
                <!-- /.box-body -->
                <!-- update pass -->

                <div id="update_pass">
                  <form mmethod="post" action="" enctype="multipart/form-data" id="passwordform" name="form">
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
                          <a onclick="pass_update('{{Session::get('account_id')}}');">Update</a>
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
                <h3 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace">Send Emails</h3>
              </div>
              <div class="box-body">
                <form>
                  <label>Select type of Mail:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-envelope-o"></i>
                    </div>
                    <select type="text" class="form-control" name="employee_name" id="employee_name" placeholder="Enter Full Name">
                      <option class="form-control" value="complained">Complained</option>
                      <option class="form-control" value="complained">Complained</option>
                      <option class="form-control" value="complained">Complained</option>

                    </select> 
                  </div>
                </form>
              </div>

            </div>

          </div>
          <!---------------------end Fourth content---------------------->
          <!----------------------start fifth content-------------------------->
          <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">
            <div class="box-header">
              <h3 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace">Organization Post Graph</h3>
            </div>

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



<!-- edit admin information model window start -->
<div id="myModaladmin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="{{url('update-admin-info')}}" method="post" enctype="Multipart/form-data">
      @csrf

      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit your Profile Here</h4>
          <div class="col-sm-6 col-md-offset-4" id="loading-spin">
            <i id="i" style="font-size:100px"></i>
          </div>
          <div class="col-sm-6 col-md-offset-4" id="loading-true">
            <i id="tru" style="font-size:100px; color: #38b75e"></i>
          </div>
        </div>
        <input type="hidden" name="id" value="{{Session::get('account_id')}}">
        <div class="modal-body" id="modal-content">
          <div style="padding: 5%;">
            <label style="margin-top:4%;">Full Name:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-male"></i>
              </div>
              <input type="text" class="form-control" name="new_admin_name" id="new_admin_name" value="{{$ad_info->admin_fullname}}">
            </div>
            <label style="margin-top:1%;">Phone Number:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-phone"></i>
              </div>
              <input type="number" class="form-control" name="new_admin_phone" id="new_admin_phone" value="{{$ad_info->admin_phone}}">
            </div>
            <label style="margin-top:1%;">Address:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-map-marker"></i>
              </div>
              <input type="text" class="form-control" name="new_admin_address" id="new_admin_address" value="{{$ad_info->admin_address}}">
            </div>
            <label style="margin-top:1%;">Email:</label>
            <div class="input-group" style="margin-bottom:10%;">
              <div class="input-group-addon">
                <i class="fa fa-envelope-o"></i>
              </div>
              <input type="text" class="form-control" name="new_admin_email" id="new_admin_email" value="{{$ad_info->admin_email}}">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-default">Update</button>
          </div>
        </div>

      </div>
    </form>

  </div>
</div>


<!-- edit admin information model window end -->




<!--model-->
<!-- Modal window for add City-->
<div id="mymodalimg" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Upload Image</h4>
        <div style="padding-top:30px;">
                <strong>Select Image:</strong>
                <br/>
                <input type="file" id="upload">
                <br/>

               
            </div>
      </div>
      <div class="modal-body">
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


      </div>
      <div class="modal-footer">
         <button class="btn btn-success upload-result">Upload Image</button>
      </div>
    </div>
  </div>
</div>
  <!--/End model window-->
  <!--/model-->
  <!-- model append -->
  <div id="view-employee">

  </div>
  <div id="edit-employee"></div>

  <!-- end div-->

  <script type="text/javascript">

    function change_status(x,id){
      //alert(id);
      //var x=$("#select_status").val();
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.post('change-employee-status',{_token:CSRF_TOKEN,x:x,id:id},function(data){
      if(data){
        if(x == "Block"){
        
       swal("Oops", "Account Blocked.", "error");
     }else{
       swal("Success", "Account Activated.", "success");
     }
     $("#status-td"+id).html(x);
   }

    });

    }
 //  $( document ).ready(function() {
 //   $("#img_or").hide();
 // });
  // function readURL(input) {
  //   $("#img_or").show();
  //   if (input.files && input.files[0]) {
  //     var reader = new FileReader();

  //     reader.onload = function(e) {
  //       $('#blah').attr('src', e.target.result);
  //     }

  //     reader.readAsDataURL(input.files[0]);
  //   }
  // }
  // $("#org_img").change(function() {
  //   readURL(this);
  // });



  // for Disabled account
  // $(function() {
  //   $('#toggle-account').change(function() {
  //     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  //     //$('#console-event').html('Toggle: ' + $(this).prop('checked'))
  //     var x=$(this).prop('checked');
  //     var y=$('#toggle-account').val();
  //     $.post('block-employee-acc',{_token:CSRF_TOKEN,x:x,y:y},function(data){
  //       if(data){
  //         $("#my-employees").load('data-table');


  //      // window.location.replace("admin-profile");
  //      swal("Oops", "Account Blocked.", "error");
  //    }

  //  });
  //   });
  // });

  //  // for Enabled account
  //  $(function() {
  //   $('#toggle-account-b').change(function() {
  //     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  //     //$('#console-event').html('Toggle: ' + $(this).prop('checked'))
  //     var x=$(this).prop('checked');
  //     var y=$('#toggle-account-b').val();
  //     $.post('block-employee-acc',{_token:CSRF_TOKEN,x:x,y:y},function(data){
  //       if(data == "yes"){
  //      // window.location.replace("admin-profile");
  //      $("#my-employees").load('data-table');
  //      swal("success!", "Account Activated.", "success");

  //    }

  //  });
  //   });
  // });




  //  function add_employee(){
  //   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  //   var a=$("#employee_name").val();
  //   var b=$("#employee_phone").val();
  //   var c=$("#employee_address").val();
  //   var d=$("#employee_email").val();
  //   var e=$("#employee_right").val();
  //   var f=$("#employee_user").val();
  //   var g=$("#employee_pass").val();
  //   $.post("add_new_employee",{_token:CSRF_TOKEN,a:a,b:b,c:c,d:d,e:e,f:f,g:g},function(data){
  //     alert(data);
  //     //swal("success",'successfully Added');
  //     var id ="'"+data+"'";
  //     $(".employee-tr:last-child").after('<tr id="employee-tr'+data+'"><th><input type="checkbox" name="check_all_org[]" class="flat" value=""></th><td id="">'+a+'</td><td id="">'+b+'</td><td id="">'+d+'</td><td><input type="checkbox" id="toggle-account" data-toggle="toggle" data-on="Active" data-off="Block" data-size="normal" data-width="null"></td><td><a><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Organization" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a> | <a onclick="delete_employee('+id+')"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Employee Account" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a> | <a href=""><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Employee Details" data-pt-animate="flipInX" data-pt-size="small"><i class="glyphicon glyphicon-eye-open"></i></span></a></a></td></tr>');

  //      $(function() {
  //   $('#toggle-account').bootstrapToggle({
  //     on: 'Enabled',
  //     off: 'Disabled'
  //   });
  // })

  //   });
  //  }

  function delete_employee(id){
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $.post('delete-employee',{_token:CSRF_TOKEN,id:id},function(data){
    if(data){
      $("#employee-tr"+id).css('background-color','#CE6969');
      $("#employee-tr"+id).hide(2000);
    }
  });
 }
</script>
<!-- end info -->
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
       $.post("admin-email-up",{_token:CSRF_TOKEN,x:x,y:y,id:id},function(data){
        $("#error").html(data);
        document.getElementById("updateEmailform").reset();
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
        //alert(id+"     "+x+"     "+y);
        $.post("admin-pass-up",{_token:CSRF_TOKEN,x:x,y:y,id:id},function(data){
          $("#perror").html(data);
          //$("#updateEmailform").reset();
          document.getElementById("passwordform").reset();
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


      function view_employee(id){
       var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

       $.post("view-single-employee",{_token:CSRF_TOKEN,id:id},function(data){
         $('#view-employee').html(data);
         $('#myModalemployee').modal('show');

       });
     }


     function edit_employee(id){
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

      $.post("edit-single-employee",{_token:CSRF_TOKEN,id:id},function(data){
       $('#edit-employee').html(data);
       $('#myModalpencil').modal('show');

     });
    }

    function edit_employee_detail(id){
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      var a=$("#new_employee_name").val();
      var b=$("#new_employee_phone").val();
      var c=$("#new_employee_address").val();
      var d=$("#new_employee_email").val();
      var e=$("#new_employee_right").val();
      var f=$("#new_employee_user").val();
      var g=$("#new_employee_pass").val();
      
      $.post("edit-detail-employee",{_token:CSRF_TOKEN,id:id,a:a,b:b,c:c,d:d,e:e,f:f,g:g},function(data){
       $('#myModalpencil.close').click();
       $("#name-td"+data).html(a);
       $("#phone-td"+data).html(b);
       $("#email-td"+data).html(d);
       swal("Successfully!", "Employee Details edit Successfully!", "success");


     });

    }
  </script>
  <!-- image cropper -->
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

        $.ajax({
          url: "do-crop",
          type: "post",
          data: {_token:CSRF_TOKEN,"image":resp},
          success: function (data) {
            html = '<img src="'+resp+'"/>';        
            $("#upload-demo-i").html(html);
            html = '<img class="img-responsive avatar-view image" src="uploads/admin_img/'+data+'" alt="Avatar" title="Change the avatar">  ';  
            $("#img-div").html(html);
            //alert(data);
            $("#mymodalimg .close").click();

          }
        });
      });
    });

    
  </script>


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
  .admin-img{
    padding-bottom: 3%;
  }
  .admin-text{
    padding-top: 2%;
    padding-left: 6%;
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


@endsection

