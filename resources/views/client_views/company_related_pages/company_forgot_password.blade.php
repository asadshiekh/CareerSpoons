@extends('client_views.company_related_pages.master')
@section('content')

<form>
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-envelope"></i>
			</div>
			<input type="email" id="company_email" class="form-control" placeholder="Enter Company Email">
		</div>
	</div>
	<button class="btn btn-login" id="verify_button" type="button" onclick="verifycompanyEmail()">Submit</button>
	<span><a href="{{url('company-login')}}">Back to Login</a></span>
</form>

@endsection
