@extends('layouts.app')

@section('title', 'ライブ座席検索')

<script type="text/javascript">
    2
    window.onorientationchange = function () {
    3
     switch ( window.orientation ) {
    4
      case 0:
    5
       break;
    6
      case 90:
    7
       alert('画面を縦にしてください');
    8
       break;
    9
      case -90:
    10
       alert('画面を縦にしてください');
    11
       break;
    12
     }
    13
    }
    14
</script>

<link rel="stylesheet" href="{{ asset('css/pia.arena.css') }}">
<link rel="stylesheet" href="{{ asset('css/pia.standL.css') }}">
<link rel="stylesheet" href="{{ asset('css/pia.standR.css') }}">
<link rel="stylesheet" href="{{ asset('css/pia.standC.css') }}">
<link rel="stylesheet" href="{{ asset('css/pia.standLC.css') }}">
<link rel="stylesheet" href="{{ asset('css/pia.standRC.css') }}">


@section('content')

<div class="component">
    <pia-component></pia-component>
</div>

@endsection

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>