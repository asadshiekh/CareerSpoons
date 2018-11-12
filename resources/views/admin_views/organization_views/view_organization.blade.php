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
        <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">

        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2 style="font-family:'italic',bold">All Registed Organization<small style="font-family:'italic',bold">Here... </small></h2>
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
           <form action="delete-check-org" method="post" enctype="multipart/form-data">
            @csrf
            @if (session()->has('success'))
           <script type="text/javascript">
            swal("Deleted!", "Your Organization has been deleted.", "success");
           </script>
            @endif
           <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
            <thead>
              <tr>
                 <th><input type="checkbox" id="select-all" class="flat"> Select All </th>  
                 <th>Company Name</th>
                 <th>Company Type</th>
                 <th>Email</th>
                 <th>Phone No</th>
                 <th>Industry</th>                
                 <th>Action</th>
             </tr>
           </thead>
           <tbody>
            @foreach($organizations as $organizations)
            <tr id="org-tr{{$organizations->company_id}}"> 
               <th><input type="checkbox" name="check_all_org[]" class="flat" value="{{$organizations->company_id}}"></th> 
               <td>{{$organizations->company_name}}</td>
               <td>{{$organizations->company_type}}</td>
               <td>{{$organizations->company_email}}</td>
               <td>{{$organizations->company_phone}}</td>
               <td>{{$organizations->company_industry}}</td>
               <td><a href=""><i class="fa fa-pencil"></i></a> | <a onclick="delete_org('{{$organizations->company_id}}');"><i class="fa fa-trash"></i></a> | <a href="organization-profile/{{$organizations->company_id}}"><i class="glyphicon glyphicon-eye-open"></i></a></a></td>
           </tr>
           @endforeach
           
         </tbody>
          <tfoot>
          <tr>
             <td colspan="7">
              <?php  $query=DB::table('Add_organizations')->get()->count();
                    if($query>0) {?>
              <button type="submit" class="btn btn-success">Delete</button>
              <?php }?>
           
             <!-- 
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal1">Add New City?</button> -->
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
<script type="text/javascript">
function delete_org(o){
  var result = confirm("Really want to delete this Organization?");
  if(result){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $.post("delete-org",{_token:CSRF_TOKEN,o:o},function(data){ 

    if(data){
      $("#org-tr"+o).css('background-color','Crimson');
      $("#org-tr"+o).hide(3000);
    }
    });
 }

}

</script>

@endsection

  


