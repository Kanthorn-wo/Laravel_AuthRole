<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function checkLogin(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin');
            } elseif (Auth::user()->role == 'user') {
                return redirect()->route('user');
            } elseif (Auth::user()->role == 'staff') {
                return redirect()->route('staff');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}