function user_registration(){

	$("#user_btn").attr("disabled",true);

	// auto_timer();

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var notyf = new Notyf();
	var candidate_name = $("#candidate_name").val();
	var user_email = $("#user_email").val();
	var user_password = $("#password-field").val();
	var username = $("#username").val();
	var phone_number = $("#phone_number").val();
	var checkbox = $('#checkbox:checked').val()?true:false;

	//alert(phone_number);
	$.post("user-registration-process",{_token:CSRF_TOKEN,candidate_name:candidate_name,user_email:user_email,
		user_password:user_password,username:username,phone_number:phone_number,checkbox:checkbox},function(data){ 
			


			if(data=="yes"){
				

				setTimeout(function(){swal(" "+candidate_name+' Account Created Successfully!','We have send you Email please Verify your Account','success');
						//swal({type: 'success',title: 'Oops...',text: 'Something went wrong!',footer: '<a href>Why do I have this issue?</a>'});	
					},
					1000
					);
				$.post("user-registration-email-send",{_token:CSRF_TOKEN,candidate_name:candidate_name,user_email:user_email},function(data){

						
				});

			}


			else if(data=="no"){				

				setTimeout(
					function(){
						swal({type: 'success',title: 'Oops...',text: 'Something went wrong!',footer: '<a href>Why do I have this issue?</a>'})
					},
					1000
					);	
			}


			else {

								$('#name-error').empty();
            	$('#email-error').empty();
            	$('#pass-error').empty();
            	$('#user-error').empty();
            	$('#phone-error').empty();

				jQuery.each(data,function(key,value){

				notyf.alert('<b>'+value+'</b>');

				if(key=="candidate_name"){
					$('#name-error').append(value);
				}

				if(key=="user_email"){
					$('#email-error').append(value);
				}

				if(key=="user_password"){  
                  $('#pass-error').append(value);
                }

                if(key=="username"){  
                  $('#user-error').append(value);
                }

                if(key=="phone_number"){  
                  $('#phone-error').append(value);
                }

				});


    	            $("#user_btn").attr("disabled",false);
			}




		});
}


// function auto_timer(){
// 	swal({
//   title: 'Sweet!',
//   text: 'Modal with a custom image.',
//   imageUrl: "public/client_assets/img/random/circle.gif",
//   imageWidth: 400,
//   imageHeight: 200,
//   imageAlt: 'Custom image',
//   animation: false
// })


//  }

// function company_city_adding(){
// 	var company_city = $("#add_company_city").val();
// 	$.get("adding-company-city",{company_city:company_city},function(data){ 
// 		if (data){
// 			$("#city-option:last-child").after(data);
// 			$("#myModal1 .close").click();
// 			setTimeout(
// 				function(){

// 					swal("Successfully Created New City!", "City Added Successfully in Your DataBase!", "success");
// 				},
// 				1000
// 				);
// 		}
// 	});
// }



//user registeration front end functions

//for name
// function checkname() {
// 		var name=$("#candidate_name").val();
// 		if(name != ""){
// 			if(name.match("^[a-zA-Z\(\) ]+$")){
// 				if(name.length<5){	
// 					$("#name-error").removeClass('success');
// 					$('input[id="candidate_name"]').removeClass('user-success');
// 					$('input[id="candidate_name"]').addClass('user-danger');
// 					$("#name-error").addClass('alert');
// 					$("#name-error").text('please enter atleast 5 character');
// 				}else if(name.length>5){
// 					$('input[id="candidate_name"]').removeClass('user-danger');
// 					$('input[id="candidate_name"]').addClass('user-success');
// 					$("#name-error").removeClass('alert');
// 					$("#name-error").addClass('success');
// 					$("#name-error").text('looking nice');
// 				}
// 			}else{
// 				$("#name-error").removeClass('success');
// 				$('input[id="candidate_name"]').removeClass('user-success');
// 				$('input[id="candidate_name"]').addClass('user-danger');
// 				$("#name-error").addClass('alert');
// 				$("#name-error").text('name contains only alphabet');
// 			}
// 		}else{

// 			$('input[id="candidate_name"]').removeClass('user-success');
// 			$('input[id="candidate_name"]').removeClass('user-danger');
// 			$("#name-error").text(' ');

// 		}

// 	}
// //backend functions for name
//  var name_validater = function validater(name){
//     	var check;
// 		//for name

// 		if(name != ""){

// 			if(name.match("^[a-zA-Z\(\) ]+$")){
// 				if(name.length<5){	
// 					$("#name-error").removeClass('success');
// 					$('input[id="fullname"]').removeClass('user-success');
// 					$('input[id="fullname"]').addClass('user-danger');
// 					$("#name-error").addClass('alert');
// 					$("#name-error").text('please enter atleast 5 character');
// 					//return false;
// 					check=false;
// 				}else{
// 					$('input[id="fullname"]').removeClass('user-danger');
// 					$('input[id="fullname"]').addClass('user-success');
// 					$("#name-error").removeClass('alert');
// 					$("#name-error").addClass('success');
// 					$("#name-error").text('looking nice');
// 					//return true;
// 					check=true;
// 				}
// 			}else{
// 				$("#name-error").removeClass('success');
// 				$('input[id="fullname"]').removeClass('user-success');
// 				$('input[id="fullname"]').addClass('user-danger');
// 				$("#name-error").addClass('alert');
// 				$("#name-error").text('name contains only alphabet');
// 				//return false;
// 				check=false;
// 			}
//                ////end name       
//          //last
//      }else{
//      	$("#name-error").removeClass('success');
//      	$('input[id="fullname"]').removeClass('user-success');
//      	$('input[id="fullname"]').addClass('user-danger');
//      	$("#name-error").addClass('alert');
//      	$("#name-error").text('Name is empty');
//      	check=false;
//      }

//      return check;
//  }

// //email front validation
// function checkemail(){
//     	var email=$("#user_email").val();
//     	if(email != ""){
//     		var valid = validateEmail(email);

//     		if (!valid) {
//     			$("#email-error").text('Wrong Format');
//     			$("#email-error").removeClass('success');
//     			$('input[id="user_email"]').removeClass('user-success');
//     			$('input[id="user_email"]').addClass('user-danger');
//     			$("#email-error").addClass('alert');

//     		} else {
//     			$("#email-error").text('Looking Good');

//     			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//     			$.get("check-unique-email",{_token:CSRF_TOKEN,email:email},function(data){
//     				if(data>0){
//     					$("#email-error").removeClass('success');
//     					$('input[id="user_email"]').removeClass('user-success');
//     					$('input[id="user_email"]').addClass('user-danger');
//     					$("#email-error").addClass('alert');
//     					$("#email-error").text('email already exist');

//     				}else{
//     					$('input[id="user_email"]').removeClass('user-danger');
//     					$('input[id="user_email"]').addClass('user-success');
//     					$("#email-error").removeClass('alert');
//     					$("#email-error").addClass('success');
//     					$("#email-error").text('Email Available');
//     				}
//     			});	
//     		}			
//     	}else{
//     		$('input[id="user_email"]').removeClass('user-success');
//     		$('input[id="user_email"]').removeClass('user-danger');
//     		$("#email-error").text(' ');
//     	}
//     }
// //email backend function
// var validateEmail = function(elementValue) {
//     	var emailPattern = /^[a-zA-Z].[a-zA-Z0-9._]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/;
//     	return emailPattern.test(elementValue);
//     }
// var email_validater = function validater(email){
// 		var check;

// 		if(email != ""){
// 			var valid = validateEmail(email);

// 			if (!valid){
// 				$("#email-error").text('Wrong Format');
// 				$("#email-error").removeClass('success');
// 				$('input[id="user_email"]').removeClass('user-success');
// 				$('input[id="user_email"]').addClass('user-danger');
// 				$("#email-error").addClass('alert');
// 				check=false;

// 			} else {
// 				$("#email-error").text('Looking Good');
// 				check=true;		        

// 			}			
// 		}else {
// 			$("#email-error").removeClass('success');
// 			$('input[id="user_email"]').removeClass('user-success');
// 			$('input[id="user_email"]').addClass('user-danger');
// 			$("#email-error").addClass('alert');
// 			$("#email-error").text('Email is required');
// 			check=false;
// 		}
		
// 		return check;
// 	}
// 		var get_dbemail = function db_email(email,callback){

// 		$.get("check-unique-email",{email:email},function(data){
// 			if(data>0){
// 				$("#email-error").removeClass('success');
// 				$('input[id="email"]').removeClass('user-success');
// 				$('input[id="email"]').addClass('user-danger');
// 				$("#email-error").addClass('alert');
// 				$("#email-error").text('Email already exist');
// 				var good="false";
// 				callback(good);
// 			}
// 			else{
// 				$('input[id="email"]').removeClass('user-danger');
// 				$('input[id="email"]').addClass('user-success');
// 				$("#email-error").removeClass('alert');
// 				$("#email-error").addClass('success');
// 				$("#email-error").text('Email Available');
// 				var good="true";
// 				callback(good);
// 			}
// 		});
		
// 		return good;
// 	}
// //password frondend validation
// function checkpass() {
//    	var pass=$("#password-field").val();
//    	if(pass != ""){
//    		if(pass.match("^[a-zA-Z]|[a-zA-Z].[a-zA-Z0-9!@_]+$")){
//    			if(pass.length<8){	
//    				$("#pass-error").removeClass('success');
//    				$('input[id="password-field"]').removeClass('user-success');
//    				$('input[id="password-field"]').addClass('user-danger');
//    				$("#pass-error").addClass('alert');
//    				$("#pass-error").text('Enter atleast 8 character');
//    			}else if(pass.length>8){
//    				$('input[id="password-field"]').removeClass('user-danger');
//    				$('input[id="password-field"]').addClass('user-success');
//    				$("#pass-error").removeClass('alert');
//    				$("#pass-error").addClass('success');
//    				$("#pass-error").text('looking nice');
//    			}
//    		}else{
//    			$("#pass-error").removeClass('success');
//    			$('input[id="password-field"]').removeClass('user-success');
//    			$('input[id="password-field"]').addClass('user-danger');
//    			$("#pass-error").addClass('alert');
//    			$("#pass-error").text('1st word should be alphabet');
//    		}
//    	}else{

//    		$('input[id="password-field"]').removeClass('user-success');
//    		$('input[id="password-field"]').removeClass('user-danger');
//    		$("#pass-error").text(' ');

//    	}

//    }
//   //backend password functions
//   var pass_validater = function validater(pass){
// 	var check;
// 		//for pass
// 		if(pass != ""){
// 			if(pass.match("^[a-zA-Z]|[a-zA-Z].[a-zA-Z0-9._\(\)]+$")){
// 				if(pass.length<8){	
// 					$("#pass-error").removeClass('success');
// 					$('input[id="password-field"]').removeClass('user-success');
// 					$('input[id="password-field"]').addClass('user-danger');
// 					$("#pass-error").addClass('alert');
// 					$("#pass-error").text('Enter atleast 8 character');
// 					check=false;
// 				}else if(pass.length>8){
// 					$('input[id="password-field"]').removeClass('user-danger');
// 					$('input[id="password-field"]').addClass('user-success');
// 					$("#pass-error").removeClass('alert');
// 					$("#pass-error").addClass('success');
// 					$("#pass-error").text('Looking Nice');
// 					check=true;
// 				}
// 			}else{
// 				$("#pass-error").removeClass('success');
// 				$('input[id="password-field"]').removeClass('user-success');
// 				$('input[id="password-field"]').addClass('user-danger');
// 				$("#pass-error").addClass('alert');
// 				$("#pass-error").text('1st word should be Alphabet');
// 				check=false;
// 			}
// 		}else{
// 			$("#pass-error").removeClass('success');
// 			$('input[id="password-field"]').removeClass('user-success');
// 			$('input[id="password-field"]').addClass('user-danger');
// 			$("#pass-error").addClass('alert');
// 			$("#pass-error").text('Password is empty');
// 			check=false;

// 		}
		

// 		return check;
// 	}

// //username front end functions
//  function checkuser(){
//     	var user=$("#username").val();
//     	if(user != ""){
//     		if(user.match("^[a-zA-Z\(\) ].[a-zA-Z0-9\(\) ]+$")){
//     			if(user.length<5){	
//     				$("#user-error").removeClass('success');
//     				$('input[id="username"]').removeClass('user-success');
//     				$('input[id="username"]').addClass('user-danger');
//     				$("#user-error").addClass('alert');
//     				$("#user-error").text('please enter atleast 5 character');
//     			}else if(user.length>5){
//     				$('input[id="username"]').removeClass('user-danger');
//     				$('input[id="username"]').addClass('user-success');
//     				$("#user-error").removeClass('alert');
//     				$("#user-error").addClass('success');
//     				$("#user-error").text('looking nice');

//     			}

//     		}else{
//     			$("#user-error").removeClass('success');
//     			$('input[id="username"]').removeClass('user-success');
//     			$('input[id="username"]').addClass('user-danger');
//     			$("#user-error").addClass('alert');
//     			$("#user-error").text('Dont use this (- , @) & 1st word must b alphabet');
//     		}			
//     	}else{
//     		$('input[id="username"]').removeClass('user-success');
//     		$('input[id="username"]').removeClass('user-danger');
//     		$("#user-error").text(' ');
//     	}
//     }
// //backend user validation

// var user_validater = function validater(user){
// 		var check;
// 		//for name
// 		//check=true;
// 		if(user != ""){
// 			if(user.match("^[a-zA-Z\(\) ].[a-zA-Z0-9\(\) ]+$")){
// 				if(user.length<5){	
// 					$("#user-error").removeClass('success');
// 					$('input[id="username"]').removeClass('user-success');
// 					$('input[id="username"]').addClass('user-danger');
// 					$("#user-error").addClass('alert');
// 					$("#user-error").text('please enter atleast 5 character');
// 					check=false;
// 				}else if(user.length>5){
// 					$('input[id="username"]').removeClass('user-danger');
// 					$('input[id="username"]').addClass('user-success');
// 					$("#user-error").removeClass('alert');
// 					$("#user-error").addClass('success');
// 					$("#user-error").text('looking nice');
//     			//return true;
//     			check=true;
//     		}			
//     	}else{
//     		$("#user-error").removeClass('success');
//     		$('input[id="username"]').removeClass('user-success');
//     		$('input[id="username"]').addClass('user-danger');
//     		$("#user-error").addClass('alert');
//     		$("#user-error").text('Dont use this (- , @) & 1st word must b alphabet');
//     		check=false;
//     	}			


//     }else{
//     	$("#user-error").removeClass('success');
//     	$('input[id="username"]').removeClass('user-success');
//     	$('input[id="username"]').addClass('user-danger');
//     	$("#user-error").addClass('alert');
//     	$("#user-error").text('Username is empty');
//     	check=false;
//     }

//     return check;
// }

// //check cell number

// // var validatenumber = function(elementValue) {

// //     	var phonePattern = /^\(?([0-9]{4})\).\-[0-9]{7}$/;
// //     	return phonePattern.test(elementValue);
// //     }
//     function checknumber() {
//     	var phone=$("#phone_number").val();
//     	//alert(phone.length);
//     	if(phone != ""){
//     		//var valid = validatenumber(phone);
//     		if (phone.length == 14) {
//     			$('input[id="phone_number"]').removeClass('user-danger');
//     			$('input[id="phone_number"]').addClass('user-success');
//     			$("#phone-error").removeClass('alert');
//     			$("#phone-error").addClass('success');
//     			$("#phone-error").html(' ');
    			
//     			$new=phone;
//     		}else {
//     			$("#phone-error").removeClass('success');
//     			$('input[id="phone_number"]').removeClass('user-success');
//     			$('input[id="phone_number"]').addClass('user-danger');
//     			$("#phone-error").addClass('alert');
//     			$("#phone-error").text('please enter only digits');
    			
//     		}

//     	}else{

//     		$('input[id="phone_number"]').removeClass('user-success');
//     		$('input[id="phone_number"]').removeClass('user-danger');
//     		$("#phone-error").text(' ');

//     	}

//     }
// //backend function 
// var phone_validater = function validater(phone){
// 	var check;

// 	if(phone != ""){
// 		//var valid = validatenumber(phone);
// 		if (phone.length == 14) {
// 			$('input[id="phone_number"]').removeClass('user-danger');
// 			$('input[id="phone_number"]').addClass('user-success');
// 			$("#phone-error").removeClass('alert');
// 			$("#phone-error").addClass('success');
// 			$("#phone-error").html(' ');
// 			$new=phone;
// 			check= true;
			
// 		}else {
// 			$("#phone-error").removeClass('success');
// 			$('input[id="phone_number"]').removeClass('user-success');
// 			$('input[id="phone_number"]').addClass('user-danger');
// 			$("#phone-error").addClass('alert');
// 			$("#phone-error").text('please enter only digits');
// 			check=false;
// 			//[0-4]{1}.[0-9]{1}
// 		}

// 	}else{
// 		$("#phone-error").removeClass('success');
// 		$('input[id="phone_number"]').removeClass('user-success');
// 		$('input[id="phone_number"]').addClass('user-danger');
// 		$("#phone-error").addClass('alert');
// 		$("#phone-error").text('Phone no is required');
// 		check=false;
// 	}

// 	return check;
// }


// //main validate function

// 	function user_register_validate(){
// 		var name=$("#candidate_name").val();
// 		var email=$("#user_email").val();
// 		var pass=$("#password-field").val();
// 		var user =$("#username").val();
// 		var phone=$("#phone_number").val();
		


// 		var getname=name_validater(name);
// 		var getemail=email_validater(email);
// 		var getpass=pass_validater(pass);
// 		var getuser=user_validater(user);
// 		var getphone=phone_validater(phone);
		
// 		// alert("name "+getname);
// 		// alert("user "+getuser);
// 		// alert("phone "+getphone);
// 		// alert("email "+getemail);

// 		if(getemail){
// 			var dood = get_dbemail(email,returnData);
// 			function returnData(read){
// 				if(read =="true"){
// 					if(getname && getpass && getuser && getphone){
// 						user_registration();
// 					}
// 				}
// 				else{
// 		     	//alert("oh no");
// 		     	$("#email-error").removeClass('success');
// 		     	$('input[id="email"]').removeClass('user-success');
// 		     	$('input[id="email"]').addClass('user-danger');
// 		     	$("#email-error").addClass('alert');
// 		     	$("#email-error").text('email already exist');
// 		     }
// 		}


// 		}
// 	}

	// function yahooo(){
	// 	alert("yes");
	// }