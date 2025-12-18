<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        return redirect('/login');
    }
}

