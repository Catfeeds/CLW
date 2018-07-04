@extends('home.layouts.layout')
@section('title', '楚楼网首页')
@section('header')
<link rel="stylesheet" href="/css/home_index.css">
@endsection
@section('body')
@include('home.nav' , ['fixed' => 1])
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
          <div class="server-title-active">绿洲租摆</div>
        </a>
      </li>
      <li class="sever-item">
        <a href="javascript:void(0)">
          <img src="/home_img/index_topic1_clear.jpg" alt="绿植服务">
          <div class="bg-box"></div>
          <div class="text-box">经验认真 &nbsp;&nbsp;&nbsp; 认真负责</div>
          <div class="server-title">保洁服务</div>
          <div class="server-title-active">保洁服务</div>
        </a>
      </li>
      <li class="sever-item">
        <a href="javascript:void(0)">
          <img src="/home_img/index_topic1_jiaju.jpg" alt="绿植服务">
          <div class="bg-box"></div>
          <div class="text-box">经验认真 &nbsp;&nbsp;&nbsp; 认真负责</div>
          <div class="server-title">办公家具</div>
          <div class="server-title-active">办公家具</div>
        </a>
      </li>
      <li class="sever-item">
        <a href="javascript:void(0)">
          <img src="/home_img/index_topic1_gongshang.jpg" alt="绿植服务">
          <div class="bg-box"></div>
          <div class="text-box">经验认真 &nbsp;&nbsp;&nbsp; 认真负责</div>
          <div class="server-title">工商代办</div>
          <div class="server-title-active">工商代办</div>
        </a>
      </li>
      <li class="sever-item">
        <a href="javascript:void(0)">
          <img src="/home_img/index_topic1_moveHome.jpg" alt="绿植服务">
          <div class="bg-box"></div>
          <div class="text-box">经验认真 &nbsp;&nbsp;&nbsp; 认真负责</div>
          <div class="server-title">搬家服务</div>
          <div class="server-title-active">搬家服务</div>
        </a>
      </li>
      <li class="clearfloat"></li>
    </ul>
  </div>
  <a href="javascript:void(0)" class="more-info">查看更多</a>
</div>
<div class="topic-box">
    <h2 class="topic-title">核心商圈</h2>
    <div class="elaborate-title">享优质配套 与大咖公司为邻</div>
    <div class="topic-content">
      <ul class="commercial-center-list">
        <li class="commercial-center-item">
          <a href="javascript:void(0)">
            <img src="home_img/temp_1.jpg" alt="光谷">
          </a>
        </li>
        <li class="commercial-center-item">
          <a href="javascript:void(0)">
            <img src="home_img/temp_2.jpg" alt="关山">
          </a>
        </li>
        <li class="commercial-center-item">
          <a href="javascript:void(0)">
            <img src="home_img/temp_3.jpg" alt="中北路">
          </a>
        </li>
        <li class="commercial-center-item">
          <a href="javascript:void(0)">
            <img src="home_img/temp_4.jpg" alt="洪山广场">
          </a>
        </li>
        <li class="commercial-center-item">
          <a href="javascript:void(0)">
            <img src="home_img/temp_5.jpg" alt="傅家坡">
          </a>
        </li>
      </ul>
    </div>
    <a href="javascript:void(0)" class="more-info">查看更多</a>
</div>
<div class="topic-box">
  <h2 class="topic-title">精选专题</h2>
  <div class="elaborate-title">优质写字楼 聚你所需</div>
  <div class="topic-content">
    <ul class="careful-select-list">
      <li class="careful-select-item">
        <a href="javascript:void(0)">
          <img src="home_img/temps_01.jpg" alt="IT精选">
        </a>
      </li>
      <li class="careful-select-item">
        <a href="javascript:void(0)">
          <img src="home_img/temps_02.jpg" alt="临江地域">
        </a>
      </li>
      <li class="careful-select-item">
        <a href="javascript:void(0)">
          <img src="home_img/temps_03.jpg" alt="高性价">
        </a>
      </li>
      <li class="careful-select-item">
        <a href="javascript:void(0)">
          <img src="home_img/temps_04.jpg" alt="大人流">
        </a>
      </li>
      <li class="careful-select-item">
        <a href="javascript:void(0)">
          <img src="home_img/temps_05.jpg" alt="临江地域">
        </a>
      </li>
    </ul>
  </div>
  <a href="javascript:void(0)" class="more-info">查看更多</a>
</div>
<div class="topic-box">
  <h2 class="topic-title">精品写字楼</h2>
  <div class="elaborate-title">配套成熟，量身定制</div>
  <div class="topic-content">
    <ul class="fine-quality-list">
      @for($i = 0; $i < 10; $i++) 
        <li class="fine-quality-item">
          <a href="javascript:void(0)">
            <div class="img-box">
              <img src="/home_img/templsit_3.png" alt="国际中心">
            </div>
            <div class="text-box">
              <h3>汉街万达环球国际中心</h3>
              <div class="orther-info">
                <span class="position-box"><img src="/home_img/index_position.png" alt="">武昌-中北路</span>
                <span class="price-box">
                  <b class="num-box">90</b>
                  元/㎡·月
                </span>
                <div class="clearfloat"></div>
              </div>
            </div>
          </a>
        </li>
      @endfor
      <li class="clearfloat"></li>
    </ul>
  </div>
  <a href="javascript:void(0)" class="more-info">查看更多</a>
</div>
<div class="topic-box">
  <h2 class="topic-title">推荐服务</h2>
  <div class="elaborate-title">让办公更舒心</div>
  <div class="topic-content">
    <ul class="cite-server-list">
      @for($i = 1; $i < 5; $i++) 
        <li class="cite-server-item">
          <a href="javascript:void(0)">
            <img src="/home_img/tempss_{{$i}}.jpg" alt="">
          </a>
        </li>
      @endfor
      <li class="clearfloat"></li>
    </ul>
  </div>
  <a href="javascript:void(0)" class="more-info">查看更多</a>
</div>
<div class="topic-box special-style" style="background-image: url('/home_img/index_factor_bg.jpg')">
  <div class="set-house-box">
    <div class="lookForHouse-box">
      <img src="/home_img/index_lookForHouse.png" alt="">
      <h3>委托找房</h3>
      <p>专业、可靠、免费优办提供一对一全程找房服务</p>
      <a href="javascript:void(0)">委托找房>></a>
    </div>
    <div class="launchHouse-box">
      <img src="/home_img/index_launchHouse.png" alt="">
      <h3>投放房源</h3>
      <p>专业、可靠、免费优办提供一对一全程服务</p>
      <a href="javascript:void(0)">投放房源>></a>
    </div>
    <div class="clearfloat"></div>
  </div>
</div>
<div class="topic-box">
  <h2 class="topic-title">资讯中心</h2>
  <div class="elaborate-title">了解行业动态，把握市场命脉</div>
  <div class="topic-content">
    <div class="infamation-left">
      <ul class="infamation-list">
        @for($j = 0; $j < 3; $j++) 
          <li class="infamation-item">
            <a href="javascript:void(0)">
              <div class="float-left">
                <img src="/home_img/tempss_1.jpg" alt="">
              </div>
              <div class="float-right">
                <h3>行业资讯|2018年北京写字楼市场将呈现几个关键词索引哈哈哈哈哈</h3>
                <p>
                    @for($i = 0; $i < 4; $i++) 
                      行业资讯北京写字楼市场将呈现几个关引哈哈哈哈哈
                    @endfor
                </p>
                <div class="time-box">2018-08-18 08:18:18</div>
              </div>
              <div class="clearfloat"></div>
            </a>
          </li>
        @endfor
      </ul>
    </div>
    <div class="infamation-right">
      <h3>热点资讯</h3>
      <ul class="hot-infomation-list">
        @for($j = 0; $j < 4; $j++)
          <li class="hot-infomation-item">
            <a href="javascript:void(0)">
              <h4>行业资讯|2018年北京写字楼市场将呈现几个关键词索引哈哈哈哈哈</h4>
              <p>
                @for($i = 0; $i < 4; $i++) 
                  行业资讯北京写字楼市场将呈现几个关引哈哈哈哈哈
                @endfor
              </p>
            </a>
          </li>
        @endfor
      </ul>
    </div>
    <div class="clearfloat"></div>
  </div>
</div>
@endsection
@section('script')
<script src="/js/home_index.js"></script>
@endsection