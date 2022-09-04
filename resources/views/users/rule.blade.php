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
            <p><a href="/discussion">ディスカッション</a></p>
            <p><a href="/rule"><font color="red">ルール</font></a></p>
        </div>
        <div class="main">
            <h1>ルール</h1>
            <iframe src="{{ asset('pdf/STS_intro.pdf') }}" width="50%" height="350px" controlsList="nodownload" oncontextmenu="return false;"></iframe>
            <iframe src="{{ asset('pdf/STS_howto.pdf') }}" width="50%" height="350px" controlsList="nodownload" oncontextmenu="return false;"></iframe>
            <p>下のファイルをダウンロードして、さあ始めてみよう！</p>
            <a href="{{ asset('downloads/STS.zip') }}" download="STS.zip">zipファイルをダウンロード</a>
        </div>
    </body>
</html>
@endsection
