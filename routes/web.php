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

Route::get('/', function () {
    return view('admin.stokdarah');
});

Route::get('/login', function () {
    return view('admin.login');
});

Route::get('admin/pendonor', function () {
    return view('admin.datapendonor');
});

Route::get('admin/stokdarah', function () {
    return view('admin.stokdarah');
});

Route::get('admin/kegiatan', function () {
    return view('admin.kegiatan');
});

Route::get('admin/jadwaldd', function () {
    return view('admin.jadwaldd');
});

