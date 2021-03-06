<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Home
$routes->get('/', 'Pages::index');

//Institucional
$routes->get('institucional','Institucional::index');
$routes->get('{locale}/institucional','Institucional::index');
//Institucional Subpaginas
$routes->get('institucional/(:any)','Institucional::subpaginas/$1');
$routes->get('{locale}/institucional/(:any)','Institucional::subpaginas/$1');


//Posts

//Eventos
$routes->get('eventos','Posts::index/evento');
$routes->get('{locale}/eventos','Posts::index/evento');

$routes->get('eventos/(:any)','Posts::post/$1/evento');
$routes->get('{locale}/eventos/(:any)','Posts::post/$1/evento');

//Noticias
$routes->get('noticias','Posts::index/noticia');
$routes->get('{locale}/noticias','Posts::index/noticia');

$routes->get('noticias/(:any)','Posts::post/$1/noticia');
$routes->get('{locale}/noticias/(:any)','Posts::post/$1/noticia');

//Protocolos
$routes->get('protocolos','Posts::index/protocolo',['filter' => 'memberAuth']);
$routes->get('{locale}/protocolos','Posts::index/protocolo',['filter' => 'memberAuth']);

$routes->get('protocolos/(:any)','Posts::post/$1/protocolo',['filter' => 'memberAuth']);
$routes->get('{locale}/protocolos/(:any)','Posts::post/$1/protocolo',['filter' => 'memberAuth']);

//Contacto
$routes->get('contacto','Contacto::index');
$routes->get('{locale}/contacto','Contacto::index');

//About
$routes->get('about', 'Pages::showme/about');

//---------------------------------------------------
//ADMIN

$tipos = ['noticia','evento','protocolo'];
foreach ($tipos as $tipo) {
	// crear
	$routes->match(['get','post'],'admin/'.$tipo,'Posts::create/'.$tipo);
	$routes->match(['get','post'],'{locale}/admin/'.$tipo,'Posts::create/'.$tipo);
	// editar
	$routes->match(['get','post'],'admin/'.$tipo.'/editar/(:num)','Posts::edit/$1/'.$tipo);
	$routes->match(['get','post'],'{locale}/admin/'.$tipo.'/editar/(:num)','Posts::edit/$1/'.$tipo);
	// tabla
	$routes->match(['get','post'],'admin/ver/'.$tipo.'s', 'Posts::adminPosts/'.$tipo);
	$routes->match(['get','post'],'{locale}/admin/ver/'.$tipo.'s', 'Posts::adminPosts/'.$tipo);
	// taxonomias
	$routes->match(['get','post'],'admin/categorias/'.$tipo.'s', 'Posts::taxonomias/'.$tipo);
	$routes->match(['get','post'],'{locale}/admin/categorias/'.$tipo.'s', 'Posts::taxonomias/'.$tipo);
}

// users
// tabla
$routes->match(['get','post'], 'admin/usuarios','Users::adminUsuarios');
$routes->match(['get','post'], '{locale}/admin/usuarios','Users::adminUsuarios');

// ----------------------------------------------------------------------
//USERS

// registro
$routes->match(['get','post'],'{locale}/registro','Users::registro');
$routes->match(['get','post'],'registro','Users::registro');
// login
$routes->match(['get','post'],'{locale}/login','Users::index');
$routes->match(['get','post'],'login','Users::index');
// logout
$routes->get('{locale}/logout','Users::logout');
$routes->get('logout','Users::logout');
// perfil
$routes->match(['get','post'],'perfil','Users::perfil',['filter' => 'userAuth']);
$routes->match(['get','post'],'{locale}/perfil','Users::perfil',['filter' => 'userAuth']);

// ----------------------------------------------------------------------

$routes->post('upload/img','Upload::img');

$routes->get('{locale}/', 'Pages::index');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
