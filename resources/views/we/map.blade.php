@extends('we.layout')
@section('title', '地图详情')
@section('header')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="/css/we_map_controls.css">
    <script type="text/javascript"
            src="http://api.map.baidu.com/api?v=2.0&ak=GNEfPXFcuuKglYSB8R45IzmhzfjKDclf"></script>

    <style type="text/css">
        body, html, #allmap {
            width: 100%;
            height: 100%;
            overflow: hidden;
            margin: 0;
            font-family: "微软雅黑";
        }
    </style>
@endsection
@section('body')
    <div id="allmap"></div>
    <div class="map-btn-list" id="js_btnTap">
        <div class="map-btn-item active">
            <div class="img-box">
                <img src="/we_img/house_detail_suppert01.png" alt="">
            </div>
            <div class="text-box">地铁</div>
        </div>
        <div class="map-btn-item">
            <div class="img-box">
                <img src="/we_img/house_detail_suppert02.png" alt="">
            </div>
            <div class="text-box">公交</div>
        </div>
        <div class="map-btn-item">
            <div class="img-box">
                <img src="/we_img/house_detail_suppert03.png" alt="">
            </div>
            <div class="text-box">餐厅</div>
        </div>
        <div class="map-btn-item">
            <div class="img-box">
                <img src="/we_img/house_detail_suppert04.png" alt="">
            </div>
            <div class="text-box">酒店</div>
        </div>
        <div class="map-btn-item">
            <div class="img-box">
                <img src="/we_img/house_detail_suppert05.png" alt="">
            </div>
            <div class="text-box">银行</div>
        </div>
        <div class="map-btn-item">
            <div class="img-box">
                <img src="/we_img/house_detail_suppert06.png" alt="">
            </div>
            <div class="text-box">购物</div>
        </div>
        <div class="map-btn-item">
            <div class="img-box">
                <img src="/we_img/house_detail_suppert07.png" alt="">
            </div>
            <div class="text-box">写字楼</div>
        </div>
        <div class="map-btn-item">
            <div class="img-box">
                <img src="/we_img/house_detail_suppert08.png" alt="">
            </div>
            <div class="text-box">咖啡店</div>
        </div>
    </div>
    <script type="text/javascript">

        // 百度地图API功能
        var map = new BMap.Map("allmap");            // 创建Map实例
        map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);
        var local = new BMap.LocalSearch(map, {
            renderOptions: {map: map, autoViewport: true}
        });
        local.searchNearby("小吃", "前门");
    </script>
@endsection
