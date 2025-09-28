<?php

namespace App\Http\Controllers;

class ControllerHome extends Controller
{
    public function index()
    {
    return view('home');
    }

    public function search()
    {
    return view('search');
    }
}
