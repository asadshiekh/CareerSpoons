<?php

namespace App\Http\Controllers\admin_controllers\admin_profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdminProfile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function viewAdminProfile(Request $request)
    {

        $username=$request->session()->get('admin_username');
        $email=$request->session()->get('admin_email');
        $phone=$request->session()->get('admin_phone');
        $id=$request->session()->get('account_id');

        $ad_info=DB::table('Admin_account')->where(['admin_username'=>$username])->first();
        if($ad_info->account_right == "superadmin"){
        $em_info=DB::table('Admin_account')->where('account_right','!=', 'superadmin')->get();
          }
        elseif($ad_info->account_right == "admin"){
        $em_info=DB::table('Admin_account')->where('account_right','!=', 'admin')->where('account_right','!=', 'admin')->get();
        }else{
        $em_info=DB::table('Admin_account')->where(['account_right' => 'analytics','account_right' => 'editor'])->get();
        }
        $ad_img=DB::table('Admin_img')->where('admin_id','=', $id)->first();
        
        return view('admin_views/admin_profile/admin_pro',['ad_info'=>$ad_info,'em_info'=>$em_info,'ad_img'=>$ad_img]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doAdminUpdate(Request $request)
    {

        $current_date=date("Y.m.d h:i:s");
        $id=$request->post('id');
        $new_info=array(
        'admin_fullname'=>$request->post('new_admin_name'),
        'admin_phone'=>$request->post('new_admin_phone'),
        'admin_address'=>$request->post('new_admin_address'),
        'admin_email'=>$request->post('new_admin_email'),
        'updated_at'=>$current_date
        );
        // print_r($new_info);
        if(DB::table('Admin_account')->where(['account_id'=>$id])->update($new_info)){

         // $request->session()->forget('admin_name');
         // $request->session()->put('admin_name',$request->post('new_admin_name'));
       return redirect('admin-profile')->with('success','Your Info is Successfully Updated!');
       //return redirect('admin-profile');
       
   }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addNewEmployee(Request $request)
    {
        $current_date=date("Y.m.d h:i:s");
        $employee=array(
        'admin_fullname'=>$request->post('employee_name'),
        'admin_phone'=>$request->post('employee_phone'),
        'admin_address'=>$request->post('employee_address'),
        'admin_email'=>$request->post('employee_email'),
        'account_right'=>$request->post('employee_right'),
        'admin_username'=>$request->post('employee_user'),
        'admin_pass'=>$request->post('employee_pass'),
        'account_activation'=>"Active",
        'created_at'=>$current_date,
        'updated_at'=>$current_date
    );
       // print_r($employee);
  
        
    if(DB::table('Admin_account')->insert($employee)){
        $id=DB::getPdo()->lastInsertId();
        $admin_image= array(
            'admin_img' => "user.png", 
            'admin_id' => $id
          );
        DB::table('Admin_img')->insert($admin_image);
        $request->session()->flash('employee');
        return redirect('admin-profile');
        $request->session()->flash('Access', true);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEmployee(Request $request)
    {
        $id=$request->post('id');
        if(DB::table('Admin_account')->where(['account_id'=>$id])->delete()){
        echo "yes";
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blockEmployeeAcc(Request $request)
    {
        $value=$request->post('x');
        $id=$request->post('y');
        $Activation=array(
         'account_activation'=>$value
        );
        if(DB::table('Admin_account')->where(['account_id'=>$id])->update($Activation)){
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
    public function showData(Request $request)
    {
        return view('admin_views/admin_profile/data_table');
        // $info = DB::table('Admin_account')->where('account_right','!=', 'superadmin')->get();
        // echo '<table id="employee" class="table table-striped table-bordered bulk_action">
        //           <thead>
        //             <tr>
        //              <th><input type="checkbox" id="select-all" class="flat"> Select All </th>  
        //              <th>Employee Name</th>
        //              <th>Employee Phone No</th>
        //              <th>Employee Email</th>     
        //              <th>Account</th>            
        //              <th>Action</th>
        //            </tr>
        //          </thead>
        //          <tbody>
        //           <!-- <tr id="employee-tr"></tr> -->';
               
        //           foreach($info as $em_info):
        //           echo '<tr id="employee-tr'.$em_info->account_id.'" class="employee-tr"> 
        //            <th><input type="checkbox" name="check_all_org[]" class="flat" value="'.$em_info->account_id.'"></th> 
        //            <td id="'.$em_info->account_id.'">'.$em_info->admin_fullname.'</td>
        //            <td id="'.$em_info->account_id.'">'.$em_info->admin_phone.'</td>
        //            <td id="'.$em_info->account_id.'">'.$em_info->admin_email.'</td>
        //            <td>';
        //           if($em_info->account_activation == "true"){
        //             echo '<input type="checkbox" id="toggle-account" data-toggle="toggle" data-on="Active" data-off="Block" data-size="normal" data-width="null" checked data-offstyle="danger" value="'.$em_info->account_id.'">';
                    
        //            }else if($em_info->account_activation == "false"){ 
        //             echo '
        //             <input type="checkbox" id="toggle-account-b" data-toggle="toggle" data-on="Active" data-off="Block" data-size="normal" data-width="null"  data-offstyle="danger" value="'.$em_info->account_id.'">';
        //            }
        //           echo '</td><td><a><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Update Organization" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-pencil"></i></span></a> | <a onclick="delete_employee('.$em_info->account_id.');"><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="Delete Employee Account" data-pt-animate="flipInX" data-pt-size="small"><i class="fa fa-trash"></i></span></a> | <a href=""><span class="protip" data-pt-scheme="blue" data-pt-gravity="top 0 -5; bottom 0 5" data-pt-title="View Employee Details" data-pt-animate="flipInX" data-pt-size="small"><i class="glyphicon glyphicon-eye-open"></i></span></a></a></td>
        //           </tr>';
        //       endforeach;
        //         echo '</tbody>
        //         <tfoot>
        //           <!-- <tr id="employee-tr"></tr> -->
                  
        //         </tfoot>

        //       </table>';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminEmailUpdate(Request $request)
    {
         $existing_pass=$request->post('x');
        $new_email=$request->post('y');

        $id= $request->post('id');
       $info= DB::table('Admin_account')->where('account_id','=',$id)->select("admin_pass")->first();
       $pass=$info->admin_pass;

        if($existing_pass == $pass){
        $for_up=array(
          "admin_username"=>$new_email
        );

        if(DB::table('Admin_account')->where('account_id','=',$id)->update($for_up)){
            $data="successfully updated";
            $request->session()->forget('admin_username');
            $request->session()->put('admin_username',$new_email);

        return $data;
        }

       }else{
        $error="**invalid password";

        return $error;
    }
    }
   public function adminPasswordUpdate(Request $request){

       $existing_pass=$request->post('x');
        $new_pass=$request->post('y');

        $id= $request->post('id');
       $info= DB::table('Admin_account')->where('account_id','=',$id)->select("admin_pass")->first();
       $pass=$info->admin_pass;

        if($existing_pass == $pass){
        $for_up=array(
          "admin_pass" =>$new_pass
        );
        if(DB::table('Admin_account')->where('account_id','=',$id)->update($for_up)){
            $data="successfully updated";

        return $data;
        }

       }else{
        $error="**invalid password";

        return $error;
       }
   }


   function viewSingleProfile(Request $request){
    $id=$request->post('id');
    $info= DB::table('Admin_account')->where('account_id','=',$id)->first();
    echo '<!-- Modal window for add City-->
<div id="myModalemployee" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form>
      @csrf

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">view Employee Detail</h4>
          
        </div>
        <div class="modal-body" id="modal-content">
         
          <ul class="list-unstyled" id="job-detail-des">
                    <li><span>Full Name:</span>'.$info->admin_fullname.'</li>
                    <li><span>Phone:</span>'.$info->admin_phone.'</li>
                    <li><span>Address:</span>'.$info->admin_address.'</li>
                    <li><span>Email:</span>'.$info->admin_email.'</li>
                    <li><span>Right:</span>'.$info->account_right.'</li>
                    <li><span>Username:</span>'.$info->admin_username.'</li>
                    <li><span>Password:</span>'.$info->admin_pass.'</li>
                    <li><span>Account Activation Status:</span>';
                    if($info->account_activation == "Active"){
                        echo "Active";
                    }else{
                        echo "Block";
                    }
                    echo'</li>
                    <li><span>Registered Date:</span>'.$info->created_at.'</li>
                  </ul>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </form>

  </div>
</div>
<!--/End model window-->';

   }
   function editSingleProfile(Request $request){
    $id=$request->post('id');
    $info= DB::table('Admin_account')->where('account_id','=',$id)->first();
    echo '<!-- Modal window for add City-->
<div id="myModalpencil" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form>
      @csrf

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Employee Detail</h4>
          
        </div>
        <div class="modal-body" id="modal-content">
         <form>
         <div style="padding: 3%;padding-left: 20%;padding-right: 20%;">
                    <label>Full Name:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-male"></i>
                      </div>
                      <input type="text" class="form-control" name="new_employee_name" id="new_employee_name" placeholder="Enter Full Name" value="'.$info->admin_fullname.'">
                    </div>
                    <label style="margin-top:1%;">Phone Number:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="number" class="form-control" name="new_employee_phone" id="new_employee_phone" placeholder="Enter Phone No" value="'.$info->admin_phone.'">
                    </div>
                    <label style="margin-top:1%;">Address:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-map-marker"></i>
                      </div>
                      <input type="text" class="form-control" name="new_employee_address" id="new_employee_address" placeholder="Enter Address" value="'.$info->admin_address.'">
                    </div>
                    <label style="margin-top:1%;">Email:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                      </div>
                      <input type="text" class="form-control" name="new_employee_email" id="new_employee_email" placeholder="Enter Email" value="'.$info->admin_email.'">
                    </div>
                    <label style="margin-top:1%;">Select Right:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-external-link"></i>
                      </div>
                      <select class="form-control" name="new_employee_right" id="new_employee_right">
                      <option value="'.$info->account_right.'" selected="selected">'.$info->account_right.'</option>
                        <option class="form-control" value="admin">Admin</option>
                        <option class="form-control" value="editor">Editor</option>
                        <option class="form-control" value="analytics">Analytics</option>
                      </select>
                    </div>
                    <label style="margin-top:1%;">Account Detail:</label>
                    <div class="input-group" style="margin-bottom:10%;">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input type="text" class="form-control" name="new_employee_user" placeholder="Enter User Name" id="new_employee_user" style="width: 50%;" value="'.$info->admin_username.'">
                      <input type="text" class="form-control" name="new_employee_pass" placeholder="Enter Password" id="new_employee_pass" style="width: 50%;" value="'.$info->admin_pass.'">
                      <div class="input-group-addon">
                        <i class="fa fa-lock"></i>
                      </div>
                    </div>
                    

                  </div>
         </form>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-dark ml-auto" onclick="edit_employee_detail('.$info->account_id.');">Edit Employee</button>
          </div>
        </div>

      </div>
    </form>

  </div>
</div>
<!--/End model window-->';

   }
function editDetailProfile(Request $request){
        $current_date=date("Y.m.d h:i:s");
        $id=$request->post('id');
        $up_employee=array(
        'admin_fullname'=>$request->post('a'),
        'admin_phone'=>$request->post('b'),
        'admin_address'=>$request->post('c'),
        'admin_email'=>$request->post('d'),
        'account_right'=>$request->post('e'),
        'admin_username'=>$request->post('f'),
        'admin_pass'=>$request->post('g'),
        'updated_at'=>$current_date
    );
       // print_r($employee);
    if(DB::table('Admin_account')->where(['account_id'=>$id])->update($up_employee)){
        echo $id;
    }
}

//cropper function
public function doImgCrop(Request $request){
        $data = $request->image;
        $id=$request->session()->get('account_id');
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        
        $data = base64_decode($data);
        $imageName = time().'.png';
        $destinationPath = 'uploads/admin_img/';
        $image = file_put_contents($destinationPath.$imageName,$data);
         $admin_image= array(
            'admin_img' => $imageName
          );
         $data = DB::table('admin_img')->where(['admin_id'=>$id])->update($admin_image);
        

        echo $imageName;
    }
 public function changeStatus(Request $request){
  $id=$request->post('id');
   $status=$request->post('x');
    $change_status=array(
    'account_activation'=>$status
    );
    if(DB::table('Admin_account')->where('account_id','=',$id)->update($change_status)){
    echo $id;
  }
 }





}
