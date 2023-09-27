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
                    @if($ivent->photo)
                    <div>
                        <img src="{{ $ivent->photo }}" alt="画像が読み込めません。"/>
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="edit">
                <a href="/ivents/{{ $ivent->id }}/edit">編集</a>
            </div>
            
            <div class="delete">
                <form action="/ivents/{{ $ivent->id }}" id="form_{{ $ivent->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteIvent({{ $ivent->id }})">削除</button>
                </form>
                <script>
                    function deleteIvent(id){
                        'use strict'
                        if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                            document.getElementById(`form_${id}`).submit();
                        }
                    }
                </script>
            </div>
            
            <form action="/ivent/{{ $ivent->id }}/comment" method="POST">
                @csrf
                <div class="comment">
                    <h3>コメント</h3>
                    <textarea name="comments[comment]" placeholder="コメント">{{ old('comments.comment') }}</textarea>
                </div>
                <input type="submit" value="送信"/>
            </form>
            
            <div class='footer'>
                <a href='/ivent'>戻る</a>
            </div>
            <br>
            
            <div>
                <h3>＜コメント一覧＞</h3>
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