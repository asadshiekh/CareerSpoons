function change_category(){

	var x =  document.getElementById('user_category').value;

	if(x=="Eduction"){

		$("#candidate_eduction").show();
		$("#candidate_experience").hide();
		$("#candidate_project").hide();
		$("#candidate_skill").hide();
		$("#candidate_languages").hide();
		$("#candidate_hobbies").hide();
	}

	else if(x=="Experience"){
		
		
		$("#candidate_eduction").hide();
		$("#candidate_experience").show();
		$("#candidate_project").hide();
		$("#candidate_skill").hide();
		$("#candidate_languages").hide();
		$("#candidate_hobbies").hide();
	}

	else if(x=="Project"){
		
		
		$("#candidate_eduction").hide();
		$("#candidate_experience").hide();
		$("#candidate_project").show();
		$("#candidate_skill").hide();
		$("#candidate_languages").hide();
		$("#candidate_hobbies").hide();
	}

	else if(x=="Skills"){
		
		$("#candidate_eduction").hide();
		$("#candidate_experience").hide();
		$("#candidate_project").hide();
		$("#candidate_skill").show();
		$("#candidate_languages").hide();
		$("#candidate_hobbies").hide();
	}

	else if(x=="Languages"){
		

		$("#candidate_eduction").hide();
		$("#candidate_experience").hide();
		$("#candidate_project").hide();
		$("#candidate_skill").hide();
		$("#candidate_languages").show();
		$("#candidate_hobbies").hide();
	}

	else if(x=="Hobbies"){

		$("#candidate_eduction").hide();
		$("#candidate_experience").hide();
		$("#candidate_project").hide();
		$("#candidate_skill").hide();
		$("#candidate_languages").hide();
		$("#candidate_hobbies").show();
	}

}

function change_candidate_charts_view(){


	var x =  document.getElementById('candidate_chart_view').value;

	if(x=="Bar"){

		$("#line_charts").show();
		$("#pie_charts").hide();
		
	}

	else if(x=="Pie"){
		
		$("#line_charts").hide();
		$("#pie_charts").show();
	}

	

}