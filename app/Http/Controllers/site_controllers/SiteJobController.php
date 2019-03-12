<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\SiteModel\Job\JobModel;
use App\Http\Controllers\Controller;
use DB;

class SiteJobController extends Controller
{
    public function viewRelatedJobSearch(Request $request){


        // $title = !empty($request->title) ? $request->title : " ";
        // $city = !empty($request->city) ? $request->city :  " ";
        // $area = !empty($request->area) ? $request->area : " ";
       $title = $request->title;
       $citi = $request->city;
       $areas =$request->area;
       $f_city="";
       $f_area="";
       $f_indus="";
       $f_qual="";
       $f_exp="";
       $f_type="";  
       $f_shift="";     


        $obj = new JobModel();
        $job = $obj->fetch_all_jobs($title,$citi,$areas);
        
        // echo "<pre>";
        // print_r($job);
        $area = $obj->get_functional_area();
        $city = $obj->get_cities();
        $qual = $obj->get_qual();
        $indus = $obj->get_indus();
        

        //dd($job);
        return view('client_views.jobs_related_pages.search_related_job',['job'=>$job,'area'=>$area,'city'=>$city,'qual'=>$qual,'indus'=>$indus,'area1'=>$area,'get_cities'=>$city,'f_city'=>$f_city,'f_area'=>$f_area,'f_indus'=>$f_indus,'f_qual'=>$f_qual,'f_exp'=>$f_exp,'f_type'=>$f_type,'f_shift'=>$f_shift]);
    
    }
    public function viewFilterJobSearch(Request $request){
        $fcity = $request->f_city;
        $farea = $request->f_area;
        $findus = $request->f_indus;
        $fexp = $request->f_exp;
        $fqual = $request->f_qual;
        $ftype = $request->f_type;
        $fshift = $request->f_shift;

        $obj = new JobModel();
        $job = $obj->fetch_filter_jobs($fcity,$farea,$findus,$fexp,$fqual,$ftype,$fshift);

        $area = $obj->get_functional_area();
        $city = $obj->get_cities();
        $qual = $obj->get_qual();
        $indus = $obj->get_indus();
        // echo "<pre>";
        // print_r($job);
        return view('client_views.jobs_related_pages.search_related_job',['job'=>$job,'area'=>$area,'city'=>$city,'qual'=>$qual,'indus'=>$indus,'area1'=>$area,'get_cities'=>$city,'f_city'=>$fcity,'f_area'=>$farea,'f_indus'=>$findus,'f_qual'=>$fqual,'f_exp'=>$fexp,'f_type'=>$ftype,'f_shift'=>$fshift]);


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
