@extends('client_views.user_related_pages.master')
@section('content')

<form>
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-envelope"></i>
			</div>
			<input type="email" class="form-control" placeholder="Enter Candidate Email">
		</div>
	</div>
	<button class="btn btn-login" type="submit">Submit</button>
	<span><a href="{{url('user-login')}}">Back to Login</a></span>
</form>

@endsection
