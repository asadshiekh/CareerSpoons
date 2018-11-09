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

      <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-1">
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



            <form id="data">
            
             <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
             <!-- Company Name-->
             <div class="form-group col-sm-5 col-md-offset-1">
              <label>Company Name:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-optin-monster"></i>
                </div>
                <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" id="company_name">
              </div>     
            </div>
            <!-- Company Type-->
            <div class="form-group col-sm-5">
              <label>Company Type:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-building"></i>
                </div>
                <select name="selected_company_type" class="form-control" placeholder="select no of Employees" id="selected_company_type">
                  <option id="type-option" value="" disabled="disabled" selected="selected">Select Type of Company</option>
                  @foreach($row as $row)
                  <option id="type-option" value="{{$row->company_type_name}}">{{$row->company_type_name}}</option>
                  @endforeach
                </select>
                <span class="input-group-btn">
                  <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-default">Add Type</button>
                </span>
              </div>

            </div>

            <!-- City-->
            <div class="form-group col-sm-5 col-md-offset-1">
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
                  <button type="button" data-toggle="modal" data-target="#myModal1" class="btn btn-default">Add City</button>
                </span>
              </div>
            </div>
            <!-- Branch Name -->
            <div class="form-group col-sm-5">
              <label>Branch Name or Code:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-barcode"></i>
                </div>
                <input type="text" class="form-control" placeholder="Enter Branch Name or Code" name="company_branch_name" id="company_branch_name">
              </div>     
            </div>

            <!-- Phone No-->
            <div class="form-group col-sm-5 col-md-offset-1">
              <label>Phone No:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                <input type="text" placeholder="Enter Phone No" class="form-control" name="company_phone" id="company_phone">
              </div>
            </div>
            <!-- Website link -->
            <div class="form-group col-sm-5">
              <label>Website Link:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-external-link"></i>
                </div>
                <input type="link" placeholder="Insert Website Link Here" class="form-control" name="company_website" id="company_website">
              </div>
            </div>
            <!-- No of Employees-->
            <div class="form-group col-sm-5 col-md-offset-1">
              <label>No of Employees:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-users"></i>
                </div>
                <select class="form-control" id="selected_employees" name="selected_employees">
                  <option value="" disabled="disabled" selected="selected">Select No of Employees</option>
                  <option value="Start Up">Start Up</option>
                  <option value="1 to 15">1 to 15</option>
                  <option value="15 to 25">15 to 25</option>
                  <option value="25 to 50">25 to 50</option>
                  <option value="50 to 100">50 to 100</option>
                  <option value="100 to 200">100 to 200</option>
                  <option value="more then 200">more then 200</option>
                </select>
              </div>
            </div>
            <!-- Industry -->
            <div class="form-group col-sm-5">
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
                  <button type="button" data-toggle="modal" data-target="#myModal2" class="btn btn-default">Add Industry</button>
                </span>
              </div>
            </div>
            <!-- Operating Since -->
            <div class="form-group col-sm-5 col-md-offset-1">
              <label>Operating Since:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-history"></i>
                </div>
                <input type="date" class="form-control" placeholder="Enter Email OR Username" name="company_since" id="company_since">
              </div>
            </div>
            <!-- Cnic-->
            <div class="form-group col-sm-5">
              <label>CNIC No:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                </div>
                <input type="cnic" class="form-control" name="company_cnic" id="company_cnic" placeholder="35201-2345678-7">
              </div>
            </div>
             <!-- Email -->
            <div class="form-group col-sm-9 col-md-offset-2">
              <label>Imp Details:</label>
            </div> 
            <div class="form-group col-sm-4 col-md-offset-2">
              <label>Email:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
                <input type="email" class="form-control" placeholder="Enter Email OR Username" name="company_email" id="company_email">
              </div>
            </div>      
            <!-- Password -->
            <div class="form-group col-sm-4">
              <label>Password:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-unlock-alt"></i>
                </div>
                <input type="Password" class="form-control" placeholder="Enter Email OR Username" name="company_password" id="company_password">
              </div>
            </div>
            
            <!--  for Verification-->
            <div class="form-group col-sm-4 col-md-offset-2">
              <label>other gournment verification document:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-github-alt"></i>
                </div>
                <input type="file" class="form-control" name="company_doc" id="company_doc" >
              </div>
            </div>

            <!-- Address-->
            <div class="form-group col-sm-4">
              <label>Location or Address:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-map-marker"></i>
                </div>
                <input id="company_location" name="company_location" class="form-control" placeholder="Enter Address Here"/>

              </div>
            </div>
           

            <!-- About Company -->
            <div class="form-group col-sm-8 col-md-offset-2">
              <label>About Company (atleast  20 words):</label>
              <div class="input-group">
                
                <textarea id="company_info" name="company_info" class="form-control" rows="4" placeholder="Enter Some Info About Your Company Here...."></textarea>

              </div>
            </div>

            <div class="form-group">
              <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-8">
                <button type="button" class="btn btn-primary">Cancel</button>
                <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" class="btn btn-success" id="btn-org">ADD</button>
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
    <form>
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
    <form>
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
          <button id="btn-indus" type="button" class="btn btn-default" onclick="company_industry_adding();">ADD</button>
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
    <form>
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
          <button type="button" class="btn btn-default" onclick="company_city_adding();">ADD</button>
        </div>
      </div>

    </div>
  </form>

</div>
</div>
<!--/End model window-->

<!-- var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
_token:CSRF_TOKEN
-->
<script type="text/javascript">
  //company type  function for adding new type
  function company_type_adding(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var company_type = $("#add_company_type").val();
    $.post("adding-company-type",{_token:CSRF_TOKEN,company_type:company_type},function(data){ 
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






//function Adding company industy
function company_industry_adding(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var company_industry = $("#add_company_industry").val();
  $.post("adding-company-industry",{_token:CSRF_TOKEN,company_industry:company_industry},function(data){ 
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


//adding org

$("form#data").submit(function(event){
  // $("#btn-org").attr("disabled", "disabled");
  $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
 
  //disable the default form submission
  event.preventDefault();
 
  //grab all form data  
  var formData = new FormData($(this)[0]);
 
  $.ajax({
    url: 'register-company',
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (returndata) {
    if(returndata){
     swal("Company Registered Successfully!", "Added Successfully in Your DataBase!", "success");
    }
       
    }
  });
 
  return false;
  // $("#btn-org").removeAttr('disabled');
});



</script>

@endsection


