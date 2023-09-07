<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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


}