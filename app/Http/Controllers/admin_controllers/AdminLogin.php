<?php

namespace App\Http\Controllers\admin_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLogin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewLoginPage()
    {
        return view('admin_views/login');
    }

   
   
   
}
