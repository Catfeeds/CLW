@extends('home.layouts.layout')
@section('title', '楚楼网首页')
@section('header')
<link rel="stylesheet" href="/css/home_index.css">
@endsection
@section('body')
<header class="index-header-box">
  <div class="banner-content-box">
    <div class="banner-search-box">
      <form class="form-box">
        <div class="input-box">
          <input type="text" placeholder="输入搜索关键词">
        </div>
        <button type="submit"><img src="/home_img/index_search_btn.png" alt=""></button>
        <div class="clearfloat"></div>
      </form>
      <div class="condition-box">
        <h5>
          区域
        </h5>
        <ul class="select-area-list">
          <li class="select-area-item">
            <a href="javascript:void(0)">全部</a>
          </li>
          <li class="select-area-item">
            <a href="javascript:void(0)">武昌</a>
          </li>
          <li class="select-area-item">
            <a href="javascript:void(0)">洪山</a>
          </li>
          <li class="select-area-item">
            <a href="javascript:void(0)">江夏</a>
          </li>
          <li class="select-area-item">
            <a href="javascript:void(0)">江岸</a>
          </li>
          <li class="select-area-item">
            <a href="javascript:void(0)">江汉</a>
          </li>
          <li class="select-area-item">
            <a href="javascript:void(0)">黄陂</a>
          </li>
          <li class="select-area-item">
            <a href="javascript:void(0)">硚口</a>
          </li>
          <li class="select-area-item">
            <a href="javascript:void(0)">汉阳</a>
          </li>
          <li class="select-area-item">
            <a href="javascript:void(0)">汉南</a>
          </li>
          <li class="select-area-item">
            <a href="javascript:void(0)">青山</a>
          </li>
          <li class="select-area-item">
            <a href="javascript:void(0)">更多>></a>
          </li>
          <li class="clearfloat"></li>
        </ul>
        <h5>
          面积(㎡)
        </h5>
        <div class="select-click-list">
          <a class="select-click-item" title="0～100㎡" href="javascript:void(0)"></a>
          <a class="select-click-item" title="100～300㎡" href="javascript:void(0)"></a>
          <a class="select-click-item" title="300～500㎡" href="javascript:void(0)"></a>
          <a class="select-click-item" title="500～1000㎡" href="javascript:void(0)"></a>
          <a class="select-click-item" title="1000㎡以上" href="javascript:void(0)"></a>
          <div class="clearfloat"></div>
        </div>
        <div class="select-characterization-list">
          <span>0</span>
          <span>100</span>
          <span>300</span>
          <span>500</span>
          <span>1000</span>
          <span>∞</span>
          <div class="clearfloat"></div>
        </div>
        <h5>
          价格(元/㎡·月)
        </h5>
        <div class="select-click-list special-style">
          <a class="select-click-item" title="0～40元/㎡·月" href="javascript:void(0)"></a>
          <a class="select-click-item" title="40～60元/㎡·月" href="javascript:void(0)"></a>
          <a class="select-click-item" title="60～80元/㎡·月" href="javascript:void(0)"></a>
          <a class="select-click-item" title="80～120元/㎡·月" href="javascript:void(0)"></a>
          <a class="select-click-item" title="120～140元/㎡·月" href="javascript:void(0)"></a>
          <a class="select-click-item" title="140元/㎡·月以上" href="javascript:void(0)"></a>
          <div class="clearfloat"></div>
        </div>
        <div class="select-characterization-list special-style">
          <span>0</span>
          <span style="left:3px;">40</span>
          <span style="left:5px;">60</span>
          <span style="left:8px;">80</span>
          <span style="left:11px;">120</span>
          <span style="left:9px;">140</span>
          <span style="left:5px;">∞</span>
          <div class="clearfloat"></div>
        </div>
      </div>
    </div>
    <div class="banner-commercial-box">
      <img src="/home_img/index_banner_commercial_text.png" alt="">
      <a class="velocity-factor" href="javascript:void(0)">
        立即委托
      </a>
    </div>
    <div class="clearfloat"></div>
  </div>
  <div class="banner-box">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div style="background-image: url('/home_img/temp_index_banner.jpg');" class="banner-img"></div>
        </div>
        <div class="swiper-slide">
          <div style="background-image: url('/home_img/temp_index_banner2.jpg');" class="banner-img"></div>
        </div>
        <div class="swiper-slide">
          <div style="background-image: url('/home_img/temp_index_banner3.jpg');" class="banner-img"></div>
        </div>
        <div class="swiper-slide">
            <div style="background-image: url('/home_img/temp_index_banner.jpg');" class="banner-img"></div>
          </div>
          <div class="swiper-slide">
            <div style="background-image: url('/home_img/temp_index_banner2.jpg');" class="banner-img"></div>
          </div>
          <div class="swiper-slide">
            <div style="background-image: url('/home_img/temp_index_banner3.jpg');" class="banner-img"></div>
          </div>
      </div>
    </div>
  </div>
  <div class="banner-footer-box">
    <div class="banner-png-list">
      <div class="banner-png-item">
        <div class="img-box">
          <img src="/home_img/index_banner_png1.png" alt="">
        </div>
        <div class="banner-png-text">100%真实房源</div>
      </div>
      <div class="banner-png-item">
        <div class="img-box">
          <img src="/home_img/index_banner_png2.png" alt="">
        </div>
        <div class="banner-png-text">细化筛选</div>
      </div>
      <div class="banner-png-item">
        <div class="img-box">
          <img src="/home_img/index_banner_png3.png" alt="">
        </div>
        <div class="banner-png-text">贵宾服务</div>
      </div>
      <div class="banner-png-item">
        <div class="img-box">
          <img src="/home_img/index_banner_png4.png" alt="">
        </div>
        <div class="banner-png-text">增值服务</div>
      </div>
      <div class="clearfloat"></div>
    </div>
  </div>
</header>
<div class="topic-box">
  <h2 class="topic-title">企业服务</h2>
  <div class="elaborate-title">让办公更舒心</div>
  <div class="topic-content">
    <ul class="sever-list">
      <li class="sever-item">
        <a href="javascript:void(0)">
          <img src="/home_img/index_topic1_plant.jpg" alt="绿植服务">
          <div class="bg-box"></div>
          <div class="text-box">经验认真 &nbsp;&nbsp;&nbsp; 认真负责</div>
          <div class="server-title">绿洲租摆</div>
        </a>
      </li>
      <li class="sever-item">
        <a href="javascript:void(0)">
          <img src="/home_img/index_topic1_clear.jpg" alt="绿植服务">
          <div class="bg-box"></div>
          <div class="text-box">经验认真 &nbsp;&nbsp;&nbsp; 认真负责</div>
          <div class="server-title">保洁服务</div>
        </a>
      </li>
      <li class="sever-item">
        <a href="javascript:void(0)">
          <img src="/home_img/index_topic1_jiaju.jpg" alt="绿植服务">
          <div class="bg-box"></div>
          <div class="text-box">经验认真 &nbsp;&nbsp;&nbsp; 认真负责</div>
          <div class="server-title">办公家具</div>
        </a>
      </li>
      <li class="sever-item">
        <a href="javascript:void(0)">
          <img src="/home_img/index_topic1_gongshang.jpg" alt="绿植服务">
          <div class="bg-box"></div>
          <div class="text-box">经验认真 &nbsp;&nbsp;&nbsp; 认真负责</div>
          <div class="server-title">工商代办</div>
        </a>
      </li>
      <li class="sever-item">
        <a href="javascript:void(0)">
          <img src="/home_img/index_topic1_moveHome.jpg" alt="绿植服务">
          <div class="bg-box"></div>
          <div class="text-box">经验认真 &nbsp;&nbsp;&nbsp; 认真负责</div>
          <div class="server-title">搬家服务</div>
        </a>
      </li>
      <li class="clearfloat"></li>
    </ul>
  </div>
</div>
<div class="topic-box">
    <h2 class="topic-title">核心商圈</h2>
    <div class="elaborate-title">享优质配套 与大咖公司为邻</div>
</div>
<div class="topic-box">
  <h2 class="topic-title">精选专题</h2>
  <div class="elaborate-title">优质写字楼 聚你所需</div>
</div>
<div class="topic-box">
  <h2 class="topic-title">精品写字楼</h2>
  <div class="elaborate-title">配套成熟，量身定制</div>
</div>
<div class="topic-box">
  <h2 class="topic-title">推荐服务</h2>
  <div class="elaborate-title">让办公更舒心</div>
</div>
<div class="topic-box">
  <h2 class="topic-title">资讯中心</h2>
  <div class="elaborate-title">了解行业动态，把握市场命脉</div>
</div>
@endsection
@section('script')
<script src="/js/home_index.js"></script>
@endsection