 //Save and Add More Button
 function addEduction(num){
 	var notyf = new Notyf();
 	var CGPA_1 = $("#candidate_CGPA").val();
 	var Percentage_1 = $("#candidate_percentage").val();

 	if(CGPA_1 === undefined || CGPA_1 == null || CGPA_1.length <= 0){
 		CGPA_1 = 0;
 	}

 	if(Percentage_1 === undefined || Percentage_1 == null || Percentage_1.length <= 0){
 		Percentage_1 = 0;
 	}

 	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 	var degree_title = $("#degree_title").val();
 	var degree_level = $("#degree_level").val();
 	var institute_name = $("#institute_name").val();
 	var institute_location = $("#institute_location").val();
 	var edu_start = $("#edu-start").val();
 	var edu_end = $("#edu-end").val();
 	var majors = $("#majors").val();
 	var selected_result = $("#edu_result").val();
 	var CGPA = CGPA_1;
 	var Percentage = Percentage_1;
 	var edu_description = CKEDITOR.instances['edu_description'].getData();
 	//alert(CSRF_TOKEN+degree_title+degree_level+institute_name+institute_location+edu_start+edu_end+majors+selected_result+CGPA+Percentage+edu_description);
 	$.post("add-user-education",{_token:CSRF_TOKEN,degree_title:degree_title,degree_level:degree_level,institute_name:institute_name,institute_location:institute_location,edu_start:edu_start,edu_end:edu_end,majors:majors,selected_result:selected_result,CGPA:CGPA,Percentage:Percentage,edu_description:edu_description},function(data){ 

 		if(data){
 			setTimeout(
 				function(){

 					swal('Eduction Add Successfully!','','success');

 				},
 				500
 				);

 			if(num==1){
 				notyf.confirm('Your changes have been successfully saved!');
 				$("#Percentage_fields").hide();
 				$("#CGPA_fields").hide();
 				document.getElementById("edu_form").reset();
 			}


 			else if(num==2){
				//$('#AddEductionModelWindow').modal('hide');
				$("#AddEductionModelWindow .close").click();
				notyf.confirm('Your changes have been successfully saved!');
				$("#Percentage_fields").hide();
				$("#CGPA_fields").hide();
				document.getElementById("user_profile_add_edu").reset();

				// New Varible for Generation new Tr

				var n_degree_title = '"'+degree_title+  '"';
				var n_degree_level = '"'+degree_level+  '"';
				var n_institute_name = '"'+institute_name+  '"';
				var n_institute_location= '"'+institute_location+  '"';
				var n_edu_start = '"'+edu_start+  '"';
				var n_edu_end = '"'+edu_end+  '"';
				var n_majors = '"'+majors+  '"';
				var n_selected_result = '"'+selected_result+  '"';
				var n_CGPA = '"'+CGPA+  '"';
				var n_Percentage = '"'+Percentage+  '"';
				var n_edu_description = '"'+edu_description+  '"';


				setTimeout(
					function(){

						$("#candidate_eduction tr:last")
						.after("<tr id='edu_unique_row"+data+"'><td>"+degree_title+
							"</td><td>"+degree_level+"</td><td>"+institute_name+
							"</td><td>"+institute_location+"</td><td>"+majors+
							"</td><td><a href='#DemoModal2' data-toggle='modal' onclick='viewed_edu("+n_degree_title+
							","+n_degree_level+","+n_institute_name+","+n_institute_location+","+n_edu_start+
							","+n_edu_end+","+n_majors+","+n_CGPA+","+n_Percentage+","+n_edu_description+
							")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='View Eduction' data-pt-animate='flipInX'><i class='far fa-eye'></i></span></a> | <a href='#UpdateEductionModelWindow' data-toggle='modal' onclick='update_edu("+data+","+n_selected_result+
							")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='Update Eduction' data-pt-animate='flipInX'><i class='fas fa-edit'></i></span></a> | <a onclick='delete_edu("+data+
							")'><span class='protip' data-pt-scheme='blue' data-pt-gravity='top 0 -5; bottom 0 5' data-pt-title='Delete Eduction' data-pt-animate='flipInX'> <i class='fas fa-trash-alt'></i></span></a></td></tr>");

					},
					700
					);


			}

			else if(num==0){
				notyf.confirm('Your Changes Have Been Successfully Saved!');
				$("#eduction_div").hide();
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

 //Save Button 
 function addEduction1(num){

 	if(num==0){

 		swal({
 			title: 'Are you sure?',
 			text: "You won't be able to not Add an another Eduction here (You Can Add Your Eduction Later In Your Profile)!",
 			type: 'warning',
 			showCancelButton: true,
 			confirmButtonColor: '#3085d6',
 			cancelButtonColor: '#d33',
 			confirmButtonText: 'Yes, Do it!'
 		}).then((result) => {
 			if (result.value) {

 				addEduction(0);

 			}
 		})



 	}
 }

//Model Window Save Button
function addEduction2(num){

	if(num==2){

		swal({
			title: 'Are you sure?',
			text: "This Eduction Is Directly Add To Your Resume",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Do it!'
		}).then((result) => {
			if (result.value) {
				
				addEduction(2);
				
			}
		})



	}
}





function change_fields(){

	var x =  document.getElementById('edu_result').value;
	

	if(x=="CGPA"){

		$("#CGPA_fields").show();
		$("#Percentage_fields").hide();
	}

	else if(x=="Percentage"){
		
		$("#CGPA_fields").hide();
		$("#Percentage_fields").show();
	}


}


function update_change_fields(){


	var x =  document.getElementById('update_edu_result').value;

	if(x=="CGPA"){

		$("#update_CGPA_fields").show();
		$("#update_Percentage_fields").hide();
	}

	else if(x=="Percentage"){
		
		$("#update_CGPA_fields").hide();
		$("#update_Percentage_fields").show();
	}
}




function delete_edu(id){

	swal({
		title: 'Are You Sure?',
		text: "This education is permanently delete from your profile",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, Do it!'
	}).then((result) => {
		if (result.value) {

			delete_education(id);

		}
	})
}

function delete_education(id){


	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.post("delete-candidate-education",{_token:CSRF_TOKEN,id:id},function(data){

		if(data=="yes"){

			$("#edu_unique_row"+id).hide(4500);

			setTimeout(
				function(){
					swal('Eduction Delete Successfully!','','success');

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

function viewed_edu(a,b,c,d,e,f,g,h,i,j){

// alert(b)
// alert(d);
// alert(e);
// alert(f);
// alert(g);
// alert(h);
var valueChecked = h==="0"?i:h;
$("#viewed_edu_degree_title").val(a);
$("#viewed_edu_degree_level").val(b);
$("#viewed_edu_institute_name").val(c);
$("#viewed_edu_institute_location").val(d);
$("#viewed_edu_date_from").val(e);
$("#viewed_edu_date_to").val(f);
$("#viewed_edu_majors").val(g);
$("#view_edu_cgp_percentage").val(valueChecked);
CKEDITOR.instances['view_edu_description'].setData(j);
CKEDITOR.instances['view_edu_description'].setReadOnly(true);

}



function update_edu(id,selected_result){

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.post("update-candidate-form",{_token:CSRF_TOKEN,id:id},function(data){
		$("#model_div").html(data);


		update_hide_div(selected_result);

		$("#UpdateEductionModelWindow").modal('show');

	});
	
}

function update_hide_div(selected_result){

	if(selected_result=="CGPA"){

		$("#update_CGPA_fields").show();
		$("#update_Percentage_fields").hide();

	}

	else if(selected_result=="Percentage"){	
		
		
		$("#update_CGPA_fields").hide();
		$("#update_Percentage_fields").show();
		
	}

	$('#update-edu-end').dateDropper();
	$('#update-edu-start').dateDropper();
	CKEDITOR.replace('update_description');	

}


function update_edu_data(id,edu_level,edu_major,edu_selected_result){


	//alert(id+edu_level+edu_major+edu_selected_result);

	var notyf = new Notyf();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var eduction_id = $("#eduction_id").val();
	var degree_title = $("#update_edu_degree_title").val();
	var degree_level = $("#update_edu_degree_level").val();
	var institute_name = $("#update_edu_institue_name").val();
	var institute_location = $("#update_edu_institute_location").val();
	var edu_start = $("#update-edu-start").val();
	var edu_end = $("#update-edu-end").val();
	var majors = $("#update_edu_majors").val();
	var selected_result = $("#update_edu_result").val();
	var CGPA = $("#update_edu_candidate_CGPA").val();
	var Percentage = $("#update_edu_candidate_percentage").val();
	var edu_description = $("#update_eduction_descriptions").val();


	if(degree_level== null){

		degree_level = edu_level;
	}

	if(majors== null){

		majors = edu_major;
	}

	if(selected_result== null){

		selected_result = edu_selected_result;
	}


	if(selected_result=="CGPA"){

		Percentage = 0; 

	}

	if(selected_result=="Percentage"){

		CGPA = 0; 

	}



	//alert(CSRF_TOKEN+degree_title+degree_level+institute_name+institute_location+edu_start+edu_end+majors+selected_result+CGPA+Percentage+edu_description);


	$.post("update-candidate-education",{_token:CSRF_TOKEN,id:id,degree_title:degree_title,degree_level:degree_level,institute_name:institute_name,institute_location:institute_location,edu_start:edu_start,edu_end:edu_end,majors:majors,selected_result:selected_result,CGPA:CGPA,Percentage:Percentage,edu_description:edu_description},function(data){ 



		if(data=="yes"){



			$("#UpdateEductionModelWindow .close").click();


			setTimeout(
				function(){
					swal('Eduction Updated Successfully!','','success');

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

