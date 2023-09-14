<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'email'     => 'required|email',
                'password'  => 'required'
            ],
            [
                'email.required' => 'Email Tidak Valid.',
                'email.email' => 'Email Tidak Valid.',
                'password.required' => 'Password Tidak Valid.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = User::where('email',$request->email)->first();
        
        if ($user == null) {
            Session::flash('login_error', 'Login Gagal, Pastikan Username dan Password Anda Benar!!!.');
            return redirect()->back();
        } elseif ($user->email_verified == 0) {
            Session::flash('verifikasi_error', 'Email Belum Di Verifikasi.');
            return redirect()->route('verification');
        }
        
        $credentials = $request->only('email', 'password');
        
        $role_cek = User::select('role')->where('email',$request->email)->get();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if ($role_cek === 'user') {
                return redirect('/dashboard');
            } elseif ($role_cek === 'mitra') {
                return redirect('/dashboard');
            }
            return redirect('/dashboard');
        }
        return back()->with('login_error', 'Login Gagal, Pastikan Username dan Password Anda Benar!!!' );
    }
}
