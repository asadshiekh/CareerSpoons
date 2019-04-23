function addSkill(num){
	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var skill_name = $("#skill_name").val();
	var skill_percentage = $("#skill_percentage").val();

	// alert(CSRF_TOKEN+skill_name+skill_percentage);

	$.post("add-user-skill",{_token:CSRF_TOKEN,skill_name:skill_name,skill_percentage:skill_percentage},function(data){

		if(data){

			setTimeout(
				function(){

					swal('Skill Add Successfully!','','success');

				},
				500
				);

			if(num==1){
				notyf.confirm('Your changes have been successfully saved!');
				document.getElementById("skill_form").reset();
			}

			else if(num==0){
				notyf.confirm('Your Changes Have Been Successfully Saved!');
				$("#skill_div").hide();
			}

			else if(num==2){

				$("#AddSkill .close").click();
				notyf.confirm('Your changes have been successfully saved!');
				document.getElementById("user_profile_add_skill").reset();

				setTimeout(
					function(){

						var n_skill_name = '"'+skill_name+  '"';
						var n_skill_percentage = '"'+skill_percentage+  '"';

						$("#candidate_skill tr:last")
						.after("<tr id='skill_unique_row"+data+"' style='text-align: center;'><td>"+skill_name+
							"</td><td>"+skill_percentage+"</td><td><a href='#SkillViewed' data-toggle='modal' onclick='viewed_skill("+n_skill_name+
							","+n_skill_percentage+")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='View Skill' data-pt-animate='flipInX'><i class='far fa-eye'></i></span></a> | <a href='#UpdateSkill' data-toggle='modal' onclick='update_sk("+data+
							")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='Update Skill' data-pt-animate='flipInX'><i class='fas fa-edit'></i></span></a> | <a onclick='dele_skill("+data+
							")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='Delete Skill' data-pt-animate='flipInX'> <i class='fas fa-trash-alt'></i></span></a></td></tr>");

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

function addSkill1(num){

	if(num==0){

		swal({
			title: 'Are you sure?',
			text: "You won't be able to not Add an another Skill here (You Can Add Your Skill Later In Your Profile)!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Do it!'
		}).then((result) => {
			if (result.value) {
				
				addSkill(0);
				
			}
		})



	}
	
}

function viewed_skill(a,b){

	$("#viewed_skill_name").val(a);
	$("#viewed_skill_precentage").val(b);
}


function dele_skill(id){

	swal({
		title: 'Are You Sure?',
		text: "This Skill is Permanently Delete from your profile",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, Do it!'
	}).then((result) => {
		if (result.value) {

			delete_skill(id);

		}
	})


}


function delete_skill(id){


	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.post("delete-candidate-skill",{_token:CSRF_TOKEN,id:id},function(data){

		if(data=="yes"){

			$("#skill_unique_row"+id).hide(4500);
			setTimeout(
				function(){
					swal('Skill Delete Successfully!','','success');

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


function addnewskill(num){


	if(num==2){

		swal({
			title: 'Are you sure?',
			text: "This Skill Is Directly Add To Your Resume",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Do it!'
		}).then((result) => {
			if (result.value) {
				
				addSkill(num);
				
			}
		})



	}
}


function update_sk(id){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.post("update-candidate-skill",{_token:CSRF_TOKEN,id:id},function(data){
		
		$("#model_div").html(data);
		$("#UpdateSkill").modal('show');
		//alert(data);

var slider = document.getElementById("skill_percentage");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}


	 });
}


function update_skill(id){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var skill_name = $("#skill_name").val();
	var skill_percentage = $("#skill_percentage").val();
	$.post("update-skill-model-window",{_token:CSRF_TOKEN,id:id,skill_name:skill_name,skill_percentage:skill_percentage},function(data){


			if(data=="yes"){

			$("#UpdateSkill .close").click();


			setTimeout(
				function(){
					swal('Skill Updated Successfully!','','success');

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
var skill_sname_validater = function validater(name){
    	var check;
		//for name
	 if(name){
				$("#skill_name_error").removeClass('alert');
		     	$("#skill_name_error").addClass('success');
		     	$("#skill_name_error").text(' ');
				check=true;
				
     }else{
     	$("#skill_name_error").removeClass('success');
     	$("#skill_name_error").addClass('alert');
     	$("#skill_name_error").text('Required * ');
     	check=false;
     }

     return check;
 }

function validate_main_skill(){
	//alert("yes");

	var skill_name = $("#skill_name").val();

	var getskill=skill_sname_validater(skill_name);

 	if(getskill){
		addnewskill(2);
		// yahoo();
 	}
}



//update validate functions
// addnewskill(2);


//skill_name_validater function
var up_skill_sname_validater = function validater(name){
    	var check;
		//for name
	 if(name){
				$("#up_skill_name_error").removeClass('alert');
		     	$("#up_skill_name_error").addClass('success');
		     	$("#up_skill_name_error").text(' ');
				check=true;
				
     }else{
     	$("#up_skill_name_error").removeClass('success');
     	$("#up_skill_name_error").addClass('alert');
     	$("#up_skill_name_error").text('Required * ');
     	check=false;
     }

     return check;
 }

function validate_main_skill_up(id){
	//alert("yes");

	var skill_name = $("#skill_name").val();
	var skill_percentage = $("#skill_percentage").val();
    var getskill=up_skill_sname_validater(skill_name);
 	if(getskill){
		// addnewskill(2);
		// yahoo();
		update_skill(id);
 	}
}

function yahoo(){
	alert("all good");
}