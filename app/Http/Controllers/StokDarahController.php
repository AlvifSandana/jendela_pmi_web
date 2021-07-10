<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StokDarah;

class StokDarahController extends Controller
{
    /**
     * show Stok Darah page
     */
    public function index()
    {
        try {
            // ambil data dari model
            $stok_darah = StokDarah::all();
            // tampilkan view beserta data
            return view('admin.stokdarah', compact('stok_darah'));
        } catch (\Throwable $th) {
            // tangkap error dan tampilkan berupa flash message
            return redirect()->route('stokdarah.index')->withErrors($th->getMessage());
        }
    }
}
