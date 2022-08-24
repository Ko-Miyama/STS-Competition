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
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
            <p>ディスカッション</p>
            <h1>タグ：{{ $category->name }}</h1>
            <div class="posts">
                @foreach ($posts as $post)
                    <div class="post">
                        <div class="delete">
                            @if (auth()->id() === $post->user_id)
                                <form action="/discussion/{{ $post->id }}" id="form_{{ $post->id }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="return deletePost({{ $post->id }});">削除</button>
                                </form>
                            @endif
                        </div>
                        <h2 class="title">
                            <a href="/discussion/{{ $post->id }}">{{ $post->title }}</a>
                        </h2>
                        <p class="body">{{ $post->body }}</p>
                        <p class="sub_info">
                            投稿者：<a href="/discussion/user/{{ $post->user_id }}">{{ $post->user->name }}</a></p>
                    </div>
                @endforeach
            </div>
            <div class="paginate">
                {{ $posts->links() }}
            </div>
            <a href="/discussion">戻る</a>
        </div>
        <script>
            function deletePost(id) {
                'use strict';
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById('form_' + id).submit();
                }
            }
        </script>
    </body>
</html>
@endsection
