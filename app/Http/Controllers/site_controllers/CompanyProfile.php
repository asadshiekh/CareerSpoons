<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyProfile extends Controller
{
    public function viewCompanyProfile(){

    	return view('client_views.company_related_pages.company_profile');
    }
}
