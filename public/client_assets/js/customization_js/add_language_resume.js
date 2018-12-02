function addLanguage(num){
	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var user_language = $("#user_language").val();

// alert(CSRF_TOKEN+user_language);
$.post("add-user-language",{_token:CSRF_TOKEN,user_language:user_language},function(data){


	if(data=="yes"){

		setTimeout(
					function(){

						swal('Language Add Successfully!','','success');

					},
					500
					);

		if(num==1){
			notyf.confirm('Your changes have been successfully saved!');
			 document.getElementById("language_form").reset();
		}

		else if(num==0){
			notyf.confirm('Your Changes Have Been Successfully Saved!');
			$("#language_div").hide();
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

function addLanguage1(num){

	
		if(num==0){

		swal({
			title: 'Are you sure?',
			text: "You won't be able to not Add an another Language here (You Can Add Your Language Later In Your Profile)!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Do it!'
		}).then((result) => {
			if (result.value) {
				
				addLanguage(0);
	
			}
		})



	}

}