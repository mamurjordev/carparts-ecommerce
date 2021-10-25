<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) :
                $request->session()->regenerate();

                return back();
            else :
                $msg = "Incorrect Email or Password.";
                return Redirect::back()->withErrors([$msg]);
            endif;

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
    }

    public function logout()
    {
        Auth::logout();

        return back();
    }
}
