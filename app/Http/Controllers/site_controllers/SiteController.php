<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function viewHome(){

     return view('client_views.main_site.home');
    
    }

    public function viewContactUs(){

    	return view('client_views.main_site.contact_us');
    }

    public function viewFaq(){

    	return view('client_views.main_site.faq');
    }
}
