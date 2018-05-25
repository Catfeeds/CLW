@extends('we.layout')
@section('title', '地图详情')
@section('header')
    <link rel="stylesheet" href="/css/we_map_controls.css">
@endsection
@section('body')
    <div id="Vuemap" style="height:100%;">
        <baidu-map :zoom="14" class="map" style="display: flex;height:100%; flex-direction: column"
                   :center="center">
            <bm-control style="right: 0px;">
                <div class="map-btn-list" id="js_btnTap">
                    <div class="map-btn-item active" data-name="地铁">
                        <div class="img-box">
                            <img src="/we_img/house_detail_suppert01.png" alt="">
                        </div>
                        <div class="text-box">地铁</div>
                    </div>
                    <div class="map-btn-item" data-name="公交">
                        <div class="img-box">
                            <img src="/we_img/house_detail_suppert02.png" alt="">
                        </div>
                        <div class="text-box">公交</div>
                    </div>
                    <div class="map-btn-item" data-name="餐厅">
                        <div class="img-box">
                            <img src="/we_img/house_detail_suppert03.png" alt="">
                        </div>
                        <div class="text-box">餐厅</div>
                    </div>
                    <div class="map-btn-item" data-name="酒店">
                        <div class="img-box">
                            <img src="/we_img/house_detail_suppert04.png" alt="">
                        </div>
                        <div class="text-box">酒店</div>
                    </div>
                    <div class="map-btn-item" data-name="银行">
                        <div class="img-box">
                            <img src="/we_img/house_detail_suppert05.png" alt="">
                        </div>
                        <div class="text-box">银行</div>
                    </div>
                    <div class="map-btn-item" data-name="购物">
                        <div class="img-box">
                            <img src="/we_img/house_detail_suppert06.png" alt="">
                        </div>
                        <div class="text-box">购物</div>
                    </div>
                    <div class="map-btn-item" data-name="写字楼">
                        <div class="img-box">
                            <img src="/we_img/house_detail_suppert07.png" alt="">
                        </div>
                        <div class="text-box">写字楼</div>
                    </div>
                    <div class="map-btn-item" data-name="咖啡店">
                        <div class="img-box">
                            <img src="/we_img/house_detail_suppert08.png" alt="">
                        </div>
                        <div class="text-box">咖啡店</div>
                    </div>
                </div>
            </bm-control>
            <bm-local-search :keyword="keyword" :auto-viewport="true" :location="center" :panel="false"></bm-local-search>
        </baidu-map>
    </div>
    <script src="/js/we_map_detail.js"></script>
@endsection
