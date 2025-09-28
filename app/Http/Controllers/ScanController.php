<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ScanController extends Controller
{
    public function scan()
    {
    return view('vehicle.scan');
    }
    public function cancel()
    {
    return view('vehicle.cancel');
    }
    public function success()
    {
    return view('vehicle.success');
    }
    public function confirm()
    {
    return view('vehicle.confirm');
    }
}
