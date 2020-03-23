<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'PetugasController@register');
Route::post('login', 'PetugasController@login');

Route::put('ubahpetugas/{id}', 'PetugasController@update')->middleware('jwt.verify');
Route::delete('hapuspetugas/{id}', 'PetugasController@destroy')->middleware('jwt.verify');

Route::get('datapelanggan', 'PelangganController@show')->middleware('jwt.verify');
Route::post('tambahpelanggan', 'PelangganController@store')->middleware('jwt.verify');
Route::put('ubahpelanggan/{id}', 'PelangganController@update')->middleware('jwt.verify');
Route::delete('hapuspelanggan/{id}', 'PelangganController@destroy')->middleware('jwt.verify');

Route::get('datajenis', 'JenisController@show')->middleware('jwt.verify');
Route::post('tambahjenis', 'JenisController@store')->middleware('jwt.verify');
Route::put('ubahjenis/{id}', 'JenisController@update')->middleware('jwt.verify');
Route::delete('hapusjenis/{id}', 'JenisController@destroy')->middleware('jwt.verify');

Route::post('datatransaksi', 'TransaksiController@show')->middleware('jwt.verify');
Route::post('tambahtransaksi', 'TransaksiController@store')->middleware('jwt.verify');
Route::put('ubahtransaksi/{id}', 'TransaksiController@update')->middleware('jwt.verify');
Route::delete('hapustransaksi/{id}', 'TransaksiController@destroy')->middleware('jwt.verify');

Route::get('datadetail', 'DetailController@show')->middleware('jwt.verify');
Route::post('tambahdetail', 'DetailController@store')->middleware('jwt.verify');
Route::put('ubahdetail/{id}', 'DetailController@update')->middleware('jwt.verify');
Route::delete('hapusdetail/{id}', 'DetailController@destroy')->middleware('jwt.verify');

