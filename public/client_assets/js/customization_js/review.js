	function review(){
		var notyf = new Notyf();
		var $rateYo = $("#rateYo").rateYo();
		var rating = $rateYo.rateYo("rating");
		var rating_description = CKEDITOR.instances['rating_pro'].getData();
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		
		if(rating==''){

			alert("select rating");
			return false;
		}
		if (rating_description == '') {
			alert('Editor value cannot be empty!') ;
			return false ;
		}


		else{

			$.post("candidate-rating",{_token:CSRF_TOKEN,rating:rating,rating_description:rating_description},function(data){

				if(data=="yes"){

					setTimeout(
						function(){

							swal('Review Add Successfully!','','success');

						},
						500
						);
					notyf.confirm('Your changes have been successfully saved!');
				}
				else{
					
					setTimeout(
				function(){

					swal({
						type: 'error',
						title: 'Oops...',
						text: 'Connection Failed!!',
						footer: '<a href>Why do I have this issue?</a>'
					})
				},
				1000
				);

			notyf.alert('Something Went Worng Plz Try Again');
				}

			});
		}




	}


