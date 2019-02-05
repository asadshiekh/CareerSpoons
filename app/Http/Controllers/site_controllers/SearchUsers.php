<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class SearchUsers extends Controller
{
    
    public function showAllUsers(){

    	 $candidates= DB::table('register_users')->join('add_user_generals_info','register_users.id', '=', 'add_user_generals_info.id')->join('user_profile_images','register_users.id', '=', 'user_profile_images.candidate_id')->join('add_user_social_media_links','register_users.id', '=', 'add_user_social_media_links.candidate_id')->select('register_users.*','add_user_generals_info.*','user_profile_images.*','add_user_social_media_links.*')->inRandomOrder()->get();

    	 //echo"<pre>";
    	 //print_r($candidates);
    	return view('client_views.user_related_pages.all_users',['candidates'=>$candidates]);
    }

    public function viewSingleCandidate(Request $request,$id){

    	echo $id;    
    }
}
