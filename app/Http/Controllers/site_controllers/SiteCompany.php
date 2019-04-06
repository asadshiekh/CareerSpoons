<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\Company\CompanyRegisteration;
use App\Mail\Site_Mail\Company_Mail\Company_Registeration;
use App\SiteModel\ClientSite\ClientSiteModel;
use App\SiteModel\Company\CompanyProfileModel;
use Mail;
use DB;
class SiteCompany extends Controller
{
	public function viewRegisterCompany(){

		$obj1 = new ClientSiteModel();
		$get_cities = $obj1->get_all_cities();
		$get_types = $obj1->get_all_types();
		$page_title="CareerSpoons - Company Registeration";
		
		return view('client_views.company_related_pages.company_registeration',['get_cities'=>$get_cities,'get_types'=>$get_types,'page_title'=>$page_title]);
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
    	
		$lastInsertId = DB::getPdo()->lastInsertId();

		 $company_social_links = array(
          'organization_id' => $lastInsertId,
          'created_at' => $current_date
        );

		 $company_current_package = array(
				'company_id' => $lastInsertId,
				'package_id' => '1',			
				'created_at' =>$current_date
			);

		 $company_advertised_logo = array(
				'company_id' => $lastInsertId,	
				'created_at' =>$current_date
			);


		//Initialized Table of Company _availed_packages
		DB::table('company_availed_packages')->insert($company_current_package);


		 //Initialized Table of Social Links
		 DB::table('add_organization_social_link')->insert($company_social_links);
     	
     	//Initialized Table of Review System
		DB::table('organization_reviews')->insert($company_social_links);


		 //Initialized Table of company_advertised_logo
	    DB::table('company_advertised_logo')->insert($company_advertised_logo);

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

	public function filterCompanies(Request $request){
     $name=$request->post("company_name");
     $city=$request->post("company_city");
      $obj = new CompanyProfileModel();
      $org=$obj->fetch_all_filter_companies($name,$city);
      $fetch_citi=DB::table('Add_cities')->get();
      $page_title = "CareerSpoons - Filter Companies";
      return view("client_views.company_related_pages.allCompanies",['org'=>$org,'fetch_citi'=>$fetch_citi,'name'=>$name,'city'=>$city,'page_title'=>$page_title]);
	}


	public function doCheckCompanyEmailExists(Request $request){
		$email= $request->email;
        $count_email=DB::table('add_organizations')->where(['company_email'=>$email])->get()->count();
        echo $count_email;
	}

}
