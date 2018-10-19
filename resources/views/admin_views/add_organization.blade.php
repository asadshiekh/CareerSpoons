@extends('admin_views.template.master')
@section('content')


<!--content-->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Organization Form <i class="fa fa-building-o"></i></h3>
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
            <h2 style="font-family:'italic',bold">Add New Organization<small style="font-family:'italic',bold">Here... </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Smart Wizard -->



            <form method="post" action="" enctype="multipart/form-data" id="form" name="form">
              <!-- Company Name-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Company Name:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-optin-monster"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Company Name" name="fullname" id="fullname">
                </div>     
              </div>
              <!-- Company Type-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Company Type:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-building"></i>
                  </div>
                  <select name="selected_right" class="form-control" placeholder="select no of Employees" id="seleted_right">
                    <option value="" disabled="disabled" selected="selected">Select Type of your Company</option>
                    @foreach($row as $row)
                    <option id="type-option" value="{{$row->company_type_name}}">{{$row->company_type_name}}</option>
                    @endforeach
                  </select>
                  <span class="input-group-btn">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-default">ADD Type</button>
                  </span>
                </div>

              </div>

              <!-- City-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>City:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-flag-o"></i>
                  </div>
                  <select name="selected_right" class="form-control" placeholder="select city" id="seleted_right">
                    <option value="" disabled="disabled" selected="selected">Select Right</option>
                    <option value=""></option>
                  </select>
                  <span class="input-group-btn">
                    <button type="button" data-toggle="modal" data-target="#myModal1" class="btn btn-default">ADD City</button>
                  </span>
                </div>
              </div>
              <!-- Branch Name -->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Branch Name or Code:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Branch Name or Code" name="fullname" id="fullname">
                </div>     
              </div>

              <!-- Phone No-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Phone No:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-mobile"></i>
                  </div>
                  <input type="text" placeholder="Enter Phone No" class="form-control" name="phone" id="phone">
                </div>
              </div>
              <!-- Ptcl-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>PTCL No:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" placeholder="Enter PTCL No" class="form-control" name="phone" id="phone">
                </div>
              </div>
              <!-- Website link-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Website Link:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-external-link"></i>
                  </div>
                  <input type="text" placeholder="Insert Website Link Here" class="form-control" name="phone" id="phone">
                </div>
              </div>
              <!-- No of Employees-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>No of Employees:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-users"></i>
                  </div>
                  <select name="selected_right" class="form-control" placeholder="select right" id="seleted_right">
                    <option value="" disabled="disabled" selected="selected">Select N of Employees</option>
                    <option value=""></option>
                  </select>
                </div>
              </div>
              <!-- Industry-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Industry:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-industry"></i>
                  </div>
                  <select name="selected_right" class="form-control" placeholder="select right" id="seleted_right">
                    <option value="" disabled="disabled" selected="selected">Select Industry</option>
                    <option value=""></option>
                  </select>
                </div>
              </div>
              <!-- Operating Since-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Operating Since:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-history"></i>
                  </div>
                  <select name="selected_right" class="form-control" placeholder="select right" id="seleted_right">
                    <option value="" disabled="disabled" selected="selected">Select Year</option>
                    <option value=""></option>
                  </select>
                </div>
              </div>
              <!-- Address-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Location or Address:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                  </div>
                  <textarea class="form-control" rows="3" placeholder="Enter Address Here"></textarea>

                </div>
              </div>
              <!-- Email-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Email:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="email" class="form-control" placeholder="Enter Email OR Username" name="email" id="email">
                </div>
              </div>      
              <!-- Password-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Password:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-unlock-alt"></i>
                  </div>
                  <input type="email" class="form-control" placeholder="Enter Email OR Username" name="email" id="email">
                </div>
              </div>
              <!-- Cnic for Verification-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>CNIC or other gournment verification document:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-github-alt"></i>
                  </div>
                  <input type="file" class="form-control" name="img" id="img">
                </div>
              </div>


              <!-- About Company -->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>About Company (atleast 20 words):</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-info"></i>
                  </div>
                  <textarea class="form-control" rows="4" placeholder="Enter Some Info About Your Company Here...."></textarea>

                </div>
              </div>

              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button type="button" class="btn btn-primary">Cancel</button>
                  <button class="btn btn-primary" type="reset">Reset</button>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>

            </form>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<!--/content-->
<!-- Modal Window for add New Company Type-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form method="get" id="form-data">
     <!--  @csrf -->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD New Company Type</h4>
        <div class="col-sm-6 col-md-offset-4" id="loading-spin">
        <i id="i" style="font-size:100px"></i>
        </div>
         <div class="col-sm-6 col-md-offset-4" id="loading-true">
        <i id="tru" style="font-size:100px; color: #38b75e"></i>
        </div>
      </div>
      <div class="modal-body" id="modal-content">
      
        <label>Company Type:</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-yelp"></i>
          </div>
          <input type="text" placeholder="Enter New Type" class="form-control" name="add_company_type" id="add_company_type">
        </div>
        
      <!-- <i class="fa fa-spinner fa-spin" style="font-size:24px"></i> --> 
    
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button id="btn-type" type="button" class="btn btn-default" onclick="company_type_adding();">ADD</button>
    </div>
  </div>
  
  </div>
  </form>

</div>
</div>
<!--/End model window-->
<!-- Modal window for add City-->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form method="get" id="form-data">
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
      
        <label>ADD City Name:</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-yelp"></i>
          </div>
          <input type="text" placeholder="Enter city here" class="form-control" name="add_city" id="add_company_type">
        </div>
        
      <!-- <i class="fa fa-spinner fa-spin" style="font-size:24px"></i> --> 
    
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button id="btn-type" type="button" class="btn btn-default" onclick="company_type_adding();">ADD</button>
    </div>
  </div>
  
  </div>
  </form>

</div>
</div>
<!--/End model window-->


<script type="text/javascript">
  function company_type_adding(){
    $('#tru').hide();
    var company_type = $("#add_company_type").val();
 $.get("adding-company-type",{company_type:company_type},function(data){ 
  if (data){
  $("#type-option:last-child").after(data);
  $("#myModal .close").click();
  setTimeout(
   function(){

  swal("Successfully Created!", "Added Successfully in Your DataBase!", "success");
   },
   1000
   );

//    $("#btn-type").disabled;
//    $("#modal-content").hide();
//    $("#i").attr("class","fa fa-spinner fa-spin");

//    setTimeout(
//    function(){

//       $('#i').replaceWith($('#tru'));
//       $('#tru').show();
//       $("#tru").attr("class","glyphicon glyphicon-ok");

//    },
//    3000
// );


  }
});
  
}
// $("form#form-data").onclick(function(e){
//   var formdata=new FormData(this);
//   alert("yes");
//   $.ajax({
//     url:'adding-company-type',
//     type:'GET',
//     data:formdata,
//     success:function(data){
//       alert(data);
//     }
//   });
// });
</script>

@endsection


