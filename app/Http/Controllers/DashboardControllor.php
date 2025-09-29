<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardControllor extends Controller
{
    public function index()
    {
        // ตัวอย่างข้อมูลจำลอง (จริง ๆ ดึงจาก DB)
        $schedules = [
            [
                'route' => 'มหาวิทยาลัยเทคโนโลยีมหานคร ➔ มหาวิทยาลัยเทคโนโลยีมหานคร',
                'path' => 'โลตัสหนองจอก > โรงพยาบาลหนองจอก > Big C หนองจอก > โรงพยาบาลหนองจอก > โลตัสหนองจอก',
                'type' => 'รถตู้',
                'license' => 'สย 2591',
                'passenger' => '9 คน',
                'time' => '29/09/2025 เวลา 09:30',
                'received' => false,
            ],
            [
                'route' => 'มหาวิทยาลัยเทคโนโลยีมหานคร ➔ มหาวิทยาลัยเทคโนโลยีมหานคร',
                'path' => 'โลตัสหนองจอก > โรงพยาบาลหนองจอก > Big C หนองจอก > โรงพยาบาลหนองจอก > โลตัสหนองจอก',
                'type' => 'รถตู้',
                'license' => 'สย 2591',
                'passenger' => '9 คน',
                'time' => '29/09/2025 เวลา 09:30',
                'received' => true,
            ],
        ];

        return view('vehicle.dashboard', compact('schedules'));
    }

    public function receiveJob($id)
    {
        // สมมุติว่าอัปเดตสถานะในฐานข้อมูล
        // Schedule::find($id)->update(['received' => true]);

        return redirect()->back()->with('success', 'รับงานเรียบร้อยแล้ว');
    }
}
