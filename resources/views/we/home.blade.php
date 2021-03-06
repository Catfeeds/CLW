@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href={{res("/css/we_home.css")}}>
@endsection
@section('body')
    <div class="mui-content">
        <div class="swiper-container" id="swiperBanner">
            <!-- 轮播图 -->
            <div class="swiper-wrapper" id="VueBanner">
                <div class="swiper-slide">
                    <a href="#"><img src="{{res('/we_img/temp_index_1.png')}}" /></a>
                </div>
            </div>
            <!-- 如果需要分页器 -->
            <!-- <div class="swiper-pagination"></div> -->
        </div>

        <div class="main-content">
            <!-- 分类按钮 -->
            <div class="index_buttonList" id='VueServerList'>
                @foreach($services as $items)
                <div class="buttonList">
                    @foreach($items as $item)
                    <div class="buttonItem">
                            <span>
                              <a href="@if($item['name']==='全部'){{url('/servers')}}@else{{url('/servers').'/'.$item['id']}}@endif">
                                <img src="{{$item['icon']}}" />
                                <div>{{$item['name']}}</div>
                              </a>
                            </span>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
            <!-- 滚动广播 -->
            <div class="broadcast-box">
                <div class="img-box"><img src="{{res('/we_img/index_broadcast.svg')}}" alt="小喇叭"></div>
                <div class="swiper-box">
                    <div class="swiper-container" id="swiperBroadcast">
                        <div class="swiper-wrapper" id="VueBroadcast">
                            @foreach($systemNotices as $item)
                            <div class="swiper-slide">
                                <a href="#">{{$item->title}}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- 精品推荐 -->
            <div class="index_title">精品推荐</div>
            <!-- 精品推荐列表 -->
            <div class="indexSideslip">
                <div class="qualityList" id="VueQualityList">
                    @foreach($recommends as $item)
                    <a href="/recommends/{{$item->id}}" class="qualityItem">
                    <img src="{{$item->pic_cn}}">
                    <div class="quality-text">
                        <div class="quality-title">{{$item->title}}</div>
                        <div class="quality-describe">{{$item->introduce}}</div>
                    </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <!-- 投放房源 -->
            <div class="launchHouse-box">
                <div class="launchHouse-content">
                    <img src="{{res('/we_img/index_launchHouse.jpg')}}">
                    <div class="launchHouse-form">
                        <form>
                            <div class="input-box">
                                <input id="telInput" type="text" placeholder="请输入您的手机号"/>
                            </div>
                            <div class="btn-box">
                                <button type="button" class="mui-btn mui-btn-primary" id="addBook">立即体验</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- 推荐服务 -->
            <div class="index_title">推荐服务</div>

            <!-- 推荐服务大 -->
            <div id="VueintroServer">
                @if(!empty($serviceRecommends['first']))
                <div class="index-serverFirst">
                    <a href="{{url('/servers').'/'.$serviceRecommends['first']['service_id']}}">
                    <img src="{{$serviceRecommends['first']['pic_cn']}}" alt="">
                    </a>
                </div>
                @endif
                <!-- 推荐服务列表 -->
                <div class="indexSideslip">
                    <div class="serverList">
                        @if(!empty($serviceRecommends['second']))
                            @foreach($serviceRecommends['second'] as $item)
                                <a class="serverItem" href="{{url('/servers').'/'.$item['service_id']}}">
                                    <img src="{{$item['pic_cn']}}" alt="">
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            {{-- 中部轮播 --}}
            <div class="banner-median">
                <div id="banner-median" class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="https://wechat.chulouwang.com/buildings/f01f45d0c22811e88c0008002772f793">
                                    <img src="{{res('/we_img/index_banner2_1.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="tel:4000-580-888">
                                <img src="{{res('/we_img/index_banner2_2.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($hotBlocks) === 5)
            <!-- 热门商圈 -->
            <div class="hot-block" id="VueHotBlock" v-if='list.length >= 5'>
                <div class="index_title">热门商圈</div>
                <div class="hot-block-box">
                    <a href='/buildings?condition={"area_guid":"{{$hotBlocks[0]->block->area_guid}}","block_guid":"{{$hotBlocks[0]->block_guid}}"}' class="hot-1">
                        <img src="{{$hotBlocks[0]->img_cn}}">
                    </a>
                    <ul>
                        <li class="display-flex">
                            <a href='/buildings?condition={"area_guid":"{{$hotBlocks[1]->block->area_guid}}","block_guid":"{{$hotBlocks[1]->block_guid}}"}' >
                            <img src="{{$hotBlocks[1]->img_cn}}">
                            </a>
                            <a href='/buildings?condition={"area_guid":"{{$hotBlocks[2]->block->area_guid}}","block_guid":"{{$hotBlocks[2]->block_guid}}"}' >
                            <img src="{{$hotBlocks[2]->img_cn}}">
                            </a>
                        </li>
                        <li class="display-flex">
                            <a href='/buildings?condition={"area_guid":"{{$hotBlocks[3]->block->area_guid}}","block_guid":"{{$hotBlocks[3]->block_guid}}"}'>
                            <img src="{{$hotBlocks[3]->img_cn}}">
                            </a>
                            <a href='/buildings?condition={"area_guid":"{{$hotBlocks[4]->block->area_guid}}","block_guid":"{{$hotBlocks[4]->block_guid}}"}' >
                            <img src="{{$hotBlocks[4]->img_cn}}">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
            <!-- 写字楼推荐 -->
            <div class="index_title">写字楼推荐</div>
            <div class="indexSideslip">
                <div class="buildingList">
                    @foreach($buildingRecommends as $item)
                    <a class='buildingItem' href="/buildings/{{$item->building_guid}}" >
                    <img src="{{$item->img_cn}}" alt="">
                    <div class="building-text">
                        <div class="building-title">{{$item->building_name}}</div>
                        <div class="building-describe"><img src="{{res('/we_img/index_positon.png')}}" alt="">{{$item->address_cn}}</div>
                    </div>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="area-title">
                区域
            </div>
            <div class="area-list">
                <a href="/buildings">全部</a>
                @foreach($areas as $item)
                <a href='/buildings?condition={"area_guid":"{{$item->guid}}"}'>{{strchr($item->name, "区", true)}}</a>
                @endforeach
            </div>
            <div class="better">猜你喜欢</div>
            {{--楼盘列表数据--}}
            <input id="listAppData" type="hidden" value="{{json_encode($buildings)}}">
            <div class="guessList">
                <div id="listApp">
                    <building-list position-img='{{res('/we_img/index_positon.png')}}' good-img='{{res('/we_img/index_good.png')}}' :list='list'></building-list>
                    <div class="more" v-if="getData" @click='getMore'>
                        <button>查看更多</button>
                    </div>
                    <div class="more" v-if="!getData && status">
                        <div type="button" class="loading"><i class="mui-icon mui-icon-spinner-cycle mui-spin"></i>正在加载 ...</div>
                    </div>
                    <div class="more" v-if="prompt">没有更多数据了</div>
                </div>
            </div>
        </div>
        <!-- 委托投放弹窗 -->
        <div class="mui-backdrop" id="backdrop" style="display: none">
            <div id="popover" class="mui-popover bookHouse mui-active">
                <div class="book-box">
                    <div class="title">请选择你所需要的服务</div>
                    <div class="book-contentBox">
                        <div class="img-box">
                            <div><img id="lookForHouse" src="{{res('/we_img/index_lookForHouse.png')}}" alt=""></div>
                            <div><img id="peltHouse" src="{{res('/we_img/index_pletHouse.png')}}" class="right" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- 电话 -->
        {{-- <a href="tel:4000-580-888" onclick="auditToServer('首页')">
            <div style="position: fixed;bottom: 70px;right: 15px;z-index: 1000;">
                <img src="/we_img/button.png" style="width: 46px;">
            </div>
        </a> --}}
        <!-- 底部导航 -->
        @include('we.tab')
    </div>
    <script src={{res("/js/we_home.js")}}"></script>
@endsection