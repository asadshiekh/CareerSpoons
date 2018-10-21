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
Route::get('admin-dashboard',"admin_controllers\Dashboard@viewIndexPage");
Route::get('admin-register',"admin_controllers\Dashboard@viewRegisterPage");
Route::get('admin-register1',"admin_controllers\Dashboard@viewRegister1Page");
Route::get('admin-do-post',"admin_controllers\cv_controllers\AdminJobPost@viewJobPostForm");
//organization routes
Route::get('add-organization',"admin_controllers\organization_controllers\AdminOrganization@addOrganizationForm");
Route::get('view-organization',"admin_controllers\organization_controllers\AdminOrganization@viewRegistedOrganization");
Route::get('adding-company-type',"admin_controllers\organization_controllers\AdminOrganization@addCompanyType");
Route::get('adding-company-city',"admin_controllers\organization_controllers\AddOrganizationCity@addCompanyCity");
Route::get('adding-company-industry',"admin_controllers\organization_controllers\AddOrganizationIndustry@addCompanyIndustry");
Route::post('register-company',"admin_controllers\organization_controllers\AdminOrganization@addCompanyForm");
Route::get('company-type',"admin_controllers\organization_controllers\AdminOrganization@viewCompanyType");
Route::get('view-cities',"admin_controllers\organization_controllers\AddOrganizationCity@viewCitiesPage");
Route::get('view-industries',"admin_controllers\organization_controllers\AddOrganizationIndustry@viewIndustriesPage");
Route::get('organization-profile',"admin_controllers\organization_controllers\OrganizationProfile@viewOrganizationProfile");
// Route::get('view-organization-profile',"admin_controllers\organization_controllers\OrganizationProfile@viewOrganizationProfile");
/*   End Admin Work  */
