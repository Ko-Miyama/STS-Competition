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
        @foreach ($messages as $message)
            @if ($message->user_id === auth()->id())
                <!--吹き出し（右）の始まり -->
                <div class="sb-box">
                    <div class="icon-name icon-name-right">{{ $message->user->name }}</div>
                    <div class="sb-side sb-side-right">
                        <div class="sb-txt sb-txt-right">
                            {{ $message->body }}
                        </div><!-- /.sb-txt sb-txt-right -->
                        <a href="/discussion/{{ $post->id }}/{{ $message->id }}/edit">編集</a>
                        <form action="/discussion/{{ $post->id }}/{{ $message->id }}" class="sb-txt-delete" id="form_{{ $message->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="button" onclick="deleteMessage('form_' + {{ $message->id }});" value="削除">
                        </form>
                    </div><!-- /.sb-side sb-side-right -->
                </div><!-- /.sb-box -->
                <!--吹き出し（右）の終わり -->
            @else
                <!-- 吹き出し（左）の始まり -->
                <div class="sb-box">
                    <div class="icon-name icon-name-left">{{ $message->user->name }}</div>
                    <div class="sb-side sb-side-left">
                        <div class="sb-txt sb-txt-left">
                            {{ $message->body }}
                        </div><!-- /.sb-txt sb-txt-left -->
                    </div><!-- /.sb-side sb-side-left -->
                </div><!-- /.sb-box -->
                <!--吹き出し（左）の終わり -->
            @endif
        @endforeach
    </div>

    <form action="/discussion/{{ $post->id }}/msgstore" id="form" method="POST">
        @csrf
        <textarea class="wide_space" id="msg" name="post[body]">{{ old('post.body') }}</textarea>
        <p class="error">{{ $errors->first('post.body') }}</p>
        <input type="button" onclick="postWithJudge();" value="メッセージを送信">
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
