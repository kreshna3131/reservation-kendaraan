<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use DateInterval;

class ForgotPasswordController extends Controller
{
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email'     => 'required|email',
            ],
            [
                'email.required' => 'Email Tidak Valid.',
                'email.email' => 'Email Tidak Valid.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = User::where('email', $request->email)->first();

        if (empty($user)) {
            return back()->with('forget_error', 'Reset Password Gagal, Email Tidak Terdaftar.');
        }

        $currentTime = new DateTime();
        $currentTime->add(new DateInterval('PT1H'))->format('Y-m-d H:i:s');
        $timelimit = Carbon::parse($currentTime)->timestamp;

        $token = Crypt::encryptString($timelimit);

        $data = [
            'reset_token' => $token,
        ];

        $update = User::where('id', $user->id)->update($data);

        if ($update) {
            $status = Password::sendResetLink(
                $request->only('email')
            );
        }

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
