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
	var notyf = new Notyf();
	swal({
		type: 'error',
		title: 'Oops...',
		text: '{{$message}}',
		footer: '<a href>Why do I have this issue?</a>'
	})
	notyf.alert('Something Went Wrong');
</script>
@endif


@if ($message = Session::get('errors'))
<script type="text/javascript">
	var notyf = new Notyf();
	swal({
		type: 'error',
		title: 'Oops...',
		text: 'Your Cover Photo is not Uploaded',
		footer: '<a href>Why do I have this issue?</a>'
	})
	notyf.alert('Something Went Wrong');
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