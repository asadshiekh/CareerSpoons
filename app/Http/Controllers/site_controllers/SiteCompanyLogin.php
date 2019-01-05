<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\Company\CompanyloginModel;

class SiteCompanyLogin extends Controller
{

	public function viewCompanyLogin(){

		return view('client_views.company_related_pages.company_login');
	}

	public function viewCompanyForgotPassword(){

		return view('client_views.company_related_pages.company_forgot_password');
	}


	public function doCompanyLogin(Request $request){


		$company_email = $request->company_email;
		$company_password = $request->company_password;

		$obj =  new CompanyloginModel();
		$info = $obj->do_login_company($company_email,$company_password);


		if($info){

			$company_data=array(
				"company_id"=>$info->id,
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
				"company_status"=>'Active',
				"login_status"=>'Active',
			);
    		//print_r($userdata);
			$request->session()->put($company_data);
			echo "yes";

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
