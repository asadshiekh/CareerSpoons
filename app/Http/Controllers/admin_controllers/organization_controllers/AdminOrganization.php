<?php

namespace App\Http\Controllers\admin_controllers\organization_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdminOrganization extends Controller
{
	/* Organization Operations functions*/
	public function addOrganizationForm()
	{
       $rows=DB::table('company_types')->get();
       $city=DB::table('Add_cities')->get();
       $industry=DB::table('Company_industries')->get();
		return view('admin_views/organization_views/add_organization',['row'=>$rows,'city'=>$city,'industry'=>$industry]);

	}
	
	public function viewRegistedOrganization()
	{
        
		return view('admin_views/organization_views/view_organization');

	}
	public function viewCompanyType(Request $request)
	{
		$types=DB::table('company_types')->get();
       return view('admin_views/organization_views/view_organization_type',['types'=>$types]);
	}
	public function addCompanyType(Request $request)
	{
      
      $company_type = $request->get('company_type');
      $current_date = date("Y.m.d h:i:s");
      $data = array(
      	"company_type_name" => str_replace(" ","_",$company_type),
        "created_at" => $current_date,
        "updated_at" => $current_date
      );
     
      if(DB::table('company_types')->insert($data)){
       //return "yes";
       $id=DB::getPdo()->lastInsertId();
       echo '<option id="type-option" value="'.$company_type.'">'.$company_type.'</option>';
       
      }
	}
	public function addCompanyForm(Request $request)
	{
      return print_r($_POST);
 
	}
}
