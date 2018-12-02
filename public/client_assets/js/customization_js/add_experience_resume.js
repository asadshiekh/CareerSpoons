function addExperience(num){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var job_title = $("#job_title").val();
	var company_name = $("#company_name").val();
	var ref_email = $("#ref_email").val();
	var ref_phone = $("#exp_ref_phone").val();
	var your_position = $("#your_position").val();
	var exp_start = $("#exp-start").val();
	var exp_end = $("#exp-end").val();
	var exp_description = CKEDITOR.instances['project_descrption'].getData();
	// alert(CSRF_TOKEN+job_title+company_name+ref_email+ref_phone+your_position+exp_start+exp_end+exp_description);


	$.post("add-user-experience",{_token:CSRF_TOKEN,job_title:job_title,company_name:company_name,ref_email:ref_email,ref_phone:ref_phone,your_position:your_position,exp_start:exp_start,exp_end:exp_end,exp_description:exp_description},function(data){ 

		if(data=="yes"){
			setTimeout(
				function(){

					swal('Experience Add Successfully!','','success');

				},
				500
				);


			if(num==1){

				document.getElementById("exp_form").reset();
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


function addExperience1(num){
var notyf = new Notyf();

		if(num==0){

		swal({
			title: 'Are you sure?',
			text: "You won't be able to not Add an another Experience here (You Can Add Your Experience Later In Your Profile)!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Do it!'
		}).then((result) => {
			if (result.value) {
				
				addExperience(0);
				$("#experience_div").hide();
				notyf.confirm('Your Changes Have Been Successfully Saved!');
			}
		})



	}
}