<?php

namespace App\SiteModel\ClientSite;

use Illuminate\Database\Eloquent\Model;
use DB;

class ClientSiteModel extends Model
{
    public function get_all_cities(){
    	$cities=DB::table('add_cities')->get();
    	return $cities;
    }
    public function get_all_area(){
    	$area=DB::table('add_functionalarea')->get();
    	return $area;
    }
    public function get_all_degree_level(){
    	$degree=DB::table('add_degreelevel')->get();
    	return $degree;
    }
    public function get_all_majors(){
    	$major=DB::table('add_major')->get();
    	return $major;
    }

    public function get_all_qualification(){

        $qualification=DB::table('add_qualification')->get();
        return $qualification;
    }

    public function get_all_indutries(){

        $indutries=DB::table('company_industries')->get();
        return $indutries;
    }

    public function get_all_accounting_jobs(){

        $response = DB::table('organization_posts')->where('req_industry','Accounting_&_Finance')->get();

        if($response->count()>0){
            return $response;
        }
        else{
            return $response->count();
        }

    }

    public function get_all_automotive_jobs(){

        $response = DB::table('organization_posts')->where('req_industry','Automotive')->get();

        if($response->count()>0){
            return $response;
        }
        else{
            return $response->count();
        }
    }


    public function get_all_business_jobs(){

        $response = DB::table('organization_posts')->where('req_industry','Business')->get();

        if($response->count()>0){
            return $response;
        }
        else{
            return $response->count();
        }
    }


    public function get_all_education_jobs(){


        $response = DB::table('organization_posts')->where('req_industry','Education_Training')->get();

        if($response->count()>0){
            return $response;
        }
        else{
            return $response->count();
        }

    }


    public function get_all_healthcare_jobs(){

        $response = DB::table('organization_posts')->where('req_industry','Healthcare')->get();

        if($response->count()>0){
            return $response;
        }
        else{
            return $response->count();
        }

    }


    public function get_all_RestaurantFood(){

        $response = DB::table('organization_posts')->where('req_industry','Restaurant_&_Food')->get();

        if($response->count()>0){
            return $response;
        }
        else{
            return $response->count();
        }

    }


    public function get_all_Transportation(){

        $response = DB::table('organization_posts')->where('req_industry','Transportation')->get();

        if($response->count()>0){
            return $response;
        }
        else{
            return $response->count();
        }

    }


    public function get_all_Telecommunications(){

        $response = DB::table('organization_posts')->where('req_industry','Telecommunications')->get();

        if($response->count()>0){
            return $response;
        }
        else{
            return $response->count();
        }
        
    }


    public function get_all_types(){

        $cities=DB::table('company_types')->get();
        return $cities;

    }

    public function get_job_match_criteria($candidate_id){

         $response = DB::table('candidate_job_match_criteria')->where('candidate_id',$candidate_id)->get();
         return $response;       
    }

    public function get_all_matched_jobs($u_id){
       $qwery=DB::table('candidate_job_match_criteria')->where(['candidate_id'=>$u_id])->first();
        $q=DB::table('add_user_generals_info')->where(['candidate_id'=>$u_id])->first();
    $indus=$q->candidate_industries;
    $title=$qwery->desired_designation;
    $exp=$qwery->total_experience;
    $area=$qwery->functional_criteria;
    $major=$qwery->major_criteria;
    $city=$qwery->preferred_city;
    if($indus == null ||$title == null || $area == null){
    return 0;
    }else{
    $jobs=DB::table('organization_posts')->join('add_organizations','organization_posts.company_id', '=', 'add_organizations.company_id')->join('upload_org_img','add_organizations.company_id', '=', 'upload_org_img.company_id')->join('job_preferences','job_preferences.post_id', '=', 'organization_posts.post_id')->where('organization_posts.job_title','like',$title)->where('organization_posts.req_industry','=',$indus)->where('organization_posts.job_experience','=',$exp)->where('organization_posts.functional_area','=',$area)->where('organization_posts.req_major','=',$major)->where('job_preferences.city','=',$city)->select('organization_posts.*','add_organizations.*','upload_org_img.*','job_preferences.*')->get();

     if($jobs->count() > 0){
     return $jobs;
     }else{
     return $jobs->count();
     }
 }

    
    }





}
