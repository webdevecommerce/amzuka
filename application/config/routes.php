<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route[''] = "site/landing/homepage";
$route['default_controller'] = "site/landing";
$route['404_override'] = '';

$route[ADMIN_PATH] = ADMIN_PATH."/login";
$route[ADMIN_PATH.'/dashboard'] = ADMIN_PATH."/dashboard/admin_dashboard";


$route['pages/(:any)'] = "site/cms/load_pages";

$route['signup'] = "site/users/registration_form";
$route['dosignup'] = "site/users/do_register";

$route['account-verification/(:any)'] = "site/users/mobile_verification_form";
$route['resend-otp/(:any)'] = "site/users/mobile_otp_resend";
$route['dosignupT'] = "site/users/do_register_temp";

$route['logout'] = "site/users/do_logout";

$route['signin'] = "site/users/login_form";
$route['dosignin'] = "site/users/do_login";

$route['forgot-password'] = "site/users/forgot_password_form";
$route['send-user-reset-password-link'] = "site/users/send_user_reset_password_link";

$route['reset-password/(:any)'] = "site/users/reset_password_form";
$route['update-new-password'] = "site/users/update_new_password";


/* End of file routes.php */
/* Location: ./application/config/routes.php */