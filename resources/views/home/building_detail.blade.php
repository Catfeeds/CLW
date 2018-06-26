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
    <div>
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
                            <div class="introTitle">现代光谷世贸中心</div> 
                            <div class="introBuild">
                                <div>60</div>
                                <div>在租房源/套</div>
                            </div>
                            <div class="introBuild">
                                <div>80-710</div>
                                <div>可租面积/平米</div>
                            </div>
                            <div class="introRental">
                                <div>55-90</div>
                                <div>月度租金/元每平方米</div>
                            </div>
                        </div>
                        <div class="introAddress">
                            <div><img src="/we_img/house_detail_address.png"> 地址：武汉市东湖开发区光谷大道70号</div>
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
                        <div class="listNav h1">
                            <div>共<span> 42 </span>套</div>
                            <div>面积</div>
                            <div>单价</div>
                            <div>总价</div>
                            <div class="special">特色</div>
                        </div>
                        <div class="listDetail">
                            <div class="listPic"><img src="/we_img/house_detail_banner01.jpg"></div>
                            <div class="listPic listNum"><span>560</span>m²</div>
                            <div class="listPic listNum"><span>80</span>元/m²月</div>
                            <div class="listPic listNum"><span>44800</span>元/月</div>
                            <div class="listSpecial listNum">
                                <span>精装修</span>
                                <span>免租期</span>
                                <span>押一付一</span>
                            </div>
                        </div>
                        <div class="listDetail">
                            <div class="listPic"><img src="/we_img/house_detail_banner01.jpg"></div>
                            <div class="listPic listNum"><span>560</span>m²</div>
                            <div class="listPic listNum"><span>80</span>元/m²月</div>
                            <div class="listPic listNum"><span>44800</span>元/月</div>
                            <div class="listSpecial listNum">
                                <span>精装修</span>
                                <span>免租期</span>
                                <span>押一付一</span>
                            </div>
                        </div>
                        <div class="listDetail">
                            <div class="listPic"><img src="/we_img/house_detail_banner01.jpg"></div>
                            <div class="listPic listNum"><span>560</span>m²</div>
                            <div class="listPic listNum"><span>80</span>元/m²月</div>
                            <div class="listPic listNum"><span>44800</span>元/月</div>
                            <div class="listSpecial listNum">
                                <span>精装修</span>
                                <span>免租期</span>
                                <span>押一付一</span>
                            </div>
                        </div>
                    </div>
                    <!-- 查看所有 -->
                    <div class="all">查看所有出租房源</div>
                    <!-- 楼盘信息 -->
                    <div class="buildInfor" id="buildInfor">
                        <div class="h1">楼盘信息</div>
                        <div class="buildRow">
                            <div><span class="developer">开发商</span><span>湖北现代同创置业有限公司</span></div>
                            <div><span class="developer">建筑年代</span><span>2011</span></div>
                        </div>
                        <div class="buildRow">
                            <div><span class="developer">总建筑面积</span><span>700000m²</span></div>
                            <div><span class="developer">楼栋数量</span><span>12栋</span></div>
                        </div>
                        <div class="buildRow">
                            <div><span class="developer">车位数量</span><span>1200个</span></div>
                            <div><span class="developer">停车费</span><span>120元/月</span></div>
                        </div>
                        <div class="buildRow">
                            <div><span class="developer">绿化率</span><span>10%</span></div>
                        </div>
                        <div class="buildDetail">美文网汇集以爱情,亲情,友情,人生为主题的伤感情感美文网站,内含经典美文,哲理美文,伤感励志等美文欣赏,提供短篇故事,心情随笔日记,优美散文精选,现代诗歌大全</div>
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
                    <look-for-house></look-for-house>
                </div>
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