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







////////////////////////////////////////////////////////////////
//main validation function of contact us form
//Candidate name function 

    var CandyNameValidator = function validater(value){
	var check;
		//for pass
		if(value){
			
					$("#contact_name_error").removeClass('success');
					$("#contact_name_error").addClass('alert');
					$("#contact_name_error").text(' ');
					check=true;	
		}else{
			$("#contact_name_error").removeClass('success');
			$("#contact_name_error").addClass('alert');
			$("#contact_name_error").text('Required *');
			check=false;
		}
		return check;
	}

//candidate email function
var CandyvalidateEmail = function(elementValue) {
    	var emailPattern = /^[a-zA-Z].[a-zA-Z0-9._]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/;
    	return emailPattern.test(elementValue);
    }
var CandyEmailValidator = function validater(value){
	var check;
		//for pass
		if(value){
			var valid = CandyvalidateEmail(value);
			if(!valid){
				    $("#contact_email_error").removeClass('success');
					$("#contact_email_error").addClass('alert');
				    $("#contact_email_error").text('Invalid Format');
					check=false;
			}else{
					$("#contact_email_error").text(' ');
					check=true;
					}	
		}else{
			$("#contact_email_error").removeClass('success');
			$("#contact_email_error").addClass('alert');
			$("#contact_email_error").text('Required *');
			check=false;
		}
		return check;
	}


//candidate CandyNumberValidator function
var CandyNumberValidator = function validater(value){
	var check;
		//for pass
		if(value){
			if(value.length == 15){
					$("#contact_phone_error").text(' ');
					check=true;	
				}else{
					$("#contact_phone_error").removeClass('success');
					$("#contact_phone_error").addClass('alert');
					$("#contact_phone_error").text('Invalid Number');
					check=false;
				}
		}else{
			$("#contact_phone_error").removeClass('success');
			$("#contact_phone_error").addClass('alert');
			$("#contact_phone_error").text('Required *');
			check=false;
		}
		return check;
	}


//candidate CandySubjectValidator function
var CandySubjectValidator = function validater(value){
	var check;
		//for pass
		if(value){
			
					$("#contact_subject_error").removeClass('success');
					$("#contact_subject_error").addClass('alert');
					$("#contact_subject_error").text(' ');
					check=true;	
		}else{
			$("#contact_subject_error").removeClass('success');
			$("#contact_subject_error").addClass('alert');
			$("#contact_subject_error").text('Required *');
			check=false;
		}
		return check;
	}


// CandyMessageValidator function
var CandyMessageValidator = function validater(value){
	var check;
		//for pass
		if(value){
			
					$("#contact_msg_error").removeClass('success');
					$("#contact_msg_error").addClass('alert');
					$("#contact_msg_error").text(' ');
					check=true;	
		}else{
			$("#contact_msg_error").removeClass('success');
			$("#contact_msg_error").addClass('alert');
			$("#contact_msg_error").text('Required *');
			check=false;
		}
		return check;
	}

//main call
function main_contactUs_validation(){


	var candidate_name = $("#candidate_name").val();
	var candidate_email = $("#candidate_email").val();
	var candidate_number = $("#candidate_number").val();
	var candidate_subject = $("#candidate_subject").val();
	var candidate_message = $("#candidate_message").val();

	var getCandyName=CandyNameValidator(candidate_name);
	var getCandyEmail=CandyEmailValidator(candidate_email);
	var getCandyNumber=CandyNumberValidator(candidate_number);
	var getCandySubject=CandySubjectValidator(candidate_subject);
	var getCandyMsg=CandyMessageValidator(candidate_message);

	if(getCandyMsg && getCandyEmail && getCandyNumber && getCandySubject && getCandyMsg){
		contactUs();
	}

}