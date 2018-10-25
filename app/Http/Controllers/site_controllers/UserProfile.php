<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfile extends Controller
{
    public function viewUserProfile(){

    	return view('client_views.user_related_pages.user_profile');
    }
}
