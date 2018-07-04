@extends('home.layouts.layout')
@section('title', '房源详情')
@section('header')
<link rel="stylesheet" href="/css/home_house_detail.css">
@endsection
@section('body')
<div class="content">
    <!-- 导航条 -->
    <div class="nav">
        <span>首页</span><span>>洪山区</span><span>>光谷</span><span>>现代世贸中心</span>
    </div>
    <!-- 轮播 --> 
    <div class="banner">
        <div class="swiper">
            <div class="swiper-container" id="bigImg">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/we_img/house_detail_banner01.jpg"></div>
                    <div class="swiper-slide"><img src="/we_img/house_detail_banner02.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/we_img/house_detail_banner03.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/we_img/house_detail_banner04.jpg" alt=""></div>
                </div>
            </div>
            <div class="littelSwiper">
                <div class="swiperPic" id="prev"><img src="/home_img/house_detail_left.jpg"></div>
                <div class="swiper-container" id="smallImg">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide stop-swiping"><img src="/we_img/house_detail_banner01.jpg" alt=""></div>
                        <div class="swiper-slide stop-swiping"><img src="/we_img/house_detail_banner02.jpg" alt=""></div>
                        <div class="swiper-slide stop-swiping"><img src="/we_img/house_detail_banner03.jpg" alt=""></div>
                        <div class="swiper-slide stop-swiping"><img src="/we_img/house_detail_banner04.jpg" alt=""></div>
                        <div class="swiper-slide stop-swiping"><img src="/we_img/house_detail_banner04.jpg" alt=""></div>
                        <div class="swiper-slide stop-swiping"><img src="/we_img/house_detail_banner01.jpg" alt=""></div>
                    </div>
                </div>
                <div class="swiperPic" id="next"><img src="/home_img/house_detail_right.jpg"></div>
            </div>
        </div>
        <div class="infor">
            <!-- 标题 -->
            <div class="title">武昌中北路商圈【汉街万达环球国际中心】写字楼出租-精装修-70m²</div>
            <!-- 价格 -->
            <div class="price">
                <div>
                    <span>5800</span>元/月（单价：82.8元/m²月）
                </div>
                <div class="pircePic"><img src="/home_img/house_detail_collect_before.png"></div>
            </div>
            <!-- 面积 -->
            <div class="acreage">
                <div><span>建筑面积</span>70平方</div>
                <div><span>可容纳工位数</span>9-17工位</div>
                <div><span>装修程度</span>豪华装修</div>
                <div class="address">
                    <div><span>楼盘地址</span>武汉市东湖开发区光谷大道70号</div>
                    <a href="#"><img src="/home_img/house_detail_map.png"> 查看地图</a>
                </div>
                <div class="better">
                    <div class="better1">押一付一</div>
                    <div class="better2">免租期长</div>
                    <div class="better3">豪华装修</div>
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
                    <img src="/we_img/house_detail_banner03.jpg">
                    <div class="name">
                        <div class="nameDet">林亚男</div>
                        <div>光谷楼盘经纪</div>
                    </div>
                </div>
                <!-- <div class="consult">
                    <div><img src=""> 在线咨询</div>
                </div> -->
            </div>
            <div class="button"><img src="/home_img/house_detail_free.png"></div>
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
                                    <span class="houseBox">支付方式</span><span>押一付一</span>
                                </div>
                                <div>
                                    <span class="houseBox">所在楼层</span><span>位于高层</span>
                                </div>
                                <div>
                                    <span class="houseBox">入住时间</span><span>2018-03-10</span>
                                </div>
                                <div>
                                    <span class="houseBox">注册公司</span><span>可以</span>
                                </div>
                                <div>
                                    <span class="houseBox">最短租期</span><span>2个月</span>
                                </div>
                            </div>
                            <div class="houseType">
                                <div>
                                    <span class="houseBox1">装修</span><span>精装修</span>
                                </div>
                                <div>
                                    <span class="houseBox1">类型</span><span>商住两用</span>
                                </div>
                                <div>
                                    <span class="houseBox1">户型</span><span>5室1厅，可定制</span>
                                </div>
                                <div>
                                    <span class="houseBox1">朝向</span><span>东</span>
                                </div>
                            </div>
                        </div>
                        <!-- 楼座信息 -->
                        <div class="house">
                            <div class="houseTitle">栋座信息</div>
                            <div class="housePay">
                                <div>
                                    <span class="houseBox">等级</span><span>押一付一</span>
                                </div>
                                <div>
                                    <span class="houseBox">物业公司</span><span>位于高层</span>
                                </div>
                                <div>
                                    <span class="houseBox">房屋结构</span><span>2018-03-10</span>
                                </div>
                                <div>
                                    <span class="houseBox">物业费</span><span>可以</span>
                                </div>
                            </div>
                            <div class="housePay">
                                <div>
                                    <span class="houseBox">采暖方式</span><span>精装修</span>
                                </div>
                                <div>
                                    <span class="houseBox">电梯数量</span><span>商住两用</span>
                                </div>
                                <div>
                                    <span class="houseBox">总楼层</span><span>5室1厅，可定制</span>
                                </div>
                                <div>
                                    <span class="houseBox">空调类型</span><span>东</span>
                                </div>
                            </div>
                        </div>
                        <div class="build"></div>
                    </div>
                    <div class='server'>
                        <div class="head">企业服务</div>
                        <div class="serverPic">
                            <a href="javascript:void(0)"><img src="/home_img/house_detail_plant.png"></a>
                            <a href="javascript:void(0)"><img src="/home_img/house_detail_finance.png"></a>
                            <a href="javascript:void(0)"><img src="/home_img/house_detail_computer.png"></a>
                            <a href="javascript:void(0)"><img src="/home_img/house_detail_furniture.png"></a>
                            <a href="javascript:void(0)"><img src="/home_img/house_detail_car.png"></a>
                            <a href="javascript:void(0)"><img src="/home_img/house_detail_move.png"></a>
                        </div>
                    </div>
                </div>
                <!-- 免费委托找房 -->
                <div class="findHouse">
                    <img src="/home_img/house_detail_find_house.jpg">
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
                </div>
            </div>
        </div>
        <!-- 猜你喜欢 -->
        <div class="enjoy" id="enjoy">
            <div class="enjoyBox">
                <div class="head">猜你喜欢</div>
                <div class="enjoyList">
                    <div class="enjoyDetail">
                        <div class="enjoyPic"><img src="/home_img/temp_index_banner.jpg" alt=""></div>
                        <div class='enjoyInfor'>
                            <div class="enjoyTitle">光谷新世界</div>
                            <div class="enjoyIntro">
                                <div class="enjoyAddress"><img src="/home_img/house_detail_map1.png"> 江夏区-东湖高新</div>
                                <div class="enjoyPrice"><span>90</span> 元/m²月</div>
                            </div>
                        </div>
                    </div>
                    <div class="enjoyDetail">
                        <div class="enjoyPic"><img src="/home_img/temp_index_banner.jpg" alt=""></div>
                        <div class='enjoyInfor'>
                            <div class="enjoyTitle">光谷新世界</div>
                            <div class="enjoyIntro">
                                <div class="enjoyAddress"><img src="/home_img/house_detail_map1.png"> 江夏区-东湖高新</div>
                                <div class="enjoyPrice"><span>90</span> 元/m²月</div>
                            </div>
                        </div>
                    </div>
                    <div class="enjoyDetail">
                        <div class="enjoyPic"><img src="/home_img/temp_index_banner.jpg" alt=""></div>
                        <div class='enjoyInfor'>
                            <div class="enjoyTitle">光谷新世界</div>
                            <div class="enjoyIntro">
                                <div class="enjoyAddress"><img src="/home_img/house_detail_map1.png"> 江夏区-东湖高新</div>
                                <div class="enjoyPrice"><span>90</span> 元/m²月</div>
                            </div>
                        </div>
                    </div>
                    <div class="enjoyDetail">
                        <div class="enjoyPic"><img src="/home_img/temp_index_banner.jpg" alt=""></div>
                        <div class='enjoyInfor'>
                            <div class="enjoyTitle">光谷新世界</div>
                            <div class="enjoyIntro">
                                <div class="enjoyAddress"><img src="/home_img/house_detail_map1.png"> 江夏区-东湖高新</div>
                                <div class="enjoyPrice"><span>90</span> 元/m²月</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="/js/home_house_detail.js"></script>
@endsection
