<?php

namespace App\SiteModel\User;

use Illuminate\Database\Eloquent\Model;
use DB;
class UserProfileImages extends Model
{
  

  public function do_initialized_user_profile_image_table_with_default_values($user_response3){

  		$data = DB::table('user_profile_images')->insert($user_response3);
    	return $data; 		
    
   }


   public function get_user_profile_image($id){

   		$info=DB::table('user_profile_images')->where('candidate_id', $id)->first();
   		return $info;
   }


   public function update_user_profile_image($id,$user_response){

   		$data = DB::table('user_profile_images')->where('candidate_id', $id)->update($user_response);
		return $data; 
   }


   

}

