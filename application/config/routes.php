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
#$route['(:any)'] = "home/view/$1";
$route['default_controller'] = "home";
$route['404_override'] = '';

$route['admin/home'] = "admin_home/index";
$route['admin/products'] = 'admin_products/index';
$route['admin/products/add'] = 'admin_products/add';
$route['admin/products/update'] = 'admin_products/update';
$route['admin/products/update/(:any)'] = 'admin_products/update/$1';
$route['admin/products/delete/(:any)'] = 'admin_products/delete/$1';


$route['admin/categories'] = 'admin_categories/index';
$route['admin/categories/add'] = 'admin_categories/add';
$route['admin/categories/update'] = 'admin_categories/update';
$route['admin/categories/update/(:any)'] = 'admin_categories/update/$1';
$route['admin/categories/delete/(:any)'] = 'admin_categories/delete/$1';

$route['admin/contact'] = 'admin_contact/index';
$route['admin/contact/view'] = 'admin_contact/view';
$route['admin/contact/view/(:any)'] = 'admin_contact/view/$1';


$route['admin'] = 'user/index';
$route['admin/login'] = 'user/index';
$route['admin/login/validate'] = 'user/validate';
$route['admin/logout'] = 'user/logout';

#$route['san-pham'] = 'single_product/index';
#$route['san-pham/(:any)'] = 'single_product/index/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */