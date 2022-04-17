@extends('layouts.app')

@section('title', 'ライブ座席検索')
<link rel="stylesheet" href="{{ asset('css/pia.css') }}">

@section('content')
<div>
    <pia-component></pia-component>
</div>
@endsection

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>