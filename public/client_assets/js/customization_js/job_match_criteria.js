function candidate_select_major_onchange(){


	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var f_area=$("#candidate_functional_area").val();

   $.post("fetch_candidate_f_area_related_majors",{_token:CSRF_TOKEN,f_area:f_area},function(data){
          $('#candidate_majors_area').empty();
        $.each(data, function( key, value ) {
             $('#candidate_majors_area').append('<option value="'+ data[key].major_title +'">'+ data[key].major_title +'</option>');
                //alert(data[key].major_title);
           });

       //alert(data);


  });

}