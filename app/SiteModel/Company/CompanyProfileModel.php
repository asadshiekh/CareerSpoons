<?php

namespace App\SiteModel\Company;

use Illuminate\Database\Eloquent\Model;
use DB;
class CompanyProfileModel extends Model
{
    public function company_update_reviews($company_id,$company_response){
    	$data = DB::table('organization_reviews')->where('organization_id',$company_id)->update($company_response);
		return $data; 
    }
}
