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

    public function hello(){

		return view('client_views.jobs_related_pages.check');    	
    }

     public function hello2(){

    return view('client_views.jobs_related_pages.check2');     
    }

    public function post(Request $request){
      $response = array(
          'status' => 'success',
          'msg' => $request->username,
      );
      return response()->json($response); 
   }

    public function post2(Request $request){
      $response = array(
          'status' => 'success',
          'msg' => $request->formdata->name,
      );
      return response()->json($response); 
   }
   

}
