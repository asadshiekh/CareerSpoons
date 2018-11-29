<?php

namespace App\SiteModel\User;

use Illuminate\Database\Eloquent\Model;
use DB;
class UserRegisteration extends Model
{
 	public function do_register_user($user_response){

		$data = DB::table('register_users')->insert($user_response);
    	return $data; 		
 	}

 	public function update_user_resumeStatus($id){

 		 $info = DB::table('register_users')->where('id', $id)->update(['current_cv_status' => '1']);
         return $info;
 	}   

 	public function update_candidate_name($candidate_name,$id){

 		 $info = DB::table('register_users')->where('id', $id)->update(['candidate_name' => $candidate_name]);
         return $info;
 	}   
}
