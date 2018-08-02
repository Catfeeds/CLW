@extends('home.layouts.layout')
@section('title', '楚楼网首页')
@section('header')
<link rel="stylesheet" href="{{homeRes('/css/home_index.css')}}">
@endsection
@section('body')
@include('home.nav' , ['fixed' => 1])
@include('home.right_tab', ['fixed' => 1])
<header class="index-header-box js_headerHeight">
  <div class="banner-content-box">
    <div class="banner-search-box">
    <form class="form-box" action="{{url('/building_list')}}">
        <div class="input-box">
          <input name='keyword' id="searchInput" type="text" placeholder="输入搜索关键词">
        </div>
      <button type="submit"><img src="{{homeRes('/home_img/index_search_btn.png')}}" alt=""></button>
        <div class="clearfloat"></div>
      </form>
      <div class="condition-box">
        <h5>
          区域
        </h5>
        <ul class="select-area-list">
          <li class="select-area-item">
            <a href="{{url('/building_list')}}">全部</a>
          </li>
         @foreach ($area as $area_item)
            @if(!in_array($area_item->name, ['东西湖区', '新洲区', '蔡甸区']))
              <li class="select-area-item">
              <a href="{{url('/building_list?area_id='.$area_item->id)}}">{{ mb_substr($area_item->name, 0, mb_strlen($area_item->name)-1)}}</a>
              </li>
            @endif
         @endforeach
          <li class="select-area-item">
            <a href="{{url('/building_list')}}">更多>></a>
          </li>
          <li class="clearfloat"></li>
        </ul>
        <h5>
          面积(㎡)
        </h5>
        <div class="select-click-list">
        <a class="select-click-item" title="0～100㎡" href="{{url('/building_list?acreage=0-100')}}"></a>
        <a class="select-click-item" title="100～300㎡" href="{{url('/building_list?acreage=100-300')}}"></a>
          <a class="select-click-item" title="300～500㎡" href="{{url('/building_list?acreage=300-500')}}"></a>
          <a class="select-click-item" title="500～1000㎡" href="{{url('/building_list?acreage=500-1000')}}"></a>
          <a class="select-click-item" title="1000㎡以上" href="{{url('/building_list?acreage=1000-10000')}}"></a>
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
          <a class="select-click-item" title="0～40元/㎡·月" href="{{url('/building_list?unit_price=0-40')}}"></a>
          <a class="select-click-item" title="40～60元/㎡·月" href="{{url('/building_list?unit_price=40-60')}}"></a>
          <a class="select-click-item" title="60～80元/㎡·月" href="{{url('/building_list?unit_price=60-80')}}"></a>
          <a class="select-click-item" title="80～120元/㎡·月" href="{{url('/building_list?unit_price=80-120')}}"></a>
          <a class="select-click-item" title="120～140元/㎡·月" href="{{url('/building_list?unit_price=120-140')}}"></a>
          <a class="select-click-item" title="140元/㎡·月以上" href="{{url('/building_list?unit_price=140-1000')}}"></a>
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
    <img src="{{homeRes('/home_img/index_banner_commercial_text.png')}}" alt="">
      <a class="velocity-factor" href="{{url('/bespeaks').'?sourcePage=1'}}">
        立即委托
      </a>
    </div>
    <div class="clearfloat"></div>
  </div>
  <div class="banner-box">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
        <div style="background-image: url('https://cdn.chulouwang.com/CLWTest/home/home_img/index_banner.jpg');" class="banner-img"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="banner-footer-box">
    <div class="banner-png-list">
      <div class="banner-png-item">
        <div class="img-box">
        <img src="{{homeRes('/home_img/index_banner_png1.png')}}" alt="">
        </div>
        <div class="banner-png-text">100%真实房源</div>
      </div>
      <div class="banner-png-item">
        <div class="img-box">
          <img src="{{homeRes('/home_img/index_banner_png2.png')}}" alt="">
        </div>
        <div class="banner-png-text">细化筛选</div>
      </div>
      <div class="banner-png-item">
        <div class="img-box">
          <img src="{{homeRes('/home_img/index_banner_png3.png')}}" alt="">
        </div>
        <div class="banner-png-text">贵宾服务</div>
      </div>
      <div class="banner-png-item">
        <div class="img-box">
          <img src="{{homeRes('/home_img/index_banner_png4.png')}}" alt="">
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
      @foreach($service as $service_item)
      <li class="sever-item">
        <a href="{{$service_item->url}}" target="_blank">
        <img src="{{$service_item->pc_img_cn}}" alt="{{$service_item->master_title}}">
          <div class="bg-box"></div>
          <div class="text-box">{{$service_item->vice_title}}</div>
          <div class="server-title">{{$service_item->master_title}}</div>
          <div class="server-title-active">{{$service_item->master_title}}</div>
        </a>
      </li>
      @endforeach
      <li class="clearfloat"></li>
    </ul>
  </div>
  <a href="http://shop.chulouwang.com/" target="_blank" class="more-info">查看更多</a>
</div>
<div class="topic-box">
    <h2 class="topic-title">核心商圈</h2>
    <div class="elaborate-title">享优质配套 与大咖公司为邻</div>
    <div class="topic-content">
      <ul class="commercial-center-list">
        @foreach ( $coreBlock as $coreBlock_item )
          <li class="commercial-center-item">
            <a href="{{url('/building_list?area_id='.$coreBlock_item->area_id.'&block_id='.$coreBlock_item->block_id)}}">
              <img src="{{$coreBlock_item->pc_img_cn}}">
            </a>
          </li>
        @endforeach
      </ul>
    </div>
    <a href="{{url('/building_list')}}" class="more-info">查看更多</a>
</div>
<div class="topic-box">
  <h2 class="topic-title">精选专题</h2>
  <div class="elaborate-title">优质写字楼 聚你所需</div>
  <div class="topic-content">
    <ul class="careful-select-list">
      @foreach ( $pcRecommends as $recommends_item )
        <li class="careful-select-item">
        <a href="{{url('/pc_recommends/'.$recommends_item->id)}}" title="{{$recommends_item->title}}">
            <img src="{{$recommends_item->pic_cn}}" alt="{{$recommends_item->title}}">
          </a>
        </li>
      @endforeach
    </ul>
  </div>
<a href="{{url('/building_list')}}" class="more-info">查看更多</a>
</div>
<div class="topic-box">
  <h2 class="topic-title">精品写字楼</h2>
  <div class="elaborate-title">配套成熟，量身定制</div>
  <div class="topic-content">
    <ul class="fine-quality-list">
      @foreach ( $eliteBuilding as $eliteBuilding_item )
        <li class="fine-quality-item">
          <a href="{{url('/buildings').'/'.$eliteBuilding_item->id}}">
            <div class="img-box">
              <img class="min-img" src="{{homeRes('/home_img/perfect_sel.png')}}" alt="" class="first_select">
              <img class="main-img" src="{{$eliteBuilding_item->img_cn}}" alt="{{$eliteBuilding_item->name}}">
            </div>
            <div class="text-box">
              <h3>{{$eliteBuilding_item->name}}</h3>
              <div class="orther-info">
                <span class="position-box"><img src="/home_img/index_position.png" alt="">{{$eliteBuilding_item->address_cn}}</span>
                <span class="price-box">
                  <b class="num-box">{{explode('元', $eliteBuilding_item->avg_price)[0]}}</b>
                  元/㎡·月
                </span>
                <div class="clearfloat"></div>
              </div>
            </div>
          </a>
        </li>
      @endforeach
      <li class="clearfloat"></li>
    </ul>
  </div>
  <a href="{{url('/building_list')}}" class="more-info">查看更多</a>
</div>
<div class="topic-box">
  <h2 class="topic-title">推荐服务</h2>
  <div class="elaborate-title">让办公更舒心</div>
  <div class="topic-content">
    <ul class="cite-server-list">
      @foreach( $recommendService as $reService_item )
        <li class="cite-server-item">
          <a href="{{$reService_item->url}}" target="_blank">
            <img src="{{$reService_item->pic_cn}}" alt="">
          </a>
        </li>
      @endforeach
      <li class="clearfloat"></li>
    </ul>
  </div>
  <a href="http://shop.chulouwang.com/" target="_blank" class="more-info">查看更多</a>
</div>
<div class="topic-box special-style" style="background-image: url('{{homeRes('/home_img/index_factor_bg.jpg')}}')">
  <div class="set-house-box">
    <div class="lookForHouse-box">
    <img src="{{homeRes('/home_img/index_lookForHouse.png')}}" alt="">
      <h3>委托找房</h3>
      <p>专业、可靠、免费优办提供一对一全程找房服务</p>
      <a href="{{url('/bespeaks').'?sourcePage=3'}}">委托找房>></a>
    </div>
    <div class="launchHouse-box">
    <img src="{{homeRes('/home_img/index_launchHouse.png')}}" alt="">
      <h3>投放房源</h3>
      <p>专业、可靠、免费优办提供一对一全程服务</p>
      <a href="{{url('/throw_ins').'?sourcePage=3'}}">投放房源>></a>
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
            <div class="float-left">
              <a href="{{url('/information/'.$hotInformation[$j]->id)}}" title="{{$information[$j]->title}}">
                <img src="{{$information[$j]->banner_cn}}" alt="{{$information[$j]->title}}">
              </a>
            </div>
            <div class="float-right">
              <div class="icon-text"><img src="{{homeRes('/home_img/hangye_logo.png')}}" alt=""><span style="position:relative;left:5px;top:-3px;font-size:12px;">行业新闻</span></div>
              <a href="{{url('/information/'.$hotInformation[$j]->id)}}" title="{{$information[$j]->title}}">
                <h3>{{$information[$j]->title}}</h3>
              </a>
              <div class="time-box">{{$information[$j]->created_at}}</div>
              <p>
                {{$information[$j]->brief}}
              </p>
            </div>
            <div class="clearfloat"></div>
          </li>
        @endfor
      </ul>
    </div>
    <div class="infamation-right">
      <div class="img">
        <a href="{{url('/about/we')}}">
          <img src="{{homeRes('/home_img/infomation_right.jpg')}}" alt="">
        </a>
      </div>
      <div class="line-box">
        <h3>热点资讯</h3>
        <ul class="hot-infomation-list">
          @for($j = 0; $j < 4; $j++)
            @if(!empty($hotInformation[$j]))
              <li class="hot-infomation-item">
                <a href="{{url('/information/'.$hotInformation[$j]->id)}}" title="{{$hotInformation[$j]->title}}">
                  <h4>{{$hotInformation[$j]->title}}</h4>
                </a>
                <p>
                  {{$hotInformation[$j]->brief}}
                </p>
              </li>
            @endif
          @endfor
        </ul>
      </div>
    </div>
    <div class="clearfloat"></div>
  </div>
  <a href="{{url('/information')}}" target="_blank" class="more-info">查看更多</a>
</div>
@include('home.footer')
@endsection
@section('script')
<script src="{{homeRes('/js/home_index.js')}}"></script>
@endsection