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
<div class="main leaderboard">
    <p>リーダーボード</p>
    <table class="submits_table">
        <tr>
            <th class="order">順位</th>
            <th class="name">名前</th>
            <th class="manner">手法</th>
            <th class="comment">こだわり</th>
            <th class="score">スコア</th>
        </tr>
        @for ($i = 0; $i < count($submits); $i++)
            <tr>
                <td class="order">{{ $ranks[$i] }}位</td>
                <td class="name">{{ $submits[$i]->user->name }}</td>
                <td class="manner">{{ $submits[$i]->manner }}</td>
                <td class="comment">{{ $submits[$i]->comment }}</td>
                <td class="score">{{ $submits[$i]->score }}</td>
            </tr>
        @endfor
    </table>
</div>
@endsection
