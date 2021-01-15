<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
    //
    public function index()
    {
        return view('posts.index');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        //elequent:
        $request->user()->posts()->create([
            'body' => $request->body
        ]);
        return view('dashboard');
    }
}
