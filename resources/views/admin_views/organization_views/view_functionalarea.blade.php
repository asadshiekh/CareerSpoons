@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Functional Area Preview <i class="fa fa-building-o"></i></h3>
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
            <h2 style="font-family:'italic',bold">Functional Area Add and View<small style="font-family:'italic',bold">Here... </small></h2>
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
                <form action="delete-check-area" method="post" enctype="multipart/form-data">
                 @csrf
                 @if (session()->has('success'))
                 <script type="text/javascript">
                  swal("Deleted!", "Your Selected Fields has been deleted.", "success");
                </script>
                @endif

                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">

                  <thead>
                    <tr id="area-tr">
                     <th><input type="checkbox" id="select-all" class="flat"> Select All </th>  
                     <th>functional Area</th>                
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody>
                   @foreach($all_area as $all_area)
                   <tr id="area-tr{{$all_area->area_id}}"> 
                     <th><input type="checkbox" name="check_all[]" class="flat" value="{{$all_area->area_id}}"></th> 
                     <td id="area-td{{$all_area->area_id}}">{{$all_area->area_title}}</td>
                     <td><a onclick="update_area('{{$all_area->area_title}}','{{$all_area->area_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Functional area" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a> | <a onclick="delete_area('{{$all_area->area_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Functional area" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a></td>

                   </tr>
                   @endforeach

                 </tbody>

                 
                 <tfoot>
                  <tr>
                   <td colspan="3">
                     <?php $query=DB::table('Add_functionalarea')->get()->count();
                     if($query>0) {?>
                      <button type="submit" class="btn btn-success">Delete</button>
                    <?php } ?>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalarea">Add New Functional Area?</button>
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
<div id="myModalarea" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form>
     <!--  @csrf -->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Functional Area ?</h4>
        <div class="col-sm-6 col-md-offset-4" id="loading-spin">
          <i id="i" style="font-size:100px"></i>
        </div>
        <div class="col-sm-6 col-md-offset-4" id="loading-true">
          <i id="tru" style="font-size:100px; color: #38b75e"></i>
        </div>
      </div>
      <div class="modal-body" id="modal-content">

        <label>ADD Functional Area:</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-yelp"></i>
          </div>
          <input type="text" placeholder="Enter functional area here" class="form-control" name="add_area" id="add_area">
        </div>
        
        <!-- <i class="fa fa-spinner fa-spin" style="font-size:24px"></i> --> 

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" onclick="area_adding();">ADD</button>
        </div>
      </div>

    </div>
  </form>

</div>
</div>
<!--/End model window-->
<!-- Modal window for update City-->
<div id="area_view">

</div>
<!--/End model window -->

<script type="text/javascript">
function update_area(name,id){
 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$.post("request-update-area",{_token:CSRF_TOKEN,name:name,id:id},function(data){
      $("#area_view").html(data);
      $("#myModal6").modal('show');
    });
}
function edit_area(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var area=$("#up_area").val();
    var id=$("#area_id").val();
    $.post("update-area",{_token:CSRF_TOKEN,area:area,id:id},function(data){
      if(data){
      $("#myModal6").modal('hide');
      $("#area-td"+id).html(area);
       var originalColor = $("#area-tr"+id).css("background-color");
      $("#area-tr"+id).css("background",'#84D285');
      setTimeout(function(){
        $("#area-tr"+id).css("background",originalColor);
      },2000);
      }
    });
  }
  function area_adding(){
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var add_area = $("#add_area").val();
   var c_area ="'"+add_area+"'";
   $.post('addtable-area-type',{_token:CSRF_TOKEN,add_area:add_area},function(data){
    var id ="'"+data+"'";
     if (data) {
       $("#area-tr").after('<tr id="area-tr'+data+'"><th><input type="checkbox" name="check_all[]" value="'+data+'" class="flat"></th><td id="area-td'+data+'">'+add_area+'</td><td><a onclick="update_area('+c_area+','+id+');"><i class="fa fa-pencil"></i></a> | <a onclick="delete_area('+id+');"><i class="fa fa-trash"></i></a></td></tr>');
       $("#myModalarea .close").click();

       setTimeout(
         function(){

          swal("Successfully Added!", "Functional Area Added Successfully in Your DataBase!", "success");
        },
        1000
        );
     }
   });
 }

</script>
@endsection

