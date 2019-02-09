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

		$info=DB::select(DB::raw("SELECT * FROM candidate_reviews,register_users,user_profile_images WHERE 
			candidate_reviews.candidate_id=register_users.id && candidate_reviews.candidate_id=user_profile_images.candidate_id && candidate_reviews.rating_points>=3 ORDER BY RAND()  LIMIT 5"));
		return $info;
	}


	// Select * FROM product,product_ids,product_colors WHERE product.Product_id=product_ids.Product_id &&  product.Product_id=product_colors.Product_id && product.Product_id='$id' GROUP BY product.Product_id


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



