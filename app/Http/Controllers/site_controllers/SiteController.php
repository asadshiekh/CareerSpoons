<?php

namespace App\Http\Controllers\site_controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
class SiteController extends Controller
{
  public function viewHome(){

   return view('client_views.main_site.home');
 }

 public function viewContactUs(){

   return view('client_views.main_site.contact_us');
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


}
