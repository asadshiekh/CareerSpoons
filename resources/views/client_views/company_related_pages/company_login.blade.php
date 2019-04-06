@extends('client_views.company_related_pages.master')
@section('content')
<form>
	<div class="form-group">
       <span style="text-align: left;height: 15px;"> <i id="emailc-error"></i>
	    </span>
		<div class="input-group">

			<div class="input-group-addon">
				<i class="fa fa-envelope"></i>
			</div>
			<input type="email" class="form-control" placeholder="Enter Company Email" id="company_email" onkeyup="checkcemail();">
		</div>
	</div>

	<div class="form-group">
		<span style="text-align: left;height: 15px;"><i id="passc-error"></i></span>
	    </span>
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-lock"></i>
			</div>
			<input type="password" class="form-control" placeholder="Password" id="company_password" onkeyup="checkpass();">
	    
	</div>
	</div>


	<button class="btn btn-login" type="button" onclick="validate_company_login();" style="margin-top:2%;">Login</button>
	<span>You Have No Account? <a href="{{url('company-registeration')}}"> Create An Account</a></span>
	<span><a href="{{url('company-forgot-password')}}"> Forgot Password</a></span>
</form>
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