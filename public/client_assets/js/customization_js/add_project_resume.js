function addProject(num){

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var project_title = $("#project_title").val();
	var project_company_name = $("#pro_company_name").val();
	var project_ref_email = $("#project_ref_email").val();
	var project_ref_phone = $("#project_ref_phone").val();
	var your_porject_position = $("#your_porject_position").val();
	var pro_start = $("#pro-start").val();
	var pro_end = $("#pro-end").val();	
	var project_description = CKEDITOR.instances['project_des'].getData();

	// alert(CSRF_TOKEN+project_title+project_company_name+project_ref_email+project_ref_phone+your_porject_position+pro_start+pro_end+project_description);
	$.post("add-user-project",{_token:CSRF_TOKEN,project_title:project_title,project_company_name:project_company_name,project_ref_email:project_ref_email,project_ref_phone:project_ref_phone,your_porject_position:your_porject_position,pro_start:pro_start,pro_end:pro_end,project_description:project_description},function(data){ 


		if(data=="yes"){

			setTimeout(
				function(){

					swal('Project Add Successfully!','','success');

				},
				500
				);


			if(num==1){

				document.getElementById("project_form").reset();
			}

			else if(num==0){

				$("#project_div").hide();
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

		}

	});

}

function addProject1(num){


if(num==0){

		swal({
			title: 'Are you sure?',
			text: "You won't be able to not Add an another Project here (You Can Add Your Project Later In Your Profile)!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Do it!'
		}).then((result) => {
			if (result.value) {
				
				addProject(0);
	
			}
		})



	}

}
