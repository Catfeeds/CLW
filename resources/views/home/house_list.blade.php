@extends('home.layouts.layout')
@section('title', '楼盘列表页')
<link rel="stylesheet" href="/css/home_pagination.css">
<link rel="stylesheet" href="/css/home_house_list.css">
@section('header')
@section('body')
    <input type="hidden" id="search"
           data-area_id="{{ $request['area_id']??'' }}"
           data-block_id="{{ $request['block_id']??'' }}"
           data-features="{{ $request['features']??'' }}"
           data-acreage="{{ $request['acreage']??'' }}"
           data-unit_price="{{ $request['unit_price']??'' }}"
           data-renovation="{{ $request['renovation']??'' }}"
           data-keyword="{{ $request['keyword']??'' }}"
           data-price_sort="{{ $request['price_sort']??'' }}">

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
                        <li class="item js_condition" data-content="" data-dom="area_id">
                            <a class="all js_addCurrent  @if(empty($request['area_id']))current @endif">全部</a>
                        </li>
                        @foreach($areas as $area)
                            <li class="item js_condition" data-content="{{$area['id']}}" data-dom="area_id">
                                <a class="js_addCurrent @if(!empty($request['area_id'])&&$request['area_id']==$area['id'])current @endif">{{$area['name']}}</a>
                            </li>
                        @endforeach
                    </ul>
                    @if(!empty($blocks))
                        <ul class="area_detail clearfix js_hongshanList">
                            <li class="js_condition" data-content="" data-dom="block_id"><a
                                        class="all @if(empty($request['block_id']))current @endif">全部</a></li>
                            {{--<li class="sanjiao"><a href="javascript:void(0);">光谷</a></li>--}}
                            @foreach($blocks as $key => $block)
                                <li class="js_condition" data-content="{{$key}}" data-dom="block_id"><a
                                            class="@if(!empty($request['block_id'])&&$request['block_id']==$key)current @endif"
                                            data-content="{{$key}}">{{$block}}</a></li>
                            @endforeach
                        </ul>
                    @endif
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
                        <li class="item js_condition" data-dom="acreage" data-content=""><a class="js_addCurrent all @if(empty($request['acreage']))current @endif">全部</a></li>
                        @foreach(['0-100','100-300','300-500','500-1000','1000-10000'] as $acreage)
                            <li class="item js_condition" data-dom="acreage" data-content="{{$acreage}}">
                                <a class="@if(!empty($request['acreage'])&&$request['acreage']==$acreage)current @endif">{{$acreage=='1000-10000'?'1000m²以上':$acreage.'m²'}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="price">
                    <ul class="list clearfix">
                        <li class="item">价格</li>
                        <li class="item js_condition" data-dom="unit_price" data-content="">
                            <a class="js_addCurrent all @if(empty($request['unit_price']))current @endif">全部</a>
                        </li>
                         @foreach(['40-60','60-80','80-120','120-140','140-1000'] as $price)
                            <li class="item js_condition" data-dom="unit_price" data-content="{{$price}}">
                                <a class="@if(!empty($request['unit_price'])&&$request['unit_price']==$price)current @endif">{{$price=='140-1000'?'140/m²·月以上':$price.'/m²·月'}}</a>
                            </li>
                         @endforeach
                    </ul>
                </div>
                <div class="decoration">
                    <ul class="list clearfix">
                        <li class="item">装修</li>
                        <li class="item js_condition" data-dom="renovation" data-content=""><a class="js_addCurrent all @if(empty($request['renovation']))current @endif">全部</a></li>
                        @foreach(['豪华装修','精装修','中装修','简装修','毛坯'] as $renovation)
                            <li class="item js_condition" data-dom="renovation" data-content="{{$renovation}}">
                                <a class="@if(!empty($request['renovation'])&&$request['renovation']==$renovation)current @endif">{{$renovation}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="special">
                    <ul class="list clearfix">
                        <li class="item">特色</li>
                        @foreach($buildingFeatures as $key => $features)
                            <li class="item" da data-content="{{$key}}"><a class="js_addCurrent current all">{{$features}}</a></li>
                        @endforeach
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
                            出租写字楼共<span>{{$Results['house_count']??0}}</span>套
                        </div>
                        <div class="title_right">
                            <div class="sort_default"><a href="javascript:void(0);">默认</a></div>
                            <div class="sort_price"><a href="javascript:void(0);"
                                                       class="js_order_price order_price js_set">价格排序<span
                                            class="up js_up">▲</span><span class="down js_down">▼</span></a></div>
                        </div>
                    </div>
                    @if(!empty($Results['page']['data']))
                    <div class="js_content">
                            @foreach($Results['page']['data'] as $key => $data)
                                <div class="detail">
                                    <div class="img_box">
                                        <img src="{{$data->img_cn}}" alt="" style="width: 242px;height: 200px">
                                    </div>
                                    <div class="detail_title">
                                        <div class="house_name clearfix">
                                            <div class="name f_l">{{$data->name}}</div>
                                            <span class='js_tao'>{{$data->house_count}}套</span>
                                            <div class="price f_r"><span class="js_acvergePrice">{{$data->avg_price}}</span>元/m²月
                                            </div>
                                        </div>
                                        <div class="house_location">地址: [{{$data->address_cn}}]{{$data->address}}</div>
                                        <div class="house_acverge">面积: 57-700m²</div>
                                        <div class="acverge_select">
                                            <ul>
                                                <li style="position: relative">
                                                    <a href="javascript:void(0);">210m²</a>
                                                    <div class="acreage-detail">
                                                        <div style="position: relative">
                                                            <img src="{{$data->img_cn}}" alt="" style="width:200px;height: 160px">
                                                            <span class="renovation">装修</span>
                                                        </div>
                                                        <div>装修</div>
                                                        <div>面积|价格</div>
                                                    </div>
                                                </li>
                                                <li><a href="javascript:void(0);">210m²</a></li>
                                                <li><a href="javascript:void(0);">210m²</a></li>
                                                <li><a href="javascript:void(0);">210m²</a></li>
                                                <li><a href="javascript:void(0);">210m²</a></li>
                                                <li><a href="javascript:void(0);">更多...</a></li>
                                            </ul>
                                        </div>
                                        @if(!empty($data->features))
                                            <div class="house_special">
                                                <ul>
                                                    @foreach($data->features as $features)
                                                        <li>
                                                            <span class="icon"></span>{{$features->name}}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                    </div>
                    <div class="pagination">
                        <ul id="page" class="page clearfix">
                            <li class='pageItem' page-rel='prepage'>上一页</li>
                            {{--@for($i=1;$i<=$Results['total_page'];$i++)--}}
                                {{--<li class="@if($Results['page']['current_page']==$i) pageItemActive @else pageItem @endif" page-rel='itempage'><a >{{$i}}</a></li>--}}
                            {{--@endfor--}}
                            <li class='pageItem' page-rel='nextpage'>下一页</li>
                        </ul>
                    </div>
                    @endif
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
    <script src="/js/home_house_list.js"></script>

@endsection