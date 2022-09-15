@extends('layouts.app')

@section('content')
<div class="bar_area">
    <p><a href="/top">トップ</a></p>
    <p><a href="/submit">モデルの提出</a></p>
    <p><a href="/overview">提出したモデル一覧</a></p>
    <p><a href="/leaderboard" class="selected">リーダーボード</a></p>
    <p><a href="/discussion">ディスカッション</a></p>
    <p><a href="/rule">ルール</a></p>
</div>
<div class="main">
    <p>リーダーボード</p>
    <div class="submits">
        @for ($i = 0; $i < count($submits); $i++)
            <div class="submit">
                <h1>{{ $ranks[$i] }}位 {{ $submits[$i]->user->name }}</h1>
                <h2>手法：{{ $submits[$i]->manner }} スコア：{{ $submits[$i]->score }}</h2>
                <h3>こだわり</h3>
                {{ $submits[$i]->comment }}
            </div>
        @endfor
    </div>
</div>
@endsection
