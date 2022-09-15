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
    <h1>メッセージの編集</h1>
    <form action="/discussion/{{ $post->id }}/{{ $message->id }}" method="POST">
        @csrf
        @method('PUT')
        <textarea name="post[body]">{{ $message->body }}</textarea>
        <p class="error">{{ $errors->first('post.body') }}</p>
        <input type="submit" value="編集">
    </form>
    <a href="/discussion/{{ $post->id }}">戻る</a>
</div>
@endsection
