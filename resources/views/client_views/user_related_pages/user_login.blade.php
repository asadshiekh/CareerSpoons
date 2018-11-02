@extends('client_views.user_related_pages.master')
@section('content')
<form>
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-envelope"></i>
			</div>
			<input type="email" class="form-control" id="user_email" placeholder="Enter User Email">
		</div>
	</div>

	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-lock"></i>
			</div>
			<input type="password" class="form-control" id="user_password" placeholder="Password" required="">
		</div>
	</div>


	<button type="button" class="btn btn-login" onclick="user_login();">Login</button>
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


@endsection