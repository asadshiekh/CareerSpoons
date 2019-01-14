<?php

namespace App\Http\Controllers\admin_controllers\organization_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DegreeLevel extends Controller
{
	public function viewDegreeLevelPage()
	{
		$all_degree=DB::table('Add_degreelevel')->get();
		return view('admin_views/organization_views/view_degreelevel',['all_degree'=>$all_degree]);
	}
	public function addTabledegree(Request $request){
		$degree = $request->post('add_degree');
       $current_date = date("Y.m.d h:i:s");
       $data = array(
        "degree_title" => str_replace(" ","_",$degree),
        "created_at" => $current_date,
        "updated_at" => $current_date
    );

       if(DB::table('Add_degreelevel')->insert($data)){
           $id=DB::getPdo()->lastInsertId();
           echo $id;

       }
	}

  public function deleteDegree(Request $request){
    $deg_id = $request->post('x');
    if(DB::table('Add_degreelevel')->where(['degree_id' => $deg_id])->delete()){
      echo "yes";
    }
  }

  public function deleteCheckDegrees(Request $request){
    $ids=count($_POST['check_all']);
      if(count($_POST['check_all'])>0){
      foreach ($_POST['check_all'] as $row) {
        echo $chk_all[]=$row;
        DB::table('Add_degreelevel')->where(['degree_id' => $row])->delete();   
        
      }
       $request->session()->flash('success', $ids);
       return redirect('view-degree-level');
       $request->session()->flash('Access', true);
     }
  }

  public function updateModelDegree(Request $request){
    $degree_name=$request->post('name');
$deg_id=$request->post('id');
 $data=DB::table('Add_degreelevel')->where(['degree_id'=>$deg_id])->first();

  echo '<div id="myModal4" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
  <form>
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">Update Degree ?</h4>
  </div>
  <div class="modal-body" id="modal-content">
  <label>Enter Updated Name:</label>
  <div class="input-group">
  <div class="input-group-addon">
  <i class="fa fa-yelp"></i>
  </div>
  <input type="hidden" value="'.$deg_id.'" id="deg_id">
  <input type="text" placeholder="Update industry name here" class="form-control" name="up_degree" id="up_degree" value="'.$data->degree_title.'">
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-default" onclick="edit_degree();">Update</button>
  </div>
  </div>
  </div>
  </form>

  </div>
  </div>';
  }

  public function updateDegree(Request $request){
    $current_date = date("Y.m.d h:i:s");
  $degree=$request->post('degree');
  $id=$request->post('id');
  $degree_up=array(
    'degree_title'=>$degree,
    'updated_at'=>$current_date
  );
      if(DB::table('Add_degreelevel')->where(['degree_id'=>$id])->update($degree_up)){
         echo "yes";
      }
  }
}
