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
           

         <!-- <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">

                  <thead>
                    <tr id="qual-tr">
                     <th><input type="checkbox" id="select-all" class="flat"> Select All </th>  
                     <th>Qualification Title</th>                
                     <th>Action</th>
                   </tr>
                 </thead>
                <tbody>
            <tr id="qual-tr"> 
               <th><input type="checkbox" name="check_all[]" class="flat" value=""></th> 
               <td id="qual-td">yes</td>
               <td><a><i class="fa fa-pencil"></i></a> | <a><i class="fa fa-trash"></i></a></td>
             
           </tr>
                </tbody>
           
             
          </table>
 -->
            <!-- End SmartWizard Content -->


<table id="myEduction" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>



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