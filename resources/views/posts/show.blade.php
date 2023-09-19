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
                </div>
            </div>
            
            <div class="edit">
                <a href="/posts/{{ $post->id }}/edit">編集</a>
            </div>
            
            <form action="/{{ $post->id }}/comment" method="POST">
                @csrf
                <div class="comment">
                    <h3>コメント</h3>
                    <textarea name="comments[comment]" placeholder="コメント">{{ old('comments.comment') }}</textarea>
                </div>
                <input type="submit" value="送信"/>
            </form>
            
            <br>
            
            <div>
                <h3>コメント一覧</h3>
                @foreach($comments as $comment)
                    <div class=comments>
                        <br>
                        <p>・{{ $comment->comment }}</p>
                        <p>コメントした人：{{ $comment->user->name }}</p>
                        <p>投稿日：<strong>{{ $comment->created_at->diffForHumans() }}</strong></p>
                @endforeach
            </div>
            
            <div class='footer'>
                <a href='/'>戻る</a>
            </div>
        </body>
    </x-app-layout>
    
</html>