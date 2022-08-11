<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>welcome!</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="button-zorn">
            <!--後で認証を付けてtopに遷移する前に認証画面に移るようにする-->
            <a href="/top">ログイン</a>
        </div>
        <div class="body">
            <h1>Welcome to STS Competition!</h1>
            <p>Two green and white trains sitting on the tracks.   Two green and white trains on tracks.</p>
            <p>↓↓↓</p>
            <p>4.4/5.0点</p>
        </div>
    </body>
</html>
