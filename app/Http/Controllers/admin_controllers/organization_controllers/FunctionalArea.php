<?php

namespace App\Http\Controllers\admin_controllers\organization_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class FunctionalArea extends Controller
{
    
     public function viewFunctionalAreaPage()
    {
        $all_area=DB::table('Add_functionalarea')->get();
     return view('admin_views/organization_views/view_functionalarea',['all_area'=>$all_area]);
    }
    public function addTableArea(Request $request){

       $area = $request->post('add_area');
       $current_date = date("Y.m.d h:i:s");
       $data = array(
        "area_title" => str_replace(" ","_",$area),
        "created_at" => $current_date,
        "updated_at" => $current_date
    );

       if(DB::table('Add_functionalarea')->insert($data)){
           $id=DB::getPdo()->lastInsertId();
           echo $id;

       }

   }
   public function deleteArea(Request $request){
    $area = $request->post('x');
    if(DB::table('Add_functionalarea')->where(['area_id' => $area])->delete()){
      echo "yes";
    }
  }

  public function deleteCheckArea(Request $request){
    $ids=count($_POST['check_all']);
      if(count($_POST['check_all'])>0){
      foreach ($_POST['check_all'] as $row) {
        echo $chk_all[]=$row;
        DB::table('Add_functionalarea')->where(['area_id' => $row])->delete();   
        
      }
       $request->session()->flash('success', $ids);
       return redirect('view-functional-area');
       $request->session()->flash('Access', true);
     }
  }
  public function updateModelArea(Request $request){
    $area_name=$request->post('name');
    $area_id=$request->post('id');
$data=DB::table('Add_functionalarea')->where(['area_id'=>$area_id])->first();
  echo '<div id="myModal6" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
  <form>
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">Update Functional Area ?</h4>
  </div>
  <div class="modal-body" id="modal-content">
  <label>Enter Updated Name:</label>
  <div class="input-group">
  <div class="input-group-addon">
  <i class="fa fa-yelp"></i>
  </div>
  <input type="hidden" value="'.$area_id.'" id="area_id">
  <input type="text" placeholder="Update industry name here" class="form-control" name="up_area" id="up_area" value="'.$data->area_title.'">
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-default" onclick="edit_area();">Update</button>
  </div>
  </div>
  </div>
  </form>

  </div>
  </div>';
  }
public function updateArea(Request $request){
  $current_date = date("Y.m.d h:i:s");
  $area=$request->post('area');
  $id=$request->post('id');
  $area_up=array(
    'area_title'=>$area,
    'updated_at'=>$current_date
  );
      if(DB::table('Add_functionalarea')->where(['area_id'=>$id])->update($area_up)){
         echo "yes";
      }
}

}
