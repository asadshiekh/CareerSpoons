<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\Company\CompanyRegisteration;
class SiteCompany extends Controller
{
	public function viewRegisterCompany(){

		return view('client_views.company_related_pages.company_registeration');
	}

	public function doRegisterCompany(Request $request){

		$current_date = date("Y.m.d h:i:s");

		$company_response = array(
			'company_name' => $request->company_name,
			'company_type' => $request->company_type,
			'company_city' => $request->company_city,
			'company_branch' => $request->company_branch,
			'company_phone' => $request->company_phone_number,
			'company_industry' => $request->company_industry,
			'company_since' => $request->company_operating_since,
			'company_location' => $request->company_address,
			'company_email' => $request->company_email,
			'company_password' => $request->company_password,
			'company_cnic' => $request->company_cnic,
			'isChecked' => $request->isChecked,
			'created_at' => $current_date
		);

		$obj =  new CompanyRegisteration();
    	$company_info = $obj->do_register_company($company_response);

    	if($company_info){

    		echo "yes";
    	}
    	else{

    		echo "no";
    	}

	}

}
