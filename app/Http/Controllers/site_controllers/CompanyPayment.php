<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Validator;
use Session;
use DB;

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


        
        $current_date = date("Y-m-d");
        $added_date=date('Y-m-d', strtotime("+30 days"));
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$company_token = substr(str_shuffle($permitted_chars), 0, 10);
		$company_response = array(
			'company_id' => $request->session()->get('company_id'),
			'package_id' => '2',
			'subscription_email' => $request->stripeEmail,
			'company_package_number' => $company_token,
			'package_start_date'=>$current_date,
			'package_end_date'=>$added_date,
			'company_package_status'=>'1',
			'updated_at' =>$current_date
		);

		//dd($company_response);
		DB::table('company_availed_packages')->insert($company_response);
		return redirect('company-profile')->with('success','Congratulations You Have Purchase Our Basic Package!');

    }

    public function dateCheck(){

    	//echo date('Y-m-d', strtotime("+30 days"));
         echo $date=date("Y-m-d");
    	 $info=DB::table('company_availed_packages')->where(['company_id'=>Session::get('company_id')])->first();
         echo $info->package_end_date;
    }
}
