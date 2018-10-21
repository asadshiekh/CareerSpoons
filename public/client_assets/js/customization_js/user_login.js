
function user_login(){

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var user_email = $("#user_email").val();
	var user_password = $("#user_password").val();

	$.post("do-user-login",{_token:CSRF_TOKEN,user_email:user_email,user_password:user_password},function(data){ 

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
					2000
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