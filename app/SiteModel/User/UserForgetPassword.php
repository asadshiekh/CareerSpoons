<?php

namespace App\SiteModel\User;

use Illuminate\Database\Eloquent\Model;
use DB;
class UserForgetPassword extends Model
{
	public function do_verify_candidate_email($candidate_email){

		$info=DB::table('register_users')->select('*')->where('user_email', $candidate_email)->first();
		return $info;

	}

	public function do_register_forget_password($userdata){

		$data = DB::table('user_forget_password')->insert($userdata);
		return $data; 

	}


	public function get_all_details_of_forget_password($candidate_email,$lastInsertId){

		$info=DB::table('user_forget_password')->select('*')->where(['candidate_email'=> $candidate_email,'id'=>$lastInsertId])->first();
		return $info;
	}


	public function update_verification_link($candidate_email,$create_password,$lastInsertId){
		
		$update_link=array(
			'verfication_link'=>1
		);

		$info=DB::table('user_forget_password')->where(['candidate_email'=> $candidate_email,'id'=>$lastInsertId])->update($update_link);


			$update_password=array(
			'password'=>$create_password
		);

		$info1=DB::table('register_users')->where('user_email', $candidate_email)->update($update_password);

		return $info1;

	}
}
