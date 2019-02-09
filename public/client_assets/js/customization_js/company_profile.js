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
