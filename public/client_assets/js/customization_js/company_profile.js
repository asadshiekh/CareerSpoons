//functionsfor form customization
//add more fields etc

function addCityPreferenceAreafields() {
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var x="yes";
	$.post('cities-preferences-data',{_token:CSRF_TOKEN,x:x},function(data){ 
		$("#content").append(data);
	});
}

function del_front_field(x){
	$("#fields"+x).remove();
}
function add_qual_front_area(){
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var x="yes";
	$.post('fetch-qual-front-data',{_token:CSRF_TOKEN,x:x},function(data){ 

		$("#content_qual").append(data);
  // $("#content_modal_qual").html(data);
});
}

function view_post_private(x){
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	$.post("view-post-single-private",{_token:CSRF_TOKEN,x:x},function(data){

		$("#append-view-post").html(data);
		$("#viewpostmodalwindow").modal('show');
	});
}

function delete_front_post(x){
	swal({
		title: "Are you sure?",
		text: "Once deleted, you will not be able to recover this Post!",
		icon: "warning",
		showCancelButton: true,
 		confirmButtonColor: '#3085d6',
 		cancelButtonColor: '#d33',
 		confirmButtonText: 'Yes, Do it!'
	}).then((result) => {
 			if (result.value) {
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			$.post("delete-front-post",{_token:CSRF_TOKEN,x:x},function(data){
    		if(data == "yes"){
    			$("#post-del"+x).hide(2000);
    		}else{
    			alert("no");
    		}
			});

		}
	});




}

function update_front_post(x){
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	$.post("update-post-single-private",{_token:CSRF_TOKEN,x:x},function(data){
    $("#append-edit-post").html(data);
		$("#editpostmodalwindow").modal('show');
		$('#post_visible').dateDropper();
		$('#last_apply').dateDropper();
		CKEDITOR.replace('user_info'); 

		
	});
}
function add_modal_area(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var x="yes";
  $.post('cities-preferences-data',{_token:CSRF_TOKEN,x:x},function(data){ 
   $("#content_modal_area").append(data);
 });

}

function add_modal_qual_area(){
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var x="yes";
  $.post('fetch-qual-front-data',{_token:CSRF_TOKEN,x:x},function(data){ 

    $("#content_modal_qual").append(data);
  });
}

//delete field from modal window
function del_qual_area(x){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post('del-qual-field-front',{_token:CSRF_TOKEN,x:x},function(data){ 
    if(data){
      $("#fields"+x).remove();
    }
  });
  
}
function del_fields(x){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post('del-city-field-front',{_token:CSRF_TOKEN,x:x},function(data){ 
    if(data){
      $("#Cityfields"+x).remove();
    }
  });
  
}

function update_post_info(x){
  var y= $("#u_posted_job_title").val();
  var z= $("#u_total_positions").val();
  var f= $("#u_job_exp_req").val();
  var d= $("#n_req_functional_area").val();
  

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    //disable the default form submission
    event.preventDefault();
  //grab all form data  
  var formData = new FormData($("#info_post_up")[0]);
  $.ajax({
    url: 'post-update-data-front',
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (returndata) {
      $("#editpostmodalwindow").modal('hide');
      $("#job_name"+x).html(y);
      $("#position-td"+x).html(" "+z+" Positions");
      $("#exp-td"+x).html(" "+f+" Year");
      $("#indus-td"+x).html(" "+d+" ");
       

      var originalColor = $("#post-show"+x).css("background-color");
      $("#post-show"+x).css("background",'#d8d8d8');
      swal("Successfully!", "Your Post is Successfully Updated!", "success");
     setTimeout(function(){

      $("#post-show"+x).css("background",originalColor);
    },2000);

      //alert(returndata);<?php

    }
  });

  return false;

}

function update_org_pass(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       var y= $("#current_password").val();
       var x= $("#new_password").val();
       $.post("company-update-password",{_token:CSRF_TOKEN,x:x,y:y},function(data){
        if(data == "yes"){
          document.getElementById("updatepassform").reset();
          swal("Successfully!", "Your Password is Successfully Updated!", "success");
          $("#password-error").html(" ");
        }else{
          $("#password-error").html(" **Invalid Password** ");
        }
      });
}
function update_email_org(){
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       var y= $("#curr_password").val();
       var x= $("#new_email").val();
       $.post("company-update-email",{_token:CSRF_TOKEN,x:x,y:y},function(data){
        if(data == "yes"){
          document.getElementById("updateEmailform").reset();
          swal("Successfully!", "Your Email is Successfully Updated!", "success");
          $("#email-error").html(" ");
        }else{
          $("#email-error").html(" **Invalid Password** ");
        }
      });
}

function select_functional_area_majors(){

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var f_area=$("#req_functional_area").val();

   $.post("fetch_company_f_area_related_majors",{_token:CSRF_TOKEN,f_area:f_area},function(data){
          
      //alert(data);
      $('#selected_majors').empty();
        $.each(data, function( key, value ) {
            var str = data[key].major_title;
            str = str.replace("_"," ");
             $('#selected_majors').append('<option value="'+ data[key].major_title +'">'+ str +'</option>');
                //alert(data[key].major_title);
           });


  });
}


function company_review(){

  var notyf = new Notyf();
    var $rateYo = $("#rateYo").rateYo();
    var rating = $rateYo.rateYo("rating");
    var rating_description = CKEDITOR.instances['rating_pro'].getData();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    
    if(rating==''){

      alert("select rating");
      return false;
    }
    if (rating_description == '') {
      alert('Editor value cannot be empty!') ;
      return false ;
    }

    else{

     $.post("company-rating",{_token:CSRF_TOKEN,rating:rating,rating_description:rating_description},function(data){

         if(data=="yes"){

          setTimeout(
            function(){

              swal('Review Add Successfully!','','success');

            },
            500
            );
          notyf.confirm('Your changes have been successfully saved!');
        }
        else{
          
          setTimeout(
        function(){

          swal({
            type: 'error',
            title: 'Oops...',
            text: 'Connection Failed!!',
            footer: '<a href>Why do I have this issue?</a>'
          })
        },
        1000
        );

      notyf.alert('Something Went Worng Plz Try Again');
        }
     }); 
          
    }
}











///////////////////////////////////////////////////////////////////////////////////////
// validate form company bio
// can_general_form function validation

var company_Bio_validater = function validater(value){
      var check;
      
  if(value != ""){
      $("#comp_bio_error").text(' ');
        check=true;
      }else{
        $("#comp_bio_error").removeClass('success');
        $("#comp_bio_error").addClass('alert');
        $("#comp_bio_error").text('Required * ');
        check=false;
      }
     return check;
 }

$('#com_bio_form').on('submit', function(e){
 // alert("yes");
      var company_Bio = CKEDITOR.instances['update_bio'].getData();

      var getBio=company_Bio_validater(company_Bio);

      // alert(getBio);

      if(getBio){
        return true;
      }else{
        swal("Error"," Bio Not Updated","error");
        return false;
      }
      
});

///////////////////////////////////////////////////////////////////////////
// company info validation

var comp_cname_validater = function validator(name){
  var check;
    //for name

    if(name != ""){

      if(name.match("^[a-zA-Z\(\) ]+$")){
        $("#company_cname_error").text(' ');
           check=true;
      }else{
        $("#company_cname_error").removeClass('success');
        $("#company_cname_error").addClass('alert');
        $("#company_cname_error").text('Contains only alphabet');
        //return false;
        check=false;
      }
               ////end name       
         //last
     }else{
      $("#company_cname_error").removeClass('success');
      $("#company_cname_error").addClass('alert');
      $("#company_cname_error").text('Required *');
      check=false;
     }

     return check;
}

//profession validation function
var comp_ctype_validater =function validator(name){
var check;
    //for name

  if(name != ""){
    $("#company_ctype_error").text(' ');
      check=true;
    }else{
      $("#company_ctype_error").removeClass('success');
      $("#company_ctype_error").addClass('alert');
      $("#company_ctype_error").text('Required');
      check=false;
    }

     return check;
}

//profession validation function
var comp_city_validater =function validator(name){
var check;
    //for name

  if(name != ""){
    $("#company_cty_error").text(' ');
      check=true;
    }else{
      $("#company_cty_error").removeClass('success');
      $("#company_cty_error").addClass('alert');
      $("#company_cty_error").text('Required');
      check=false;
    }

     return check;
}

//profession validation function
var comp_branch_validater =function validator(name){
var check;
    //for name

  if(name != ""){
    $("#company_code_error").text(' ');
      check=true;
    }else{
      $("#company_code_error").removeClass('success');
      $("#company_code_error").addClass('alert');
      $("#company_code_error").text('Required');
      check=false;
    }

     return check;
}

//profession validation function
var comp_phone_validater =function validator(name){
var check;
    //for name

  if(name != ""){
    $("#company_phone_error").text(' ');
      check=true;
    }else{
      $("#company_phone_error").removeClass('success');
      $("#company_phone_error").addClass('alert');
      $("#company_phone_error").text('Required');
      check=false;
    }

     return check;
}

//profession validation function
var comp_web_validater =function validator(name){
var check;
    //for name

  if(name != ""){
    $("#company_weblink_error").text(' ');
      check=true;
    }else{
      $("#company_weblink_error").removeClass('success');
      $("#company_weblink_error").addClass('alert');
      $("#company_weblink_error").text('Required');
      check=false;
    }

     return check;
}

//profession validation function
var comp_employee_validater =function validator(name){
var check;
    //for name

  if(name != ""){
    $("#company_emp_error").text(' ');
      check=true;
    }else{
      $("#company_emp_error").removeClass('success');
      $("#company_emp_error").addClass('alert');
      $("#company_emp_error").text('Required');
      check=false;
    }

     return check;
}

//profession validation function
var comp_indus_validater =function validator(name){
var check;
    //for name

  if(name != ""){
    $("#company_ind_error").text(' ');
      check=true;
    }else{
      $("#company_ind_error").removeClass('success');
      $("#company_ind_error").addClass('alert');
      $("#company_ind_error").text('Required');
      check=false;
    }

     return check;
}

//profession validation function
var comp_since_validater =function validator(name){
var check;
    //for name

  if(name != ""){
    $("#company_since_error").text(' ');
      check=true;
    }else{
      $("#company_since_error").removeClass('success');
      $("#company_since_error").addClass('alert');
      $("#company_since_error").text('Required');
      check=false;
    }

     return check;
}

//profession validation function
var comp_loc_validater =function validator(name){
var check;
    //for name

  if(name != ""){
    $("#company_loc_error").text(' ');
      check=true;
    }else{
      $("#company_loc_error").removeClass('success');
      $("#company_loc_error").addClass('alert');
      $("#company_loc_error").text('Required');
      check=false;
    }

     return check;
}

$('#company_info_form').on('submit', function(e){
  // alert("yws");
      var company_cname = $("#new_company_name").val();
      var company_ctype = $("#new_selected_company_type").val();
      var selected_city = $("#new_selected_city").val();
      var company_branch = $("#new_company_branch_name").val();
      var company_phone = $("#new_company_phone").val();
      var company_website = $("#new_company_website").val();
      var selected_employees = $("#new_selected_employees").val();
      var selected_industry = $("#new_selected_industry").val();
      var company_since = $("#new_company_since").val();
      var company_location = $("#new_company_location").val();

      var getcname=comp_cname_validater(company_cname);
      var getctype=comp_ctype_validater(company_ctype);
      var getcity=comp_city_validater(selected_city);
      var getbranch=comp_branch_validater(company_branch);
      var getphone=comp_phone_validater(company_phone);
      var getweb=comp_web_validater(company_website);
      var getemp=comp_employee_validater(selected_employees);
      var getindus=comp_indus_validater(selected_industry);
      var getsince=comp_since_validater(company_since);
      var getloc=comp_loc_validater(company_location);

      if(getcname && getctype && getcity && getbranch && getphone && getweb && getemp && getindus && getsince && getloc){
        return true;
      }else{
        swal("Error"," Data Not Updated","error");
        return false;
      }
});


///////////////////////////////////////
// branch_comp_validater function
var branch_comp_validater = function validator(name){
    var check;
    if(name){
      $("#c_branch_error").text("");
      check=true;
    }else{
      $("#c_branch_error").removeClass('success');
      $("#c_branch_error").addClass('alert');
      $("#c_branch_error").text("Required");
      check=false;
    }
return check;
}
// weblink_comp_validater function
var weblink_comp_validater = function validator(name){
    var check;
    if(name){
      $("#c_weblink_error").text("");
      check=true;
    }else{
      $("#c_weblink_error").removeClass('success');
      $("#c_weblink_error").addClass('alert');
      $("#c_weblink_error").text("Required");
      check=false;
    }
return check;
}

// emp_comp_validater function
var emp_comp_validater = function validator(name){
    var check;
    if(name){
      $("#c_cemployee_error").text("");
      check=true;
    }else{
      $("#c_cemployee_error").removeClass('success');
      $("#c_cemployee_error").addClass('alert');
      $("#c_cemployee_error").text("Required");
      check=false;
    }
return check;
}


// ind_comp_validater function
var ind_comp_validater = function validator(name){
    var check;
    if(name){
      $("#c_cindustry_error").text("");
      check=true;
    }else{
      $("#c_cindustry_error").removeClass('success');
      $("#c_cindustry_error").addClass('alert');
      $("#c_cindustry_error").text("Required");
      check=false;
    }
return check;
}

// sin_comp_validater function
var sin_comp_validater = function validator(name){
    var check;
    if(name){
      $("#c_csince_error").text("");
      check=true;
    }else{
      $("#c_csince_error").removeClass('success');
      $("#c_csince_error").addClass('alert');
      $("#c_csince_error").text("Required");
      check=false;
    }
return check;
}

// addr_comp_validater function
var addr_comp_validater = function validator(name){
    var check;
    if(name){
      $("#c_caddr_error").text("");
      check=true;
    }else{
      $("#c_caddr_error").removeClass('success');
      $("#c_caddr_error").addClass('alert');
      $("#c_caddr_error").text("Required");
      check=false;
    }
return check;
}

// doc_comp_validater function
var doc_comp_validater = function validator(FileUploadPath){
  var check;
 
    if (FileUploadPath == '') {
      $("#c_cdocument_error").removeClass('success');
      $("#c_cdocument_error").addClass('alert');
      $("#c_cdocument_error").text("Image Required");
      check=false;

    } else {
      var Extension = FileUploadPath.substring(
        FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "gif" || Extension == "png" || Extension == "bmp"
  || Extension == "jpeg" || Extension == "jpg") {

// To Display


    $("#c_cdocument_error").text(" ");
    check=true;
  

} 

//The file upload is NOT an image
else {
  // alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
      $("#c_cdocument_error").removeClass('success');
      $("#c_cdocument_error").addClass('alert');
      $("#c_cdocument_error").text("Only Allow document in Picture form");
      check=false;
}
}



return check;
}

// info_comp_validater function
var info_comp_validater = function validator(name){
    var check;
    if(name){
      $("#c_cinfo_error").text("");
      check=true;
    }else{
      $("#c_cinfo_error").removeClass('success');
      $("#c_cinfo_error").addClass('alert');
      $("#c_cinfo_error").text("Required");
      check=false;
    }
return check;
}
//main function validation

$('#CompanyInfoForm').on('submit', function(e){
  // alert("yes");
      var company_branch = $("#company_branch_name").val();
      var company_website = $("#company_website").val();
      var selected_employee = $("#selected_employees").val();
      var company_indus = $("#selected_industry").val();
      var company_since = $("#company_s").val();
      var company_loc = $("#company_location").val();
      var selected_doc = $("#company_doc").val();
      var selected_info = CKEDITOR.instances['company_info'].getData();

      var getbranch=branch_comp_validater(company_branch);
      var getweblink=weblink_comp_validater(company_website);
      var getemp=emp_comp_validater(selected_employee);
      var getindus=ind_comp_validater(company_indus);
      var getsince=sin_comp_validater(company_since);
      var geloc=addr_comp_validater(company_loc);
      
      var getinfo=info_comp_validater(selected_info);

      var fuData = document.getElementById('company_doc');
        var FileUploadPath = fuData.value;
        var getdoc=doc_comp_validater(FileUploadPath);

      // alert(getbranch);alert(getweblink);alert(getemp);
      if(getbranch && getweblink && getemp && getindus && getsince && getloc && getdoc && getinfo){
        return true;
      }else{
      return false;
      swal("error","Failed to Upload Data","error");
    }

});

