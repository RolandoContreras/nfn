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

$route['default_controller'] = "home";
$route['404_override'] = 'errors/error_404';

$route['inicio'] = 'home';
$route['nosotros'] = 'about';
$route['productos'] = 'product';
$route['noticias'] = 'news';
$route['eventos'] = 'news/events';
$route['contacto'] = 'contact';
$route['login'] = 'login';
$route['login/validate'] = 'login/validate';
$route['forgot'] = 'forgot';
$route['home/send_messages'] = 'home/send_messages';
$route['product/basico'] = 'home/product';

$route['register/validate'] = 'register/validate';
$route['register/step2'] = 'register/step2';
$route['register/create_register'] = 'register/create_register';

//MANAGER - BACKOFFICE
$route['backoffice'] = "b_home";
$route['backoffice/datos'] = "b_data";
$route['backoffice/contrasena'] = "b_data/contrasena";

$route['backoffice/datos_pago'] = "b_data/datos_pagos";
$route['backoffice/save_bank'] = "b_data/save_bank";

$route['backoffice/datos_beneficiario'] = "b_data/beneficiario";
$route['backoffice/save_benficiario'] = "b_data/save_benficiario";

$route['backoffice/facturas'] = "b_invoices";
$route['backoffice/carga_documento'] = "b_invoices/carga_documento";
$route['backoffice/facturas/upload'] = "b_invoices/upload";

$route['backoffice/cambiar_kit'] = "b_invoices/cambiar_kit";
$route['backoffice/invoice/change_kit'] = "b_invoices/change_kit";

$route['backoffice/pagar_kit'] = "b_invoices/pagar_kit";
$route['backoffice/invoice/change_pagar_bono'] = "b_invoices/change_pagar_bono";


$route['backoffice/red'] = "b_red/index";
$route['backoffice/directos'] = "b_red/directos";
$route['backoffice/mostrar_nivel'] = "b_red/mostrar_nivel";

$route['backoffice/extracto'] = "b_pay/extracto";

$route['backoffice/sac'] = "b_sac";
$route['backoffice/sac_create_messages'] = "b_sac/create_messages";

$route['backoffice/cobros'] = "b_pay";
$route['backoffice/cobros_validate'] = "b_pay/validate";

$route['salir'] = "login/logout";

//MANAGER - DASHBOARD
$route['dashboard'] = "dashboard";
$route['dashboard/validate'] = "dashboard/validate";
$route['dashboard/panel'] = "panel";

$route['dashboard/bonos'] = "d_bonus"; 
$route['dashboard/bonos/load/([0-9]+)'] = "d_bonus/load/$1";
$route['dashboard/bonos/validate'] = "d_bonus/validate";
$route['dashboard/bonos/delete'] = "d_bonus/delete";

$route['dashboard/activaciones_clientes'] = "d_activate"; 
$route['dashboard/activaciones_clientes/active'] = "d_activate/active";
$route['dashboard/activaciones_clientes/cambiar_status'] = "d_activate/change_status";
$route['dashboard/activaciones_clientes/delete'] = "d_activate/delete";

$route['dashboard/activaciones_consumos'] = "d_activate/consume"; 
$route['dashboard/activaciones_consumos/active'] = "d_activate/active";
$route['dashboard/activaciones_consumos/cambiar_status'] = "d_activate/change_status";
$route['dashboard/activaciones_consumos/delete'] = "d_activate/delete";

$route['dashboard/clientes'] = "d_customer";
$route['dashboard/clientes/load/([0-9]+)'] = "d_customer/load/$1";
$route['dashboard/clientes/validate'] = "d_customer/validate";
$route['dashboard/clientes/delete'] = "d_customer/delete";

$route['dashboard/eventos'] = "d_events";
$route['dashboard/eventos/load'] = "d_events/load";
$route['dashboard/eventos/load/([0-9]+)'] = "d_events/load/$1";
$route['dashboard/eventos/validate'] = "d_events/validate";
$route['dashboard/eventos/delete'] = "d_events/delete";

$route['dashboard/comisiones'] = "d_comission";
$route['dashboard/comisiones/load/([0-9]+)'] = "d_comission/load/$1";
$route['dashboard/comisiones/validate_customer'] = "d_comission/validate_customer";
$route['dashboard/comisiones/validate'] = "d_comission/validate";
$route['dashboard/comisiones/marcar_pagado'] = "d_comission/mark_pay";
$route['dashboard/comisiones/validate_customer'] = "d_comission/validate_customer";

$route['dashboard/box'] = "d_box";
$route['dashboard/box/load'] = "d_box/load";
$route['dashboard/box/load/([0-9]+)'] = "d_box/load/$1";
$route['dashboard/box/validate'] = "d_box/validate";
$route['dashboard/box/delete'] = "d_box/delete";

$route['dashboard/comentarios'] = "d_comments";
$route['dashboard/comentarios/cambiar_status'] = "d_comments/change_status";
$route['dashboard/comentarios/cambiar_status_no'] = "d_comments/change_status_no";

$route['dashboard/pagos'] = "d_pays";
$route['dashboard/pagos_details/([0-9]+)'] = "d_pays/details/$1";
$route['dashboard/pagos/pagado'] = "d_pays/pagado";
$route['dashboard/pagos/devolver'] = "d_pays/devolver";
$route['dashboard/pagos/load/([0-9]+)'] = "d_pays/load/$1";
$route['dashboard/pagos/validate_customer'] = "d_pays/validate_customer";
$route['dashboard/pagos/validate'] = "d_pays/validate";

$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios/load'] = "d_users/load";
$route['dashboard/usuarios/load/([0-9]+)'] = "d_users/load/$1";
$route['dashboard/usuarios/validate'] = "d_users/validate";
$route['dashboard/usuarios/delete'] = "d_users/delete";

$route['dashboard/soporte'] = "d_informative/soporte";
$route['dashboard/soporte/update'] = "d_informative/update";

$route['dashboard/jobs/crear_factura_consumo'] = "jobs/crear_factura_consumo"; 
$route['dashboard/jobs/verificar_rango'] = "jobs/verify_ranges"; 

/* End of file routes.php */
/* Location: ./application/config/routes.php */
