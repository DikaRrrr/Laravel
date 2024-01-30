<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate([
        'username' => ['required', 'min:3'],
        'password' => ['required', 'min:8'],
        'email' => ['required', 'email:dns', 'unique:users'],
        'namalengkap' =>['required'],
        'alamat' =>['required']
       ]);

       User::create($validatedData);
       return redirect('/login')->with('success', 'Registrasi Berhasil Silahkan Login!');
    }
}
