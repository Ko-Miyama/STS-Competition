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
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
            @if (auth()->id() === $post->user_id)
                <a href="/discussion/{{ $post->id }}/edit" class="edit">[編集]</a>
            @endif
            <div class="post">
                <h2 class="title">{{ $post->title }}</h2>
                <p class="body">{{ $post->body }}</p>
                <p class="sub_info">投稿者：{{ $post->user->name }} タグ：{{ $post->category->name }}</p>
                <p class="sub_info">更新日時：{{ $post->updated_at }}</p>
            </div>
            <a href="/discussion">戻る</a>
        </div>
    </body>
</html>
@endsection
