@extends('we.layout')
@section('title', '浏览记录')
@section('header')
    <link rel="stylesheet" href="/css/we_user_browsing_history.css">
@endsection
@section('body')
    <input id="pageOne" value="{{json_encode($res)}}" type="hidden"/>
    <div id="pullrefresh">
        <div class="mui-content" id="houseList">
            <house-list good-img='https://upload.chulouwang.com/FkcZNG1e4fXBBG-OmybpERvfyTjC' :list='list'></house-list>
            <div class="more">
                <button type="button">查看更多</button>
            </div>
        </div>
    </div>
    <script src="/js/we_user_brows_history.js"></script>
@endsection