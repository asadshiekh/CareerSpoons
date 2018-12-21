<?php

namespace App\Http\Controllers\admin_controllers\organization_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class QualificationCriteria extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewQualificationPage()
    {
        $all_qual=DB::table('Add_qualification')->get();
        return view('admin_views/organization_views/view_qualification',['all_qual'=>$all_qual]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addTableQualification(Request $request){

     $qual = $request->post('add_qual');
     $current_date = date("Y.m.d h:i:s");
     $data = array(
        "qualification_title" => str_replace(" ","_",$qual),
        "created_at" => $current_date,
        "updated_at" => $current_date
    );

     if(DB::table('Add_qualification')->insert($data)){
         $id=DB::getPdo()->lastInsertId();
         echo $id;

     }

 }
 public function deleteQual(Request $request){
    $qual_id = $request->post('x');
    if(DB::table('Add_qualification')->where(['qual_id' => $qual_id])->delete()){
      echo "yes";
  }
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteCheckQual(Request $request){
        $ids=count($_POST['check_all']);
        if(count($_POST['check_all'])>0){
          foreach ($_POST['check_all'] as $row) {
            echo $chk_all[]=$row;
            DB::table('Add_qualification')->where(['qual_id' => $row])->delete();   

        }
        $request->session()->flash('success', $ids);
        return redirect('view-qualification');
        $request->session()->flash('Access', true);
    }

}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateModelQual(Request $request)
    {
        $qual_name=$request->post('name');
        $qual_id=$request->post('id');
        $data=DB::table('Add_qualification')->where(['qual_id'=>$qual_id])->first();
        echo '<div id="myModal7" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <form>
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Qualification ?</h4>
        </div>
        <div class="modal-body" id="modal-content">
        <label>Enter Updated Name:</label>
        <div class="input-group">
        <div class="input-group-addon">
        <i class="fa fa-yelp"></i>
        </div>
        <input type="hidden" value="'.$qual_id.'" id="qual_id">
        <input type="text" placeholder="Update industry name here" class="form-control" name="up_qual" id="up_qual" value="'.$data->qualification_title.'">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default" onclick="edit_qual();">Update</button>
        </div>
        </div>
        </div>
        </form>

        </div>
        </div>';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateQual(Request $request)
    {
      $current_date = date("Y.m.d h:i:s");
      $qual=$request->post('qual');
      $id=$request->post('id');
      $qual_up=array(
        'qualification_title'=>$qual,
        'updated_at'=>$current_date
    );
      if(DB::table('Add_qualification')->where(['qual_id'=>$id])->update($qual_up)){
       echo "yes";
   }
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
