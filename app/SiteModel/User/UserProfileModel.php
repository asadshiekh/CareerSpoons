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


	public function do_initialized_job_match_criteria($user_response3){

	$data = DB::table('candidate_job_match_criteria')->insert($user_response3);
		return $data;     
	}


	public function do_update_candidate_criteria($user_response,$candidate_id){

		$data = DB::table('candidate_job_match_criteria')->where('candidate_id',$candidate_id)->update($user_response);
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

	public function check_user_password($candidate_id,$candidate_password){


		$info=DB::table('register_users')->select('*')->where([
			['password','=',[$candidate_password]],
			['id','=',[$candidate_id]],
		])->first();
		return $info;
	}


	public function update_candidate_details($candidate_id,$user_response){

		$data = DB::table('register_users')->where('id',$candidate_id)->update($user_response);
		return $data;
		
	}

	public function get_matched_jobs($candidate_id){

		$info = DB::table('candidate_job_match_criteria')->join('add_user_generals_info','add_user_generals_info.candidate_id', '=', 'candidate_job_match_criteria.candidate_id')->join('organization_posts','add_user_generals_info.candidate_industries', '=', 'organization_posts.req_industry')->join('add_organizations','organization_posts.company_id', '=', 'add_organizations.company_id')->where('organization_posts.job_title','Like','%candidate_job_match_criteria.desired_designation%')->where(['candidate_job_match_criteria.candidate_id'=>$candidate_id])->select('candidate_job_match_criteria.*','add_user_generals_info.*','add_organizations.*','organization_posts.*')->get();

		return $info;
	}

	// $jobs= DB::table('organization_posts')->join('add_organizations','add_organizations.company_id', '=', 'organization_posts.company_id')->join('upload_org_img','add_organizations.company_id', '=', 'upload_org_img.company_id')->select('organization_posts.*','upload_org_img.*','add_organizations.*')->where('organization_posts.post_status','!=','Block')->orderBy('organization_posts.post_id','desc')->simplePaginate(6);




}



