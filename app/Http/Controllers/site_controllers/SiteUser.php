<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\User\UserRegisteration;
use App\SiteModel\User\UserProfileImages;
use App\SiteModel\User\UserProfileModel;
use App\SiteModel\Resumes\User_Resume_Model;
use App\Mail\Site_Mail\User_Mail\User_Registeration;
use Mail;
use DB;
class SiteUser extends Controller
{	


    public function viewRegisterUser(){

    	return view('client_views.user_related_pages.user_registeration');
    }

    public function doRegisterUser(Request $request){

    	$current_date = date("Y.m.d h:i:s");
      $current_cv_status = 0;
    	//$phone = str_replace("-","",$request->phone_number);
    	
    	$user_response = array(
          'candidate_name' => $request->candidate_name,
          'user_email' => $request->user_email,
          'password' => $request->user_password,
          'username' => $request->username,
          'phone_number' => $request->phone_number,
          'remember_token' => $request->_token,
          'current_cv_status' => $current_cv_status,
          'checkbox' => $request->checkbox,
          'created_at' => $current_date
      );

    	
    	//echo $request->username." ".$request->user_email." ".$request->candidate_name;
    	 $obj =  new UserRegisteration();
    	 $user_info = $obj->do_register_user($user_response);
       
       // Send User Mail For Verification
       //Mail::send(new User_Registeration());

       $lastInsertId = DB::getPdo()->lastInsertId();
       
       $user_response2 = array(
          'candidate_id' => $lastInsertId,
          'created_at' => $current_date
        );
       $obj2 =  new User_Resume_Model();
       $user_profile_strength = $obj2->initialized_Profile_Strength($user_response2);
       $user_gereral_info = $obj2->initialized_general_info($user_response2);
       


       // Initialized Table of User Images Intergrate With User Profile Model

          $user_response3 = array(
          'candidate_id' => $lastInsertId,
          'created_at' => $current_date
        );

       $obj3 =  new UserProfileImages();
       $data = $obj3->do_initialized_user_profile_image_table_with_default_values($user_response3);

      //Initialized Table of User Review sYSTEM

        $obj4 =  new UserProfileModel();
        $data = $obj4->do_initialized_review($user_response3);


    	 if($user_info){

    		echo "yes";
    	}
    	else{

    		echo "no";
    	}



    }

    public function sendUserRegisterationEmail(Request $request){

       //Send User Mail For Verification
       Mail::send(new User_Registeration());
       
    }





}

