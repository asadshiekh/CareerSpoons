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

		if(data){
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

			else if(num==2){

				$("#AddExperience .close").click();
				notyf.confirm('Your changes have been successfully saved!');
				document.getElementById("user_profile_add_exp").reset();

				var n_job_title = '"'+job_title+  '"';
				var n_company_name = '"'+company_name+  '"';
				var n_ref_email = '"'+ref_email+  '"';
				var n_ref_phone= '"'+ref_phone+  '"';
				var n_your_position = '"'+your_position+  '"';
				var n_exp_start = '"'+exp_start+  '"';
				var n_exp_end = '"'+exp_end+  '"';
				var n_exp_description = '"'+exp_description+  '"';


				setTimeout(
					function(){

						$("#candidate_experience tr:last")
						.after("<tr id='exp_unique_row"+data+"'><td>"+job_title+
							"</td><td>"+company_name+"</td><td>"+your_position+
							"</td><td>"+ref_email+"</td><td>"+ref_phone+
							"</td><td><a href='#ExperienceViewed' data-toggle='modal' onclick='viewed_exp("+n_job_title+
							","+n_company_name+","+n_ref_email+","+n_ref_phone+","+n_your_position+","+n_exp_start+","+n_exp_end+","+n_exp_description+")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='View Experience' data-pt-animate='flipInX'><i class='far fa-eye'></i></span></a> | <a href='#UpdateExperienceModelWindow' data-toggle='modal' onclick='update_edu("+data+
							")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='Update Experience' data-pt-animate='flipInX'><i class='fas fa-edit'></i></span></a> | <a onclick='delete_exp("+data+
							")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='Delete Experience' data-pt-animate='flipInX'> <i class='fas fa-trash-alt'></i></span></a></td></tr>");

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


function delete_exp(id){


	swal({
		title: 'Are You Sure?',
		text: "This Experience is Permanently Delete from your profile",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, Do it!'
	}).then((result) => {
		if (result.value) {

			delete_experience(id);

		}
	})
}




function delete_experience(id){

	
	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.post("delete-candidate-experience",{_token:CSRF_TOKEN,id:id},function(data){


		if(data=="yes"){

			$("#exp_unique_row"+id).hide(4500);
			setTimeout(
				function(){
					swal('Experience Delete Successfully!','','success');

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


function viewed_exp(a,b,c,d,e,f,g,h){

$("#viewed_exp_job_title").val(a);
$("#viewed_exp_company_name").val(b);
$("#viewed_exp_referance_email").val(c);
$("#viewed_exp_referance_number").val(d);
$("#view_exp_your_position").val(e);
$("#viewed_exp_date_from").val(f);
$("#viewed_exp_date_to").val(g);
CKEDITOR.instances['view_exp_description'].setData(h);
CKEDITOR.instances['view_exp_description'].setReadOnly(true);


}


//Model Window Save Button
function addExper(num){

	if(num==2){

		swal({
			title: 'Are you sure?',
			text: "This Experience Is Directly Add To Your Resume",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Do it!'
		}).then((result) => {
			if (result.value) {
				
				addExperience(2);
				
			}
		})



	}
}



function update_exp(id){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.post("update-candidate-experience",{_token:CSRF_TOKEN,id:id},function(data){
		
		$("#model_div").html(data);
		$("#UpdateExperienceModelWindow").modal('show');
		$('#update-exp-start').dateDropper();
		$('#update-exp-end').dateDropper();
		CKEDITOR.replace( 'update_exp_description' );
	});
}

function do_update_experience(id){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var job_title = $("#update_exp_job_title").val();
	var company_name = $("#update_exp_company_name").val();
	var ref_email = $("#update_exp_referance_email").val();
	var ref_phone = $("#update_exp_referance_number").val();
	var your_position = $("#update_exp_your_position").val();
	var exp_start = $("#update-exp-start").val();
	var exp_end = $("#update-exp-end").val();
	var exp_description = CKEDITOR.instances['update_exp_description'].getData();
	//alert(CSRF_TOKEN+job_title+company_name+ref_email+ref_phone+your_position+exp_start+exp_end+exp_description);

	$.post("update-experience-model-window",{_token:CSRF_TOKEN,id:id,job_title:job_title,company_name:company_name,ref_email:ref_email,ref_phone:ref_phone,your_position:your_position,exp_start:exp_start,exp_end:exp_end,exp_description:exp_description},function(data){ 

		if(data=="yes"){

			$("#UpdateExperienceModelWindow .close").click();


			setTimeout(
				function(){
					swal('Experience Updated Successfully!','','success');

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