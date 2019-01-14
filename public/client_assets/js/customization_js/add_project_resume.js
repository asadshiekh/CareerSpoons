function addProject(num){
	var notyf = new Notyf();
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


		if(data){

			setTimeout(
				function(){

					swal('Project Add Successfully!','','success');

				},
				500
				);


			if(num==1){
				notyf.confirm('Your changes have been successfully saved!');
				document.getElementById("project_form").reset();
			}

			else if(num==2){

				$("#AddProject .close").click();
				notyf.confirm('Your changes have been successfully saved!');
				document.getElementById("user_profile_add_pro").reset();

				var n_project_title = '"'+project_title+  '"';
				var n_company_name = '"'+project_company_name+  '"';
				var n_ref_email = '"'+project_ref_email+  '"';
				var n_ref_phone= '"'+project_ref_phone+  '"';
				var n_your_position = '"'+your_porject_position+  '"';
				var n_pro_start = '"'+pro_start+  '"';
				var n_pro_end = '"'+pro_end+  '"';
				var n_pro_description = '"'+project_description+  '"';


				setTimeout(
					function(){

						$("#candidate_project tr:last")
						.after("<tr id='pro_unique_row"+data+"'><td>"+project_title+
							"</td><td>"+project_company_name+"</td><td>"+project_ref_email+
							"</td><td>"+project_ref_phone+"</td><td>"+your_porject_position+
							"</td><td><a href='#ProjectViewed' data-toggle='modal' onclick='viewed_project("+n_project_title+
							","+n_company_name+","+n_ref_email+","+n_ref_phone+","+n_your_position+","+n_pro_start+","+n_pro_end+","+n_pro_description+")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='View Project' data-pt-animate='flipInX'><i class='far fa-eye'></i></span></a> | <a href='#UpdateProjectModelWindow' data-toggle='modal' onclick='update_pro("+data+
							")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='Update Project' data-pt-animate='flipInX'><i class='fas fa-edit'></i></span></a> | <a onclick='delete_pro("+data+
							")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='Delete Project' data-pt-animate='flipInX'> <i class='fas fa-trash-alt'></i></span></a></td></tr>");

					},
					700
					);
			}

			else if(num==0){
				notyf.confirm('Your changes have been successfully saved!');
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

			notyf.alert('Something Went Worng Plz Try Again');
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


function viewed_project(a,b,c,d,e,f,g,h){

	$("#viewed_pro_job_title").val(a);
	$("#viewed_pro_company_name").val(b);
	$("#viewed_pro_referance_email").val(c);
	$("#viewed_pro_referance_number").val(d);
	$("#view_pro_your_position").val(e);
	$("#viewed_pro_date_from").val(f);
	$("#viewed_pro_date_to").val(g);
	CKEDITOR.instances['view_pro_description'].setData(h);
	CKEDITOR.instances['view_pro_description'].setReadOnly(true);

}


function delete_pro(id){


		swal({
		title: 'Are You Sure?',
		text: "This Project is Permanently Delete from your profile",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, Do it!'
	}).then((result) => {
		if (result.value) {

			delete_project(id);

		}
	})

}


function delete_project(id){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.post("delete-candidate-project",{_token:CSRF_TOKEN,id:id},function(data){

		if(data=="yes"){

			$("#pro_unique_row"+id).hide(4500);
			setTimeout(
				function(){
					swal('Project Delete Successfully!','','success');

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
function addPro(num){

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
				
				addProject(2);
				
			}
		})



	}
}


function update_pro(id){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.post("update-candidate-project",{_token:CSRF_TOKEN,id:id},function(data){
		
		$("#model_div").html(data);
		$("#UpdateProjectModelWindow").modal('show');
		$('#update-pro-start').dateDropper();
		$('#update-pro-end').dateDropper();
		CKEDITOR.replace( 'update_pro_description' );



	});
}


function update_project(id){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var project_title = $("#update_project_title").val();
	var project_company_name = $("#update_project_company_name").val();
	var project_ref_email = $("#update_project_ref_email").val();
	var project_ref_phone = $("#update_project_ref_phone").val();
	var your_porject_position = $("#update_your_porject_position").val();
	var pro_start = $("#update-pro-start").val();
	var pro_end = $("#update-pro-end").val();	
	var project_description = CKEDITOR.instances['update_pro_description'].getData();
	 //alert(CSRF_TOKEN+project_title+project_company_name+project_ref_email+project_ref_phone+your_porject_position+pro_start+pro_end+project_description);

	$.post("update-project-model-window",{_token:CSRF_TOKEN,id:id,project_title:project_title,project_company_name:project_company_name,project_ref_email:project_ref_email,project_ref_phone:project_ref_phone,your_porject_position:your_porject_position,pro_start:pro_start,pro_end:pro_end,project_description:project_description},function(data){ 


			if(data=="yes"){

			$("#UpdateProjectModelWindow .close").click();


			setTimeout(
				function(){
					swal('Project Updated Successfully!','','success');

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