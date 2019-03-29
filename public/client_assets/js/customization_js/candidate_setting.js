function change_phone_status(x){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.post("change_phone_mode",{_token:CSRF_TOKEN,x:x},function(data){

		if(data=="yes"){
			if(x=="1"){

				setTimeout(
					function(){

						swal('Phone Status is Visible!','','success');

					},
					500
					);

				$("#status-td").html("<h5 style='color:green;text-align:center'>Visible</h5>");
				notyf.confirm('Your changes have been successfully saved!');

			}else{

				setTimeout(
					function(){

						swal('Phone Status is Not Visible!','','success');

					},
					500
					);
				$("#status-td").html("<h5 style='color:red;text-align:center'>Not Visible</h5>");
				notyf.confirm('Your changes have been successfully saved!');

			}
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


function change_email_setting(){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var new_email = $("#new_email").val();
	var password = $("#password_email").val();

	//alert(new_email+password);

	$.post("change-candidate-email",{_token:CSRF_TOKEN,new_email:new_email,password:password},function(data){

			if(data=="yes"){


				setTimeout(function(){swal(" "+new_email+' Email Update Successfully!','We have send you Email please Verify your Account','success');
						//swal({type: 'success',title: 'Oops...',text: 'Something went wrong!',footer: '<a href>Why do I have this issue?</a>'});	
					},
					1000
					);

				$.post("do-resent-candidate-email",{_token:CSRF_TOKEN,new_email:new_email},function(data){

					//alert(data);

				});

				

			}


			else if(data=="yes2"){

				setTimeout(
 				function(){

 					swal({
 						type: 'error',
 						title: 'Change Email its Already Exist...',
 						text: 'Connection Failed!!',
 						footer: '<a href>Why do I have this issue?</a>'
 					})
 				},
 				1000
 				);

 			notyf.alert('Something Went Worng Plz Try Again');
			

			}

			else if(data=="yes3"){

				setTimeout(
 				function(){

 					swal({
 						type: 'error',
 						title: 'Password Not Matched...',
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



function change_password(){
	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var current_password = $("#new_password").val();
	var new_password = $("#password-field").val();
 	//alert(current_password+new_password);

 	$.post("candidate-change-password-from-pofile",{_token:CSRF_TOKEN,current_password:current_password,new_password:new_password},function(data){

 		if(data=="yes"){

 			setTimeout(
 				function(){

 					swal('Password Update Successfully!','','success');

 				},
 				500
 				);

 			notyf.confirm('Your changes have been successfully saved!');
 		}

 		else{

 			setTimeout(
 				function(){

 					swal({
 						type: 'error',
 						title: 'Password Not Match...',
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


 function delete_account(){



 		swal({
 			title: 'Are you sure?',
 			text: "Once Your User Account Has Been Deleted, CarrerSpoons Cannot Restore Your Content From the Management of CareerSpoons",
 			type: 'warning',
 			showCancelButton: true,
 			confirmButtonColor: '#3085d6',
 			cancelButtonColor: '#d33',
 			confirmButtonText: 'Yes, Do it!'
 		}).then((result) => {
 			if (result.value) {

 				delete_candidate_account();

 			}
 		})
 	


 }  


 function delete_candidate_account(){


 	//alert("yahooo");

 		var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

 	$.post("delete-candidate-account-preminently",{_token:CSRF_TOKEN},function(data){

 		if(data=="yes"){

 			setTimeout(
 				function(){

 					swal('Password Update Successfully!','','success');

 				},
 				500
 				);

 			notyf.confirm('Your changes have been successfully saved!');
 			var delay = 2000; 
			setTimeout(function(){ window.location = "/"; }, delay);
 		}

 		else{

 			setTimeout(
 				function(){

 					swal({
 						type: 'error',
 						title: 'Something Went Wrong...',
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