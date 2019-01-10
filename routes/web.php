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

/*    Admin Work   */
//session
Route::get('view-session',"admin_controllers\AdminLogin@viewSession");
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

