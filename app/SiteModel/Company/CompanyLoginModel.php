<?php

namespace App\SiteModel\Company;

use Illuminate\Database\Eloquent\Model;
use DB;
class CompanyLoginModel extends Model
{
	public function do_login_company($company_email,$company_password){

		$info=DB::table('add_organizations')->select('*')->where([
			['company_email','=',[$company_email]],
			['company_password','=',[$company_password]],
		])->first();
		return $info;
	}

	public function get_organization_review_data($organization_id){

		$data = DB::table('organization_reviews')->where('organization_id',$organization_id)->first();
		return $data; 
		
	}

	public function get_company_availed_packages_details($organization_id){

		$data = DB::table('company_availed_packages')->where('company_id',$organization_id)->first();
		return $data; 
	}


	public function get_company_advertise_logo_details($organization_id){

		$data = DB::table('company_advertised_logo')->where('company_id',$organization_id)->first();
		return $data;
	}
}
