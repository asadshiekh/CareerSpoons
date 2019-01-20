function register_company(){


	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var company_name = $("#company_name").val();
	var company_email = $("#company_email").val();
	var company_password = $("#password-field").val();
	var company_type = $("#company_type").val();
	var company_city = $("#company_city").val();
	var company_phone_number = $("#company_phone_number").val();
	var company_cnic = $("#company_cnic").val();
	var isChecked = $('#checkbox:checked').val()?true:false;


	$.post("company-registeration-process",{_token:CSRF_TOKEN,company_name:company_name,company_email:company_email,
		company_password:company_password,company_type:company_type,company_city:company_city,company_phone_number:company_phone_number,company_cnic:company_cnic,isChecked:isChecked},function(data){ 



			//alert(data);

			if(data=="yes"){

				setTimeout(
					function(){

						swal(" "+company_name+' Account Created Successfully!','We have send you Email please Verify your Account','success');
						//swal({type: 'success',title: 'Oops...',text: 'Something went wrong!',footer: '<a href>Why do I have this issue?</a>'});
					},
					1500
					);

				$.post("company-registration-email-send",{_token:CSRF_TOKEN,company_name:company_name,company_email:company_email},function(data){


				});

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