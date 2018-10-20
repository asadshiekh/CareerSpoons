@extends('client_views.user_related_pages.master')
@section('content')
<form>
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-envelope"></i>
			</div>
			<input type="email" class="form-control" placeholder="Enter User Email">
		</div>
	</div>

	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-lock"></i>
			</div>
			<input type="password" class="form-control" placeholder="Password" required="">
		</div>
	</div>


	<button class="btn btn-login" type="submit">Login</button>
	<span>You Have No Account? <a href="{{url('user-registeration')}}"> Create An User Account</a></span>
	<span><a href="{{url('user-forgot-password')}}"> Forgot Password</a></span>
</form>
@endsection