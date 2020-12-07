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

//Dashboard
Route::get('/dashboard/{tanggal}', 'HomeController@index');
Route::delete('/dashboard/{tanggal}', 'HomeController@destroyAbsen');
Route::post('/dashboard/{tanggal}', 'HomeController@store');
Route::get('/form','HomeController@form');
Route::post('/form/karyawan', 'HomeController@karyawan')->name('idkaryawan');
Route::post('/question', 'HomeController@question');
Route::get('/detail-absen/{idabsen}', 'HomeController@showAbsen');




//Sertifikasi
Route::get('/sertifikasi', 'HomeController@sertifikat');
Route::delete('/sertifikasi/{id}', 'HomeController@destroySertifikat');
Route::post('/sertifikasi', 'HomeController@storesertif');
Route::get('/tambah-sertifikat', 'HomeController@tambahsertifikat');
Route::post('/tambah-sertifikat/sertifikat', 'HomeController@sertifill')->name('idsertifikat');
Route::get('/ubah-sertifikat/{idsertifikat}', 'HomeController@editSertifikat');
Route::patch('/sertifikasi/{id}', 'HomeController@updateSertifikat');


//Email
Route::get('/sendEmail', 'HomeController@sendEmail');

//Login
Route::get('/','HomeController@login')->name('signin');
Route::post('/signin','HomeController@masuk')->name('signin');
Route::get('/logout','HomeController@logout')->name('logout');

//Notif
Route::get('/notifikasi', 'HomeController@notif');

//Daftar Pekerja
Route::get('/pekerja', 'HomeController@pekerja');
Route::post('/pekerja', 'HomeController@storePekerja');
Route::delete('/pekerja/{id}', 'HomeController@destroyPekerja');
Route::get('/tambah-pekerja', 'HomeController@tambahPekerja');
Route::get('/ubah-pekerja/{idpekerja}', 'HomeController@editPekerja');
Route::patch('/pekerja/{id}', 'HomeController@updatePekerja');


Auth::routes();













