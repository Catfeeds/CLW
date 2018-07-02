<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/home_house_detail.css">
</head>
<body>
<div class="container">
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
            <div class="swiper-container" id="smallImg">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/we_img/house_detail_banner01.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/we_img/house_detail_banner02.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/we_img/house_detail_banner03.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/we_img/house_detail_banner04.jpg" alt=""></div>
                </div>
            </div>
        </div>
        <div class="infor">
            <!-- 标题 -->
            <div class="title">武昌中北路商圈【汉街万达环球国际中心】写字楼出租-精装修-70m²</div>
            <!-- 价格 -->
            <div class="price">
                <span>5800</span>元/月（单价：82.8元/m²月）
            </div>
            <!-- 面积 -->
            <div class="acreage"><span>建筑面积：70平方</span><span>可容纳工位数：9-17工位</span><span>装修程度：豪华装修</span></div>
            <!-- 地址 -->
            <div class="address">
                <div>
                    <img src="/we_img/house_detail_address.png">
                    <span>地址：武汉市东湖开发区光谷大道70号</span>
                </div>
                <a href="#"><img src="/we_img/dingwei.png"> 查看地图</a>
            </div>
            <!-- 优势 -->
            <div class="better">
                <div>免租期长</div>
                <div>押一付一</div>
                <div>豪华装修</div>
            </div>
            <!-- 电话咨询 -->
            <div class="tel">
             <img src="/we_img/house_detail_banner03.jpg">
             <div class="name"><div>林亚男</div><div>光谷楼盘经纪</div></div>
             <div class="consult"><div>免费咨询</div><div class="number">400-580-8888转2347</div></div>
             <div class="button">在线客服</div>
            </div>
        </div>
    </div>
    <!-- 房源信息 -->
    <div class="houseInfor">
        <div class="left">
            <!-- 房源详情 -->
            <div class="house">
                <div class="head">房源详情</div>
                <div class="first">
                    <div>支付方式：<span>押一付一</span></div>
                    <div>户型：<span>5室1厅，可定制</span></div>
                    <div>装修：<span>精装修</span></div>
                </div>
                <div class="first">
                    <div>所在楼层：<span>押一付一</span></div>
                    <div>朝向<span>5室1厅，可定制</span></div>
                    <div>类型：<span>精装修</span></div>
                </div>
                <div class="first">
                    <div>入住时间：<span>押一付一</span></div>
                    <div>最短租期：<span>5室1厅，可定制</span></div>
                    <div>注册公司：<span>精装修</span></div>
                </div>
            </div>
            <!-- 楼座详情 -->
            <div class="house" style="margin-top: 25px;">
                <div class="head">楼座信息</div>
                <div class="first">
                    <div>等级：<span>甲等</span></div>
                    <div>房屋结构：<span>5室1厅，可定制</span></div>
                    <div>总楼层：<span>精装修</span></div>
                </div>
                <div class="first">
                    <div class="property">物业公司：<span>押一付一</span></div>
                    <div class="property">物业费：<span>精装修</span></div>
                </div>
                <div class="first">
                    <div>采暖方式：<span>押一付一</span></div>
                    <div>空调类型：<span>5室1厅，可定制</span></div>
                    <div>电梯数量：<span>精装修</span></div>
                </div>
            </div>
        </div>
        <!-- 免费委托找房 -->
        <div class="findHouse">
            <img src="" alt="">
            <div class="entrust">
                <input type="text" placeholder="请输入手机号" id="entrust">
                <div class="order">立即委托</div>
            </div>
        </div>
    </div>
    <!-- 周边配套 -->
    <div class="facilities">
        <div class="around">周边配套</div>
        <div class="map"></div>
    </div>
    <!-- 猜你喜欢 -->
    <div class="enjoy" id="enjoy">
        <div class="enjoyNav">猜你喜欢</div>
        <better-list></better-list>
    </div>
</div>
</body>
<script src="/js/home_manifest.js"></script>
<script src="/js/home_vendor.js"></script>
<script src="/js/home_house_detail.js"></script>
</html>