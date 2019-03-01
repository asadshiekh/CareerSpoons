<?php

namespace App\SiteModel\User;
use Illuminate\Database\Eloquent\Model;
use DB;

class SearchUserModel extends Model
{
    public function do_filter_search($city,$gender,$career,$qual){
    	if($city || $gender || $career || $qual){

	         $candidate= DB::table('register_users')->join('user_profile_images','register_users.id', '=', 'user_profile_images.candidate_id')->join('add_user_generals_info','register_users.id', '=', 'add_user_generals_info.id')->join('add_user_social_media_links','register_users.id', '=', 'add_user_social_media_links.candidate_id')->select('register_users.*','user_profile_images.*','add_user_generals_info.*','add_user_social_media_links.*');
            if($city){
                 $candidate->where('add_user_generals_info.candidate_city','Like',$city);
            }
            if($gender){
                 $candidate->where('add_user_generals_info.candidate_gender','like',$gender);
            }
            if($career){
                 $candidate->where('add_user_generals_info.candidate_career_level','like',$career);
            }

	         $candidates=$candidate->get();
	         if($candidates->count()>0){
	           return $candidates=$candidates;
	         }
	         else{
	            return $candidates=$candidates->count();
	         }

    	}else{
			$candidates= DB::table('register_users')->join('user_profile_images','register_users.id', '=', 'user_profile_images.candidate_id')->join('add_user_generals_info','register_users.id', '=', 'add_user_generals_info.id')->join('add_user_social_media_links','register_users.id', '=', 'add_user_social_media_links.candidate_id')->select('register_users.*','user_profile_images.*','add_user_generals_info.*','add_user_social_media_links.*')->simplePaginate(6);
	         if($candidates->count()>0){
	           return $candidates=$candidates;
	         }
	         else{
	           return  $candidates=$candidates->count();
	         }
    	}
    }
}
