<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Ivent;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function posts_comment(Post $post, Request $request, Comment $comment)
    {
        $input = $request['comments'];
        $input += ['user_id' => Auth::id()];
        $input += ['post_id' => $post->id];
        $comment->fill($input)->save();
    
        return redirect('/posts/'. $post->id);
    }
    
    public function ivents_comment(Ivent $ivent, Request $request, Comment $comment)
    {
        $input = $request['comments'];
        $input += ['user_id' => Auth::id()];
        $input += ['ivent_id' => $ivent->id];
        $comment->fill($input)->save();
    
        return redirect('/ivents/'. $ivent->id);
    }
}
