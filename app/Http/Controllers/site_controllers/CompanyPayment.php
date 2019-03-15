<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Site_Mail\Company_Mail\Company_Payment;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;
use Carbon\Carbon;
use Validator;
use Session;
use DB;
use Mail;


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
		$permitted_chars = '0123456789';
		$company_token = substr(str_shuffle($permitted_chars), 0, 8);
		$company_token = "P-".$company_token;
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

		$accountSid = getenv('TWILIO_ACCOUNT_SID');
		$authToken = getenv('TWILIO_AUTH_TOKEN');
		$twilioNumber = getenv('TWILIO_NUMBER');
		$client = new Client($accountSid, $authToken);
		if(session()->get('company_phone') == '+923349974743' || session()->get('company_phone') == '+923316272244'){
            // Use the client to do fun stuff like send text messages!
			$client->messages->create(
            // the number you'd like to send the message to
				$request->session()->get('company_phone'),
				array(
                 // A Twilio phone number you purchased at twilio.com/console
					'from' => '+12019493393',
                 // the body of the text message you'd like to send
					'body' => "Congratulations You Have Successfully Purchased Our Package and Your Package ID is ".$company_token."!"
				)
			);
		}

		$company_id = session()->get('company_id');
		DB::table('company_availed_packages')->where('company_id',$company_id)->update($company_response);

		Mail::send(new Company_Payment());

		return redirect('company-profile')->with('success','Congratulations You Have Purchase Our Basic Package!');

    }

    public function dateCheck(){

    	//echo date('Y-m-d', strtotime("+30 days"));
         echo $date=date("Y-m-d");
    	 $info=DB::table('company_availed_packages')->where(['company_id'=>Session::get('company_id')])->first();
         echo $info->package_end_date;
    }


    public function testing(Request $request){
       // echo  $current_date = date("Y-m-d");	
       //   echo date('Y-m-d', strtotime(($current_date. ' + 30 days')));  	
$info=DB::table('company_availed_packages')->where(['company_package_status'=>'1'])->get();


	foreach ($info as $key){
		
	 	// echo $key->package_end_date;
	 	// echo "<br/>";
		$date = $key->package_start_date;		
		$now= Carbon::now();
		$dat=Carbon::parse($date);
		echo $days= $dat->diffInDays($now);
		$months= $dat->diffInMonths($now);
		$years= $dat->diffInYears($now);
		if($months > 0)
		{ 
			echo "Month is over";

		}else{
			//$days=$days-3;
            $day=(30-$days);
			echo "abi ha time ".$day;
		}
	}


    }             

}
