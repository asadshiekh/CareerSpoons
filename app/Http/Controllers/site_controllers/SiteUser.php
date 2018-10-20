<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteUser extends Controller
{
    public function viewRegisterUser(){

    	return view('client_views.user_related_pages.user_registeration');
    }
}
