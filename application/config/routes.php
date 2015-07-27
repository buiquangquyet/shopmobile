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

$route['default_controller'] = "frontend/home/index";
$route['backend$'] = "backend/home/index";
$route['404_override'] = 'frontend/home';
$route['dothocung'] = 'frontend/home';
$route['(\d+)'] = 'frontend/home';
$route['trang-chu'] = 'frontend/home/index';
$route['trang-chu.html'] = 'frontend/home/index';

$route['trang-chu-[a-zA-Z0-9/-]+.html'] = 'frontend/home/index';
$route['trang-chu-(:num).html'] = 'frontend/home/index';

//ok
$route['[a-zA-Z0-9/-]+11+-(:num)+.html'] = 'frontend/home/listproduct/$1';
$route['[a-zA-Z0-9/-]+11+-(:num)/(:num)'] = 'frontend/home/listproduct/$1/$2';
$route['[a-zA-Z0-9/-]+22+-(:num)+.html'] = 'frontend/home/listnote/$1';
$route['[a-zA-Z0-9/-]+22+-(:num)/(:num)'] = 'frontend/home/listnote/$1/$2';
$route['[a-zA-Z0-9/-]+33+-(:num)+.html'] = 'frontend/home/contact/$1';

//detailproduct
$route['san-pham/+[a-zA-Z0-9/-]+/+(:num)+.html'] = 'frontend/home/detailproduct/$1';
$route['tin-tuc/+[a-zA-Z0-9/-]+/+(:num)+.html'] = 'frontend/home/detailnote/$1';
//cart
$route['them-vao-gio-hang/+[a-zA-Z0-9/-]+/+(:num)+.html'] = 'frontend/home/buy/$1';
$route['gio-hang.html'] = 'frontend/home/showcart';
$route['xoa-san-pham/+(:any)+.html'] = 'frontend/home/deleteproductincart/$1';
$route['thanh-toan.html'] = 'frontend/home/addpay';
$route['xoa-gio-hang.html'] = 'frontend/home/deleteAllCart';
$route['cap-nhat-gio-hang.html'] = 'frontend/home/updatecart';

/* End of file routes.php */
/* Location: ./application/config/routes.php */