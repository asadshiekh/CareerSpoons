<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfile extends Controller
{
  public function viewUserProfile(){

   return view('client_views.user_related_pages.user_profile');
 }

 public function uploadResume(Request $request){

      //  $file = $request->file('resume');
      // // Display File Name
      // echo 'File Name: '.$file->getClientOriginalName();
      // echo '<br>';

      // //Display File Extension
      // echo 'File Extension: '.$file->getClientOriginalExtension();
      // echo '<br>';

      // //Display File Real Path
      // echo 'File Real Path: '.$file->getRealPath();
      // echo '<br>';

      // //Display File Size
      // echo 'File Size: '.$file->getSize();
      // echo '<br>';

      // //Display File Mime Type
      // echo 'File Mime Type: '.$file->getMimeType();

      // // Move Uploaded File
      // $destinationPath = 'uploads';
      // $file->move($destinationPath,$file->getClientOriginalName());

  $file = $request->file('resume');
 
  $new_name = rand().'.'.$file->getClientOriginalName();
  $destination='uploads/user_upload_resume';
  if($file->move($destination,$new_name)){
   
    

  }





}



}
