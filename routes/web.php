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

   // Site Controller Work //  
Route::get('/',"site_controllers\SiteController@viewHome");
Route::get('contact-us',"site_controllers\SiteController@viewContactUs");
Route::get('faq',"site_controllers\SiteController@viewFaq");
Route::get('page-not-found',"site_controllers\SiteController@viewPageNotFound");
Route::get('view-session',"site_controllers\SiteController@view_session");
//   Site Controller End-Work  //


//    Site Company Work   //
Route::get('company-registeration',"site_controllers\SiteCompany@viewRegisterCompany");
Route::any('company-registeration-process',"site_controllers\SiteCompany@doRegisterCompany");
//   Site Company End-Work  //


//    Site Company Login Work   //
Route::get('company-login',"site_controllers\SiteCompanyLogin@viewCompanyLogin");
Route::get('company-forgot-password',"site_controllers\SiteCompanyLogin@viewCompanyForgotPassword");
//   Site Company Login End-Work //


//    Site User-Registeration Work   //
Route::group(['middleware'=>'CheckUserLogin'],function(){
Route::get('user-registeration',"site_controllers\SiteUser@viewRegisterUser");
Route::any('user-registration-process',"site_controllers\SiteUser@doRegisterUser");
});
//   Site User End-Work //

//    Site User-Login Work   //
Route::group(['middleware'=>'CheckUserLogin'],function(){
Route::get('user-login',"site_controllers\SiteUserLogin@viewUserLogin");
Route::any('do-user-login',"site_controllers\SiteUserLogin@doUserLogin");
Route::get('user-forgot-password',"site_controllers\SiteUserLogin@viewUserForgotPassword");
});
Route::get('logout',"site_controllers\SiteUserLogin@logout")->middleware('CheckUserProfile');
//   Site User End-Work //


//    Site Job Controller    //
Route::get('search-jobs',"site_controllers\SiteJobController@viewRelatedJobSearch");
Route::get('all-jobs',"site_controllers\SiteJobController@viewAllJobSearch");
//   Site Job Controller //

//   UserProfile Controller    //
Route::group(['middleware'=>'CheckUserProfile'],function(){

Route::get('user-profile/{name}',"site_controllers\UserProfile@viewUserProfile");

});
//   UserProfile Controller //


//    UserEmailVerification Controller    //
Route::get('candidate-email-verification/{email}',"site_controllers\UserEmailVerification@candidateEmailVerification");
//   UserEmailVerification Controller //

Route::get('send',"site_controllers\mail_sender@send");
Route::get('verify-email',"site_controllers\mail_sender@hello");


// CheckUserLogin => agr to ap login ho to ap ko login pages par nahi janay dy ga wapis osi page par lay ay ga...
// CheckUserProfile => agr to ap login nahi ho or profile access kar rahay ho to 404 error show karay ga...