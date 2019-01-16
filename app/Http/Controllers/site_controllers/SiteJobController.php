<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SiteJobController extends Controller
{
    public function viewRelatedJobSearch(){

        $jobs=DB::table('organization_posts')->get();
    	return view('client_views.jobs_related_pages.search_related_job',['jobs'=>$jobs]);
    }

    public function viewAllJobSearch(){

    	return view('client_views.jobs_related_pages.all_jobs');
    }



   

}
