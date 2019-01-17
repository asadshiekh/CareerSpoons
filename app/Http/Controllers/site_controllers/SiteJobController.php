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
    	return view('client_views.jobs_related_pages.search_related_job',['job'=>$job]);
    }

    public function viewAllJobSearch(){

    	return view('client_views.jobs_related_pages.all_jobs');
    }



   

}
