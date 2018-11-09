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
      $company_industry = $request->post('company_industry');
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
  public function deleteIndustry(Request $request){
    $indus_id = $request->post('x');
    if(DB::table('Company_industries')->where(['company_industry_id' => $indus_id])->delete()){
      echo "yes";
    }
  }

  public function deleteCheckIndustries(Request $request){
    $ids=count($_POST['check_all']);
      if(count($_POST['check_all'])>0){
      foreach ($_POST['check_all'] as $row) {
        echo $chk_all[]=$row;
        DB::table('Company_industries')->where(['company_industry_id' => $row])->delete();   
        
      }
       $request->session()->flash('success', $ids);
       return redirect('view-industries');
       $request->session()->flash('Access', true);
     }

  }
  public function addTableCompanyIndustry(Request $request){
    $company_indus = $request->post('company_indus');
      $current_date = date("Y.m.d h:i:s");
      $data = array(
        "company_industry_name" => str_replace(" ","_",$company_indus),
        "created_at" => $current_date,
        "updated_at" => $current_date
      );

      if(DB::table('Company_industries')->insert($data)){
       $id=DB::getPdo()->lastInsertId();
       echo $id;
       
      }
  }

}
