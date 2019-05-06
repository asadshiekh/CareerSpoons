
function user_login(){

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var user_email = $("#user_email").val();
	var user_password = $("#user_password").val();
var l = window.location;
var base_url = l.protocol + "//" + l.host + "/do-user-login";
var use_i = l.protocol + "//" + l.host + "/user-login";
// alert(use_m);
	$.post(base_url,{_token:CSRF_TOKEN,user_email:user_email,user_password:user_password},function(data){ 

		if(data =="yes"){				

			//alert(data);
				setTimeout(
					function(){


						Swal.fire({
							type: 'success',
							title: 'Login Successfully!',
							showConfirmButton: false,
							timer: 1500
						});

						//swal('Login Successfully!','','success');

					},
					1200
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
			else if(data="no"){

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






	//for email  validation

	//first function
	 var validateEmail = function(elementValue) {
    	var emailPattern = /^[a-zA-Z].[a-zA-Z0-9._]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/;
    	return emailPattern.test(elementValue);
    }
    //second function 
	var email_validater = function validater(email){
		var check;

		if(email != ""){
			var valid = validateEmail(email);

			if (!valid){
				$("#email-error").text('Wrong Email');
				$("#email-error").removeClass('success');
				$('input[id="user_email"]').removeClass('user-success');
				$('input[id="user_email"]').addClass('user-danger');
				$("#email-error").addClass('alert');
				check=false;

			} else {
				$("#email-error").text(' ');
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
//function deals on front end
 

  // function checkemail(){
  //   	var email=$("#user_email").val();
  //   	if(email != ""){
  //   		var valid = validateEmail(email);

  //   		if (!valid) {
  //   			$("#email-error").text('Invalid email format');
  //   			$("#email-error").removeClass('success');
  //   			$('input[id="email"]').removeClass('user-success');
  //   			$('input[id="email"]').addClass('user-danger');
  //   			$("#email-error").addClass('alert');

  //   		} else {
  //   			$("#email-error").text('Looks Good now');
		// 		$('input[id="email"]').removeClass('user-danger');
		// 		$('input[id="email"]').addClass('user-success');
		// 		$("#email-error").removeClass('alert');
		// 		$("#email-error").addClass('success');
  //   		}			
  //   	}else{
  //   		$('input[id="email"]').removeClass('user-success');
  //   		$('input[id="email"]').removeClass('user-danger');
  //   		$("#email-error").text(' ');
  //   	}
  //   }
    //email validation function end

    //password function 
    var pass_validater = function validater(pass){
	var check;
		//for pass
		if(pass != ""){
			
					$("#pass-error").removeClass('success');
					$('input[id="user_password"]').removeClass('user-success');
					$('input[id="user_password"]').addClass('user-danger');
					$("#pass-error").addClass('alert');
					$("#pass-error").text(' ');
					check=true;

					
			
		}else{
			$("#pass-error").removeClass('success');
			$('input[id="user_password"]').removeClass('user-success');
			$('input[id="user_password"]').addClass('user-danger');
			$("#pass-error").addClass('alert');
			$("#pass-error").text('Password is empty');
			check=false;

		}
		

		return check;
	}
//main validate function  onclick button
function validate_user_login(){
	var email = $("#user_email").val();
	var pass = $("#user_password").val();
	//alert("yes");
	var getemail=email_validater(email);
	var getpass=pass_validater(pass);
    // alert(getemail);

		if(getemail){
			

			//var dood = get_dbemail(email,returnData);
			//function returnData(read){
				//if(read =="true"){
				if(getpass){

						//alert("yes");
						user_login();
				}else{
					$("#pass-error").removeClass('success');
					$('input[id="user_password"]').removeClass('user-success');
					$('input[id="user_password"]').addClass('user-danger');
					$("#pass-error").addClass('alert');
					$("#pass-error").text('Password is required');
				}

		}
		//else{
		//      	//alert("oh no");
		//      	$("#email-error").removeClass('success');
		//      	$('input[id="email"]').removeClass('user-success');
		//      	$('input[id="email"]').addClass('user-danger');
		//      	$("#email-error").addClass('alert');
		//      	$("#email-error").text('Wrong Email');
		//      }

}

// function yahooo(){
// 	alert("good one");
// }

