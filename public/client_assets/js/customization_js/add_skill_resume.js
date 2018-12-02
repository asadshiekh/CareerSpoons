function addSkill(num){
	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var skill_name = $("#skill_name").val();
	var skill_percentage = $("#skill_percentage").val();

	// alert(CSRF_TOKEN+skill_name+skill_percentage);

	$.post("add-user-skill",{_token:CSRF_TOKEN,skill_name:skill_name,skill_percentage:skill_percentage},function(data){

		if(data=="yes"){

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