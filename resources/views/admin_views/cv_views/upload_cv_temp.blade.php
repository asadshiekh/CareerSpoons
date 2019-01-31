@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Manage CV <i class="fa fa-building-o"></i></h3>
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
            <h2 style="font-family:'italic',bold">Add CV Template <small style="font-family:'italic',bold">Here... </small></h2>
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
              <div class="box-header">
                <h3 class="box-title text-center" id="heading-head" style="font-family:'Courier New', Courier, monospace; padding: 4%;">Manage Resume</h3>
              </div>


            <!-- Start Content-->
            <form action="do-add-resume-temp" method="post" id="about" enctype="multipart/form-data">
              @csrf
              <div class="form-group col-sm-12 col-md-8 col-md-offset-2">
              <label>Title of Resume</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-asterisk"></i>
                </div>
                <input type="text" class="form-control" name="temp_title" id="temp_title" placeholder="Enter Title">
              </div>
            </div>
            <div id="bgg" class="col-md-10 col-sm-12 col-md-offset-1">
          
             <div class="col-md-12 col-sm-12" style="margin-bottom: 3%;">
             <label>Choose your resume template files:</label> 
            </div>
            <div class="col-md-4 col-sm-12">
              <span class="btn btn-success btn-file" style="width: 180px;margin-bottom: 3%;">
                <i id="btn-up">index file</i><input type="file" name="index_file" id="index_file" >
              </span>
            </div>
             <div class="col-md-4 col-sm-12">
              <span class="btn btn-success btn-file" style="width: 180px;margin-bottom: 3%;">
                <i id="btn-css">CSS file</i><input type="file" name="css_file" id="css_file" >
              </span>
            </div>
            <div class="col-md-4 col-sm-12">
              <span class="btn btn-success btn-file" style="width: 180px;margin-bottom: 3%;">
                <i id="btn-baner">Template banner</i><input type="file" name="banner_file" id="banner_file" >
              </span>
            </div>
             </div>


            <div class="form-group col-sm-12 col-md-8 col-md-offset-2">
              <label>Description of Resume:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-crosshairs"></i>
                </div>
                <textarea type="text" class="form-control" name="temp_info" id="temp_info" placeholder="Enter Address"></textarea>
              </div>
            </div>
                        
            
            <div class="form-group col-sm-12 col-md-8 col-md-offset-2">
              <div class="input-group">
               <input type="submit" class="btn btn-success btn-md" value="ADD Resume">
              </div>
            </div>
            </form>

            
           <!-- End Content -->

             </div>
           </div>
    <!-- End Content-->


  </div>
</div>
</div>
</div>
</div>
</div>
<!-- Modal window for add City-->
<div id="myModalmajor" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form>
     <!--  @csrf -->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Major?</h4>
        <div class="col-sm-6 col-md-offset-4" id="loading-spin">
          <i id="i" style="font-size:100px"></i>
        </div>
        <div class="col-sm-6 col-md-offset-4" id="loading-true">
          <i id="tru" style="font-size:100px; color: #38b75e"></i>
        </div>
      </div>
      <div class="modal-body" id="modal-content">
    
        
        <!-- <i class="fa fa-spinner fa-spin" style="font-size:24px"></i> --> 

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" onclick="major_adding();">ADD</button>
        </div>
      </div>

    </div>
  </form>

</div>
</div>
<!--/End model window-->
<!-- Modal window for update City-->
<div id="major_view">

</div>
<!--/End model window -->
<style type="text/css">
#bgg{
  padding: 2%;
  float: left;
  background-color: #F1F2F2;
  margin-bottom: 10px;
}
.btn-file {
  position: relative;
  overflow: hidden;
}
.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;
  background: white;
  cursor: inherit;
  display: block;
}
</style>
     <script type="text/javascript">
    $(function() {

      // We can attach the `fileselect` event to all file inputs on the page
      $(document).on('change', ':file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
      });

      // We can watch for our custom `fileselect` event like this
      $(document).ready( function() {
          $('#index_file').on('fileselect', function(event, numFiles, label) {

              var input = $(this).parents('.input-group').find(':text'),
                  log = numFiles > 1 ? numFiles + ' files selected' : label;

              if( input.length ) {
                  input.val(log);
              } else {
                  //if( log ) alert("yes"+log);
                  $("#btn-up").html(log);
              }

          });
           $('#css_file').on('fileselect', function(event, numFiles, label) {

              var input = $(this).parents('.input-group').find(':text'),
                  log = numFiles > 1 ? numFiles + ' files selected' : label;

              if( input.length ) {
                  input.val(log);
              } else {
                  //if( log ) alert("yes"+log);
                  $("#btn-css").html(log);
              }

          });
            $('#banner_file').on('fileselect', function(event, numFiles, label) {

              var input = $(this).parents('.input-group').find(':text'),
                  log = numFiles > 1 ? numFiles + ' files selected' : label;

              if( input.length ) {
                  input.val(log);
              } else {
                  //if( log ) alert("yes"+log);
                  $("#btn-baner").html(log);
              }

          });
      });
      
    });
     </script>
@endsection

