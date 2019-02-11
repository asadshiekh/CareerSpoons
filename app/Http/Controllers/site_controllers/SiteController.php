<?php

namespace App\Http\Controllers\site_controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\User\UserProfileModel;
use App\SiteModel\ClientSite\ClientSiteModel;
use App\Mail\Site_Mail\User_Mail\User_Contact_Us;
use Alert;
use DB;
use Mail;
class SiteController extends Controller
{
  public function viewHome(){

  $obj =  new UserProfileModel();
  $get_reviews = $obj->get_all_candidate_reviews();
  $org_reviews = $obj->get_all_org_reviews();
  $obj1 = new ClientSiteModel();
  $get_cities = $obj1->get_all_cities();
  $get_AccountingFinance = $obj1->get_all_accounting_jobs();
  $get_Automotive = $obj1->get_all_automotive_jobs();
  $get_business = $obj1->get_all_business_jobs();
  $get_eduction = $obj1->get_all_education_jobs();
  $get_healthcare = $obj1->get_all_healthcare_jobs();
  $get_RestaurantFood = $obj1->get_all_RestaurantFood();
  $get_Transportation = $obj1->get_all_Transportation();
  $get_Telecommunications = $obj1->get_all_Telecommunications();
  
   //echo "<pre>";
   //print_r($get_AccountingFinance);

  return view('client_views.main_site.home',['get_reviews' => $get_reviews,'get_cities'=>$get_cities,'get_AccountingFinance'=>$get_AccountingFinance,'get_Automotive'=>$get_Automotive,'get_business'=>$get_business,'get_eduction'=>$get_eduction,'get_healthcare'=>$get_healthcare,'get_RestaurantFood'=>$get_RestaurantFood,'get_Transportation'=>$get_Transportation,'get_Telecommunications'=>$get_Telecommunications,'org_reviews'=>$org_reviews]);
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

$faq=DB::table('frequently_asked_questions')->get();
 return view('client_views.main_site.faq',['faq'=>$faq]);
}

public function viewPageNotFound(){

    //Alert::message('Robots are working!');
    //alert()->error('Error Message', 'Optional Title');
  $about=DB::table('about_us_content')->first();
  return view('client_views.main_site.page_not_found',['about'=>$about]);
}

public function view_session(Request $request){

  $data = $request->session()->all();
  echo "<pre>";
  print_r($data);
}

public function viewAboutUs(){
  $about=DB::table('about_us_content')->first();
  return view('client_views.main_site.about_us',['about'=>$about]);
}



}
