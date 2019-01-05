@extends('client_views.user_related_pages.master')
@section('content')


<form action="{{url('verify-candidate-email')}}" method="POST">
	 {{ csrf_field() }}

	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-envelope"></i>
			</div>
			<input type="email" name="candidate_email" id="candidate_email" class="form-control" placeholder="Enter Candidate Email">
		</div>
	</div>
	<button class="btn btn-login" id="verify_button" type="button" onclick="verifycandidateEmail();" >Submit</button>
	<span><a href="{{url('user-login')}}">Back to Login</a></span>
</form>



@endsection
