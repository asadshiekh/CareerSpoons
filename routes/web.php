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


/*    Site Controller Work   */

Route::get('/',"site_controllers\SiteController@viewHome");
Route::get('contact-us',"site_controllers\SiteController@viewContactUs");
Route::get('faq',"site_controllers\SiteController@viewFaq");

/*   Site Controller End-Work  */


/*    Site Company Work   */

Route::get('company-registeration',"site_controllers\SiteCompany@viewRegisteredCompanies");

/*   Site Company End-Work  */