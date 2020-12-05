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


Route::get('/form','HomeController@form');
Route::post('/form/karyawan', 'HomeController@karyawan')->name('idkaryawan');


Route::post('/question', 'HomeController@question');
Route::post('/dashboard/{tanggal}', 'HomeController@store');

Route::get('/','HomeController@login')->name('signin');
Route::post('/signin','HomeController@masuk')->name('signin');
Route::get('/logout','HomeController@logout')->name('logout');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/sertifikasi', 'HomeController@sertifikat');


Route::get('/notifikasi', function () {
    return view('notifikasi');
});

Route::get('/tambah-sertifikat', function () {
    return view('tambahSertifikat');
});


Route::get('/vendor/datatables/print', function () {
    return view('print');
});



