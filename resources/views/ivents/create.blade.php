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
            <form action="/ivents/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class='title'>
                    <h2>イベント名</h2>
                    <input type="text" name="ivent[title]" placeholder="イベント名" value="{{ old('ivent.title') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('ivent.title') }}</p>
                </div>
                
                <div class='body'>
                    <h2>イベント概要</h2>
                    <textarea name="ivent[ivent_overview]" placeholder="イベント概要">{{ old('ivent.ivent_overview') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('ivent.ivent_overview') }}</p>
                </div>
                
                <div class="photo">
                    <input type="file" name="photo">
                </div>
                <input type="submit" value="保存"/>
            </form>
            
            <div class="footer">
                <a href="/ivent">戻る</a>
            </div>
            
        </body>
    </x-app-layout>
</html>