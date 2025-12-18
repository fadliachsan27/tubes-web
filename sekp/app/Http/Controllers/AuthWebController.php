<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthWebController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function dashboard()
    {
        if (!session('user')) {
            return redirect('/login');
        }
        return view('dashboard');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/login')->with('success', 'Logout berhasil.');
    }

    public function registerPage()
    {
        return view('register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Register berhasil, silakan login');
    }
}

