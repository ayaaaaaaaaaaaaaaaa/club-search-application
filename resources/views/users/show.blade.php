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
            ユーザー
        </x-slot>
        
        <body>
            <h2>[ {{ $user->name }} ]</h2>
            @if($user->icon)
                <div>
                    <img src="{{ $user->icon }}" alt="画像が読み込めません。"/> 
                </div>
            @endif
            <a>・{{ $user->Instagram_link }} </a>
            <a>・{{ $user->Twitter_link }}</a>
            <a>{{ $user->self_introduction }}</a>
            <a>{{ $user->activity_overview }}</a>
            <a>{{ $user->activity_day }}</a>
            <a>{{ $user->activity_number_of_people }}</a>

        </body>
    </x-app-layout>
    
</html>