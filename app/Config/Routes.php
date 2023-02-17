<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/kontak', 'Dashboard::kontak');
$routes->get('/logout', 'Login::logout');
$routes->get('/plugin/rules', 'Configplugin::rules');
$routes->get('/plugin/aidecision', 'Configplugin::aidecision');
$routes->get('/delete', 'Dashboard::delete');
$routes->get('/consol/jurnal', 'Consolidation::consolidation');
$routes->get('/digitalsign', 'Consolidation::digital_sign');
$routes->get('/calender', 'Dashboard::calender');
$routes->get('/performance/company', 'Performance::company');
$routes->get('/performance/agent', 'Performance::agent');
$routes->get('/pdf/attachment-1', 'Anotate::anotated');
$routes->get('/pdf/attachment-2', 'Anotate::Attachment');
$routes->match(['get', 'post'], '/api/cekongkir', 'CekOngkir::cek');
$routes->match(['get', 'post'], '/pdf/attachment/delete', 'Anotate::delete');
$routes->match(['get', 'post'], '/pdf/attachment/save', 'Anotate::save');
$routes->match(['get', 'post'], '/pdf/attachment/upload', 'Anotate::upload');
$routes->match(['get', 'post'], '/pdf/attachment/download', 'Anotate::download');
/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
