<?php

namespace App\SiteModel\Job;

use Illuminate\Database\Eloquent\Model;
use DB;

class JobModel extends Model
{
    //fetch jobs function
	public function fetch_all_jobs($title,$city,$area){

if($title || $city || $area){
		// $jobs=DB::table('add_organizations')->join('organization_posts','add_organizations.company_id', '=', 'organization_posts.company_id')->join('upload_org_img','add_organizations.company_id', '=', 'upload_org_img.company_id')->join('job_preferences','add_organizations.company_id','=','job_preferences.company_id')->select('add_organizations.*', 'organization_posts.*','upload_org_img.*','job_preferences.*')->where('organization_posts.post_status','!=','Block')->orWhere(function($jobs)
  //     {
  //   $jobs->where('organization_posts.job_title','=',$title)->where('organization_posts.functional_area','=',$area)->where('job_preferences.city','=',$city);
          
  //   })->orderBy('organization_posts.post_id','desc')->simplePaginate(6);



$jobs= DB::table('organization_posts')->join('add_organizations','add_organizations.company_id', '=', 'organization_posts.company_id')->join('upload_org_img','add_organizations.company_id', '=', 'upload_org_img.company_id');
      if($title){
      $jobs->select('organization_posts.*','upload_org_img.*','add_organizations.*')->where('organization_posts.post_status','!=','Block')->Where('organization_posts.job_title','like','%'.$title.'%');
      }
      if($area){
        $jobs->select('organization_posts.*','upload_org_img.*','add_organizations.*')->where('organization_posts.post_status','!=','Block')->Where('organization_posts.functional_area','=',$area);
      }
      if($city){

        $jobs->join('job_preferences','organization_posts.post_id','=','job_preferences.post_id')->Where('job_preferences.city','=',$city)->select('organization_posts.*','upload_org_img.*','add_organizations.*','job_preferences.*')->where('organization_posts.post_status','!=','Block');
      }
      if($title=" " && $area=" " && $city=" "){
        $jobs->select('organization_posts.*','upload_org_img.*','add_organizations.*')->where('organization_posts.post_status','!=','Block');
      }


       $job=$jobs->orderBy('organization_posts.post_id','desc')->simplePaginate(6);
      


   // $jobs= DB::table('add_organizations')->join('organization_posts','add_organizations.company_id', '=', 'organization_posts.company_id')->join('job_preferences','add_organizations.company_id','=','job_preferences.post_id')->select('organization_posts.*','job_preferences.*')->
   //      when($title, function ($query,$title){
   //              return $query->Where('organization_posts.job_title','=',$title);
   //              },function ($query){
   //                   return $query->Where('organization_posts.job_title','=','');
   //              })->when($city, function ($query,$city){
   //                  return $query->Where('job_preferences.city','=',$city);
   //              },function ($query){
   //                   return $query->Where('job_preferences.city','=','');
   //              })->when($area, function ($query,$area){
   //                  return $query->Where('organization_posts.functional_area','=',$area);
   //              },function ($query){
   //                   return $query->Where('organization_posts.functional_area','=','');
   //              })

   //      ->get();

		if($job->count()>0){

            return $job;
        }
        else{
            return $job->count();
        }

   // return $title;
  }else{
    $jobs= DB::table('organization_posts')->join('add_organizations','add_organizations.company_id', '=', 'organization_posts.company_id')->join('upload_org_img','add_organizations.company_id', '=', 'upload_org_img.company_id')->select('organization_posts.*','upload_org_img.*','add_organizations.*')->where('organization_posts.post_status','!=','Block')->orderBy('organization_posts.post_id','desc')->simplePaginate(6);
        if($jobs->count()>0){

            return $jobs;
        }
        else{
            return $jobs->count();
        }
  }

	}

  public function fetch_users_against_post($c_id,$p_id){
     $user= DB::table('apllied_jobs')->join('register_users','register_users.id', '=', 'apllied_jobs.user_id')->join('user_profile_images','user_profile_images.candidate_id', '=', 'apllied_jobs.user_id')->join('user_choose_temp','user_choose_temp.candidate_id', '=', 'apllied_jobs.user_id')->select('apllied_jobs.*','register_users.*','user_profile_images.*','user_choose_temp.*')->where('register_users.user_activation_status','=','1')->where(['apllied_jobs.company_id'=>$c_id,'apllied_jobs.post_id'=>$p_id])->get();
     if($user->count() > 0){
     return $user;
     }else{
      return $user->count();
     }

  }

  public function fetch_Viewed_users_against_post($c_id,$p_id){
    $user= DB::table('apllied_jobs')->join('register_users','register_users.id', '=', 'apllied_jobs.user_id')->join('user_profile_images','user_profile_images.candidate_id', '=', 'apllied_jobs.user_id')->join('user_choose_temp','user_choose_temp.candidate_id', '=', 'apllied_jobs.user_id')->select('apllied_jobs.*','register_users.*','user_profile_images.*','user_choose_temp.*')->where('register_users.user_activation_status','=','1')->where(['apllied_jobs.company_id'=>$c_id,'apllied_jobs.post_id'=>$p_id,'apllied_jobs.view_status'=>"1"])->get();
      if($user->count() > 0){
     return $user;
     }else{
      return $user->count();
     }
  }
  public function fetch_short_users_against_post($c_id,$p_id){
       $user= DB::table('apllied_jobs')->join('register_users','register_users.id', '=', 'apllied_jobs.user_id')->join('user_profile_images','user_profile_images.candidate_id', '=', 'apllied_jobs.user_id')->join('user_choose_temp','user_choose_temp.candidate_id', '=', 'apllied_jobs.user_id')->select('apllied_jobs.*','register_users.*','user_profile_images.*','user_choose_temp.*')->where('register_users.user_activation_status','=','1')->where(['apllied_jobs.company_id'=>$c_id,'apllied_jobs.post_id'=>$p_id,'apllied_jobs.view_status'=>"1",'apllied_jobs.shortlisted'=>"1"])->get();
        if($user->count() > 0){
       return $user;
       }else{
        return $user->count();
       }
  }
  public function fetch_called_users_against_post($c_id,$p_id){
       $user= DB::table('apllied_jobs')->join('register_users','register_users.id', '=', 'apllied_jobs.user_id')->join('user_profile_images','user_profile_images.candidate_id', '=', 'apllied_jobs.user_id')->join('user_choose_temp','user_choose_temp.candidate_id', '=', 'apllied_jobs.user_id')->select('apllied_jobs.*','register_users.*','user_profile_images.*','user_choose_temp.*')->where('register_users.user_activation_status','=','1')->where(['apllied_jobs.company_id'=>$c_id,'apllied_jobs.post_id'=>$p_id,'apllied_jobs.view_status'=>"1",'apllied_jobs.shortlisted'=>"1",'apllied_jobs.interview_status'=>"1",'apllied_jobs.interview_status'=>"1"])->where('apllied_jobs.message','!=','0')->get();
        if($user->count() > 0){
       return $user;
       }else{
        return $user->count();
       }
  }
 public function  fetch_app_users_against_post ($c_id,$p_id){
       $user= DB::table('apllied_jobs')->join('register_users','register_users.id', '=', 'apllied_jobs.user_id')->join('user_profile_images','user_profile_images.candidate_id', '=', 'apllied_jobs.user_id')->join('user_choose_temp','user_choose_temp.candidate_id', '=', 'apllied_jobs.user_id')->select('apllied_jobs.*','register_users.*','user_profile_images.*','user_choose_temp.*')->where('register_users.user_activation_status','=','1')->where(['apllied_jobs.company_id'=>$c_id,'apllied_jobs.post_id'=>$p_id,'apllied_jobs.view_status'=>"1",'apllied_jobs.shortlisted'=>"1"])->where('apllied_jobs.message','!=','0')->get();
        if($user->count() > 0){
       return $user;
       }else{
        return $user->count();
       }
  }
  public function fetch_match_users_against_post($c_id,$p_id){
    $qwery=DB::table('organization_posts')->where(['post_id'=>$p_id])->first();
    $indus=$qwery->req_industry;
    $title=$qwery->job_title;
    $user= DB::table('apllied_jobs')->join('register_users','register_users.id', '=', 'apllied_jobs.user_id')->join('user_profile_images','user_profile_images.candidate_id', '=', 'apllied_jobs.user_id')->join('user_choose_temp','user_choose_temp.candidate_id', '=', 'apllied_jobs.user_id')->join('organization_posts','organization_posts.post_id', '=', 'apllied_jobs.post_id')->join('add_user_generals_info','apllied_jobs.user_id', '=', 'add_user_generals_info.id')->select('apllied_jobs.*','register_users.*','user_profile_images.*','organization_posts.*','user_choose_temp.*','add_user_generals_info.*')->where('register_users.user_activation_status','=','1')->where(['add_user_generals_info.candidate_industries'=>$indus])->where('organization_posts.job_title','like',$title)->get();
     if($user->count() > 0){
     return $user;
     }else{
      return $user->count();
     }

  }
  public function fetch_filter_jobs($fcity,$farea,$findus,$fexp,$fqual,$ftype,$fshift){
    if($fcity || $farea || $findus || $fexp || $fqual || $ftype || $fshift){
    // echo $fshift;
     $jobee= DB::table('organization_posts')->join('add_organizations','add_organizations.company_id', '=', 'organization_posts.company_id')->join('upload_org_img','add_organizations.company_id', '=', 'upload_org_img.company_id');
      if($fcity){
         $jobee->join('job_preferences','organization_posts.post_id','=','job_preferences.post_id')->select('organization_posts.*','upload_org_img.*','add_organizations.*','job_preferences.*')->where('organization_posts.post_status','!=','Block')->Where('job_preferences.city','=',$fcity);
       
      }
      if($farea){
        $jobee->Where('organization_posts.functional_area','like',$farea)->select('organization_posts.*','upload_org_img.*','add_organizations.*')->where('organization_posts.post_status','!=','Block');
      }
      if($findus){
        $jobee->Where('organization_posts.req_industry','=',$findus)->select('organization_posts.*','upload_org_img.*','add_organizations.*')->where('organization_posts.post_status','!=','Block');
      }
      
      if($fexp == "1" || $fexp == "2" || $fexp == "3" || $fexp == "4" || $fexp == "5"){
        $jobee->select('organization_posts.*','upload_org_img.*','add_organizations.*')->where('organization_posts.post_status','!=','Block')->Where('organization_posts.job_experience','=',$fexp);
      }
      if($fexp == "6"){
        $jobee->select('organization_posts.*','upload_org_img.*','add_organizations.*')->where('organization_posts.post_status','!=','Block')->Where('organization_posts.job_experience','>','5');
      }
      if($fqual){
        $jobee->join('job_req_qualifications','organization_posts.post_id','=','job_req_qualifications.post_id')->select('organization_posts.*','upload_org_img.*','add_organizations.*','job_req_qualifications.*')->where('organization_posts.post_status','!=','Block')->Where('job_req_qualifications.req_qualification','=',$fqual);
       
      }
      // if($fcity && $ftype){
      //   $jobee->Where('job_preferences.job_type','=',$ftype);
      // }
      if($ftype){
        $jobee->join('job_preferences','organization_posts.post_id','=','job_preferences.post_id')->select('organization_posts.*','upload_org_img.*','add_organizations.*','job_preferences.*')->Where('job_preferences.job_type','=',$ftype)->where('organization_posts.post_status','!=','Block');
      }

      if($fshift){
        $jobee->join('job_preferences','organization_posts.post_id','=','job_preferences.post_id')->select('organization_posts.*','upload_org_img.*','add_organizations.*','job_preferences.*')->Where('job_preferences.job_shift','=',$fshift)->where('organization_posts.post_status','!=','Block');
      }
      // if($fcity && $fshift){
      //   $jobee->Where('job_preferences.job_shift','=',$fshift);
      // }

       $jobe=$jobee->orderBy('organization_posts.post_id','desc')->simplePaginate(6);
        if($jobe->count()>0){

            return $jobe;
        }
        else{
            return $jobe->count();
        }


    }else{
      $jobe= DB::table('organization_posts')->join('add_organizations','add_organizations.company_id', '=', 'organization_posts.company_id')->join('upload_org_img','add_organizations.company_id', '=', 'upload_org_img.company_id')->select('organization_posts.*','upload_org_img.*','add_organizations.*')->where('organization_posts.post_status','!=','Block')->orderBy('organization_posts.post_id','desc')->simplePaginate(6);
        if($jobe->count()>0){

            return $jobe;
        }
        else{
            return $jobe->count();
        }

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

    public function do_filter_search($p_id,$c_id,$city,$gender,$career,$qual,$indus){
      if($city || $gender || $career || $qual || $indus){
           $candidate= DB::table('apllied_jobs')->join('register_users','register_users.id', '=', 'apllied_jobs.user_id')->join('user_profile_images','user_profile_images.candidate_id', '=', 'apllied_jobs.user_id')->join('user_choose_temp','user_choose_temp.candidate_id', '=', 'apllied_jobs.user_id')->join('add_user_generals_info','apllied_jobs.user_id', '=', 'add_user_generals_info.id')->select('apllied_jobs.*','register_users.*','user_profile_images.*','add_user_generals_info.*')->where('register_users.user_activation_status','=','1')->where(['apllied_jobs.company_id'=>$c_id,'apllied_jobs.post_id'=>$p_id]);
           // $candidate= DB::table('register_users')->join('user_profile_images','register_users.id', '=', 'user_profile_images.candidate_id')->join('add_user_generals_info','register_users.id', '=', 'add_user_generals_info.id')->join('add_user_social_media_links','register_users.id', '=', 'add_user_social_media_links.candidate_id')->select('register_users.*','user_profile_images.*','add_user_generals_info.*','add_user_social_media_links.*');
            if($city){
                 $candidate->where('add_user_generals_info.candidate_city','Like',$city);
            }
            if($gender){
                 $candidate->where('add_user_generals_info.candidate_gender','like',$gender);
            }
            if($career){
                 $candidate->where('add_user_generals_info.candidate_career_level','like',$career);
            }
            if($qual){
                 $candidate->where('add_user_generals_info.candidate_qualification','like',$qual);
            }
            if($indus){
                 $candidate->where('add_user_generals_info.candidate_industries','like',$indus);
            }

           $candidates=$candidate->get();
           if($candidates->count()>0){
             return $candidates=$candidates;
           }
           else{
              return $candidates=$candidates->count();
           }

      }else{
      $candidates= DB::table('apllied_jobs')->join('register_users','register_users.id', '=', 'apllied_jobs.user_id')->join('user_profile_images','user_profile_images.candidate_id', '=', 'apllied_jobs.user_id')->join('user_choose_temp','user_choose_temp.candidate_id', '=', 'apllied_jobs.user_id')->join('add_user_generals_info','apllied_jobs.user_id', '=', 'add_user_generals_info.id')->select('apllied_jobs.*','register_users.*','user_profile_images.*','add_user_generals_info.*')->where('register_users.user_activation_status','=','1')->where(['apllied_jobs.company_id'=>$c_id,'apllied_jobs.post_id'=>$p_id])->get();
           if($candidates->count()>0){
             return $candidates=$candidates;
           }
           else{
             return  $candidates=$candidates->count();
           }
      }
    }
}
