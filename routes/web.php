<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('client_views/home');
});*/


   // Site Controller Work   //

Route::get('/',"site_controllers\SiteController@viewHome");
Route::get('contact-us',"site_controllers\SiteController@viewContactUs");
Route::get('faq',"site_controllers\SiteController@viewFaq");

//   Site Controller End-Work  //


//    Site Company Work   //

Route::get('company-registeration',"site_controllers\SiteCompany@viewRegisterCompany");

//   Site Company End-Work  //


//    Site Company Login Work   //

Route::get('company-login',"site_controllers\SiteCompanyLogin@viewCompanyLogin");
Route::get('company-forgot-password',"site_controllers\SiteCompanyLogin@viewCompanyForgotPassword");

//   Site Company Login End-Work //


//    Site User-Registeration Work   //

Route::get('user-registeration',"site_controllers\SiteUser@viewRegisterUser");
Route::any('user-registration-process',"site_controllers\SiteUser@doRegisterUser");

//   Site User End-Work //


//    Site User-Login Work   //

Route::get('user-login',"site_controllers\SiteUserLogin@viewUserLogin");
Route::any('do-user-login',"site_controllers\SiteUserLogin@doUserLogin");
Route::get('view-session',"site_controllers\SiteUserLogin@view_session");
Route::get('logout',"site_controllers\SiteUserLogin@logout");
Route::get('user-forgot-password',"site_controllers\SiteUserLogin@viewUserForgotPassword");

//   Site User End-Work //


//    Site Job Controller    //

Route::get('search-jobs',"site_controllers\SiteJobController@viewRelatedJobSearch");
Route::get('all-jobs',"site_controllers\SiteJobController@viewAllJobSearch");

Route::get('check',"site_controllers\SiteJobController@hello");
Route::get('check2',"site_controllers\SiteJobController@hello2");
Route::post('/postajax',"site_controllers\SiteJobController@post");
Route::post('/postajax2',"site_controllers\SiteJobController@post2");
//   Site Job Controller 
