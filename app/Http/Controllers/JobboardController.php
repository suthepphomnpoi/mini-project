<?php

namespace App\Http\Controllers;

use App\Models\MpTrip;
use Illuminate\Http\Request;

class JobboardController extends Controller
{
    public function index(Request $request)
    {
        // ดึงงานที่ service_date >= วันนี้ พร้อมข้อมูล vehicle + type
        $trips = MpTrip::with(['vehicle.type', 'route'])
            
            //->orderBy('service_date', 'asc')
            ->get();

        // แปลงข้อมูลสำหรับแสดงหน้า View
        $schedules = $trips->map(function ($trip) use ($request) {
            $receivedJobs = $request->session()->get('received_jobs', []);
            return [
                'id' => $trip->trip_id,
                'route' => optional($trip->route)->name ?? 'ไม่ระบุเส้นทาง',
                'path' => '-', // mockup ไว้ก่อน
                'type' => optional(optional($trip->vehicle)->type)->name ?? 'ไม่ระบุ',
                'license' => optional($trip->vehicle)->license_plate ?? '-',
                'passenger' => $trip->capacity . ' คน',
                'time' => $trip->service_date->format('d/m/Y') . ' ' . $trip->depart_time,
                'received' => in_array($trip->trip_id, $receivedJobs),
            ];
        });

        return view('driverfront.jobboard', compact('schedules'));
    }

    public function receiveJob(Request $request, $id)
    {
        // เก็บ id งานที่รับไว้ใน session
        $receivedJobs = $request->session()->get('received_jobs', []);
        if (!in_array($id, $receivedJobs)) {
            $receivedJobs[] = $id;
            $request->session()->put('received_jobs', $receivedJobs);
        }

        return redirect()->route('drivers.schedule')->with('success', 'รับงานเรียบร้อยแล้ว');
    }

    public function show($id)
    {
        $trip = MpTrip::with(['vehicle.type', 'route'])->findOrFail($id);

    // จัดรูปข้อมูลเหมือนตอน index แต่เฉพาะตัวเดียว
    $job = [
        'id' => $trip->trip_id,
        'route' => optional($trip->route)->name ?? 'ไม่ระบุเส้นทาง',
        'path' => '-', // mockup ไว้ก่อน
        'type' => optional(optional($trip->vehicle)->type)->name ?? 'ไม่ระบุ',
        'license' => optional($trip->vehicle)->license_plate ?? '-',
        'passenger' => $trip->capacity . ' คน',
        'time' => $trip->depart_time,
    ];
        return view('driverfront.scan', compact('job'));

    }
  
}
