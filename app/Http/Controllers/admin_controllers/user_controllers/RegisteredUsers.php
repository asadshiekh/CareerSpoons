<?php

namespace App\Http\Controllers\admin_controllers\user_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RegisteredUsers extends Controller
{
    public function viewRegisteredUsers(){
        $all_users=DB::table('register_users')->get();
        return view('admin_views/user_views/registered_users',['all_users'=>$all_users]);
    }
    public function doChangeStatus(Request $request){
      $status= $request->post('x');
      $id= $request->post('id');
      $state_change=array(
       'user_activation_status' => $status
   );
      if(DB::table('register_users')->where(['id'=>$id])->update($state_change)){
       echo $status;
   }


}

    // delete Single user function
public function deleteSingleUser(Request $request){
 $id= $request->post('x');
 if(DB::table('register_users')->where(['id'=>$id])->delete()){
    echo $id;
}
}

    //view single user
public function viewSingleUser(Request $request){
 $id= $request->post('x');
 $user=DB::table('register_users')->where(['id'=>$id])->first();

 echo'<div id="mymodaluser" class="modal fade bs-example-modal-lg" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-lg">
 <div class="modal-content">

 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
 </button>
 <h4 class="modal-title text-center" id="myModalLabel">User Information</h4>
 </div>
 <div class="modal-body">
 <h2 class="page-title text-center model-head" id="myModalLabel">View ';
$str=explode(" ",$user->candidate_name);
echo $str[0];
  echo ' Information</h2>
 <div class="row">
 <ul class="list-unstyled" id="job-detail-des" style="padding-left:15%;padding-right:15%;">
 <li><span>Full Name:</span>'.$user->candidate_name.'</li>
 <li><span>Email:</span>'.$user->user_email.'</li>
 <li><span>Phone:</span>'.$user->phone_number.'</li>
 <li><span>Email Verified:</span>';
if($user->verify_by_email == "1"){
    echo "Verified";
}else{
    echo "Not Verified";
}
 echo '</li>
 <li><span>Username:</span>'.$user->username.'</li>
 <li><span>Password:</span>'.$user->password.'</li>
 <li><span>Current Number Status:</span>'.$user->current_number_status.'</li>
 <li><span>Current CV Status:</span>'.$user->current_cv_status.'</li>

<li><span>Registered Date:</span>';
// $str1=explode(" ",$user->created_at);
// echo $str1[0];
echo date('F d, Y',strtotime($user->created_at));

echo '</li>
</ul>

</div>


</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

</div>
</div>
</div>
</div>';
}
}
