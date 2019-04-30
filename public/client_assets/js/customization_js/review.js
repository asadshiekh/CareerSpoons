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


////////////////////////////////////////////////////////////////////////////


var company_review_validater = function validater(value){
      var check;
      
  if(value != ""){
      $("#company_review_error").text(' ');
        check=true;
      }else{
        $("#company_review_error").removeClass('success');
        $("#company_review_error").addClass('alert');
        $("#company_review_error").text('Required * ');
        check=false;
      }
     return check;
 }

function review_validation(){
 // alert("yes");
      var company_Bio = CKEDITOR.instances['rating_pro'].getData();

      var getReview=company_review_validater(company_Bio);

      // alert(getBio);

      if(getReview){
      	company_review();
        //return true;
      }else{
        swal("Error"," Review Not Updated","error");
       // return false;
      }
      
}