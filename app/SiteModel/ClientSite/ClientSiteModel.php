<?php

namespace App\SiteModel\ClientSite;

use Illuminate\Database\Eloquent\Model;
use DB;

class ClientSiteModel extends Model
{
    public function get_all_cities(){
    	$cities=DB::table('add_cities')->get();
    	return $cities;
    }
    public function get_all_area(){
    	$area=DB::table('add_functionalarea')->get();
    	return $area;
    }
    public function get_all_degree_level(){
    	$degree=DB::table('add_degreelevel')->get();
    	return $degree;
    }
    public function get_all_majors(){
    	$major=DB::table('add_major')->get();
    	return $major;
    }
}
