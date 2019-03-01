<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\Resumes\User_Resume_Model;
use App\SiteModel\User\SearchUserModel;
use DB;
class SearchUsers extends Controller
{
    
    public function showAllUsers(){

    	 $candidates= DB::table('register_users')->join('user_profile_images','register_users.id', '=', 'user_profile_images.candidate_id')->join('add_user_generals_info','register_users.id', '=', 'add_user_generals_info.id')->join('add_user_social_media_links','register_users.id', '=', 'add_user_social_media_links.candidate_id')->select('register_users.*','user_profile_images.*','add_user_generals_info.*','add_user_social_media_links.*')->get();
         if($candidates->count()>0){
           $candidates=$candidates;
         }
         else{
            $candidates=$candidates->count();
         }

    	 // echo"<pre>";
    	 // print_r($candidates);
         $city=DB::table('Add_cities')->get();
         $industry=DB::table('Company_industries')->get();
         $degree=DB::table('Add_degreelevel')->get();
         $qual=DB::table('Add_qualification')->get();
    	return view('client_views.user_related_pages.all_users',['candidates'=>$candidates,'industry'=>$industry,'degree'=> $degree,'qual'=>$qual,'city'=>$city]);
    }

    public function viewSingleCandidate(Request $request,$id){

    	$obj =  new User_Resume_Model();
        $info = $obj->get_user_detail($id);
        $general_info = $obj->get_candidate_general_info($id);
        $candidate_education = $obj->fetch_candidate_eduction_resume_details($id);
        $candidate_experience = $obj->fetch_candidate_experience_resume_details($id);
        $get_candidate_skill_just_six = $obj->get_candidate_skill_just_six($id);
        $candidate_project = $obj->fetch_candidate_project_resume_details($id);
        $candidate_languages = $obj->fetch_candidate_languages_resume_details($id);
        $candidate_hobbies = $obj->fetch_candidate_hobby_resume_details($id);
        $candidate_skill = $obj->fetch_candidate_skill_resume_details($id);
        $img = $obj->fetch_profile_img($id);
        $links = $obj->fetch_links($id);
    	return view('client_views.user_related_pages.single_candidate_profile',['info'=>$info,'general_info' => $general_info,'candidate_education' => $candidate_education,'candidate_experience' => $candidate_experience,'get_candidate_skill_just_six' => $get_candidate_skill_just_six,'candidate_project' => $candidate_project,'candidate_languages' => $candidate_languages,'candidate_hobbies' => $candidate_hobbies,'candidate_skill' => $candidate_skill,'img'=>$img,'links'=>$links]);
    }

    public function FilterUsers(Request $request){

    $city=$request->post('selected_city');
    $gender=$request->post('selected_gender');
    $career=$request->post('selected_career');
    $qual=$request->post('selected_qual');
    
    $obj = new SearchUserModel();
    $candidates = $obj->do_filter_search($city,$gender,$career,$qual);
         $city=DB::table('Add_cities')->get();
         $industry=DB::table('Company_industries')->get();
         $degree=DB::table('Add_degreelevel')->get();
         $qual=DB::table('Add_qualification')->get();
         // echo "<pre>";
         // print_r($candidates);
         return view('client_views.user_related_pages.all_users',['candidates'=>$candidates,'industry'=>$industry,'degree'=> $degree,'qual'=>$qual,'city'=>$city]);
    }
}
