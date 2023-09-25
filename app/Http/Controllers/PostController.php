<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Cloudinary;

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
    
    public function posts_store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        if($request->file('photo')){
            $image_url = Cloudinary::upload($request->file('photo')->getRealPath())->getSecurePath();
            $input += ['photo' => $image_url];
        }
        $input += ['user_id' => Auth::id()];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function posts_show(Post $post)
    {
        return view('posts.show')->with(['post' => $post, 'comments' => $post->comments()->get()]);
    }
    
    public function posts_edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function posts_update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/'. $post->id);
    }
    
    public function posts_delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
