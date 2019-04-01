@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Organization Orders Preview <i class="fa fa-building-o"></i></h3>
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
            <h2 style="font-family:'italic',bold">All Logo Orders <small style="font-family:'italic',bold">Here... </small></h2>
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
<div class="row">
      <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1">
            <p class="text-muted font-13 m-b-30">
             
           </p>
         
           <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action responsive no-wrap" style="width: 100%">
            <thead>
              <tr id="industry-tr">
                 <th><input type="checkbox" id="select-all" class="flat"> Select All </th>  
                 <th>Company Name</th>                
                 <th>Company Logo</th>
                 <th>Company Logo status</th>
                 <th>Upload logo for advertisement</th>
             </tr>
           </thead>
           <tbody>
            <!-- <tr id="industry-tr"></tr> -->
           @foreach($orders as $orders)
            <tr style="text-align: center;"> 
               <th><input type="checkbox" name="check_all[]" class="flat"></th> 
               <td><?php $org=DB::table('add_organizations')->where(['company_id'=>$orders->company_id])->first();
               echo $name=$org->company_name;
                ?></td>
               <td><img src="{{url('uploads/client_site/company_advertised_logo')}}/{{$orders->company_logo}}" height="60px" width="40px" /></td>
               <td id="state{{$orders->company_advertise_id}}"><?php if($orders->company_logo_status == "0"){echo "<span style='color:red;'>Pending</span>";}else{echo "<span style='color:green;'>Uploaded</span>";} ?></td>
               <td style="text-align:center;" id="btn-state{{$orders->company_advertise_id}}">
                <?php if($orders->company_logo_status == "0"){?>
                <span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -14; bottom 0 5" data-pt-title="Upload company edited logo on main Page of CareerSpoons" data-pt-animate="flipInX" data-pt-size="small"><a class="btn btn-success" onclick="publish_logo('{{$orders->company_advertise_id}}','{{$name}}','{{$orders->company_id}}','{{$orders->company_advertise_id}}');">Publish Logo</a></span>
              <?php }else{ ?>
                <span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -14; bottom 0 5" data-pt-title="logo uploaded on Your site" data-pt-animate="flipInX" data-pt-size="small"><a class="btn btn-success" disabled>Logo Uploaded</a></span>
                <?php  }?>
              </td>
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
</div>
</div>
<!--model-->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form id="logo_form">
     <!--  @csrf -->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Logo?</h4>
        <div class="col-sm-6 col-md-offset-4" id="loading-spin">
          <i id="i" style="font-size:100px"></i>
        </div>
        <div class="col-sm-6 col-md-offset-4" id="loading-true">
          <i id="tru" style="font-size:100px; color: #38b75e"></i>
        </div>
      </div>
      <div class="modal-body" id="modal-content">
      <p>This Logo is uploaded on main page of career Spoons for advertisement</p>
        <label>Upload:</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-yelp"></i>
          </div>
          <input type="file"  class="form-control" name="company_log" id="company_log">
          <input type="hidden"  class="form-control" name="vals" id="vals">
        </div>
        
        <!-- <i class="fa fa-spinner fa-spin" style="font-size:24px"></i> --> 

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" value="cancel">Close</button>
          <button id="button" type="button" class="btn btn-default" value="add">ADD</button>
        </div>
      </div>

    </div>
  </form>

</div>
</div>
<!--/model-->
<!--update model -->
<div id="indus_view">
  
</div>
<!--/end update model -->
<script type="text/javascript">
   //var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  function publish_logo(id,name,c_id,l_id) {
   // alert(name);
   $("#vals").val(name+","+c_id+","+l_id+","+id);
    $("#myModal1").modal("show");
     $("#button").click(function(){
      $g=$("#button").val();
      if($g=="add"){
        //alert("add ha");
        // $.post('upload-logo',{_token:CSRF_TOKEN,name:name,c_id:c_id,l_id:l_id,logo:logo},function(data){
        // alert(data);
        // });
         $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
          //disable the default form submission
          event.preventDefault();
        //grab all form data  
        var formData = new FormData($("#logo_form")[0]);
        $.ajax({
          url: 'upload-logo',
          type: 'POST',
          data: formData,
          async: false,
          cache: false,
          contentType: false,
          processData: false,
          success: function (returndata) {
           
              if(returndata== "yes"){
                swal("Success", "Logo Uploaded and Shown on Main page .", "success");
                $("#myModal1").modal("hide");
                $("#state"+id).html("<span style='color:green;'>Uploaded</span>");
                $("#btn-state"+id).html('<span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -14; bottom 0 5" data-pt-title="logo uploaded on Your site" data-pt-animate="flipInX" data-pt-size="small"><a class="btn btn-success" disabled>Logo Uploaded</a></span>');
              }
           // alert(returndata);
          }
        });
       return false;
      }
    });

  }

</script>

@endsection

