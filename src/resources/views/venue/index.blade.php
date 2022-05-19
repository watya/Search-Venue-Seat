@extends('layouts.app')

@section('title', 'ライブ座席検索')

@section('content')

<link rel="stylesheet" href="{{ asset('css/index.css') }}">

<h1>会場一覧</h1>

<div>
    <a href="{{ route('venue.pia') }}">ぴあアリーナMM (神奈川)</a>
    <a href="{{ route('venue.pia') }}">
        <img src="https://pia-arena-mm.jp/wp-content/uploads/2020/07/arena.jpg" width="330" height="250">
    </a>
</div>
{{-- <div>
    <a href="{{ route('venue.yokohama') }}">横浜アリーナ</a>
    <img src="https://nationalstadium-tours.com/wp-content/uploads/2020/06/IMG_0633-2000x1200.jpg" width="330"
        height="250">
</div> --}}



@endsection