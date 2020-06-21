<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//=====================PEMESANAN ADMIN=============
Route::get('/halaman_admin/pemesanan/pemesanan', 'PemesananAdminController@index');
Route::get('/halaman_admin/pemesanan/tambah', 'PemesananAdminController@create');
Route::post('/halaman_admin/pemesanan/tambah/proses','PemesananAdminController@store');
Route::get('/halaman_admin/pemesanan/edit/{id}','PemesananAdminController@edit');
Route::put('/halaman_admin/pemesanan/edit/proses/{id}','PemesananAdminController@update');
Route::get('/halaman_admin/pemesanan/download/{file}', 'PemesananAdminController@download');
Route::delete('/halaman_admin/pemesanan/hapus/{id}','PemesananAdminController@destroy');
///====================PEMESANAN===================
Route::get('/pemesanan/pemesanan', 'PemesananController@index');
Route::get('/pemesanan/tambah', 'PemesananController@create');
Route::post('/pemesanan/tambah/proses','PemesananController@store');
Route::get('/pemesanan/edit/{id}','PemesananController@edit');
Route::put('/pemesanan/edit/proses/{id}','PemesananController@update');


Route::get('/pemesanan/tambah2', 'PemesananController@create2');
Route::post('/pemesanan/tambah2/proses','PemesananController@store2');
Route::get('/pemesanan/edit2/{id}','PemesananController@edit2');
Route::put('/pemesanan/edit2/proses/{id}','PemesananController@update2');
//==================TRANSFER ADMIN==================
Route::get('/halaman_admin/transfer/transfer', 'TransferAdminController@index');
Route::delete('/halaman_admin/transfer/hapus/{id}','TransferAdminController@destroy');
//========================Detail Pemesanan=========================
Route::get('/detail_pemesanan/detail_pemesanan', 'DetailController@index');
Route::get('/detail_pemesanan/tambah', 'DetailController@create');
Route::post('/detail_pemesanan/tambah/proses','DetailController@store');
Route::get('/detail_pemesanan/edit/{id}','DetailController@edit');
Route::put('/detail_pemesanan/edit/proses/{id}','DetailController@update');


Route::get('/halaman_admin/detail_pemesanan', 'DetailController@indexadmin');
Route::get('/halaman_admin/detail_pemesanan/edit/{id}','DetailController@edit');
Route::put('/halaman_admin/detail_pemesanan/edit/proses/{id}','DetailController@update');
Route::get('/halaman_admin/detail_pemesanan/download/{file}', 'DetailController@download');
Route::delete('/halaman_admin/detail_pemesanan/hapus/{id}','DetailController@destroy');

///====================Transfer===================
Route::get('/transfer/transfer', 'TransferController@index');
Route::get('/transfer/tambah', 'TransferController@create');
Route::post('/transfer/tambah/proses','TransferController@store');

///============================INDEX=====================
Route::get('/index', 'IndexController@index')->name('index');
Route::get('/tracking', 'IndexController@tracking')->name('halaman_admin/tracking');

///======================LOGIN ADMIN=======================
Route::get('/halaman_admin/dashboard', 'LoginController@index');
Route::get('/loginadmin', 'LoginController@loginadmin');
Route::post('/loginadminPost', 'LoginController@loginadminPost');
Route::get('/registeradmin', 'LoginController@registeradmin');
Route::post('/registeradminPost', 'LoginController@registeradminPost');
Route::get('/logoutadmin', 'LoginController@logoutadmin');


//------------------------ADMIN----------------------------------
Route::get('/halaman_admin/listadmin', 'AdminController@listadmin');
Route::get('/halaman_admin/dashboard', 'AdminController@dashboard')->name('dashboard');
Route::get('/halaman_admin/admin', 'AdminController@index')->name('halaman_admin/admin');
Route::get('/halaman_admin/tambah', 'AdminController@create');
Route::get('/halaman_admin/edit/{id}','AdminController@edit');
Route::post('/halaman_admin/tambah/proses','AdminController@store');
Route::put('/halaman_admin/edit/proses/{id}','AdminController@update');
Route::delete('/halaman_admin/admin/hapus/{id}','AdminController@destroy');


//===========================PRODUK================================
Route::get('/halaman_admin/produk/produk', 'ProdukController@index')->name('/halaman_admin/produk/produk');
Route::get('/halaman_admin/produk/tambah', 'ProdukController@create');
Route::get('/halaman_admin/produk/edit/{id}','ProdukController@edit');
Route::post('/halaman_admin/produk/tambah/proses','ProdukController@store');
Route::put('/halaman_admin/produk/edit/proses/{id}','ProdukController@update');
Route::delete('/halaman_admin/produk/hapus/{id}','ProdukController@destroy');


//==========================Login Pelanggan=======================
Route::get('/loginpelanggan', 'LoginController@loginpelanggan');
Route::post('/loginpelangganPost', 'LoginController@loginpelangganPost');
Route::get('/registerpelanggan', 'LoginController@registerpelanggan');
Route::post('/registerpelangganPost', 'LoginController@registerpelangganPost');
Route::get('/logoutpelanggan', 'LoginController@logoutpelanggan');

//======================PELANGGAN======================
Route::get('/halaman_pelanggan/dashboard', 'PelangganController@dashboard');
Route::get('/halaman_pelanggan/pelanggan', 'PelangganController@pelanggan')->name('halaman_pelanggan/pelanggan');
Route::get('/halaman_pelanggan/tambah', 'PelangganController@create');
Route::get('/halaman_pelanggan/edit/{id}','PelangganController@edit');
Route::post('/halaman_pelanggan/tambah/proses','PelangganController@store');
Route::put('/halaman_pelanggan/edit/proses/{id}','PelangganController@update');
Route::delete('/halaman_pelanggan/pelanggan/hapus/{id}','PelangganController@destroy');

//=======================Profil Pelanggan===================
Route::get('/halaman_pelanggan/pelanggan/profil_pelanggan', 'ProfilpelangganController@profil_pelanggan');
Route::get('/halaman_pelanggan/pelanggan/edit/{id}','ProfilpelangganController@edit');
Route::put('/halaman_pelanggan/pelanggan/edit/proses/{id}','ProfilpelangganController@update');

