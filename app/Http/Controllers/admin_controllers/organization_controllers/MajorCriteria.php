<?php

namespace App\Http\Controllers\admin_controllers\organization_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MajorCriteria extends Controller
{
	public function viewMajorPage()
	{
        $all_majors=DB::table('Add_major')->get();
		return view('admin_views/organization_views/view_Majors',['all_majors'=>$all_majors]);
	}
	public function addTableMajor(Request $request){
		 $major = $request->post('add_major');
       $current_date = date("Y.m.d h:i:s");
        $data = array(
        "major_title" => str_replace(" ","_",$major),
        "created_at" => $current_date,
        "updated_at" => $current_date
    );

       if(DB::table('Add_major')->insert($data)){
           $id=DB::getPdo()->lastInsertId();
           echo $id;

       }

	}
  public function deleteMajor(Request $request){
    $major_id = $request->post('x');
    if(DB::table('Add_major')->where(['major_id' => $major_id])->delete()){
      echo "yes";
    }
  }

  public function deleteCheckMajor(Request $request){
    $ids=count($_POST['check_all']);
      if(count($_POST['check_all'])>0){
      foreach ($_POST['check_all'] as $row) {
        echo $chk_all[]=$row;
        DB::table('Add_major')->where(['major_id' => $row])->delete();   
        
      }
       $request->session()->flash('success', $ids);
       return redirect('view-majors');
       $request->session()->flash('Access', true);
     }
  }

  public function updateModelMajor(Request $request){
    $major_name=$request->post('name');
    $m_id=$request->post('id');
  $data=DB::table('Add_major')->where(['major_id'=>$m_id])->first();
  echo '<div id="myModal5" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
  <form>
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">Update Major ?</h4>
  </div>
  <div class="modal-body" id="modal-content">
  <label>Enter Updated Name:</label>
  <div class="input-group">
  <div class="input-group-addon">
  <i class="fa fa-yelp"></i>
  </div>
  <input type="hidden" value="'.$m_id.'" id="major_id">
  <input type="text" placeholder="Update industry name here" class="form-control" name="up_m_name" id="up_m_name" value="'.$data->major_title.'">
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-default" onclick="edit_major();">Update</button>
  </div>
  </div>
  </div>
  </form>

  </div>
  </div>';
  }

  public function updateMajor(Request $request){
  $current_date = date("Y.m.d h:i:s");
  $major=$request->post('major');
  $id=$request->post('id');
  $major_up=array(
    'major_title'=>$major,
    'updated_at'=>$current_date
  );
      if(DB::table('Add_major')->where(['major_id'=>$id])->update($major_up)){
         echo "yes";
      }
  }
}
