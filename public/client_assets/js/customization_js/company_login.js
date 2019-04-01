function company_login(){


	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var company_email = $("#company_email").val();
	var company_password = $("#company_password").val();

	alert(CSRF_TOKEN+company_email+company_password);

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