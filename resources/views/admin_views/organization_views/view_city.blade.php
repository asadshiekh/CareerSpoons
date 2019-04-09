@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Organization City Preview <i class="fa fa-building-o"></i></h3>
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
            <h2 style="font-family:'italic',bold">All Cities <small style="font-family:'italic',bold">Here... </small></h2>
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
                <form action="delete-check-cities" method="post" enctype="multipart/form-data">
                 @csrf
                 @if (session()->has('success'))
                 <script type="text/javascript">
                  swal("Deleted!", "Your cities has been deleted.", "success");
                </script>
                @endif
                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action responsive no-wrap" style="width: 100%">

                  <thead>
                    <tr id="city-tr">
                     <th><input type="checkbox" id="select-all" class="flat"> Select All </th>  
                     <th>City Name</th>                
                     <th>Action</th>
                   </tr>
                 </thead>


                 <tbody>
                  <!-- <tr id="city-tr"></tr> -->
                  @foreach($cities as $cities)
                  <tr id="city-tr{{$cities->company_city_id}}"> 
                   <th class="chk"><input type="checkbox" name="check_all[]" class="flat" value="{{$cities->company_city_id}}"></th> 
                   <td id="up-td{{$cities->company_city_id}}">{{$cities->company_city_name}}</td>
                   <td><a onclick="update_request('{{$cities->company_city_name}}','{{$cities->company_city_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update City" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a> | <a onclick="delete_city('{{$cities->company_city_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete City" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a></td>

                 </tr>
                 @endforeach

               </tbody>
               <tfoot>
                <tr>
                 <td colspan="3">
                   <?php  $query=DB::table('Add_cities')->get()->count();
                   if($query>0) {?>
                    <button type="submit" class="btn btn-success">Delete</button>
                  <?php } ?>


                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal1">Add New City?</button>
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
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form id="city_form">
     <!--  @csrf -->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Introduced New City ?</h4>
        <div class="col-sm-6 col-md-offset-4" id="loading-spin">
          <i id="i" style="font-size:100px"></i>
        </div>
        <div class="col-sm-6 col-md-offset-4" id="loading-true">
          <i id="tru" style="font-size:100px; color: #38b75e"></i>
        </div>
      </div>
      <div class="modal-body" id="modal-content">

        <label style="display: inline;">ADD City Name:</label><p id="name-error" style="display: inline;"></p>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-yelp"></i>
          </div>
          <input type="text" placeholder="Enter city here" class="form-control" name="add_company_city" id="add_company_city" required onkeyup="checkname()">
        </div>
        
        <!-- <i class="fa fa-spinner fa-spin" style="font-size:24px"></i> --> 

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" onclick="city_Adding_validate();">ADD</button>
        </div>
      </div>

    </div>
  </form>

</div>
</div>
<!--/End model window-->
<!-- Modal window for update City-->
<div id="up_view">
  
</div>
<!--/End model window -->

<script type="text/javascript">

function update_request(name,id){
 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post("request-update-city",{_token:CSRF_TOKEN,name:name,id:id},function(data){
      $("#up_view").html(data);
      $("#myModal2").modal('show');
    });
}
  function edit_city(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var city=$("#up_company_city").val();
    var id=$("#city_id").val();
    $.post("update-city",{_token:CSRF_TOKEN,city:city,id:id},function(data){
      if(data){
      $("#myModal2").modal('hide');
      $("#up-td"+id).html(city);
       var originalColor = $("#city-tr"+id).css("background-color");
      $("#city-tr"+id).css("background",'#84D285');
      setTimeout(function(){
        $("#city-tr"+id).css("background",originalColor);
      },2000);
      }
    });
  }

</script>
<!-- company_city_addingTable -->

<script type="text/javascript">
function checkname() {
    var name=$("#add_company_city").val();
    if(name != ""){
      if(name.match("^[a-zA-Z\(\) ]+$")){
      

          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          $.post("fetch-unique-city",{_token:CSRF_TOKEN,name:name},function(data){
            if(data>0){
              $("#name-error").removeClass('success');
              $('input[id="add_company_city"]').removeClass('user-success');
              $('input[id="add_company_city"]').addClass('user-danger');
              $("#name-error").addClass('alert');
              $("#name-error").text('City name already exist');
              

            }else{
              $('input[id="add_company_city"]').removeClass('user-danger');
              $('input[id="add_company_city"]').addClass('user-success');
              $("#name-error").removeClass('alert');
              $("#name-error").addClass('success');
              $("#name-error").text(' ');
             
            }
          }); 

       
      }else{
        $("#name-error").removeClass('success');
        $('input[id="add_company_city"]').removeClass('user-success');
        $('input[id="add_company_city"]').addClass('user-danger');
        $("#name-error").addClass('alert');
        $("#name-error").text('City name contains only Alphabet');
      }
    }else{

      $('input[id="add_company_city"]').removeClass('user-success');
      $('input[id="add_company_city"]').removeClass('user-danger');
      $("#name-error").text(' ');

    }

  }

  //name validator
   var name_validater = function validater(name){
      var check;
    //for name

    if(name != ""){

      if(name.match("^[a-zA-Z\(\) ]+$")){
      
          $('input[id="add_company_city"]').removeClass('user-danger');
          $('input[id="add_company_city"]').addClass('user-success');
          $("#name-error").removeClass('alert');
          $("#name-error").addClass('success');
        
           var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          $.post("fetch-unique-city",{_token:CSRF_TOKEN,name:name},function(data){
            if(data>0){
              $("#email-error").removeClass('success');
              $('input[id="add_company_city"]').removeClass('user-success');
              $('input[id="add_company_city"]').addClass('user-danger');
              $("#email-error").addClass('alert');
              $("#email-error").text('City name already exist');
              check=false;
             // alert("no");

            }else{
              $('input[id="add_company_city"]').removeClass('user-danger');
              $('input[id="add_company_city"]').addClass('user-success');
              $("#email-error").removeClass('alert');
              $("#email-error").addClass('success');
              $("#email-error").text(' ');
             // alert("yes");
              check=true;
            }
          }); 
        
      }else{
        $("#name-error").removeClass('success');
        $('input[id="add_company_city"]').removeClass('user-success');
        $('input[id="add_company_city"]').addClass('user-danger');
        $("#name-error").addClass('alert');
        $("#name-error").text('City name contains only Alphabet');
        //return false;
        check=false;
      }
               ////end name       
         //last
     }else{
      $("#name-error").removeClass('success');
      $('input[id="add_company_city"]').removeClass('user-success');
      $('input[id="add_company_city"]').addClass('user-danger');
      $("#name-error").addClass('alert');
      $("#name-error").text(' City Name is empty');
      check=false;
     }

     return check;
 }


 //for update
  var up_name_validater = function validater(name){
      var check;
    //for name

    if(name != ""){

      if(name.match("^[a-zA-Z\(\) ]+$")){
      
          $('input[id="up_company_city"]').removeClass('user-danger');
          $('input[id="up_company_city"]').addClass('user-success');
          $("#up-name-error").removeClass('alert');
          $("#up-name-error").addClass('success');
        
           var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          $.post("fetch-unique-city",{_token:CSRF_TOKEN,name:name},function(data){
            if(data>0){
              $("#up-email-error").removeClass('success');
              $('input[id="up_company_city"]').removeClass('user-success');
              $('input[id="up_company_city"]').addClass('user-danger');
              $("#up-email-error").addClass('alert');
              $("#up-email-error").text('City name already exist');
              check=false;
             // alert("no");

            }else{
              $('input[id="up_company_city"]').removeClass('user-danger');
              $('input[id="up_company_city"]').addClass('user-success');
              $("#up-email-error").removeClass('alert');
              $("#up-email-error").addClass('success');
              $("#up-email-error").text(' ');
             // alert("yes");
              check=true;
            }
          }); 
        
      }else{
        $("#name-error").removeClass('success');
        $('input[id="up_company_city"]').removeClass('user-success');
        $('input[id="up_company_city"]').addClass('user-danger');
        $("#up-name-error").addClass('alert');
        $("#up-name-error").text('City name contains only Alphabet');
        //return false;up-
        check=false;
      }
               ////end name       
         //last
     }else{
      $("#name-error").removeClass('success');
      $('input[id="up_company_city"]').removeClass('user-success');
      $('input[id="up_company_city"]').addClass('user-danger');
      $("#up-name-error").addClass('alert');
      $("#up-name-error").text(' City Name is empty');
      check=false;
     }

     return check;
 }
  //main function
  function city_Adding_validate(){
     var name = $("#add_company_city").val();
     var getname=name_validater(name);
        if(getname){
            // yahooo();  
            company_city_addingTable();     
        }
        else{
          //alert("oh no");
          $("#name-error").removeClass('success');
          $('input[id="add_company_city"]').removeClass('user-success');
          $('input[id="add_company_city"]').addClass('user-danger');
          $("#name-error").addClass('alert');
          $("#name-error").text('City name already exist');
         }
   
  }
   function city_updating_validate(){
     var name = $("#up_company_city").val();
     var getname=up_name_validater(name);
        if(getname){
            // yahooo();  
           edit_city();     
        }
        else{
          //alert("oh no");
          $("#up-name-error").removeClass('success');
          $('input[id="up_company_city"]').removeClass('user-success');
          $('input[id="up_company_city"]').addClass('user-danger');
          $("#up-name-error").addClass('alert');
          $("#up-name-error").text('City name already exist');
         }
   
  }

  function yahooo(){
    alert("yrs");
  }
</script>
<style type="text/css">
  .alert{
      color: red;
      font-size: 12px;
    }
    /*.user-danger{
      border: solid 2px red;
    }
    .user-success{
      border: solid 2px green;
    }
*/
    .success{
      color: green;
      font-size: 12px;
    }
    .private{
      padding-left: 1%;
    }
</style>
@endsection

