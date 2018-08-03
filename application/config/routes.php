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

$route['home'] = 'home';
$route['home/send_messages'] = 'home/send_messages';

$route['login'] = 'login';

$route['contact/send_messages'] = 'contact/send_messages';

$route['allcurrency'] = 'allcurrency';

$route['buy'] = 'buy';
$route['buy/bank'] = 'bank';
$route['buy/bank/view_bank'] = 'bank/view_bank';
$route['buy/bank/confirm_bank'] = 'bank/confirm_bank';


$route['contact/invest'] = 'contact_invest';
$route['contact/invest/send_messages'] = 'contact_invest/send_messages';



$route['notice/legal'] = 'notice';
$route['notice/privacy'] = 'notice';
$route['notice/general'] = 'notice';
$route['notice/cookies'] = 'notice';

$route['plan/([0-9a-z_-]+)'] = "plan/packages";
$route['plan/([0-9a-z_-]+)'] = "plan/packages";

$route['backoffice'] = "b_home";
$route['backoffice/profile'] = "b_data";

$route['backoffice/messages/support'] = "b_messages/message_type";
$route['backoffice/messages/support/([0-9a-z_-]+)'] = "b_messages/message_type/$1";

$route['backoffice/soporte'] = "b_soporte"; 
$route['backoffice/soporte/validate'] = "b_soporte/validate";

$route['backoffice/validate_usd'] = "b_home/validate_usd"; 
$route['backoffice/validate_btc'] = "b_home/validate_btc"; 



$route['backoffice/sell'] = "b_sell";

$route['logout'] = "b_home/logout";
$route['backoffice/misdatos'] = "b_data";

$route['register/afiliate/([0-9a-z_-]+)'] = "register/index/$1";

$route['dashboard'] = "dashboard";
$route['dashboard/panel'] = "panel";
$route['dashboard/panel/guardar_btc'] = "panel/guardar_btc";
$route['dashboard/panel/masive_messages'] = "panel/masive_messages";

$route['dashboard/comisiones'] = "d_comission";
$route['dashboard/bonos'] = "d_bonus"; 
$route['dashboard/rangos'] = "d_ranges"; 
$route['dashboard/puntos'] = "d_points"; 
$route['dashboard/puntos_binario'] = "d_binaries"; 

$route['dashboard/informativos'] = "d_informative"; 
$route['dashboard/informativos/load'] = "d_informative/load";
$route['dashboard/informativos/load/([0-9]+)'] = "d_informative/load/$1";
$route['dashboard/informativos/validate'] = "d_informative/validate";

$route['dashboard/clientes'] = "d_customer";
$route['dashboard/clientes/load/([0-9]+)'] = "d_customer/load/$1";
$route['dashboard/clientes/validate'] = "d_customer/validate";

$route['dashboard/noticias'] = "d_news";
$route['dashboard/noticias/load'] = "d_news/load";
$route['dashboard/noticias/load/([0-9]+)'] = "d_news/load/$1";
$route['dashboard/noticias/validate'] = "d_news/validate";

$route['dashboard/comentarios'] = "d_comments";
$route['dashboard/comentarios/cambiar_status'] = "d_comments/change_status";
$route['dashboard/comentarios/cambiar_status_no'] = "d_comments/change_status_no";

$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios/load'] = "d_users/load";
$route['dashboard/usuarios/load/([0-9]+)'] = "d_users/load/$1";
$route['dashboard/usuarios/validate'] = "d_users/validate";

$route['dashboard/confirmation_activaciones'] = "d_activate/confirmation";

$route['dashboard/soporte'] = "d_messages/soporte";
$route['dashboard/soporte/update'] = "d_messages/update";

$route['dashboard/ventas'] = "d_sell";
$route['dashboard/ventas_details/([0-9]+)'] = "d_sell/details/$1";
$route['dashboard/ventas/pagado'] = "d_sell/pagado";
$route['dashboard/ventas/devolver'] = "d_sell/devolver";

$route['dashboard/comentarios'] = "d_comments";
$route['dashboard/comentarios/cambiar_status'] = "d_comments/change_status";
$route['dashboard/comentarios/cambiar_status_no'] = "d_comments/change_status_no";

$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios/load'] = "d_users/load";
$route['dashboard/usuarios/load/([0-9]+)'] = "d_users/load/$1";
$route['dashboard/usuarios/validate'] = "d_users/validate";


/* End of file routes.php */
/* Location: ./application/config/routes.php */