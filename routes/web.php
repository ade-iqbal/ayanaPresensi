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



Auth::routes(['register' => false, 'reset' => false]);

// route admin dan mahasiswa
Route::group(['middleware' => ['auth', 'checkRole:admin,mahasiswa']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
});


// route untuk mahasiswa saja
Route::group(['middleware' => ['auth', 'checkRole:mahasiswa']], function(){
    Route::get('/mahasiswa/kelas/{id}', 'MahasiswaController@detail_kelas');
});



// route untuk admin saja
Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
	Route::post('/simpanKelas', 'KelasController@tambah');
    Route::get('/kelas/{id}/detail', 'KelasController@detail_kelas');
    Route::get('/kelas/{id}/get', 'KelasController@getKelas');
    Route::post('/editKelas', 'KelasController@edit');
    Route::get('/kelas/tambah', 'KelasController@form_tambah')->name('admin.kelas.tambah');
});