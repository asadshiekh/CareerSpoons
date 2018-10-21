<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\User\UserRegisteration;
class SiteUser extends Controller
{	

	

    public function viewRegisterUser(){

    	return view('client_views.user_related_pages.user_registeration');
    }

    public function doRegisterUser(Request $request){

    	$current_date = date("Y.m.d h:i:s");
    	//$phone = str_replace("-","",$request->phone_number);
    	
    	$user_response = array(
          'candidate_name' => $request->candidate_name,
          'user_email' => $request->user_email,
          'password' => $request->user_password,
          'username' => $request->username,
          'phone_number' => $request->phone_number,
          'remember_token' => $request->_token,
          'checkbox' => $request->checkbox,
          'created_at' => $current_date
      );

    	
    	//echo $request->username." ".$request->user_email." ".$request->candidate_name;
    	 $obj =  new UserRegisteration();
    	 $user_info = $obj->do_register_user($user_response);

    	 if($user_info){

    		echo "yes";
    	}
    	else{

    		echo "no";
    	}

    }



}

