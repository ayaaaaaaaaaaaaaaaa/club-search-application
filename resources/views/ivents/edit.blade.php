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
            投稿編集
        </x-slot>
        
        <body>
            <form action="/ivents/{{ $ivent->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='title'>
                    <h2>Title</h2>
                    <input type="text" name="ivent[title]" value="{{ $ivent->title }}">
                </div>
                <div class='body'>
                    <h2>Body</h2>
                    <textarea name="ivent[ivent_overview]">{{ $ivent->ivent_overview }}</textarea>
                </div>
                <input type="submit" value="保存"/>
            </form>
            
            <div class="footer">
                <a href="/ivent">戻る</a>
            </div>
            
        </body>
    </x-app-layout>
    
</html>