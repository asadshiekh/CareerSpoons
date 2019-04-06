function register_company(){


	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var company_name = $("#company_name").val();
	var company_email = $("#company_email").val();
	var company_password = $("#password-field").val();
	var company_type = $("#company_type").val();
	var company_city = $("#company_city").val();
	var company_phone_number = $("#company_phone_number").val();
	var company_cnic = $("#company_cnic").val();
	var isChecked = $('#checkbox:checked').val()?true:false;


	$.post("company-registeration-process",{_token:CSRF_TOKEN,company_name:company_name,company_email:company_email,
		company_password:company_password,company_type:company_type,company_city:company_city,company_phone_number:company_phone_number,company_cnic:company_cnic,isChecked:isChecked},function(data){ 



			//alert(data);

			if(data=="yes"){

				setTimeout(
					function(){

						swal(" "+company_name+' Account Created Successfully!','We have send you Email please Verify your Account','success');
						//swal({type: 'success',title: 'Oops...',text: 'Something went wrong!',footer: '<a href>Why do I have this issue?</a>'});
					},
					1500
					);

				$.post("company-registration-email-send",{_token:CSRF_TOKEN,company_name:company_name,company_email:company_email},function(data){


				});

			}

			else{

				setTimeout(
					function(){

						swal({type: 'success',title: 'Oops...',text: 'Something went wrong!',footer: '<a href>Why do I have this issue?</a>'})
					},
					1600
					);

			}
			


		});

}

//////company name functions
//front end functions for name
function checkname() {
		var name=$("#company_name").val();
		if(name != ""){
			if(name.match("^[a-zA-Z\(\) ]+$")){
				if(name.length<3){	
					$("#name-error").removeClass('success');
					$('input[id="company_name"]').removeClass('user-success');
					$('input[id="company_name"]').addClass('user-danger');
					$("#name-error").addClass('alert');
					$("#name-error").text('Atleast 3 character');
				}else if(name.length>=3){
					$('input[id="company_name"]').removeClass('user-danger');
					$('input[id="company_name"]').addClass('user-success');
					$("#name-error").removeClass('alert');
					$("#name-error").addClass('success');
					$("#name-error").text('looking nice');
				}
			}else{
				$("#name-error").removeClass('success');
				$('input[id="company_name"]').removeClass('user-success');
				$('input[id="company_name"]').addClass('user-danger');
				$("#name-error").addClass('alert');
				$("#name-error").text('Enter alphabets');
			}
		}else{

			$('input[id="company_name"]').removeClass('user-success');
			$('input[id="company_name"]').removeClass('user-danger');
			$("#name-error").text(' ');

		}

	}
//backend functions for name
 var name_validater = function validater(name){
    	var check;
		//for name

		if(name != ""){

			if(name.match("^[a-zA-Z\(\) ]+$")){
				if(name.length<3){	
					$("#name-error").removeClass('success');
					$('input[id="company_name"]').removeClass('user-success');
					$('input[id="company_name"]').addClass('user-danger');
					$("#name-error").addClass('alert');
					$("#name-error").text('Atleast 5 character');
					//return false;
					check=false;
				}else if(name.length>=3){
					$('input[id="company_name"]').removeClass('user-danger');
					$('input[id="company_name"]').addClass('user-success');
					$("#name-error").removeClass('alert');
					$("#name-error").addClass('success');
					$("#name-error").text('looking nice');
					//return true;
					check=true;
				}
			}else{
				$("#name-error").removeClass('success');
				$('input[id="company_name"]').removeClass('user-success');
				$('input[id="company_name"]').addClass('user-danger');
				$("#name-error").addClass('alert');
				$("#name-error").text('Enter only alphabet');
				//return false;
				check=false;
			}
               ////end name       
         //last
     }else{
     	$("#name-error").removeClass('success');
     	$('input[id="company_name"]').removeClass('user-success');
     	$('input[id="company_name"]').addClass('user-danger');
     	$("#name-error").addClass('alert');
     	$("#name-error").text('Name is empty');
     	check=false;
     }

     return check;
 }
//front and backend functions for name end

//////company email functions
//front end functions for email
var validateEmail = function(elementValue) {
    	var emailPattern = /^[a-zA-Z].[a-zA-Z0-9._]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/;
    	return emailPattern.test(elementValue);
    }
function checkemail(){
    	var email=$("#company_email").val();
    	if(email != ""){
    		var valid = validateEmail(email);

    		if (!valid) {
    			$("#email-error").text('Wrong Format');
    			$("#email-error").removeClass('success');
    			$('input[id="company_email"]').removeClass('user-success');
    			$('input[id="company_email"]').addClass('user-danger');
    			$("#email-error").addClass('alert');

    		} else {
    			$("#email-error").text('Looking Good');

    			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    			$.get("check-company-email",{_token:CSRF_TOKEN,email:email},function(data){
    				if(data>0){
    					$("#email-error").removeClass('success');
    					$('input[id="company_email"]').removeClass('user-success');
    					$('input[id="company_email"]').addClass('user-danger');
    					$("#email-error").addClass('alert');
    					$("#email-error").text('email already exist');

    				}else{
    					$('input[id="company_email"]').removeClass('user-danger');
    					$('input[id="company_email"]').addClass('user-success');
    					$("#email-error").removeClass('alert');
    					$("#email-error").addClass('success');
    					$("#email-error").text('Email Available');
    				}
    			});	
    		}			
    	}else{
    		$('input[id="company_email"]').removeClass('user-success');
    		$('input[id="company_email"]').removeClass('user-danger');
    		$("#email-error").text(' ');
    	}
    }
//email backend function

var email_validater = function validater(email){
		var check;

		if(email != ""){
			var valid = validateEmail(email);
// alert(valid);
			if (!valid){
				$("#email-error").text('Wrong Format');
				$("#email-error").removeClass('success');
				$('input[id="user_email"]').removeClass('user-success');
				$('input[id="user_email"]').addClass('user-danger');
				$("#email-error").addClass('alert');
				check=false;

			} else {
				$("#email-error").text('Looking Good');
				check=true;		        

			}			
		}else {
			$("#email-error").removeClass('success');
			$('input[id="user_email"]').removeClass('user-success');
			$('input[id="user_email"]').addClass('user-danger');
			$("#email-error").addClass('alert');
			$("#email-error").text('Email is required');
			check=false;
		}
		
		return check;
	}
		var get_dbemail = function db_email(email,callback){

		$.get("check-company-email",{email:email},function(data){
			if(data>0){
				$("#email-error").removeClass('success');
				$('input[id="user_email"]').removeClass('user-success');
				$('input[id="user_email"]').addClass('user-danger');
				$("#email-error").addClass('alert');
				$("#email-error").text('Email already exist');
				var good="false";
				callback(good);
			}
			else{
				$('input[id="user_email"]').removeClass('user-danger');
				$('input[id="user_email"]').addClass('user-success');
				$("#email-error").removeClass('alert');
				$("#email-error").addClass('success');
				$("#email-error").text('Email Available');
				var good="true";
				callback(good);
			}
		});
		
		return good;
	}
//backend functions for email

//////company password functions
//front end functions for password
function checkpass() {
   	var pass=$("#password-field").val();
   	if(pass != ""){
   		if(pass.match("^[a-zA-Z]|[a-zA-Z].[a-zA-Z0-9!@_]+$")){
   			if(pass.length<8){	
   				$("#pass-error").removeClass('success');
   				$('input[id="password-field"]').removeClass('user-success');
   				$('input[id="password-field"]').addClass('user-danger');
   				$("#pass-error").addClass('alert');
   				$("#pass-error").text('Enter atleast 8 character');
   			}else if(pass.length>8){
   				$('input[id="password-field"]').removeClass('user-danger');
   				$('input[id="password-field"]').addClass('user-success');
   				$("#pass-error").removeClass('alert');
   				$("#pass-error").addClass('success');
   				$("#pass-error").text('looking nice');
   			}
   		}else{
   			$("#pass-error").removeClass('success');
   			$('input[id="password-field"]').removeClass('user-success');
   			$('input[id="password-field"]').addClass('user-danger');
   			$("#pass-error").addClass('alert');
   			$("#pass-error").text('1st word should be alphabet');
   		}
   	}else{

   		$('input[id="password-field"]').removeClass('user-success');
   		$('input[id="password-field"]').removeClass('user-danger');
   		$("#pass-error").text(' ');

   	}

   }
  //backend password functions
  var pass_validater = function validater(pass){
	var check;
		//for pass
		if(pass != ""){
			if(pass.match("^[a-zA-Z]|[a-zA-Z].[a-zA-Z0-9._\(\)]+$")){
				if(pass.length<8){	
					$("#pass-error").removeClass('success');
					$('input[id="password-field"]').removeClass('user-success');
					$('input[id="password-field"]').addClass('user-danger');
					$("#pass-error").addClass('alert');
					$("#pass-error").text('Enter atleast 8 character');
					check=false;
				}else if(pass.length>8){
					$('input[id="password-field"]').removeClass('user-danger');
					$('input[id="password-field"]').addClass('user-success');
					$("#pass-error").removeClass('alert');
					$("#pass-error").addClass('success');
					$("#pass-error").text('Looking Nice');
					check=true;
				}
			}else{
				$("#pass-error").removeClass('success');
				$('input[id="password-field"]').removeClass('user-success');
				$('input[id="password-field"]').addClass('user-danger');
				$("#pass-error").addClass('alert');
				$("#pass-error").text('1st word should be Alphabet');
				check=false;
			}
		}else{
			$("#pass-error").removeClass('success');
			$('input[id="password-field"]').removeClass('user-success');
			$('input[id="password-field"]').addClass('user-danger');
			$("#pass-error").addClass('alert');
			$("#pass-error").text('Password is empty');
			check=false;

		}
		

		return check;
	}
//backend functions for password
/// no validation

 function checknumber() {
    	var phone=$("#company_phone_number").val();
    	//alert(phone.length);
    	if(phone != ""){
    		//var valid = validatenumber(phone);
    		if (phone.length == 15) {
    			$('input[id="company_phone_number"]').removeClass('user-danger');
    			$('input[id="company_phone_number"]').addClass('user-success');
    			$("#phone-error").removeClass('alert');
    			$("#phone-error").addClass('success');
    			$("#phone-error").html(' ');
    			
    			$new=phone;
    		}else {
    			$("#phone-error").removeClass('success');
    			$('input[id="company_phone_number"]').removeClass('user-success');
    			$('input[id="company_phone_number"]').addClass('user-danger');
    			$("#phone-error").addClass('alert');
    			$("#phone-error").text('please enter only digits');
    			
    		}

    	}else{

    		$('input[id="company_phone_number"]').removeClass('user-success');
    		$('input[id="company_phone_number"]').removeClass('user-danger');
    		$("#phone-error").text(' ');

    	}

    }
//backend function 
var phone_validater = function validater(phone){
	var check;

	if(phone != ""){
		//var valid = validatenumber(phone);
		if (phone.length == 15) {
			$('input[id="company_phone_number"]').removeClass('user-danger');
			$('input[id="company_phone_number"]').addClass('user-success');
			$("#phone-error").removeClass('alert');
			$("#phone-error").addClass('success');
			$("#phone-error").html(' ');
			$new=phone;
			check= true;
			
		}else {
			$("#phone-error").removeClass('success');
			$('input[id="company_phone_number"]').removeClass('user-success');
			$('input[id="company_phone_number"]').addClass('user-danger');
			$("#phone-error").addClass('alert');
			$("#phone-error").text('please enter only digits');
			check=false;
			//[0-4]{1}.[0-9]{1}
		}

	}else{
		$("#phone-error").removeClass('success');
		$('input[id="company_phone_number"]').removeClass('user-success');
		$('input[id="company_phone_number"]').addClass('user-danger');
		$("#phone-error").addClass('alert');
		$("#phone-error").text('Phone no is required');
		check=false;
	}

	return check;
}



////cnic number 
 function checkcnic() {
    	var cnic=$("#company_cnic").val();
    	//alert(phone.length);
    	if(cnic != ""){
    		//var valid = validatenumber(phone);
    		if (cnic.length == 15) {
    			$('input[id="company_cnic"]').removeClass('user-danger');
    			$('input[id="company_cnic"]').addClass('user-success');
    			$("#cnic-error").removeClass('alert');
    			$("#cnic-error").addClass('success');
    			$("#cnic-error").html(' ');
    			
    			$new=cnic;
    		}else {
    			$("#cnic-error").removeClass('success');
    			$('input[id="company_cnic"]').removeClass('user-success');
    			$('input[id="company_cnic"]').addClass('user-danger');
    			$("#cnic-error").addClass('alert');
    			$("#cnic-error").text('please enter all digits');
    			
    		}

    	}else{

    		$('input[id="company_cnic"]').removeClass('user-success');
    		$('input[id="company_cnic"]').removeClass('user-danger');
    		$("#cnic-error").text(' ');

    	}

    }
//backend function 
var cnic_validater = function validater(cnic){
	var check;
    
	if(cnic != ""){
		//var valid = validatenumber(phone);
		if (cnic.length == 15) {
			$('input[id="company_cnic"]').removeClass('user-danger');
			$('input[id="company_cnic"]').addClass('user-success');
			$("#cnic-error").removeClass('alert');
			$("#cnic-error").addClass('success');
			$("#cnic-error").html(' ');
			$new=cnic;
			check= true;
			
		}else {
			$("#cnic-error").removeClass('success');
			$('input[id="company_cnic"]').removeClass('user-success');
			$('input[id="company_cnic"]').addClass('user-danger');
			$("#cnic-error").addClass('alert');
			$("#cnic-error").text('please enter all digits');
			check=false;
			//[0-4]{1}.[0-9]{1}
		}

	}else{
		$("#cnic-error").removeClass('success');
		$('input[id="company_cnic"]').removeClass('user-success');
		$('input[id="company_cnic"]').addClass('user-danger');
		$("#cnic-error").addClass('alert');
		$("#cnic-error").text('Phone no is required');
		check=false;
	}

	return check;
}
//for city 
 var city_validater = function validater(city){
    	var check;

    	if (city) {
    		$("#city-error").removeClass('alert');
			$('select[id="city"]').removeClass('user-danger');
			$('select[id="city"]').addClass('user-success');
			$("#city-error").addClass('success');
			$("#city-error").text('');
          check=true;
    	}else{
    		$("#city-error").removeClass('success');
			$('select[id="city"]').removeClass('user-success');
			$('select[id="city"]').addClass('user-danger');
			$("#city-error").addClass('alert');
			$("#city-error").text('I think you forget to select city');
            check=false;
    		}
        return check;
    }
    //for city 
 var type_validater = function validater(type){
    	var check;
    	//alert(type);

    	if (type) {
    		$("#type-error").removeClass('alert');
			$('select[id="company_type"]').removeClass('user-danger');
			$('select[id="company_type"]').addClass('user-success');
			$("#type-error").addClass('success');
			$("#type-error").text('');
          check=true;
    	}else{
    		$("#type-error").removeClass('success');
			$('select[id="company_type"]').removeClass('user-success');
			$('select[id="company_type"]').addClass('user-danger');
			$("#type-error").addClass('alert');
			$("#type-error").text('Forget to select company type');
            check=false;
    		}
        return check;
    }

/////company validation main function
function company_validate(){
	//alert("yes");
	    var name=$("#company_name").val();
	    var email=$("#company_email").val();
		 var pass=$("#password-field").val();
		 var cnic =$("#company_cnic").val(); 
		 var phone=$("#company_phone_number").val();
		 var city=$("#company_city").val();
		 var type = $("#company_type").val();
		//alert(phone + cnic);


		 var getname=name_validater(name);
		 var getemail=email_validater(email);
		 var getpass=pass_validater(pass);
		 var getcity=city_validater(city);
		 var gettype=type_validater(type);

		 var getphone=phone_validater(phone);
		 var getcnic=cnic_validater(cnic);
		 
		
		//alert("name "+gettype);
		// alert("user "+getuser);
		// alert("phone "+getphone);
		// alert("email "+type);
		//alert(getcnic);

		if(getemail){
			var dood = get_dbemail(email,returnData);
			function returnData(read){
				if(read =="true"){
					if(getname && getcnic && getpass && getphone && getcity && gettype){
						company_registration();
						//yahooo();
					}
				}
				else{
		     	//alert("oh no");
		     	$("#email-error").removeClass('success');
		     	$('input[id="user_email"]').removeClass('user-success');
		     	$('input[id="user_email"]').addClass('user-danger');
		     	$("#email-error").addClass('alert');
		     	$("#email-error").text('email already exist');
		     }
		}


		}
}
//test fynction

// function yahooo(){
// 	alert("yes");
// }
