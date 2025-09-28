<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Place;

class SearchController extends Controller
{
    // หน้า search form
    public function index()
    {
        $places = Place::orderBy('NAME')->get();
        return view('search', compact('places'));
    }

    // ค้นหาตามต้นทาง-ปลายทาง
    public function search(Request $request)
    {
        $origin = $request->input('origin');
        $destination = $request->input('destination');

        $routes = Route::with(['routePlaces.place'])
            ->whereHas('routePlaces', fn($q) => $q->where('PLACE_ID', $origin))
            ->whereHas('routePlaces', fn($q) => $q->where('PLACE_ID', $destination))
            ->get();

        return view('search_result', compact('routes'));
    }

    // แสดงเส้นทางทั้งหมด
    public function allRoutes()
    {
        $routes = Route::with(['routePlaces.place'])->get();
        return view('search_result', compact('routes'));
    }
}