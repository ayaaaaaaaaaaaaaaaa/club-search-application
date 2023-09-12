<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
}
