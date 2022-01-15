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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;


/*
| Admin Routes
*/

/* Admin Authentication */

$route[ADMIN_FOLDER.'/login'] = 'tecadmin/auth/login';
// $route[ADMIN_FOLDER.'/qlogin'] = 'tecadmin/auth/qlogin';
$route[ADMIN_FOLDER.'/submit_login'] = 'tecadmin/auth/login_submit';
// $route[ADMIN_FOLDER.'/qsubmit_login'] = 'tecadmin/auth/qsubmit_login';
$route[ADMIN_FOLDER.'/logout'] = 'tecadmin/auth/logout';


// Disabled registration feature for admin
// $route[ADMIN_FOLDER.'/register'] = 'tecadmin/auth/register';
// $route[ADMIN_FOLDER.'/submit_register'] = 'tecadmin/auth/register_submit';
// $route[ADMIN_FOLDER.'/activate/(:any)'] = 'tecadmin/auth/activate/$1';
// $route[ADMIN_FOLDER.'/change-password/(:any)'] = 'tecadmin/auth/update_password/$1';
//---------------------//
$route[ADMIN_FOLDER.'/register'] = 'tecadmin/auth/login';
$route[ADMIN_FOLDER.'/submit_register'] = 'tecadmin/auth/login';
$route[ADMIN_FOLDER.'/activate/(:any)'] = 'tecadmin/auth/login';
// //---------------------//
$route[ADMIN_FOLDER.'/forgot'] = 'tecadmin/auth/forgot';
$route[ADMIN_FOLDER.'/submit_forgot'] = 'tecadmin/auth/forgot_submit';
$route[ADMIN_FOLDER.'/recover/(:any)'] = 'tecadmin/auth/recover/$1';
$route[ADMIN_FOLDER.'/submit_recover'] = 'tecadmin/auth/recover_submit';

// /* Dashboard Page */
$route[ADMIN_FOLDER] = 'tecadmin/dashboard/index';
$route[ADMIN_FOLDER.'/dashboard'] = 'tecadmin/dashboard/index';

$route[ADMIN_FOLDER.'/dashboard/chartdata/(:any)'] = 'tecadmin/dashboard/chartdata/$1';

// /* Cms Page */
$route[ADMIN_FOLDER.'/cms'] = 'tecadmin/cms/index';
$route[ADMIN_FOLDER.'/cms/(:num)'] = 'tecadmin/cms/index/$1';
$route[ADMIN_FOLDER.'/cms/add'] = 'tecadmin/cms/add';
$route[ADMIN_FOLDER.'/cms/add/(:num)'] = 'tecadmin/cms/add/$1';
$route[ADMIN_FOLDER.'/cms/add_submit'] = 'tecadmin/cms/add_submit';
$route[ADMIN_FOLDER.'/cms/edit/(:num)'] = 'tecadmin/cms/edit/$1';
$route[ADMIN_FOLDER.'/cms/update'] = 'tecadmin/cms/update';
$route[ADMIN_FOLDER.'/cms/delete/(:num)'] = 'tecadmin/cms/delete/$1';
$route[ADMIN_FOLDER.'/cms/multi-data'] = 'tecadmin/cms/multi_data';
$route[ADMIN_FOLDER.'/cms/copy-data/(:num)'] = 'tecadmin/cms/copy_data/$1';

$route[ADMIN_FOLDER.'/testimonial'] = 'tecadmin/cms/testimonial';
$route[ADMIN_FOLDER.'/testi/delete_testi/(:num)'] = 'tecadmin/cms/delete_testi/$1';
$route[ADMIN_FOLDER.'/testi/update_testi/(:num)'] = 'tecadmin/cms/update_testi/$1';
$route[ADMIN_FOLDER.'/testi/test_update_db'] = 'tecadmin/cms/test_update_db';
// /* Blog categories Page */
$route[ADMIN_FOLDER.'/blog/categories'] = 'tecadmin/blogcategories/index';
$route[ADMIN_FOLDER.'/blog/categories/(:num)'] = 'tecadmin/blogcategories/index/$1';
$route[ADMIN_FOLDER.'/blog/categories/add'] = 'tecadmin/blogcategories/add';
$route[ADMIN_FOLDER.'/blog/categories/add/(:num)'] = 'tecadmin/blogcategories/add/$1';
$route[ADMIN_FOLDER.'/blog/categories/add_submit'] = 'tecadmin/blogcategories/add_submit';
$route[ADMIN_FOLDER.'/blog/categories/edit/(:num)'] = 'tecadmin/blogcategories/edit/$1';
$route[ADMIN_FOLDER.'/blog/categories/update'] = 'tecadmin/blogcategories/update';
$route[ADMIN_FOLDER.'/blog/categories/delete/(:num)'] = 'tecadmin/blogcategories/delete/$1';
$route[ADMIN_FOLDER.'/blog/categories/multi-data'] = 'tecadmin/blogcategories/multi_data';
$route[ADMIN_FOLDER.'/blog/categories/copy-data/(:num)'] = 'tecadmin/blogcategories/copy_data/$1';

// /* Blogs Page */
$route[ADMIN_FOLDER.'/blog'] = 'tecadmin/blog/index';
$route[ADMIN_FOLDER.'/blog/(:num)'] = 'tecadmin/blog/index/$1';
$route[ADMIN_FOLDER.'/blog/add'] = 'tecadmin/blog/add';
$route[ADMIN_FOLDER.'/blog/add/(:num)'] = 'tecadmin/blog/add/$1';
$route[ADMIN_FOLDER.'/blog/add_submit'] = 'tecadmin/blog/add_submit';
$route[ADMIN_FOLDER.'/blog/edit/(:num)'] = 'tecadmin/blog/edit/$1';
$route[ADMIN_FOLDER.'/blog/update'] = 'tecadmin/blog/update';
$route[ADMIN_FOLDER.'/blog/delete/(:num)'] = 'tecadmin/blog/delete/$1';
$route[ADMIN_FOLDER.'/blog/multi-data'] = 'tecadmin/blog/multi_data';
$route[ADMIN_FOLDER.'/blog/copy-data/(:num)'] = 'tecadmin/blog/copy_data/$1';

// /* News categories Page */
$route[ADMIN_FOLDER.'/news/categories'] = 'tecadmin/newscategories/index';
$route[ADMIN_FOLDER.'/news/categories/(:num)'] = 'tecadmin/newscategories/index/$1';
$route[ADMIN_FOLDER.'/news/categories/add'] = 'tecadmin/newscategories/add';
$route[ADMIN_FOLDER.'/news/categories/add/(:num)'] = 'tecadmin/newscategories/add/$1';
$route[ADMIN_FOLDER.'/news/categories/add_submit'] = 'tecadmin/newscategories/add_submit';
$route[ADMIN_FOLDER.'/news/categories/edit/(:num)'] = 'tecadmin/newscategories/edit/$1';
$route[ADMIN_FOLDER.'/news/categories/update'] = 'tecadmin/newscategories/update';
$route[ADMIN_FOLDER.'/news/categories/delete/(:num)'] = 'tecadmin/newscategories/delete/$1';
$route[ADMIN_FOLDER.'/news/categories/multi-data'] = 'tecadmin/newscategories/multi_data';
$route[ADMIN_FOLDER.'/news/categories/copy-data/(:num)'] = 'tecadmin/newscategories/copy_data/$1';

// /* News Page */
$route[ADMIN_FOLDER.'/news'] = 'tecadmin/news/index';
$route[ADMIN_FOLDER.'/news/(:num)'] = 'tecadmin/news/index/$1';
$route[ADMIN_FOLDER.'/news/add'] = 'tecadmin/news/add';
$route[ADMIN_FOLDER.'/news/add/(:num)'] = 'tecadmin/news/add/$1';
$route[ADMIN_FOLDER.'/news/add_submit'] = 'tecadmin/news/add_submit';
$route[ADMIN_FOLDER.'/news/edit/(:num)'] = 'tecadmin/news/edit/$1';
$route[ADMIN_FOLDER.'/news/update'] = 'tecadmin/news/update';
$route[ADMIN_FOLDER.'/news/delete/(:num)'] = 'tecadmin/news/delete/$1';
$route[ADMIN_FOLDER.'/news/multi-data'] = 'tecadmin/news/multi_data';
$route[ADMIN_FOLDER.'/news/copy-data/(:num)'] = 'tecadmin/news/copy_data/$1';

// /* Gallery categories Page */
$route[ADMIN_FOLDER.'/gallery/categories'] = 'tecadmin/gallerycategories/index';
$route[ADMIN_FOLDER.'/gallery/categories/(:num)'] = 'tecadmin/gallerycategories/index/$1';
$route[ADMIN_FOLDER.'/gallery/categories/add'] = 'tecadmin/gallerycategories/add';
$route[ADMIN_FOLDER.'/gallery/categories/add/(:num)'] = 'tecadmin/gallerycategories/add/$1';
$route[ADMIN_FOLDER.'/gallery/categories/add_submit'] = 'tecadmin/gallerycategories/add_submit';
$route[ADMIN_FOLDER.'/gallery/categories/edit/(:num)'] = 'tecadmin/gallerycategories/edit/$1';
$route[ADMIN_FOLDER.'/gallery/categories/update'] = 'tecadmin/gallerycategories/update';
$route[ADMIN_FOLDER.'/gallery/categories/delete/(:num)'] = 'tecadmin/gallerycategories/delete/$1';
$route[ADMIN_FOLDER.'/gallery/categories/multi-data'] = 'tecadmin/gallerycategories/multi_data';
$route[ADMIN_FOLDER.'/gallery/categories/copy-data/(:num)'] = 'tecadmin/gallerycategories/copy_data/$1';

// /* Gallery Page */
$route[ADMIN_FOLDER.'/gallery'] = 'tecadmin/gallery/index';
$route[ADMIN_FOLDER.'/gallery/(:num)'] = 'tecadmin/gallery/index/$1';
$route[ADMIN_FOLDER.'/gallery/add'] = 'tecadmin/gallery/add';
$route[ADMIN_FOLDER.'/gallery/add/(:num)'] = 'tecadmin/gallery/add/$1';
$route[ADMIN_FOLDER.'/gallery/add_submit'] = 'tecadmin/gallery/add_submit';
$route[ADMIN_FOLDER.'/gallery/edit/(:num)'] = 'tecadmin/gallery/edit/$1';
$route[ADMIN_FOLDER.'/gallery/update'] = 'tecadmin/gallery/update';
$route[ADMIN_FOLDER.'/gallery/delete/(:num)'] = 'tecadmin/gallery/delete/$1';
$route[ADMIN_FOLDER.'/gallery/multi-data'] = 'tecadmin/gallery/multi_data';
$route[ADMIN_FOLDER.'/gallery/copy-data/(:num)'] = 'tecadmin/gallery/copy_data/$1';

/* Products categories Page */
$route[ADMIN_FOLDER.'/products/categories'] = 'tecadmin/productscategories/index';
$route[ADMIN_FOLDER.'/products/categories/(:num)'] = 'tecadmin/productscategories/index/$1';
$route[ADMIN_FOLDER.'/products/categories/add'] = 'tecadmin/productscategories/add';
$route[ADMIN_FOLDER.'/products/categories/add/(:num)'] = 'tecadmin/productscategories/add/$1';
$route[ADMIN_FOLDER.'/products/categories/add_submit'] = 'tecadmin/productscategories/add_submit';
$route[ADMIN_FOLDER.'/products/categories/edit/(:num)'] = 'tecadmin/productscategories/edit/$1';
$route[ADMIN_FOLDER.'/products/categories/update'] = 'tecadmin/productscategories/update';
$route[ADMIN_FOLDER.'/products/categories/delete/(:num)'] = 'tecadmin/productscategories/delete/$1';
$route[ADMIN_FOLDER.'/products/categories/multi-data'] = 'tecadmin/productscategories/multi_data';
$route[ADMIN_FOLDER.'/products/categories/copy-data/(:num)'] = 'tecadmin/productscategories/copy_data/$1';

/* Products Page */
$route[ADMIN_FOLDER.'/products'] = 'tecadmin/products/index';
$route[ADMIN_FOLDER.'/products/(:num)'] = 'tecadmin/products/index/$1';
$route[ADMIN_FOLDER.'/products/add'] = 'tecadmin/products/add';
$route[ADMIN_FOLDER.'/products/import'] = 'tecadmin/products/import';
$route[ADMIN_FOLDER.'/products/add_importindb'] = 'tecadmin/products/add_importindb';
$route[ADMIN_FOLDER.'/products/export_product'] = 'tecadmin/products/export_product';
$route[ADMIN_FOLDER.'/products/export_fbproduct'] = 'tecadmin/products/export_fbproduct';
$route[ADMIN_FOLDER.'/products/export_stock'] = 'tecadmin/products/export_stock';

$route[ADMIN_FOLDER.'/products/add/(:num)'] = 'tecadmin/products/add/$1';
$route[ADMIN_FOLDER.'/products/add_submit'] = 'tecadmin/products/add_submit';
$route[ADMIN_FOLDER.'/products/edit/(:num)'] = 'tecadmin/products/edit/$1';
$route[ADMIN_FOLDER.'/products/update'] = 'tecadmin/products/update';
$route[ADMIN_FOLDER.'/products/delete/(:num)'] = 'tecadmin/products/delete/$1';
$route[ADMIN_FOLDER.'/products/multi-data'] = 'tecadmin/products/multi_data';
$route[ADMIN_FOLDER.'/products/copy-data/(:num)'] = 'tecadmin/products/copy_data/$1';
$route[ADMIN_FOLDER.'/products/import_details'] = 'tecadmin/products/import_details';
$route[ADMIN_FOLDER.'/products/add_productdetails_importindb'] = 'tecadmin/products/add_productdetails_importindb';

/* Variation group Page */
$route[ADMIN_FOLDER.'/variation/group'] = 'tecadmin/variationgroup/index';
$route[ADMIN_FOLDER.'/variation/group/add'] = 'tecadmin/variationgroup/add';
$route[ADMIN_FOLDER.'/variation/group/add_submit'] = 'tecadmin/variationgroup/add_submit';
$route[ADMIN_FOLDER.'/variation/group/edit/(:num)'] = 'tecadmin/variationgroup/edit/$1';
$route[ADMIN_FOLDER.'/variation/group/update'] = 'tecadmin/variationgroup/update';
$route[ADMIN_FOLDER.'/variation/group/delete/(:num)'] = 'tecadmin/variationgroup/delete/$1';
$route[ADMIN_FOLDER.'/variation/group/multi-data'] = 'tecadmin/variationgroup/multi_data';
$route[ADMIN_FOLDER.'/variation/group/copy-data/(:num)'] = 'tecadmin/variationgroup/copy_data/$1';

/* Variation Page */
$route[ADMIN_FOLDER.'/variation/(:num)'] = 'tecadmin/variation/index/$1';
$route[ADMIN_FOLDER.'/variation/add/(:num)'] = 'tecadmin/variation/add/$1';
$route[ADMIN_FOLDER.'/variation/add_submit'] = 'tecadmin/variation/add_submit';
$route[ADMIN_FOLDER.'/variation/edit/(:num)'] = 'tecadmin/variation/edit/$1';
$route[ADMIN_FOLDER.'/variation/update'] = 'tecadmin/variation/update';
$route[ADMIN_FOLDER.'/variation/delete/(:num)'] = 'tecadmin/variation/delete/$1';
$route[ADMIN_FOLDER.'/variation/multi-data'] = 'tecadmin/variation/multi_data';
$route[ADMIN_FOLDER.'/variation/copy-data/(:num)'] = 'tecadmin/variation/copy_data/$1';

/* Moreviews Page */
$route[ADMIN_FOLDER.'/moreviews/(:num)'] = 'tecadmin/moreviews/index/$1';
$route[ADMIN_FOLDER.'/moreviews/add/(:num)'] = 'tecadmin/moreviews/add/$1';
$route[ADMIN_FOLDER.'/moreviews/add_submit'] = 'tecadmin/moreviews/add_submit';
$route[ADMIN_FOLDER.'/moreviews/edit/(:num)'] = 'tecadmin/moreviews/edit/$1';
$route[ADMIN_FOLDER.'/moreviews/update'] = 'tecadmin/moreviews/update';
$route[ADMIN_FOLDER.'/moreviews/delete/(:num)'] = 'tecadmin/moreviews/delete/$1';
$route[ADMIN_FOLDER.'/moreviews/multi-data'] = 'tecadmin/moreviews/multi_data';
$route[ADMIN_FOLDER.'/moreviews/copy-data/(:num)'] = 'tecadmin/moreviews/copy_data/$1';

/* Banner category Page */
$route[ADMIN_FOLDER.'/banner/categories'] = 'tecadmin/bannercategories/index';
$route[ADMIN_FOLDER.'/banner/categories/(:num)'] = 'tecadmin/bannercategories/index/$1';
$route[ADMIN_FOLDER.'/banner/categories/add'] = 'tecadmin/bannercategories/add';
$route[ADMIN_FOLDER.'/banner/categories/add/(:num)'] = 'tecadmin/bannercategories/add/$1';
$route[ADMIN_FOLDER.'/banner/categories/add_submit'] = 'tecadmin/bannercategories/add_submit';
$route[ADMIN_FOLDER.'/banner/categories/edit/(:num)'] = 'tecadmin/bannercategories/edit/$1';
$route[ADMIN_FOLDER.'/banner/categories/update'] = 'tecadmin/bannercategories/update';
$route[ADMIN_FOLDER.'/banner/categories/delete/(:num)'] = 'tecadmin/bannercategories/delete/$1';
$route[ADMIN_FOLDER.'/banner/categories/multi-data'] = 'tecadmin/bannercategories/multi_data';
$route[ADMIN_FOLDER.'/banner/categories/copy-data/(:num)'] = 'tecadmin/bannercategories/copy_data/$1';

/* Banner Page */
$route[ADMIN_FOLDER.'/banner'] = 'tecadmin/banner/index';
$route[ADMIN_FOLDER.'/banner/add'] = 'tecadmin/banner/add';
$route[ADMIN_FOLDER.'/banner/add_submit'] = 'tecadmin/banner/add_submit';
$route[ADMIN_FOLDER.'/banner/edit/(:num)'] = 'tecadmin/banner/edit/$1';
$route[ADMIN_FOLDER.'/banner/update'] = 'tecadmin/banner/update';
$route[ADMIN_FOLDER.'/banner/delete/(:num)'] = 'tecadmin/banner/delete/$1';
$route[ADMIN_FOLDER.'/banner/multi-data'] = 'tecadmin/banner/multi_data';
$route[ADMIN_FOLDER.'/banner/copy-data/(:num)'] = 'tecadmin/banner/copy_data/$1';

/* Users Page */
$route[ADMIN_FOLDER.'/users'] = 'tecadmin/users/index';
$route[ADMIN_FOLDER.'/users/add'] = 'tecadmin/users/add';
$route[ADMIN_FOLDER.'/users/add_submit'] = 'tecadmin/users/add_submit';
$route[ADMIN_FOLDER.'/users/edit/(:num)'] = 'tecadmin/users/edit/$1';
$route[ADMIN_FOLDER.'/users/update'] = 'tecadmin/users/update';
$route[ADMIN_FOLDER.'/users/delete/(:num)'] = 'tecadmin/users/delete/$1';
$route[ADMIN_FOLDER.'/users/multi-data'] = 'tecadmin/users/multi_data';
$route[ADMIN_FOLDER.'/users/copy-data/(:num)'] = 'tecadmin/users/copy_data/$1';

/* USER MANAGEMENT */
$route[ADMIN_FOLDER.'/users/credit_account_request'] = 'tecadmin/users/credit_account_request';
$route[ADMIN_FOLDER.'/users/student_requests'] = 'tecadmin/users/student_requests';
$route[ADMIN_FOLDER.'/users/delete_student_req/(:num)'] = 'tecadmin/users/delete_student_req/$1';
$route[ADMIN_FOLDER.'/users/delete_credit_account_req/(:num)'] = 'tecadmin/users/delete_credit_account_req/$1';
$route[ADMIN_FOLDER.'/users/generate_student_login'] = 'tecadmin/users/generate_student_login'; 
$route[ADMIN_FOLDER.'/users/generate_credit_login'] = 'tecadmin/users/generate_credit_login'; 
$route[ADMIN_FOLDER.'/users/showcredit_requestdetails'] = 'tecadmin/users/showcredit_requestdetails'; 
$route[ADMIN_FOLDER.'/users/creditsaveinpdf/(:num)'] = 'tecadmin/users/creditsaveinpdf/$1'; 

/* Users Group Page */
$route[ADMIN_FOLDER.'/users-group'] = 'tecadmin/usersgroup/index';
$route[ADMIN_FOLDER.'/users-group/add'] = 'tecadmin/usersgroup/add';
$route[ADMIN_FOLDER.'/users-group/add_submit'] = 'tecadmin/usersgroup/add_submit';
$route[ADMIN_FOLDER.'/users-group/edit/(:num)'] = 'tecadmin/usersgroup/edit/$1';
$route[ADMIN_FOLDER.'/users-group/update'] = 'tecadmin/usersgroup/update';
$route[ADMIN_FOLDER.'/users-group/delete/(:num)'] = 'tecadmin/usersgroup/delete/$1';
$route[ADMIN_FOLDER.'/users-group/multi-data'] = 'tecadmin/usersgroup/multi_data';
$route[ADMIN_FOLDER.'/users-group/copy-data/(:num)'] = 'tecadmin/usersgroup/copy_data/$1';



/* Shopping Page */
$route[ADMIN_FOLDER.'/payment'] = 'tecadmin/payments/index';
$route[ADMIN_FOLDER.'/addpaymentoforder/(:num)'] = 'tecadmin/payments/addpaymentoforder/$1';
$route[ADMIN_FOLDER.'/paymentoforderstatus/(:num)'] = 'tecadmin/payments/paymentoforderstatus/$1';
$route[ADMIN_FOLDER.'/deletepaymentoforder/(:num)'] = 'tecadmin/payments/deletepaymentoforder/$1';
$route[ADMIN_FOLDER.'/update_payment'] = 'tecadmin/payments/update';

$route[ADMIN_FOLDER.'/orders'] = 'tecadmin/tecshopping/orders';
$route[ADMIN_FOLDER.'/userallorder/(:num)'] = 'tecadmin/tecshopping/userallorder/$1';
$route[ADMIN_FOLDER.'/order_details/(:num)'] = 'tecadmin/tecshopping/order_details/$1';
$route[ADMIN_FOLDER.'/order_delete/(:num)'] = 'tecadmin/tecshopping/order_delete/$1';
$route[ADMIN_FOLDER.'/update_order_details/(:num)'] = 'tecadmin/tecshopping/update_order_details/$1';
$route[ADMIN_FOLDER.'/unset_discount/(:any)/(:num)'] = 'tecadmin/tecshopping/unset_discount/$1/$2';
$route[ADMIN_FOLDER.'/unset_surcharge/(:any)/(:num)'] = 'tecadmin/tecshopping/unset_surcharge/$1/$2';

$route[ADMIN_FOLDER.'/location_types'] = 'tecadmin/tecshopping/location_types';
$route[ADMIN_FOLDER.'/insert_location_type'] = 'tecadmin/tecshopping/insert_location_type';
$route[ADMIN_FOLDER.'/locations/(:num)'] = 'tecadmin/tecshopping/locations/$1';
$route[ADMIN_FOLDER.'/insert_location/(:num)'] = 'tecadmin/tecshopping/insert_location/$1';

$route[ADMIN_FOLDER.'/zones'] = 'tecadmin/tecshopping/zones';
$route[ADMIN_FOLDER.'/insert_zone'] = 'tecadmin/tecshopping/insert_zone';

$route[ADMIN_FOLDER.'/shipping'] = 'tecadmin/tecshopping/shipping';
$route[ADMIN_FOLDER.'/insert-shipping'] = 'tecadmin/tecshopping/insert_shipping';
$route[ADMIN_FOLDER.'/shipping-rates/(:num)'] = 'tecadmin/tecshopping/shipping_rates/$1';
$route[ADMIN_FOLDER.'/insert-shipping-rate/(:num)'] = 'tecadmin/tecshopping/insert_shipping_rate/$1';
$route[ADMIN_FOLDER.'/item_shipping/(:num)'] = 'tecadmin/tecshopping/item_shipping/$1';
$route[ADMIN_FOLDER.'/insert_item_shipping/(:num)'] = 'tecadmin/tecshopping/insert_item_shipping/$1';

$route[ADMIN_FOLDER.'/tax'] = 'tecadmin/tecshopping/tax';
$route[ADMIN_FOLDER.'/insert_tax'] = 'tecadmin/tecshopping/insert_tax';
$route[ADMIN_FOLDER.'/item_tax/(:num)'] = 'tecadmin/tecshopping/item_tax/$1';
$route[ADMIN_FOLDER.'/insert_item_tax/(:num)'] = 'tecadmin/tecshopping/insert_item_tax/$1';

$route[ADMIN_FOLDER.'/item_discounts'] = 'tecadmin/tecshopping/item_discounts';
$route[ADMIN_FOLDER.'/summary_discounts'] = 'tecadmin/tecshopping/summary_discounts';
$route[ADMIN_FOLDER.'/update_discount/(:num)'] = 'tecadmin/tecshopping/update_discount/$1';
$route[ADMIN_FOLDER.'/insert_discount'] = 'tecadmin/tecshopping/insert_discount';

$route[ADMIN_FOLDER.'/discount_groups'] = 'tecadmin/tecshopping/discount_groups';
$route[ADMIN_FOLDER.'/update_discount_group/(:num)'] = 'tecadmin/tecshopping/update_discount_group/$1';
$route[ADMIN_FOLDER.'/insert_discount_group'] = 'tecadmin/tecshopping/insert_discount_group';
$route[ADMIN_FOLDER.'/insert_discount_group_items/(:num)'] = 'tecadmin/tecshopping/insert_discount_group_items/$1';

$route[ADMIN_FOLDER.'/currency'] = 'tecadmin/tecshopping/currency';
$route[ADMIN_FOLDER.'/insert_currency'] = 'tecadmin/tecshopping/insert_currency';

$route[ADMIN_FOLDER.'/order_status'] = 'tecadmin/tecshopping/order_status';
$route[ADMIN_FOLDER.'/insert_order_status'] = 'tecadmin/tecshopping/insert_order_status';

$route[ADMIN_FOLDER.'/shopping_config'] = 'tecadmin/tecshopping/config';
$route[ADMIN_FOLDER.'/shopping_defaults'] = 'tecadmin/tecshopping/defaults';
$route[ADMIN_FOLDER.'/email_list'] = 'tecadmin/tecshopping/email_list';
$route[ADMIN_FOLDER.'/insert_html'] = 'tecadmin/tecshopping/insert_html';
$route[ADMIN_FOLDER.'/send_email'] = 'tecadmin/tecshopping/send_email';
// $route[ADMIN_FOLDER.'/submit-offer'] = 'tecadmin/tecshopping/submit_randomemail_offer';

/* Client Dashboard */
$route['cdashboard'] = 'clientdash/dashboard/index';
$route['users/edit/(:num)'] = 'clientdash/users/edit/$1';
$route['cprofile/(:num)'] = 'clientdash/users/edit/$1';
$route['users/update'] = 'clientdash/users/update';
$route['clientallorder'] = 'clientdash/dashboard/clientallorder';
/*
| Frontend Routes
*/
/* Home Page Search */
$route['search_product'] = 'home/search_produc_by_input'; 
/* User management pages */
$route['user'] = 'user/index';
$route['user/submit-register'] = 'user/registeration_submit';
$route['user/activate/(:any)'] = 'user/activate/$1';
$route['user/submit-login'] = 'user/login_submit';
$route['user/submit-forgot'] = 'user/forgot_submit';
$route['user/logout'] = 'user/logout';



/* Blog Pages */
$route['blog'] = 'content/all_blogs';
$route['blog/page/(:num)'] = 'content/all_blogs';
$route['topics/(.*)'] = 'content/blog_categories/$1';
$route['topics/(.*)/page/(:num)'] = 'content/blog_categories/$1';
$route['author/(:any)'] = 'content/author_blogs/$1';
$route['author/(.*)/page/(:num)'] = 'content/author_blogs/$1';
$route['keywords/(:any)'] = 'content/keywords_blogs/$1';
$route['keywords/(.*)/page/(:num)'] = 'content/keywords_blogs/$1';

/* Products Pages */
// $route['product-category'] = 'products/index';
// $route['product-category/(.*)'] = 'products/index/$1';
// $route['product-category/(.*)/page/(:num)'] = 'products/index/$1';
// $route['product/(:any)'] = 'products/single/$1';
$route['products'] = 'products/index';
$route['product'] = 'products/index';
$route['product-category'] = 'products/index';
$route['product-category/(.*)'] = 'products/index/$1';
$route['product-category/(.*)/page/(:num)'] = 'products/index/$1';
$route['product/(:any)'] = 'products/single/$1';
$route['product-tag/(:any)'] = 'products/product_tags/$1';




/* Basket */

//$route['pay-later/(:num)'] = 'tecshopping/load_cart_data/$1';

$route['insert_item_to_cart'] = 'tecshopping/insert_form_item_to_cart';
$route['cart'] = 'tecshopping/view_cart';
$route['delete_item/(:any)'] = 'tecshopping/delete_item/$1';
$route['unset_discount/(:num)'] = 'tecshopping/unset_discount/$1';
$route['checkout'] = 'tecshopping/checkout';
$route['checkout-complete/(:num)'] = 'tecshopping/checkout_complete/$1';
$route['paypal-ipn'] = 'tecshopping/paypal_ipn';
$route['paypal/cancel/(:num)'] = 'tecshopping/checkout_cancel/$1';


// $route['wooprod'] = 'tecshopping/wooprod';

$route['invoice/(:any)'] = 'invoice/index/$1';
$route['invoice/pdf/(:any)'] = 'invoice/pdf/$1';
$route['invoice/download/(:any)'] = 'invoice/pdf/$1';
$route['pay-online-submit'] = 'tecshopping/orderPayLater';



/* Search Pages */
$route['submit_search'] = 'products/search_submit';
$route['search/(:any)'] = 'products/search/$1';
$route['search/(:any)/page/(:num)'] = 'products/search/$1';


/* Cms Pages */
$route['404_override'] = 'my404';
$route['livechat'] = 'content/livechat';
$route['cms/ajax-request'] = 'content/getfirmware';
$route['usercomment'] = 'content/add_testimonials';
$route['cms/submittestimonial'] = 'content/submittestimonial';
$route['contact-submit'] = 'content/submit_contact';
$route['dealer-submit'] = 'content/dealer_form';
$route['feedback-submit'] = 'content/feedback_form';
$route['credit-submit'] = 'content/credit_form';
$route['submit-subscribe'] = 'content/submit_subs';
$route['submit-offer'] = 'content/submit_randomemail_offer';
$route['unsubscribe/(:any)'] = 'content/unsubscribe_newsletter/$1';

$route['open-a-credit-account'] = 'content/open_credit_account';
$route['pay-online'] = 'content/pay_online';
$route['shop'] = 'content/shop';
$route['offer'] = 'content/offer';
$route['student'] = 'content/student';
$route['weekly-promotion'] = 'content/weekly_promotion';
$route['student_submit'] = 'content/student_submit';
$route['placeorderindb'] = 'content/placeorderindb';
$route['credit_account_submit'] = 'content/credit_account_submit';
$route['(.*)'] = 'content/index/$1';



