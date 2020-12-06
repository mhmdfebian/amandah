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

Route::get('/dashboard/{tanggal}', 'HomeController@index');
Route::delete('/dashboard/{tanggal}', 'HomeController@destroyAbsen');
Route::delete('/sertifikasi/{id}', 'HomeController@destroySertifikat');




Route::get('/sendEmail', 'HomeController@sendEmail');


Route::get('/form','HomeController@form');
Route::post('/form/karyawan', 'HomeController@karyawan')->name('idkaryawan');
Route::post('/tambah-sertifikat/sertifikat', 'HomeController@sertifill')->name('idsertifikat');
Route::post('/sertifikasi', 'HomeController@storesertif');

Route::get('/tambah-sertifikat', 'HomeController@tambahsertifikat');



Route::post('/question', 'HomeController@question');
Route::post('/dashboard/{tanggal}', 'HomeController@store');

Route::get('/','HomeController@login')->name('signin');
Route::post('/signin','HomeController@masuk')->name('signin');
Route::get('/logout','HomeController@logout')->name('logout');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/sertifikasi', 'HomeController@sertifikat');


Route::get('/notifikasi', 'HomeController@notif');



Route::get('/daftar-pekerja', function () {
    return view('/pekerja/daftarPekerja');
});

Route::get('/tambah-pekerja', function () {
    return view('/pekerja/tambahPekerja');
});


Route::get('/vendor/datatables/print', function () {
    return view('print');
});





