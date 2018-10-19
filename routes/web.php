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
Route::get('add-organization',"admin_controllers\AdminOrganization@addOrganizationForm");
Route::get('view-organization',"admin_controllers\AdminOrganization@viewRegistedOrganization");
Route::get('adding-company-type',"admin_controllers\AdminOrganization@addCompanyType");
/*   End Admin Work  */
