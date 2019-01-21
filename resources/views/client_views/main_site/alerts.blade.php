@if ($message = Session::get('success'))
<script type="text/javascript">
	var notyf = new Notyf();
	swal({
		title: "Successfully!",
		text:  "{{$message}}",
		icon: "success",
	});
	notyf.confirm('Your changes have been successfully saved!');
</script>
@endif


@if ($message = Session::get('p_errors'))
<script type="text/javascript">
	swal({
		type: 'error',
		title: 'Oops...',
		text: 'Connection Failed!!',
		footer: '<a href>Why do I have this issue?</a>'
	})
	notyf.confirm('Your changes have been successfully saved!');
</script>
@endif








@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	Please check the form below for errors
</div>
@endif