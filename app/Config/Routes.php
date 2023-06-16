<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Dashboard::index', ['filter' => 'usersAuth']);
$routes->get('/signup', 'Login::signup');
$routes->get('/signin', 'Login::index');
$routes->post('/signin/process', 'Login::process');
$routes->get('/logout', 'Login::logout');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'usersAuth']);
//Akses User
$routes->get('/setting', 'User::setting', ['filter' => 'usersAuth']);
$routes->get('/tambah-pengguna', 'User::add', ['filter' => 'usersAuth']);
$routes->get('user/edit/(:num)', 'User::edit/$1', ['filter' => 'usersAuth']);
$routes->get('user/delete/(:num)', 'User::delete/$1', ['filter' => 'usersAuth']);
// Kapal
$routes->group('kapal', ['filter' => 'usersAuth'], static function($routes)
{
    $routes->get('tambah','Kapal::add');
    $routes->get('store','Kapal::store');
    $routes->get('edit/(:num)','Kapal::edit/$1');
    $routes->get('delete/(:num)','Kapal::delete/$1');
});
$routes->get('datakapal', 'Kapal::ajax_kapal');
// Ikan
$routes->group('ikan', ['filter' => 'usersAuth'], static function($routes)
{
    $routes->get('tambah','Ikan::add');
    $routes->get('store','Ikan::store');
    $routes->get('edit/(:num)','Ikan::edit/$1');
    $routes->get('delete/(:num)','Ikan::delete/$1');
});
$routes->get('dataikan', 'Ikan::ajax_ikan');
// Tangkahan
$routes->group('tangkahan', ['filter' => 'usersAuth'], static function($routes)
{
    $routes->get('tambah','Tangkahan::add');
    $routes->get('store','Tangkahan::store');
    $routes->get('edit/(:num)','Tangkahan::edit/$1');
    $routes->get('delete/(:num)','Tangkahan::delete/$1');
});
$routes->get('datatangkahan', 'Tangkahan::ajax_tangkahan');
// Pengguna
$routes->get('/pengguna', 'Pengguna::index', ['filter' => 'usersAuth']);
$routes->get('/pengguna-add', 'Pengguna::add', ['filter' => 'usersAuth']);
$routes->get('pengguna/edit/(:num)', 'Pengguna::edit/$1', ['filter' => 'usersAuth']);
// Kedatangan
$routes->get('/kedatangan', 'Kedatangan::index', ['filter' => 'usersAuth']);
$routes->get('/kedatangan-add', 'Kedatangan::add', ['filter' => 'usersAuth']);
$routes->get('kedatangan/edit/(:num)', 'Kedatangan::edit/$1', ['filter' => 'usersAuth']);
$routes->get('datakedatangan', 'Kedatangan::ajax_kedatangan');
//Multi-language functionality 
$routes->get('/lang/{locale}', 'Language::index', ['filter' => 'usersAuth']);
// Keberangkatan
$routes->get('/keberangkatan', 'Keberangkatan::index', ['filter' => 'usersAuth']);
$routes->get('/keberangkatan-add', 'Keberangkatan::add', ['filter' => 'usersAuth']);
$routes->get('datakeberangkatan', 'Keberangkatan::ajax_keberangkatan');
// Bongkar
$routes->get('/bongkar', 'Bongkar::index', ['filter' => 'usersAuth']);
$routes->get('/approvebongkar', 'Bongkar::approve', ['filter' => 'usersAuth']);
$routes->get('bongkar/approve/(:num)', 'Bongkar::edit/$1', ['filter' => 'usersAuth']);
$routes->get('/bongkar-add', 'Bongkar::add', ['filter' => 'usersAuth']);
$routes->get('bongkar/print/(:num)', 'Bongkar::cetak/$1', ['filter' => 'usersAuth']);
$routes->get('databongkar', 'Bongkar::ajax_bongkar');
$routes->get('dataapprove', 'Bongkar::ajax_approve');
// Olah Gerak
$routes->get('/olahgerak', 'Olahgerak::index', ['filter' => 'usersAuth']);
$routes->get('/olah-add', 'Olahgerak::add', ['filter' => 'usersAuth']);
$routes->get('olah/edit/(:num)', 'Olahgerak::edit/$1', ['filter' => 'usersAuth']);
$routes->get('dataolah', 'Olahgerak::ajax_olahgerak');
//Laporan
$routes->get('/lap-kapal', 'Laporan::kapal', ['filter' => 'usersAuth']);
$routes->get('/lap-kedatangan', 'Laporan::Kedatangan', ['filter' => 'usersAuth']);
$routes->get('/lap-keberangkatan', 'Laporan::Keberangkatan', ['filter' => 'usersAuth']);
$routes->get('/lap-jenisikan', 'Laporan::jenis_ikan', ['filter' => 'usersAuth']);
$routes->get('/lap-gt', 'Laporan::gt', ['filter' => 'usersAuth']);
$routes->get('/lap-alattangkap', 'Laporan::alat_tangkap', ['filter' => 'usersAuth']);
//Api
//$routes->resource('api/kapal', ['filter' => 'apiFilter']);
$routes->resource('api/ikan',['filter' => 'apiFilter']);
$routes->get('api/getikan', 'Api\Ikan::getIkan');
$routes->resource('api/kedatangan');
$routes->resource('api/keberangkatan');
$routes->resource('api/kapal');
$routes->get('api/getkapal', 'Api\Kapal::getKapal');
$routes->get('api/getkapal/(:num)', 'Api\Kapal::getKapal/$1');
//$routes->resource('api/register');
$routes->post('api/register', 'Api\Register::index');
//Jadwal
$routes->get('/jadwal','Jadwal::index' );
//Posisi
$routes->get('/posisi','Posisi::index', ['filter' => 'usersAuth']);
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
