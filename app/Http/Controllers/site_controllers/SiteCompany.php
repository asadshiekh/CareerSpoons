<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteCompany extends Controller
{
    public function viewRegisteredCompanies(){

    	return view('client_views.registered_companies');
    }

}
