@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Organization Type Preview <i class="fa fa-building-o"></i></h3>
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
            <h2 style="font-family:'italic',bold">All Types of Organization<small style="font-family:'italic',bold">Here... </small></h2>
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
           <form action="delete-check-types" method="post" enctype="multipart/form-data">
           @csrf
           @if (session()->has('success'))
           <script type="text/javascript">
            swal("Deleted!", "Your Company Type has been deleted.", "success");
            
           </script>
            @endif
           <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action responsive no-wrap" style="width:100%">
            <thead>
              <tr id="type-tr">
                 <th><input type="checkbox" id="select-all" class="flat"> Select All </th>  
                 <th>Type Name</th>                
                 <th>Action</th>
             </tr>
           </thead>
           <tbody>
            <!-- <tr id="type-tr"></tr> -->
            @foreach($types as $types)
            <tr id="type-tr{{$types->company_type_id}}"> 
               <th><input type="checkbox" id="check_all[]" name="check_all[]" class="flat" value="{{$types->company_type_id}}"></th> 
               <td id="type-td{{$types->company_type_id}}">{{$types->company_type_name}}</td>
               <td><a onclick="update_type('{{$types->company_type_name}}','{{$types->company_type_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update this Organization type" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a> | <a onclick="delete_type('{{$types->company_type_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete This Organization Type" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a></td>   
           </tr>
           @endforeach
           
         </tbody>
         <tfoot>
          <tr>
             <td colspan="3">
            <?php  $query=DB::table('company_types')->get()->count();
                    if($query>0) {?>
              <button type="submit" class="btn btn-success">Delete</button>
            <?php } ?>
             
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add New Type?</button>
             </td>
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
<!--model-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form id="type_form">
     <!--  @csrf -->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD New Company Type</h4>
        <div class="col-sm-6 col-md-offset-4" id="loading-spin">
          <i id="i" style="font-size:100px"></i>
        </div>
        <div class="col-sm-6 col-md-offset-4" id="loading-true">
          <i id="tru" style="font-size:100px; color: #38b75e"></i>
        </div>
      </div>
      <div class="modal-body" id="modal-content">

        <label>Company Type:</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-yelp"></i>
          </div>
          <input type="text" placeholder="Enter New Type" class="form-control" name="add_company_type" id="add_company_type">
        </div>
        
        <!-- <i class="fa fa-spinner fa-spin" style="font-size:24px"></i> --> 

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="btn-type" type="button" class="btn btn-default" onclick="company_type_addingTable();">ADD</button>
        </div>
      </div>

    </div>
  </form>

</div>
</div>
<!--/model-->
<!--update model-->
<div id="type_view"></div>
<!--/end update model-->
<script type="text/javascript">
  
function update_type(name,id){
 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$.post("request-update-type",{_token:CSRF_TOKEN,name:name,id:id},function(data){
      $("#type_view").html(data);
      $("#myModal3").modal('show');
    });
}
  function edit_type(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var type=$("#up_company_type").val();
    var id=$("#type_id").val();
    $.post("update-type",{_token:CSRF_TOKEN,type:type,id:id},function(data){
      if(data){
      $("#myModal3").modal('hide');
      $("#type-td"+id).html(type);
       var originalColor = $("#type-tr"+id).css("background-color");
      $("#type-tr"+id).css("background",'#d8d8d8');
      setTimeout(function(){
        $("#type-tr"+id).css("background",originalColor);
      },2000);
      }
    });
  }

</script>

@endsection

