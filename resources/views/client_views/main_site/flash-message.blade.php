<script type="text/javascript">
	var has_value = {{Session::has('Access')}};
	if(has_value){
		swal({
			title: 'Oops...You Are Already Sign In',
			animation: false,
			customClass: 'animated tada',
			showCloseButton:true,
			type: 'warning',
			footer: '<a href="">Why do I have this issue?</a>',
		})
	}
</script>
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
<script type="text/javascript">
	var msg = {{Session::has('email_status_response')}};

	if(msg){

		swal({
			title: 'Your Email is Already Verified',
			animation: false,
			customClass: 'animated tada'
		})

	}

</script>


