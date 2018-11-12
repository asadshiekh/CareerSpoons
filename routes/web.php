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

Route::get('admin-login',"admin_controllers\AdminLogin@viewLoginPage");
Route::post('do-admin-login',"admin_controllers\AdminLogin@doAdminLogin");
Route::get('admin-dashboard',"admin_controllers\Dashboard@viewIndexPage");
Route::get('admin-register',"admin_controllers\Dashboard@viewRegisterPage");
Route::get('admin-register1',"admin_controllers\Dashboard@viewRegister1Page");
Route::get('admin-do-post',"admin_controllers\cv_controllers\AdminJobPost@viewJobPostForm");
//organization routes
Route::get('add-organization',"admin_controllers\organization_controllers\AdminOrganization@addOrganizationForm");

Route::get('view-organization',"admin_controllers\organization_controllers\AdminOrganization@viewRegistedOrganization");
Route::post('delete-check-org',"admin_controllers\organization_controllers\AdminOrganization@deleteCheckOrg");
Route::post('delete-org',"admin_controllers\organization_controllers\AdminOrganization@deleteOrganization");
Route::post('adding-company-type',"admin_controllers\organization_controllers\AdminOrganization@addCompanyType");
Route::post('adding-company-city',"admin_controllers\organization_controllers\AddOrganizationCity@addCompanyCity");
Route::post('delete-city',"admin_controllers\organization_controllers\AddOrganizationCity@deleteCity");
Route::post('delete-check-cities',"admin_controllers\organization_controllers\AddOrganizationCity@deleteCheckCities");
Route::post('addtable-company-city',"admin_controllers\organization_controllers\AddOrganizationCity@addTableCompanyCity");
Route::post('adding-company-industry',"admin_controllers\organization_controllers\AddOrganizationIndustry@addCompanyIndustry");
Route::post('addtable-company-industry',"admin_controllers\organization_controllers\AddOrganizationIndustry@addTableCompanyIndustry");
Route::post('delete-industry',"admin_controllers\organization_controllers\AddOrganizationIndustry@deleteIndustry");
Route::post('delete-check-industries',"admin_controllers\organization_controllers\AddOrganizationIndustry@deleteCheckIndustries");
// Route::post('register-company',"admin_controllers\organization_controllers\AdminOrganization@addCompanyForm");
Route::get('company-type',"admin_controllers\organization_controllers\AdminOrganization@viewCompanyType");
Route::post('delete-type',"admin_controllers\organization_controllers\AdminOrganization@deleteCompanyType");
Route::post('addtable-company-type',"admin_controllers\organization_controllers\AdminOrganization@addTableCompanyType");
Route::post('delete-check-types',"admin_controllers\organization_controllers\AdminOrganization@deleteCheckCompanyType");

Route::get('view-cities',"admin_controllers\organization_controllers\AddOrganizationCity@viewCitiesPage");
Route::get('view-industries',"admin_controllers\organization_controllers\AddOrganizationIndustry@viewIndustriesPage");

// Route::get('view-organization-profile',"admin_controllers\organization_controllers\OrganizationProfile@viewOrganizationProfile");
/*   End Admin Work  */

Route::post('full-form',"admin_controllers\Dashboard@fullformdata");

Route::any('jango','admin_controllers\Dashboard@jango');
Route::any('jango1',function(){
	$name= $_FILES['profileImg']['name'];
	$type= $_FILES['profileImg']['type'];
	$size= $_FILES['profileImg']['size'];
	$tmp_name= $_FILES['profileImg']['tmp_name'];
	$jango="jango/";
	move_uploaded_file($tmp_name, $jango.$name);

});
Route::any('register-company',"admin_controllers\organization_controllers\AdminOrganization@addCompanyForm");

Route::get('organization-profile/{id}',"admin_controllers\organization_controllers\OrganizationProfile@viewOrganizationProfile");

Route::prefix('organization-profile')->group(function () {
	Route::any('do-company-post',"admin_controllers\organization_controllers\OrganizationProfile@doCompanyPost");
	Route::any('delete-post',"admin_controllers\organization_controllers\OrganizationProfile@deleteOrgPost");
	Route::any('upload-org-img/{id}',"admin_controllers\organization_controllers\OrganizationProfile@uploadOrgPic");
});
