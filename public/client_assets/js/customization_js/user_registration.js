function user_registration(){

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var candidate_name = $("#candidate_name").val();
	var user_email = $("#user_email").val();
	var user_password = $("#user_password").val();
	var re_password = $("#re_password").val();
	var username = $("#username").val();
	var phone_number = $("#phone_number").val();
	var checkbox = $("#checkbox").val();

	//alert(phone_number);
	$.post("user-registration-process",{_token:CSRF_TOKEN,candidate_name:candidate_name,user_email:user_email,
		user_password:user_password,username:username,phone_number:phone_number,checkbox:checkbox},function(data){ 
			if(data=="yes"){
				setTimeout(
					function(){

						swal(" "+candidate_name+'Account Created Successfully!','We have send you Email please Verify your Account','success');
						//swal({type: 'success',title: 'Oops...',text: 'Something went wrong!',footer: '<a href>Why do I have this issue?</a>'});
					},
					1500
					);

				
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