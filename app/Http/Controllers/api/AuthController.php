<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pendonor;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Register Pendonor
     */
    public function registerPendonor(Request $request)
    {
        try {
            // request validation rules
            $rules = [
                'nama_pendonor' => 'required',
                'email'         => 'required|email|unique:pendonor',
                'password'      => 'required',
                'alamat'        => 'required',
                'telepon'       => 'required',
            ];
            // validation error messages
            $message = [
                'required'      => ':attribute tidak boleh kosong!',
                'unique'        => ':attribute telah digunakan!'
            ];
            // instansiasi validator
            $validator = Validator::make($request->all(), $rules, $message);
            // proses validasi
            if ($validator->fails()) {
                return response()->json([
                    'status'    => 'failed',
                    'message'   => $validator->getMessageBag(),
                    'data'      => []
                ], 400);
            }
            // lolos proses validasi, simpan data pendonor baru
            // instansiasi model user
            $user = User::create([
                'name'          => $request->nama_pendonor,
                'email'         => $request->email,
                'password'      => Hash::make($request->password)
            ]);
            // simpan data user
            $user->save();
            // menyiapkan data pendonor
            $reg_data = [
                'nama_pendonor' => $request->nama_pendonor,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'alamat'        => $request->alamat,
                'telepon'       => $request->telepon,
                'status'        => '',
                'photo'         => '',
                'api_token'     => Hash::make($request->email),
                'remember_token' => '',
                'roles_id'      => 2,
                'user_id'       => $user->id    # mendapatkan user id
            ];
            // simpan data pendonor
            $pendonor = Pendonor::create($reg_data);
            $pendonor->save();
            return response()->json([
                'status'    => 'success',
                'message'   => 'Berhasil registrasi',
                'data'      => [
                    'nama'      => $reg_data['nama_pendonor'],
                    'email'     => $reg_data['email'],
                    'alamat'    => $reg_data['alamat'],
                    'telepon'   => $reg_data['telepon'],
                    'api_token' => $reg_data['api_token']
                ]
            ], 201);
        } catch (\Throwable $th) {
            // catch error
            return response()->json([
                'status'    => 'error',
                'message'   => $th->getMessage(),
                'data'      => []
            ], 500);
        }
    }

    /**
     * Login Pendonor
     */
    public function loginPendonor(Request $request)
    {
        try {
            // validation rules
            $rules = [
                'email'     => 'required|email',
                'password'  => 'required'
            ];
            // validation error messages
            $message = [
                'required'  => ':attribute tidak boleh kosong!'
            ];
            // instansiasi validator
            $validator = Validator::make($request->all(), $rules, $message);
            // proses validasi
            if ($validator->fails()) {
                return response()->json([
                    'status'    => 'failed',
                    'message'   => $validator->getMessageBag(),
                    'data'      => []
                ]);
            }
            // lolos validasi, cek email dan password
            $pendonor = Pendonor::where('email', $request->email)->first();
            if (Hash::check($request->password, $pendonor->password)) {
                return response()->json([
                    'status'    => 'success',
                    'message'   => 'Berhasil login',
                    'data'      => $pendonor
                ], 200);
            } else {
                return response()->json([
                    'status'    => 'failed',
                    'message'   => 'email atau password salah!',
                    'data'      => []
                ], 401);
            }
        } catch (\Throwable $th) {
            // catch error
            return response()->json([
                'status'    => 'error',
                'message'   => $th->getMessage(),
                'data'      => []
            ], 500);
        }
    }
}
