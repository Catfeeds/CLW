@extends('home.layouts.layout')
@section('title', '楼盘列表页')
<link rel="stylesheet" href="/css/home_pagination.css">
<link rel="stylesheet" href="{{res('/css/home_paging.css')}}">
<link rel="stylesheet" href="/css/home_house_list.css">
<style>
    .icon{
        display: inline-block;
        width: 16px;
        height: 16px;
        background-position: left -66px;
        margin-right: 6px;
        vertical-align: -3px;
    }
    .icon-tick{
        background: url('/home_img/tick.svg');
    }
    .icon-untick{
        background: url('/home_img/untick.svg');
    }

</style>
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
                    <input type="text" class="serch_inp" placeholder="搜索关键词" value="{{$request['keyword']??''}}">
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
                                <a data-content="{{$area['name']}}" data-dom="area_id" class="js_addCurrent @if(!empty($request['area_id'])&&$request['area_id']==$area['id'])area_id current @endif">{{$area['name']}}</a>
                            </li>
                        @endforeach
                    </ul>
                    @if(!empty($blocks))
                        <ul class="area_detail clearfix js_hongshanList">
                            <li class="js_condition" data-content="" data-dom="block_id"><a
                                        class="all @if(empty($request['block_id']))current @endif">全部</a></li>
                            {{--<li class="sanjiao"><a href="javascript:void(0);">光谷</a></li>--}}
                            @foreach($blocks as $key => $block)
                                <li class="js_condition" data-content="{{$key}}" data-dom="block_id">
                                    <a data-content="{{$block}}" data-dom="block_id" class="@if(!empty($request['block_id'])&&$request['block_id']==$key)block_id current @endif"
                                            data-content="{{$key}}">{{$block}}
                                    </a>
                                </li>
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
                        <li class="item js_condition" data-dom="acreage" data-content=""><a
                                    class="js_addCurrent all @if(empty($request['acreage']))current @endif">全部</a></li>
                        @foreach(['0-100','100-300','300-500','500-1000','1000-10000'] as $acreage)
                            <li class="item js_condition" data-dom="acreage" data-content="{{$acreage}}">
                                <?php $acreageShow = $acreage=='1000-10000'?'1000m²以上':$acreage.'m²'
                                ?>
                                <a data-content="{{$acreageShow}}" data-dom="acreage" class="@if(!empty($request['acreage'])&&$request['acreage']==$acreage)acreage current @endif">{{$acreageShow}}</a>
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
                                <?php $priceShow = $price=='140-1000'?'140/m²·月以上':$price.'/m²·月'
                                ?>
                                <a data-content="{{$priceShow}}" data-dom="unit_price" class="@if(!empty($request['unit_price'])&&$request['unit_price']==$price)current unit_price @endif">{{$priceShow}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="decoration">
                    <ul class="list clearfix">
                        <li class="item">装修</li>
                        <li class="item js_condition" data-dom="renovation" data-content=""><a
                                    class="js_addCurrent all @if(empty($request['renovation']))current @endif">全部</a>
                        </li>
                        @foreach([1=>'豪华装修',2=>'精装修',3=>'中装修',4=>'简装修',5=>'毛坯'] as $key => $renovation)
                            <li class="item js_condition" data-dom="renovation" data-content="{{$key}}">
                                <a data-content="{{$renovation}}" data-dom="renovation" class="@if(!empty($request['renovation'])&&$request['renovation']==$key)current renovation @endif">{{$renovation}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="special">
                    <ul class="list clearfix">
                        <li class="item">特色</li>
                        <?php
                            $featuresArray = empty($request['features'])?[]:explode('-',$request['features']);
                        ?>
                        @foreach($buildingFeatures as $key => $features)
                            <?php
                               $type = (!empty($request['features'])&&in_array($key, $featuresArray));
                            ?>
                            <li class="item js_features" @if($type)data-type="true" @endif data-content="{{$key}}">
                                @if($type)
                                    <a class="js_addCurrent current all features" data-dom="features" data-content="{{$features}}"><em class="icon icon-tick"></em>{{$features}}</a>
                                @else
                                    <a class="js_addCurrent all"><em class="icon icon-untick "></em>{{$features}}</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="result js_result clearfix" style="display: none">
                    <div class="title f_l">已选</div>
                    <div class="selected_box f_l clearfix">
                    </div>
                    <!-- <div class="order_selected f_l"><a href="javascript:void(0)" class="js_order_selected">订阅该筛选条件</a></div> -->
                    <div class="cleaning f_l"><a href="javascript:void(0)" class="js_cleaning">清空</a></div>
                </div>
            </div>
            <div class="house_list">
                <div class="house_show">
                    <div class="house_show_title">
                        <div class="house_num">
                            出租写字楼共<span>{{$count??0}}</span>套
                        </div>
                        <div class="title_right">
                            <div class="sort_default" @if(empty($request['price_sort']))style="background: #03a2fb" @endif><a href="javascript:void(0);">默认</a></div>
                            <div class="sort_price">
                                <a href="javascript:void(0);" class="js_order_price order_price js_set" data-dom="price_sort" data-content="{{empty($request['price_sort'])?'':$request['price_sort']}}">
                                    价格排序
                                    <span class="up js_up @if(!empty($request['price_sort'])&& $request['price_sort']=='asc')style="background-color: #03a2fb" @endif">▲</span>
                                    <span class="down js_down @if(!empty($request['price_sort'])&& $request['price_sort']=='desc')style="background-color: #03a2fb" @endif">▼</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if(!empty($Results))
                        <div class="js_content">
                            @foreach($Results as $key => $data)
                                <div class="detail">
                                    <div class="img_box">
                                        <img src="{{$data->img_cn}}" alt="" style="width: 242px;height: 200px">
                                    </div>
                                    <div class="detail_title">
                                        <div class="house_name clearfix">
                                            <div class="name f_l">{{$data->name}}</div>
                                            <span class='js_tao'>{{$data->house_count}}套</span>
                                            <div class="price f_r"><span
                                                        class="js_acvergePrice">{{$data->avg_price}}</span>元/m²月
                                            </div>
                                        </div>
                                        <div class="house_location">地址: [{{$data->address_cn}}]{{$data->address}}</div>
                                        <div class="house_acverge">面积: {{$data->constru_acreage}}m²</div>
                                        <div class="acverge_select">
                                            <ul>
                                                {{--{{dd($data->pc_house->toArray())}}--}}
                                                @foreach($data->pc_house as $pchouse)
                                                <li style="position: relative">
                                                    <a href="javascript:void(0);">{{$pchouse->constru_acreage}}㎡</a>
                                                    <div class="acreage-detail">
                                                        <div style="position: relative">
                                                            <img src="{{$pchouse->indoor_img_cn}}" alt=""
                                                                 style="width:200px;height: 160px">
                                                            <span class="zx">{{$pchouse->renovation_cn}}</span>
                                                        </div>
                                                        <div>{{$pchouse->constru_acreage}}㎡</div>
                                                        <div>{{$pchouse->unit_price}}元/㎡</div>
                                                    </div>
                                                </li>
                                                @endforeach
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
                            {!! $page !!}
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