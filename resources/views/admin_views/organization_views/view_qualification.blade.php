@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Qualification Preview <i class="fa fa-building-o"></i></h3>
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
            <h2 style="font-family:'italic',bold">Qualification <small style="font-family:'italic',bold">Here... </small></h2>
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
                <form action="delete-check-qual" method="post" enctype="multipart/form-data">
                 @csrf
                 @if (session()->has('success'))
           <script type="text/javascript">
            swal("Deleted!", "Your Qualifications has been deleted.", "success");
           </script>
            @endif
              
                <table id="myQual" class="table table-striped table-bordered bulk_action responsive no-wrap" style="width: 100%">

                  <thead>
                    <tr id="qual-tr">
                     <th><input type="checkbox" id="select-all" class="flat"> Select All </th>  
                     <th>Qualification Title</th>                
                     <th>Action</th>
                   </tr>
                 </thead>
                <tbody>
                 @foreach($all_qual as $all_qual)
            <tr id="qual-tr{{$all_qual->qual_id}}"> 
               <th><input type="checkbox" name="check_all[]" class="flat" value="{{$all_qual->qual_id}}"></th> 
               <td id="qual-td{{$all_qual->qual_id}}">{{$all_qual->qualification_title}}</td>
               <td><a onclick="update_qual('{{$all_qual->qualification_title}}','{{$all_qual->qual_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Qualification" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a> | <a onclick="delete_qual('{{$all_qual->qual_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Qualification" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a></td>
             
           </tr>
           @endforeach
                </tbody>
           
                 
               <tfoot>
                <tr>
                 <td colspan="3">
                   <?php $query=DB::table('Add_qualification')->get()->count();
                   if($query>0) {?>
                    <button type="submit" class="btn btn-success">Delete</button>
                  <?php } ?>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalqual">Add New Qualification?</button>
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
<div id="myModalqual" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form id="form_qualification">
     <!--  @csrf -->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Qualification ?</h4>
        <div class="col-sm-6 col-md-offset-4" id="loading-spin">
          <i id="i" style="font-size:100px"></i>
        </div>
        <div class="col-sm-6 col-md-offset-4" id="loading-true">
          <i id="tru" style="font-size:100px; color: #38b75e"></i>
        </div>
      </div>
      <div class="modal-body" id="modal-content">

        <label>ADD Qualification Level:</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-yelp"></i>
          </div>
          <input type="text" placeholder="Enter Qualification here" class="form-control" name="add_qualification" id="add_qualification">
        </div>
        
        <!-- <i class="fa fa-spinner fa-spin" style="font-size:24px"></i> --> 

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" onclick="qualification_adding();">ADD</button>
        </div>
      </div>

    </div>
  </form>

</div>
</div>
<!--/End model window-->
<!-- Modal window for update City-->
<div id="qual_view">
  
</div>
<!--/End model window -->

<script type="text/javascript">

function update_qual(name,id){
 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$.post("request-update-qual",{_token:CSRF_TOKEN,name:name,id:id},function(data){
      $("#qual_view").html(data);
      $("#myModal7").modal('show');
    });
}
function edit_qual(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var qual=$("#up_qual").val();
    var id=$("#qual_id").val();
    $.post("update-qual",{_token:CSRF_TOKEN,qual:qual,id:id},function(data){
      if(data){
      $("#myModal7").modal('hide');
      $("#qual-td"+id).html(qual);
       var originalColor = $("#qual-tr"+id).css("background-color");
      $("#qual-tr"+id).css("background",'#d8d8d8');
      setTimeout(function(){
        $("#qual-tr"+id).css("background",originalColor);
      },2000);
      }
    });
  }

function qualification_adding(){
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var add_qual = $("#add_qualification").val();
  var c_qual ="'"+add_qual+"'";
  $.post('addtable-qualification-type',{_token:CSRF_TOKEN,add_qual:add_qual},function(data){
    var id ="'"+data+"'";
   if (data) {
         $("#qual-tr").after('<tr id="qual-tr'+data+'"><th><input type="checkbox" name="check_all[]" value="'+data+'" class="flat"></th><td id="qual-td'+data+'">'+add_qual+'</td><td><a onclick="update_qual('+c_qual+','+id+');"><i class="fa fa-pencil"></i></a> | <a onclick="delete_qual('+id+');"><i class="fa fa-trash"></i></a></td></tr>');
      document.getElementById("form_qualification").reset();    
     $("#myModalqual .close").click();

     setTimeout(
       function(){

        swal("Successfully Added!", "Qualification Added Successfully in Your DataBase!", "success");
      },
      1000
      );
   }
  });
}

</script>
@endsection

