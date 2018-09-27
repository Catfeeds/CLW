@extends('home.layouts.layout')
@section('title', '楼盘列表页')
@section('header')
<link rel="stylesheet" href="{{homeRes('/css/home_house_list.css')}}">
{{-- <style>
    .js_cleaning:hover .icon_clean{
        background:url({{('/home_img/rubish1.svg')}}) !important;
    }
</style> --}}
@section('body')
    @include('home.nav')
    @include('home.right_tab')
    <input type="hidden" id="search"
           data-area_guid="{{ $request['area_guid']??'' }}"
           data-block_guid="{{ $request['block_guid']??'' }}"
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
                    <a href="{{url('/')}}" class="homepage" target="_blank">首页 </a>&nbsp;>&nbsp;
                    <a href="javscript:void(0)">写字楼出租</a>
                </div>
                <form class="serch_area f_r " action="{{url('/building_list')}}">
                        <input name="keyword" type="text" id="searchInput" placeholder="搜索关键词" value="{{$request['keyword']??''}}">
                        <button type="submit" class="serch_btn"><span style="background: url('{{homeRes('/home_img/index_search_btn.png')}}') no-repeat center/20px 20px;"></span></button>
                    <!-- <div class="serch_map"><span></span><a href="javascript:void(0)">搜图找房</a></div> -->
                </form>
            </div>
        </div>
        <div class="house_list_content">
            <div class="select_box">
                <div class="select_area">
                    <div class="area">
                        <ul class="list clearfix js_area">
                            <li class="item">区域</li>
                            <li class="item js_condition" data-content="" data-dom="area_guid">
                                <a class="all js_addCurrent  @if(empty($request['area_guid']))current @endif">全部</a>
                            </li>
                            @foreach($areas as $area)
                                <li class="item js_condition" data-content="{{$area['id']}}" data-dom="area_guid">
                                    <a data-content="{{$area['name']}}" data-dom="area_guid"
                                       class="js_addCurrent @if(!empty($request['area_guid'])&&$request['area_guid']==$area['id'])area_guid current @endif js_area_sel">{{$area['name']}}</a>
                                </li>
                            @endforeach
                        </ul>
                        @if(!empty($blocks))
                            <ul class="area_detail clearfix js_hongshanList">
                                <li class="js_condition" data-content="" data-dom="block_guid"><a
                                            class="all @if(empty($request['block_guid']))current @endif">全部</a></li>
                                {{--<li class="sanjiao"><a href="javascript:void(0);">光谷</a></li>--}}
                                @foreach($blocks as $key => $block)
                                    <li class="js_condition" data-content="{{$key}}" data-dom="block_guid">
                                        <a data-content="{{$block}}" data-dom="block_guid"
                                           class="@if(!empty($request['block_guid'])&&$request['block_guid']==$key)block_guid current @endif"
                                           data-content="{{$key}}">{{$block}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="acverge">
                        <ul class="list clearfix">
                            <li class="item">面积</li>
                            <li class="item js_condition" data-dom="acreage" data-content=""><a
                                        class="js_addCurrent all @if(empty($request['acreage']))current @endif">全部</a>
                            </li>
                            @foreach(['0-100','100-300','300-500','500-1000','1000-10000'] as $acreage)
                                <li class="item js_condition" data-dom="acreage" data-content="{{$acreage}}">
                                    <?php $acreageShow = $acreage == '1000-10000' ? '1000m²以上' : $acreage . 'm²'
                                    ?>
                                    <a data-content="{{$acreageShow}}" data-dom="acreage"
                                       class="@if(!empty($request['acreage'])&&$request['acreage']==$acreage)acreage current @endif">{{$acreageShow}}</a>
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
                            @foreach(['0-40','40-60','60-80','80-120','120-140','140-1000'] as $price)
                                <li class="item js_condition" data-dom="unit_price" data-content="{{$price}}">
                                    <?php $priceShow = $price == '140-1000' ? '140元/m²·月以上' : $price . '元/m²·月'
                                    ?>
                                    <a data-content="{{$priceShow}}" data-dom="unit_price"
                                       class="@if(!empty($request['unit_price'])&&$request['unit_price']==$price)current unit_price @endif">{{$priceShow}}</a>
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
                                    <a data-content="{{$renovation}}" data-dom="renovation"
                                       class="@if(!empty($request['renovation'])&&$request['renovation']==$key)current renovation @endif">{{$renovation}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="special">
                        <ul class="list clearfix">
                            <li class="item">特色</li>
                            <?php
                            $featuresArray = empty($request['features']) ? [] : explode('-', $request['features']);
                            ?>
                            @foreach($buildingFeatures as $key => $features)
                                <?php
                                $type = (!empty($request['features']) && in_array($key, $featuresArray));
                                ?>
                                <li class="item js_features" @if($type)data-type="true" @endif data-content="{{$key}}">
                                    @if($type)
                                        <a class="js_addCurrent current all features" data-dom="features"
                                           data-key="{{$key}}" data-content="{{$features}}">
                                           <em class="icon icon-tick" style="background: url('{{homeRes('/home_img/tick.svg')}}') no-repeat;"></em>{{$features}}</a>
                                    @else
                                        <a class="js_addCurrent all"><em class="icon icon-untick" style="background: url('{{homeRes('/home_img/untick.svg')}}') no-repeat;"></em>{{$features}}
                                        </a>
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
                        <div class="cleaning f_l clearfix"><a href="javascript:void(0)"class="js_cleaning f_r"><span class="icon_clean" style="background: url({{homeRes('/home_img/rubish.svg')}});"></span>清空</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="house_list">
                <div class="house_show">
                    <div class="house_show_title">
                        <div class="house_num">
                            出租写字楼共&nbsp;<span>{{$count??0}}</span>&nbsp;套
                        </div>
                        @if(!empty($Results)&&$Results->count())
                        <div class="title_right">
                            <div class="sort_default js_price_default"><a href="javascript:void(0);"
                                                                          @if(empty($request['price_sort'])) class="current" @endif>默认</a>
                            </div>
                            <div class="sort_price">
                                <a href="javascript:void(0);" class="order_price js_price_sort js_up @if(!empty($request['price_sort'])) current @endif"
                                   data-content="{{empty($request['price_sort'])?'':$request['price_sort']}}">
                                    价格排序
                                    @if(empty($request['price_sort']))
                                        <img src="{{homeRes('/home_img/build_detail_up_before.png')}}" class="up js_up"/>
                                        <img src="{{homeRes('/home_img/down.png')}}" class="down js_down"/>
                                    @elseif($request['price_sort']=='asc')
                                        <img src="{{homeRes('/home_img/build_detail_up_after.png')}}" class="up js_up"/>
                                        <img src="{{homeRes('/home_img/down.png')}}" class="down js_down"/>
                                    @elseif($request['price_sort']=='desc')
                                        <img src="{{homeRes('/home_img/build_detail_up_before.png')}}" class="up js_up"/>
                                        <img src="{{homeRes('/home_img/build_detail_down_after.png')}}" class="down js_down"/>
                                    @endif
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                    @if(!empty($Results)&&$Results->count())
                        <div class="js_content">
                            @foreach($Results as $key => $data)
                                <a href="{{url('/buildings').'/'.$data->id}}" target="_blank">
                                    <div class="detail">
                                        <div class="img_box">
                                            <img src="{{$data->img_cn}}" alt="" class="house_img"/>
                                            @if($data->label_cn)
                                                <img src="{{homeRes('/home_img/perfect_sel.png')}}" alt="" class="first_select">
                                            @endif
                                        </div>
                                        <div class="detail_title">
                                            <div class="house_name clearfix">
                                                <div class="name f_l">{!!$data->name!!}</div>
                                                <span class='js_tao'>{{$data->house_count}}套</span>
                                                <div class="price f_r"><span
                                                            class="js_acvergePrice">{{$data->avg_price}}</span>元/m²月
                                                </div>
                                            </div>
                                            <div class="house_location">地址: [{!!$data->pc_address_cn!!}
                                                ] {!!$data->address!!}</div>
                                            <div class="house_acverge">面积: {{$data->constru_acreage}}m²</div>
                                            <div class="acverge_select">
                                                <ul class="clearfix">
                                                    @foreach($data->pc_house as $pchouse)
                                                        <li style="position: relative" class="f_l">
                                                            <a href="{{url('/office_building_houses'.'/'.$pchouse['id'])}}">{{$pchouse['constru_acreage']}}
                                                                ㎡</a>
                                                            <a href="{{url('/office_building_houses'.'/'.$pchouse['id'])}}" target="_blank">
                                                                <div class="acreage-detail">
                                                                    <div style="position: relative">
                                                                        <img src="{{$pchouse['indoor_img_cn']}}" alt=""
                                                                             style="width:200px;height: 160px">
                                                                        <span class="zx">{{$pchouse['renovation_cn']}}</span>
                                                                    </div>
                                                                    <div class="zx_acverge f_l">{{$pchouse['constru_acreage']}}
                                                                        ㎡ |
                                                                    </div>
                                                                    <div class="zx_price f_l">
                                                                        &nbsp;{{$pchouse['unit_price']}}元/㎡
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    @if(count($data->pc_house)>2)
                                                    <li class="f_l"><a href="{{url('/buildings').'/'.$data->id}}}" target="_blank">更多...</a></li>
                                                    @endif    
                                                </ul>
                                            </div>
                                            @if(!empty($data->features))
                                                <div class="house_special">
                                                    <ul>
                                                        @foreach($data->features as $features)
                                                            <li>
                                                                {{$features->name}}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        @if($Results->count())
                            <div class="pagination">
                                {!! $page !!}
                            </div>
                        @endif
                    @else
                        <div class="empty">
                            <div class="title">Sorry,暂时无法满足您筛选条件的房源!让顾问帮您找找看？</div>
                            <div class="callme">联系顾问：<span>4000-580-888</span></div>
                        </div>
                        <div class="related">
                            <div class="related_title">
                                <span></span>&nbsp;相关推荐
                            </div>
                        </div>
                        @if(!empty($recommend)&&$recommend->count())
                            <div class="js_content">
                                @foreach($recommend as $key => $data)
                                    <a href="{{url('/buildings').'/'.$data['id']}}">
                                        <div class="detail">
                                            <div class="img_box">
                                                <img src="{{$data['img_cn']}}" alt="" class="house_img"/>
                                                @if($data['label_cn'])
                                                    <img src="{{homeRes('/home_img/perfect_sel.png')}}" alt="" class="first_select">
                                                @endif
                                            </div>
                                            <div class="detail_title">
                                                <div class="house_name clearfix">
                                                    <div class="name f_l">{!!$data['name']!!}</div>
                                                    <span class='js_tao'>{{$data['house_count']}}套</span>
                                                    <div class="price f_r"><span
                                                                class="js_acvergePrice">{{$data['avg_price']}}</span>元/m²月
                                                    </div>
                                                </div>
                                                <div class="house_location">地址: [{!!$data['pc_address_cn']!!}] {!!$data['address']!!}</div>
                                                <div class="house_acverge">面积: {{$data['constru_acreage']}}m²</div>
                                                <div class="acverge_select">
                                                    <ul class="clearfix">
                                                        @foreach($data['pc_house'] as $pchouse)
                                                            <li style="position: relative" class="f_l">
                                                                <a href="{{url('/office_building_houses'.'/'.$pchouse['id'])}}">{{$pchouse['constru_acreage']}}
                                                                    ㎡</a>
                                                                <a href="{{url('/office_building_houses'.'/'.$pchouse['id'])}}">
                                                                    <div class="acreage-detail">
                                                                        <div style="position: relative">
                                                                            <img src="{{$pchouse['indoor_img_cn']}}"
                                                                                 alt=""
                                                                                 style="width:200px;height: 160px">
                                                                            <span class="zx">{{$pchouse['renovation_cn']}}</span>
                                                                        </div>
                                                                        <div class="zx_acverge f_l">{{$pchouse['constru_acreage']}}
                                                                            ㎡ |
                                                                        </div>
                                                                        <div class="zx_price f_l">
                                                                            &nbsp;{{$pchouse['unit_price']}}元/㎡
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                        <li class="f_l"><a href="{{url('/buildings').'/'.$data['id']}}}">更多...</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                @if(!empty($data['features']))
                                                    <div class="house_special">
                                                        <ul>
                                                            @foreach($data['features'] as $features)
                                                                <li>
                                                                    {{$features['name']}}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    @endif
                </div>
                <div id="findHouse">
                    <find-house class="find_house" source-page='楼盘列表'></find-house>
                </div>

            </div>
        </div>
    </div>
    @include('home.footer')
@endsection
@section('script')
    <script src="{{homeRes('/js/home_house_list.js')}}"></script>
@endsection