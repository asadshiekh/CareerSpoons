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



            <form id="company_form" name="company_form" method="get" enctype="multipart/form-data">
              <!-- @csrf -->
              <!-- Company Name-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Company Name:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-optin-monster"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" id="company_name">
                </div>     
              </div>
              <!-- Company Type-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Company Type:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-building"></i>
                  </div>
                  <select name="selected_company_type" class="form-control" placeholder="select no of Employees" id="selected_company_type">
                    <option id="type-option" value="" disabled="disabled" selected="selected">Select Type of your Company</option>
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
                  <select name="selected_city" class="form-control" placeholder="select city" id="seleted_city">
                    <option id="city-option" value="" disabled="disabled" selected="selected">Select City</option>
                    @foreach($city as $city)
                    <option id="city-option" value="{{$city->company_city_name}}">{{$city->company_city_name}}</option>
                    @endforeach
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
                  <input type="text" class="form-control" placeholder="Enter Branch Name or Code" name="company_branch_name" id="company_branch_name">
                </div>     
              </div>

              <!-- Phone No-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Phone No:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" placeholder="Enter Phone No" class="form-control" name="company_phone" id="company_phone">
                </div>
              </div>
              <!-- Website link -->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Website Link:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-external-link"></i>
                  </div>
                  <input type="text" placeholder="Insert Website Link Here" class="form-control" name="company_website" id="company_website">
                </div>
              </div>
              <!-- No of Employees-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>No of Employees:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-users"></i>
                  </div>
                  <select name="selected_employees" class="form-control" placeholder="select no of employees" id="selected_employees">
                    <option value="" disabled="disabled" selected="selected">Select No of Employees</option>
                    <option value="">Start Up</option>
                    <option value="">1 to 15</option>
                    <option value="">15 to 25</option>
                    <option value="">25 to 50</option>
                    <option value="">50 to 100</option>
                    <option value="">100 to 200</option>
                    <option value="">more then 200</option>
                  </select>
                </div>
              </div>
              <!-- Industry -->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Industry:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-industry"></i>
                  </div>
                  <select name="selected_industry" class="form-control" placeholder="select industry" id="selected_industry">
                    <option id="industry-option" disabled="disabled" selected="selected">Select Industry</option>
                    @foreach($industry as $industry)
                    <option id="industry-option" value="{{$industry->company_industry_name}}">{{$industry->company_industry_name}}</option>
                    @endforeach
                  </select>
                  <span class="input-group-btn">
                    <button type="button" data-toggle="modal" data-target="#myModal2" class="btn btn-default">ADD Industry</button>
                  </span>
                </div>
              </div>
              <!-- Operating Since -->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Operating Since:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-history"></i>
                  </div>
                  <input type="date" class="form-control" placeholder="Enter Email OR Username" name="company_password" id="company_password">
                </div>
              </div>
              <!-- Address-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Location or Address:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                  </div>
                  <textarea id="company_location" name="company_location" class="form-control" rows="3" placeholder="Enter Address Here"></textarea>

                </div>
              </div>
              <!-- Email -->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Email:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="email" class="form-control" placeholder="Enter Email OR Username" name="company_email" id="company_email">
                </div>
              </div>      
              <!-- Password -->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Password:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-unlock-alt"></i>
                  </div>
                  <input type="email" class="form-control" placeholder="Enter Email OR Username" name="company_password" id="company_password">
                </div>
              </div>
              <!-- Cnic-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>other gournment verification document:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-github-alt"></i>
                  </div>
                  <input type="file" class="form-control" name="company_doc" id="company_doc">
                </div>
              </div>
              <!--  for Verification-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>other gournment verification document:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-github-alt"></i>
                  </div>
                  <input type="file" class="form-control" name="company_doc" id="company_doc">
                </div>
              </div>


              <!-- About Company -->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>About Company (atleast 20 words):</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-info"></i>
                  </div>
                  <textarea id="company_info" name="company_info" class="form-control" rows="4" placeholder="Enter Some Info About Your Company Here...."></textarea>

                </div>
              </div>

              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button type="button" class="btn btn-primary">Cancel</button>
                  <button class="btn btn-primary" type="reset">Reset</button>
                  <button type="button" class="btn btn-success" onclick="add_company();">Submit</button> 
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
<!-- Modal window for add Industry-->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form method="get" id="form-data">
     <!--  @csrf -->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Introduced New Industry ?</h4>
        <div class="col-sm-6 col-md-offset-4" id="loading-spin">
          <i id="i" style="font-size:100px"></i>
        </div>
        <div class="col-sm-6 col-md-offset-4" id="loading-true">
          <i id="tru" style="font-size:100px; color: #38b75e"></i>
        </div>
      </div>
      <div class="modal-body" id="modal-content">

        <label>ADD Industry:</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-yelp"></i>
          </div>
          <input type="text" placeholder="Enter Industry Name here" class="form-control" name="add_company_industry" id="add_company_industry">
        </div>
        
        <!-- <i class="fa fa-spinner fa-spin" style="font-size:24px"></i> --> 

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="btn-type" type="button" class="btn btn-default" onclick="company_industry_adding();">ADD</button>
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
          <input type="text" placeholder="Enter city here" class="form-control" name="add_company_city" id="add_company_city">
        </div>
        
        <!-- <i class="fa fa-spinner fa-spin" style="font-size:24px"></i> --> 

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="btn-type" type="button" class="btn btn-default" onclick="company_city_adding();">ADD</button>
        </div>
      </div>

    </div>
  </form>

</div>
</div>
<!--/End model window-->


<script type="text/javascript">
  //company type  function for adding new type
  function company_type_adding(){
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


//company city function for adding new city for organization
function company_city_adding(){
  var company_city = $("#add_company_city").val();
  $.get("adding-company-city",{company_city:company_city},function(data){ 
    if (data){
      $("#city-option:last-child").after(data);
      $("#myModal1 .close").click();
      setTimeout(
       function(){

        swal("Successfully Created New City!", "City Added Successfully in Your DataBase!", "success");
      },
      1000
      );
    }
  });
}
//function Adding company industy
function company_industry_adding(){
  var company_industry = $("#add_company_industry").val();
  $.get("adding-company-industry",{company_industry:company_industry},function(data){ 
    if (data){
      $("#industry-option:last-child").after(data);
      $("#myModal2 .close").click();
      setTimeout(
       function(){

        swal("Successfully Created New Industry!", "Industry Added Successfully in Your DataBase!", "success");
      },
      1000
      );
    }   
  });

}


//organization
// function add_company(){


//   var a= $("#company_name").val();


//  $.ajax({
//     url: 'register-company',
//     type: 'get',
//     data: 
//     success: function(data){
//         a
//     },
//     error: function( jqXhr, textStatus, errorThrown ){
//         console.log( errorThrown );
//     }
// });


// }


$("form[id=company_form]").onclick(function(event) {

 var formdata=new FormData(this);

 $.ajax({
  url:'register-company',
  type:'get',
  data:formdata,
  success:function(response){
    alert(response);
  }
});
});




</script>

@endsection


