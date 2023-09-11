<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth\lessThan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VerificationController extends Controller
{
    use VerifiesEmails;

    public function showVerificationForm()
    {
        return view('auth.verification');
    }

    public function verify(Request $request)
    {
        $expayertime = $request->expires;
        $currentTime = date('Y-m-d H:i:s');

        $str = Carbon::parse($currentTime)->timestamp;

        if ($str > $expayertime) {
            Session::flash('verifikasi_error', 'Verifikasi Email Gagal, Batas Waktu Habis.');
            return redirect()->route('login');
        }

        $verifikasi = User::where('id', $request->id)->update([
            'email_verified'      => 1,
            'email_verified_at'     => $currentTime,
        ]);

        if ($verifikasi) {
            Session::flash('verifikasi_success', 'Verifikasi Email Berhasil, Silakan Login.');
            return redirect()->route('login');
        }
    }

    public function sendverification(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email'     => 'required|email',
            ],
            [
                'email.required' => 'Kolom Email Wajib Diisi.',
                'email.email' => 'Kolom Email Harus Berisi Email Yang Benar.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $verification_email_cek = User::select('email')->where('email',$request->email)->get();
        
        if ($verification_email_cek == null) {
            return back()->with('verifikasi_error', 'Send Verifikasi Email Gagal, Email Tidak Terdaftar.');
        }

        $verification_email_cek->sendEmailVerificationNotification();

        if ($verification_email_cek) {
            Session::flash('sendverification_success', 'Send Verification Berhasil, Silakan Verifikasi Email Anda.');
            return redirect()->route('login');
        }

        Session::flash('sendverification_error', 'Send Verification Gagal, Silakan Data Anda.');
    }
}
