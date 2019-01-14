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
}
