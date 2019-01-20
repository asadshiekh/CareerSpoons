<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\Company\CompanyRegisteration;
use App\Mail\Site_Mail\Company_Mail\Company_Registeration;
use Mail;
use DB;
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
			'company_phone' => $request->company_phone_number,
			'company_email' => $request->company_email,
			'company_password' => $request->company_password,
			'company_cnic' => $request->company_cnic,
			'org_activation' => "Active",
			'registeration_process' => "N",
			'created_at' => $current_date,
			'updated_at' =>$current_date

		);

		$obj =  new CompanyRegisteration();
    	$company_info = $obj->do_register_company($company_response);
    	
			

    	if($company_info){
            $picture_up=array(
				'company_img'=>"user.png",
				'company_id'=>$company_info
		    );
		    //print_r($picture_up);
			DB::table('upload_org_img')->insert($picture_up);
     		echo "yes";
    	}
    	else{

    		echo "no";
    	}

	}

	public function sendCompanyRegisterationEmail(Request $request){

		//Send User Mail For Verification
       Mail::send(new Company_Registeration());
	}

}
