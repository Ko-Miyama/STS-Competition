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
<div class="main overview">
    <p>提出したモデル一覧</p>
    <table class="submits_table">
        <tr>
            <th class="manner">手法名</th>
            <th class="comment">コメント</th>
            <th class="score">スコア</th>
            <th class="time">提出日時</th>
        </tr>
        @foreach ($submits as $submit)
            <tr>
                <td class="manner">{{ $submit->manner }}</td>
                <td class="comment">{{ $submit->comment }}</td>
                <td class="score">{{ $submit->score }}</td>
                <td class="time">{{ $submit->created_at }}</td>
            </tr>
        @endforeach
    </table>
    <div class="paginate">
        {{ $submits->links() }}
    </div>
</div>
@endsection
