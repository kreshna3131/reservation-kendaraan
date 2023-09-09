<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
 {
    /**
    * Display the form to request a password reset link.
    *
    * @return \Illuminate\View\View
    */

    public function showHomepage()
 {
        return view( 'homepage.index' );
    }

    public function showAboutus()
 {
        return view( 'homepage.about' );
    }

    public function showTransport()
 {
        return view( 'homepage.transport' );
    }

    public function showContact()
 {
        return view( 'homepage.contact' );
    }
}