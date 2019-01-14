<?php

namespace App\SiteModel\Company;

use Illuminate\Database\Eloquent\Model;
use DB;
class CompanyLoginModel extends Model
{
	public function do_login_company($company_email,$company_password){

		$info=DB::table('register_company')->select('*')->where([
			['company_email','=',[$company_email]],
			['company_password','=',[$company_password]],
		])->first();
		return $info;
	}
}
