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

//---------------------------------------------------
//ADMIN

$routes->match(['get','post'], 'admin/','Users::adminUsuarios');
$routes->match(['get','post'], '{locale}/admin/','Users::adminUsuarios');

//crear
$routes->match(['get','post'], 'admin/noticia','Noticias::create');
$routes->match(['get','post'], '{locale}/admin/noticia','Noticias::create');
//editar
$routes->match(['get','post'], 'admin/noticia/editar/(:num)','Noticias::edit/$1');
$routes->match(['get','post'], '{locale}/admin/noticia/editar/(:num)','Noticias::edit/$1');
//tabla
$routes->match(['get','post'], 'admin/noticias','Noticias::adminNoticias');
$routes->match(['get','post'], '{locale}/admin/noticias','Noticias::adminNoticias');
//taxonomias
$routes->match(['get','post'], 'admin/categorias/noticia','Noticias::taxonomias');
$routes->match(['get','post'], '{locale}/admin/categorias/noticia','Noticias::taxonomias');

//crear
$routes->match(['get','post'], 'admin/evento','Eventos::create');
$routes->match(['get','post'], '{locale}/admin/evento','Eventos::create');
//editar
$routes->match(['get','post'], 'admin/evento/editar/(:num)','Eventos::edit/$1');
$routes->match(['get','post'], '{locale}/admin/evento/editar/(:num)','Eventos::edit/$1');
//tabla
$routes->match(['get','post'], 'admin/eventos','Eventos::adminEventos');
$routes->match(['get','post'], '{locale}/admin/eventos','Eventos::adminEventos');
//taxonomias
$routes->match(['get','post'], 'admin/categorias/evento','Eventos::taxonomias');
$routes->match(['get','post'], '{locale}/admin/categorias/evento','Eventos::taxonomias');

//crear
$routes->match(['get','post'], 'admin/protocolo','Protocolos::create');
$routes->match(['get','post'], '{locale}/admin/protocolo','Protocolos::create');
//editar
$routes->match(['get','post'], 'admin/protocolo/editar/(:num)','Protocolos::edit/$1');
$routes->match(['get','post'], '{locale}/admin/protocolo/editar/(:num)','Protocolos::edit/$1');
//tabla
$routes->match(['get','post'], 'admin/protocolos','Protocolos::adminProtocolos');
$routes->match(['get','post'], '{locale}/admin/protocolos','Protocolos::adminProtocolos');
//taxonomias
$routes->match(['get','post'], 'admin/categorias/protocolo','Protocolos::taxonomias');
$routes->match(['get','post'], '{locale}/admin/categorias/protocolo','Protocolos::taxonomias');

// users
// tabla
$routes->match(['get','post'], 'admin/usuarios','Users::adminUsuarios');
$routes->match(['get','post'], '{locale}/admin/usuarios','Users::adminUsuarios');
// crear usuario
$routes->match(['get','post'], 'admin/usuario','Users::adminUsersRegistro');
$routes->match(['get','post'], '{locale}/admin/usuario','Users::adminUsersRegistro');

//configuraciones
$routes->match(['get','post'], 'admin/configuraciones','Configuraciones::index');
$routes->match(['get','post'], '{locale}/admin/configuraciones','Configuraciones::index');

//-----------------

//Institucional
$routes->get('institucional','Institucional::index');
$routes->get('{locale}/institucional','Institucional::index');
//Institucional Subpaginas
$routes->get('institucional/(:any)','Institucional::subpaginas/$1');
$routes->get('{locale}/institucional/(:any)','Institucional::subpaginas/$1');


//Posts

//Eventos
$routes->get('eventos','Eventos::index');
$routes->get('{locale}/eventos','Eventos::index');

$routes->get('eventos/(:any)','Eventos::evento/$1');
$routes->get('{locale}/eventos/(:any)','Eventos::evento/$1');

//Noticias
$routes->get('noticias','Noticias::index');
$routes->get('{locale}/noticias','Noticias::index');

$routes->get('noticias/(:any)','Noticias::noticia/$1');
$routes->get('{locale}/noticias/(:any)','Noticias::noticia/$1');

//Protocolos
$routes->get('protocolos','Protocolos::index/index',['filter' => 'memberAuth']);
$routes->get('{locale}/protocolos','Protocolos::index/index',['filter' => 'memberAuth']);

$routes->get('protocolos/(:any)','Protocolos::protocolo/$1',['filter' => 'memberAuth']);
$routes->get('{locale}/protocolos/(:any)','Protocolos::protocolo/$1',['filter' => 'memberAuth']);

//Contacto
$routes->get('contacto','Contacto::index');
$routes->get('{locale}/contacto','Contacto::index');

//About
$routes->get('about', 'Pages::showme/about');


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
