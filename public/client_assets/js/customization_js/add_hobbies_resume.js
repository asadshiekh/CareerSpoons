function addHobbies(num){
var notyf = new Notyf();
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var user_hobbies = $("#user_hobbies").val();

// alert(CSRF_TOKEN+user_language);
$.post("add-user-hobbies",{_token:CSRF_TOKEN,user_hobbies:user_hobbies},function(data){


	if(data=="yes"){

		setTimeout(
					function(){

						swal('Hobbies Add Successfully!','','success');

					},
					500
					);

		if(num==1){
			notyf.confirm('Your changes have been successfully saved!');
			 document.getElementById("hobbies_form").reset();
		}

		else if(num==0){
			notyf.confirm('Your changes have been successfully saved!');
			$("#hobbies_div").hide();
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

function addHobbies1(num){

	if(num==0){

		swal({
			title: 'Are you sure?',
			text: "You won't be able to not Add an another Hobbies here (You Can Add Your Hobbies Later In Your Profile)!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Do it!'
		}).then((result) => {
			if (result.value) {
				
				addHobbies(0);
	
			}
		})



	}

}