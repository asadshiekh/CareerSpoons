<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\SiteModel\Job\JobModel;
use App\Http\Controllers\Controller;
use DB;

class SiteJobController extends Controller
{
    public function viewRelatedJobSearch(){
        $obj = new JobModel();
        $job=$obj->fetch_all_jobs();
        // echo "<pre>";
        // print_r($jobs);
        // echo "</pre>";
        //dd($job);
    	return view('client_views.jobs_related_pages.search_related_job',['job'=>$job]);
    }

    public function viewAllJobSearch(){

    	return view('client_views.jobs_related_pages.all_jobs');
    }

    public function viewjobDetail($id){
        
        $obj = new JobModel();

        $job_detail=$obj->fetch_job_details($id);
        $job_similar=$obj->fetch_job_similar($job_detail->req_industry,$id);
        $job_req=DB::table('job_req_qualifications')->where(['post_id'=>$id])->get();
        $job_p=DB::table('job_preferences')->where(['post_id'=>$id])->get();
        
        // echo "<pre>";
        // print_r($job_similar);
        // echo "</pre>";
        //dd($job);
        
        return view('client_views.jobs_related_pages.job_details',['job_detail'=>$job_detail,'job_req'=>$job_req,'job_p'=>$job_p,'job_similar'=>$job_similar]);   
    }



   

}
