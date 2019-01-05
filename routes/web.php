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
Route::post('do-contact-us',"site_controllers\SiteController@doContactUs");
Route::post('do-contact-us-email-send',"site_controllers\SiteController@dosendEmailContactUs");
Route::get('faq',"site_controllers\SiteController@viewFaq");
Route::get('about-us',"site_controllers\SiteController@viewAboutUs");
Route::get('page-not-found',"site_controllers\SiteController@viewPageNotFound");
Route::get('view-session',"site_controllers\SiteController@view_session");
Route::get('view-company-session',"site_controllers\SiteController@viewCompanysession");
//   Site Controller End-Work  //


//    Site Company Work   //
Route::group(['middleware'=>'CheckComapnyLogin','middleware'=>'CheckUserLogin'],function(){
Route::get('company-registeration',"site_controllers\SiteCompany@viewRegisterCompany");
Route::any('company-registeration-process',"site_controllers\SiteCompany@doRegisterCompany");
Route::any('company-registration-email-send',"site_controllers\SiteCompany@sendCompanyRegisterationEmail");
});
//   Site Company End-Work  //




/*---------------------------------------------------------------------------------------*/

//    Site Company Login Work   //
Route::group(['middleware'=>'CheckComapnyLogin','middleware'=>'CheckUserLogin'],function(){


Route::get('company-login',"site_controllers\SiteCompanyLogin@viewCompanyLogin");
Route::any('do-company-login',"site_controllers\SiteCompanyLogin@doCompanyLogin");
Route::get('company-forgot-password',"site_controllers\SiteCompanyLogin@viewCompanyForgotPassword");

});
Route::get('company-logout',"site_controllers\SiteCompanyLogin@companyLogout")->middleware('CheckCompanyProfile');

//   Site Company Login End-Work //


/*---------------------------------------------------------------------------------------*/


//    CompanyEmailVerification Controller    //
Route::get('company-email-verification/{email}',"site_controllers\CompanyEmailVerification@organizationEmailVerification")->middleware('CheckCompanyEmailVerify');
//   CompanyEmailVerification Controller //



/*---------------------------------------------------------------------------------------*/


//    Site User-Registeration Work   //
Route::group(['middleware'=>'CheckUserLogin','middleware'=>'CheckComapnyLogin'],function(){


Route::get('user-registeration',"site_controllers\SiteUser@viewRegisterUser");
Route::any('user-registration-process',"site_controllers\SiteUser@doRegisterUser");
Route::any('user-registration-email-send',"site_controllers\SiteUser@sendUserRegisterationEmail");


});
//   Site User End-Work //

Route::get('skill',"site_controllers\UserProfile@skill_tester");

/*---------------------------------------------------------------------------------------*/

//    Site User-Login Work   //
Route::group(['middleware'=>'CheckUserLogin','middleware'=>'CheckComapnyLogin'],function(){

Route::get('user-login',"site_controllers\SiteUserLogin@viewUserLogin");
Route::any('do-user-login',"site_controllers\SiteUserLogin@doUserLogin");


Route::get('user-forgot-password',"site_controllers\SiteUserLogin@viewUserForgotPassword");
Route::any('verify-candidate-email',"site_controllers\SiteUserLogin@verifyCandidateEmail");
Route::get('create-candidate-password',"site_controllers\SiteUserLogin@viewCreateNewPassword");
Route::any('update-candidate-password',"site_controllers\SiteUserLogin@updateCandidatePassword");
Route::any('send-candidate-email',"site_controllers\SiteUserLogin@sendCandidateForgetEmail");



});

Route::get('logout',"site_controllers\SiteUserLogin@logout")->middleware('CheckUserProfile');
//   Site User End-Work //





//    Site Job Controller    //
Route::get('search-jobs',"site_controllers\SiteJobController@viewRelatedJobSearch");
Route::get('all-jobs',"site_controllers\SiteJobController@viewAllJobSearch");
//   Site Job Controller //

//   UserProfile Controller    //
Route::group(['middleware'=>'CheckUserProfile'],function(){

Route::get('user-profile',"site_controllers\UserProfile@viewUserProfile");
Route::get('user-public-profile',"site_controllers\UserProfile@viewUserPublicProfile");
Route::any('update-user-profile-pic',"site_controllers\UserProfile@updateUserProfilePic");
Route::any('update-user-cover-pic',"site_controllers\UserProfile@updateUserCoverPic");
Route::any('update-social-links',"site_controllers\UserProfile@updateSocialLinks");
Route::any('candidate-rating',"site_controllers\UserProfile@rateproduct");
});
//   UserProfile Controller //


//    UserEmailVerification Controller    //
Route::get('candidate-email-verification/{email}',"site_controllers\UserEmailVerification@candidateEmailVerification")->middleware('CheckUserEmailVerify');
//   UserEmailVerification Controller //


//    UserResume Controller    //

//Add 
Route::any('upload-resume',"site_controllers\UserResume@uploadResume")->middleware('CheckUserProfile');
Route::get('make-user-resume',"site_controllers\UserResume@manageUserResume")->middleware('CheckUserProfile');
Route::any('add-user-education',"site_controllers\UserResume@addUserEduction")->middleware('CheckUserProfile');
Route::any('add-user-experience',"site_controllers\UserResume@addUserExperience")->middleware('CheckUserProfile');
Route::any('add-user-project',"site_controllers\UserResume@addUserProject")->middleware('CheckUserProfile');
Route::any('add-user-skill',"site_controllers\UserResume@addUserSkill")->middleware('CheckUserProfile');
Route::any('add-user-language',"site_controllers\UserResume@addUserLanguage")->middleware('CheckUserProfile');
Route::any('add-user-hobbies',"site_controllers\UserResume@addUserHobbies")->middleware('CheckUserProfile');
Route::any('add-user-resume-info',"site_controllers\UserResume@addUserResumeInfo")->middleware('CheckUserProfile');

//DELETE

Route::any('delete-candidate-education',"site_controllers\UserResume@deleteUserEduction")->middleware('CheckUserProfile');


// UPDATE Model Window Function

Route::any('update-candidate-form',"site_controllers\UserResume@updateUserEduction")->middleware('CheckUserProfile');

// UPDATE Eduction

 Route::any('update-candidate-education',"site_controllers\UserResume@updateUserFormEduction")->middleware('CheckUserProfile');

 Route::any('update_candidate_resume_bio',"site_controllers\UserResume@updateUserResumeBio")->middleware('CheckUserProfile');

 Route::any('update_candidate_Personal_Info',"site_controllers\UserResume@updateUserPersonalInfo")->middleware('CheckUserProfile');

Route::any('user_job_match_criteria',"site_controllers\UserResume@candidateJobMatchCriteria")->middleware('CheckUserProfile');




//    UserResume Controller    //

Route::get('send',"site_controllers\mail_sender@send");
Route::get('verify-email',"site_controllers\mail_sender@hello");
Route::get('file',"site_controllers\UserResume@index");




//User Details 

// CheckUserLogin => agr to ap login ho to ap ko login pages par nahi janay dy ga wapis osi page par lay ay ga...

// CheckUserProfile => agr to ap login nahi ho or profile access kar rahay ho to 404 error show karay ga...

//CheckUserEmailVerify => agr ap nay email say button click kar diya ha verify ka to ya ap ko again nahi chalny dy ga function or sath may home par redirect kar wah dy ga with alert "already verify" agr nahi karwahaya hova verffiy to ya function chala dy ga


// ----------------------------------------------------------------------


// Company Details

// CheckCompanyLogin => agr to ap login ho to ap ko login pages par nahi janay dy ga wapis osi page par lay ay ga na he register or forgetpassword par janay dy ga na he company kay na he user kay 

//CheckCompanyEmailVerify => agr ap nay email say button click kar diya ha verify ka to ya ap ko again nahi chalny dy ga function or sath may home par redirect kar wah dy ga with alert "already verify" agr nahi karwahaya hova verffiy to ya function chala dy ga
