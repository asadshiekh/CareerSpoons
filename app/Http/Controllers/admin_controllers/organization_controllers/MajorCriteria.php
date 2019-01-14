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
        $all_area=DB::table('Add_functionalarea')->get();
		return view('admin_views/organization_views/view_Majors',['all_majors'=>$all_majors,'all_area'=>$all_area]);
	}
	public function addTableMajor(Request $request){
		 $major = $request->post('add_major');
     $area = $request->post('area');
       $current_date = date("Y.m.d h:i:s");
        $data = array(
        "major_title" => str_replace(" ","_",$major),
        "area_title" => str_replace(" ","_",$area),
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
    $area=$request->post('area');
    $m_id=$request->post('id');
  $data=DB::table('Add_major')->where(['major_id'=>$m_id])->first();
   $all_area=DB::table('Add_functionalarea')->get();
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
  <div class="form-group">
        <label>Select functional area:</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-building-o"></i>
          </div>
          <select name="u_functional_area" class="form-control" placeholder="Select Functional Area" id="u_functional_area">
            <option value="'.$data->area_title.'" disabled="disabled" selected="selected">'.$data->area_title.'</option>';
            foreach($all_area as $all_area):
            echo '<option value="'.$all_area->area_title.'">'.$all_area->area_title.'</option>';
            endforeach;

         echo '</select>
        </div>
      </div>
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
  $area=$request->post('u_area');
  $id=$request->post('id');
  $major_up=array(
    'major_title'=>$major,
    'area_title'=>$area,
    'updated_at'=>$current_date
  );
      if(DB::table('Add_major')->where(['major_id'=>$id])->update($major_up)){
         echo "yes";
      }
  }
}
