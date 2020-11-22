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

Route::get('/', 'HomeController@index');


Route::get('/form','HomeController@form');
Route::post('/form/karyawan', 'HomeController@karyawan')->name('idkaryawan');


Route::post('/question', 'HomeController@question');
Route::post('/', 'HomeController@store');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/sertifikasi', function () {
    return view('sertifikasi');
});

Route::get('/vendor/datatables/print', function () {
    return view('print');
});

// Route::get('/sertifikasi', function () {
//     return view('sertifiaksi');
// });
