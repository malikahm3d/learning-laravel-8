<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function loguserin(Request $request)
    {

        $validatedData = $request->validate([
            'enteredemail' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(!auth()->attempt($request->only('email', 'password'), $request->remember_me))
        {
            return back()->with('status', 'invalid Login details');
        }

        return redirect()->route('dashboard');
    }
}
