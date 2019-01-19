@if ($message = Session::get('success'))
<script type="text/javascript">
	//var notyf = new Notyf();
	swal({
		title: "Successfully!",
		text:  "{{$message}}",
		icon: "success",
	});
	//notyf.confirm('Your changes have been successfully saved!');
</script>
@endif


@if ($message = Session::get('error'))
<script type="text/javascript">
	swal({
		type: 'error',
		title: 'Oops...',
		text: 'Connection Failed!!',
		footer: '<a href>Why do I have this issue?</a>'
	})
//notyf.confirm('Your changes have been successfully saved!');
</script>
@endif