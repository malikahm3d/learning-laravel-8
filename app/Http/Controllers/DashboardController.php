<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        //other way of implementing middleware
        //as supposed to in the route
    }

    public function index()
    {
        dd(auth()->user()->posts);
        return view('dashboard');
    }
}
