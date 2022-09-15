@extends('layouts.app')

@section('content')
<div class="bar_area">
    <p><a href="/top">トップ</a></p>
    <p><a href="/submit">モデルの提出</a></p>
    <p><a href="/overview" class="selected">提出したモデル一覧</a></p>
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
@endsection
