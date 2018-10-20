<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteUserLogin extends Controller
{
    public function viewUserLogin(){

    	return view('client_views.user_related_pages.user_login');
    }

    public function viewUserForgotPassword(){

    	return view('client_views.user_related_pages.user_forgot_password');
    }
}
