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
              <!-- Select Organization-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Organization:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-building"></i>
                  </div>
                  <select name="selected_employees" class="form-control"  id="selected_employees">
                    <option value="" disabled="disabled" selected="selected">select Organization</option>
                    <option value="">Start Up</option>
                    <option value="">1 to 15</option>
                  </select>
                </div>
              </div>


              <!-- Job Title -->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Job Title:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="glyphicon glyphicon-tree-conifer"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" id="company_name">
                </div>     
              </div>
              <!-- Search Result Title-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Search Result Title:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="glyphicon glyphicon-subscript"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" id="company_name">
                </div>

              </div>

              <!-- Contact Details-->
              <div class="form-group col-sm-6 col-md-offset-3">

                <div class="input-group" style="margin-bottom: 0px">

                  <label>Contact Info <i class="glyphicon glyphicon-info-sign"></i> :</label>
                  
                  
                </div>

              </div>

              <div class="form-group col-sm-3 col-md-offset-3">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Phone" name="company_name" id="company_name"> 
                </div>

              </div>
              <div class="form-group col-sm-3">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="glyphicon glyphicon-envelope"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Email" name="company_name" id="company_name"> 
                </div>       
              </div>


              

              <!-- Career Level-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Required Career Level for This Job:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                  </div>
                  <select name="selected_employees" class="form-control" placeholder="select no of employees" id="selected_employees">
                    <option value="" disabled="disabled" selected="selected">Select No of Employees</option>
                    <option value="">Start Up</option>
                    <option value="">1 to 15</option>
                  </select>
                </div>
              </div>




              <!-- Experience for job -->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Year of Experience Required:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-external-link"></i>
                  </div>
                  <input type="text" placeholder="Enter Experience demands" class="form-control" name="company_website" id="company_website">
                </div>
              </div>
              <!-- Salar for job-->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Salary Range:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-users"></i>
                  </div>
                  <input type="text" placeholder="Enter Salary" class="form-control" name="company_website" id="company_website">
                </div>
              </div>
              <!-- Job Preferences -->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Gender Prefrences:</label>
                <p style="font-style: bold; font-size: 12px;">
                  Male:
                  <input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required /> Female:
                  <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                  None:
                  <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                </p>

              </div>
              <!-- Skills -->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>What Skills are Required for Job?:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                  </div>
                  <input id="tags_1" type="text" class="tags form-control" value="" />
                  <div id="suggestions-container" ></div> 
                </div>     
              </div>


              <!-- About Job -->
              <div class="form-group col-sm-6 col-md-offset-3">
                <label>Job Details (atleast 20 words):</label>
                <div class="input-group">

                  <textarea id="editor1" name="company_info" class="form-control" rows="4" placeholder="Enter Some Info About Your Company Here...."></textarea>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button type="button" class="btn btn-primary">Cancel</button>
                  <button class="btn btn-primary" type="reset">Reset</button>
                  <button type="button" class="btn btn-success" onclick="">Submit</button> 
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
          <button id="btn-type" type="button" class="btn btn-default" onclick="">ADD</button>
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
          <button id="btn-type" type="button" class="btn btn-default" onclick="">ADD</button>
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
          <button id="btn-type" type="button" class="btn btn-default" onclick="">ADD</button>
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
      }
    });
  }



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


