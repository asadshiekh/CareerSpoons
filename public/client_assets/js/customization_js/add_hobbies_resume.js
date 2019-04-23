function addHobbies(num){
	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var user_hobbies = $("#user_hobbies").val();

// alert(CSRF_TOKEN+user_language);
$.post("add-user-hobbies",{_token:CSRF_TOKEN,user_hobbies:user_hobbies},function(data){


	if(data){

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

		else if(num==2){

			$("#AddHobbey .close").click();
			notyf.confirm('Your changes have been successfully saved!');
			document.getElementById("user_profile_add_hobbey").reset();

			var n_user_hobbies = '"'+user_hobbies+  '"';

			setTimeout(
				function(){

					$("#candidate_hobbies tr:last")
					.after("<tr id='hobbey_unique_row"+data+"' style='text-align: center;'><td>"+user_hobbies+
						"</td><td><a href='#ViewHobbies' data-toggle='modal' onclick='viewed_hobbies("+n_user_hobbies+
						")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='View Hobbey' data-pt-animate='flipInX'><i class='far fa-eye'></i></span></a> | <a href='#UpdateHobbey' data-toggle='modal' onclick='update_hobb("+data+
						")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='Update Hobbey' data-pt-animate='flipInX'><i class='fas fa-edit'></i></span></a> | <a onclick='dele_hobbey("+data+
						")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='Delete Hobbey' data-pt-animate='flipInX'> <i class='fas fa-trash-alt'></i></span></a></td></tr>");

				},
				700
				);


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


function viewed_hobbies(hobby_name){

	$("#view_hobby_name").val(hobby_name);
}


function dele_hobbey(id){

	swal({
		title: 'Are You Sure?',
		text: "This Hobbey is Permanently Delete from your profile",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, Do it!'
	}).then((result) => {
		if (result.value) {

			delete_hobbey(id);

		}
	})
}


function delete_hobbey(id){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.post("delete-candidate-hobbey",{_token:CSRF_TOKEN,id:id},function(data){

		if(data=="yes"){

			$("#hobbey_unique_row"+id).hide(4500);
			setTimeout(
				function(){
					swal('Hobbey Delete Successfully!','','success');

					setTimeout(
						function(){
							notyf.confirm('Your Changes Have Been Successfully Saved!');
						},
						1000
						);


				},
				500
				);
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

					setTimeout(
						function(){
							notyf.alert('Something Went Worng Plz Try Again');
						},
						1000
						);


				},
				500
				);
		}

	});
}



//Model Window Save Button
function addnewHobbey(num){

	if(num==2){

		swal({
			title: 'Are you sure?',
			text: "This Project Is Directly Add To Your Resume",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Do it!'
		}).then((result) => {
			if (result.value) {
				
				addHobbies(2);
				
			}
		})



	}
}


function update_hobb(id){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.post("update-candidate-hobbey",{_token:CSRF_TOKEN,id:id},function(data){
		
		$("#model_div").html(data);
		$("#UpdateHobbey").modal('show');

	});

}


function updatehobbey(id){


	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var user_hobbies = $("#user_hobbies").val();

// alert(CSRF_TOKEN+user_language);
$.post("update-hobbey-model-window",{_token:CSRF_TOKEN,id:id,user_hobbies:user_hobbies},function(data){

	if(data=="yes"){

		$("#UpdateHobbey .close").click();


		setTimeout(
			function(){
				swal('Hobbey Updated Successfully!','','success');

				setTimeout(
					function(){
						notyf.confirm('Your Changes Have Been Successfully Saved!');
					},
					1000
					);


			},
			500
			);

		var delay = 2000; 
		setTimeout(function(){ window.location = "user-profile"; }, delay);
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

				setTimeout(
					function(){
						notyf.alert('Something Went Worng Plz Try Again');
					},
					1000
					);



			},
			500
			);

	}

});

}



//validate functions
// addnewskill(2);


//skill_name_validater function
var hobb_name_validater = function validater(name){
    	var check;
		//for name
	 if(name){
				$("#hobb_name_error").removeClass('alert');
		     	$("#hobb_name_error").addClass('success');
		     	$("#hobb_name_error").text(' ');
				check=true;
				
     }else{
     	$("#hobb_name_error").removeClass('success');
     	$("#hobb_name_error").addClass('alert');
     	$("#hobb_name_error").text('Required * ');
     	check=false;
     }

     return check;
 }

function validate_main_hobb(){
	//alert("yes");

	var user_hobbies = $("#user_hobbies").val();

	var getlang=hobb_name_validater(user_hobbies);

 	if(getlang){
		 addnewHobbey(2);
		 // yahoo();
 	}
}




//validate function update

//validate functions
// addnewskill(2);


//skill_name_validater function
var hobb_name_validater_up = function validater(name){
    	var check;
		//for name
	 if(name){
				$("#up_hobb_name_error").removeClass('alert');
		     	$("#up_hobb_name_error").addClass('success');
		     	$("#up_hobb_name_error").text(' ');
				check=true;
				
     }else{
     	$("#up_hobb_name_error").removeClass('success');
     	$("#up_hobb_name_error").addClass('alert');
     	$("#up_hobb_name_error").text('Required * ');
     	check=false;
     }

     return check;
 }

function validate_main_hobb_up(id){
	//alert("yes");

	var user_hobbies = $("#user_hobbies").val();

	var getlang=hobb_name_validater_up(user_hobbies);

 	if(getlang){
 		updatehobbey(id);
		 // addnewHobbey(2);
		 // yahoo();
 	}
}