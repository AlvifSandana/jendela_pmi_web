<?php

namespace App\Http\Controllers;

use App\Imports\JadwalDonor;
use App\MobileUnit;
use Illuminate\Http\Request;
use App\NotifikasiWaktuDonor;
use Maatwebsite\Excel\Facades\Excel;

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

    /**
     * import data jadwal donor
     * from .xls .xlsx
     */
    public function importExcel(Request $request)
    {
        try {
            // validate uploaded file
            $this->validate($request, [
                'file' => 'required',
            ], [
                'required' => ':attribute tidak boleh kosong!'
            ]);
            // get file and filename
            $file = $request->file('file');
            $filename = rand().$file->getClientOriginalName();
            // save file to public folder
            $file->move('uploaded', $filename);
            // import file to database
            Excel::import(new JadwalDonor, public_path('/uploaded/'.$filename));
            // redirect to jadwal donor page index
            return redirect()->route('admin.jadwaldonor.index')->with('success', 'Berhasil import data ke database.');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('admin.jadwaldonor.index')->withErrors($th->getMessage());
        }
    }
}
