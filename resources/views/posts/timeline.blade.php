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
            TimeLine
        </x-slot>
        
        <body>
            <a href='/posts/create'>投稿作成</a>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post'>
                        <h2 class='title'>{{ $post->title }}</h2>
                        <p class='body'>{{ $post->body }}</p>
                    </div>
                @endforeach
            </div>
            
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
        </body>
    </x-app-layout>
    
</html>