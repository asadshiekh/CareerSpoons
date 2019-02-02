function candidate_select_major_onchange(){


	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var f_area=$("#candidate_functional_area").val();

   $.post("fetch_candidate_f_area_related_majors",{_token:CSRF_TOKEN,f_area:f_area},function(data){
          $('#candidate_majors_area').empty();
        $.each(data, function( key, value ) {
            var str = data[key].major_title;
            str = str.replace("_"," ");
             $('#candidate_majors_area').append('<option value="'+ data[key].major_title +'">'+ str +'</option>');
                //alert(data[key].major_title);
           });

       //alert(data);


  });

}

function target_function(x){
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$.post("show-temp-preview",{_token:CSRF_TOKEN,x:x},function(data){
        alert(data);
       
  });
}