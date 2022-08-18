<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>discussion</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <h1>STS Compe!</h1>
        </div>
        <div class="bar_area">
            <p><a href="/top">トップ</a></p>
            <p><a href="/submit">モデルの提出</a></p>
            <p><a href="/overview">提出したモデル一覧</a></p>
            <p><a href="/leaderboard">リーダーボード</a></p>
            <p><a href="/discussion"><font color="red">ディスカッション</font></a></p>
            <p><a href="/rule">ルール</a></p>
        </div>
        <div class="main">
            <h1>新規投稿</h1>
            <form action="/discussion/create/store" method="POST">
                @csrf
                <div class="category">
                    <h2>Category</h2>
                    <select name="post[category_id]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="title">
                    <h2>Title</h2>
                    <input type="text" name="post[title]" placeholder="タイトル"/>
                </div>
                <div class="body">
                    <h2>Body</h2>
                    <textarea name="post[body]" placeholder="〇〇が××で分かりません"></textarea>
                </div>
                <input type="submit" value="保存"/>
            </form>
            <div class="back">[<a href="/discussion">戻る</a>]</div>
        </div>
    </body>
</html>
@endsection
