<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function viewHome(){

     return view('client_views.home');
    
    }

    public function viewContactUs(){

    	return view('client_views.contact_us');
    }

    public function viewFaq(){

    	return view('client_views.faq');
    }
}
