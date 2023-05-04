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
$routes->get('/dashboard_guru', 'Home::index');
$routes->get('/dashboard_tu', 'HomeTu::index');
$routes->get('/dashboard_siswa', 'HomeSiswa::index');

$routes->group('guru', static function ($routes) {
    $routes->get('/', 'GuruController::index');
    $routes->get('create', 'GuruController::create');
    $routes->delete('(:num)', 'GuruController::delete/$1');
    $routes->get('edit/(:segment)', 'GuruController::edit/$1');
    $routes->post('update/(:segment)', 'GuruController::update/$1');
    $routes->post('save', 'GuruController::save');
});

$routes->group('mapel', static function ($routes) {
    $routes->get('/', 'MapelController::index');
    $routes->get('create', 'MapelController::create');
    $routes->delete('(:num)', 'MapelController::delete/$1');
    $routes->get('edit/(:num)', 'MapelController::edit/$1');
    $routes->post('update/(:num)', 'MapelController::update/$1');
    $routes->post('save', 'MapelController::save');
});

$routes->group('jurusan', static function ($routes) {
    $routes->get('/', 'JurusanController::index');
    $routes->get('create', 'JurusanController::create');
    $routes->delete('(:num)', 'JurusanController::delete/$1');
    $routes->get('edit/(:segment)', 'JurusanController::edit/$1');
    $routes->post('update/(:segment)', 'JurusanController::update/$1');
    $routes->post('save', 'JurusanController::save');
});

$routes->group('kelas', static function ($routes) {
    $routes->get('/', 'KelasController::index');
    $routes->get('(:num)', 'KelasController::detail/$1');
    $routes->get('create_detail/(:any)', 'KelasController::create_detail/$1');
    $routes->post('save_detail/(:any)', 'KelasController::save_detail/$1');
    $routes->delete('delete_detail/(:num)', 'KelasController::delete_detail/$1');
    $routes->post('update_detail/(:num)', 'KelasController::update_detail/$1');
    $routes->get('edit_detail/(:num)', 'KelasController::edit_detail/$1');
    $routes->get('create', 'KelasController::create');
    $routes->delete('(:num)', 'KelasController::delete/$1');
    $routes->get('edit/(:segment)', 'KelasController::edit/$1');
    $routes->post('update/(:segment)', 'KelasController::update/$1');
    $routes->post('save', 'KelasController::save');
});

$routes->group('kegiatan', static function ($routes) {
    $routes->get('/', 'Kegiatan::index');
    $routes->get('create', 'Kegiatan::create');
    $routes->delete('(:num)', 'Kegiatan::delete/$1');
    $routes->get('edit/(:segment)', 'Kegiatan::edit/$1');
    $routes->post('update/(:segment)', 'Kegiatan::update/$1');
    $routes->post('save', 'Kegiatan::save');
    $routes->get('(:any)', 'Kegiatan::detail/$1');
});

$routes->group('siswa', static function ($routes) {
    $routes->get('/', 'SiswaController::index');
    $routes->get('create', 'SiswaController::create');
    $routes->delete('(:num)', 'SiswaController::delete/$1');
    $routes->post('update/(:segment)', 'SiswaController::update/$1');
    $routes->post('save', 'SiswaController::save');
    $routes->get('(:any)', 'SiswaController::detail/$1');
});
// /nilai/$n[id_siswa]
$routes->group('nilai', static function ($routes) {
    $routes->get('/', 'NilaiController::index');
    $routes->get('create', 'NilaiController::create');
    $routes->delete('(:num)', 'NilaiController::delete/$1');
    $routes->post('save', 'NilaiController::save');
    $routes->get('(:num)', 'NilaiController::detail/$1');
    $routes->post('(:num)', 'NilaiController::storeRapot/$1');
    $routes->post('update/(:num)', 'NilaiController::updateRapot/$1');
    $routes->get('cetak/(:num)', 'NilaiController::cetakRapot/$1');
    $routes->get('editNilai/(:num)', 'NilaiController::editRapot/$1');
});

$routes->post('/login', 'Login::cekLogin');
$routes->get('/', 'Login::index');
$routes->get('/logout', 'Login::logout');


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
