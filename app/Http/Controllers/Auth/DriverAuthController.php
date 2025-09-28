<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MpEmployee;

class DriverAuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.driver.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required', 'string'],
            ],
            [
                'email.required' => 'กรุณากรอกอีเมล',
                'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
                'password.required' => 'กรุณากรอกรหัสผ่าน',
            ]
        );

        // First, find the employee to verify they are a driver
        $employee = MpEmployee::where('email', $data['email'])
            ->with('position')
            ->first();

        if (!$employee || !$employee->position || strtolower($employee->position->name) !== 'driver') {
            return back()->withInput($request->only('email'))
                ->with('error', 'บัญชีนี้ไม่ใช่พนักงานขับรถ (Driver)');
        }

        // Attempt to login using the 'employee' guard
        if (Auth::guard('employee')->attempt(['email' => $data['email'], 'password' => $data['password']], $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('search.form'));
        }

        return back()->withInput($request->only('email'))
            ->with('error', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง');
    }
}
