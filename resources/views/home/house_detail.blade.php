@extends('home.layouts.layout')
@section('title', '房源详情')
@section('header')
<link rel="stylesheet" href="{{homeRes('/css/home_house_detail.css')}}">
<meta name="storeId" content="{{ $house->id }}" data-type='house'>
<style>
    #serverNext:hover {
        background: url({{homeRes("/home_img/house_detail_right_before.png")}}) no-repeat !important;
    }
    #serverPrev:hover {
        background: url({{homeRes("/home_img/house_detail_left_before.png")}}) no-repeat !important;
    }
    .pircePic:hover div {
        background: url({{homeRes("/home_img/house_detail_collect_after.png")}}) no-repeat !important;
    }
</style>

@endsection
@section('body')
@include('home.nav')
@include('home.right_tab')
<div class="content">
    <div style="background: #fff">
    <!-- 导航条 -->
    @include('home.layouts.nav', ['arrs'=>$data])
        <!-- 轮播 --> 
        <div class="banner">
            <div class="swiper">
                <div class="swiper-container" id="bigImg">
                    <div class="swiper-wrapper">
                        @foreach($house->pic_url as $houses)
                        <div class="swiper-slide"><img src="{{$houses['url']}}"></div>
                        @endforeach
                    </div>
                </div>
                <div class="littelSwiper">
                    <div id="prev">
                        <div class="swiperPic">
                            <img src="{{homeRes('/home_img/house_detail_left.jpg')}}">
                        </div>
                        <div class="swiperPic js_swiper">
                            <img src="{{homeRes('/home_img/house_detail_left_before.jpg')}}">
                        </div>
                    </div>
                    <div class="swiper-container" id="smallImg">
                        <div class="swiper-wrapper">
                            @foreach($house->pic_url as $houses)
                            <div class="swiper-slide stop-swiping"><img src="{{$houses['url']}}"></div>
                            @endforeach
                        </div>
                    </div>
                    <div id="next">
                        <div class="swiperPic @if($house->pic_url->count()>5)js_swiper @endif">
                            <img src="{{homeRes('/home_img/house_detail_right.jpg')}}">
                        </div>
                        <div class="swiperPic @if($house->pic_url->count()>5)active @else js_swiper @endif">
                            <img src="{{homeRes('/home_img/house_detail_right_before.jpg')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="infor">
                <!-- 标题 -->
                <div class="title">{{$house->title}}</div>
                <!-- 价格 -->
                <div class="price">
                    <div>
                        <span>{{$house->total_price}}</span>元/月（单价：{{$house->unit_price_cn}}）
                    </div>
                    <!-- <div class="collect">
                        <div class="pircePic">
                            <div style="background: url({{homeRes('/home_img/house_detail_collect_before.png')}} no-repeat;"></div>
                        </div>
                        <div class="collectTitle">收藏</div>
                    </div> -->
                </div>
                <!-- 面积 -->
                <div class="acreage">
                    <div><span>建筑面积</span>{{$house->constru_acreage_cn}}</div>
                    <div><span>可容纳工位数</span>{{$house->station_number_cn}}</div>
                    <div><span>装修程度</span>{{$house->renovation_cn}}</div>
                    <div class="address">
                        <div><span>楼盘地址</span><div class="addressInfor">{{$house->address}}</div></div>
                        <span class="js_map"><img src="{{homeRes('/home_img/house_detail_map.png')}}"> 查看地图</span>
                    </div>
                    <div class="better">
                        @if(!empty($house->house_feature[0]))
                        <div class="better1">{{$house->house_feature[0]}}</div>
                        @endif
                        @if(!empty($house->house_feature[1]))
                        <div class="better2">{{$house->house_feature[1]}}</div>
                        @endif
                        @if(!empty($house->house_feature[2]))
                        <div class="better3">{{$house->house_feature[2]}}</div>
                        @endif
                    </div>
                </div>
                <!-- 优势 -->
                <!-- <div class="better">
                    <div>免租期长</div>
                    <div>押一付一</div>
                    <div>豪华装修</div>
                </div> -->
                <!-- 电话咨询 -->
                <div class="tel">
                    <div class="agent">
                        <img src="{{$agentInfo->agent_pic_cn}}">
                        <div class="name">
                            <div class="nameDet">{{$agentInfo->agent_name}}</div>
                            <div>{{$agentInfo->name}}商圈专属顾问</div>
                        </div>
                    </div>
                    <!-- <div class="consult">
                        <div><img src=""> 在线咨询</div>
                    </div> -->
                </div>
                <div class="button"><img src="{{homeRes('/home_img/house_detail_free.png')}}"></div>
            </div>
        </div>
    </div>
    <div class="second">
        <!-- 房源信息 -->
        <div class="houseInfor">
            <div class="houseDetail">
                <div class="left">
                    <div>
                        <div class="head">基本信息</div>
                        <!-- 房源详情 -->
                        <div class="house">
                            <div class="houseTitle">房源详情</div>
                            <div class="housePay">
                                <div>
                                    <span class="houseBox">支付方式</span><span>{{$house->payment_type_cn}}</span>
                                </div>
                                <div>
                                    <span class="houseBox">所在楼层</span><span>{{$house->floor_cn}}</span>
                                </div>
                                <div>
                                    <span class="houseBox">入住时间</span><span>{{$house->check_in_time_cn}}</span>
                                </div>
                                <div>
                                    <span class="houseBox">注册公司</span><span>{{$house->register_company_cn}}</span>
                                </div>
                                <div>
                                    <span class="houseBox">最短租期</span><span>{{$house->shortest_lease_cn}}</span>
                                </div>
                            </div>
                            <div class="houseType">
                                <div>
                                    <span class="houseBox1">装修</span><span>{{$house->renovation_cn}}</span>
                                </div>
                                <div>
                                    <span class="houseBox1">类型</span><span>{{$house->office_building_type_cn}}</span>
                                </div>
                                <div>
                                    <span class="houseBox1">户型</span><span>{{$house->house_type_cn}}</span>
                                </div>
                                <div>
                                    <span class="houseBox1">朝向</span><span>{{$house->orientation_cn}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- 楼座信息 -->
                        <div class="house">
                            <div class="houseTitle">栋座信息</div>
                            <div class="housePay">
                                <div>
                                    <span class="houseBox">等级</span><span>{{$house->class}}</span>
                                </div>
                                <div>
                                    <span class="houseBox">物业公司</span><span>{{$house->property_company}}</span>
                                </div>
                                <div>
                                    <span class="houseBox">房屋结构</span><span>{{$house->structure}}</span>
                                </div>
                                <div>
                                    <span class="houseBox">物业费</span><span>{{$house->property_fee}}</span>
                                </div>
                            </div>
                            <div class="housePay"  style="margin-left: 0">
                                <div>
                                    <span class="houseBox">采暖方式</span><span>{{$house->heating}}</span>
                                </div>
                                <div>
                                    <span class="houseBox">电梯数量</span><span>{{$house->elevator_num}}</span>
                                </div>
                                <div>
                                    <span class="houseBox">总楼层</span><span>{{$house->total_floor}}</span>
                                </div>
                                <div>
                                    <span class="houseBox">空调类型</span><span>{{$house->air_conditioner}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="build"></div>
                    </div>
                    {{--<div class="panorama-box">
                        <div class="head">360全景</div>
                        <div class="panorama-body">
                            <div id="viewer"></div>
                        </div>
                    </div> --}}
                    {{-- <button class="zxz-test">zxz</button> 测试--}}
                    <div class='server'>
                        <div class="head">企业服务</div>
                        <div class="serverPic">
                            <div class="serverImg" id="serverPrev" style="background: url({{homeRes('/home_img/house_detail_left.png')}}) no-repeat;"></div>
                            <div class="swiper-container" id="service">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="{{homeRes('/home_img/services/plant.png')}}"><div>绿植摆租</div></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="{{homeRes('/home_img/services/furniture.png')}}"><div>办公家具</div></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="{{homeRes('/home_img/services/clean.png')}}"><div>保洁服务</div></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="{{homeRes('/home_img/services/decoration.png')}}"><div>企业装修</div></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="{{homeRes('/home_img/services/water.png')}}"><div>桶装水</div></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="{{homeRes('/home_img/services/computer.png')}}"><div>办公设备</div></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="{{homeRes('/home_img/services/move.png')}}"><div>搬家服务</div></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="{{homeRes('/home_img/services/agency.png')}}"><div>工商代办</div></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="{{homeRes('/home_img/services/car.png')}}"><div>豪车租赁</div></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="{{homeRes('/home_img/services/support.png')}}"><div>金融支持</div></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="{{homeRes('/home_img/services/green.png')}}"><div>绿化环保</div></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="{{homeRes('/home_img/services/advertisement.png')}}"><div>图文广告</div></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="{{homeRes('/home_img/services/pds.png')}}"><div>综合布线</div></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="{{homeRes('/home_img/services/finance.png')}}"><div>财务财税</div></a></div>
                                </div>
                            </div>
                            <div class="serverImg" id="serverNext" style="background: url({{homeRes('/home_img/house_detail_right.png')}}) no-repeat;"></div>
                        </div>
                    </div>
                </div>
                <!-- 免费委托找房 -->
                <div class="findHouse">
                    <find-house source-page='房源详情'></find-house>
                </div>
            </div>
        </div>
        <!-- 周边配套 -->
        <div class="facilities">
            <div class="facilitiesMap">
            <div class="head">周边配套</div>
                <div class="facilitiesBox">
                    <div class="map" id="map">
                        <detail-map :coordinate='data'></detail-map>
                    </div>
                    <div id="props" data-data='{{$house->toJson()}}' style="display:none"></div>            
                </div>
            </div>
        </div>
        <!-- 猜你喜欢 -->
        <div class="enjoy" id="enjoy">
            <div class="enjoyBox">
                <div class="head">猜你喜欢</div>
                <div class="enjoyList">
                    @foreach($rimHouse as $rimHouses)
                    <a href="{{url('/office_building_houses').'/'.$rimHouses->id}}">
                    <div class="enjoyDetail">
                        <div class="enjoyPic"><img src="{{$rimHouses->indoor_img_cn}}" alt=""></div>
                        <div class='enjoyInfor'>
                            <div class="enjoyTitle">{{$rimHouses->building_name}}</div>
                            <div class="enjoyIntro">
                                <div class="enjoyAddress"><img src="{{homeRes('/home_img/house_detail_map1.png')}}"> {{$rimHouses->address}}</div>
                                <div class="enjoyPrice"><span>{{$rimHouses->unit_price}}</span> 元/m²月</div>
                            </div>
                        </div>
                    </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('home.footer')
@endsection
@section('script')
<script src="{{homeRes('/js/home_house_detail.js')}}"></script>
@endsection
