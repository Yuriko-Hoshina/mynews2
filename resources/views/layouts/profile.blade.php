<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        {{-- windowsの基本ブラウザであるedgeに対応するという記載 --}}
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        {{-- 画面幅を小さくしたとき(スマートフォンで見たとき)などに文字や画像の大きさを調整してくれるタグ --}}
        
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておく --}}
        <title>@yield('title')</title>
        
        {{-- Laraveに標準で用意されているJavascriptを読み込む --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        {{-- フォントに関して --}}
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        {{-- styleに関して。標準で用意されているcssを読み込む --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/profile.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバー --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name','Laravel') }}  
                        {{-- configフォルダのapp.phpの中にあるnameにアクセスする。基本的にはアプリケーションの名前「Laravel」が格納されている --}}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggle-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        {{-- ナビゲーションバーの左側 --}}
                        <ul class="navbar-nav mr-auto">
                            
                        </ul>
                        
                        {{-- ナビゲーションバーの右側 --}}
                        <ul class="navbar-nav ml-auto">
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- ここまでがナビゲーションバー --}}
            
            <main class="py-4">
                {{-- コンテンツを入れるために@yieldで空けておく --}}
                @yield('content')
            </main>
        </div>
    </body>
</html>