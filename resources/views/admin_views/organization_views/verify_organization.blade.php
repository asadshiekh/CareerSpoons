@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Qualification Preview <i class="fa fa-building-o"></i></h3>
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
            <h2 style="font-family:'italic',bold">Qualification <small style="font-family:'italic',bold">Here... </small></h2>
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
          <div class="x_content" id="showing">


            <!-- Start Content-->
            <div class="row">
              <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1">
                <p class="text-muted font-13 m-b-30">

                </p>
                <form action="delete-check-qual" method="post" enctype="multipart/form-data">
                 @csrf
                
              
                <table id="myQual" class="table table-striped table-bordered bulk_action responsive no-wrap" style="width: 100%">

                  <thead>
                    <tr id="qual-tr"> 
                     <th>Organization Name</th>                
                     <th>Document</th>
                     <th>Current Status</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                <tbody>
            @foreach($orgs as $vals)  
            <tr> 
               <td style="text-align: center;">{{$vals->company_name}}</td>
               <td style="text-align: center;"><?php  

               $a = $vals->company_document;

                if (strpos($a, '.') !== false) {?>
                    
                  <a href="{{url('uploads/organization_documents')}}/{{$vals->company_document}}" target="_blank"><img src="{{url('uploads/organization_documents')}}/{{$vals->company_document}}" height="50px" width="40px"></a>
               <?php }else{
                     echo $vals->company_document;
                }
              ?></td>
               <td style="text-align: center;" id="tr-org{{$vals->company_id}}"><?php if($vals->company_verify_status == "0"){
                echo "<span style='color:red;'>Unverify</span>";
              }else{
                 echo "<span style='color:green;'>Verify</span>";
              } ?></td>
              <td>
                <select class="form-control" onchange="change_OrgState_verify(this.value,'{{$vals->company_id}}');">
                <option hidden selected value="<?php if($vals->company_verify_status == "0"){
                echo "0";
              }else{
                 echo "1";
              } ?>"><?php if($vals->company_verify_status == "0"){
                echo "Unverify";
              }else{
                 echo "Verify";
              } ?></option>
                <option value="1">Verify</option>
                <option value="0">UnVerify</option>
                </select>
            </td>
           </tr>
           @endforeach
          
                </tbody>
           
                 
               <tfoot>
                <tr>
                 
              </tr>
            </tfoot>

          </table>

          
        </form>
      </div>
    </div>
    <!-- End Content-->


  </div>
</div>
</div>
</div>
</div>
</div>

<!-- Modal window for update City-->
<div id="qual_view">
  
</div>
<!--/End model window -->

<script type="text/javascript">
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  function change_OrgState_verify(x,ids){
    // alert(ids);
    $.post("admin-change-OrgState",{_token:CSRF_TOKEN,x:x,ids:ids},function(data){
     // alert(data);
     if(data == "0"){
     $("#tr-org"+ids).html("<span style='color:red;'>UnVerify</span>");
     swal("success","Status Unverified","success");
      }else{
      $("#tr-org"+ids).html("<span style='color:green;'>Verify</span>");
       swal("success","Status Verified","success");
      }
    });
  }
</script>
@endsection

