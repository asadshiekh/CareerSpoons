<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{csrf_token()}}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<form>
	  <input type="hidden" name="id" value="123" readonly="readonly">
	  User Name: <input type="text" name="username" value=""><br />
	  Profile Image: <input name="profileImg" type="file" /><br />
	  Display Image: <input name="displayImg" type="file" /><br />
	  <input type="submit" value="Submit">
	</form>
</body>
</html>
<script type="text/javascript">
	//Program a custom submit function for the form
$("form#data").submit(function(event){

	 $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
 
  //disable the default form submission
  event.preventDefault();
 
  //grab all form data  
  var formData = new FormData($(this)[0]);
 
  $.ajax({
    url: 'jango1',
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (returndata) {
      alert(returndata);
    }
  });
 
  return false;
});
</script>