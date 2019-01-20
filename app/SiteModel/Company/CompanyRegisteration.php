<?php

namespace App\SiteModel\Company;

use Illuminate\Database\Eloquent\Model;
use DB;

class CompanyRegisteration extends Model
{
	public function do_register_company($company_response){

		DB::table('add_organizations')->insert($company_response);
    	$id=DB::getPdo()->lastInsertId();
    	return $id;
	}
}
