<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\SiteModel\Resumes\User_Resume_Model;
use App\Http\Controllers\Controller;

class UserProfile extends Controller
{
	public function viewUserProfile(Request $request){

		$obj =  new User_Resume_Model();
		$candidate_education = $obj->get_candidate_eduction($request->session()->get('id'));
		$candidate_experience = $obj->get_candidate_experience($request->session()->get('id'));
		$candidate_project = $obj->get_candidate_project($request->session()->get('id'));
		$candidate_skill = $obj->get_candidate_skill($request->session()->get('id'));
		$candidate_languages = $obj->get_candidate_languages($request->session()->get('id'));
		$candidate_hobbies = $obj->get_candidate_hobbies($request->session()->get('id'));

		return view('client_views.user_related_pages.user_profile',['candidate_education' => $candidate_education,'candidate_experience' => $candidate_experience,'candidate_project' => $candidate_project,'candidate_skill' => $candidate_skill,'candidate_languages' => $candidate_languages,'candidate_hobbies' => $candidate_hobbies]);
	}




}
