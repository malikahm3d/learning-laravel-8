<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    //
    public function index()
    {
        $posts = Post::with(['user', 'likes'])->withCount('likes')->orderByDesc('likes_count')->latest()->paginate(15);
//        $posts = Post::paginate(15);
//        dd($posts);
        return view('posts.index', [
            'posts' => $posts
        ]);
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
        //or
        //$request->user()->posts()->create($request->only('body'));
        return back();
    }

    public function destroy(Post $post, Request $request)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
