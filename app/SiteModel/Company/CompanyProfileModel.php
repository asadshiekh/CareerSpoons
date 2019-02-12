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
    public function fetch_all_companies(){
    	$company=DB::table('add_organizations')->join('upload_org_img','add_organizations.company_id', '=', 'upload_org_img.company_id')->join('add_organization_social_link','add_organizations.company_id', '=', 'add_organization_social_link.organization_id')->select('add_organizations.*','add_organization_social_link.*','upload_org_img.*')->where('add_organizations.org_activation','!=','Block')->inRandomOrder()->simplePaginate(4);
    	if($company->count()>0){
            return $company;
        }
        else{
            return $company->count();
        }
    }
}
