function company_login(){


	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var company_email = $("#company_email").val();
	var company_password = $("#company_password").val();

	// alert(CSRF_TOKEN+company_email+company_password);

	var l = window.location;
	var base_url = l.protocol + "//" + l.host + "/do-company-login";
	var use_i = l.protocol + "//" + l.host + "/company-login";
	$.post(base_url,{_token:CSRF_TOKEN,company_email:company_email,company_password:company_password},function(data){


				if(data=="yes"){				

				setTimeout(
					function(){

						swal('Login Successfully!','','success');

					},
					1000
					);

				setTimeout(
					function(){
						if(window.location == use_i){
                         window.location.replace("/");
						}
                        else{
						window.location.replace(window.location);
					}
					},
					2100
					);


			}
			else if(data=="nups"){

				setTimeout(
					function(){

						swal({
							type: 'error',
							title: 'Oops...',
							text: 'Your Account is Currently Blocked!!',
							footer: '<a href>Why do I have this issue?</a>'
						})
					},
					1000
					);
			}else if(data =="no"){
				setTimeout(
					function(){

						swal({
							type: 'error',
							title: 'Oops...',
							text: 'Something went wrong Failed To Login!!',
							footer: '<a href>Why do I have this issue?</a>'
						})
					},
					1000
					);

			}

	}); 
}

// company_login();
//for email  validation

	//first function
	 var validateEmail = function(elementValue) {
    	var emailPattern = /^[a-zA-Z].[a-zA-Z0-9._]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/;
    	return emailPattern.test(elementValue);
    }
    //second function 
	var email_c_validater = function validater(email){
		var check;

		if(email != ""){
			var valid = validateEmail(email);

			if (!valid){
				$("#emailc-error").text('Wrong Email format');
				$("#emailc-error").removeClass('success');
				$('input[id="user_email"]').removeClass('user-success');
				$('input[id="user_email"]').addClass('user-danger');
				$("#emailc-error").addClass('alert');
				check=false;

			} else {
				$("#emailc-error").text(' ');
				check=true;		        

			}			
		}else {
			$("#emailc-error").removeClass('success');
			$('input[id="user_email"]').removeClass('user-success');
			$('input[id="user_email"]').addClass('user-danger');
			$("#emailc-error").addClass('alert');
			$("#emailc-error").text('Email is required');
			check=false;
		}
		
		return check;
	}
//function deals on front end
 

  function checkCemail(){
    	var email=$("#company_email").val();
    	if(email != ""){
    		var valid = validateEmail(email);

    		if (!valid) {
    			$("#emailc-error").text('Invalid email format');
    			$("#emailc-error").removeClass('success');
    			$('input[id="company_email"]').removeClass('user-success');
    			$('input[id="company_email"]').addClass('user-danger');
    			$("#emailc-error").addClass('alert');

    		} else {
    			$("#emailc-error").text('Looks Good now');
				$('input[id="company_email"]').removeClass('user-danger');
				$('input[id="company_email"]').addClass('user-success');
				$("#emailc-error").removeClass('alert');
				$("#emailc-error").addClass('success');
    		}			
    	}else{
    		$('input[id="company_email"]').removeClass('user-success');
    		$('input[id="company_email"]').removeClass('user-danger');
    		$("#emailc-error").text(' ');
    	}
    }
    //email validation function end

    //password function 
    var pass_c_validater = function validater(pass){
	var check;
		//for pass
		if(pass != ""){
			
					$("#passc-error").removeClass('success');
					$('input[id="company_password"]').removeClass('user-success');
					$('input[id="company_password"]').addClass('user-danger');
					$("#passc-error").addClass('alert');
					$("#passc-error").text(' ');
					check=true;

					
			
		}else{
			$("#passc-error").removeClass('success');
			$('input[id="company_password"]').removeClass('user-success');
			$('input[id="company_password"]').addClass('user-danger');
			$("#passc-error").addClass('alert');
			$("#passc-error").text('Password is empty');
			check=false;

		}
		

		return check;
	}
//main validate function  onclick button
function validate_company_login(){
	var email = $("#company_email").val();
	var pass = $("#company_password").val();
	
	//alert("yes");
	var getemail=email_c_validater(email);
	var getpass=pass_c_validater(pass);
    // alert(getemail);

		if(getemail){
			

			//var dood = get_dbemail(email,returnData);
			//function returnData(read){
				//if(read =="true"){
				if(getpass){

						//alert("yes");
						company_login();
				}else{
					$("#pass-error").removeClass('success');
					$('input[id="user_password"]').removeClass('user-success');
					$('input[id="user_password"]').addClass('user-danger');
					$("#pass-error").addClass('alert');
					$("#pass-error").text('Password is empty');
				}

		}
		// else{
		//      	//alert("oh no");
		//      	$("#email-error").removeClass('success');
		//      	$('input[id="email"]').removeClass('user-success');
		//      	$('input[id="email"]').addClass('user-danger');
		//      	$("#email-error").addClass('alert');
		//      	$("#email-error").text('Wrong Email');
		//      }

}
// function validate_company_login(){
// 	var company_email = $("#company_email").val();
// 	var company_password = $("#company_password").val();

// 	alert("yes");
// }