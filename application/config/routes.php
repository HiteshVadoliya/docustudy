<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['admin'] = ADMIN.'Login';
$route['admin/Product'] = ADMIN.'Product';

/*Salary */
$route[ADMIN.'salary'] = ADMIN."Salary";
$route[ADMIN.'salary/add'] = ADMIN."Salary/showForm";
$route[ADMIN.'salary/edit/(:any)'] = ADMIN."Salary/showForm/$1";
$route[ADMIN.'salary/save'] = ADMIN."Salary/save";


/*Demo*/
$route['admin/manage-demo'] = ADMIN.'Demo';
$route['admin/add-demo'] = ADMIN.'Demo/add_demo';
$route['admin/add-demo/(:any)'] = ADMIN.'Demo/add_demo/$1';
/*Demo*/
/*Story*/
$route['admin/manage-story'] = ADMIN.'Story';
$route['admin/add-story'] = ADMIN.'Story/add_story';
$route['admin/add-story/(:any)'] = ADMIN.'Story/add_story/$1';
/*Story*/

/*faq*/
$route['admin/manage-faq'] = ADMIN.'Faq';
$route['admin/add-faq'] = ADMIN.'Faq/add_faq';
$route['admin/add-faq/(:any)'] = ADMIN.'Faq/add_faq/$1';
/*faq*/

/*Users*/
$route['admin/manage-users'] = ADMIN.'Users';
$route['admin/view-users/(:any)'] = ADMIN.'Users/view_details/$1';
//$route['admin/add-users'] = ADMIN.'Users/add_demo';
// $route['admin/add-users/(:any)'] = ADMIN.'Users/add_demo/$1';
/*Users*/

$route['admin/manage-documents'] = ADMIN.'Documents';
$route['admin/manage-documents/(:any)'] = ADMIN.'Documents/view_details/$1';

/*newsletter*/
$route['admin/newsletter'] = ADMIN.'Contact/newsletter';
/*newsletter*/

/*social*/
$route['admin/social-media'] = ADMIN.'Content/social_media';
/*social*/

/*content*/
$route['admin/manage-terms'] = ADMIN.'Content/terms';
$route['admin/manage-privacy'] = ADMIN.'Content/privacy';
$route['admin/manage-cookie-statement'] = ADMIN.'Content/cookie';
$route['admin/manage-about'] = ADMIN.'Content/about';
$route['admin/manage-who-we-are'] = ADMIN.'Content/who_we_are';
$route['admin/manage-what-we-do'] = ADMIN.'Content/what_we_do';
// $route['admin/manage-howitworks'] = ADMIN.'Content/howitworks';
/*content*/


$route['profile'] = FRONTEND.'Profile/index';

$route['about'] = FRONTEND.'CMS/about';
$route['terms'] = FRONTEND.'CMS/terms';
$route['privacy-policy'] = FRONTEND.'CMS/privacy_policy';
$route['payment'] = FRONTEND.'CMS/payment';
// $route['profile'] = FRONTEND.'CMS/profile';
$route['compare-list'] = FRONTEND.'CMS/compare_list';
$route['details-page'] = FRONTEND.'CMS/details_page';
$route['cookie-statement'] = FRONTEND.'CMS/cookie_statement';
$route['who-we-are'] = FRONTEND.'CMS/who_we_are';
$route['what-we-do'] = FRONTEND.'CMS/what_we_do';
$route['contact'] = FRONTEND.'CMS/contact';
$route['faq'] = FRONTEND.'CMS/faq';

$route['login'] = FRONTEND.'Login/login';
$route['confirm-account/(:any)'] = FRONTEND.'Login/confirm_account/$1';
$route['forgot-password'] = FRONTEND.'Login/forgot_Password';
$route['reset-password/(:any)'] = FRONTEND.'Login/ResetPassword/$1';
$route['change-password'] = FRONTEND.'Login/change_Password';

$route['documents'] = FRONTEND.'Document';
$route['document/(:any)'] = FRONTEND.'Document/doc_detail/$1';
$route['search'] = FRONTEND.'Document/index';




$route['html/home'] = 'Pages/home';

// Front End End
$route['404_override'] = 'NotFoundController';
$route['404'] = 'NotFoundController';
$route['translate_uri_dashes'] = FALSE;