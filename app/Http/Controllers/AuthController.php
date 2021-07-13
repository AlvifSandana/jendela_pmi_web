<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * show login form
     */
    public function showLoginForm(){
        if (Auth::check()) {
            return redirect()->route('admin.stokdarah.index');
        }
        return view('admin.login');
    }

    /**
     * handle login
     */
    public function login(Request $request){
        // rules validasi
        $rules = [
            'email'     => 'required|email',
            'password'  => 'required'
        ];
        // custom message for validation
        $messages = [
            'required'  => ':attribute tidak boleh kosong!',
            'email.email' => 'Email tidak valid!'
        ];
        // validator instantiation
        $validator = Validator::make($request->all(), $rules, $messages);
        // validation process
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        // login data
        $login_data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        ];

        Auth::attempt($login_data);
        // login check
        if (Auth::check()) {
            return redirect()->route('admin.stokdarah.index')->with('success', 'Selamat datang, Admin.');
        } else {
            Session::flash('error', 'Email atau password salah!');
            return redirect()->route('login.form');
        }
    }

    /**
     * handle logout
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('login.form');
    }
}
