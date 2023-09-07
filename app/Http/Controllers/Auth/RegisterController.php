<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
}
