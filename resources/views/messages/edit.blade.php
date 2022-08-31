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
            <h1>メッセージの編集</h1>
            <form action="/discussion/{{ $post->id }}/{{ $message->id }}" method="POST">
                @csrf
                @method('PUT')
                <textarea name="post[body]">{{ $message->body }}</textarea>
                <p class="error">{{ $errors->first('post.body') }}</p>
                <input type="submit" value="編集">
            </form>
            <a href="/discussion/{{ $post->id }}">戻る</a>
        </div>
    </body>
</html>
@endsection
