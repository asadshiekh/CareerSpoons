  @extends('admin_views.template.master')
  @section('content')
  <!-- page content -->


  <div class="right_col" role="main">
    <div class="">
      <div class="row top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-group"></i></div>
            <div class="count" style="font-family: georgia;">179</div>
            <h3 style="font-family: georgia;font-size: 16px;">Registered Users</h3>
            
          </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-tree"></i></div>
            <div class="count" style="font-family: georgia;">{{$total_org}}</div>
            <h3 style="font-family: georgia;font-size: 16px;">Registered Organization</h3>
            
          </div>
        </div>
    
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
            <div class="count" style="font-family: georgia;">179</div>
            <h3 style="font-family: georgia;font-size: 16px;">Website Viewer</h3>
            
          </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-smile-o"></i></div>
            <div class="count" style="font-family: georgia;">179</div>
            <h3 style="font-family: georgia;font-size: 16px;">New Sign ups</h3>
            
          </div>
        </div>
      </div>

      </div>
    </div>
    
      
  <!-- /page content -->
  @endsection