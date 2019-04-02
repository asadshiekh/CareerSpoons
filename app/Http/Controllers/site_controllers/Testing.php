<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class Testing extends Controller
{ 
    public function test(){

    	$info2 = DB::table('company_availed_packages')->join('company_advertised_logo','company_availed_packages.company_id', '=','company_advertised_logo.company_id')->select('company_availed_packages.*','company_advertised_logo.*')->where(['company_package_status'=>'1'])->get();    

    	echo "<pre>";
    	print_r($info2);
    }	
}
