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
$routes->setDefaultController('Home');
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
$routes->get('/', 'Home::index',['as' => 'dashboard', 'filter' => 'isLogged']);

//GROUP DASHBOARD
$routes->get('/dashboard', 'Home::index',['filter' => 'isLogged']);
$routes->group('/dashboard','Home::index',['filter','isLogged'],function($routes){
    $routes->get('pengguna','Home::pengguna',['as' => 'pengguna']);
    $routes->get('pengguna/tambah','Home::tambahPengguna',['as' => 'tambahPengguna']);
    $routes->post('pengguna/tambah','Home::aksiTambahPengguna');
});
//TELE GROUP
$routes->group('/tele',function($routes){
    $routes->get('cek/(:num)','Tele::cekId/$1');
    $routes->post('tambah','Tele::add');
    $routes->get('perintah/(:num)','Tele::cekCommand/$1');
    $routes->get('barang','Tele::allBarang');
    $routes->get('barang/(:segment)','Tele::cekKode/$1');
    $routes->get('update/(:num)/(:num)/(:segment)','Tele::setCmd/$1/$2/$3');
    $routes->get('login/(:num)','Tele::loginTele/$1');
    $routes->get('tambah/(:num)','Tele::chatId/$1');
    $routes->get('hapus/(:num)','Tele::hapusCmd/$1');
});
//GROUP BARANG
$routes->group('/barang',['filter','isLogged'],function($routes){
    $routes->get('masuk','Barang::barangMasuk',['as' => 'barangMasuk']);
    $routes->get('masuk/tambah','Barang::pageTambahBarangMasuk',['as' => 'tambahBarangMasuk']);
    $routes->post('masuk/tambah','Barang::aksiTambahBarangMasuk');
    $routes->get('masuk/hapus/(:num)','Barang::hapusBarangMasuk/$1',['as' => 'hapusBarangMasuk']);
    //keluar
    $routes->get('keluar/hapus/(:num)','Barang::hapusBarangKeluar/$1',['as' => 'hapusBarangKeluar']);
    $routes->get('keluar','Barang::barangKeluar',['as' => 'barangKeluar']);
    $routes->post('keluar/tambah','Barang::aksiTambahBarangKeluar');
    $routes->get('keluar/tambah','Barang::pageTambahBarangKeluar',['as' => 'tambahBarangKeluar']);
    $routes->get('keluar/approve','Barang::approveKeluar',['as' => 'approveKeluar']);
    $routes->get('keluar/approve/(:num)','Barang::actApproveKeluar/$1');
    //ada
    $routes->get('jenis','Barang::jenisBarang',['as' => 'jenisBarang']);
    $routes->get('jenis/tambah','Barang::tambahJenisBarang',['as' => 'tambahJenisBarang']);
    $routes->post('jenis/tambah','Barang::actTambahJenisBarang');
});

//GROUP SUPPLIER
$routes->get('/supplier','Supplier::index',['filter' => 'isLogged','as' => 'supplier']);
$routes->group('/supplier',['filter','isLogged'],function($routes){
    $routes->get('hapus/(:num)','Supplier::hapus/$1');
    $routes->get('edit/(:num)','Supplier::edit/$1');
    $routes->put('edit','Supplier::actEdit');
    $routes->get('tambah','Supplier::add',['as' => 'tambahSupplier']);;
    $routes->post('tambah','Supplier::actAdd');
});



//GROUP GUDANG
$routes->get('/gudang','Gudang::index',['filter' => 'isLogged','as' => 'gudang']);
$routes->group('/gudang',['filter','isLogged'],function($routes){
    $routes->get('hapus/(:num)','Gudang::delete/$1');
    $routes->get('edit/(:num)','Gudang::edit/$1');
    $routes->put('edit-gudang','Gudang::actEdit');
    $routes->get('tambah','Gudang::add',['as' => 'tambahGudang']);;
    $routes->post('tambah','Gudang::actAdd');
});

//GROUP LAPORAN
$routes->group('/laporan',['filter' => 'isLogged'],function($routes){
    $routes->get('supplier','Supplier::laporan',['as' => 'laporanSupplier']);
    $routes->get('gudang','Gudang::laporan',['as' => 'laporanGudang']);
    $routes->get('barang-masuk','Barang::laporanBarangMasuk',['as' => 'laporanBarangMasuk']);
    $routes->get('barang-keluar','Barang::laporanBarangKeluar',['as' => 'laporanBarangKeluar']);
});
//GROUP EXPORT
$routes->group('export',['filter' => 'isLogged'],function($routes){
    $routes->get('supplier','Supplier::export',['as' => 'exportSupplier']);
    $routes->get('gudang','Gudang::export',['as' => 'exportGudang']);
    $routes->get('barang-masuk','Barang::exportBarangMasuk',['as' => 'exportBarangMasuk']);
    $routes->get('barang-keluar','Barang::exportBarangKeluar',['as' => 'exportBarangKeluar']);
});

//GROUP AUTH
$routes->group('/auth',['filter','notLogged'],function($routes){
    $routes->get('login','Auth::halamanLogin',['as' => 'login']);
    $routes->post('login','Auth::aksiLogin');
    $routes->get('logout','Auth::logout',['as' => 'logout']);
});
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
