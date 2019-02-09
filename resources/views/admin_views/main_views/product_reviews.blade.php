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
            <h2 style="font-family:'italic',bold">All Contact Requests<small style="font-family:'italic',bold">Here... </small></h2>
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
          <div class="x_content" style="min-height:500px;">


            <!-- Start Content-->

            <p class="text-muted font-13 m-b-30">

            </p>
           <form>
              <div class="form-group col-sm-12 col-md-8 col-md-offset-2">
              <label>Choose Reviews:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-asterisk"></i>
                </div>
                <select id="choose_review" name="choose_review" class="form-control" onchange="do_change(this.value);">
                  <option value="candidates">Candidates</option>
                  <option value="organizations">Oragizations</option>
                </select>
              </div>
            </div>
           </form>
          <p class="text-muted font-13 m-b-30" style="font-size: 20px;font-weight: 400;font-family: Georgia,Regular;margin-bottom: 2%;margin-top: 3%;">
           Reviews
            </p>
          <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
              <thead>
                <tr> 
                 <th>Name</th>
                 <th>Email</th>
                 <th>Phone No</th>
                 <th>Reply Status</th>               
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
            <tr> 
            
               <td></td>
               <td></td>
               <td></td>
               <td></td>
           
            <td><a type="button"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Message" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a> | <a type="button"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Reply" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a></td>
          </tr>
          

        </tbody>
      </table>

    
      <!--  -->
    
      <!-- End Content-->


    </div>
  </div>
</div>
</div>
</div>
</div>
<!--model-->
<div id="model_view_message"></div>
<div id="model_reply_message"></div>
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

<script>
function do_change(x){
  alert(x);
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post("do-fetch-reviews",{_token:CSRF_TOKEN,x:x},function(data){
    alert(data);

});
}
</script>
@endsection




