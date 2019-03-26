
function user_login(){

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var user_email = $("#user_email").val();
	var user_password = $("#user_password").val();
var l = window.location;
var base_url = l.protocol + "//" + l.host + "/do-user-login";
//alert(base_url);
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

						window.location.replace(window.location);
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