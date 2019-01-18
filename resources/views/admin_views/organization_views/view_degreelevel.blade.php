@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Degree levels Preview <i class="fa fa-building-o"></i></h3>
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
            <h2 style="font-family:'italic',bold">Degre Levels Add and View <small style="font-family:'italic',bold">Here... </small></h2>
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
                <form action="delete-check-degrees" method="post" enctype="multipart/form-data">
                 @csrf
                 @if (session()->has('success'))
           <script type="text/javascript">
            swal("Deleted!", "Your Degrees has been deleted.", "success");
           </script>
            @endif
              
                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">

                  <thead>
                    <tr id="degree-tr">
                     <th><input type="checkbox" id="select-all" class="flat"> Select All </th>  
                     <th>Degree Level</th>                
                     <th>Action</th>
                   </tr>
                 </thead>
                <tbody>
                @foreach($all_degree as $all_degree)
            <tr id="degree-tr{{$all_degree->degree_id}}"> 
               <th><input type="checkbox" name="check_all[]" class="flat" value="{{$all_degree->degree_id}}"></th> 
               <td id="degree-td{{$all_degree->degree_id}}">{{$all_degree->degree_title}}</td>
               <td><a onclick="update_degree('{{$all_degree->degree_title}}','{{$all_degree->degree_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Degree" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a> | <a onclick="delete_degree('{{$all_degree->degree_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Degree" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a></td>
             
           </tr>
           @endforeach
                </tbody>
           
                 
               <tfoot>
                <tr>
                 <td colspan="3">
                   <?php $query=DB::table('Add_degreelevel')->get()->count();
                   if($query>0) {?>
                    <button type="submit" class="btn btn-success">Delete</button>
                  <?php } ?>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModaldegree">Add New Degree Level?</button>
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
<div id="myModaldegree" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form id="degree_form">
     <!--  @csrf -->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Degree level ?</h4>
        <div class="col-sm-6 col-md-offset-4" id="loading-spin">
          <i id="i" style="font-size:100px"></i>
        </div>
        <div class="col-sm-6 col-md-offset-4" id="loading-true">
          <i id="tru" style="font-size:100px; color: #38b75e"></i>
        </div>
      </div>
      <div class="modal-body" id="modal-content">

        <label>ADD Degree Level:</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-yelp"></i>
          </div>
          <input type="text" placeholder="Enter Degree Level here" class="form-control" name="add_degree" id="add_degree">
        </div>
        
        <!-- <i class="fa fa-spinner fa-spin" style="font-size:24px"></i> --> 

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" onclick="degree_adding();">ADD</button>
        </div>
      </div>

    </div>
  </form>

</div>
</div>
<!--/End model window-->
<!-- Modal window for update City-->
<div id="degree_view">
  
</div>
<!--/End model window -->

<script type="text/javascript">
function update_degree(name,id){
 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$.post("request-update-degree",{_token:CSRF_TOKEN,name:name,id:id},function(data){
  //alert(data);
      $("#degree_view").html(data);
      $("#myModal4").modal('show');
    });
}
function edit_degree(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var degree=$("#up_degree").val();
    var id=$("#deg_id").val();
    $.post("update-degree",{_token:CSRF_TOKEN,degree:degree,id:id},function(data){
      if(data){
      $("#myModal4").modal('hide');
      $("#degree-td"+id).html(degree);
       var originalColor = $("#degree-tr"+id).css("background-color");
      $("#degree-tr"+id).css("background",'#d8d8d8');
      setTimeout(function(){
        $("#degree-tr"+id).css("background",originalColor);
      },2000);
      }
    });
}

function degree_adding(){
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var add_degree = $("#add_degree").val();
  var c_degree ="'"+add_degree+"'";
  $.post('addtable-degree-type',{_token:CSRF_TOKEN,add_degree:add_degree},function(data){
    var id ="'"+data+"'";
   if (data) {
         $("#degree-tr").after('<tr id="degree-tr'+data+'"><th><input type="checkbox" name="check_all[]" value="'+data+'" class="flat"></th><td id="degree-td'+data+'">'+add_degree+'</td><td><a onclick="update_degree('+c_degree+','+id+');"><i class="fa fa-pencil"></i></a> | <a onclick="delete_degree('+id+');"><i class="fa fa-trash"></i></a></td></tr>');
           document.getElementById("degree_form").reset();
     $("#myModaldegree .close").click();

     setTimeout(
       function(){

        swal("Successfully Added!", "Degree level Added Successfully in Your DataBase!", "success");
      },
      1000
      );
   }
  });
}

</script>
@endsection

