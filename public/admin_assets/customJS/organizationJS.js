
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
  var c_city ="'"+company_city+"'";
  $.post("addtable-company-city",{_token:CSRF_TOKEN,company_city:company_city},function(data){ 

    if(data){
      var id ="'"+data+"'";
      $("#city-tr").after('<tr id="city-tr'+data+'"><th><input type="checkbox" name="check_all[]" value="'+data+'" class="flat"></th><td id="up-td'+data+'">'+company_city+'</td><td><a onclick="update_request('+c_city+','+id+');"><i class="fa fa-pencil"></i></a> | <a onclick="delete_city('+id+');"><i class="fa fa-trash"></i></a></td></tr>');
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
 var result = confirm("Really want to delete this city?");
 if(result){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post("delete-city",{_token:CSRF_TOKEN,x:x},function(data){ 

    if(data){

     $("#city-tr"+x).css('background-color','#CE6969');
     $("#city-tr"+x).hide(2000);
   }
 });
}
}

function delete_industry(x){
 var result = confirm("Really want to delete this industry?");
 if(result){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post("delete-industry",{_token:CSRF_TOKEN,x:x},function(data){ 

    if(data){
     $("#industry-tr"+x).css('background-color','#CE6969');
     $("#industry-tr"+x).hide(2000);

   }
 });
}
}
function delete_qual(x){
 var result = confirm("Really want to delete this Qualification?");
 if(result){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post("delete-qual",{_token:CSRF_TOKEN,x:x},function(data){ 

    if(data){
     $("#qual-tr"+x).css('background-color','#CE6969');
     $("#qual-tr"+x).hide(2000);

   }
 });
}
}
function delete_major(x){
 var result = confirm("Really want to delete this major Qualification?");
 if(result){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post("delete-major",{_token:CSRF_TOKEN,x:x},function(data){ 

    if(data){
     $("#major-tr"+x).css('background-color','#CE6969');
     $("#major-tr"+x).hide(2000);

   }
 });
}
}

function delete_area(x){
 var result = confirm("Really want to delete this major Functional Area?");
 if(result){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post("delete-area",{_token:CSRF_TOKEN,x:x},function(data){ 

    if(data){
     $("#area-tr"+x).css('background-color','#CE6969');
     $("#area-tr"+x).hide(2000);

   }
 });
}
}
function delete_degree(x){
 var result = confirm("Really want to delete this major degree?");
 if(result){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post("delete-degree",{_token:CSRF_TOKEN,x:x},function(data){ 

    if(data){
     $("#degree-tr"+x).css('background-color','#CE6969');
     $("#degree-tr"+x).hide(2000);

   }
 });
}
}


function company_industry_addingTable(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var company_indus = $("#add_company_industry").val();
  var c_indus ="'"+company_indus+"'";
  $.post("addtable-company-industry",{_token:CSRF_TOKEN,company_indus:company_indus},function(data){ 

    if(data){
      var id ="'"+data+"'";
      $("#industry-tr").after('<tr id="industry-tr'+data+'"><th><input type="checkbox" name="check_all[]" value="'+data+'" class="flat"></th><td id="indus-td'+data+'">'+company_indus+'</td><td><a onclick="update_industry('+c_indus+','+id+');"><i class="fa fa-pencil"></i></a> | <a onclick="delete_industry('+id+');"><i class="fa fa-trash"></i></a></td></tr>');
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
 var result = confirm("Really want to delete this type?");
 if(result){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post("delete-type",{_token:CSRF_TOKEN,x:x},function(data){ 

    if(data){
     $("#type-tr"+x).css('background-color','#CE6969');
     $("#type-tr"+x).hide(2000);

   }
 });
}
}

function company_type_addingTable(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var company_type = $("#add_company_type").val();
  var c_type ="'"+company_type+"'";
  $.post("addtable-company-type",{_token:CSRF_TOKEN,company_type:company_type},function(data){ 
    if(data){
     var id ="'"+data+"'"; 
     $("#type-tr").after('<tr id="type-tr'+data+'"><th><input type="checkbox" name="check_all[]" value="'+data+'" class="flat"></th><td id="type-td'+data+'">'+company_type+'</td><td><a onclick="update_type('+c_type+','+id+');"><i class="fa fa-pencil"></i></a> | <a onclick="delete_type('+id+');"><i class="fa fa-trash"></i></a></td></tr>');
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

function update_type(name,id){
 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 $.post("request-update-type",{_token:CSRF_TOKEN,name:name,id:id},function(data){
  $("#type_view").html(data);
  $("#myModal3").modal('show');
});
}
function edit_type(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var type=$("#up_company_type").val();
  var id=$("#type_id").val();
  $.post("update-type",{_token:CSRF_TOKEN,type:type,id:id},function(data){
    if(data){
      $("#myModal3").modal('hide');
      $("#type-td"+id).html(type);
      var originalColor = $("#type-tr"+id).css("background-color");
      $("#type-tr"+id).css("background",'#84D285');
      setTimeout(function(){
        $("#type-tr"+id).css("background",originalColor);
      },3000);
    }
  });
}


  


