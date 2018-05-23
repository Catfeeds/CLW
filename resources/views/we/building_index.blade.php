@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="/css/we_building_index.css">
@endsection
@section('body')
    <input id="pageOne" value="{{json_encode($data)}}" type="hidden"/>
    <div id="buildingList">
        <header id="header" class="mui-bar mui-bar-nav">
            <h1 class="mui-title">写字楼</h1>
            <div class="select-box">
                <building-select ref='buildingSelect' @@flush-data='changeData'></building-select>
            </div>
        </header>
        <div class="main-content">
            <building-list position-img='/we_img/index_positon.png' good-img='/we_img/index_good.png' :list='list'></building-list>
        </div>
    </div>
    <script src="/js/we_building_index.js"></script>
@endsection