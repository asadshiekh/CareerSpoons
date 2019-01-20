function company_login(){


	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var company_email = $("#company_email").val();
	var company_password = $("#company_password").val();


	// alert(company_email);
	// alert(CSRF_TOKEN);
	// alert(company_password);


	$.post("do-company-login",{_token:CSRF_TOKEN,company_email:company_email,company_password:company_password},function(data){ 

		
		if(data=="yes"){				

			//alert(data);
				setTimeout(
					function(){

						swal('Login Successfully!','','success');

					},
					1000
					);

				setTimeout(
					function(){

						window.location.replace('/');
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