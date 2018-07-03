@extends('home.layouts.layout')
@section('title', '楼盘列表页')
<link rel="stylesheet" href="/css/home_pagination.css">
<link rel="stylesheet" href="/css/home_house_list.css">
@section('header')
@section('body')
    <div class="house_list_container">
        <div class="house_list_title">
            <div class="title_content clearfix">
                <div class="link f_l">
                    <a href="javscript:void(0)" class="homepage">首页 </a>＞
                    <a href="javscript:void(0)">写字楼出租</a>
                </div>
                <div class="serch_area f_r ">
                    <input type="text" class="serch_inp" placeholder="搜索关键词">
                    <button class="serch_btn"><span></span></button>
                    <div class="serch_map"><span></span><a href="javascript:void(0)">搜图找房</a></div>
                </div>
            </div>
        </div>
        <div class="house_list_content">
            <div class="select_area">
                <div class="area">
                    <ul class="list clearfix js_area">
                        <li class="item">区域</li>
                        <li class="item"><a href="javscript:void(0)"
                                            class="all js_addCurrent  @if(!empty($request['area_id']))current @endif">全部</a>
                        </li>
                        @foreach($areas as $area)
                            <li class="item"><a data-content="{{$area['id']}}" href="javscript:void(0)"
                                                class="js_addCurrent @if(!empty($request['area_id'])&&$request['area_id']==$area['id'])current @endif">{{$area['name']}}</a>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="area_detail clearfix js_hongshanList">
                        <li><a href="javascript:void(0); current all">全部</a></li>
                        {{--<li class="sanjiao"><a href="javascript:void(0);">光谷</a></li>--}}
                        @foreach($blocks as $key => $block)
                            <li><a href="javascript:void(0);" data-content="{{$key}}">{{$block}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- <div class="subway ">
                  <ul class="list clearfix js_subway">
                    <li class="item">地铁</li>
                    <li class="item"><a href="javscript:void(0)" class="js_addCurrent current all">全部</a></li>
                    <li class="item"><a href="javscript:void(0)" class="js_addCurrent">1号线</a></li>
                    <li class="item"><a href="javscript:void(0)" class="js_addCurrent">2号线</a></li>
                    <li class="item"><a href="javscript:void(0)" class="js_addCurrent">3号线</a></li>
                    <li class="item"><a href="javscript:void(0)" class="js_addCurrent">4号线</a></li>
                    <li class="item"><a href="javscript:void(0)" class="js_addCurrent">5号线</a></li>
                    <li class="item"><a href="javscript:void(0)" class="js_addCurrent">6号线</a></li>
                  </ul>
                  <ul class="subway_detail clearfix">
                    <li><a href="javascript:void(0); current all">不限</a></li>
                    <li class="sanjiao"><a href="javascript:void(0);">汉口北</a></li>
                    <li><a href="javascript:void(0);">滠口新城</a></li>
                    <li><a href="javascript:void(0);">滕子岗</a></li>
                    <li><a href="javascript:void(0);">堤角</a></li>
                    <li><a href="javascript:void(0);">新荣</a></li>
                    <li><a href="javascript:void(0);">丹水池</a></li>
                    <li><a href="javascript:void(0);">徐州新村</a></li>
                    <li><a href="javascript:void(0);">二七路</a></li>
                    <li><a href="javascript:void(0);">头道街</a></li>
                    <li><a href="javascript:void(0);">黄浦路</a></li>
                    <li><a href="javascript:void(0);">三阳路</a></li>
                    <li><a href="javascript:void(0);">大智路</a></li>
                    <li><a href="javascript:void(0);">循礼门</a></li>
                  </ul>
                </div> -->
                <!-- <div class="type">
                  <ul class="list clearfix">
                    <li class="item">类型</li>
                    <li class="item"><a href="javscript:void(0)" class="js_addCurrent current all">全部</a></li>
                    <li class="item"><a href="javscript:void(0)" class="js_addCurrent">普通办公</a></li>
                    <li class="item"><a href="javscript:void(0)" class="js_addCurrent">创意花园</a></li>
                  </ul>
                </div> -->
                <div class="acverge">
                    <ul class="list clearfix">
                        <li class="item">面积</li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent current all">全部</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">0-100m²</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">100-300m²</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">300-500m²</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">500-1000m²</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">1000m²以上</a></li>
                    </ul>
                </div>
                <div class="price">
                    <ul class="list clearfix">
                        <li class="item">价格</li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent current all">全部</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">40-60元/m²·月</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">60-80元/m²·月</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">80-120元/m²·月</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">120-140元/m²·月</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">140元/m²·月以上</a></li>
                    </ul>
                </div>
                <div class="decoration">
                    <ul class="list clearfix">
                        <li class="item">装修</li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent current all">全部</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">豪华装修</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">精装修</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">中装修</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">简装修</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">毛坯</a></li>
                    </ul>
                </div>
                <div class="special">
                    <ul class="list clearfix">
                        <li class="item">特色</li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent current all">核心商圈</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">创意园区</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">地标建筑</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">知名物业</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">地铁10分钟</a></li>
                        <li class="item"><a href="javscript:void(0)" class="js_addCurrent">新风系统</a></li>
                    </ul>
                </div>
                <div class="result js_result clearfix" style="display:none">
                    <div class="title f_l">已选</div>
                    <div class="selected_box f_l clearfix"></div>
                    <!-- <div class="order_selected f_l"><a href="javascript:void(0)" class="js_order_selected">订阅该筛选条件</a></div> -->
                    <div class="cleaning f_l"><a href="javascript:void(0)" class="js_cleaning">清空</a></div>
                </div>
            </div>
            <div class="house_list">
                <div class="house_show">
                    <div class="house_show_title">
                        <div class="house_num">
                            出租写字楼共<span>127</span>套
                        </div>
                        <div class="title_right">
                            <div class="sort_default"><a href="javascript:void(0);">默认</a></div>
                            <div class="sort_price"><a href="javascript:void(0);"
                                                       class="js_order_price order_price js_set">价格排序<span
                                            class="up js_up">▲</span><span class="down js_down">▼</span></a></div>
                        </div>
                    </div>

                    <div class="js_content">
                        <div class="detail">
                            <div class="img_box">
                                <img src="/we_img/house_show_img.png" alt="">
                            </div>
                            <div class="detail_title">
                                <div class="house_name clearfix">
                                    <div class="name f_l">泛海民生金融中心</div>
                                    <span class='js_tao'>17套</span>
                                    <div class="price f_r"><span class="js_acvergePrice">37.3</span>元/m²月
                                    </div>
                                </div>
                                <div class="house_location">地址: [江汉]淮海路与云霞路交汇处向...</div>
                                <div class="house_acverge">面积: 57-700m²</div>
                                <div class="acverge_select">
                                    <ul>
                                        <li><a href="javascript:void(0);">210m²</a></li>
                                        <li><a href="javascript:void(0);">210m²</a></li>
                                        <li><a href="javascript:void(0);">210m²</a></li>
                                        <li><a href="javascript:void(0);">210m²</a></li>
                                        <li><a href="javascript:void(0);">210m²</a></li>
                                        <li><a href="javascript:void(0);">更多...</a></li>
                                    </ul>
                                </div>
                                <div class="house_special">
                                    <ul>
                                        <li style="color:#849aae;background-image: linear-gradient(#f4f7f9,#f4f7f9);">
                                            <span class="icon"></span>交通便利
                                        </li>
                                        <li style="color:#59c6d3;background-image: linear-gradient(#e1f5f8,#e1f5f8);border-radius:2px;">
                                            <span class="icon"></span>繁华地段
                                        </li>
                                        <li style="color:#45c28d;background-image: linear-gradient(#e1f5ed,#e1f5ed);border-radius:2px;">
                                            <span class="icon"></span>地铁十分钟
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pagination">
                        <ul id="page" class="page clearfix"></ul>
                    </div>
                </div>
                <div class="rent_house">
                    <div class="title">
                        <div>免费委托找房</div>
                        <div>一键委托,一分钟回复</div>
                    </div>
                    <div class="phone">
                        <input type="text" placeholder="请输入手机号">
                        <span></span>
                        <div><a href="javascript:void(0);">立即委托</a></div>
                    </div>
                    <div class="rent_describe">已经有<span>15141</span>位客户委托找房</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--<script src="/js/home_house_list.js"></script>--}}

@endsection