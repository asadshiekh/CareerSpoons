<?php

namespace App\Http\Controllers\admin_controllers\cv_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminJobPost extends Controller
{
    public function viewJobPostForm(){
    	return view('admin_views/cv_views/admin_postjob');
    }
}
