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
    <h1>投稿編集</h1>
    <form action="/discussion/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="category">
            <h2>Category</h2>
            <select name="post[category_id]">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id === $post->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            <p class="error">{{ $errors->first('post.category_id') }}</p>
        </div>
        <div class="title">
            <h2>Title</h2>
            <input type="text" name="post[title]" placeholder="タイトル" value="{{ $post->title }}"/>
            <p class="error">{{ $errors->first('post.title') }}</p>
        </div>
        <div class="body">
            <h2>Body</h2>
            <textarea name="post[body]" placeholder="〇〇が××で分かりません">{{ $post->body }}</textarea>
            <p class="error">{{ $errors->first('post.body') }}</p>
        </div>
        <input type="submit" value="更新"/>
    </form>
    <div class="back">[<a href="/discussion/{{ $post->id }}">戻る</a>]</div>
</div>
@endsection
