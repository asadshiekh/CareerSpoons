@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3 id="c_name">{{$ad_info->admin_fullname}}</i></h3>
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
                    <span class="img-view">
                     <img class="img-responsive avatar-view image" src="{{url('uploads/organization_images')}}/user.png" alt="Avatar" title="Change the avatar"> 
                   </span>

                   <div class="overlay">
                    <a href="#" data-toggle="modal" data-target="#myModal1" class="icon" title="Edit Picture">
                      <i class="fa fa-pencil"></i>
                    </a>
                  </div>
                </div> 

              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12 profile_left admin-text">
            <!-- <h3 id="typed-strings">nayab</h3> -->
            
            <h3 style="font-size: 18px; font-weight: 400">{{$ad_info->admin_fullname}}</h3>
            

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
               <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">New Employees</a>
               </li>
               <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Account Setting</a>
               </li>
               <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Send Email</a>
               </li>
               <li role="presentation" class=""><a href="#tab_content6" role="tab" id="profile-tab5" data-toggle="tab" aria-expanded="false">Insights</a>
               </li>
             </ul>
             <div id="myTabContent" class="tab-content">

              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <div id="first-part">
                  <div class="box-header">
                    <h3 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace">Personal Information</h3>
                  </div>
                  <!-- swall atart  -->
                  @if (session()->has('success'))
                  <script type="text/javascript">
                    swal("success!", "Your information is successfully Updated.", "success");
                  </script>
                  @endif
                  <!-- swall end -->
                  <ul class="list-unstyled" id="job-detail-des">
                    <li><span>Full Name:</span>{{$ad_info->admin_fullname}}</li>
                    <li><span>Right:</span>{{$ad_info->account_right}}</li>
                    <li><span>Phone:</span>{{$ad_info->admin_phone}}</li>
                    <li><span>Address:</span>{{$ad_info->admin_address}}</li>
                    <li><span>Email:</span>{{$ad_info->admin_email}}</li>
                    <li><span>last updated Date and time:</span>{{$ad_info->updated_at}}</li>
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
                      <input type="text" class="form-control" name="employee_email" id="employee_email" >
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
                     <th>Account</th>            
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody>
                  <!-- <tr id="employee-tr"></tr> -->
                  @foreach($em_info as $em_info)
                  <tr id="employee-tr{{$em_info->account_id}}" class="employee-tr"> 
                   <th><input type="checkbox" name="check_all_org[]" class="flat" value="{{$em_info->account_id}}"></th> 
                   <td id="{{$em_info->account_id}}">{{$em_info->admin_fullname}}</td>
                   <td id="{{$em_info->account_id}}">{{$em_info->admin_phone}}</td>
                   <td id="{{$em_info->account_id}}">{{$em_info->admin_email}}</td>
                   <td>
                    <?php if($em_info->account_activation == 'true'){?>
                    <input type="checkbox" id="toggle-account" data-toggle="toggle" data-on="Active" data-off="Block" data-size="normal" data-width="null" checked>
                  <?php }else if($em_info->account_activation == 'false'){ ?>
                    <input type="checkbox" id="toggle-account" data-toggle="toggle" data-on="Active" data-off="Block" data-size="normal" data-width="null"  data-offstyle="danger">
                  <?php }?>
                  </td>

                    <td><a><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Organization" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a> | <a onclick="delete_employee('{{$em_info->account_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Employee Account" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a> | <a href=""><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Employee Details" data-pt-animate="flipInX" data-pt-size="small"><i class="glyphicon glyphicon-eye-open"></i></span></a></a></td>
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
                  <h3 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace">UPDATE ACCOUNT</h3>
                </div>
                <div class="box-body">



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
        <input type="hidden" name="id" value="{{$ad_info->account_id}}">
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
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="upload-org-img/" method="post" enctype="Multipart/form-data">
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

<!-- end div-->

<script type="text/javascript">
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
function account(){
  // var x=$('#toggle-account').bootstrapToggle();
  alert("x");
}
  
   $(function() {
    $('#toggle-account').change(function() {
      //$('#console-event').html('Toggle: ' + $(this).prop('checked'))
      //alert("yes");
      var x=$(this).prop('checked');
      alert(x);
    });
  });

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

