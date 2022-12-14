@extends('layouts.app')

@section('content')
<div class="bar_area">
    <p><a href="/top">トップ</a></p>
    <p><a href="/submit">モデルの提出</a></p>
    <p><a href="/overview">提出したモデル一覧</a></p>
    <p><a href="/leaderboard">リーダーボード</a></p>
    <p><a href="/discussion" class="selected">ディスカッション</a></p>
    <p><a href="/rule">ルール</a></p>
</div>
<div class="main discussion">
    <div class="header">
        <h1 class="left">ディスカッション</h1>
        <a href="/discussion/create" class="create right"><h1>[投稿作成]</h1></a>
    </div>
    <div class="posts">
        @foreach ($posts as $post)
            <div class="post">
                <div class="delete">
                    @if (auth()->id() === $post->user_id)
                        <form action="/discussion/{{ $post->id }}" id="form_{{ $post->id }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="return deletePost('form_' + {{ $post->id }});">削除</button>
                        </form>
                    @endif
                </div>
                <h2 class="title">
                    <a href="/discussion/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <h4 class="body">{{ $post->body }}</h4>
                <p class="sub_info">
                    投稿者：<a href="/discussion/user/{{ $post->user_id }}">{{ $post->user->name }}</a>,
                    タグ：<a href="/discussion/category/{{ $post->category_id }}">{{ $post->category->name }}</a><br>
                    メッセージ数：{{ $post->messages_count }}件<br>
                    編集日時：{{ $post->updated_at }}
                </p>
            </div>
        @endforeach
    </div>
    <div class="paginate">
        {{ $posts->links() }}
    </div>
</div>
<script>
    function deletePost(id) {
        'use strict';
        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(id).submit();
        }
    }
</script>
@endsection
