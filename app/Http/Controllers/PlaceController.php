<?php

namespace App\Http\Controllers;

use App\Models\Place;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        // debug ดูก่อน
        // dd($places);
        return view('places.index', compact('places'));
    }
}

