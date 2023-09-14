<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman register
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'email'     => 'required|email|unique:users|max:255',
                'password'  => 'required|min:8|alpha_num:ascii|confirmed'
            ],
            [
                'email.required' => 'Kolom Email Tidak Valid.',
                'email.email' => 'Kolom Email Tidak Valid.',
                'email.unique' => 'Kolom Email Tidak Valid.',
                'email.max' => 'Kolom Email Tidak Valid.',
                'password.required' => 'Kolom Password Tidak Valid.',
                'password.alpha_num' => 'Kolom Password Tidak Valid.',
                'password.min' => 'Kolom Password Tidak Valid.',
                'password.confirmed' => 'Password Tidak Sama.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = User::create([
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);

        $user->sendEmailVerificationNotification();

        if ($user) {
            Session::flash('register_success', 'Register Berhasil, Silakan Verifikasi Email Anda.');
            return redirect()->route('login');
        }

        Session::flash('register_error', 'Register Gagal, Silakan Data Anda.');
    }
}
