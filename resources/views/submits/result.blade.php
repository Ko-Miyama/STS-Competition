@extends('layouts.app')

@section('content')
<div class="bar_area">
    <p><a href="/top">トップ</a></p>
    <p><a href="/submit" class="selected">モデルの提出</a></p>
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
@endsection
