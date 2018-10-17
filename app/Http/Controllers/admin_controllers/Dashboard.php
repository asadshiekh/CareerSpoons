<?php

namespace App\Http\Controllers\admin_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewIndexPage()
    {
        return view('admin_views/index');
    }
    public function viewRegisterPage()
    {
        return view('admin_views/register');
    }
     public function viewRegister1Page()
    {
        return view('admin_views/register1');
    }

    
}
