<?php

namespace App\Http\Controllers;

use App\Pendonor;
use Illuminate\Http\Request;

class PendonorController extends Controller
{
    /**
     * show Data Pendonor page
     */
    public function index(){
        try {
            // ambil data dari model
            $pendonor = Pendonor::all();
            // tampilkan view beserta data
            return view('admin.datapendonor', compact('pendonor'));
        } catch (\Throwable $th) {
            // tangkap error dan tampilkan berupa flash message
            return redirect()->route('pendonor.index')->withErrors($th->getMessage());
        }
    }
}
