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
            Ivent
        </x-slot>
        
        <body>
            <div class='ivents'>
                <div class='ivent'>
                    <h2 class='title'>{{ $ivent->title }}</h2>
                    <p class='ivent_overview'>{{ $ivent->ivent_overview }}</p>
                </div>
            </div>
            
            <div class="edit">
                <a href="/ivents/{{ $ivent->id }}/edit">編集</a>
            </div>
            
            <div class='footer'>
                <a href='/ivent'>戻る</a>
            </div>
        </body>
    </x-app-layout>
    
</html>