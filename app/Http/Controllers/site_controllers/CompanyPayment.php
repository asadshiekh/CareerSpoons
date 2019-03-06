<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Validator;
use Session;

class CompanyPayment extends Controller
{
    public function viewCheckoutPaymentMethod(Request $request){

    	return view('client_views.company_related_pages.checkout');
    }

    public function doCompanyBuyPackage(Request $request){

        Stripe::setApiKey(env('STRIPE_SECRET'));

		$customer = Customer::create(array(
			'email' => $request->stripeEmail,
			'source'  => $request->stripeToken
		));

		$charge = Charge::create(array(
			'customer' => $customer->id,
			'amount'   => 100000,
			'currency' => 'pkr',
			"description" => "Purchase the Basic Package" 
		));

		//Session::flash('success', 'Payment successful!');
		//return back();

		//echo $request->stripeToken;
		//echo "<br/>";
		//echo $customer->id;

		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$company_token = substr(str_shuffle($permitted_chars), 0, 10);
		$company_response = array(
			'package_id' => '2',
			'subscription_email' => $request->stripeEmail,
			'company_package_number' => $company_token,
			'package_start_date'=>
			'package_end_date'=>
			'company_package_status'=>'1'
			'created_at' => $current_date,
			'updated_at' =>$current_date
		);

		
		return redirect('company-profile')->with('success','Congratulations You Have Purchase Our Basic Package!');
    }
}
