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
    <p>提出ファイル</p>
    <form method="POST" action="/submit/result" enctype="multipart/form-data">
        @csrf
        提出ファイル
        <input type="file" name="file"><br>
        <p class="error">{{ $errors->first('file') }}</p>
        手法名
        <input type="text" name="post[manner]" placeholder="手法名" value="{{ old('post.manner') }}"><br>
        <p class="error">{{ $errors->first('post.manner') }}</p>
        こだわり
        <textarea name="post[comment]" placeholder="こだわり">{{ old('post.comment') }}</textarea><br>
        <p class="error">{{ $errors->first('post.comment') }}</p>
        <button type="submit">提出</button>
    </form>
</div>
@endsection
