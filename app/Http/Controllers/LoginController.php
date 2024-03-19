<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(Auth::user()->posisi == 'admin') {
                return redirect('dashboard');
            }
            
            if(Auth::user()->posisi == 'user') {
                return redirect('home');
            }

            if(Auth::user()->posisi == 'petugas') {
                return redirect('/');
            }
 
            return redirect()->intended('home');
        }

        return back()->with('LoginError', 'Login Gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
    }
}
