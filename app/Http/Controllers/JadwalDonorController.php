<?php

namespace App\Http\Controllers;

use App\Imports\JadwalDonorImport;
use App\MobileUnit;
use Illuminate\Http\Request;
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
            $filename = rand() . $file->getClientOriginalName();
            // save file to public folder
            $file->move('uploaded', $filename);
            // import file to database
            Excel::import(new JadwalDonorImport, public_path('/uploaded/' . $filename));
            // redirect to jadwal donor page index
            return redirect()->route('admin.jadwaldonor.index')->with('success', 'Berhasil import data ke database.');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('admin.jadwaldonor.index')->withErrors($th->getMessage());
        }
    }

    /**
     * create a new jadwal donor
     */
    public function createJadwalDonor(Request $request)
    {
        try {
            // validate input data
            $this->validate(
                $request,
                [
                    'tanggal_donor' => 'required',
                    'lokasi_donor' => 'required',
                    'waktu_mulai' => 'required',
                    'waktu_selesai' => 'required',
                    'deskripsi' => 'required'
                ],
                [
                    'required' => ':attribute tidak boleh kosong!'
                ]
            );
            // create jadwal donor
            $jadwal_donor = MobileUnit::create([
                'tanggal_donor' => $request->tanggal_donor,
                'lokasi_donor' => $request->lokasi_donor,
                'waktu_mulai' => $request->waktu_mulai,
                'waktu_selesai' => $request->waktu_selesai,
                'deskripsi' => $request->deskripsi
            ]);
            $jadwal_donor->save();
            // redirect to jadwal donor page
            return redirect()->route('admin.jadwaldonor.index')->with('success', 'Data berhasil ditambahkan.');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('admin.jadwaldonor.index')->withErrors($th->getMessage());
        }
    }
}
