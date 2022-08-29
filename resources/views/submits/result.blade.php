<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>submit result</title>

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
            <p><a href="/submit"><font color="red">モデルの提出</font></a></p>
            <p><a href="/overview">提出したモデル一覧</a></p>
            <p><a href="/leaderboard">リーダーボード</a></p>
            <p><a href="/discussion">ディスカッション</a></p>
            <p><a href="/rule">ルール</a></p>
        </div>
        <div class="main">
            <p>result</p>
            @if (! empty($score))
                <h1>提出完了！</h1>
                <h2>あなたのスコアは{{ $score }}です！</h2>
            @else
                <h1>提出失敗</h1>
                <h2 class="error">規定通りのフォーマットで提出してください</h2>
            @endif
        </div>
    </body>
</html>
@endsection
