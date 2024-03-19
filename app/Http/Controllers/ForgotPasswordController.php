<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ForgotPasswordController extends Controller
{
    public function index(){
        return view('forgot_password', [
            'title' => "Reset Password"
        ]);
    }

    public function forgot_password(Request $request){
        $request->validate([
            'email' => "required|email|exist:users,email",
        ]);
    }
}
