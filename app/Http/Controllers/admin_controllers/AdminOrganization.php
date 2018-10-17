<?php

namespace App\Http\Controllers\admin_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOrganization extends Controller
{
    public function addOrganizationForm(){
   return view('admin_views/add_organization');
    }
}
