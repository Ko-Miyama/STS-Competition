@extends('layouts.app')

@section('content')
<div class="bar_area">
    <p><a href="/top" class="selected">トップ</a></p>
    <p><a href="/submit">モデルの提出</a></p>
    <p><a href="/overview">提出したモデル一覧</a></p>
    <p><a href="/leaderboard">リーダーボード</a></p>
    <p><a href="/discussion">ディスカッション</a></p>
    <p><a href="/rule">ルール</a></p>
</div>
<div class="top main">
    <p>2つの文章を比較して類似度を出そう！</p>
    <ul>
        <li>A large boat in the water at the marina.</li>
        <li>A large boat on the sea.</li>
    </ul>
    <p>このような2つの文章が与えられた時......スコアは3.2......</p>
</div>
@endsection
