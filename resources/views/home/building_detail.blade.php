@extends('home.layouts.layout')
@section('title', '楼盘详情')
@section('header')
<link rel="stylesheet" href="/css/home_building_detail.css">
@endsection
@section('body')
<div class="content">
        <div class="nav"><span>首页</span><span>>洪山区</span><span>>光谷</span><span>>{{$building->name}}</span></div>
        <!-- 轮播 -->
        <div class="swiper-container" id="banner">
            <div class="swiper-wrapper">
                @foreach($building->pic_url as $pic)
                <div class="swiper-slide"><img src="{{$pic['url']}}" alt=""></div>
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
                                <div class="introNum">{{$building->house_count}}</div>
                                <div>在租房源/套</div>
                            </div>
                            <div class="introBuild">
                                <div class="introNum">{{$building->constru_acreage}}</div>
                                <div>可租面积/平米</div>
                            </div>
                            <div class="introRental">
                                <div class="introPrice">{{$building->unit_price}}</div>
                                <div>月度租金/元每平方米</div>
                            </div>
                        </div>
                        <div class="introAddress">
                            <div><img src="/we_img/house_detail_address.png"> 地址：{{$building->address}}</div>
                            <a href="#"><div><img src="">查看地图</div></a>
                        </div>
                        <div class="introBetter">
                            @foreach($building->feature_name_pic as $feature)
                            <div><img src="{{$feature}}"></div>
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
                            <div class="rentAcreage" id="rentAcreage"><div>面积</div>
                            <span>全部</span><span>0-100m²</span><span>100-300m²</span><span>300-500m²</span><span>500-1000m²</span><span>1000m²</span><span>以上</span></div>
                            <div class="rentAcreage" id="price"><div>价格</div><span>全部</span><span>40-60/m²月</span><span>60-80/m²月</span><span>80-120/m²月</span><span>120-140/m²月</span><span>140/m²月</span><span>以上</span></div>
                        </div>
                    </div>
                    <!-- 房源列表 -->
                    <div class="buildList" id="buildList">
                        <div class="listNav">
                            <div>共<span> {{$houses->count()}} </span>套</div>
                            <div>面积</div>
                            <div>单价</div>
                            <div>总价</div>
                            <div class="special">特色</div>
                        </div>
                        @foreach($houses as $house)
                        <a href="#">
                        <div class="listDetail">
                            <div class="listPic"><img src="{{$house->indoor_img_cn}}"></div>
                            <div class="listPic listNum"><span>{{$house->constru_acreage_cn}}</span></div>
                            <div class="listPic listNum"><span>{{$house->unit_price_cn}}</span></div>
                            <div class="listPic listNum"><span>{{$house->total_price_cn}}</span></div>
                            <div class="listSpecial listNum">
                                @if(!empty($house->house_feature[0]))
                                <span>{{$house->house_feature[0]}}</span>
                                @endif
                                @if(!empty($house->house_feature[1]))
                                <span>{{$house->house_feature[1]}}</span>
                                @endif
                                @if(!empty($house->house_feature[2]))
                                <span>{{$house->house_feature[2]}}</span>
                                @endif
                            </div>
                        </div>
                        </a>
                        @endforeach
                    </div>
                    <!-- 查看所有 -->
                    <div class="all">查看所有出租房源</div>
                    <!-- 楼盘信息 -->
                    <div class="buildInfor" id="buildInfor">
                        <div class="h1">楼盘信息</div>
                        <div class="buildRow">
                            <div><span class="developer">开发商</span><span>{{$building->developer}}</span></div>
                            <div><span class="developer">建筑年代</span><span>{{$building->years_cn}}</span></div>
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
                        <div class="buildDetail">{{$building->describe}}</div>
                    </div>
                    <!-- 市场行情 -->
                    <div class="quotation" id="quotation">
                        <div class="h1">市场行情</div>
                        <div class="average">
                            <div class="buildPrice"><div>现代光谷世贸中心均价（楼盘）</div><div>{{$building->buildingAverage}}</div></div>
                            <div class="buildPrice"><div>光谷均价（商圈）</div><div>{{$building->blockAverage}}</div></div>
                            <div class="buildPrice"><div>洪山均价（区域）</div><div>{{$building->areaAverage}}</div></div>
                        </div>
                    </div>
                </div>
                <!-- 右边 -->
                <div class="right">
                    <!-- 经纪 -->
                    <div class="agent">
                        <img src="{{$block->agent_pic_cn}}">
                        <div class="name"><div>{{$block->agent_name}}</div><div>{{$block->name}}楼盘经纪</div></div>
                        <div class="free"><div>免费咨询</div><div class="tel">400-580-8888 转 2347</div></div>
                        <div class="service">在线客服</div>
                    </div>
                    <!-- 委托找房 -->
                    <div class="findHouse">
                        <img src="" alt="">
                        <div class="entrust">
                            <input type="text" placeholder="请输入手机号" id="entrust">
                            <div class="order">立即委托</div>
                        </div>
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
            <div class="third" id="third">
                <div class="h1">猜你喜欢</div>
                <div class="list">
                    @foreach($likeBuilding as $like)
                    <div class="detail">
                        <div><img src="{{$like['img_cn']}}" alt=""></div>
                        <div class="buildDetail">
                            <!-- 楼盘名称 -->
                            <div class="building">
                                <div class="name">{{$like['name']}}</div>
                                <div><span>{{$like['unit_price']}}</span>元/m²月</div>
                            </div>
                            <!-- 楼盘详情 -->
                            <div class="introduce">{{$like['describe']}}</div>
                            <!-- 地址 -->
                            <div class="location"><img src="/we_img/house_detail_address.png" alt="">{{$like['address']}}</div>
                            <!-- 优势 -->
                            <div class="landmark">
                                @if(!empty($like['feature'][0]))
                                <div>{{$like['feature'][0]}}</div>
                                @endif
                                @if(!empty($like['feature'][1]))
                                <div>{{$like['feature'][1]}}</div>
                                @endif
                                @if(!empty($like['feature'][2]))
                                <div>{{$like['feature'][2]}}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="/js/home_building_detail.js"></script>
@endsection
<!DOCTYPE html>
