<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Show the Employee list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
