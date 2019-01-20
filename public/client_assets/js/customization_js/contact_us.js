function contactUs(){


	var candidate_name = $("#candidate_name").val();
	var candidate_email = $("#candidate_email").val();
	var candidate_number = $("#candidate_number").val();
	var candidate_subject = $("#candidate_subject").val();
	var candidate_message = $("#candidate_message").val();


	


	//alert(candidate_name+candidate_email+candidate_number+candidate_subject+candidate_message);
	sendcontactUs(candidate_name,candidate_email,candidate_number,candidate_subject,candidate_message)
}


function contactUs1(){


	var candidate_name1 = $("#candidate_name1").val();
	var candidate_email1 = $("#candidate_email1").val();
	var candidate_number1 = $("#candidate_number1").val();
	var candidate_subject1 = $("#candidate_subject1").val();
	var candidate_message1 = $("#candidate_message1").val();;

	

	//alert(candidate_name1+candidate_email1+candidate_number1+candidate_subject1+candidate_message1);

	sendcontactUs(candidate_name1,candidate_email1,candidate_number1,candidate_subject1,candidate_message1)


}


function sendcontactUs(candidate_name,candidate_email,candidate_number,candidate_subject,candidate_message){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	//alert(candidate_name+candidate_email+candidate_number+candidate_subject+candidate_message);

	$.post("do-contact-us",{_token:CSRF_TOKEN,candidate_name:candidate_name,candidate_email:candidate_email,candidate_number:candidate_number,candidate_subject:candidate_subject,candidate_message:candidate_message},function(data){


		if(data=="yes"){

			document.getElementById("contact_us").reset();
				setTimeout(function(){swal(" "+candidate_name+' Email Send Successfully!','Please be Patient ( Check Your Email )','success');
						//swal({type: 'success',title: 'Oops...',text: 'Something went wrong!',footer: '<a href>Why do I have this issue?</a>'});	
					},
					1000
					);


				$.post("do-contact-us-email-send",{_token:CSRF_TOKEN,candidate_name:candidate_name,candidate_email:candidate_email},function(response){

						
				});


		}

		else{

			setTimeout(
				function(){

					swal({
						type: 'error',
						title: 'Oops...',
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
