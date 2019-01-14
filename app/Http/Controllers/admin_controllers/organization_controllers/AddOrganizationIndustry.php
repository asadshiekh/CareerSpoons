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
  public function updateModelIndus(Request $request){
$indus_name=$request->post('name');
$indus_id=$request->post('id');
$data=DB::table('Company_industries')->where(['company_industry_id'=>$indus_id])->first();
  echo '<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
  <form>
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">Update City ?</h4>
  </div>
  <div class="modal-body" id="modal-content">
  <label>Enter Updated Name:</label>
  <div class="input-group">
  <div class="input-group-addon">
  <i class="fa fa-yelp"></i>
  </div>
  <input type="hidden" value="'.$indus_id.'" id="indus_id">
  <input type="text" placeholder="Update industry name here" class="form-control" name="up_company_indus" id="up_company_indus" value="'.$data->company_industry_name.'">
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-default" onclick="edit_industry();">Update</button>
  </div>
  </div>
  </div>
  </form>

  </div>
  </div>';
}
public function updateIndustry(Request $request){
  $current_date = date("Y.m.d h:i:s");
  $indus=$request->post('indus');
  echo $id=$request->post('id');
  $indus_up=array(
    'company_industry_name'=>$indus,
    'updated_at'=>$current_date
  );
      if(DB::table('Company_industries')->where(['company_industry_id'=>$id])->update($indus_up)){
         echo "yes";
      }
}

}
