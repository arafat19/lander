<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Main';
$route['admin/register'] = "admin/admin_registration";

$route['admin/profile/update'] = "admin/update_admin_user";
$route['admin/password/update'] = "admin/update_admin_password";

$route['admin/country/create'] = "admin/admin_create_lander_country";
$route['admin/country/update/(:any)'] = "admin/admin_update_lander_country/$1";
$route['admin/country/delete/(:any)'] = "admin/admin_delete_lander_country/$1";

$route['admin/slider/image/create'] = "admin/admin_create_lander_slider_image";
$route['admin/slider/image/update/(:any)'] = "admin/admin_update_lander_slider_image/$1";
$route['admin/slider/image/delete/(:any)'] = "admin/admin_delete_lander_slider_image/$1";

$route['admin/device/create'] = "admin/admin_create_device";
$route['admin/device/update/(:any)'] = "admin/admin_update_device/$1";
$route['admin/device/delete/(:any)'] = "admin/admin_delete_device/$1";

$route['admin/last/button/link/create'] = "admin/admin_create_last_btn_link";
$route['admin/last/button/link/update/(:any)'] = "admin/admin_update_last_button_link/$1";
$route['admin/last/button/link/delete/(:any)'] = "admin/admin_delete_last/button/link/$1";

$route['admin/show/applicants'] = "admin/admin_show_applicants";

$route['admin/instructor/photo/update/(:any)'] = "admin/update_instructor_photo/$1";

$route['admin/assign/course/to/instructor/(:any)'] = "admin/admin_assign_course_instructor/$1";


$route['admin/show/sub/district'] = "admin/show_sub_district";
$route['home/show/applicant/sub/district'] = "home/show_applicant_sub_district";
$route['home/edit/applicant/data/(:any)'] = "home/edit_applicant_data/$1";

$route['home/application'] = "home/application_submit";
$route['home/confirm/application/(:any)'] = "home/confirm_applicant_submission/$1";
$route['sign-out'] = "admin/logout";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
