<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>discussion</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <h1>STS Compe!</h1>
        </div>
        <div class="bar_area">
            <p><a href="/top">トップ</a></p>
            <p><a href="/submit">モデルの提出</a></p>
            <p><a href="/overview">提出したモデル一覧</a></p>
            <p><a href="/leaderboard">リーダーボード</a></p>
            <p><a href="/discussion"><font color="red">ディスカッション</font></a></p>
            <p><a href="/rule">ルール</a></p>
        </div>
        <div class="main">
            <p>ディスカッション</p>
            <a href="/discussion/create" class="create"><font color="green">[投稿作成]</font></a>
            <div class="posts">
                @foreach ($posts as $post)
                    <div class="post">
                        <h2 class="title">{{ $post->title }}</h2>
                        <p class="body">{{ $post->body }}</p>
                        <p class="sub_info">投稿者：{{ $post->user->name }} タグ：{{ $post->category->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
@endsection
