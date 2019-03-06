@extends('client_views.master2')
@section('content')


<!-- Title Header Start -->
<section class="inner-header-title gray-bg">
	<div class="container">
		<h2 class="cl-default">Pyament Method</h2>
		<img class="cl-default" src="{{url('public/client_assets/img/debit.png')}}" class="img-responsive payment-img" alt="">
	</div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->
 
<!-- Accordion Design Start -->
<section class="accordion">
	<div class="container">
		<div class="row">

			<!-- Payment Detail -->
						<div class="col-md-6 col-md-offset-3">
							<div class="sidebar-wrapper">

								@if (Session::has('success'))
								<div class="alert alert-success text-center">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<p>{{ Session::get('success') }}</p>
								</div>
								@endif

								@if (Session::has('error'))
								<div class="alert alert-danger text-center">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<p>{{ Session::get('error') }}</p>
								</div>
								@endif

							
							<div class="sidebar-box-header">
								<div class="col-md-8">
								<h4>Credit Card Information</h4>
								</div>
								<div class="col-md-4">
								<img src="{{url('public/client_assets/img/debit.png')}}" class="img-responsive payment-img" alt="" height="100" width="100">
								</div>
							</div>
							
								<div class="panel-body">

					

							<form role="form" action='buy-package-basic' method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
								@csrf


								<div class='form-row row'>
									<div class='col-xs-12 form-group required'>
										<label class='control-label'>Email</label> <input
										class='form-control' type='email' id="stripeEmail" name="stripeEmail" value="{{ Session::get('company_email') }}">
									</div>
								</div>

								<div class='form-row row'>
									<div class='col-xs-12 form-group required'>
										<label class='control-label'>Name on Card</label> <input
										class='form-control' size='4' type='text'>
									</div>
								</div>

								<div class='form-row row'>
									<div class='col-xs-12 form-group card required'>
										<label class='control-label'>Card Number</label> <input
										autocomplete='off' class='form-control card-number' size='20'
										type='text' name='card_no'>
									</div>
								</div>

								<div class='form-row row'>
									<div class='col-xs-12 col-md-4 form-group cvc required'>
										<label class='control-label'>CVC</label> <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name='cvvNumber'>
									</div>
									<div class='col-xs-12 col-md-4 form-group expiration required'>
										<label class='control-label'>Expiration Month</label> <input
										class='form-control card-expiry-month' placeholder='MM' size='2'
										type='text' name='ccExpiryMonth'>
									</div>
									<div class='col-xs-12 col-md-4 form-group expiration required'>
										<label class='control-label'>Expiration Year</label> <input
										class='form-control card-expiry-year' placeholder='YYYY' size='4'
										type='text' name='ccExpiryYear'>
									</div>
								</div>

								<div class='form-row row'>
									<div class='col-md-12 error form-group hide'>
										<div class='alert-danger alert'>Please correct the errors and try
										again.</div>
									</div>
								</div>

								<div class="row">
									<div class="col-xs-12">
										<button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
									</div>
								</div>
							</form>
						</div>
							
							</div>
						</div>




		</div>
	</div>
</section>
<!-- Accordion Design End -->

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>


@endsection