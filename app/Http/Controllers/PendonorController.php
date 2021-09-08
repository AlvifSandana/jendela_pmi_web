<?php

namespace App\Http\Controllers;

use App\Imports\PendonorImport;
use App\Pendonor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

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

    /**
     * import Data Pendonor
     * from .xls .xlsx
     */
    public function importExcel(Request $request)
    {
        try {
            // validate uploaded file
            $this->validate(
                $request,
                [
                    'file' => 'required'
                ],
                [
                    'required' => ':atttribute tidak boleh kosong!',
                ]
            );
            // get file and filename
            $file = $request->file('file');
            $filename = rand().$file->getClientOriginalName();
            // save file to public folder
            $file->move('uploaded', $filename);
            // import file to database
            Excel::import(new PendonorImport, public_path('/uploaded/'.$filename));
            // redirect to data pendonor page
            return redirect()->route('admin.pendonor.index')->with('success', 'Berhasil import data ke database.');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('admin.pendonor.index')->withErrors($th->getMessage());
        }
    }

    /**
     * create new pendonor
     */
    public function createPendonor(Request $request)
    {
        try {
            // validate input data
            $this->validate(
                $request,
                [
                    'nama_pendonor' => 'required',
                    'email' => 'required|email',
                    'password' => 'required',
                    'alamat' => 'required',
                    'ttl' => 'required',
                    'golongan_darah' => 'required',
                    'status' => 'required',
                ],
                [
                    'required' => ':attribute tidak boleh kosong!'
                ]
            );
            // create user
            $user = User::create([
                'name' => $request->nama_pendonor,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user->save();
            // create pendonor
            $pendonor = Pendonor::create([
                'nama_pendonor' => $request->nama_pendonor,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'alamat'        => $request->alamat,
                'telepon'       => $request->telepon,
                'ttl'           => $request->ttl,
                'golongan_darah'=> $request->golongan_darah,
                'status'        => $request->status,
                'photo'         => '',
                'api_token'     => Hash::make($request->email),
                'remember_token' => '',
                'roles_id'      => 2,
                'user_id'       => $user->id    # mendapatkan user id
            ]);
            $pendonor->save();
            // redirect to pendonor page
            return redirect()->route('admin.pendonor.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('admin.pendonor.index')->withErrors($th->getMessage());
        }
    }


}
