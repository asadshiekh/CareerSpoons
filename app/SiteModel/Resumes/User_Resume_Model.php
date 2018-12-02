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

	public function add_user_general($user_response){

		$data = DB::table('add_user_generals_info')->insert($user_response);
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

}
