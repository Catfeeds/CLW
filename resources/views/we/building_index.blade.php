@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="/css/we_building_index.css">
@endsection
@section('body')
    <input id="pageOne" value="{{json_encode($data)}}" type="hidden"/>
    <input id="request" value="{{json_encode($req)}}" type="hidden">
    <div id="buildingList">
        <div class="main-content">
            <building-list position-img='/we_img/index_positon.png' good-img='/we_img/index_good.png' :list='list'></building-list>
            <div class="more" v-if="getData" @touchend='getMore'>
                <button type="button">查看更多</button>
            </div>
            <div class="more" v-if="!getData && status">
                <button type="button">
                    <i class="mui-icon mui-icon-spinner-cycle mui-spin"></i>正在加载。。。
                </button>
            </div>
        </div>
    </div>
    <!-- 底部导航 -->
        @include('we.tab')
    <script src="/js/we_building_index.js"></script>
@endsection