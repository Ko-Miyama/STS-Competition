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
            <th class="del">削除</th>
        </tr>
        @foreach ($submits as $submit)
            <tr>
                <td class="manner">{{ $submit->manner }}</td>
                <td class="comment">{{ $submit->comment }}</td>
                <td class="score">{{ $submit->score }}</td>
                <td class="time">{{ $submit->created_at }}</td>
                <td class="del">
                    <form action="/overview/{{ $submit->id }}" id="form_{{ $submit->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteSubmit('form_' + {{ $submit->id }});">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="paginate">
        {{ $submits->links() }}
    </div>
</div>
<script>
    function deleteSubmit(form_id) {
        'use strict';
        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(form_id).submit();
        }
    }
</script>
@endsection
