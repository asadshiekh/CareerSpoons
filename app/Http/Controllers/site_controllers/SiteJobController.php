<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteJobController extends Controller
{
    public function viewRelatedJobSearch(){

    	return view('client_views.jobs_related_pages.search_related_job');
    }

    public function viewAllJobSearch(){

    	return view('client_views.jobs_related_pages.all_jobs');
    }

    public function index(){

		return view('client_views.jobs_related_pages.check');    	
    }

    public function hello(){

    	return $name = $_POST['a'];
    }
}
