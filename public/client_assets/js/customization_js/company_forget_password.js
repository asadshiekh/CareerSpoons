function verifycompanyEmail(){

	$("#company_email").attr('disabled','disabled');
	$("#verify_button").attr("disabled",true);

	var notyf = new Notyf();

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var company_email = $("#company_email").val();

$.post("verify-company-email",{_token:CSRF_TOKEN,company_email:company_email},function(data){

	if(data=="yes"){
	swal('We Have Send You Email Check Your Email To Proceed further!','','success');
	$.post("send-company-forget-email",{_token:CSRF_TOKEN,company_email:company_email},function(data){

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
		$("#company_email").removeAttr('disabled');
		$("#verify_button").removeAttr('disabled');

	}


});

}

function updatepassword(){


	$("#password-field").attr('disabled','disabled');
	$("#updated_button").attr("disabled",true);

	var notyf = new Notyf();

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var new_password = $("#password-field").val();

	//alert(new_password);

	$.post("update-company-forget-password",{_token:CSRF_TOKEN,new_password:new_password},function(data){

		


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