<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function timeline(Post $post)
    {
        return view('posts.timeline')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function posts_create()
    {
        return view('posts.create');
    }
    
    public function posts_store(Request $request, Post $post)
    {
        $input = $request['post'];
        $input += ['user_id' => Auth::id()];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function posts_show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
}
