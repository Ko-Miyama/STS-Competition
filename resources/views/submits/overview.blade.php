<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>submit overview</title>

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
            <p><a href="/overview"><font color="red">提出したモデル一覧</font></a></p>
            <p><a href="/leaderboard">リーダーボード</a></p>
            <p><a href="/discussion">ディスカッション</a></p>
            <p><a href="/rule">ルール</a></p>
        </div>
        <div class="main">
            <p>提出したモデル一覧</p>
            <div class="submits">
                @foreach ($submits as $submit)
                    <div class="submit">
                        <h2>手法名：{{ $submit->manner }}</h2>
                        <h3>{{ $submit->comment }}</h3>
                        <h3>Score: {{ $submit->score }}</h3>
                    </div>
                @endforeach
            </div>
            <div class="paginate">
                {{ $submits->links() }}
            </div>
        </div>
    </body>
</html>
@endsection
