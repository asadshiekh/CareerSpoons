@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Organization Preview <i class="fa fa-building-o"></i></h3>
      </div>
      <div class="title_right">
        <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">

        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2 style="font-family:'italic',bold">All Registed Organization<small style="font-family:'italic',bold">Here... </small></h2>
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
          <div class="x_content">


            <!-- Start Content-->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <p class="text-muted font-13 m-b-30">

                </p>
                <form action="delete-check-org" method="post" enctype="multipart/form-data">
                  @csrf
                  @if (session()->has('success'))
                  <script type="text/javascript">
                    swal("Deleted!", "Your Organization has been deleted.", "success");
                  </script>
                  @endif
                  <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                    <thead>
                      <tr>
                       <th><input type="checkbox" id="select-all" class="flat"> Select All </th>  
                       <th>Company Name</th>
                       <th>Company Type</th>
                       <th>Email</th>
                       <th>Phone No</th>
                       <th>Industry</th>  
                       <th>Status</th> 
                       <th>Change Status</th>               
                       <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach($organizations as $organizations)
                    <tr id="org-tr{{$organizations->company_id}}"> 
                     <th><input type="checkbox" name="check_all_org[]" class="flat" value="{{$organizations->company_id}}"></th> 
                     <td id="org-n{{$organizations->company_id}}">
                      <a href="organization-profile/{{$organizations->company_id}}" style="text-decoration: none;border-bottom:2px double #0c0;">{{$organizations->company_name}}</a></td>
                     <td id="org-t{{$organizations->company_id}}">{{$organizations->company_type}}</td>
                     <td>{{$organizations->company_email}}</td>
                     <td id="org-p{{$organizations->company_id}}">{{$organizations->company_phone}}</td>
                     <td id="org-i{{$organizations->company_id}}">
                    <?php
                      
                      $organizations->company_industry= str_replace("_"," ",$organizations->company_industry);
                      echo $organizations->company_industry;
                    ?></td>
                     <td id="status-td{{$organizations->company_id}}">{{$organizations->org_activation}}</td>
                     <td><select id="org_status" name="org_status" onchange="change_org_status(this.value,'{{$organizations->company_id}}');">
                      <option selected="selected" disabled="disabled" hidden="hidden">Select Status</option>
                       <option value="Active">Active</option>
                       <option value="Block">Block</option>
                     </select></td>
                     <td><a onclick="update_organizaion('{{$organizations->company_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Organization" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a> | <a onclick="delete_org('{{$organizations->company_id}}');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Organization" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a> | <a href="organization-profile/{{$organizations->company_id}}"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Organization" data-pt-animate="flipInX" data-pt-size="small"><i class="glyphicon glyphicon-eye-open"></i></span></a></a></td>
                   </tr>
                   @endforeach

                 </tbody>
                 <tfoot>
                  <tr>
                   <td colspan="9">
                    <?php  $query=DB::table('Add_organizations')->get()->count();
                    if($query>0) {?>
                      <button type="submit" class="btn btn-success" style="background-color: #2A3F54;">Delete</button>
                    <?php }?>

             <!-- 
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal1">Add New City?</button> -->
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
<!--model-->

<!-- Large modal -->
<div id="org_view">
  
</div>
<!--/model-->


<script type="text/javascript">

  function change_org_status(x,id){
 //var x=$("#org_status").val();
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.post('change-org-status',{_token:CSRF_TOKEN,x:x,id:id},function(data){
          if(data){
        if(x == "Block"){
        
       swal("Oops", "Account Blocked.", "error");
     }else{
       swal("Success", "Account Activated.", "success");
     }

     $("#status-td"+id).html(x);
   }
    });

  }
  function delete_org(o){
    var result = confirm("Really want to delete this Organization?");
    if(result){
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.post("delete-org",{_token:CSRF_TOKEN,o:o},function(data){ 

        if(data){
          $("#org-tr"+o).css('background-color','Crimson');
          $("#org-tr"+o).hide(3000);
        }
      });
    }

  }

  function update_organizaion(id){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.post("update-org-form",{_token:CSRF_TOKEN,id:id},function(data){ 
      $("#org_view").html(data);
      $("#mymodal5").modal('show');
      CKEDITOR.replace( 'post_info' );
    });
  }
function update_org_info(x){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var a = $("#new_company_name").val();
  var b = $("#new_selected_company_type").val();
  var c = $("#new_selected_city").val();
  var d = $("#new_company_branch_name").val();
  var e = $("#new_company_phone").val();
  var f = $("#new_company_website").val();
  var g = $("#new_selected_employees").val();
  var h = $("#new_selected_industry").val();
  var i = $("#new_company_since").val();
  var j = $("#new_company_cnic").val();
  var k = $("#new_company_location").val();
  var l=CKEDITOR.instances['post_info'].getData();
 //var l=$("#company_info").val();
//alert(a+" "+b+" "+c+" "+d+" "+e+" "+f+" "+g+" "+h+" "+i+" "+j+" "+k);

 //alert(l);
$.post('update-company-data',{_token:CSRF_TOKEN,a:a,b:b,c:c,d:d,e:e,f:f,g:g,h:h,i:i,j:j,k:k,l:l,x:x},function(data){
  if(data){
        //alert(data); 
$("#mymodal5").modal('hide');
$("#org-n"+x).html(a);
$("#org-t"+x).html(b);
$("#org-p"+x).html(e);
$("#org-i"+x).html(h);
       var originalColor = $("#org-tr"+x).css("background-color");
      $("#org-tr"+x).css("background",'#d8d8d8');
      setTimeout(function(){
        $("#org-tr"+x).css("background",originalColor);
      },2000);
        } 
 });
}



</script>

@endsection




