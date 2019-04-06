@extends('client_views.user_related_pages.master')
@section('content')

						@if ($message = Session::get('password_updated'))
						<div class="alert alert-success alert-block">
							<button type="button" class="close" data-dismiss="alert">×</button>	
							<strong>{{ $message }}</strong>
						</div>
						@endif

<form>
	<div class="row">
	<div class="form-group">
		<span style="text-align: left;height: 16px;"><i id="email-error"></i></span>
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-envelope"></i>
			</div>
			<input type="email" class="form-control" id="user_email" placeholder="Enter User Email" onkeyup="checkemail();">
		</div>
	</div>

	<div class="form-group">
	
        <span style="text-align: left;height: 15px;"><i id="pass-error"></i></span>
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-lock"></i>
			</div>
			<input type="password" class="form-control" id="user_password" placeholder="Password" required="" onkeyup="checkpass();">
		</div>
	</div>

</div>


	<button type="button" class="btn btn-login" onclick="validate_user_login();" style="margin-top:2%;">Login</button>
	<span>You Have No Account? <a href="{{url('user-registeration')}}"> Create An User Account</a></span>
	<span><a href="{{url('user-forgot-password')}}"> Forgot Password</a></span>
</form>

<script type="text/javascript">
	var user_verify = {{Session::has('user_email_verify')}};

	if(user_verify){

		swal({
			title: "Your Email Verify!",
			text: "Lets Get Started!",
			icon: "success",
		});

	}

</script>

<script type="text/javascript">
	var msg = {{Session::has('email_status_response')}};

	if(msg){

		swal({
			title: 'Your Email is Already Verified',
			animation: false,
			customClass: 'animated tada'
		})

	}

</script>

<script type="text/javascript">
function user_page_login(){
alert("yes");
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var user_email = $("#user_email").val();
	var user_password = $("#user_password").val();
var l = window.location;
var base_url = l.protocol + "//" + l.host + "/do-user-login";
//alert(base_url);
	$.post(base_url,{_token:CSRF_TOKEN,user_email:user_email,user_password:user_password},function(data){ 

		if(data =="yes"){				

			//alert(data);
				setTimeout(
					function(){


						Swal.fire({
							type: 'success',
							title: 'Login Successfully!',
							showConfirmButton: false,
							timer: 1500
						});

						//swal('Login Successfully!','','success');

					},
					1200
					);

				setTimeout(
					function(){

						window.location.replace("/");
					},
					2100
					);

			}
			else if(data="no"){

				setTimeout(
					function(){

						swal({
							type: 'error',
							title: 'Oops...',
							text: 'Something went wrong Failed To Login!!',
							footer: '<a href>Why do I have this issue?</a>'
						})
					},
					1000
					);
			}
			


			

		});

}
</script>
<style type="text/css">

.alert{
	color: red;
	font-size: 10px;
}
/*.user-danger{
	border: solid 2px red;
}*/
.success{
	color: green;
	font-size: 10px;
}
/*.user-success{
	border: solid 2px green;
}*/

</style>


@endsection