@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form <small>Sessions</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Smart Wizard -->
            <p>form for data.</p>      
            <form class="form-horizontal form-label-left" id="full-form">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Full Name <span class="required">*</span>
                </label>
                <div class="col-md-3 col-sm-3 col-xs-6">
                  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Enter First Name Here">

                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                  <input type="text" id="last-name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Enter Last Name Here">

                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div id="selected-gender" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                      <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                    </label>
                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                      <input type="radio" name="gender" value="female"> Female
                    </label>
                  </div>
                </div>
              </div>
             

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image <span class="required">*</span>
                </label>
                <div class="col-md-3 col-sm-3 col-xs-6">
                  <input type="file" id="img" required="required" class="form-control col-md-7 col-xs-12" placeholder="Enter First Name Here">

                </div>

              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button type="button" class="btn btn-primary">Cancel</button>
                  <button class="btn btn-primary" type="reset">Reset</button>
                  <button type="button" class="btn btn-success" onclick="lala();">Submit</button>
                </div>
              </div>

            </form>



            <!-- End SmartWizard Content -->



          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->


  <script type="text/javascript">
    function lala(){


      alert("yes");
    

    }
  </script>



  @endsection