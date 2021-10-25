<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect('/admin');
        } else {
            return back()->withErrors(['error' => 'The provided credentials do not match our records.']);
        }
    }
}
