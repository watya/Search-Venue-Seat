@extends('layouts.app')

@section('title', 'ライブ座席検索')
<link rel="stylesheet" href="{{ asset('css/pia.arena.css') }}">
<link rel="stylesheet" href="{{ asset('css/pia.standL.css') }}">
<link rel="stylesheet" href="{{ asset('css/pia.standLC.css') }}">
<link rel="stylesheet" href="{{ asset('css/pia.standR.css') }}">
<link rel="stylesheet" href="{{ asset('css/pia.standC.css') }}">

@section('content')
<h1>ぴあアリーナMM</h1>
<p>神奈川県横浜市西区みなとみらい3-2-2</p>

<div>
    <pia-component></pia-component>
</div>

@endsection

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>