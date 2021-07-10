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

// Stok Darah route
Route::get('admin/stokdarah', 'StokDarahController@index')->name('stokdarah.index');

// Jadwal Donor route
Route::get('admin/jadwaldonor', 'JadwalDonorController@index')->name('jadwaldonor.index');

// Data Pendonor route
Route::get('admin/pendonor', 'PendonorController@index')->name('pendonor.index');

// Kegiatan route
Route::get('admin/kegiatan', 'KegiatanController@index')->name('kegiatan.index');
