function addEduction(num){

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

		if(data=="yes"){

			setTimeout(
				function(){

					swal('Eduction Add Successfully!','','success');

				},
				500
				);

			if(num==1){

				$("#Percentage_fields").hide();
				$("#CGPA_fields").hide();
				document.getElementById("edu_form").reset();
			}

			else if(num==0){

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

		}

	});


}


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

