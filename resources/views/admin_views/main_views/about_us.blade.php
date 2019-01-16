@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Preview <i class="fa fa-building-o"></i></h3>
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
            <h2 style="font-family:'italic',bold">All About Us Settings<small style="font-family:'italic',bold"> Here... </small></h2>
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
            <div class="box-header">
                <h3 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace; padding: 4%;">Manage About Us</h3>
              </div>


            <!-- Start Content-->
            <form id="about" enctype="multipart/form-data">
              <div class="form-group col-sm-12 col-md-8 col-md-offset-2">
              <label>Qoutation About Our Project:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-asterisk"></i>
                </div>
                <input type="text" class="form-control" name="qoute" id="qoute" placeholder="Enter Qoutation">
              </div>
            </div>
            <div class="form-group col-sm-12 col-md-8 col-md-offset-2">
              <label>Address:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-crosshairs"></i>
                </div>
                <input type="text" class="form-control" name="address" id="address" placeholder="Enter Qoutation">
              </div>
            </div>
            <div class="form-group col-sm-12 col-md-8 col-md-offset-2">
              <label>Email:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope-o"></i>
                </div>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Qoutation">
              </div>
            </div>
            <div class="form-group col-sm-12 col-md-8 col-md-offset-2">
              <label>Phone No:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-headphones"></i>

                </div>
                <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Qoutation">
              </div>
            </div>
            <div class="form-group col-sm-12 col-md-8 col-md-offset-2">
              <label>Upload Video:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-file-video-o"></i>

                </div>
                <input type="file" class="form-control" name="video" id="video" placeholder="Enter Qoutation">
              </div>
            </div>
            <div class="form-group col-sm-12 col-md-4 col-md-offset-4">
              
              <div class="input-group">
               <input type="button" class="btn btn-success" name="about_btn" onclick="about_us_content();" value="update">
              </div>
            </div>
            </form>

            
           <!-- End Content -->


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

</script>
@endsection




