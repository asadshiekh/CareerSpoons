
//contact us functions

function send_email_message(x,y,z){
var msg=CKEDITOR.instances['message'].getData();
 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.post("reply-contact-email",{_token:CSRF_TOKEN,x:x,y:y,msg:msg},function(data){ 

          if(data== "yes"){
           alert("check mail");
           $.post("sending-reply-email",{_token:CSRF_TOKEN,z:z,y:y,msg:msg},function(data){
            alert(data);
            });
         }
         else{
         	alert("fail");
         }
       });
}