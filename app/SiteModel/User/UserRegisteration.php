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
}
