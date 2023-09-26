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
            ユーザー登録
        </x-slot>
        
        <body>
            <form action="/users/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <h2>Twitter</h2>
                    <input type="text" name="user[Twitter_link]" placeholder=""/>
                </div>
                
                <div>
                    <h2>Instagram</h2>
                    <input type="text" name="user[Instagram_link]" placeholder=""/>
                </div>
                
                <div>
                    <h2>自己紹介</h2>
                    <textarea name="user[self_introduction]" placeholder="自己紹介">{{ old('user.self_introduction') }}</textarea>
                </div>
                
                <div>
                    <h2>活動概要</h2>
                    <textarea name="user[activity_overview]" placeholder="活動概要">{{ old('user.activity_overview') }}</textarea>
                </div>
                
                <div>
                    <h2>活動日</h2>
                    <input type="text" name="user[activity_day]" placeholder="活動日"/>
                </div>
                
                <div>
                    <h2>活動人数</h2>
                    <input type="text" name="user[activity_number_of_people]" placeholder="活動人数"/>
                </div>
                
                <div>
                    <h2>アイコン</h2>
                    <input type="file" name="icon">
                </div>
                
                <input type="submit" value="保存"/>
            </form>
        </body>
    </x-app-layout>
    
</html>