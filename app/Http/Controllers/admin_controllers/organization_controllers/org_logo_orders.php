<?php

namespace App\Http\Controllers\admin_controllers\organization_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class org_logo_orders extends Controller
{
    public function viewLogoOrders()
    {  
     $orders=DB::table('company_advertised_logo')->where('company_logo_submitted','1')->get();
     return view('admin_views/organization_views/view_logo_orders',['orders'=>$orders]);
    }

    public function uploadAdvertisedLogo(Request $request){
   // echo $request->vals;
    $ids=explode(",",$request->vals);
    $c_name=$ids[0];
    $c_id=$ids[1];
    $l_id=$ids[2];
    $id=$ids[3];
    $file=$request->file('company_log');
    $current_date = date("Y.m.d");
     $new=date("Y.m.d",strtotime('+30 days'));

    $new_name = $c_name.rand().'.'.$file->getClientOriginalExtension();
		$destination='uploads/company_add_logo';

		if($file->move($destination,$new_name)){
		 $up_logo=array(
		    'company_id'=>$c_id,
		    'company_name'=>$c_name,
		    'company_logo'=>$new_name,
		    'display_start_date'=>$current_date,
		    'display_end_date'=>$new
		    );
		 $update=array(
		 	'company_logo_status'=>"1",
		 );
		 //print_r($up_logo);
		 if(DB::table('advertised_logos')->insert($up_logo)){
		 	DB::table('company_advertised_logo')->where(['company_advertise_id'=>$id])->update($update);
		 	echo "yes";
		 }

		 
		}

   

    }
}
