<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\SiteModel\Job\JobModel;
use App\Http\Controllers\Controller;
use DB;

class SiteJobController extends Controller
{
    public function viewRelatedJobSearch(Request $request){

        $obj = new JobModel();
        $job = $obj->fetch_all_jobs();
        $area = $obj->get_functional_area();
        $city = $obj->get_cities();
        $qual = $obj->get_qual();
        $indus = $obj->get_indus();
        if($request->post("title")){
            $title=$request->post("title");
        }else{
            $title="Null";
        }
        if($request->post("city")){
            $city=$request->post("city");
        }else{
            $city="Null";
        }
        if($request->post("area")){
            $area=$request->post("area");
        }else{
            $area="Null";
        }
        
       
       // return view('client_views.jobs_related_pages.search_related_job',['job'=>$job,'area'=>$area,'city'=>$city,'qual'=>$qual,'indus'=>$indus,'area1'=>$area]);
    }


    public function viewAllJobSearch(){
        $obj = new JobModel();
    	return view('client_views.jobs_related_pages.all_jobs');
    }

    public function viewjobDetail($id){
        
        $obj = new JobModel();


        $job_detail=$obj->fetch_job_details($id);
        $job_similar=$obj->fetch_job_similar($job_detail->req_industry,$id);
        $job_req=DB::table('job_req_qualifications')->where(['post_id'=>$id])->get();
        $job_p=DB::table('job_preferences')->where(['post_id'=>$id])->get();
        
 // echo "<pre>";
 // print_r($job_detail);
        return view('client_views.jobs_related_pages.job_details',['job_detail'=>$job_detail,'job_req'=>$job_req,'job_p'=>$job_p,'job_similar'=>$job_similar]);   
    }



   

}
