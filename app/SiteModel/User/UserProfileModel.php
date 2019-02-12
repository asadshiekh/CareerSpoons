<?php

namespace App\SiteModel\User;

use Illuminate\Database\Eloquent\Model;
use DB;
class UserProfileModel extends Model
{

	public function do_initialized_review($user_response){

		$data = DB::table('candidate_reviews')->insert($user_response);
		return $data;     
	}

	public function update_reviews($candidate_id,$user_response){

		$data = DB::table('candidate_reviews')->where('candidate_id',$candidate_id)->update($user_response);
		return $data; 
		
	}

	public function get_user_review_data($candidate_id){

		$info=DB::table('candidate_reviews')->where('candidate_id', $candidate_id)->first();
		return $info;
	}


	public function get_all_candidate_reviews(){

		
		$info=DB::table('candidate_reviews')->join('register_users','candidate_reviews.candidate_id', '=', 'register_users.id')->join('user_profile_images','register_users.id', '=', 'user_profile_images.candidate_id')->select('candidate_reviews.*', 'register_users.*','user_profile_images.*')->where([
			['candidate_reviews.rating_points','>=','3'],
			['candidate_reviews.review_status','=','1']
			])->inRandomOrder()->limit(10)->get();

		 if($info->count()>0){
            return $info;
        }
        else{
            return $info->count();
        }
	
	}
    public function get_all_org_reviews(){


		$info=DB::table('organization_reviews')->join('add_organizations','organization_reviews.organization_id','=','add_organizations.company_id')->join('upload_org_img','add_organizations.company_id', '=', 'upload_org_img.org_img_id')->select('organization_reviews.*', 'add_organizations.*','upload_org_img.*')->where([
			['organization_reviews.rating_points','>=','3'],
			['organization_reviews.review_status','=','1']
			])->inRandomOrder()->limit(10)->get();

        if($info->count()>0){
            return $info;
        }
        else{
            return $info->count();
        }

        

    }



	public function update_phone_status($candidate_id,$user_response){

		
		$data = DB::table('register_users')->where('id',$candidate_id)->update($user_response);
		return $data; 
	}


	public function get_details_of_user($candidate_id){

		$data = DB::table('register_users')->where('id',$candidate_id)->first();
		return $data; 

	}
	

	public function update_candidate_password($candidate_id,$user_response){

		$data = DB::table('register_users')->where('id',$candidate_id)->update($user_response);
		return $data;
	}


	public function update_candidate_activition_status($candidate_id,$user_response){

		$data = DB::table('register_users')->where('id',$candidate_id)->update($user_response);
		return $data;
	}

	public function get_user_details_by_email($email){

		$data = DB::table('register_users')->where('user_email',$email)->first();
		return $data; 
	}

	public function check_user_password($candidate_id,$candidate_email,$candidate_password){


		$info=DB::table('register_users')->select('*')->where([
			['user_email','=',[$candidate_email]],
			['password','=',[$candidate_password]],
			['id','=',[$candidate_id]],
		])->first();
		return $info;
	}


	public function update_candidate_details($candidate_id,$user_response){

		$data = DB::table('register_users')->where('id',$candidate_id)->update($user_response);
		return $data;
		
	}


}



