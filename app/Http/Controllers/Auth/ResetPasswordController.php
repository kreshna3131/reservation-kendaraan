<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ResetPasswordController extends Controller
{
    public function showResetForm()
    {
        return view('auth.passwords.reset');
    }

    public function reset(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'password'  => 'required|min:8|alpha_num:ascii|confirmed'
            ],
            [
                'password.required' => 'Password Tidak Valid.',
                'password.alpha_num' => 'Password Tidak Valid.',
                'password.min' => 'Password Tidak Valid.',
                'password.confirmed' => 'Password Tidak Valid.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $currentTime = date('Y-m-d H:i:s');
        $str = Carbon::parse($currentTime)->timestamp;

        $user = User::where('email', $request->email)->first();
        $token = Crypt::decryptString($user->reset_token);

        if ($str > $token) {
            Session::flash('reset_error', 'Reset Password Gagal, Batas Waktu Habis.');
            return redirect()->back();
        }
        
        $reset = User::where('id', $user->id)->update([
            'password'  => bcrypt($request->password),
            'reset_token' => null
        ]);

        if ($reset) {
            Session::flash('reset_success', 'Reset Password Berhasil, Silakan Login.');
            return redirect()->route('login');
        }

        Session::flash('reset_error', 'Reset Password Gagal, Silakan Data Anda.');
        return redirect()->back();
    }
}
