@extends('we.layout')
@section('title', '楚楼网-精选楼盘')
@section('header')
@endsection
@section('body')
    <input type="hidden" id="listAppData" value="{{json_encode($data)}}" />
    <div id="app">
        <div class="main-content">
            <building-list position-img='/we_img/index_positon.png' good-img='/we_img/index_good.png' :list='list'></building-list>
        </div>
    </div>
    <script src="{{res('/js/we_recommed.js')}}"></script>
@endsection
