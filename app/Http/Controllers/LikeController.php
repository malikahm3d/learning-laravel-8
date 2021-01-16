<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request)
    {
        //$post = Post::find($id);
        //we don't need to do this since we definded it in the route
        //in web.php: /posts/post:id/likes
        //this gives us the post by the id

//        if($post->likedBy($request->user())) {
//            return back();
//        }

        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);
        return back();
    }

    public function destroy(Post $post, Request $request)
    {
        $post->likes()->where('user_id', $request->user()->id)->delete();
        return back();
    }
}
