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
|	https://codeigniter.com/userguide3/general/routing.html
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
//========================Deduction Module=====================================
$route['delete_deduction/(:any)/(:any)/(:any)/(:any)'] = 'pages/delete_deduction/$1/$2/$3/$4';
$route['save_deduction'] = 'pages/save_deduction';
$route['manage_deduction/(:any)/(:any)'] = 'pages/manage_deduction/$1/$2';
//========================Payroll Module=======================================
$route['payroll_summary/(:any)'] = 'pages/payroll_summary/$1';
$route['unpost_payroll/(:any)'] = 'pages/unpost_payroll/$1';
$route['delete_payrollperiod/(:any)'] = 'pages/delete_payrollperiod/$1';
$route['save_payrollperiod'] = 'pages/save_payrollperiod';
$route['payroll_manager/(:any)'] = 'pages/payroll_manager/$1';
$route['post_payroll'] = 'pages/post_payroll';
$route['create_payroll'] = 'pages/create_payroll';
$route['manage_payroll'] = 'pages/manage_payroll';
//========================Trainee Module=======================================
$route['view_advances/(:any)'] = 'pages/view_advances/$1';
$route['delete_advances/(:any)/(:any)'] = 'pages/delete_advances/$1/$2';
$route['save_advances'] = 'pages/save_advances';
$route['manage_advances'] = 'pages/manage_advances';
//========================Trainee Module=======================================
$route['delete_expenses/(:any)/(:any)'] = 'pages/delete_expenses/$1/$2';
$route['save_expenses'] = 'pages/save_expenses';
$route['manage_expenses'] = 'pages/manage_expenses';
//========================Trainee Module=======================================
$route['delete_users/(:any)/(:any)'] = 'pages/delete_users/$1/$2';
$route['save_users'] = 'pages/save_users';
$route['manage_users'] = 'pages/manage_users';
//========================Trainee Module=======================================
$route['delete_trainee/(:any)/(:any)'] = 'pages/delete_trainee/$1/$2';
$route['save_trainee'] = 'pages/save_trainee';
$route['manage_trainee'] = 'pages/manage_trainee';
//========================Employee Module=======================================
$route['delete_employee/(:any)/(:any)'] = 'pages/delete_employee/$1/$2';
$route['save_employee'] = 'pages/save_employee';
$route['manage_employee'] = 'pages/manage_employee';
//========================Agent Module=======================================
$route['delete_agent/(:any)/(:any)'] = 'pages/delete_agent/$1/$2';
$route['save_agent'] = 'pages/save_agent';
$route['manage_agent'] = 'pages/manage_agent';
//============================================================================
//========================Designation Module=======================================
$route['delete_designation/(:any)/(:any)'] = 'pages/delete_designation/$1/$2';
$route['save_designation'] = 'pages/save_designation';
$route['manage_designation'] = 'pages/manage_designation';
//============================================================================
//========================Branch Module=======================================
$route['delete_branch/(:any)/(:any)'] = 'pages/delete_branch/$1/$2';
$route['save_branch'] = 'pages/save_branch';
$route['manage_branch'] = 'pages/manage_branch';
//============================================================================
$route['print_enrollee'] = 'pages/print_enrollee';
$route['search_expenses'] = 'pages/search_expenses';
$route['search_trainee'] = 'pages/search_trainee';
$route['logout'] = 'pages/logout';
$route['main'] = 'pages/main';
$route['authenticate'] = 'pages/authenticate';
$route['default_controller'] = 'pages/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
