<!DOCTYPE html>
<html>
<head>

    <!-- load jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script>
        $(document).ready(function(){
            
            
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
             var username = $("#username").val();
             var formdata = new FormData(this);
		            $(".postbutton").click(function(){
		                $.ajax({
		                    /* the route pointing to the post function */
		                    url: '/postajax2',
		                    type: 'POST',
		                    /* send the csrf-token and the input to the controller */
		                    data: {_token: CSRF_TOKEN, formdata:formdata},
		                    dataType: 'JSON',
		                    /* remind that 'data' is the response of the AjaxController */
		                    success: function (data) { 
		                        $(".writeinfo").append(data.msg);

		                    }
		                }); 
		            });



       		});    
    </script>

</head>

<body>

 <form id="userform" method="post" enctype="multipart/form-data">
 	
 	<input type="text" name="name" value="ali">
 	<input type="text" name="fname" value="asad afzal">
 	<input type="file" name="file">
 	<button class="postbutton">Post via ajax!</button>

 </form> 

  <div class="writeinfo"></div>

</body>

</html>