<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyEmailVerification extends Controller
{
 	public function organizationEmailVerification($email){

 		echo "Hello World".$email;
 	}   
}
