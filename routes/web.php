<?php

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

Route::get('/', 'FrontController@home');

// pages
Route::get('/page/{slug}', 'FrontController@page');
Route::get('/pages', 'FrontController@pages');

// register
Route::get('/register', 'RegisterController@add');
Route::get('/success', 'RegisterController@confirm');
Route::post('/register', 'RegisterController@postadd');
Route::post('/sertfikasi/register','AdminDataSertifikasi38Controller@register')->name('sertifikasi.register');
Route::post('/sertfikasi/submit','AdminDataSertifikasi38Controller@submit')->name('sertifikasi.submit');
Route::post('/sertfikasi/approve','AdminDataSertifikasiController@approve')->name('sertifikasi.approve');
Route::post('/sertfikasi/jadwal','AdminDataSertifikasiController@buatJadwal')->name('sertifikasi.jadwal');
Route::post('/sertfikasi/sertifikat','AdminDataSertifikasiController@inputSertifikat')->name('sertifikasi.sertifikat');
Route::post('/um/submit', 'AdminUjianMandiriController@sumbit')->name('um.submit');
Route::get('/admin/sertifikasi/view/{id}','AdminDataSertifikasi38Controller@viewSertifikasi');
