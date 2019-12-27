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

Route::get('pustakawan/{nip}', 'AdminDataSertifikasi38Controller@getPustakawan');
Route::get('kabupatens/{prop}', 'AdminDataSertifikasi38Controller@getKabutpaten');
Route::get('kecamatans/{kab}', 'AdminDataSertifikasi38Controller@getKecamatan');
Route::get('kelurahans/{kec}', 'AdminDataSertifikasi38Controller@getKelurahan');

Route::get('kluster/{kluster_id}', 'AdminUjianMandiriController@getUnitList');
Route::get('unit/{unit_id}', 'AdminUjianMandiriController@getUnitDetails');
Route::get('assesment/{detail_id}', 'AdminUjianMandiriController@getAssesment');