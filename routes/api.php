<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/reg/pendonor', 'api\AuthController@registerPendonor')->name('api.auth.register.pendonor');
Route::post('/login/pendonor', 'api\AuthController@loginPendonor')->name('api.auth.login.pendonor');

Route::apiResources([
    'jadwaldonor'   => 'api\JadwalDonorController',
    'kegiatan'      => 'api\KegiatanController',
    'stokdarah'     => 'api\StokDarahController',
    'pendonor'      => 'api\PendonorController'
]);
