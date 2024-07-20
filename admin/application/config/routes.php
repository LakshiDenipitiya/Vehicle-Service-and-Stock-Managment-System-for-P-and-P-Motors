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


$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['get_jb'] = 'Jobrequest/get_jb';
$route['get_jbnew'] = 'Jobrequest/get_jbnew';
$route['jb_create'] = 'Jobrequest/jb_create';
$route['get_service_codes'] = 'Jobrequest/get_service_codes';
$route['get_employee'] = 'Goodsreceivenotice/get_employee';
$route['get_vehicle_details'] = 'Goodsreceivenotice/get_vehicle_details';
$route['get_machine_codes'] = 'Goodsreceivenotice/get_machine_codes';
$route['get_item_codes'] = 'Goodsreceivenotice/get_item_codes';
$route['get_item_spare'] = 'Goodsreceivenotice/get_item_spare';
$route['post_grn'] = 'Goodsreceivenotice/post_grn';
$route['get_grndetails'] = 'Goodsreceivenotice/get_note_detail';
$route['delete_note'] = 'Goodsreceivenotice/delete_note';
$route['autoGRNNO'] = 'Goodsreturnnotice/autoGRNNO';
$route['select_grn_detals'] = 'Goodsreturnnotice/select_grn_detals';
$route['save_return_items'] = 'Goodsreturnnotice/save_return_items';
$route['deleteReturnInvoice'] = 'Goodsreturnnotice/deleteReturnInvoice';
$route['get_grtn_details'] = 'Goodsreturnnotice/get_return_note_detail';
$route['post_grn_return'] = 'Goodsreturnnotice/post_grn_return';
$route['autoCustomer'] = 'Invoice/autoCustomer';
$route['autoItemCode'] = 'Invoice/autoItemCode';
$route['save_invoice_data'] = 'Invoice/save_invoice_data';
