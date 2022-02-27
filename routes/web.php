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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

//TEKNISI HAK AKSES
    //DAFTAR
        Route::get('/teknisi/daftar', 'App\Http\Controllers\TeknisiController@indexDaftar');
        Route::post('/teknisi/daftar', 'App\Http\Controllers\TeknisiController@prosesDaftar')->name('daftarTeknisi');

    //LOGIN
        Route::get('/index', 'App\Http\Controllers\TeknisiController@indexLogin');
        Route::post('/index', 'App\Http\Controllers\TeknisiController@prosesLogin')->name('loginTeknisi');
        Route::get('/teknisi/beranda', 'App\Http\Controllers\TeknisiController@indexBeranda');
    //LOGOUT
        Route::post('/logoutTeknisi', 'App\Http\Controllers\TeknisiController@logoutTeknisi')->name('logoutTeknisi');

    //DATA PEMILIK / OWNER KENDARAAN
        Route::get('/teknisi/dataPemilik', 'App\Http\Controllers\KelolaOwnerController@indexDataPemilik');
        Route::get('/teknisi/tambahPemilik', 'App\Http\Controllers\KelolaOwnerController@indexTambahPemilik');
        Route::post('/teknisi/tambahPemilik', 'App\Http\Controllers\KelolaOwnerController@prosesTambahPemilik')->name('TambahPemilik');
        Route::patch('/teknisi/dataPemilik/{dataOwner}', 'App\Http\Controllers\KelolaOwnerController@editPemilik');
    
    //DATA TEKNISI KESELURUHAN
        Route::get('/teknisi/dataTeknisi', 'App\Http\Controllers\TeknisiController@indexDataTeknisi');
        Route::patch('/teknisi/dataTeknisi/{dataTeknisi}', 'App\Http\Controllers\TeknisiController@editTeknisi');
    
    //DATA KATEGORI SERVIS
        Route::get('/service/dataServiceKategori', 'App\Http\Controllers\ServiceKategoriController@indexKategoriServis');
        Route::patch('/service/dataServiceKategori/{dataServis}', 'App\Http\Controllers\ServiceKategoriController@editKategoriServis');
        Route::get('/service/tambahKategoriServis', 'App\Http\Controllers\ServiceKategoriController@indexTambahServis');
        Route::post('/service/tambahKategoriServis', 'App\Http\Controllers\ServiceKategoriController@tambahKategori')->name('prosesTambahKategori');

    //KELOLA PERBAIKAN
        Route::get('/kelola perbaikan/index', 'App\Http\Controllers\KelolaPerbaikanController@indexKelola');
        Route::post('/kelola perbaikan/index', 'App\Http\Controllers\KelolaPerbaikanController@prosesTambahService')->name('prosesTambahService');
        Route::patch('/kelola perbaikan/index/{dataPerbaikan}', 'App\Http\Controllers\KelolaPerbaikanController@editKelolaPerbaikan');
    
    //MANAJEMEN KERJA
        Route::get('/teknisi/manajemenKerja', 'App\Http\Controllers\TeknisiController@indexKerja');
//==========================================================================================================
//OWNER HAK AKSES
    //LOGIN
        Route::get('/loginPemilik', 'App\Http\Controllers\OwnerController@loginPemilik');
        Route::post('/loginPemilik', 'App\Http\Controllers\OwnerController@prosesLoginPemilik')->name('prosesLoginPemilik');

    //LOGOUT
        Route::post('/logoutOwner', 'App\Http\Controllers\OwnerController@logoutOwner')->name('logoutOwner');
        
        
        Route::get('/owner', 'App\Http\Controllers\OwnerController@indexDataOwner');