
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