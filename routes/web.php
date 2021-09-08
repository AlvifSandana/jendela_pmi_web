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

// Login route
Route::get('/', 'AuthController@showLoginForm')->name('login.form');
Route::post('login', 'AuthController@login')->name('login.do');
Route::get('logout', 'AuthController@logout')->name('logout');

// Stok Darah route
Route::get('admin/stokdarah', 'StokDarahController@index')->name('admin.stokdarah.index')->middleware('auth');
Route::post('admin/stokdarah/import', 'StokDarahController@importExcel')->name('admin.stokdarah.import')->middleware('auth');
Route::post('admin/stokdarah/add', 'StokDarahController@createStokDarah')->name('admin.stokdarah.create')->middleware('auth');

// Jadwal Donor route
Route::get('admin/jadwaldonor', 'JadwalDonorController@index')->name('admin.jadwaldonor.index')->middleware('auth');
Route::post('admin/jadwaldonor/import', 'JadwalDonorController@importExcel')->name('admin.jadwaldonor.import')->middleware('auth');
Route::post('admin/jadwaldonor/add', 'JadwalDonorController@createJadwalDonor')->name('admin.jadwaldonor.create')->middleware('auth');

// Data Pendonor route
Route::get('admin/pendonor', 'PendonorController@index')->name('admin.pendonor.index')->middleware('auth');
Route::post('admin/pendonor/import', 'PendonorController@importExcel')->name('admin.pendonor.import')->middleware('auth');
Route::post('admin/pendonor/add', 'PendonorController@createPendonor')->name('admin.pendonor.create')->middleware('auth');

// Kegiatan route
Route::get('admin/kegiatan', 'KegiatanController@index')->name('admin.kegiatan.index')->middleware('auth');
Route::post('admin/kegiatan/import', 'KegiatanController@importExcel')->name('admin.kegiatan.import')->middleware('auth');
Route::post('admin/kegiatan/add', 'KegiatanController@createKegiatan')->name('admin.kegiatan.create')->middleware('auth');
