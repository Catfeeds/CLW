<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/home_building_detail.css">
</head>
<body>
    <div class="container">
        <!--  -->

        <div class="nav"><span>首页</span><span>>洪山区</span><span>>光谷</span><span>>现代世贸中心</span></div>
        <!-- 轮播 -->
        <div class="swiper-container" id="banner">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="/we_img/banner1.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/we_img/banner2.jpg" alt=""></div>
                <!-- <div class="swiper-slide"><img src="/we_img/banner1.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/we_img/banner2.jpg" alt=""></div> -->
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
                                <div>{{$building->house_count}}</div>
                                <div>在租房源/套</div>
                            </div>
                            <div class="introBuild">
                                <div>{{$building->constru_acreage}}</div>
                                <div>可租面积/平米</div>
                            </div>
                            <div class="introRental">
                                <div>{{$building->unit_price}}</div>
                                <div>月度租金/元每平方米</div>
                            </div>
                        </div>
                        <div class="introAddress">
                            <div><img src="/we_img/house_detail_address.png"> 地址：{{$building->address}}</div>
                            <a href="#"><div><img src="">查看地图</div></a>
                        </div>
                        <div class="introBetter">
                            <div><img src="/we_img/house_detail_car.png"></div>
                            <div><img src="/we_img/house_detail_building.png"></div>
                            <div><img src="/we_img/house_detail_pioneer.png"></div>
                            <div><img src="/we_img/house_detail_register.png"></div>
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
                            <div>共<span>  </span>套</div>
                            <div>面积</div>
                            <div>单价</div>
                            <div>总价</div>
                            <div class="special">特色</div>
                        </div>
                        <div class="listBox">
                        @foreach($houses as $house)
                        <a href="#">
                        <div class="listDetail">
                            <div class="listPic"><img src="/we_img/house_detail_banner01.jpg"></div>
                            <div class="listCenter">
                                <div class="listTitle">{{$house->title}}</div>
                                <div class="unitPrice">
                                    <div>单价：{{$house->unit_price_cn}}</div>
                                    <div>面积：{{$house->constru_acreage_cn}}</div>
                                    <div>地址：</div>
                                </div>
                                <div class="listSpecial">
                                    <div>精装修</div>
                                    <div>免租期</div>
                                    <div>押一付一</div>
                                </div>
                            </div>
                            <div class="totalPrice"><span>{{$house->total_price}}</span>元/月</div>
                        </div>
                        </a>
                        @endforeach
                        </div>
                    </div>
                    <!-- 查看所有 -->
                    <div class="all">查看所有出租房源</div>
                    <!-- 楼盘信息 -->
                    <div class="buildInfor" id="buildInfor">
                        <div class="h1">楼盘信息</div>
                        <div class="buildRow">
                            <div><span class="developer">开发商</span><span>{{$building->developer}}</span></div>
                            <div><span class="developer">建筑年代</span><span>{{$building->years}}</span></div>
                        </div>
                        <div class="buildRow">
                            <div><span class="developer">总建筑面积</span><span>{{$building->acreage}}</span></div>
                            <div><span class="developer">楼栋数量</span><span>12栋</span></div>
                        </div>
                        <div class="buildRow">
                            <div><span class="developer">车位数量</span><span>{{$building->parking_num}}</span></div>
                            <div><span class="developer">停车费</span><span>{{$building->parking_fee}}</span></div>
                        </div>
                        <div class="buildRow">
                            <div><span class="developer">绿化率</span><span>{{$building->greening_rate}}</span></div>
                        </div>
                        <div class="buildDetail">{{$building->describe}}</div>
                    </div>
                    <!-- 市场行情 -->
                    <div class="quotation" id="quotation">
                        <div class="h1">市场行情</div>
                        <div class="average">
                            <div class="buildPrice"><div>现代光谷世贸中心均价（楼盘）</div><div>75.43元/m²月</div></div>
                            <div class="buildPrice"><div>光谷均价（商圈）</div><div>75.43元/m²月</div></div>
                            <div class="buildPrice"><div>洪山均价（区域）</div><div>75.43元/m²月</div></div>
                        </div>
                    </div>
                </div>
                <!-- 右边 -->
                <div class="right">
                    <!-- 经纪 -->
                    <div class="agent">
                        <img src="/we_img/house_detail_banner03.jpg">
                        <div class="name"><div>林亚楠</div><div>光谷楼盘经纪</div></div>
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
                <better-list></better-list>
            </div>
        </div>
    </div>
</body>
<script src="/js/home_manifest.js"></script>
<script src="/js/home_vendor.js"></script>
<script src="/js/home_building_detail.js"></script>
</html>