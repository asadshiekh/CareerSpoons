<?php

namespace App\SiteModel\Company;

use Illuminate\Database\Eloquent\Model;
use DB;
class CompanyForgetPassword extends Model
{
    public function do_verify_company_email($company_email){

    	$info=DB::table('add_organizations')->select('*')->where('company_email', $company_email)->first();
		return $info;

    }

    public function do_company_register_forget_password($company_data){

    	$data = DB::table('company_forget_password')->insert($company_data);
		return $data; 
    }


    public function get_all_details_of_forget_password($company_email,$lastInsertId){

    	$info=DB::table('company_forget_password')->select('*')->where(['company_email'=> $company_email,'id'=>$lastInsertId])->first();
		return $info;
    }


    public function update_verification_link($company_email,$create_password,$lastInsertId){

    	$update_link=array(
			'verfication_link'=>1
		);

		$info=DB::table('company_forget_password')->where(['company_email'=> $company_email,'id'=>$lastInsertId])->update($update_link);

			$update_password=array(
			'company_password'=>$create_password
		);

		$info1=DB::table('add_organizations')->where('company_email', $company_email)->update($update_password);

		return $info1;

    }
}
