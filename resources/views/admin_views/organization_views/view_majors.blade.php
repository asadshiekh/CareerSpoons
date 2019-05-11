@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Majors Preview <i class="fa fa-building-o"></i></h3>
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
            <h2 style="font-family:'italic',bold">Majors <small style="font-family:'italic',bold">Here... </small></h2>
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
                <p class="text-muted font-13 m-b-30">

                </p>
                <form action="delete-check-majors" method="post" enctype="multipart/form-data">
                 @csrf
                 @if (session()->has('success'))
                 <script type="text/javascript">
                  swal("Deleted!", "Your Selected Fields has been deleted.", "success");
                </script>
                @endif

                <table id="functionalMajorAreaTable" class="table table-striped table-bordered bulk_action responsive no-wrap" style="width: 100%">

                  <thead>
                    <tr id="major-tr">
                     <th><input type="checkbox" id="select-all" class="flat"> Select All </th>  
                     <th>Majors Title</th> 
                     <th>Functional Area</th>               
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody>
                  @foreach($all_majors as $all_majors)
                  <tr id="major-tr{{$all_majors->major_id}}"> 
                   <th><input type="checkbox" name="check_all[]" class="flat" value="{{$all_majors->major_id}}"></th> 
                   <td id="major-td{{$all_majors->major_id}}">
                    <?php
                      
                      $all_majors->major_title= str_replace("_"," ",$all_majors->major_title);
                      echo $all_majors->major_title;
                    ?></td>
                   <td id="area-td{{$all_majors->major_id}}">
                    <?php
                    
                    $all_majors->area_title= str_replace("_"," ",$all_majors->area_title);
                    echo $all_majors->area_title;
                    ?></td>
                   <td><a onclick="update_major('{{$all_majors->major_title}}','{{$all_majors->area_title}}','{{$all_majors->major_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Major" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a> | <a onclick="delete_major('{{$all_majors->major_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Major" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a></td>

                 </tr>
                 @endforeach
               </tbody>
               


               <tfoot>
                <tr>
                 <td colspan="4">
                   <?php $query=DB::table('Add_major')->get()->count();
                   if($query>0) {?>
                    <button type="submit" class="btn btn-success">Delete</button>
                  <?php } ?>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalmajor">Add New Major?</button>
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
<!-- Modal window for add City-->
<div id="myModalmajor" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form id="form_add_majors">
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
        <div class="form-group">
        <label>Select functional area:</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-building-o"></i>
          </div>
          <select name="req_functional_area" class="form-control" placeholder="Select Functional Area" id="req_functional_area">
            <option value="" disabled="disabled" selected="selected">Select Your functional area</option>
            @foreach($all_area as $all_area)
            <option value="{{$all_area->area_title}}">
            <?php
              
              $all_area->area_title= str_replace("_"," ",$all_area->area_title);
              echo $all_area->area_title;
            ?></option>
            @endforeach

          </select>
        </div>
      </div>
      <div class="form-group">
        <label>ADD Major title:</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-yelp"></i>
          </div>
          <input type="text" placeholder="Enter Major here" class="form-control" name="add_major" id="add_major">
        </div>
      </div>
        
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

<script type="text/javascript">

  function update_major(name,area,id){
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $.post("request-update-major",{_token:CSRF_TOKEN,name:name,area:area,id:id},function(data){
    $("#major_view").html(data);
    $("#myModal5").modal('show');
  });
 }
 function edit_major(){

   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var major=$("#up_m_name").val();
   var u_area=$("#u_functional_area").val();
   var id=$("#major_id").val();
   $.post("update-major",{_token:CSRF_TOKEN,major:major,id:id,u_area:u_area},function(data){
    if(data){
      $("#myModal5").modal('hide');
      swal("success","Successfully Updated","success");
      $("#major-td"+id).html(major);
      $("#area-td"+id).html(u_area);
      var originalColor = $("#major-tr"+id).css("background-color");
      $("#major-tr"+id).css("background",'#d8d8d8');
      setTimeout(function(){
        $("#major-tr"+id).css("background",originalColor);
      },2000);
    }
  });
 }
 function major_adding(){
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var add_major = $("#add_major").val();
   var area = $("#req_functional_area").val();
   
   var c_major ="'"+add_major+"'";
   var c_area ="'"+area+"'";
   $.post('addtable-major-type',{_token:CSRF_TOKEN,add_major:add_major,area:area},function(data){
     if (data) {
      var id ="'"+data+"'";
      $("#major-tr").after('<tr id="major-tr'+data+'"><th><input type="checkbox" name="check_all[]" value="'+data+'" class="flat"></th><td id="major-td'+data+'">'+add_major+'</td><td id="area-td'+data+'">'+area+'</td><td><a onclick="update_major('+c_major+','+c_area+','+id+');"><i class="fa fa-pencil"></i></a> | <a onclick="delete_major('+id+');"><i class="fa fa-trash"></i></a></td></tr>');
      document.getElementById("form_add_majors").reset();
      $("#myModalmajor .close").click();

      setTimeout(
       function(){
        swal("Successfully Added!", "Major qualification Added Successfully in Your DataBase!", "success");
      },
      1000
      );
    }
  });
 }

</script>
@endsection

