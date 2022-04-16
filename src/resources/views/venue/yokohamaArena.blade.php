@extends('layouts.app')

@section('title', 'ライブ座席検索')

@section('content')
<h1>横浜アリーナ</h1>
<p>神奈川県横浜市港北区新横浜3-10</p>
<div>
    <a href="https://www.yokohama-arena.co.jp/" target="_blank">>公式サイト</a>
    <img src="https://www.yokohama-arena.co.jp/common/img/organizer/photo/photo_stage_a.jpg">
</div>
<div>
    <a class="twitter-timeline" href="https://twitter.com/YokohamaArena?ref_src=twsrc%5Etfw" width="350px"
        height="600px">Tweets by YokohamaArena</a>
</div>
@endsection

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>