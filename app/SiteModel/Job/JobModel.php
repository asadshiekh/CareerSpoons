<?php

namespace App\SiteModel\Job;

use Illuminate\Database\Eloquent\Model;
use DB;

class JobModel extends Model
{
    //fetch jobs function
	public function fetch_all_jobs($date){

		$jobs=DB::table('add_organizations')->join('organization_posts','add_organizations.company_id', '=', 'organization_posts.company_id')->join('upload_org_img','add_organizations.company_id', '=', 'upload_org_img.company_id')->select('add_organizations.*', 'organization_posts.*','upload_org_img.*')->where('organization_posts.post_status','!=','Block')->inRandomOrder()->simplePaginate(6);

		if($jobs->count()>0){

            return $jobs;
        }
        else{
            return $jobs->count();
        }


	}

	public function fetch_job_details($id){
     $detail=DB::table('organization_posts')->join('add_organizations','organization_posts.company_id', '=', 'add_organizations.company_id')->join('upload_org_img','organization_posts.company_id', '=', 'upload_org_img.company_id')->join('add_organization_social_link','organization_posts.company_id','=','add_organization_social_link.organization_id')->select('add_organizations.*', 'organization_posts.*','upload_org_img.*','add_organization_social_link.*')->where(['organization_posts.post_id'=>$id])->first();
			return $detail;
			// if($detail->count()>0){
   //          return $detail;
   //      }
   //      else{
   //          return $detail->count();
   //      }
	}


	public function fetch_job_similar($job_details,$post_id){

		$jobs=DB::table('organization_posts')->join('add_organizations','organization_posts.company_id', '=', 'add_organizations.company_id')->join('upload_org_img','organization_posts.company_id', '=', 'upload_org_img.company_id')->select('add_organizations.*', 'organization_posts.*','upload_org_img.*')->where([
			['organization_posts.req_industry','=',[$job_details]],
			['organization_posts.post_id','!=',[$post_id]]
		])->orderBy('organization_posts.post_id','desc')->limit(3)->get();
			
		if($jobs->count()>0){
            return $jobs;
        }
        else{
            return $jobs->count();
        }

        

		}

	


    // DB::table('users')->join('posts', 'users.id', '=', 'posts.user_id')
     //       ->select('users.*', 'posts.descrption')
       //     ->get();->simplePaginate(2)


     //$info=DB::select(DB::raw("SELECT * FROM candidate_reviews,register_users,user_profile_images WHERE candidate_reviews.candidate_id=register_users.id && candidate_reviews.candidate_id=user_profile_images.candidate_id && candidate_reviews.rating_points>=3.5 ORDER BY RAND()  LIMIT 5"));
}
