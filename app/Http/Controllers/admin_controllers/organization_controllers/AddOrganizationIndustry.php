<?php

namespace App\Http\Controllers\admin_controllers\organization_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AddOrganizationIndustry extends Controller
{
    //
    public function viewIndustriesPage(){
    	$industry=DB::table('Company_industries')->get();
    	 return view('admin_views/organization_views/view_industry',['industry'=>$industry]);
    }
     public function addCompanyIndustry(Request $request)
	{
      $company_industry = $request->get('company_industry');
      $current_date = date("Y.m.d h:i:s");
      $data = array(
      	"company_industry_name" => str_replace(" ","_",$company_industry),
        "created_at" => $current_date,
        "updated_at" => $current_date
      );
     
      if(DB::table('Company_industries')->insert($data)){
       //return "yes";
       $id=DB::getPdo()->lastInsertId();
       echo '<option id="type-option" value="'.$company_industry.'">'.$company_industry.'</option>';
       
      }
	}
}
