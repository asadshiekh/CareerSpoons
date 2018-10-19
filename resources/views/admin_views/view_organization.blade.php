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
            <h2 style="font-family:'italic',bold">All Registed Organization<small style="font-family:'italic',bold">Here... </small></h2>
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
           <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
            <thead>
              <tr>
                 <th><input type="checkbox" id="check-all" class="flat"> Select All </th>  
                 <th>Company Name</th>
                 <th>Company Type</th>
                 <th>Email</th>
                 <th>Phone No</th>
                 <th>Industry</th>                
                 <th>Action</th>
             </tr>
           </thead>
           <tbody>
            <tr> 
               <th><input type="checkbox" id="check-all" class="flat"></th> 
               <td>Donna Snider</td>
               <td>Customer Support</td>
               <td>New York</td>
               <td>27</td>
               <td>2011/01/25</td>
               <td>$112,000</td>
           </tr>
           
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


@endsection

