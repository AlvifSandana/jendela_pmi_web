<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Pendonor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PendonorController extends Controller
{
    public function __construct()
    {
        $this->middleware('tokencheck');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // rules validasi
            $rules = [
                'nama_pendonor' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'alamat' => 'required',
                'ttl' => 'required',
                'golongan_darah' => 'required',
            ];
            // custom message validasi
            $messages = [
                'required'  => ':attribute tidak boleh kosong!',
                'email'     => 'Email tidak valid!'
            ];
            // membuat instansi validator
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    'status'    => 'failed',
                    'message'   => $validator->getMessageBag(),
                    'data'      => []
                ], 200);
            }
            // lolos validasi, perbarui data pendonor
            Pendonor::where('id', $id)->update([
                'nama_pendonor' => $request->nama_pendonor,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'alamat'        => $request->alamat,
                'ttl'           => $request->ttl,
                'golongan_darah'=> $request->golongan_darah
            ]);

            $pendonor = Pendonor::where('id', $id)->first();
            // response
            return response()->json([
                'status'    => 'success',
                'message'   => 'Data profil berhasil diperbarui.',
                'data'      => [$pendonor]
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'error',
                'message'   => $th->getMessage(),
                'data'      => []
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
