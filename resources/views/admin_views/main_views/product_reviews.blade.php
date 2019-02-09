@extends('admin_views.template.master')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Product Review's<i class='far fa-star'></i></h3>
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
            <h2 style="font-family:'italic',bold">Porduct Review<small style="font-family:'italic',bold"> Here... </small></h2>
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
                
             </div>


            <!-- Start Content-->              
            <div class="form-group col-sm-12 col-md-8 col-md-offset-2" style="margin-bottom:5%">
              <label>Choose Category:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-asterisk"></i>
                </div>
                <select name="selected_company_type" class="form-control" id="selected_review_type">
                	<option value="" hidden disabled="disabled" selected="selected">Choose Review</option>
                	<option value="">Candidate Review's</option>
                	<option value="">Organization Review's</option>
                </select>
              </div>
            </div>

            <div class=""></div>


            




@endsection
