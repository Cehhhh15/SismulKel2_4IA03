<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Login sederhana: Username 'admin' & Password 'admin123'
        // Kamu bisa mengganti ini nanti dengan sistem database yang asli
        if ($request->username == 'admin' && $request->password == 'admin123') {
            session(['is_admin' => true]);
            return redirect()->route('admin.index')->with('success', 'Selamat datang Admin!');
        }

        return back()->with('error', 'Username atau Password salah!');
    }

    public function logout()
    {
        session()->forget('is_admin');
        return redirect('/');
    }
}