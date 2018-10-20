<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteCompanyLogin extends Controller
{
    
 	public function viewCompanyLogin(){

    	return view('client_views.company_related_pages.company_login');
    }

    public function viewCompanyForgotPassword(){

    	return view('client_views.company_related_pages.company_forgot_password');
    }
}
