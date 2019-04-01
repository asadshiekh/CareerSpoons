<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\Company\CompanyloginModel;
use App\SiteModel\Company\CompanyForgetPassword;
use App\Mail\Site_Mail\Company_Mail\Company_Forget_Password;
use Illuminate\Support\Facades\Session;
use Mail;
use DB;

class SiteCompanyLogin extends Controller
{

	public function viewCompanyLogin(){
        
		return view('client_views.company_related_pages.company_login');
	}

	public function viewCompanyForgotPassword(){

		return view('client_views.company_related_pages.company_forgot_password');
	}


	public function VerifyCompanyEmail(Request $request){

		$company_email = $request->company_email;
		$obj =  new CompanyForgetPassword();
		$response = $obj->do_verify_company_email($company_email);

		if($response){

			date_default_timezone_set("Asia/Karachi");
			$current_date = date("Y.m.d h:i:s");

			$created_at  =  date("d-m-Y");
                // echo date("h:i a"); 
			$now = time();
                // echo  "<br/>";
			$ten_minutes = $now + (5 * 60);
                // echo  "<br/>";
			$startTime = date('h:i a', $now);
                // echo  "<br/>";
			$endTime = date('h:i a', $ten_minutes);

			$company_data=array(
				"company_id"=>$response->company_id,
				"company_email"=>$response->company_email,
				"start_time"=>$startTime,
				"expire_time"=>$endTime,
				"current_date_year"=>$created_at,
				"created_at"=>$current_date,
			);

		$response_2 = $obj->do_company_register_forget_password($company_data);
			$lastInsertId = DB::getPdo()->lastInsertId();
			$request->session()->put('lastCompanyInsertId',$lastInsertId);
			$request->session()->put('CompanyUniqueEmail',$response->company_email);
			echo "yes";
			
		}

		else{

					
		}
	
	}

	public function sendCompanyForgetEmail(){

		 Mail::send(new Company_Forget_Password());
	}


	public function viewCreateNewPassword(){

		return view('client_views.company_related_pages.create_new_password');	
	}

	public function updateCompanyFogretPassword(Request $request){

		date_default_timezone_set("Asia/Karachi");
		$current_date  =  date("d-m-Y");
		$now = time();
		$current_Time = date('h:i a', $now);
		$create_password = $request->new_password;
		$lastInsertId  =  (Session::has('lastCompanyInsertId') ? Session::get('lastCompanyInsertId') : '0');
		$company_email  = (Session::has('CompanyUniqueEmail') ? Session::get('CompanyUniqueEmail') : 'abc@abc.com');
		

		$obj =  new CompanyForgetPassword();
		$response = $obj->get_all_details_of_forget_password($company_email,$lastInsertId);


	if($response){	

		if($response->verfication_link=='0'){

			if($current_date == $response->current_date_year &&  $current_Time<=$response->expire_time  && $current_Time>=$response->start_time){

				$info = $obj->update_verification_link($company_email,$create_password,$lastInsertId);
				
				echo "yes";

			}

			else{

				$request->session()->forget('lastCompanyInsertId');
				$request->session()->forget('CompanyUniqueEmail');
				echo "yes2";
			}

		}

		else if($response->verfication_link=='1'){

			$request->session()->forget('lastCompanyInsertId');
			$request->session()->forget('CompanyUniqueEmail');
			echo "yes3";
		}


	}

	else{


		echo "yes4";
	}




	}


	public function doCompanyLogin(Request $request){


		$company_email = $request->company_email;
		$company_password = $request->company_password;

		$obj =  new CompanyloginModel();
		$info = $obj->do_login_company($company_email,$company_password);


		if($info){

			$info2 = $obj->get_organization_review_data($info->company_id);
			$info3 = $obj->get_company_availed_packages_details($info->company_id);
			$info4 = $obj->get_company_advertise_logo_details($info->company_id);

			if($info->org_activation == "Active"){
				$company_data=array(
					"company_id"=>$info->company_id,
					"company_name"=>$info->company_name,
					"company_email"=>$info->company_email,
					"company_branch"=>$info->company_branch,
					"company_phone"=>$info->company_phone,
					"company_website"=>$info->company_website,
					"company_since"=>$info->company_since,
					"company_location"=>$info->company_location,
					"company_cnic"=>$info->company_cnic,
					"company_info"=>$info->company_info,
					"email_status"=>$info->verify_by_email,
					"registeration_process"=>$info->registeration_process,
					"company_status"=>$info->org_activation,
					"organization_rating"=>$info2->rating_points,
					"company_package_status"=>$info3->company_package_status,
					"company_adverised_logo"=>$info4->company_logo_submitted,
					"login_status"=>'Active',
				);
				 $request->session()->put($company_data);
				echo "yes";
			}else{
				echo "nups";
			}

		}

		else{

			echo "no";
		}

	}


	public function companyLogout(Request $request){

        $request->session()->flush();
        return redirect('/');
    }




}
