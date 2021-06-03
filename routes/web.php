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

    Route::get('/kelas/{id}/detail', 'KelasController@detail_kelas')->name('admin.kelas.detail');

	Route::post('/simpanKelas', 'KelasController@store_kelas');
    Route::get('/kelas/{id}/detail', 'KelasController@detail_kelas');
    Route::get('/kelas/{id}/edit', 'KelasController@form_edit_kelas');
    Route::post('/editKelas', 'KelasController@update_kelas');
    
    Route::get('/kelas/tambah', 'KelasController@form_tambah')->name('admin.kelas.tambah');
    Route::get('/kelas/pertemuan/tambah/{id}', 'KelasController@tambah_pertemuan');
    Route::post('/kelas/pertemuan/store/{id}', 'KelasController@store_pertemuan');
    Route::get('/kelas/pertemuan/{id_kelas}/{id_pertemuan}', 'KelasController@detail_pertemuan');

    Route::post('/upload/{krs}/{pertemuan}', 'AbsensiController@upload');
    
    Route::post('/kelas/peserta/{id}/store', 'KrsController@store');
    Route::get('/kelas/peserta/{id}/destroy', 'KrsController@destroy');

});
