<?php

namespace App\Http\Controllers;

use App\Imports\KegiatanImport;
use Illuminate\Http\Request;
use App\InformasiKegiatan;
use Maatwebsite\Excel\Facades\Excel;

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

    /**
     * import data kegiatan from
     * .xls .xlsx file
     */
    public function importExcel(Request $request)
    {
        try {
            // validate uploaded file
            $this->validate($request, [
                'file' => 'required'
            ], [
                'required' => ':attribute tidak boleh kosong.'
            ]);
            // get file and filename
            $file = $request->file('file');
            $filename = rand().$file->getClientOriginalName();
            // save file to public folder
            $file->move('uploaded', $filename);
            // import file to database
            Excel::import(new KegiatanImport, public_path('/uploaded/'.$filename));
            // redirect to Kegiatan index page
            return redirect()->route('admin.kegiatan.index')->with('success', 'Berhasil import data ke database.');
        } catch (\Throwable $th) {
            return redirect()->route('admin.kegiatan.index')->withErrors($th->getMessage());
        }
    }
}
