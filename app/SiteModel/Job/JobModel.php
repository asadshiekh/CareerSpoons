<?php

namespace App\SiteModel\Job;

use Illuminate\Database\Eloquent\Model;
use DB;

class JobModel extends Model
{
    //fetch jobs function
	public function fetch_all_jobs($title,$city,$area){


		// $jobs=DB::table('add_organizations')->join('organization_posts','add_organizations.company_id', '=', 'organization_posts.company_id')->join('upload_org_img','add_organizations.company_id', '=', 'upload_org_img.company_id')->join('job_preferences','add_organizations.company_id','=','job_preferences.company_id')->select('add_organizations.*', 'organization_posts.*','upload_org_img.*','job_preferences.*')->where('organization_posts.post_status','!=','Block')->orWhere(function($jobs)
  //     {
  //   $jobs->where('organization_posts.job_title','=',$title)->where('organization_posts.functional_area','=',$area)->where('job_preferences.city','=',$city);
          
  //   })->orderBy('organization_posts.post_id','desc')->simplePaginate(6);

   $jobs= DB::table('add_organizations')->join('organization_posts','add_organizations.company_id', '=', 'organization_posts.company_id')->join('job_preferences','add_organizations.company_id','=','job_preferences.post_id')->select('organization_posts.*','job_preferences.*')->
        when($title, function ($query,$title){
                    return $query->Where('organization_posts.job_title','=',$title);
                },function ($query){
                     return $query->orderBy('organization_posts.job_title');
                })->when($city, function ($query,$city){
                    return $query->Where('job_preferences.city','=',$city);
                },function ($query){
                     return $query->orderBy('job_preferences.city');
                })->when($area, function ($query,$area){
                    return $query->Where('organization_posts.functional_area','=',$area);
                },function ($query){
                     return $query->orderBy('organization_posts.functional_area');
                })

        ->get();

   }
		if($jobs->count()>0){
      

            return $jobs;
        }
        else{
            return $jobs->count();
        }

   // return $title;


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
    public function get_functional_area(){
      $area=DB::table('Add_functionalarea')->get();
        if($area->count()>0){
            return $area;
        }
        else{
            return $area->count();
        }
    }
    public function get_cities(){
      $cty=DB::table('Add_cities')->get();
        if($cty->count()>0){
            return $cty;
        }
        else{
            return $cty->count();
        }
    }
    public function get_qual(){
      $qual=DB::table('Add_qualification')->get();
        if($qual->count()>0){
            return $qual;
        }
        else{
            return $qual->count();
        }
    }
public function get_indus(){
      $indus=DB::table('company_industries')->get();
        if($indus->count()>0){
            return $indus;
        }
        else{
            return $indus->count();
        }
    }

	


    // DB::table('users')->join('posts', 'users.id', '=', 'posts.user_id')
     //       ->select('users.*', 'posts.descrption')
       //     ->get();->simplePaginate(2)


     //$info=DB::select(DB::raw("SELECT * FROM candidate_reviews,register_users,user_profile_images WHERE candidate_reviews.candidate_id=register_users.id && candidate_reviews.candidate_id=user_profile_images.candidate_id && candidate_reviews.rating_points>=3.5 ORDER BY RAND()  LIMIT 5"));
}
