@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="{{res('/css/we_building_detail.css')}}">
@endsection
@section('body')
	<div id="pullrefresh" class="mui-content">
	<input id="features" value="{{$data->feature_name_pic}}" type="hidden" />
	<input id="imgList" value="{{$data->pic_url}}" type="hidden"/>
		<input id="gps" value='{"lng": {{$data->gps[0]}}, "lat": {{$data->gps[1]}} }' type="hidden"/>
		<div id="Vuebuilding">
				<div class="mui-content">
					<div class="swiper-container">
						<detail-banner :list='imgList'></detail-banner>
				  </div>
					<!--1标题栏-->
					<div>
						<div class="titles" style="border-shadow:0;">
							<div class="mui-row">
								@if ($data->label_cn)
								<div class="mui-col-xs-9">
									<h5>{{$data->name}}</h5>
								</div>
									@else
									<div class="mui-col-xs-12">
										<h5>{{$data->name}}</h5>
									</div>
									@endif
							</div>
							<div class="uls" style="padding-left:0;padding-right:0;">
								<div class="mui-row">
									<div class="mui-col-xs-4 bor"style="padding-right:10px;border:none !important;">
										<h3 style="font-size:17px;color:#333333;text-align:center;">{{$data->unit_price}}</h3>
										<h5 style="text-align:center;">元/㎡•月</h5>
									</div>
									<div class="mui-col-xs-4 bor"style="border-left:1px solid #f4f4f4;border-right:1px solid #f4f4f4">
										<h3 style="font-size:17px;color:#333333;text-align:center;">{{$data->total_price}}</h3>
										<h5 style="text-align:center;">万元/月</h5>
									</div>
									<div class="mui-col-xs-4 las">
										<h3 style="font-size:17px;color:#333333">{{$data->constru_acreage}}</h3>
										<h5>面积(㎡)</h5>
									</div>
								</div>
							</div>
							<div style="margin-left:-15px;">
								<div>
									<h5 style="display: flex;">
										<div><img style="position: relative;top: 3px;" src="{{res('/we_img/house_detail_address.png')}}"></div>
										<div style="line-height: 20px;">{{$data->address}}</div>
									</h5>
								</div>
							</div>
							<!--<div>
								<div>
									<h5><img src="/we_img/house_detail_bus.png"> 距离2号线 光谷广场 约183米</h5>
								</div>
							</div>-->
							@if ($data->label_cn)
								<img class="choice" src="{{res('/we_img/house_detail_better.png')}}">
							@endif
						</div>
						<!--2基础信息-->
						<div class="firstcard">
							<div class="special">楼盘特色</div>
							<div class="swiper-container contain" id="swiperFeature">
								<feature-banner :list='features'></feature-banner>
						  </div>
						</div>
						<!-- 楼盘信息 -->
						<div class="build_infor">
							<div class="top">
								<h3 style="color:#333333">楼盘信息</h3>
							</div>
							<div>
								<div class="mui-row">
									<div class="mui-col-xs-4"><h4>开发商</h4></div>
									<div class="mui-col-xs-8" style="color:#333333"><h4>{{$data->developer}}</h4></div>
								</div>
								<div class="mui-row">
									<div class="mui-col-xs-4"><h4>建筑年代</h4></div>
									<div class="mui-col-xs-7" style="color:#333333"><h4>{{$data->years_cn}}</h4></div>
								</div>
								<div class="mui-row">
									<div class="mui-col-xs-4"><h4>总建筑面积</h4></div>
									<div class="mui-col-xs-8" style="color:#333333"><h4>{{$data->acreage_cn}}</h4></div>
								</div>
								<div class="mui-row">
									<div class="mui-col-xs-4"><h4>楼座数量</h4></div>
									<div class="mui-col-xs-8" style="color:#333333"><h4>{{$data->building_block_num_cn}}</h4></div>
								</div>
								<div class="mui-row">
									<div class="mui-col-xs-4"><h4>车位数量</h4></div>
									<div class="mui-col-xs-8" style="color:#333333"><h4>{{$data->parking_num_cn}}</h4></div>
								</div>
								<div class="mui-row">
									<div class="mui-col-xs-4"><h4>停车费</h4></div>
									<div class="mui-col-xs-8" style="color:#333333"><h4>{{$data->parking_fee_cn}}</h4></div>
								</div>
								<div class="mui-row">
									<div class="mui-col-xs-4"><h4>绿化率</h4></div>
									<div class="mui-col-xs-8" style="color:#333333"><h4>{{$data->greening_rate_cn}}</h4></div>
								</div>
								<div class="mui-row">
									<div class="mui-col-xs-4"><h4>入驻企业</h4></div>
									<div class="mui-col-xs-8" style="color:#333333"><h4>{{$data->company_cn}}</h4></div>
								</div>
								</div>
							</div>
						<!--3楼盘介绍-->
						<div class="advantage">
							<div class="top">
								<h3 style="color:#333333">楼盘介绍</h3>
							</div>
							<div style="text-indent:23px;font-size:13px;color:rgb(153,153,153);text-align: justify;text-justify: inter-ideograph;line-height:26px;">
								{{$data->describe}}
							</div>
						</div>
						<!--4最下推荐-->
						<house-detail-list title="写字楼出租" :api='1' building ='{{$data->guid}}'></house-detail-list>
						<!--5交通及周边配套-->
						<div class="periphery" style="margin-top:-10px !important;">
							<div class="top">
								<h3 style="margin-left:-25px;">交通及周边配套</h3>
							</div>
							<div>
								<div id="secondmap">
									<baidu-map :zoom="14" class="map" style="display: flex;height:100%; flex-direction: column" :center="center">
										<bm-view style="width: 100%; height:100%; flex: 1"></bm-view>
										<bm-marker :position="center">
											<bm-label content="{{$data->name}}" :labelStyle="{color: 'red', fontSize : '24px'}" :offset="{width: -35, height: 30}"/>
										</bm-marker>
									</baidu-map>
								</div>
							</div>
							<a href="/get_map/{{$data->guid}}" style="display: block;width: 100%">
							<img style="display: block;width: 100%" src="{{res('/we_img/house_detail_suppert.png')}}" id="tomap" alt="" />
							</a>
						</div>
					</div>
				</div>
			</div>
			{{-- <a href="tel:4000-580-888" onclick="auditToServer('楼盘详情')">
				
				<div style="position: fixed;bottom: 70px;right: 15px;z-index: 1000;">
					<img src="/we_img/button.png" style="width: 46px;">
				</div>
			</a> --}}
		</div>
        <script src="{{res('/js/we_building_detail.js')}}"></script>
@endsection
