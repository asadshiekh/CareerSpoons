function addLanguage(num){
	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var user_language = $("#user_language").val();

// alert(CSRF_TOKEN+user_language);
$.post("add-user-language",{_token:CSRF_TOKEN,user_language:user_language},function(data){


	if(data){

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

		else if(num==2){

			$("#Addlanguage .close").click();
			notyf.confirm('Your changes have been successfully saved!');
			document.getElementById("user_profile_add_language").reset();

			var n_user_language = '"'+user_language+  '"';

			setTimeout(
				function(){

					$("#candidate_languages tr:last")
					.after("<tr id='languages_unique_row"+data+"' style='text-align: center;'><td>"+user_language+
						"</td><td><a href='#Viewlanguages' data-toggle='modal' onclick='viewed_language("+n_user_language+
						")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='View Language' data-pt-animate='flipInX'><i class='far fa-eye'></i></span></a> | <a href='#UpdateLanguageModelWindow' data-toggle='modal' onclick='update_lang("+data+
						")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='Update Language' data-pt-animate='flipInX'><i class='fas fa-edit'></i></span></a> | <a onclick='dele_language("+data+
						")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='Delete Language' data-pt-animate='flipInX'> <i class='fas fa-trash-alt'></i></span></a></td></tr>");

				},
				700
				);

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


function viewed_language(user_language){

	$("#view_user_language").val(user_language);
}

function dele_language(id){

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

			delete_language(id);

		}
	})
}

function delete_language(id){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.post("delete-candidate-languages",{_token:CSRF_TOKEN,id:id},function(data){

		if(data=="yes"){

			$("#languages_unique_row"+id).hide(4500);
			setTimeout(
				function(){
					swal('Language Delete Successfully!','','success');

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
function addnewlanguage(num){

	if(num==2){

		swal({
			title: 'Are you sure?',
			text: "This Language Is Directly Add To Your Resume",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Do it!'
		}).then((result) => {
			if (result.value) {
				
				addLanguage(2);
				
			}
		})



	}
}


function update_lang(id){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.post("update-candidate-language",{_token:CSRF_TOKEN,id:id},function(data){
		
		$("#model_div").html(data);
		$("#UpdateLanguageModelWindow").modal('show');


	});
}


function update_language(id){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var user_language = $("#user_language").val();

// alert(CSRF_TOKEN+user_language);
$.post("update-language-model-window",{_token:CSRF_TOKEN,id:id,user_language:user_language},function(data){

if(data=="yes"){

		$("#UpdateLanguageModelWindow .close").click();


		setTimeout(
			function(){
				swal('Language Updated Successfully!','','success');

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


//validate function 


//validate functions
// addnewskill(2);


//skill_name_validater function
var lang_name_validater = function validater(name){
    	var check;
		//for name
	 if(name){
				$("#lang_lname_error").removeClass('alert');
		     	$("#lang_lname_error").addClass('success');
		     	$("#lang_lname_error").text(' ');
				check=true;
				
     }else{
     	$("#lang_lname_error").removeClass('success');
     	$("#lang_lname_error").addClass('alert');
     	$("#lang_lname_error").text('Required * ');
     	check=false;
     }

     return check;
 }

function validate_main_language(){
	//alert("yes");

	var user_languages = $("#user_language").val();

	var getlang=lang_name_validater(user_languages);
 	if(getlang){

		 addnewlanguage(2);
		 // yahoo();
 	}
}


function yahoo(){
	alert("all good");
}