@extends('layouts.app')

@section('title', 'ライブ座席検索')

@section('content')

<h1>会場一覧</h1>
<div>
    <a href="{{ route('venue.piaArena') }}">ぴあアリーナMM</a>
    <img src="https://corporate.pia.jp/business/hall/img/img_02.jpg" width="330" height="250">
</div>
<div>
    <a href="{{ route('venue.yokohamaArena') }}">横浜アリーナ</a>
    <img src="https://nationalstadium-tours.com/wp-content/uploads/2020/06/IMG_0633-2000x1200.jpg" width="330"
        height="250">
</div>
@endsection