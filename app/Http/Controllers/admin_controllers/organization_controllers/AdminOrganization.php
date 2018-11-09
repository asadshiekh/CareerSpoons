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
		// echo $v=count($types);
		// $view=array('recods' => $v );
		// $request->session()->put($view);
		return view('admin_views/organization_views/view_organization_type',['types'=>$types]);
	}
	public function addCompanyType(Request $request)
	{

		$company_type = $request->post('company_type');
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

	public function deleteCompanyType(Request $request){
	    $type_id = $request->post('x');
	    if(DB::table('company_types')->where(['company_type_id' => $type_id])->delete()){
	      echo "yes";
	    }
    }

  public function addTableCompanyType(Request $request){
    $company_type = $request->post('company_type');
      $current_date = date("Y.m.d h:i:s");
      $data = array(
        "company_type_name" => str_replace(" ","_",$company_type),
        "created_at" => $current_date,
        "updated_at" => $current_date
      );

      if(DB::table('company_types')->insert($data)){
       $id=DB::getPdo()->lastInsertId();
       echo $id;
       
      }
  }


public function deleteCheckCompanyType(Request $request){

    $ids=count($_POST['check_all']);

      if(count($_POST['check_all'])>0){
      foreach ($_POST['check_all'] as $row) {
        echo $chk_all[]=$row;
        DB::table('company_types')->where(['company_type_id' => $row])->delete();   
        
      }
       $request->session()->flash('success', $ids);
       return redirect('company-type');

       $request->session()->flash('Access', true);
   }
}







	public function addCompanyForm(Request $request)
	{
     
		$company_name = $request->post('company_name');
		$company_type = $request->post('selected_company_type');
		$company_city = $request->post('selected_city');
		$company_branch = $request->post('company_branch_name');
		$company_phone = $request->post('company_phone');
		$company_website = $request->post('company_website');
		$company_employees = $request->post('selected_employees');
		$company_industry = $request->post('selected_industry');
		$company_since = $request->post('company_since');
		$company_location = $request->post('company_location');
		$company_email = $request->post('company_email');
		$company_password = $request->post('company_password');
		$company_cnic = $request->post('company_cnic');
		$company_info = $request->post('company_info');
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
			DB::table('add_organizations')->insert($organization);
			echo $id=DB::getPdo()->lastInsertId();
		}
		


	}
	public function deleteOrganization(Request $request){
		echo "yes";
        // echo $org_id = $request->post('y');
	    // if(DB::table('Add_organizations')->where(['company_id' => $org_id])->delete()){
	    //   echo "yes";
	    // }
	}
	public function doCompanyPost(Request $request)
	{
    print_r($_POST);
	}


}
