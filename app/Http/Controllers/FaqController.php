<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * isi apa saja disini
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('faq.index');
    }

    public function store()
    {
        //
    }
}
