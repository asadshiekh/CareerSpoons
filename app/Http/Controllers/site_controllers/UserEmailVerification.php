<?php

namespace App\Http\Controllers\site_controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\User\UserEmailVerificationModel;

class UserEmailVerification extends Controller
{
	public function candidateEmailVerification(Request $request,$email){

		if ($request->session()->get('user_email')==$email) {
    				
    		$obj =  new UserEmailVerificationModel();
    	 	$user_verifed = $obj->check_user_email_verification($email);
    	 	$request->session()->flash('user_email_verify', true); 	
    	 	return redirect('/');

		}

		else{

			$obj =  new UserEmailVerificationModel();
    	 	$user_verifed = $obj->check_user_email_verification($email);
    	 	$request->session()->flash('user_email_verify', true);
    	 	return redirect('user-login'); 	
		}
	}
}
