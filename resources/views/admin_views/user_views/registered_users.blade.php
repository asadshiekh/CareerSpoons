@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Organization Preview <i class="fa fa-building-o"></i></h3>
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
            <h2 style="font-family:'italic',bold">All Registed User's<small style="font-family:'italic',bold">Here... </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class=""><i class="fa fa-dashboard"></i></a>
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

            <p class="text-muted font-13 m-b-30">

            </p>
            <table id="register-user-table" class="table table-striped table-bordered bulk_action responsive no-wrap" style="width: 100%">
              <thead>
                <tr>
                 <th><input type="checkbox" id="check-all" class="flat"> Select All </th>  
                 <th>Full Name</th>
                 <th>Email</th>
                 <th>Phone No</th>
                 <th>Current Status</th> 
                 <th>Change Status</th>               
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
              @foreach($all_users as $all)
              <tr id="user-tr{{$all->id}}"> 
               <th><input type="checkbox" id="check-all" class="flat"></th> 
               <td>{{$all->candidate_name}}</td>
               <td>{{$all->user_email}}</td>
               <td>{{$all->phone_number}}</td>
               <td id="status-td{{$all->id}}">
                <?php if($all->user_activation_status == "1"){
                 echo "Active";
               }else{
                echo "Block";
              }?>
            </td>
            <td>
              <select name="selected_status" id="selected_status" onchange="change_user_status(this.value,'{{$all->id}}');">
                <option hidden="hidden" disabled="disabled" selected="selected">Select Status</option>
                <option value="1">Active</option>
                <option value="0">Block</option>
              </select>
            </td>
            <td><a type="button" onclick="delete_single_user('{{$all->id}}')"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete User" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i><span></span></a> | <a type="button" onclick="view_user('{{$all->id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View User Details" data-pt-animate="flipInX" data-pt-size="small"><i class="glyphicon glyphicon-eye-open"></i></span></a></a></td>
          </tr>
          @endforeach

        </tbody>
      </table>

      <!-- End Content-->


    </div>
  </div>
</div>
</div>
</div>
</div>
<!--model-->
<div id="view_user_model"></div>
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

<!-- <script type="text/javascript">
  function view_full_page(id){
  var x =id;
  $.get('organization-profile',{x:x},function(data){ 
  
   // window.location.replace('/');
  
  });

  }
</script> -->
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
</style>
<script>
 function change_user_status(x,id){
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $.post('change-user-status',{_token:CSRF_TOKEN,x:x,id:id},function(data){
        if(data){
          if(x == "0"){
            $("#status-td"+id).html("Block");
           swal("Oops", "Account Blocked.", "error");
         }else{
           $("#status-td"+id).html("Active");
           swal("Success", "Account Activated.", "success");
         }
        
       }

 });
 }

</script>
@endsection




