@if ($message = Session::get('success'))
<script type="text/javascript">
	//var notyf = new Notyf();
	swal({
		title: "Info Added!",
		text:  "{{$message}}",
		icon: "success",
	});
	//notyf.confirm('Your changes have been successfully saved!');
</script>
@endif


