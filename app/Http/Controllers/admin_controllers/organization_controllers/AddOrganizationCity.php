<?php

namespace App\Http\Controllers\admin_controllers\organization_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AddOrganizationCity extends Controller
{
	public function viewCitiesPage(){
	   $cities=DB::table('Add_cities')->get();
       return view('admin_views/organization_views/view_city',['cities'=>$cities]);
	}
    public function addCompanyCity(Request $request)
	{
      
      $company_city = $request->get('company_city');
      $current_date = date("Y.m.d h:i:s");
      $data = array(
      	"company_city_name" => str_replace(" ","_",$company_city),
        "created_at" => $current_date,
        "updated_at" => $current_date
      );
     
      if(DB::table('Add_cities')->insert($data)){
       //return "yes";
       $id=DB::getPdo()->lastInsertId();
       echo '<option id="type-option" value="'.$company_city.'">'.$company_city.'</option>';
       
      }
	}
}
