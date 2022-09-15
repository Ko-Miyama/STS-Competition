<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>welcome!</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/home_page.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <h1>Welcome to STS Competition!</h1>
            <a class="btn" href="/top">ログイン/新規登録</a>
        </div>
        <div class="main">
            <div class="sentence">・Two green and white trains sitting on the tracks.</div>
            <div class="sentence">・Two green and white trains on tracks.</div>
            <div class="arrow">↓↓↓</div>
            <div class="score">4.4/5.0点</div>
        </div>
    </body>
</html>
