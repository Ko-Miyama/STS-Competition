<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>leaderboard</title>

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
            <p><a href="/leaderboard"><font color="red">リーダーボード</font></a></p>
            <p><a href="/discussion">ディスカッション</a></p>
            <p><a href="/rule">ルール</a></p>
        </div>
        <div class="main">
            <p>リーダーボード</p>
            <div class="submits">
                @for ($i = 0; $i < count($submits); $i++)
                    <div class="submit">
                        <h1>{{ $i+1 }}位 {{ $submits[$i]->user->name }}</h1>
                        <h2>手法：{{ $submits[$i]->manner }} スコア：{{ $submits[$i]->score }}</h2>
                        <h3>こだわり</h3>
                        {{ $submits[$i]->comment }}
                    </div>
                @endfor
            </div>
        </div>
    </body>
</html>
@endsection
