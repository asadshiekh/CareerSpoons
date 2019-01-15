//Custom Functions For USers
  function delete_single_user(x){
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this User Information!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.post("delete-single-user",{_token:CSRF_TOKEN,x:x},function(data){ 

          if(data){
           $("#user-tr"+x).css('background-color','#CE6969');
          //  swal("Poof! Your imaginary file has been deleted!", {
          //   icon: "success",
          // });
           $("#user-tr"+x).hide(2000);

         }
       });

      } else {
        swal("Your Information is safe!");
      }
    });


  }

//view user(view model window)
function view_user(x){
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.post("view-single-user",{_token:CSRF_TOKEN,x:x},function(data){ 

          if(data){
            $('#view_user_model').html(data);
           $('#mymodaluser').modal('show');
         }
       });

}

//functions for Contact us

function view_message(x){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.post("view-single-message",{_token:CSRF_TOKEN,x:x},function(data){ 

          if(data){
            $('#model_view_message').html(data);
           $('#mymodalmesage').modal('show');
         }
       });
}
function reply_message(x,y,z){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.post("reply-single-message",{_token:CSRF_TOKEN,x:x,y:y,z:z},function(data){ 

          if(data){
            $('#model_reply_message').html(data);
           $('#mymodalreply').modal('show');
           CKEDITOR.replace( 'message' );
         }
       });
}