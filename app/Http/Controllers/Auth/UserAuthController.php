<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate with custom Thai messages
        $credentials = $request->validate(
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

        // Attempt login using default guard (web)
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('search.form'));
        }

        // Authentication failed
        return back()
            ->withInput($request->only('email'))
            ->with('error', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง');
    }

}
