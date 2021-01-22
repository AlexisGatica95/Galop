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
$routes->setAutoRoute(true);

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
	//Estatuto
	$routes->get('institucional/(:any)','Institucional::subpaginas/$1');
//Noticias
$routes->get('noticias','Noticias::index');
$routes->get('{locale}/noticias','Noticias::index');
//Eventos
$routes->get('eventos','Eventos::index');
$routes->get('{locale}/eventos','Eventos::index');
//Contacto
$routes->get('contacto','Contacto::index');
$routes->get('{locale}/contacto','Contacto::index');
//About
$routes->get('about', 'Pages::showme/about');
//Posts
$routes->get('{locale}/blog/create', 'Blog::create');
$routes->get('{locale}/blog/(:any)', 'Blog::post/$1');
//Login/Logout y Registro
$routes->match(['get','post'],'{locale}/registro','Users::registro');
$routes->match(['get','post'],'{locale}/login','Users::index');
$routes->get('{locale}/logout','Users::logout');
//Cuenta
$routes->match(['get','post'],'{locale}/mi-cuenta','Users::perfil');

$routes->get('{locale}/', 'Pages::index');
$routes->get('{locale}/(:any)', 'Pages::showme/$1');

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
