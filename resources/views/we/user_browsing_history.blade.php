@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="/css/user_browsing_history.css">
@endsection
@section('body')
    <div id="pullrefresh">
        <header class="mui-bar mui-bar-transparent">
            <a class="mui-action-back mui-pull-left"><img src="../images/login_back.png" style="width:10px;height:18px;margin-top:30px;"></a>
            <span class="mui-title">浏览记录</span>
        </header>
        <div class="mui-content" id="houseList">
            <house-list good-img='../images/house_detail_decoration.png' :list='list'></house-list>
        </div>
    </div>
    <script src="../js/user_browsing_history.js"></script>
@endsection