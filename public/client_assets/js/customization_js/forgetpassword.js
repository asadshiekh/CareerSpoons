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



		else if(data=="yes2"){

			setTimeout(
				function(){

					swal({
						type: 'error',
						title: 'You Run Out Of Your Time!..',
						text: ' Plz Try Again Connection Failed!!',
						footer: '<a href>Why do I have this issue?</a>'
					})
				},
				1000
				);


		}



		if(data=="yes3"){


			setTimeout(
				function(){

					swal({
						type: 'error',
						title: 'Sorry You Already Update Your Password!..',
						text:  'If You Dont Remember Your Password Try Forget Password Again',
						footer: '<a href>Why do I have this issue?</a>'
					})
				},
				1000
				);

		}


		if(data=="yes4"){

			setTimeout(
				function(){

					swal({
						type: 'error',
						title: 'This Link is Expire',
						text:  'For More Queries Check FAQs',
						footer: '<a href>Why do I have this issue?</a>'
					})
				},
				1000
				);

		}





	});



}