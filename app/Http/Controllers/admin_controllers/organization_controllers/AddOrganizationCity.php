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

    $company_city = $request->post('company_city');
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
 public function addTableCompanyCity(Request $request){
   $company_city = $request->post('company_city');
   $current_date = date("Y.m.d h:i:s");
   $data = array(
    "company_city_name" => str_replace(" ","_",$company_city),
    "created_at" => $current_date,
    "updated_at" => $current_date
  );

   if(DB::table('Add_cities')->insert($data)){
     $id=DB::getPdo()->lastInsertId();
     echo $id;

   }
 }

 public function deleteCity(Request $request){
  $city_id = $request->post('x');
  if(DB::table('Add_cities')->where(['company_city_id' => $city_id])->delete()){
    echo "yes";
  }
}
public function deleteCheckCities(Request $request){
 $ids=count($_POST['check_all']);
 if(count($_POST['check_all'])>0)
  foreach ($_POST['check_all'] as $row) {
        // echo $chk_all[]=$row;
    DB::table('Add_cities')->where(['company_city_id' => $row])->delete();   

  }
      // $cities=DB::table('Add_cities')->get();
  $request->session()->flash('success', $ids);
  return redirect('view-cities');
  $request->session()->flash('Access', true);


}
public function updateModelWindow(Request $request){
$city_name=$request->post('name');
$city_id=$request->post('id');
$data=DB::table('Add_cities')->where(['company_city_id'=>$city_id])->first();
  echo '<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
  <form>
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">Update City ?</h4>
  </div>
  <div class="modal-body" id="modal-content">
  <label style="display: inline;">Enter Updated Name:</label><p id="up-name-error" style="display: inline;"></p>
  <div class="input-group">
  <div class="input-group-addon">
  <i class="fa fa-yelp"></i>
  </div>
  <input type="hidden" value="'.$city_id.'" id="city_id">
  <input type="text" placeholder="Update city name here" class="form-control" name="up_company_city" id="up_company_city" value="'.$data->company_city_name.'">
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-default" onclick="city_updating_validate();">Update</button>
  </div>
  </div>
  </div>
  </form>

  </div>
  </div>';
}
public function updateCity(Request $request){
  $current_date = date("Y.m.d h:i:s");
  $city=$request->post('city');
  echo $id=$request->post('id');
  $city_up=array(
    'company_city_name'=>$city,
    'updated_at'=>$current_date
  );
      if(DB::table('Add_cities')->where(['company_city_id'=>$id])->update($city_up)){
         echo "yes";
      }
}

public function doCheckCityExists(Request $request){
 $name= $request->name;
        $count_email=DB::table('Add_cities')->where(['company_city_name'=>$name])->get()->count();
        echo $count_email;
}


}
