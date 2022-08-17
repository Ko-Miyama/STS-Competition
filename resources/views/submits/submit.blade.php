<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>submit</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <h1>STS Compe!</h1>
        </div>
        <div class="bar_area">
            <p><a href="/top">トップ</a></p>
            <p><a href="/submit"><font color="red">モデルの提出</font></a></p>
            <p><a href="/overview">提出したモデル一覧</a></p>
            <p><a href="/leaderboard">リーダーボード</a></p>
            <p><a href="/discussion">ディスカッション</a></p>
            <p><a href="/rule">ルール</a></p>
        </div>
        <div class="main">
            <p>提出ファイル</p>
            <form method="POST" action="/submit/result" enctype="multipart/form-data">
                @csrf
                提出ファイル
                <input type="file" name="file"><br>
                <!--***↑後でバリデーション付ける..txt py のみ***-->
                手法名
                <input type="text" name="post[manner]" placeholder="手法名"><br>
                <!--***↑後でバリデーション付ける***-->
                こだわり
                <textarea name="post[comment]" placeholder="こだわり"></textarea><br>
                <!--***↑後でバリデーション付ける***-->
                <button type="submit">提出</button>
            </form>
        </div>
    </body>
</html>
@endsection