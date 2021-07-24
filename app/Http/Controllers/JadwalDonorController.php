<?php

namespace App\Http\Controllers;

use App\MobileUnit;
use Illuminate\Http\Request;
use App\NotifikasiWaktuDonor;

class JadwalDonorController extends Controller
{
    /**
     * show Jadwal Donor page
     */
    public function index()
    {
        try {
            // ambil data dari model
            $jadwal_donor = MobileUnit::all();
            // tampilkan view beserta data
            return view('admin.jadwaldd', compact('jadwal_donor'));
        } catch (\Throwable $th) {
            // tangkap error dan tampilkan berupa flash message
            return redirect()->route('jadwaldonor.index')->withErrors($th->getMessage());
        }
    }
}
