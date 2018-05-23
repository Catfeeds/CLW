@extends('we.layout')
@section('title', '楚楼网-精选楼盘')
@section('header')
@endsection
@section('body')
    <input type="hidden" id="listAppData" value="{{$data}}" />
    <div id="app">
        <div class="main-content">
            <building-list position-img='../images/index_positon.png' good-img='../images/index_good.png' :list='list'></building-list>
        </div>
    </div>
    <script src="/js/we_recommed.js"></script>
@endsection
