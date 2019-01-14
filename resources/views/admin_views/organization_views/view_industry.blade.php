@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Organization Indutries Preview <i class="fa fa-building-o"></i></h3>
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
            <h2 style="font-family:'italic',bold">All Industries <small style="font-family:'italic',bold">Here... </small></h2>
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
          <form action="delete-check-industries" method="post" enctype="multipart/form-data">
           @csrf
           
           @if (session()->has('success'))
           <script type="text/javascript">
            swal("Deleted!", "Your industries has been deleted.", "success");
           </script>
            @endif
           <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
            <thead>
              <tr id="industry-tr">
                 <th><input type="checkbox" id="select-all" class="flat"> Select All </th>  
                 <th>Industry Name</th>                
                 <th>Action</th>
             </tr>
           </thead>
           <tbody>
            <!-- <tr id="industry-tr"></tr> -->
            @foreach($industry as $industry)
            <tr id="industry-tr{{$industry->company_industry_id}}"> 
               <th><input type="checkbox" name="check_all[]" class="flat" value="{{$industry->company_industry_id}}"></th> 
               <td id="indus-td{{$industry->company_industry_id}}">{{$industry->company_industry_name}}</td>
               <td><a onclick="update_industry('{{$industry->company_industry_name}}','{{$industry->company_industry_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Industry" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a> | <a onclick="delete_industry('{{$industry->company_industry_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Industry" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a></td>
             
           </tr>
           @endforeach
           
         </tbody>
         <tfoot>
          <tr>
             <td colspan="3">
              <?php  $query=DB::table('Company_industries')->get()->count();
                    if($query>0) {?>
              <button type="submit" class="btn btn-success">Delete</button>
             <?php }?>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2">Add New industry?</button>
             </td>
           </tr>
         </tfoot>
       </table>
       </form>
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
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form>
     <!--  @csrf -->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Introduced New Industry ?</h4>
        <div class="col-sm-6 col-md-offset-4" id="loading-spin">
          <i id="i" style="font-size:100px"></i>
        </div>
        <div class="col-sm-6 col-md-offset-4" id="loading-true">
          <i id="tru" style="font-size:100px; color: #38b75e"></i>
        </div>
      </div>
      <div class="modal-body" id="modal-content">

        <label>ADD Industry:</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-yelp"></i>
          </div>
          <input type="text" placeholder="Enter Industry Name here" class="form-control" name="add_company_industry" id="add_company_industry">
        </div>
        
        <!-- <i class="fa fa-spinner fa-spin" style="font-size:24px"></i> --> 

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="btn-indus" type="button" class="btn btn-default" onclick="company_industry_addingTable();">ADD</button>
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
  
function update_industry(name,id){
 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$.post("request-update-industry",{_token:CSRF_TOKEN,name:name,id:id},function(data){
      $("#indus_view").html(data);
      $("#myModal3").modal('show');
    });
}
  function edit_industry(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var indus=$("#up_company_indus").val();
    var id=$("#indus_id").val();
    $.post("update-industry",{_token:CSRF_TOKEN,indus:indus,id:id},function(data){
      if(data){
      $("#myModal3").modal('hide');
      $("#indus-td"+id).html(indus);
       var originalColor = $("#industry-tr"+id).css("background-color");
      $("#industry-tr"+id).css("background",'#d8d8d8');
      setTimeout(function(){
        $("#industry-tr"+id).css("background",originalColor);
      },2000);
      }
    });
  }

</script>

@endsection

