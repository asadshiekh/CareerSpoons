<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\User\UserloginModel;
class SiteUserLogin extends Controller
{
    public function viewUserLogin(){

    	return view('client_views.user_related_pages.user_login');
    }

    public function viewUserForgotPassword(){

    	return view('client_views.user_related_pages.user_forgot_password');
    }

    public function doUserLogin(Request $request){

    		
    	$email = $request->get('user_email');
        $password = $request->get('user_password');

    	$obj =  new UserloginModel();
        $info = $obj->do_login_user($email,$password);

        //print_r($info);

       	if($info){ 

    	$userdata=array(
            "id"=>$info->id,
            "candidate_name"=>$info->candidate_name,
            "user_email"=>$info->user_email,
            "username"=>$info->username,
            "phone_number"=>$info->phone_number,
            "status"=>'Active'
        );
    	//print_r($userdata);
    	$request->session()->put($userdata);
    	echo "yes";

    }else{

    		echo "no";

    	}

 
 	}

    public function logout(Request $request){

        $email = $request->session()->get('email');
        $request->session()->flush();
        return redirect('/');
    }




}
