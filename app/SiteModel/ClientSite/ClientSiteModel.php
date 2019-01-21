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

    public function get_all_accounting_jobs(){

        $response = DB::table('organization_posts')->where('req_industry','Accounting_&_Finance')->get();

        if($response->count()>0){
            return $response->count();
        }
        else{
            return $response->count();
        }

    }

    public function get_all_automotive_jobs(){

        $response = DB::table('organization_posts')->where('req_industry','Automotive')->get();

        if($response->count()>0){
            return $response->count();
        }
        else{
            return $response->count();
        }
    }


    public function get_all_business_jobs(){

        $response = DB::table('organization_posts')->where('req_industry','Business')->get();

        if($response->count()>0){
            return $response->count();
        }
        else{
            return $response->count();
        }
    }


    public function get_all_education_jobs(){


        $response = DB::table('organization_posts')->where('req_industry','Education_Training')->get();

        if($response->count()>0){
            return $response->count();
        }
        else{
            return $response->count();
        }

    }


    public function get_all_healthcare_jobs(){

        $response = DB::table('organization_posts')->where('req_industry','Healthcare')->get();

        if($response->count()>0){
            return $response->count();
        }
        else{
            return $response->count();
        }

    }


    public function get_all_RestaurantFood(){

        $response = DB::table('organization_posts')->where('req_industry','Restaurant_Food')->get();

        if($response->count()>0){
            return $response->count();
        }
        else{
            return $response->count();
        }

    }


    public function get_all_Transportation(){

        $response = DB::table('organization_posts')->where('req_industry','Transportation')->get();

        if($response->count()>0){
            return $response->count();
        }
        else{
            return $response->count();
        }

    }


    public function get_all_Telecommunications(){

        $response = DB::table('organization_posts')->where('req_industry','Telecommunications')->get();

        if($response->count()>0){
            return $response->count();
        }
        else{
            return $response->count();
        }
        
    }


    public function get_all_types(){

        $cities=DB::table('company_types')->get();
        return $cities;

    }




}
