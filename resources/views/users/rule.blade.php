@extends('layouts.app')

@section('content')
<div class="bar_area">
    <p><a href="/top">トップ</a></p>
    <p><a href="/submit">モデルの提出</a></p>
    <p><a href="/overview">提出したモデル一覧</a></p>
    <p><a href="/leaderboard">リーダーボード</a></p>
    <p><a href="/discussion">ディスカッション</a></p>
    <p><a href="/rule"class="selected">ルール</a></p>
</div>
<div class="main">
    <h1>ルール</h1>
    <iframe src="{{ asset('pdf/STS_intro.pdf') }}" width="50%" height="350px" controlsList="nodownload" oncontextmenu="return false;"></iframe>
    <iframe src="{{ asset('pdf/STS_howto.pdf') }}" width="50%" height="350px" controlsList="nodownload" oncontextmenu="return false;"></iframe>
    <p>下のファイルをダウンロードして、さあ始めてみよう！</p>
    <a href="{{ asset('downloads/STS.zip') }}" download="STS.zip">zipファイルをダウンロード</a>
</div>
@endsection
