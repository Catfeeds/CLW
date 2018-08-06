@extends('home.layouts.layout')
@section('title', '楼盘详情')
@section('header')
<link rel="stylesheet" href="{{homeRes('/css/home_building_detail.css')}}">
<meta name="storeId" content="{{ $building->id }}" data-type='building'>
@endsection
@section('body')
@include('home.nav')
@include('home.right_tab')
<div class="content">
    @include('home.layouts.nav', ['arrs'=>$data])
        <!-- 轮播 -->
        <div class="swiper-container" id="banner">
            <div class="swiper-wrapper">
            <!-- <div class="swiper-slide"><div class="swiperPic" style="background-image:url(http://osibaji20.bkt.clouddn.com/FjEr7aTT2dJvrExlP75CQhCdVdil)"></div></div> -->
                @foreach($building->pc_pic_url as $pic)
                <div class="swiper-slide"><div class="swiperPic" style="background-image:url({{$pic['url']}})"></div></div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <!-- 详情 -->
        <div class="build">
            <div class="first">
                <!-- 左边 -->
                <div class="left">
                    <!-- 楼盘介绍 -->
                    <div class="intro">
                        <div class="introBox">
                            <div class="introTitle">{{$building->name}}</div>
                            <div class="introBuild">
                                <div class="introNum">{{$building->house_count}}<span style="font-size: 14px;color:#666;">套</span></div>
                                <div>在租房源</div>
                            </div>
                            <div class="introArea">
                                <div class="areaNum">{{$building->constru_acreage}}<span style="font-size: 14px;color:#666;">m²</span></div>
                                <div>可租面积</div>
                            </div>
                            <div class="introRental">
                                <div class="introPrice">{{$building->unit_price}}<span style="font-size: 14px;color:#666;">元/m²</span></div>
                                <div>月度租金</div> 
                            </div>
                        </div>
                        <div class="introAddress"> 
                            <div><img src="{{homeRes('/home_img/build_detail_address.png')}}"> 地址：{{$building->address}}</div>
                            <span class="js_map"><div class="introMap"><img src="{{homeRes('/home_img/house_detail_map.png')}}"><div> 查看地图</div></div></span>
                        </div>
                        <div class="introBetter">
                            <div class="betterTitle">楼盘特色: </div>
                            @foreach($building->pc_feature_name_pic as $feature)
                            <div class="betterDetail">
                                <img src="{{$feature['pic']}}">
                                <span>{{$feature['name']}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- 筛选条件 -->
                    <div class="filter" id="filter">
                        <div class="filterActive">出租房源</div>
                        <div>楼盘信息</div>
                        <div>市场行情</div>
                        <div>周边配套</div>
                        <div>猜你喜欢</div>
                    </div>
                    <!-- 出租房源 -->
                    <div class="rent" id="rent">
                        <div class="h1">出租房源</div>
                        <div>
                            <div class="rentAcreage js_rentAcreage" id="rentAcreage">
                                <div>面积</div>
                                <span class="current">全部</span>
                                <span class="js_active" data-min='0' data-max='100'>0-100m²</span>
                                <span class="js_active" data-min='100' data-max='300'>100-300m²</span>
                                <span class="js_active" data-min='300' data-max='500'>300-500m²</span>
                                <span class="js_active" data-min='500' data-max='1000'>500-1000m²</span>
                                <span class="js_active" data-min='1000'>1000m²以上</span>
                            </div>
                            <div class="rentAcreage js_rentPrice" id="rentPrice">
                                <div>价格</div>
                                <span class="current">全部</span>
                                <span class="js_active" data-min='40' data-max='60'>40-60/m²月</span>
                                <span class="js_active" data-min='60' data-max='80'>60-80/m²月</span>
                                <span class="js_active" data-min='80' data-max='120'>80-120/m²月</span>
                                <span class="js_active" data-min='120' data-max='140'>120-140/m²月</span>
                                <span class="js_active" data-min='140'>140/m²月以上</span>
                            </div>
                        </div>
                    </div>
                    <!-- 房源列表 -->
                    <div class="buildList" id="buildList">
                        <div class="listNav">
                            <div class="js_listCount listCount">共 <span>{{$houses->count()}}</span> 套</div>
                            <div class="js_listArea listArea">
                                <span>面积</span>
                                <div class="listSort">
                                    <span class='rise'><img class="js_price_up_after" src="{{homeRes('/home_img/build_detail_up_before.png')}}">
                                    <img class="js_price_up_before" style="display:none" src="{{homeRes('/home_img/build_detail_up_after.png')}}">
                                    </span>
                                    <span class='drop'><img class="js_price_down_after" src="{{homeRes('/home_img/build_detail_down_defore.png')}}">
                                    <img style="display:none" class="js_price_down_before" src="{{homeRes('/home_img/build_detail_down_after.png')}}">
                                    </span>
                                </div>   
                            </div>
                            <div class="js_listPrice listArea">
                                <span>单价</span>
                                <div class="listSort">
                                    <span class='rise'><img class="js_price_up_after" src="{{homeRes('/home_img/build_detail_up_before.png')}}">
                                    <img class="js_price_up_before" style="display:none" src="{{homeRes('/home_img/build_detail_up_after.png')}}">
                                    </span>
                                    <span class='drop'><img class="js_price_down_after" src="{{homeRes('/home_img/build_detail_down_defore.png')}}">
                                    <img class="js_price_down_before" style="display:none" src="{{homeRes('/home_img/build_detail_down_after.png')}}">
                                    </span>
                                </div>  
                            </div>
                            <div class="js_listTotal listArea">
                                <span>总价</span>
                                <div class="listSort">
                                    <span class='js_rise rise'><img class="js_price_up_after" src="{{homeRes('/home_img/build_detail_up_before.png')}}">
                                    <img class="js_price_up_before" style="display:none" src="{{homeRes('/home_img/build_detail_up_after.png')}}">
                                    </span>
                                    <span class='js_drop drop'><img class="js_price_down_after" src="{{homeRes('/home_img/build_detail_down_defore.png')}}">
                                    <img class="js_price_down_before" style="display:none" src="{{homeRes('/home_img/build_detail_down_after.png')}}">
                                    </span>
                                </div>
                            </div>
                            <div class="special">特色</div>
                        </div>
                        <div class="js_listDetail">
                            @foreach($houses as $house)
                            <div class="listDetail">
                                <a href="{{url('/office_building_houses').'/'.$house->id}}">
                                    <div class="listPic"><img src="{{$house->indoor_img_cn}}"></div>
                                    <div class="listNum">
                                        <div><span id="listArea">{{$house->constru_acreage}}</span>m²</div>
                                        <div><span id="listPrice">{{$house->unit_price}}</span>元/㎡·月</div>
                                        <div><span id="listTotal">{{$house->total_price}}</span>元/月</div>
                                    </div>
                                    <div class="listSpecial" id="listSpecial">
                                        @if(!empty($house->house_feature[0]))
                                        <div class="special1">{{$house->house_feature[0]}}</div>
                                        @endif
                                        @if(!empty($house->house_feature[1]))
                                        <div class="special2">{{$house->house_feature[1]}}</div>
                                        @endif
                                        @if(!empty($house->house_feature[2]))
                                        <div class="special3">{{$house->house_feature[2]}}</div>
                                        @endif
                                    </div>
                                </a>
                            </div> 
                            @endforeach
                        </div>
                    </div>
                    <!-- 查看所有 -->
                    @if($houses->count()>10)
                    <div class="all">查看所有出租房源</div>
                    @endif
                    <!-- 楼盘信息 -->
                    <div class="buildInfor" id="buildInfor">
                        <div class="h1">楼盘信息</div>
                        <div class="buildInforBox">
                            <div class="buildInforList">
                                <div class="buildRow">
                                    <div>
                                        <span class="developer">开发商</span><span>{{$building->developer}}</span>
                                    </div>
                                    <div>
                                        <span class="developer">建筑年代</span>
                                        <span>{{$building->years_cn}}</span>
                                    </div>
                                </div>
                                <div class="buildRow">
                                    <div><span class="developer">总建筑面积</span><span>{{$building->acreage_cn}}</span></div>
                                    <div><span class="developer">楼栋数量</span><span>{{$building->building_block_num_cn}}</span></div>
                                </div>
                                <div class="buildRow">
                                    <div><span class="developer">车位数量</span><span>{{$building->parking_num_cn}}</span></div>
                                    <div><span class="developer">停车费</span><span>{{$building->parking_fee_cn}}</span></div>
                                </div>
                                <div class="buildRow">
                                    <div><span class="developer">绿化率</span><span>{{$building->greening_rate_cn}}</span></div>
                                </div>
                                <div class="buildRow">
                                    <div class="company"><span class="developer">入驻企业</span><span>{{$building->company_string}}</span></div>
                                </div>
                            </div>
                            <div class="buildDetail">{{$building->describe}}</div>
                        </div>
                    </div>
                    <!-- 市场行情 -->
                    <div class="quotation" id="quotation">
                        <div class="h1">市场行情</div>
                        <div class="average">
                            <div class="buildPrice"><div>{{$data['2']['name']}}均价(楼盘)</div><div>@{{list.buildingAveragePrice}}</div></div>
                            <div class="buildPrice"><div>{{$data['1']['name']}}均价(商圈)</div><div>@{{list.blockAveragePrice}}</div></div>
                            <div class="buildPrice"><div>{{$data['0']['name']}}均价(区域)</div><div>@{{list.areaAveragePrice}}</div></div>
                        </div>
                    </div>
                </div>
                <!-- 右边 -->
                <div class="right">
                    <!-- 经纪 -->
                    <div class="agent">
                        <img class="agentPic" src="{{$block->agent_pic_cn}}">
                        <div class="name">
                            <div class="nameFirst">{{$block->agent_name}}</div>
                            <div>{{$block->name}}楼盘专属顾问</div>
                        </div>
                        <div class="free">免费咨询</div>
                        <div class="service">
                            <img src="{{homeRes('/home_img/build_detail_button.png')}}">
                        </div>
                    </div>
                    <!-- 委托找房 -->
                    <div class="findHouse">
                        <find-house source-page='楼盘详情'></find-house>
                    </div>
                </div>
            </div>
            <div class="second" id="second">
                <div class="h1">周边配套</div>
                <div class="map" id="map">
                    <detail-map :coordinate='data'></detail-map>
                </div>
                <div id="props" data-data='{{$building->toJson()}}' style="display:none"></div>
            </div>
            <div class="enjoy" id="enjoy">
                <div class="enjoyBox">
                    <div class="h1">猜你喜欢</div>
                    <div class="enjoyList">
                        <a v-for="(item, index) in list" class="pointer" @click="toBuilding(item.id)">
                        <div class="enjoyDetail">
                            <div class="enjoyPic"><img :src="item.img_cn"></div>
                            <div class='enjoyInfor'>
                                <div class="enjoyTitle">@{{item.name}}</div>
                                <div class="enjoyIntro">
                                    <div class="enjoyAddress"><img src="{{homeRes('/home_img/house_detail_map1.png')}}"> @{{item.address_cn}}</div>
                                    <div class="enjoyPrice"><span>@{{item.avg_price}}</span> 元/m²月</div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('home.footer')
@endsection
@section('script')
<script src="{{homeRes('/js/home_building_detail.js')}}"></script>
@endsection
