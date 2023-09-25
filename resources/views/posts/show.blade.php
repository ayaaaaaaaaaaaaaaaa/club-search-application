<!DOCTYPE html>
<html lang="{{ str_replace('_', '_', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Club Search</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <x-app-layout>
        <x-slot name="header">
            Post
        </x-slot>
        
        <body>
            <div class='posts'>
                <div class='post'>
                    <h2 class='title'>{{ $post->title }}</h2>
                    <p class='body'>{{ $post->body }}</p>
                    @if($post->photo)
                    <div>
                        <img src="{{ $post->photo }}" alt="画像が読み込めません。"/>
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="edit">
                <a href="/posts/{{ $post->id }}/edit">編集</a>
            </div>
            
            <div class="delete">
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">削除</button>
                </form>
                <script>
                    function deletePost(id){
                        'use strict'
                        if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                            document.getElementById(`form_${id}`).submit();
                        }
                    }
                </script>
            </div>
            
            <form action="/{{ $post->id }}/comment" method="POST">
                @csrf
                <div class="comment">
                    <h3>コメント</h3>
                    <textarea name="comments[comment]" placeholder="コメント">{{ old('comments.comment') }}</textarea>
                </div>
                <input type="submit" value="送信"/>
            </form>
            <div class='back'>
                <a href='/'>戻る</a>
            </div>
            
            <br>
            
            <div>
                <h3><コメント一覧></h3>
                @foreach($comments as $comment)
                    <div class=comments>
                        <br>
                        <p>[{{ $comment->user->name }}]</p>
                        <p>・{{ $comment->comment }}</p>
                        <p>投稿日：<strong>{{ $comment->created_at->diffForHumans() }}</strong></p>
                @endforeach
            </div>
            
            
        </body>
    </x-app-layout>
    
</html>