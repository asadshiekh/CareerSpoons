<?php

namespace App\SiteModel\Company;

use Illuminate\Database\Eloquent\Model;
use DB;

class CompanyRegisteration extends Model
{
	public function do_register_company($company_response){

		$data = DB::table('register_company')->insert($company_response);
    	return $data; 
	}
}
