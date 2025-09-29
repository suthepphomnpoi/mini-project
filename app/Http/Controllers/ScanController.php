<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ScanController extends Controller
{
    public function scan()
    {
    return view('driverfront.scan');
    }
    public function cancel()
    {
    return view('driverfront.cancel');
    }
    public function success()
    {
    return view('driverfront.success');
    }
    public function confirm()
    {
    return view('driverfront.confirm');
    }
}
