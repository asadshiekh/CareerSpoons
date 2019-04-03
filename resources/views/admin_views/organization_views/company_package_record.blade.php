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
                 <th>Company Name</th>                
                 <th>Company Logo</th>
                 <th>Package Id</th>
                 <th>Package Number</th>
                 <th>Package Start Date</th>
                 <th>Package End Date</th>
             </tr>
           </thead>
           <tbody>
            <!-- <tr id="industry-tr"></tr> -->
            <?php if($records->count() === 0){
              echo "<span style='color:red;'>No Record Found</span>";
            }else{ ?>
           @foreach($records as $records)
            <tr style="text-align: center;"> 
               <td><?php $na=DB::table("add_organizations")->where(['company_id'=>$records->company_id])->first();
               echo $name=$na->company_name;
                ?></td>
                <td><img src="{{url('uploads/company_add_logo/')}}/{{$records->company_logo}}" height="30px" /></td>
               <td><?php $nam=DB::table("company_packages")->where(['package_id'=>$records->package_id])->first();
               echo $nam->package_name;
                ?></td>
               <td>{{$records->company_package_number}}</td>
               <td>{{$records->package_start_date}}</td>
               <td>{{$records->package_end_date}}</td>
           </tr>
           @endforeach
           <?php } ?>
           
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


@endsection

