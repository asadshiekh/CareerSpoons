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
function view_post_private(x){
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	$.post("view-post-single-private",{_token:CSRF_TOKEN,x:x},function(data){

		$("#append-view-post").html(data);
		$("#viewpostmodalwindow").modal('show');
	});
}

function delete_front_post(x){
	swal({
		title: "Are you sure?",
		text: "Once deleted, you will not be able to recover this Post!",
		icon: "warning",
		showCancelButton: true,
 		confirmButtonColor: '#3085d6',
 		cancelButtonColor: '#d33',
 		confirmButtonText: 'Yes, Do it!'
	}).then((result) => {
 			if (result.value) {
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			$.post("delete-front-post",{_token:CSRF_TOKEN,x:x},function(data){
    		if(data == "yes"){
    			$("#post-del"+x).hide(2000);
    		}else{
    			alert("no");
    		}
			});

		}
	});




}

function update_front_post(x){
alert(x);
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	$.post("update-post-single-private",{_token:CSRF_TOKEN,x:x},function(data){
    alert(data);
    $("#append-edit-post").html(data);
		$("#editpostmodalwindow").modal('show');
		CKEDITOR.replace('user_info'); 

		
	});
}
function add_modal_area(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var x="yes";
  $.post('cities-preferences-data',{_token:CSRF_TOKEN,x:x},function(data){ 
   $("#content_modal_area").append(data);
 });

}

function add_modal_qual_area(){
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var x="yes";
  $.post('fetch-qual-front-data',{_token:CSRF_TOKEN,x:x},function(data){ 

    $("#content_modal_qual").append(data);
  });
}

//delete field from modal window
function del_qual_area(x){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post('del-qual-field-front',{_token:CSRF_TOKEN,x:x},function(data){ 
    if(data){
      $("#fields"+x).remove();
    }
  });
  
}
function del_fields(x){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post('del-city-field-front',{_token:CSRF_TOKEN,x:x},function(data){ 
    if(data){
      $("#Cityfields"+x).remove();
    }
  });
  
}
