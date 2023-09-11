<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth\lessThan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VerificationController extends Controller
{
    use VerifiesEmails;

    // The "verify" method should be present
    public function verify(Request $request)
    {
        $expayertime = $request->expires;
        $currentTime = date('Y-m-d H:i:s');

        $str = Carbon::parse($currentTime)->timestamp;

        if ($str > $expayertime) {
            Session::flash('verifikasi_error', 'Verifikasi Email Gagal, Batas Waktu Habis.');
            return redirect()->route('login');
        }

        $verifikasi = User::where('id',$request->id)->update([
            'email_verified'      => 1,
            'email_verified_at'     => $currentTime,
        ]);

        if ($verifikasi) {
            Session::flash('verifikasi_success', 'Verifikasi Email Berhasil, Silakan Login.');
            return redirect()->route('login');
        }
    }
}
