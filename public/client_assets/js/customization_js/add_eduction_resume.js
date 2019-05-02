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
				majors = majors.replace("_"," ");

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





//validation functions

// title_validater function
var title_validater = function validater(name){
    	var check;
		//for name

		if(name){

			if(name.match("^[a-zA-Z\(\) ]+$")){
				$("#degree-error").text(' ');
				check=true;
				
			}else{
				$("#degree-error").removeClass('success');
				$("#degree-error").addClass('alert');
				$("#degree-error").text('Contains only alphabet');
				//return false;
				check=false;
			}
               ////end name       
         //last
     }else{
     	$("#degree-error").removeClass('success');
     	$("#degree-error").addClass('alert');
     	$("#degree-error").text('Degree title is empty');
     	check=false;
     }

     return check;
 }


 //qualification level validator

 var level_validater = function validater(city){
    	var check;

    	if (city) {
    	    $("#qual-error").removeClass('alert');
			$("#qual-error").addClass('success');
			$("#qual-error").text('');
          check=true;
    	}else{
    		$("#qual-error").removeClass('success');
			$("#qual-error").addClass('alert');
			$("#qual-error").text('Required *');
            check=false;
    		}
        return check;
        }

//ins_validater function
var ins_validater = function validater(name){
    	var check;
		//for name

		if(name != ""){

			if(name.match("^[a-zA-Z\(\) ]+$")){
				$("#ins-error").text(' ');
				check=true;
				
			}else{
				$("#ins-error").removeClass('success');
				$("#ins-error").addClass('alert');
				$("#ins-error").text('Contains only alphabet');
				//return false;
				check=false;
			}
               ////end name       
         //last
     }else{
     	$("#ins-error").removeClass('success');
     	$("#ins-error").addClass('alert');
     	$("#ins-error").text('Required *');
     	check=false;
     }

     return check;
 }

 //location validator
var loc_validater = function validater(name){
    	var check;
		//for name
    
	if(name){
		$("#loc-error").text(' ');
		check=true;
			
    }else{
     	$("#loc-error").removeClass('success');
     	$("#loc-error").addClass('alert');
     	$("#loc-error").text('Required *');
     	check=false;
    }

     return check;
 }

//start Date

 var start_validater = function validater(start,to){
    	var check;

    	//alert(from+"  "+to);

    	var date1 = start;
        var date2 = to;
        date0 = new Date();
        date1 = new Date(date1);
		date2 = new Date(date2);

		// alert(date1 + "  " +date2);
		// date1 > date2;  //false	
		if(date1 >= date0){
			$("#dfrom-error").removeClass('success');
			$("#dfrom-error").addClass('alert');
			$("#dfrom-error").text('Invalid date');
            check=false;
		}
		else if(date1 >= date2){

			$("#dateto-error").removeClass('success');
			$("#dateto-error").addClass('alert');
			$("#dateto-error").text('Date Should B Greater');
            check=false;
		}else{
			$("#dateto-error").text(' ');
			check=true;
		}

	


   //  	if (city) {
   //  	    $("#dfrom-error").removeClass('alert');
			// $("#dfrom-error").addClass('success');
			// $("#dfrom-error").text('');
   //        check=true;
   //  	}else{
   //  		$("#dfrom-error").removeClass('success');
			// $("#dfrom-error").addClass('alert');
			// $("#dfrom-error").text('Required *');
   //          check=false;
   //  		}
        return check;
        }

//end Date

 var end_validater = function validater(city){
    	var check;

    	if (city) {
    	    $("#dto-error").removeClass('alert');
			$("#dto-error").addClass('success');
			$("#dto-error").text('');
          check=true;
    	}else{
    		$("#dto-error").removeClass('success');
			$("#dto-error").addClass('alert');
			$("#dto-error").text('Required *');
            check=false;
    		}
        return check;
        }

 //major validator

 var major_validater = function validater(city){
    	var check;

    	if (city) {
    	    $("#major-error").removeClass('alert');
			$("#major-error").addClass('success');
			$("#major-error").text('');
          check=true;
    	}else{
    		$("#major-error").removeClass('success');
			$("#major-error").addClass('alert');
			$("#major-error").text('Required *');
            check=false;
    		}
        return check;
        }


  //choose validator

 var choose_validater = function validater(city){
    	var check;
    	var CGPA_1 = $("#candidate_CGPA").val();
        var Percentage_1 = $("#candidate_percentage").val();

    	if (city) {
    	    $("#choose-error").removeClass('alert');
			$("#choose-error").addClass('success');
			$("#choose-error").text('');	
          //check=true;
		          if(city == "CGPA"){
                       if (CGPA_1) {
			    	    $("#cgpa-error").removeClass('alert');
						$("#cgpa-error").addClass('success');
						$("#cgpa-error").text(' ');	
			            check=true;
			    	   }else{
			    		$("#cgpa-error").removeClass('success');
						$("#cgpa-error").addClass('alert');
						$("#cgpa-error").text('Required *');
			            check=false;
			    		}
		          }else if (city == "Percentage") {
		          	    if (Percentage_1) {
			    	    $("#per-error").removeClass('alert');
						$("#per-error").addClass('success');
						$("#per-error").text(' ');	
			            check=true;
			    	   }else{
			    		$("#per-error").removeClass('success');
						$("#per-error").addClass('alert');
						$("#per-error").text('Required *');
			            check=false;
			    		}

		          }
    	}else{
    		$("#choose-error").removeClass('success');
			$("#choose-error").addClass('alert');
			$("#choose-error").text('Required *');
            check=false;
    		}

        return check;
        }

      // text editor validator
      var editor_validater = function validater(text){
    	var check;

    	if (text) {
    	    $("#edu_deserror").text(' ');
			check=true;
          
    	}else{
    		$("#edu_deserror").removeClass('success');
			$("#edu_deserror").addClass('alert');
			$("#edu_deserror").text('information required');
            check=false;
    		}
        return check;
    }
//main function of validation
// addEduction2(2);

function main_validation_edu(feel){
var CGPA_1 = $("#candidate_CGPA").val();
var Percentage_1 = $("#candidate_percentage").val();
// alert("yed");
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

 	var gettitle=title_validater(degree_title);
    var getlevel=level_validater(degree_level);
 	var getins=ins_validater(institute_name);
    var getloc=loc_validater(institute_location);
 	var getstart=start_validater(edu_start,edu_end);
    var getend=end_validater(edu_end);
 	var getmajor=major_validater(majors);
 	var getchoose=choose_validater(selected_result);
 	// var getncgpa=name_validater(CGPA);
 	// var getper=name_validater(Percentage);
 	var gettext=editor_validater(edu_description);
 

 	if(gettitle && getlevel && getins && getloc && getstart && getend && getmajor && getchoose && gettext){
 		// yahoo();
 		if(feel == "front"){
 			addEduction2(2);
 		}
 		else if(feel == "low"){
 			addEduction(1);
 		}else if(feel == "good"){
            addEduction1(0);
 		}
 		
 	}

}



//update education 

// title_validater function
var up_title_validater = function validater(name){
    	var check;
		//for name

		if(name){

			if(name.match("^[a-zA-Z\(\) ]+$")){
				$("#up_degree_error").text(' ');
				check=true;
				
			}else{
				$("#up_degree_error").removeClass('success');
				$("#up_degree_error").addClass('alert');
				$("#up_degree_error").text('Contains only alphabet');
				//return false;
				check=false;
			}
               ////end name       
         //last
     }else{
     	$("#up_degree_error").removeClass('success');
     	$("#up_degree_error").addClass('alert');
     	$("#up_degree_error").text('Degree title is empty');
     	check=false;
     }

     return check;
 }


 //qualification level validator

 var up_level_validater = function validater(city){
    	var check;

    	if (city) {
    	    $("#up_qual_error").removeClass('alert');
			$("#up_qual_error").addClass('success');
			$("#up_qual_error").text('');
          check=true;
    	}else{
    		$("#up_qual_error").removeClass('success');
			$("#up_qual_error").addClass('alert');
			$("#up_qual_error").text('Required *');
            check=false;
    		}
        return check;
        }

//ins_validater function
var up_ins_validater = function validater(name){
    	var check;
		//for name

		if(name != ""){

			if(name.match("^[a-zA-Z\(\) ]+$")){
				$("#up_ins_error").text(' ');
				check=true;
				
			}else{
				$("#up_ins_error").removeClass('success');
				$("#up_ins_error").addClass('alert');
				$("#up_ins_error").text('Contains only alphabet');
				//return false;
				check=false;
			}
               ////end name       
         //last
     }else{
     	$("#up_ins_error").removeClass('success');
     	$("#up_ins_error").addClass('alert');
     	$("#up_ins_error").text('Required *');
     	check=false;
     }

     return check;
 }

 //location validator
var up_loc_validater = function validater(name){
    	var check;
		//for name
    
	if(name){
		$("#up_loc_error").text(' ');
		check=true;
			
    }else{
     	$("#up_loc_error").removeClass('success');
     	$("#up_loc_error").addClass('alert');
     	$("#up_loc_error").text('Required *');
     	check=false;
    }

     return check;
 }

//start Date

 var up_start_validater = function validater(start,to){
    	var check;

    	//alert(from+"  "+to);

    	var date1 = start;
        var date2 = to;
        date0 = new Date();
        date1 = new Date(date1);
		date2 = new Date(date2);
		// alert(date0);

		// alert(date1 + "  " +date2);
		// date1 > date2;  //false	
		if(date1 >= date0){
			$("#up_datefrom_error").removeClass('success');
			$("#up_datefrom_error").addClass('alert');
			$("#up_datefrom_error").text('Invalid date');
            check=false;
		}
		else if(date1 >= date2){

			$("#up_dateto_error").removeClass('success');
			$("#up_dateto_error").addClass('alert');
			$("#up_dateto_error").text('Date Should B Greater');
            check=false;
		}else{
			$("#up_dateto_error").text(' ');
			check=true;
		}

	


   //  	if (city) {
   //  	    $("#dfrom-error").removeClass('alert');
			// $("#dfrom-error").addClass('success');
			// $("#dfrom-error").text('');
   //        check=true;
   //  	}else{
   //  		$("#dfrom-error").removeClass('success');
			// $("#dfrom-error").addClass('alert');
			// $("#dfrom-error").text('Required *');
   //          check=false;
   //  		}
        return check;
        }

//end Date

 var up_end_validater = function validater(city){
    	var check;

    	if (city) {
    	    $("#up_dateto_error").removeClass('alert');
			$("#up_dateto_error").addClass('success');
			$("#up_dateto_error").text('');
          check=true;
    	}else{
    		$("#up_dateto_error").removeClass('success');
			$("#up_dateto_error").addClass('alert');
			$("#up_dateto_error").text('Required *');
            check=false;
    		}
        return check;
        }

 //major validator

 var up_major_validater = function validater(city){
    	var check;

    	if (city) {
    	    $("#up_major_error").removeClass('alert');
			$("#up_major_error").addClass('success');
			$("#up_major_error").text('');
          check=true;
    	}else{
    		$("#up_major_error").removeClass('success');
			$("#up_major_error").addClass('alert');
			$("#up_major_error").text('Required *');
            check=false;
    		}
        return check;
        }


  //choose validator

 var up_choose_validater = function validater(city){
    	var check;
    	var CGPA = $("#update_edu_candidate_CGPA").val();
	    var Percentage = $("#update_edu_candidate_percentage").val();

    	if (city) {
    	    $("#up_choose_error").removeClass('alert');
			$("#up_choose_error").addClass('success');
			$("#up_choose_error").text('');	
          //check=true;
		          if(city == "CGPA"){
                       if (CGPA) {
			    	    $("#up_cgpa_error").removeClass('alert');
						$("#up_cgpa_error").addClass('success');
						$("#up_cgpa_error").text(' ');	
			            check=true;
			    	   }else{
			    		$("#up_cgpa_error").removeClass('success');
						$("#up_cgpa_error").addClass('alert');
						$("#up_cgpa_error").text('Required *');
			            check=false;
			    		}
		          }else if (city == "Percentage") {
		          	    if (Percentage) {
			    	    $("#up_per_error").removeClass('alert');
						$("#up_per_error").addClass('success');
						$("#up_per_error").text(' ');	
			            check=true;
			    	   }else{
			    		$("#up_per_error").removeClass('success');
						$("#up_per_error").addClass('alert');
						$("#up_per_error").text('Required *');
			            check=false;
			    		}

		          }
    	}else{
    		$("#up_choose_error").removeClass('success');
			$("#up_choose_error").addClass('alert');
			$("#up_choose_error").text('Required *');
            check=false;
    		}

        return check;
        }

      // text editor validator
      var up_editor_validater = function validater(text){
    	var check;

    	if (text) {
    	    $("#up_edu_deserror").text(' ');
			check=true;
          
    	}else{
    		$("#up_edu_deserror").removeClass('success');
			$("#up_edu_deserror").addClass('alert');
			$("#up_edu_deserror").text('information required');
            check=false;
    		}
        return check;
    }
//main function of validation
// addEduction2(2);

function main_validation_up_edu(id,edu_level,edu_major,edu_selected_result){
// var CGPA = $("#update_edu_candidate_CGPA").val();
// var Percentage = $("#update_edu_candidate_percentage").val();
// alert("yed");
 	var degree_title = $("#update_edu_degree_title").val();
	var degree_level = $("#update_edu_degree_level").val();
	var institute_name = $("#update_edu_institue_name").val();
	var institute_location = $("#update_edu_institute_location").val();
	var edu_start = $("#update-edu-start").val();
	var edu_end = $("#update-edu-end").val();
	var majors = $("#update_edu_majors").val();
	var selected_result = $("#update_edu_result").val();
	// alert(selected_result);
	
	var edu_description = $("#update_eduction_descriptions").val();

 	var gettitle=up_title_validater(degree_title);
    var getlevel=up_level_validater(degree_level);
 	var getins=up_ins_validater(institute_name);
    var getloc=up_loc_validater(institute_location);
 	var getstart=up_start_validater(edu_start,edu_end);
    var getend=up_end_validater(edu_end);
 	var getmajor=up_major_validater(majors);
 	var getchoose=up_choose_validater(selected_result);
 	// var getncgpa=name_validater(CGPA);
 	// var getper=name_validater(Percentage);
 	var gettext=up_editor_validater(edu_description);
// alert(gettitle);
// alert(getlevel);
// alert(getins);
// alert(getloc);
// alert(getstart);
// alert(getend);
// alert(getmajor);
// alert(getchoose);
// alert(gettext);
 

 	if(gettitle && getlevel && getins && getloc && getstart && getend && getmajor && getchoose && gettext){
 		// yahoo();
 		update_edu_data(id,edu_level,edu_major,edu_selected_result);
 	}

}
function yahoo(){
	alert("i mean it");
}