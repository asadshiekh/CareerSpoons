var can_name_validater = function validator(name){
	var check;
		//for name

		if(name != ""){

			if(name.match("^[a-zA-Z\(\) ]+$")){
				$("#can_name_error").text(' ');
			     check=true;
			}else{
				$("#can_name_error").removeClass('success');
				$("#can_name_error").addClass('alert');
				$("#can_name_error").text('Contains only alphabet');
				//return false;
				check=false;
			}
               ////end name       
         //last
     }else{
     	$("#can_name_error").removeClass('success');
     	$("#can_name_error").addClass('alert');
     	$("#can_name_error").text('Required');
     	check=false;
     }

     return check;
}

//profession validation function
var can_pro_validater =function validator(name){
var check;
		//for name

	if(name != ""){
		$("#can_protitle_error").text(' ');
	    check=true;
    }else{
     	$("#can_protitle_error").removeClass('success');
     	$("#can_protitle_error").addClass('alert');
     	$("#can_protitle_error").text('Required');
     	check=false;
    }

     return check;
}

//city validator

 var can_city_validater = function validater(city){
    	var check;
    	
	if(city != ""){
			$("#can_city_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_city_error").removeClass('success');
	     	$("#can_city_error").addClass('alert');
	     	$("#can_city_error").text('Required');
	     	check=false;
	    }
     return check;
 }

 //DOB validation
 var can_DOB_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_DOB_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_DOB_error").removeClass('success');
	     	$("#can_DOB_error").addClass('alert');
	     	$("#can_DOB_error").text('Required');
	     	check=false;
	    }
     return check;
 }

 // can_gender_validater validation
  var can_gender_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_gender_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_gender_error").removeClass('success');
	     	$("#can_gender_error").addClass('alert');
	     	$("#can_gender_error").text('Required');
	     	check=false;
	    }
     return check;
 }

 //can_link_validater function


   var can_link_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_weblink_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_weblink_error").removeClass('success');
	     	$("#can_weblink_error").addClass('alert');
	     	$("#can_weblink_error").text('Required');
	     	check=false;
	    }
     return check;
 }

 //can_career_validater function

 
   var can_career_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_career_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_career_error").removeClass('success');
	     	$("#can_career_error").addClass('alert');
	     	$("#can_career_error").text('Required');
	     	check=false;
	    }
     return check;
 }

 //can_qual_validater function

 
   var can_qual_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_qual_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_qual_error").removeClass('success');
	     	$("#can_qual_error").addClass('alert');
	     	$("#can_qual_error").text('Required');
	     	check=false;
	    }
     return check;
 }

  //can_indus_validater function

 
   var can_indus_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_indus_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_indus_error").removeClass('success');
	     	$("#can_indus_error").addClass('alert');
	     	$("#can_indus_error").text('Required');
	     	check=false;
	    }
     return check;
 }

  //can_loc_validater function

 
   var can_loc_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_addr_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_addr_error").removeClass('success');
	     	$("#can_addr_error").addClass('alert');
	     	$("#can_addr_error").text('Required');
	     	check=false;
	    }
     return check;
 }
//main validation function

var function1 =  function validator(){
	// alert("yes hello???");
	var check;
	        var candidate_name =  $("#candidate_name").val();
			var candidate_profession =  $("#candidate_profession").val();
			var candidate_city =  $("#candidate_city").val();
			var candidate_dob =  $("#candidate_dob").val();
			var candidate_gender = $("#candidate_gender").val();
			var candidate_website =  $("#website_link").val();
			var candidate_career_level =  $("#candidate_career_level").val();
			var candidate_qualification =  $("#candidate_qualification").val();
			var candidate_industries =  $("#candidate_industries").val();
			
		    var candidate_location = $("#candidate_location").val();
          // alert(candidate_name);
          // alert(candidate_gender);

			var getname=can_name_validater(candidate_name);
			var getprofession=can_pro_validater(candidate_profession);
			var getcity=can_city_validater(candidate_city);
			var getDOB=can_DOB_validater(candidate_dob);
			var getgender=can_gender_validater(candidate_gender);
			var getlink=can_link_validater(candidate_website);
			var getcarer=can_career_validater(candidate_career_level);
			var getquall=can_qual_validater(candidate_qualification);
			var getin=can_indus_validater(candidate_industries);
			var getlo=can_loc_validater(candidate_location);
			// alert(getname +" "+ getprofession +" "+ getcity +" "+ getDOB +" "+ getgender +" "+ getlink +" "+ getcarer +" "+ getquall +" "+ getin +" "+ getlo);

			if(getname && getprofession && getcity && getDOB && getgender && getlink && getcarer && getquall && getin && getlo){
				check=true;
			}else{
				swal("Error"," Information Not Updated","error");
				check= false;
			}
			return check;
}

$('#adr_info_form').on('submit', function(e){
      var getfunction1=function1();
      if(getfunction1){
      	return true;
      }else{
      	return false;
      }
});

////////////////////////////////////////////////////////////////////////////
// about us function validation

//bio validate function
 var can_Bio_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_bio_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_bio_error").removeClass('success');
	     	$("#can_bio_error").addClass('alert');
	     	$("#can_bio_error").text('Required');
	     	check=false;
	    }
     return check;
 }
//main validation function

var function2= function validator(){
var check;
			var candidate_Bio = CKEDITOR.instances['profile_bio'].getData();

			var getBio=can_Bio_validater(candidate_Bio);

			// alert(getBio);

			if(getBio){
				check=true;
			}else{
				swal("Error"," Bio Not Updated","error");
				check=false;
			}
			return check;
}

$('#can_about_form').on('submit', function(e){
	// alert("yes");
	var functions=function2();
	if(functions){
		return true;
	}else{
		return false;
	}
});
//////////////////////////////////////////////////////////////////////////////////////
//fb function
 var can_fb_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_facebook_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_facebook_error").removeClass('success');
	     	$("#can_facebook_error").addClass('alert');
	     	$("#can_facebook_error").text('Required');
	     	check=false;
	    }
     return check;
 }

 //fb function
 var can_google_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_google_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_google_error").removeClass('success');
	     	$("#can_google_error").addClass('alert');
	     	$("#can_google_error").text('Required');
	     	check=false;
	    }
     return check;
 }

 //twitter function
 var can_twitter_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_twitter_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_twitter_error").removeClass('success');
	     	$("#can_twitter_error").addClass('alert');
	     	$("#can_twitter_error").text('Required');
	     	check=false;
	    }
     return check;
 }

 //linkedin function
 var can_linkedin_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_linkedin_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_linkedin_error").removeClass('success');
	     	$("#can_linkedin_error").addClass('alert');
	     	$("#can_linkedin_error").text('Required');
	     	check=false;
	    }
     return check;
 }

//main validation function can_social_form

var function3 = function validator(){
	var check;

			var candidate_fb = $("#candidate_facebook_social_link").val();
			var candidate_google = $("#candidate_google_social_link").val();
			var candidate_twitter = $("#candidate_twitter_social_link").val();
			var candidate_linkedin = $("#candidate_linkedin_social_link").val();

			var getfb=can_fb_validater(candidate_fb);
			var getgoogle=can_google_validater(candidate_google);
			var gettwitter=can_twitter_validater(candidate_twitter);
			var getlinkedin=can_linkedin_validater(candidate_linkedin);

			// alert(getBio);

			if(getfb && getgoogle && gettwitter && getlinkedin){
				check= true;
			}else{
				swal("Error"," Social Links Not Updated","error");
				check= false;
			}
			return check;
}

$('#can_social_form').on('submit', function(e){
 var getfunction3 =function3();
	 if(getfunction3){
	 	return true;
	 }else{
	 	return false;
	 }
});

///////////////////////////////////////////////////////////////////////////////////

// candidate job matching criteria function validation

// can_dd_validater function
 var can_dd_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_dd_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_dd_error").removeClass('success');
	     	$("#can_dd_error").addClass('alert');
	     	$("#can_dd_error").text('Required');
	     	check=false;
	    }
     return check;
 }

 // can_area_validater function
 var can_area_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_farea_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_farea_error").removeClass('success');
	     	$("#can_farea_error").addClass('alert');
	     	$("#can_farea_error").text('Required');
	     	check=false;
	    }
     return check;
 }

 // can_majo_validater function
 var can_majo_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_majo_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_majo_error").removeClass('success');
	     	$("#can_majo_error").addClass('alert');
	     	$("#can_majo_error").text('Required');
	     	check=false;
	    }
     return check;
 }

 // can_cty_validater function
 var can_cty_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_cty_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_cty_error").removeClass('success');
	     	$("#can_cty_error").addClass('alert');
	     	$("#can_cty_error").text('Required');
	     	check=false;
	    }
     return check;
 }

 // can_exp_validater function
 var can_exp_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_minexp_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_minexp_error").removeClass('success');
	     	$("#can_minexp_error").addClass('alert');
	     	$("#can_minexp_error").text('Required');
	     	check=false;
	    }
     return check;
 }

 // can_sal_validater function
 var can_sal_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_minsal_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_minsal_error").removeClass('success');
	     	$("#can_minsal_error").addClass('alert');
	     	$("#can_minsal_error").text('Required');
	     	check=false;
	    }
     return check;
 }

 // can_typ_validater function
 var can_typ_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_typ_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_typ_error").removeClass('success');
	     	$("#can_typ_error").addClass('alert');
	     	$("#can_typ_error").text('Required');
	     	check=false;
	    }
     return check;
 }

 // can_skill_validater function
 var can_skill_validater = function validater(value){
    	var check;
    	
	if(value != ""){
			$("#can_skil_error").text(' ');
		    check=true;
	    }else{
	     	$("#can_skil_error").removeClass('success');
	     	$("#can_skil_error").addClass('alert');
	     	$("#can_skil_error").text('Required');
	     	check=false;
	    }
     return check;
 }

// main validate function

$('#can_jobmatch_form').on('submit', function(e){

			var candidate_dd = $("#candidate_dd").val();
			var candidate_area = $("#candidate_functional_area").val();
			var candidate_major = $("#candidate_majors_area").val();
			var candidate_city = $("#candidate_criteria_city").val();
			var candidate_exp = $("#candidate_experience_level").val();
			var candidate_sal = $("#candidate_criteria_salary").val();
			var candidate_type = $("#candidate_job_type").val();
			var candidate_skill = $("#skilltags").val();

			var getdd=can_dd_validater(candidate_dd);
			var getarea=can_area_validater(candidate_area);
			var getmajo=can_majo_validater(candidate_major);
			var getcty=can_cty_validater(candidate_city);
			var getexp=can_exp_validater(candidate_exp);
			var getsal=can_sal_validater(candidate_sal);
			var gettyp=can_typ_validater(candidate_type);
			var getskill=can_skill_validater(candidate_skill);

			// alert(getBio);

			if(getdd && getarea && getmajo && getcty && getexp && getsal && gettyp && getskill){
				return true;
			}else{
				swal("Error"," Social Links Not Updated","error");
				return false;
			}
});






/////////////////////////////////////////////////////////////////////////////
// can_general_form function validation


// main validation function
$('#can_general_form').on('submit', function(e){
	// alert("yes");
	var getf1=function1();
	var getf2=function2();
	var getf3=function3();
	// alert(getf1 + " "+getf2 +" "+getf3);
	
	if(getf1 && getf2 && getf3){
		return true;
	}else{
		return false;
	}
	
});



/////////////////////////////////////////////////////////////////////////////////
// candidate review

var candy_review_validater = function validater(value){
      var check;
      
  if(value != ""){
      $("#candy_review_error").text(' ');
        check=true;
      }else{
        $("#candy_review_error").removeClass('success');
        $("#candy_review_error").addClass('alert');
        $("#candy_review_error").text('Required * ');
        check=false;
      }
     return check;
 }

function candy_review_validation(){
 // alert("yes");
      var company_Bio = CKEDITOR.instances['rating_pro'].getData();

      var getReview=candy_review_validater(company_Bio);

      // alert(getBio);

      if(getReview){
      	review();
        //return true;
      }else{
        swal("Error"," Review Not Updated","error");
       // return false;
      }
      
}