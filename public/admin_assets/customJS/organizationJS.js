
$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});


function company_city_adding(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var company_city = $("#add_company_city").val();
  $.post("adding-company-city",{_token:CSRF_TOKEN,company_city:company_city},function(data){ 

    if(data){
     $("#city-option:last-child").after(data);
     $("#myModal1 .close").click();
     setTimeout(
       function(){

        swal("Successfully Created New City!", "City Added Successfully in Your DataBase!", "success");
      },
      1000
      );
   }

 });

}
  function company_city_addingTable(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var company_city = $("#add_company_city").val();

  $.post("addtable-company-city",{_token:CSRF_TOKEN,company_city:company_city},function(data){ 

    if(data){
     $("#city-tr").after('<tr id="city-tr"><th><input type="checkbox" name="check_all[]" value="'+data+'" class="flat"></th><td>'+company_city+'</td><td><a href="edit_city/'+data+'"><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td></tr>');
     $("#myModal1 .close").click();

     setTimeout(
       function(){

        swal("Successfully Created New City!", "City Added Successfully in Your DataBase!", "success");
      },
      1000
      );
   }

 });

  }

function delete_city(x){
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 $.post("delete-city",{_token:CSRF_TOKEN,x:x},function(data){ 

    if(data){
      alert(data);
      $("#city-tr"+x).remove();
    }
    });
}

function delete_industry(x){
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 $.post("delete-industry",{_token:CSRF_TOKEN,x:x},function(data){ 

    if(data){
      alert(data);
      $("#industry-tr"+x).remove();
    }
    });
}

function company_industry_addingTable(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var company_indus = $("#add_company_industry").val();

  $.post("addtable-company-industry",{_token:CSRF_TOKEN,company_indus:company_indus},function(data){ 

    if(data){
     $("#industry-tr").after('<tr id="industry-tr"><th><input type="checkbox" name="check_all[]" value="'+data+'" class="flat"></th><td>'+company_indus+'</td><td><a href="edit_city/'+data+'"><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td></tr>');
     $("#myModal2 .close").click();

     setTimeout(
       function(){

        swal("Successfully Created New Industry!", "Industry Added Successfully in Your DataBase!", "success");
      },
      1000
      );
   }

 });
}
function delete_type(x){
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 $.post("delete-type",{_token:CSRF_TOKEN,x:x},function(data){ 

    if(data){
      alert(data);
      $("#type-tr"+x).remove();
    }
    });
}
  function company_type_addingTable(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var company_type = $("#add_company_type").val();
alert(company_type);
  $.post("addtable-company-type",{_token:CSRF_TOKEN,company_type:company_type},function(data){ 

    if(data){
     $("#type-tr").after('<tr id="type-tr"><th><input type="checkbox" name="check_all[]" value="'+data+'" class="flat"></th><td>'+company_type+'</td><td><a href="edit_city/'+data+'"><i class="fa fa-pencil"></i></a> | <a href=""><i class="fa fa-trash"></i></a></td></tr>');
     $("#myModal .close").click();

     setTimeout(
       function(){

        swal("Successfully Created New company type!", "Company Type Added Successfully in Your DataBase!", "success");
      },
      1000
      );
   }

 });
}
