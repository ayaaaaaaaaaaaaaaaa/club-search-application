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
            
            <div class='footer'>
                <a href='/'>戻る</a>
            </div>
        </body>
    </x-app-layout>
    
</html>