<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InformasiKegiatan;

class KegiatanController extends Controller
{
    /**
     * show Kegiatan page
     */
    public function index()
    {
        try {
            // ambil data dari model
            $kegiatan = InformasiKegiatan::all();
            // tampilkan view beserta data
            return view('admin.kegiatan', compact('kegiatan'));
        } catch (\Throwable $th) {
            // tangkap error dan tampilkan berupa flash message
            return redirect()->route('kegiatan.index')->withErrors($th->getMessage());
        }
    }
}
