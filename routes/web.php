<?php



/*    Site Controller Work   */

Route::get('/',"site_controllers\SiteController@viewHome");
Route::get('contact-us',"site_controllers\SiteController@viewContactUs");
Route::get('faq',"site_controllers\SiteController@viewFaq");

/*   Site Controller End-Work  */


/*    Site Company Work   */

Route::get('company-registeration',"site_controllers\SiteCompany@viewRegisteredCompanies");

/*   Site Company End-Work  */



/*    Admin Work   */

Route::get('admin-login',"admin_controllers\AdminLogin@viewLoginPage");
Route::get('admin-dashboard',"admin_controllers\Dashboard@viewIndexPage");
Route::get('admin-register',"admin_controllers\Dashboard@viewRegisterPage");
Route::get('admin-register1',"admin_controllers\Dashboard@viewRegister1Page");
Route::get('add-organization',"admin_controllers\AdminOrganization@addOrganizationForm");


/*   End Admin Work  */

