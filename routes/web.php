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
Route::get('/contact-us',"site_controllers\SiteController@viewContactUs");
Route::post('do-contact-us',"site_controllers\SiteController@doContactUs");
Route::post('do-contact-us-email-send',"site_controllers\SiteController@dosendEmailContactUs");
Route::get('/faq',"site_controllers\SiteController@viewFaq");
Route::get('/about-us',"site_controllers\SiteController@viewAboutUs");
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
Route::any('change_phone_mode',"site_controllers\UserProfile@doChangePhoneStatus");
Route::any('candidate-change-password-from-pofile',"site_controllers\UserProfile@doChangeCandidatePassword");
Route::any('delete-candidate-account-preminently',"site_controllers\UserProfile@dodDeleteCandidateAccount");
Route::any('change-candidate-email',"site_controllers\UserProfile@dodChangeCandidateEmail");
Route::any('do-resent-candidate-email',"site_controllers\UserProfile@doResendCandidateEmail");

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
Route::any('delete-candidate-experience',"site_controllers\UserResume@deleteUserExperience")->middleware('CheckUserProfile');
Route::any('delete-candidate-project',"site_controllers\UserResume@deleteUserProject")->middleware('CheckUserProfile');
Route::any('delete-candidate-skill',"site_controllers\UserResume@deleteUserSkill")->middleware('CheckUserProfile');
Route::any('delete-candidate-hobbey',"site_controllers\UserResume@deleteUserHobbey")->middleware('CheckUserProfile');
Route::any('delete-candidate-languages',"site_controllers\UserResume@deleteUserlanguages")->middleware('CheckUserProfile');



// UPDATE Model Window Function

Route::any('update-candidate-form',"site_controllers\UserResume@updateUserEduction")->middleware('CheckUserProfile');



// UPDATE Eduction

 Route::any('update-candidate-education',"site_controllers\UserResume@updateUserFormEduction")->middleware('CheckUserProfile');

 Route::any('update_candidate_resume_bio',"site_controllers\UserResume@updateUserResumeBio")->middleware('CheckUserProfile');

 Route::any('update_candidate_Personal_Info',"site_controllers\UserResume@updateUserPersonalInfo")->middleware('CheckUserProfile');

Route::any('user_job_match_criteria',"site_controllers\UserResume@candidateJobMatchCriteria")->middleware('CheckUserProfile');


Route::any('update-candidate-experience',"site_controllers\UserResume@updateUserExperience")->middleware('CheckUserProfile');

Route::any('update-experience-model-window',"site_controllers\UserResume@doUpdateUserExperience")->middleware('CheckUserProfile');

Route::any('update-candidate-project',"site_controllers\UserResume@updateUserProject")->middleware('CheckUserProfile');

Route::any('update-project-model-window',"site_controllers\UserResume@doUpdateUserProject")->middleware('CheckUserProfile');

Route::any('update-candidate-skill',"site_controllers\UserResume@updateCandidateSkill")->middleware('CheckUserProfile');

Route::any('update-skill-model-window',"site_controllers\UserResume@doUpdateUserSkill")->middleware('CheckUserProfile');

Route::any('update-candidate-hobbey',"site_controllers\UserResume@updateCandidateHobbey")->middleware('CheckUserProfile');

Route::any('update-hobbey-model-window',"site_controllers\UserResume@doUpdateUserHobbey")->middleware('CheckUserProfile');

Route::any('update-candidate-language',"site_controllers\UserResume@updateCandidateLanguage")->middleware('CheckUserProfile');

Route::any('update-language-model-window',"site_controllers\UserResume@doUpdateCandidateLanguage")->middleware('CheckUserProfile');



//    UserResume Controller    //




Route::get('send',"site_controllers\mail_sender@send");
Route::get('verify-email',"site_controllers\mail_sender@hello");
Route::get('file',"site_controllers\UserResume@index");
Route::get('hello-world',"site_controllers\UserResume@kuchkardo");





//User Details 

// CheckUserLogin => agr to ap login ho to ap ko login pages par nahi janay dy ga wapis osi page par lay ay ga...

// CheckUserProfile => agr to ap login nahi ho or profile access kar rahay ho to 404 error show karay ga...

//CheckUserEmailVerify => agr ap nay email say button click kar diya ha verify ka to ya ap ko again nahi chalny dy ga function or sath may home par redirect kar wah dy ga with alert "already verify" agr nahi karwahaya hova verffiy to ya function chala dy ga


// ----------------------------------------------------------------------


// Company Details

// CheckCompanyLogin => agr to ap login ho to ap ko login pages par nahi janay dy ga wapis osi page par lay ay ga na he register or forgetpassword par janay dy ga na he company kay na he user kay 

//CheckCompanyEmailVerify => agr ap nay email say button click kar diya ha verify ka to ya ap ko again nahi chalny dy ga function or sath may home par redirect kar wah dy ga with alert "already verify" agr nahi karwahaya hova verffiy to ya function chala dy ga
















/*
|--------------------------------------------------------------------------
|  Starting New Route of Admin Panel 
|--------------------------------------------------------------------------
|
| NAYAB Admin Panel All Route Start From Here
| 
|	
|
*/
 


/*    Admin Work   */
//session
Route::get('view-admin-session',"admin_controllers\AdminLogin@viewSession");
//
Route::get('admin-login',"admin_controllers\AdminLogin@viewLoginPage");
Route::post('do-admin-login',"admin_controllers\AdminLogin@doAdminLogin");
Route::get('admin-pass-reset',"admin_controllers\AdminLogin@viewResetPage");
Route::post('reset-email-check',"admin_controllers\AdminLogin@doCheckEmail");
Route::get('admin-dashboard',"admin_controllers\Dashboard@viewIndexPage");
Route::get('admin-register',"admin_controllers\Dashboard@viewRegisterPage");
Route::get('admin-register1',"admin_controllers\Dashboard@viewRegister1Page");
Route::get('admin-do-post',"admin_controllers\cv_controllers\AdminJobPost@viewJobPostForm");
Route::get('log-out',"admin_controllers\Dashboard@logOut");

//Admin  profile
Route::get('admin-profile',"admin_controllers\admin_profile\AdminProfile@viewAdminProfile");
Route::any('update-admin-info',"admin_controllers\admin_profile\AdminProfile@doAdminUpdate");
Route::any('add_new_employee',"admin_controllers\admin_profile\AdminProfile@addNewEmployee");
Route::any('delete-employee',"admin_controllers\admin_profile\AdminProfile@deleteEmployee");
Route::any('block-employee-acc',"admin_controllers\admin_profile\AdminProfile@blockEmployeeAcc");
Route::any('data-table',"admin_controllers\admin_profile\AdminProfile@showData");
Route::any('admin-email-up',"admin_controllers\admin_profile\AdminProfile@adminEmailUpdate");
Route::any('admin-pass-up',"admin_controllers\admin_profile\AdminProfile@adminPasswordUpdate");
Route::any('view-single-employee',"admin_controllers\admin_profile\AdminProfile@viewSingleProfile");
Route::any('edit-single-employee',"admin_controllers\admin_profile\AdminProfile@editSingleProfile");
Route::any('edit-detail-employee',"admin_controllers\admin_profile\AdminProfile@editDetailProfile");
Route::any('do-crop','admin_controllers\admin_profile\AdminProfile@doImgCrop');
Route::any('change-employee-status','admin_controllers\admin_profile\AdminProfile@changeStatus');


//organization routes
Route::get('add-organization',"admin_controllers\organization_controllers\AdminOrganization@addOrganizationForm");

Route::get('view-organization',"admin_controllers\organization_controllers\AdminOrganization@viewRegistedOrganization");
Route::post('delete-check-org',"admin_controllers\organization_controllers\AdminOrganization@deleteCheckOrg");
Route::post('delete-org',"admin_controllers\organization_controllers\AdminOrganization@deleteOrganization");
Route::any('update-org-form',"admin_controllers\organization_controllers\AdminOrganization@updateOrganization");
Route::any('update-company-data',"admin_controllers\organization_controllers\AdminOrganization@updateCompanyData");
Route::any('register-company',"admin_controllers\organization_controllers\AdminOrganization@addCompanyForm");
Route::any('change-org-status',"admin_controllers\organization_controllers\AdminOrganization@changeOrgStatus");


//City
Route::get('view-cities',"admin_controllers\organization_controllers\AddOrganizationCity@viewCitiesPage");
Route::post('adding-company-city',"admin_controllers\organization_controllers\AddOrganizationCity@addCompanyCity");
Route::post('delete-city',"admin_controllers\organization_controllers\AddOrganizationCity@deleteCity");
Route::post('delete-check-cities',"admin_controllers\organization_controllers\AddOrganizationCity@deleteCheckCities");
Route::post('addtable-company-city',"admin_controllers\organization_controllers\AddOrganizationCity@addTableCompanyCity");
Route::any('update-city',"admin_controllers\organization_controllers\AddOrganizationCity@updateCity");
Route::any('request-update-city',"admin_controllers\organization_controllers\AddOrganizationCity@updateModelWindow");


//industries
Route::get('view-industries',"admin_controllers\organization_controllers\AddOrganizationIndustry@viewIndustriesPage");
Route::post('adding-company-industry',"admin_controllers\organization_controllers\AddOrganizationIndustry@addCompanyIndustry");
Route::post('addtable-company-industry',"admin_controllers\organization_controllers\AddOrganizationIndustry@addTableCompanyIndustry");
Route::post('delete-industry',"admin_controllers\organization_controllers\AddOrganizationIndustry@deleteIndustry");
Route::post('delete-check-industries',"admin_controllers\organization_controllers\AddOrganizationIndustry@deleteCheckIndustries");
Route::any('update-industry',"admin_controllers\organization_controllers\AddOrganizationIndustry@updateIndustry");
Route::any('request-update-industry',"admin_controllers\organization_controllers\AddOrganizationIndustry@updateModelIndus");


//company types
Route::get('company-type',"admin_controllers\organization_controllers\AdminOrganization@viewCompanyType");
Route::post('delete-type',"admin_controllers\organization_controllers\AdminOrganization@deleteCompanyType");
Route::post('addtable-company-type',"admin_controllers\organization_controllers\AdminOrganization@addTableCompanyType");
Route::post('delete-check-types',"admin_controllers\organization_controllers\AdminOrganization@deleteCheckCompanyType");
Route::post('adding-company-type',"admin_controllers\organization_controllers\AdminOrganization@addCompanyType");
Route::any('update-type',"admin_controllers\organization_controllers\AdminOrganization@updateType");
Route::any('request-update-type',"admin_controllers\organization_controllers\AdminOrganization@updateModelType");


//qualification
Route::get('view-qualification',"admin_controllers\organization_controllers\QualificationCriteria@viewQualificationPage");
Route::any('addtable-qualification-type',"admin_controllers\organization_controllers\QualificationCriteria@addTableQualification");
Route::any('delete-qual',"admin_controllers\organization_controllers\QualificationCriteria@deleteQual");
Route::any('delete-check-qual',"admin_controllers\organization_controllers\QualificationCriteria@deleteCheckQual");
Route::any('request-update-qual',"admin_controllers\organization_controllers\QualificationCriteria@updateModelQual");
Route::any('update-qual',"admin_controllers\organization_controllers\QualificationCriteria@updateQual");

//majors
Route::get('view-majors',"admin_controllers\organization_controllers\MajorCriteria@viewMajorPage");
Route::any('addtable-major-type',"admin_controllers\organization_controllers\MajorCriteria@addTableMajor");
Route::any('delete-major',"admin_controllers\organization_controllers\MajorCriteria@deleteMajor");
Route::any('delete-check-majors',"admin_controllers\organization_controllers\MajorCriteria@deleteCheckMajor");
Route::any('request-update-major',"admin_controllers\organization_controllers\MajorCriteria@updateModelMajor");
Route::any('update-major',"admin_controllers\organization_controllers\MajorCriteria@updateMajor");

//functional area
Route::get('view-functional-area',"admin_controllers\organization_controllers\FunctionalArea@viewFunctionalAreaPage");
Route::any('addtable-area-type',"admin_controllers\organization_controllers\FunctionalArea@addTableArea");
Route::any('delete-area',"admin_controllers\organization_controllers\FunctionalArea@deleteArea");
Route::any('delete-check-area',"admin_controllers\organization_controllers\FunctionalArea@deleteCheckArea");
Route::any('request-update-area',"admin_controllers\organization_controllers\FunctionalArea@updateModelArea");
Route::any('update-area',"admin_controllers\organization_controllers\FunctionalArea@updateArea");

//Degree level
Route::get('view-degree-level',"admin_controllers\organization_controllers\DegreeLevel@viewDegreeLevelPage");
Route::any('addtable-degree-type',"admin_controllers\organization_controllers\DegreeLevel@addTabledegree");
Route::any('delete-degree',"admin_controllers\organization_controllers\DegreeLevel@deleteDegree");
Route::any('delete-check-degrees',"admin_controllers\organization_controllers\DegreeLevel@deleteCheckDegrees");
Route::any('request-update-degree',"admin_controllers\organization_controllers\DegreeLevel@updateModelDegree");
Route::any('update-degree',"admin_controllers\organization_controllers\DegreeLevel@updateDegree");



//organization profile
Route::get('organization-profile/{id}',"admin_controllers\organization_controllers\OrganizationProfile@viewOrganizationProfile");

Route::prefix('organization-profile')->group(function () {
	Route::any('do-company-post',"admin_controllers\organization_controllers\OrganizationProfile@doCompanyPost");
	Route::any('delete-post',"admin_controllers\organization_controllers\OrganizationProfile@deleteOrgPost");
	Route::any('upload-org-img/{id}',"admin_controllers\organization_controllers\OrganizationProfile@uploadOrgPic");
	Route::any('fetch-cities-preferences-data',"admin_controllers\organization_controllers\OrganizationProfile@fetchCitiesPreferences");
    Route::any('fetch-qual-preferences-data',"admin_controllers\organization_controllers\OrganizationProfile@fetchqualPreferences");
    Route::any('organization-post-data',"admin_controllers\organization_controllers\OrganizationProfile@doCompanyPostData");
    Route::any('update-post',"admin_controllers\organization_controllers\OrganizationProfile@doUpdateProfile");
    Route::any('del-qual-field',"admin_controllers\organization_controllers\OrganizationProfile@delQualFields");
    Route::any('del-city-field',"admin_controllers\organization_controllers\OrganizationProfile@delCityFields");
    Route::any('post-update-data',"admin_controllers\organization_controllers\OrganizationProfile@doUpdatePostData");
    Route::any('view-post-data',"admin_controllers\organization_controllers\OrganizationProfile@viewPostData");
    Route::any('org-pass-up',"admin_controllers\organization_controllers\OrganizationProfile@doOrgUpdatePass");
    Route::any('org-email-up',"admin_controllers\organization_controllers\OrganizationProfile@doOrgUpdateEmail");
    Route::any('fetch_area_majors',"admin_controllers\organization_controllers\OrganizationProfile@doFetchMajors");
    Route::any('change-post-status',"admin_controllers\organization_controllers\OrganizationProfile@changePostStatus");

});

//Registered user view
Route::any('view-registered-users',"admin_controllers\user_controllers\RegisteredUsers@viewRegisteredUsers");
Route::any('change-user-status',"admin_controllers\user_controllers\RegisteredUsers@doChangeStatus");
Route::any('delete-single-user',"admin_controllers\user_controllers\RegisteredUsers@deleteSingleUser");
Route::any('view-single-user',"admin_controllers\user_controllers\RegisteredUsers@viewSingleUser");


//contact us routes

Route::any('view-contactus-page',"admin_controllers\main_controllers\MainController@viewContactUs");
Route::any('view-single-message',"admin_controllers\main_controllers\MainController@viewSingleMessage");
Route::any('reply-single-message',"admin_controllers\main_controllers\MainController@replySingleMessage");


//test work
Route::any('jango','admin_controllers\Dashboard@jango');
Route::any('jango1',function(){
	$name= $_FILES['profileImg']['name'];
	$type= $_FILES['profileImg']['type'];
	$size= $_FILES['profileImg']['size'];
	$tmp_name= $_FILES['profileImg']['tmp_name'];
	$jango="jango/";
	move_uploaded_file($tmp_name, $jango.$name);

});

/*   End Admin Work  */











