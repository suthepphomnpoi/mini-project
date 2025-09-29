<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MpEmployee;
use Illuminate\Support\Facades\Hash;

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

        $positionName = trim(strtolower($employee->position->name ?? ''));
        if (!$employee || !$employee->position || !in_array($positionName, ['driver', 'คนขับ'])) {
            return back()->withInput($request->only('email'))
                ->with('error', 'บัญชีนี้ไม่ใช่พนักงานขับรถ (Driver)');
        }

        // Attempt to login using the 'employee' guard (bcrypt hashed)
        $remember = $request->boolean('remember');
        $password = $data['password'];
        $loggedIn = false;

        // If the stored hash looks like bcrypt ($2y$), try standard attempt
        if (is_string($employee->password_hash) && str_starts_with($employee->password_hash, '$2y$')) {
            $loggedIn = Auth::guard('employee')->attempt(['email' => $data['email'], 'password' => $password], $remember);
        } else {
            // Fallback: support plain-text in development or non-bcrypt hashing
            if (is_string($employee->password_hash) && (Hash::check($password, $employee->password_hash) || $employee->password_hash === $password)) {
                Auth::guard('employee')->login($employee, $remember);
                $loggedIn = true;
            }
        }

        if ($loggedIn) {
            $request->session()->regenerate();
            // Redirect to a protected driver page to verify login immediately
            return redirect()->intended(route('drivers.test'));
        }

        return back()->withInput($request->only('email'))
            ->with('error', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง');
    }

    public function test()
    {
        return view('driver.test');
    }

    public function logout(Request $request)
    {
        Auth::guard('employee')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.drivers.login');
    }
}
