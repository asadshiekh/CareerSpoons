<?php

namespace App\Http\Controllers\admin_controllers\cv_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ManageResumeTemplate extends Controller
{
    public function viewCVManagePage(Request $request){
    	return view("admin_views.cv_views.upload_cv_temp");
    }
    public function addResumeTemp(Request $request){
    	// echo "<pre>";
    	// print_r($request->all());
    	// echo "</pre>";
    	$current_date = date("Y.m.d h:i:s");
    	$title=$request->post("temp_title");
    	$info=$request->post("temp_info");
    	$index_file=$request->file("index_file");
    	$css_file=$request->file("css_file");
    	$banner_file=$request->file("banner_file");
    	$randam=rand();
    	$index=$this->upload_files($index_file,$randam);
    	$css=$this->upload_files_css($css_file,$randam);
    	$banner=$this->upload_files($banner_file,$randam);
        $resume=array(
        'temp_title'=>$title,
        'temp_info'=>$info,
        'index_page'=>$index,
        'css_page'=>$css,
        'cover_img'=>$banner,
        'template_folder'=>$randam,
        'created_at'=>$current_date,
		'updated_at'=>$current_date,
        );
        if(DB::table('resume_templates')->insert($resume)){
         return redirect('view-cv-manage-page')->with('success','Resume Added Successfully!');
        }else{
        	 return redirect('view-cv-manage-page')->with('error','Try Again!');
        }
    }


    public function upload_files($file,$randam){


		$new_name = rand().'.'.$file->getClientOriginalName();
		$destination='uploads/cv_temp/'.$randam;
		$file->move($destination,$new_name);
        return $new_name;
    }
    public function upload_files_css($file,$randam){
        $new_name = $file->getClientOriginalName();
        $destination='uploads/cv_temp/'.$randam;
        $file->move($destination,$new_name);
        return $new_name;
    }
    public function showPreviewTemplate(){
    
    }
}
