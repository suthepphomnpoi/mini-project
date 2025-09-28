<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Place;

class SearchController extends Controller
{
    /**
     * หน้าแบบฟอร์มค้นหา (ค่าเริ่มต้น)
     */
    public function index()
    {
        $places = Place::orderBy('NAME')->get();
        $routes = []; // ยังไม่ค้นหาอะไรเลย

        return view('search', compact('places', 'routes'));
    }

    /**
     * ค้นหาเส้นทางจากต้นทาง - ปลายทาง
     */
    public function search(Request $request)
    {
        // ตรวจสอบ input
        $request->validate([
            'origin' => ['required', 'integer'],
            'destination' => ['required', 'integer', 'different:origin'],
        ], [
            'destination.different' => 'ต้นทางและปลายทางต้องไม่เหมือนกัน',
        ]);

        $places = Place::orderBy('NAME')->get();

        $origin = (int) $request->input('origin');
        $destination = (int) $request->input('destination');

        // ดึงเส้นทางที่มีทั้ง origin และ destination
        $routes = Route::with(['routePlaces.place'])
            ->whereHas('routePlaces', fn($q) => $q->where('PLACE_ID', $origin))
            ->whereHas('routePlaces', fn($q) => $q->where('PLACE_ID', $destination))
            ->get();

        return view('search', compact('places', 'routes', 'origin', 'destination'));
    }

    /**
     * แสดงเส้นทางทั้งหมด
     */
    public function allRoutes()
    {
        $places = Place::orderBy('NAME')->get();

        $routes = Route::with(['routePlaces.place'])->get();

        return view('search', compact('places', 'routes'));
    }
}
