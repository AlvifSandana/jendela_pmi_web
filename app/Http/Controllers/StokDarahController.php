<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StokDarah;
use Illuminate\Support\Facades\DB;

class StokDarahController extends Controller
{
    /**
     * show Stok Darah page
     */
    public function index()
    {
        try {
            // ambil data dari model
            $wb = DB::table('stok_darah')->where('produk', '=', 'WB')->get();
            $prc = DB::table('stok_darah')->where('produk', '=', 'PRC')->get();
            $tc = DB::table('stok_darah')->where('produk', '=', 'TC')->get();
            $ffp = DB::table('stok_darah')->where('produk', '=', 'FFP')->get();
            // tampilkan view beserta data
            return view('admin.stokdarah', compact('wb', 'prc', 'tc', 'ffp'));
        } catch (\Throwable $th) {
            // tangkap error dan tampilkan berupa flash message
            return redirect()->route('stokdarah.index')->withErrors($th->getMessage());
        }
    }
}
