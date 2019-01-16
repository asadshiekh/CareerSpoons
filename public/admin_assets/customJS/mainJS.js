
//contact us functions

function send_email_message(x,y,z){
var msg=CKEDITOR.instances['message'].getData();
 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.post("reply-contact-email",{_token:CSRF_TOKEN,x:x,y:y,msg:msg},function(data){ 

         if(data== "yes"){
            swal("Success", "Email Send Successfully.", "success");
           $.post("sending-reply-email",{_token:CSRF_TOKEN,z:z,y:y,msg:msg},function(data){
           
            });
         }
         else{
         	swal("Oops", "Email sending Fail.", "error");
         }
       });
}

//About Us functions

function about_us_content(){
//$("#about_btn").addattr("disabled","disabled");


   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  //disable the default form submission
  event.preventDefault();

  //grab all form data  
  var formData = new FormData($("#about")[0]);

  $.ajax({
    url: 'about-us-form-send',
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
        document.getElementById("about").reset();

        swal("success", "About Us Content Updated.", "success");
      //$("#about_btn").removeattr("disabled","disabled");

    }
  });

  return false;
 
}
