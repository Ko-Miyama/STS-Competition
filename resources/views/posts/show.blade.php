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
<div class="main">
    <p>ディスカッション</p>
    @if (auth()->id() === $post->user_id)
        <a href="/discussion/{{ $post->id }}/edit" class="edit">[編集]</a>
    @endif
    <div class="post">
        <h2 class="title">{{ $post->title }}</h2>
        <p class="body">{{ $post->body }}</p>
        <p class="sub_info">投稿者：{{ $post->user->name }} タグ：{{ $post->category->name }}</p>
        <p class="sub_info">更新日時：{{ $post->updated_at }}</p>
    </div>
    <div class="messages">
        <h3>メッセージ</h3>
        @foreach ($messages as $message)
            <div class="message">
                @if ($message->user_id === auth()->id())
                    <a href="/discussion/{{ $post->id }}/{{ $message->id }}/edit">編集</a>
                    <form action="/discussion/{{ $post->id }}/{{ $message->id }}" id="form_{{ $message->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="button" onclick="deleteMessage('form_' + {{ $message->id }});" value="削除">
                    </form>
                @endif
                <p>{{ $message->body }}</p>
                <p>{{ $message->user->name }}</p>
            </div>
        @endforeach
    </div>
    <form action="/discussion/{{ $post->id }}/msgstore" id="form" method="POST">
        @csrf
        <textarea id="msg" name="post[body]">{{ old('post.body') }}</textarea>
        <p class="error">{{ $errors->first('post.body') }}</p>
        <input type="button" onclick="postWithJudge();" value="送信">
    </form>
    <a href="/discussion">戻る</a>
</div>
<script>
    'use strict';
    function postWithJudge() {
        if (document.getElementById('msg').value !== '') {
            document.getElementById('form').submit();
        }
    }

    function deleteMessage(id) {
        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(id).submit();
        }
    }
</script>
@endsection
