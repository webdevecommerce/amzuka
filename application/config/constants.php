<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');
/*
|--------------------------------------------------------------------------
| Table Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with Session
|
*/

define('APPNAMES',								'J2V');
define('ADMIN_PATH',							'host');

/*
|--------------------------------------------------------------------------
| Table Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with database
|
*/

define('ADMIN',								'admin');
define('ADMIN_SETTINGS',			'admin_settings');
define('SLIDER',							'slider');
define('PRODUCT',							'product');
define('CATEGORIES',					'categories');
define('USERS',								'users');
define('CMS',									'cms');
define('SUBADMIN',						'subadmin');
define('E_TEMPLATE',					'email_template');
define('SUBSCRIPTION_LIST',		'subscribers_list');
define('PROMOCODES',					'promocodes');
define('ORDERS',							'orders');
define('OPTIONS',							'options');
define('OPTIONS_VALUES',			'options_values');
define('FILTERVALUES',			'filter_values');

/*
|--------------------------------------------------------------------------
| Path modes
|--------------------------------------------------------------------------
|
| These modes are used when working image path
|
*/
define('SLIDER_PATH',							'images/slider/');
define('SLIDER_DEFAULT',					'images/slider/default.jpg');

define('CATEGORY_PATH',						'images/category/');
define('CATEGORY_DEFAULT',				'images/category/default.png');

define('PROFILE_PATH',						'images/profile/');
define('PROFILE_DEFAULT',					'images/profile/default.png');

define('PROVIDER_IMAGE_PATH',			'images/provider/');
define('PROVIDER_IMAGE_DEFAULT',	'images/provider/default.png');

/* End of file constants.php */
/* Location: ./application/config/constants.php */