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


	public function delete_experience($id,$candidate_id){

		$response = DB::table('add_user_experiences')->where([
			['id','=',[$id]],
			['candidate_id','=',[$candidate_id]],
		])->delete();
		return $response;
	}


	public function get_selected_experience($id){

		$response = DB::table('add_user_experiences')->where('id', $id)->first();
		return $response;
	}


	public function update_experience($user_response,$experience_id_number,$candidate_id){

		$response = DB::table('add_user_experiences')->where([
			['id','=',[$experience_id_number]],
			['candidate_id','=',[$candidate_id]],
		])->update($user_response);

		return $response;
	}

	public function delete_project($id,$candidate_id){

		$response = DB::table('add_user_projects')->where([
			['id','=',[$id]],
			['candidate_id','=',[$candidate_id]],
		])->delete();
		return $response;
	}

	public function get_selected_project($id){

		$response = DB::table('add_user_projects')->where('id', $id)->first();
		return $response;

	}


	public function update_project($user_response,$project_id_number,$candidate_id){

		$response = DB::table('add_user_projects')->where([
			['id','=',[$project_id_number]],
			['candidate_id','=',[$candidate_id]],
		])->update($user_response);

		return $response;
	}


	public function delete_skill($id,$candidate_id){

		$response = DB::table('add_user_skills')->where([
			['id','=',[$id]],
			['candidate_id','=',[$candidate_id]],
		])->delete();
		return $response;
	}


	public function get_selected_skill($id){

		$response = DB::table('add_user_skills')->where('id', $id)->first();
		return $response;
	}

	public function update_skill($user_response,$skill_id_number,$candidate_id){

		
		$response = DB::table('add_user_skills')->where([
			['id','=',[$skill_id_number]],
			['candidate_id','=',[$candidate_id]],
		])->update($user_response);

		return $response;
	}


	public function delete_hobbey($id,$candidate_id){

		$response = DB::table('add_user_hobbies')->where([
			['id','=',[$id]],
			['candidate_id','=',[$candidate_id]],
		])->delete();
		return $response;
	}


	public function get_selected_hobbey($id){

		$response = DB::table('add_user_hobbies')->where('id', $id)->first();
		return $response;
	}

	public function update_skills($user_response,$hobbey_id_number,$candidate_id){

		$response = DB::table('add_user_hobbies')->where([
			['id','=',[$hobbey_id_number]],
			['candidate_id','=',[$candidate_id]],
		])->update($user_response);

		return $response;

	}

	public function delete_languages($id,$candidate_id){

		$response = DB::table('add_user_languages')->where([
			['id','=',[$id]],
			['candidate_id','=',[$candidate_id]],
		])->delete();
		return $response;

	}


	public function get_selected_language($id){

		$response = DB::table('add_user_languages')->where('id', $id)->first();
		return $response;
	}


	public function update_language($user_response,$language_id_number,$candidate_id){

		
		$response = DB::table('add_user_languages')->where([
			['id','=',[$language_id_number]],
			['candidate_id','=',[$candidate_id]],
		])->update($user_response);

		return $response;
	}
	
	public function fetch_candidate_eduction_resume_details($candidate_id){

		$candidate_eductions=DB::table('add_user_eductions')->where(['candidate_id'=>$candidate_id])->orderBy('id','asc')->get();

		if($candidate_eductions->count()>0){
			return $candidate_eductions;
		}
		else{
			return $candidate_eductions->count();
		}
	}

	public function fetch_candidate_experience_resume_details($candidate_id){

		$candidate_experience=DB::table('add_user_experiences')->where(['candidate_id'=>$candidate_id])->get();

		if($candidate_experience->count()>0){
			return $candidate_experience;
		}
		else{
			return $candidate_experience->count();
		}		
	}


	public function fetch_candidate_project_resume_details($candidate_id){

		$candidate_project=DB::table('add_user_projects')->where(['candidate_id'=>$candidate_id])->get();

		if($candidate_project->count()>0){
			return $candidate_project;
		}
		else{
			return $candidate_project->count();
		}			
	}

	public function fetch_candidate_skill_resume_details($candidate_id){


		$candidate_skill=DB::table('add_user_skills')->where(['candidate_id'=>$candidate_id])->get();

		if($candidate_skill->count()>0){
			return $candidate_skill;
		}
		else{
			return $candidate_skill->count();
		}	
	}


	public function fetch_candidate_hobby_resume_details($candidate_id){

		$candidate_hobby=DB::table('add_user_hobbies')->where(['candidate_id'=>$candidate_id])->get();

		if($candidate_hobby->count()>0){
			return $candidate_hobby;
		}
		else{
			return $candidate_hobby->count();
		}	
	}

	public function fetch_candidate_languages_resume_details($candidate_id){

		$languages=DB::table('add_user_languages')->where(['candidate_id'=>$candidate_id])->get();

		if($languages->count()>0){
			return $languages;
		}
		else{
			return $languages->count();
		}	
	}
    public function get_temp_id($id){
    $in=DB::table('user_choose_temp')->where(['candidate_id'=>$id])->first();
    return $in;
    }



}
