<?php

namespace App\Http\Controllers\site_controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\User\UserProfileModel;
use Alert;
use DB;
use App\Mail\Site_Mail\User_Mail\User_Contact_Us;
use Mail;
class SiteController extends Controller
{
  public function viewHome(){

  $obj =  new UserProfileModel();
  $get_reviews = $obj->get_all_candidate_reviews();

  // echo "<pre>";
  // print_r($get_reviews);

   return view('client_views.main_site.home',['get_reviews' => $get_reviews]);
 }

 public function viewContactUs(){

   return view('client_views.main_site.contact_us');
 }

 public function doContactUs(Request $request){

  $current_date = date("Y.m.d h:i:s");

  $response = array(
    'candidate_name' => $request->candidate_name,
    'candidate_email' => $request->candidate_email,
    'candidate_phone' => $request->candidate_number,
    'candidate_subject' => $request->candidate_subject,
    'candidate_message' => $request->candidate_message,
    'created_at' => $current_date
  );


  $data = DB::table('user_contact_us')->insert($response);


  if($data){

    echo  "yes";
  }
  else{

   echo   "no";

 }   


}



public function dosendEmailContactUs(Request $request){

      //echo 'asad';
  Mail::send(new User_Contact_Us());


}

public function viewFaq(){

 return view('client_views.main_site.faq');
}

public function viewPageNotFound(){

    //Alert::message('Robots are working!');
    //alert()->error('Error Message', 'Optional Title');
  return view('client_views.main_site.page_not_found');
}

public function view_session(Request $request){

  $data = $request->session()->all();
  echo "<pre>";
  print_r($data);
}

public function viewAboutUs(){

  return view('client_views.main_site.about_us');
}



}
