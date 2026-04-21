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
$routes->get('/dashboardbaru', 'DashboardNew::index');
$routes->get('/signup', 'Login::signup');
$routes->get('/signin', 'Login::index');
$routes->post('/signin/process', 'Login::process');
$routes->get('/logout', 'Login::logout');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'usersAuth']);
$routes->get('/faq', 'Dashboard::faq');
//Akses User
$routes->get('/setting', 'User::setting', ['filter' => 'usersAuth']);
$routes->get('/tambah-pengguna', 'User::add', ['filter' => 'usersAuth']);
$routes->get('user/edit/(:num)', 'User::edit/$1', ['filter' => 'usersAuth']);
$routes->get('user/delete/(:num)', 'User::delete/$1', ['filter' => 'usersAuth']);
// Kapal
$routes->get('/kapal', 'Kapal::index', ['filter' => 'usersAuth']);
$routes->get('/kapal-add', 'Kapal::add', ['filter' => 'usersAuth']);
$routes->get('/kapal/store', 'Kapal::store', ['filter' => 'usersAuth']);
$routes->get('kapal/edit/(:num)', 'Kapal::edit/$1', ['filter' => 'usersAuth']);
$routes->get('kapal/delete/(:num)', 'Kapal::delete/$1', ['filter' => 'usersAuth']);
$routes->get('qrcode/(:num)','Kapal::qrcode/$1');
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
$routes->get('/tangkahan', 'Tangkahan::index', ['filter' => 'usersAuth']);
$routes->get('/tangkahan-add', 'Tangkahan::add', ['filter' => 'usersAuth']);
$routes->get('tangkahan/edit/(:num)', 'Tangkahan::edit/$1', ['filter' => 'usersAuth']);
// Pengguna
$routes->get('/pengguna', 'Pengguna::index', ['filter' => 'usersAuth']);
$routes->get('/pengguna-add', 'Pengguna::add', ['filter' => 'usersAuth']);
$routes->get('pengguna/edit/(:num)', 'Pengguna::edit/$1', ['filter' => 'usersAuth']);
$routes->get('pengguna/kapal/(:num)', 'Pengguna::kapal/$1', ['filter' => 'usersAuth']);
$routes->get('pengguna/addkapal/(:num)', 'Pengguna::addkelolaan/$1', ['filter' => 'usersAuth']);
$routes->get('pengguna/savekelolaan', 'Pengguna::savekelolaan', ['filter' => 'usersAuth']);
// Kedatangan
$routes->get('/kedatangan', 'Kedatangan::index', ['filter' => 'usersAuth']);
$routes->get('/kedatangan-add', 'Kedatangan::add', ['filter' => 'usersAuth']);
$routes->get('kedatangan/edit/(:num)', 'Kedatangan::edit/$1', ['filter' => 'usersAuth']);
$routes->get('datakedatangan', 'Kedatangan::ajax_kedatangan');
$routes->get('datakedatangan_pengurus', 'Kedatangan::ajax_kedatangan_pengurus', ['filter' => 'usersAuth']);
$routes->get('/kedatangan/approve/(:num)', 'Kedatangan::approve/$1',['filter' => 'usersAuth']);
$routes->get('/pengurus/kedatangan', 'Kedatangan::index_pengurus', ['filter' => 'usersAuth']);
//Multi-language functionality 
$routes->get('/lang/{locale}', 'Language::index', ['filter' => 'usersAuth']);
// Keberangkatan
$routes->get('/keberangkatan', 'Keberangkatan::index', ['filter' => 'usersAuth']);
$routes->get('/keberangkatanapprove', 'Keberangkatan::index_approve', ['filter' => 'usersAuth']);
$routes->get('/keberangkatan-add', 'Keberangkatan::add', ['filter' => 'usersAuth']);
$routes->get('datakeberangkatan', 'Keberangkatan::ajax_keberangkatan');
$routes->get('/keberangkatan/approve/(:num)', 'Keberangkatan::approve/$1',['filter' => 'usersAuth']);
$routes->get('/keberangkatan/approval/(:num)', 'Keberangkatan::approval/$1',['filter' => 'usersAuth']);
$routes->get('databerangkat', 'Keberangkatan::ajax_keberangkatan');
$routes->get('datakeberangkatan_pengurus', 'Keberangkatan::ajax_keberangkatan_pengurus', ['filter' => 'usersAuth']);
$routes->get('approveberangkat', 'Keberangkatan::approve_keberangkatan');
$routes->get('/pengurus/keberangkatan', 'Keberangkatan::index_pengurus', ['filter' => 'usersAuth']);
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
$routes->get('olah/cetak/(:num)', 'Olahgerak::cetak/$1', ['filter' => 'usersAuth']);
// Upload Surat
$routes->get('/uploadsurat', 'UploadSurat::index', ['filter' => 'usersAuth']);
$routes->get('dataupload', 'UploadSurat::ajax_upload');
$routes->get('/uploadsurat-add', 'UploadSurat::add', ['filter' => 'usersAuth']);
$routes->post('/uploadsurat/store', 'UploadSurat::store', ['filter' => 'usersAuth']);
$routes->get('/uploadsurat/edit/(:num)', 'UploadSurat::edit/$1', ['filter' => 'usersAuth']);
$routes->get('uploadsurat/delete/(:num)', 'UploadSurat::delete/$1', ['filter' => 'usersAuth']);
// SPR Keberangkatan
$routes->get('/sprkeberangkatan', 'SprKeberangkatan::index', ['filter' => 'usersAuth']);
$routes->get('/sprapprove', 'SprKeberangkatan::index_approve', ['filter' => 'usersAuth']);
$routes->get('dataspr', 'SprKeberangkatan::ajax_spr');
$routes->get('datasprapprove', 'SprKeberangkatan::ajax_spr_approve', ['filter' => 'usersAuth']);
$routes->get('/sprkeberangkatan-add', 'SprKeberangkatan::add', ['filter' => 'usersAuth']);
$routes->post('sprkeberangkatan/store', 'SprKeberangkatan::store', ['filter' => 'usersAuth']);
$routes->get('sprkeberangkatan/edit/(:num)', 'SprKeberangkatan::edit/$1', ['filter' => 'usersAuth']);
$routes->post('sprkeberangkatan/update/(:num)', 'SprKeberangkatan::update/$1', ['filter' => 'usersAuth']);
$routes->get('sprkeberangkatan/approve/(:num)', 'SprKeberangkatan::approve/$1', ['filter' => 'usersAuth']);
$routes->post('sprkeberangkatan/approved/(:num)', 'SprKeberangkatan::approved/$1', ['filter' => 'usersAuth']);
$routes->get('sprkeberangkatan/delete/(:num)', 'SprKeberangkatan::delete/$1', ['filter' => 'usersAuth']);
$routes->get('sprkeberangkatan/get_kapal_details/(:num)', 'SprKeberangkatan::get_kapal_details/$1');
// Jasa Peralatan
$routes->get('/peralatan', 'JasaPeralatan::index', ['filter' => 'usersAuth']);
$routes->get('datajasa', 'JasaPeralatan::ajax_jasa');
$routes->get('/peralatan-add', 'JasaPeralatan::add', ['filter' => 'usersAuth']);
$routes->post('peralatan/storeorder', 'JasaPeralatan::storeorder', ['filter' => 'usersAuth']);
$routes->get('/peralatan/edit/(:num)', 'JasaPeralatan::edit/$1', ['filter' => 'usersAuth']);
$routes->get('/peralatan/bayar/(:num)', 'JasaPeralatan::bayar/$1', ['filter' => 'usersAuth']);
$routes->get('/peralatan/detail/(:num)', 'JasaPeralatan::detail/$1', ['filter' => 'usersAuth']);
$routes->get('/peralatan/cetakorder/(:num)', 'JasaPeralatan::cetakorder/$1', ['filter' => 'usersAuth']);
$routes->get('/peralatan/cetakperhitungan/(:num)', 'JasaPeralatan::cetakperhitungan/$1', ['filter' => 'usersAuth']);
$routes->get('peralatan/delete/(:num)', 'JasaPeralatan::delete/$1', ['filter' => 'usersAuth']);
$routes->post('peralatan/prosesbayar/(:num)', 'JasaPeralatan::prosesbayar/$1');
// Jasa Ice Cruiser
$routes->get('/ice', 'JasaIce::index', ['filter' => 'usersAuth']);
$routes->get('dataice', 'JasaIce::ajax_jasa');
$routes->get('/ice-add', 'JasaIce::add', ['filter' => 'usersAuth']);
$routes->post('ice/storeorder', 'JasaIce::storeorder', ['filter' => 'usersAuth']);
$routes->get('/ice/edit/(:num)', 'JasaIce::edit/$1', ['filter' => 'usersAuth']);
$routes->get('/ice/bayar/(:num)', 'JasaIce::bayar/$1', ['filter' => 'usersAuth']);
$routes->get('/ice/detail/(:num)', 'JasaIce::detail/$1', ['filter' => 'usersAuth']);
$routes->get('/ice/cetakorder/(:num)', 'JasaIce::cetakorder/$1', ['filter' => 'usersAuth']);
$routes->get('/ice/cetakperhitungan/(:num)', 'JasaIce::cetakperhitungan/$1', ['filter' => 'usersAuth']);
$routes->get('ice/delete/(:num)', 'JasaIce::delete/$1', ['filter' => 'usersAuth']);
$routes->post('ice/prosesbayar/(:num)', 'JasaIce::prosesbayar/$1');
// Jasa Air Tawar
$routes->get('/air', 'JasaAir::index', ['filter' => 'usersAuth']);
$routes->get('dataair', 'JasaAir::ajax_jasa');
$routes->get('/air-add', 'JasaAir::add', ['filter' => 'usersAuth']);
$routes->post('/air/storeorder', 'JasaAir::store', ['filter' => 'usersAuth']);
$routes->get('/air/cetakorder/(:num)', 'JasaAir::cetakorder/$1', ['filter' => 'usersAuth']);
$routes->get('/air/edit/(:num)', 'JasaAir::edit/$1', ['filter' => 'usersAuth']);
$routes->get('/air/bayar/(:num)', 'JasaAir::bayar/$1', ['filter' => 'usersAuth']);
$routes->post('air/prosesbayar/(:num)', 'JasaAir::prosesbayar/$1');
//$routes->post('/jasaair/prosesbayar/(:num)', 'JasaAir::prosesbayar/$1', ['filter' => 'usersAuth']);
$routes->get('/air/cetakperhitungan/(:num)', 'JasaAir::cetakperhitungan/$1', ['filter' => 'usersAuth']);
//Laporan
$routes->get('/lap-kapal', 'Laporan::kapal', ['filter' => 'usersAuth']);
$routes->get('/lap-kedatangan', 'Laporan::Kedatangan', ['filter' => 'usersAuth']);
$routes->get('/lap-keberangkatan', 'Laporan::Keberangkatan', ['filter' => 'usersAuth']);
$routes->get('/lap-jenisikan', 'Laporan::jenis_ikan', ['filter' => 'usersAuth']);
$routes->get('/lap-gt', 'Laporan::gt', ['filter' => 'usersAuth']);
$routes->get('/lap-alattangkap', 'Laporan::alat_tangkap', ['filter' => 'usersAuth']);
//Api
$routes->resource('api/kapal', ['filter' => 'apiFilter']);
$routes->resource('api/ikan',['filter' => 'apiFilter']);
//$routes->resource('api/kedatangan');
//$routes->resource('api/keberangkatan');
//$routes->resource('api/register');
$routes->group('api/v1', static function($routes)
{
    $routes->post('register','Api\Register::index');
    $routes->post('login','Api\Login::index');
    $routes->post('savekelolaan','Api\Login::savekelolaan', ['filter' => 'apiFilter']);
    $routes->post('resetpassword/(:num)','Api\Login::updatepassword', ['filter' => 'apiFilter']);
    $routes->post('updateprofile/(:num)','Api\Login::updateprofile/$1', ['filter' => 'apiFilter']);
    $routes->get('kapal/pengurus/(:num)','Api\Login::getKapalbyID/$1');
    $routes->get('showprofile/(:num)','Api\Login::show/$1');
    $routes->get('dashboard', 'Api\Dashboard::index', ['filter' => 'apiFilter']);
    $routes->get('qrcode/(:num)', 'Api\Kapal::getQRByID/$1', ['filter' => 'apiFilter']);
    $routes->get('kapal', 'Api\Kapal::index', ['filter' => 'apiFilter']);
    $routes->get('dermaga', 'Api\Dermaga::index', ['filter' => 'apiFilter']);
    $routes->get('ikan', 'Api\Ikan::index', ['filter' => 'apiFilter']);
    $routes->get('kedatangan', 'Api\Kedatangan::index');
    $routes->post('kedatangan/add', 'Api\Kedatangan::create');
    $routes->get('kedatangan/cari', 'Api\Kedatangan::getSearchKedatangan');  
    $routes->get('kedatangan/pengurus/(:num)', 'Api\Kedatangan::getKeberbyID/$1');
    $routes->get('keberangkatan', 'Api\Keberangkatan::index');
    $routes->post('keberangkatan/add', 'Api\Keberangkatan::create');
    $routes->get('keberangkatan/pengurus/(:num)', 'Api\Keberangkatan::getKeberbyID/$1');
    $routes->get('keberangkatan/cari', 'Api\Keberangkatan::getSearchKeberangkatan'); 
});
//Jadwal
$routes->get('/jadwal','Jadwal::index' );
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
