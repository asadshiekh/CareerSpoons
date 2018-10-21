<?php

namespace App\Http\Controllers\admin_controllers\organization_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use validator;

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
		$organizations=DB::table('Add_organizations')->get();
		return view('admin_views/organization_views/view_organization',['organizations'=>$organizations]);

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
		$company_name = $request->get('company_name');
		$company_type = $request->get('selected_company_type');
		$company_city = $request->get('selected_city');
		$company_branch = $request->get('company_branch_name');
		$company_phone = $request->get('company_phone');
		$company_website = $request->get('company_website');
		$company_employees = $request->get('selected_employees');
		$company_industry = $request->get('selected_industry');
		$company_since = $request->get('company_since');
		$company_location = $request->get('company_location');
		$company_email = $request->get('company_email');
		$company_password = $request->get('company_password');
		$company_cnic = $request->get('company_cnic');
		$company_info = $request->get('company_info');

		$current_date = date("Y.m.d h:i:s");
		$file=$request->file('company_doc');
		$new_name = rand().'.'.$file->getClientOriginalExtension();
		$destination='uploads/organization_documents';
		if($file->move($destination,$new_name)){

			$organization = array(
				"company_name" => $company_name,
				"company_type" => $company_type,
				"company_city" => $company_city,
				"company_branch" => $company_branch,
				"company_phone" => $company_phone,
				"company_website" => $company_website,
				"company_employees" => $company_employees,
				"company_industry" => $company_industry,
				"company_since" => $company_since,
				"company_location" => $company_location,
				"company_email" => $company_email,
				"company_password" => $company_password,
				"company_cnic" => $company_cnic,
				"company_info" => $company_info,
				"company_document" => $new_name,
				"created_at" => $current_date,
				"updated_at" => $current_date
			);
			if(DB::table('Add_organizations')->insert($organization)){
				$rows=DB::table('company_types')->get();
				$city=DB::table('Add_cities')->get();
				$industry=DB::table('Company_industries')->get();
				return view('admin_views/organization_views/add_organization',['row'=>$rows,'city'=>$city,'industry'=>$industry]);
			}

		}
		


	}
}
