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
            投稿作成
        </x-slot>
        
        <body>
            <form action="/posts" method="POST">
                @csrf
                <div class='title'>
                    <h2>Title</h2>
                    <input type="text" name="post[title]" placeholder="タイトル"/>
                </div>
                <div class='body'>
                    <h2>Body</h2>
                    <textarea name="post[body]" placeholder="活動記録"></textarea>
                </div>
                <input type="submit" value="保存"/>
            </form>
            
            <div class="footer">
                <a herf="/">戻る</a>
            </div>
            
        </body>
    </x-app-layout>
    
</html>