//functionsfor form customization
//add more fields etc

function addCityPreferenceAreafields() {
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var x="yes";
	$.post('cities-preferences-data',{_token:CSRF_TOKEN,x:x},function(data){ 
	   $("#content").append(data);
	});
}

function del_front_field(x){
	$("#fields"+x).remove();
}
function add_qual_front_area(){
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var x="yes";
	$.post('fetch-qual-front-data',{_token:CSRF_TOKEN,x:x},function(data){ 

		$("#content_qual").append(data);
  // $("#content_modal_qual").html(data);
});
}
