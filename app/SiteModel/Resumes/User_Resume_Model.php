<?php

namespace App\SiteModel\Resumes;

use Illuminate\Database\Eloquent\Model;
use DB;
class User_Resume_Model extends Model
{
	public function uploaded_user_resume($user_response){

		$data = DB::table('user_upload_resumes')->insert($user_response);
		return $data; 		
	}

	public function add_eduction($user_response){

		$data = DB::table('add_user_eductions')->insert($user_response);
		return $data; 	
	}

	public function add_experience($user_response){

		$data = DB::table('add_user_experiences')->insert($user_response);
		return $data; 	
	}

	public function add_project($user_response){

		$data = DB::table('add_user_projects')->insert($user_response);
		return $data; 
	}

	public function add_skill($user_response){

		$data = DB::table('add_user_skills')->insert($user_response);
		return $data; 
	}

	public function add_language($user_response){

		$data = DB::table('add_user_languages')->insert($user_response);
		return $data; 
	}

	public function add_hobbies($user_response){

		$data = DB::table('add_user_hobbies')->insert($user_response);
		return $data; 
	} 

	public function add_user_general($user_response,$id){

		$data = DB::table('add_user_generals_info')->where('candidate_id', $id)->update($user_response);
		return $data; 
	}

	public function add_user_social_media($user_response_2){

		$data = DB::table('add_user_social_media_links')->insert($user_response_2);
		return $data; 
	}

	public function get_candidate_eduction($id){

		$response = DB::table('add_user_eductions')->where('candidate_id', $id)->orderBy('id','asc')->get();
		return $response;

	}

	public function get_candidate_experience($id){

		$response = DB::table('add_user_experiences')->where('candidate_id', $id)->get();
		return $response;
	}

	public function get_candidate_project($id){

		$response = DB::table('add_user_projects')->where('candidate_id', $id)->get();
		return $response;
	}

	public function get_candidate_skill($id){

		$response = DB::table('add_user_skills')->where('candidate_id', $id)->get();
		return $response;
	}

	public function get_candidate_languages($id){

		$response = DB::table('add_user_languages')->where('candidate_id', $id)->get();
		return $response;
	}

	public function get_candidate_hobbies($id){

		$response = DB::table('add_user_hobbies')->where('candidate_id', $id)->get();
		return $response;
	}

	public function delete_education($id,$candidate_id){

		$response = DB::table('add_user_eductions')->where([
			['id','=',[$id]],
			['candidate_id','=',[$candidate_id]],
		])->delete();
		return $response;
	}

	public function get_candidate_professional_title($candidate_id){

		$response = DB::table('add_user_generals_info')->where('candidate_id', $id)->first();
		return $response;
	}


	public function update_eduction($user_response,$edu_id,$candidate_id){


		$response = DB::table('add_user_eductions')->where([
			['id','=',[$edu_id]],
			['candidate_id','=',[$candidate_id]],
		])->update($user_response);

		return $response;
	}

	public function get_selected_eduction($id){


		$response = DB::table('add_user_eductions')->where('id', $id)->first();
		return $response;
	}


// Initialized Gerneral info Tabel

	public function initialized_general_info($user_response2){

		$data = DB::table('add_user_generals_info')->insert($user_response2);
		return $data;
	}


//  Profile Strength METER Query

	public function initialized_Profile_Strength($user_response2){

		$data = DB::table('user_profile_strength')->insert($user_response2);
		return $data;
	}

	public function check_profile_strength($candidate_id){

		$response = DB::table('user_profile_strength')->where('candidate_id', $candidate_id)->first();
		return $response;
	}

	public function update_profile_strength($user_response2,$candidate_id){

		DB::table('user_profile_strength')->where('candidate_id',$candidate_id)->update($user_response2);
	}



	public function update_candidate_resume_bio($user_response,$id){

		$data = DB::table('add_user_generals_info')->where('candidate_id', $id)->update($user_response);
		return $data; 

	}

	public function get_candidate_info($candidate_id){

		$response = DB::table('add_user_generals_info')->where('candidate_id', $candidate_id)->get();
		return $response;

	}

	public function get_candidate_general_info($candidate_id){


		$response = DB::table('add_user_generals_info')->where('candidate_id', $candidate_id)->first();
		return $response;
	}


	public function get_candidate_skill_just_six($candidate_id){

		$response = DB::table('add_user_skills')->where('candidate_id', $candidate_id)->orderBy('id','desc')->limit(4)->get();
		return $response;

	}


	public function get_candidate_social_link($candidate_id){

		$response = DB::table('add_user_social_media_links')->where('candidate_id', $candidate_id)->first();
		return $response;
	}


	public function update_social_links($candidate_id,$user_response){

		$data = DB::table('add_user_social_media_links')->where('candidate_id', $candidate_id)->update($user_response);
		return $data; 
	}



}
