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
/*******************************************
/*              EJEMPLO YASSER
/******************************************
 $route['desarrolloweb'] = "empresa/tecnologia/5";
 Esto quiere decir que, si CodeIgniter se encuentra "desarrolloweb" en el primer segmento de la URL
 (después del nombre del dominio), se redireccionará el flujo de la aplicación para el controlador "empresa",
 el método "tecnologia" y pasándole como parámetro el dígito 5.
 * http://www.desarrolloweb.com/articulos/enrutado-personalizado-url-codeigniter.html
 */


$route['login'] = "login/be_login";
$route['be'] = "be/inicio";

//Si se muestra una URL be/pedido/(:num) que se procese en la funcion index del mismo controlador
$route['be/pedido/(:num)'] = "be/pedido/index/$1/";

$route['normas-tecnicas/(:num)'] = "normas-tecnicas/index/$1/";
$route['testimonios/(:num)'] = "testimonios/index/$1/";
$route['clientes/(:any)'] = "clientes/index/$1/";
$route['gracias/(:any)'] = "gracias/index/$1/";

$route['productos/(:any)'] = "productos/index/$1/";

$route['servicio/(:any)'] = "servicio_detalle/index/$1/";
$route['categoria-maquinaria/(:any)'] = "categoria_maquinarias/index/$1/";
$route['maquinaria/(:any)'] = "maquinaria_detalle/index/$1/";

$route['certificacion/(:any)'] = "certificacion/index/$1/";
$route['mensaje/(:any)'] = "mensaje/index/$1/";

$route['secciones/(:any)'] = "secciones/index/$1/";

$route['categoria/(:any)'] = "categoria/index/$1/";
$route['categoria-servicios/(:any)'] = "categoria_servicios/index/$1/";


$route['default_controller'] = "inicio";
$route['404_override'] = '';
/*
$route['productos-naturales'] = "productos_naturales";
$route['tratamiento-natural'] = "tratamiento_natural";
$route['cosmetica-natural'] = "cosmetica_natural";
*/
/*
$route['(.+)-(.+)-(.+)-(.+)-(.+)-(.+)-(.+)-(.+)-(.+)'] = "$1_$2_$3_$4_$5_$6_$7_$8_$9";
$route['(.+)-(.+)-(.+)-(.+)-(.+)-(.+)-(.+)-(.+)'] = "$1_$2_$3_$4_$5_$6_$7_$8";
$route['(.+)-(.+)-(.+)-(.+)-(.+)-(.+)-(.+)'] = "$1_$2_$3_$4_$5_$6_$7";
$route['(.+)-(.+)-(.+)-(.+)-(.+)-(.+)'] = "$1_$2_$3_$4_$5_$6";
$route['(.+)-(.+)-(.+)-(.+)-(.+)'] = "$1_$2_$3_$4_$5";
$route['(.+)-(.+)-(.+)-(.+)'] = "$1_$2_$3_$4";
$route['(.+)-(.+)-(.+)'] = "$1_$2_$3";

$route['(.+)-(.+)'] = "$1_$2";
*/


/* End of file routes.php */
/* Location: ./application/config/routes.php */