function verifycandidateEmail(){

	$("#candidate_email").attr('disabled','disabled');
	$("#verify_button").attr("disabled",true);

	var notyf = new Notyf();

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var candidate_email = $("#candidate_email").val();


	$.post("verify-candidate-email",{_token:CSRF_TOKEN,candidate_email:candidate_email},function(data){


		if(data=="yes"){
				
			//alert("asad shiekh");
			swal('We Have Send You Email Check Your Email To Proceed further!','','success');


			$.post("send-candidate-email",{_token:CSRF_TOKEN,candidate_email:candidate_email},function(data){


			});

		}


		else{

			setTimeout(
					function(){

						swal({
							type: 'error',
							title: 'No Email Found Sorry!..',
							text: 'Connection Failed!!',
							footer: '<a href>Why do I have this issue?</a>'
						})
					},
					1000
					);

			notyf.alert('Something Went Worng Plz Try Again');

		}

	});

}




function updatepassword(){


$("#password-field").attr('disabled','disabled');
	$("#updated_button").attr("disabled",true);

	var notyf = new Notyf();

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var new_password = $("#password-field").val();


	$.post("update-candidate-password",{_token:CSRF_TOKEN,new_password:new_password},function(data){



			if(data=="yes"){


			setTimeout(
				function(){

					swal('Your Password Is Successfully Updated!','','success');

				},
				500
				);

			}



			else{



			setTimeout(
					function(){

						swal({
							type: 'error',
							title: 'You Run Out Of Tour Time!..',
							text: ' Plz Try Again Connection Failed!!',
							footer: '<a href>Why do I have this issue?</a>'
						})
					},
					1000
					);


			}

	});



}