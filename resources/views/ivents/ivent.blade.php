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
            <a href='/ivents/create'>投稿作成</a>
            <div class='ivents'>
                @foreach ($ivents as $ivent)
                    <div class='ivent'>
                        <h2 class='title'>
                            <a href="/ivents/{{ $ivent->id }}">{{ $ivent->title }}</a>
                        </h2>
                        <p class='ivent_overview'>{{ $ivent->ivent_overview }}</p>
                        @if($ivent->photo)
                        <div>
                            <img src="{{ $ivent->photo }}" alt="画像が読み込めません。"/>
                        </div>
                        @endif
                        <br>
                    </div>
                @endforeach
            </div>
            
            <div class='paginate'>
                <br>
                {{ $ivents->links() }}
            </div>
        </body>
    </x-app-layout>
    
</html>