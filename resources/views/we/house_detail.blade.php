@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="/css/we_house_detail.css">
@endsection
@section('body')
<div id="pullrefresh" class="mui-content">
	<div class="pullrefresh" id="Vuehouse">
		<div id="popover" class="mui-popover">
			<div>
			    <h4>预约信息</h4>
			    <span class="closes">×</span>
			</div>
			<div>
			    <form>
					<input type="text" id="names" placeholder="称谓" />
					<input type="text" id="tel" placeholder="电话" />
				</form>
			</div>
			    <div>
			        <button type="button" id="upload" class="mui-btn mui-btn-primary">提交</button>
			    </div>
			</div>
			<footer id="footer" class="mui-row">
				<div class="collect mui-col-xs-2">
					<img src="../images/detail_colletc1.png" class="mui-hidden" id="collect2">
					<img src="../images/detail_collect.png" id="collect1"><span>收藏</span>
				</div>
				<div class="mui-col-xs-4" id="free">
					<img src="../images/detail_free.png" class="freebtn">
				</div>
				<div class="mui-col-xs-4" id="order">
					<img src="../images/detail_order.png" class="freebtn">
				</div>
			</footer>
			<div class="mui-content">
				<div class="swiper-container" id="swiperBanner">
				    <!-- 轮播图 -->
				    <div class="swiper-wrapper" id="VueBanner">
				        <div class="swiper-slide" v-for='item in banner'>
				        <a href="#"><img :src="item.url" /></a>
				        </div>
				    </div>
				    <!-- 如果需要分页器 -->
				    <!--<div class="swiper-pagination"></div>-->
				</div>
				<!--1标题栏-->
				<div id="VueMain">
					<div class="titles">
						<div class="mui-row">
							<div class="mui-col-xs-9">
								<h5 style="color:#333333">{{list.title}}</h5> 
								</div>
							<div class="mui-col-xs-3">	
						</div>
					</div>
					<div class="uls">
						<div class="mui-row">
							<div class="mui-col-xs-4 blu bor"style="padding-right:10px;">
								<h3 style="height:20px;color:#333333">{{list.rent_price}}</h3>
								<h5>元/㎡•月</h5>
							</div>
							<div class="mui-col-xs-4 bor">
								<h3 style="height:20px;color:#333333">{{list.constru_acreage}}</h3>
								<h5>面积(㎡)</h5>
							</div>
							<div class="mui-col-xs-4 las">
								<h3 style="height:20px;color:#333333">{{list.station_number}}</h3>
								<h5>工位</h4>
							</div>
						</div>
					</div>
					<div>
						<div>
							<h5><img src="../images/house_detail_address.png">{{list.address}}</h5>
						</div>
					</div>
							<!--<div>
								<div>
									<h5><img src="../images/house_detail_bus.png">距离2号线 光谷广场 约183米</h5>
								</div>
							</div>-->
					<img class="choice" v-if="(list.label_cn === true)" src="../images/house_detail_better.png">
				</div>
				<!--2基础信息-->
				<div class="firstcard">
					<div class="top">
						<h3>基础信息</h3>
					</div>
				<div>
				<div class="mui-row">
					<div class="mui-col-xs-4"><h4>月租金</h4></div>
					<div class="mui-col-xs-6"><h4>{{list.rent_price}}</h4></div>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-4"><h4>支付方式</h4></div>
					<div class="mui-col-xs-7"><h4>{{list.payment_type_cn}}</h4></div>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-4"><h4>户型</h4></div>
						<div class="mui-col-xs-8"><h4>{{list.house_type}}</h4></div>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-4"><h4>装修</h4></div>
					<div class="mui-col-xs-8"><h4>{{list.renovation_cn}}</h4></div>
				</div>
				<div class="mui-row">
				    <div class="mui-col-xs-4"><h4>类型</h4></div>
					<div class="mui-col-xs-8"><h4>{{list.office_building_type_cn}}</h4></div>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-4"><h4>所在楼层</h4></div>
					<div class="mui-col-xs-8"><h4>{{list.floor}}</h4></div>
				</div>
				<div class="mui-row">
				    <div class="mui-col-xs-4"><h4>朝向</h4></div>
					<div class="mui-col-xs-8"><h4>{{list.orientation_cn}}</h4></div>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-4"><h4>入住时间</h4></div>
					<div class="mui-col-xs-8"><h4>{{list.check_in_time_cn}}</h4></div>
				</div>
				<div class="mui-row">
				    <div class="mui-col-xs-4"><h4>最短租期</h4></div>
					<div class="mui-col-xs-8"><h4>{{list.shortest_lease_cn}}</h4></div>
				</div>
				<div class="mui-row">
				    <div class="mui-col-xs-4"><h4>注册公司</h4></div>
					<div class="mui-col-xs-8"><h4>{{list.register_company_cn}}</h4></div>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-4"><h4>可开发票</h4></div>
					<div class="mui-col-xs-8"><h4>{{list.open_bill_cn}}</h4></div>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-4"><h4>可否拆分</h4></div>
					<div class="mui-col-xs-8"><h4>{{list.split_cn}}</h4></div>
				</div>
			</div>
		</div>
		<!-- 楼座信息 -->
		<ul class="mui-table-view secondCard" style="border-top:10px solid #f4f4f4;">
			<li class="mui-table-view-cell mui-collapse">
				<a href="#" style="line-height:18px;color:#333333;" class="mui-navigate-right top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;栋座信息</a> 
					<div class="mui-collapse-content">
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>等级</h4></div>
							<div class="mui-col-xs-6"><h4>{{list.class_cn}}</h4></div>
						</div>
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>房屋结构</h4></div>
							<div class="mui-col-xs-7"><h4>{{list.structure_cn}}</h4></div>
						</div>
						<div class="mui-row">
						    <div class="mui-col-xs-4"><h4>总楼层</h4></div>
							<div class="mui-col-xs-8"><h4>{{list.total_floor}}</h4></div>
						</div>
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>物业公司</h4></div>
							<div class="mui-col-xs-8"><h4>{{list.property_company}}</h4></div>
						</div>
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>物业费</h4></div>
							<div class="mui-col-xs-8"><h4>{{list.property_fee_cn}}</h4></div>
						</div>
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>采暖方式</h4></div>
							<div class="mui-col-xs-8"><h4>{{list.heating_cn}}</h4></div>
						</div>
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>空调类型</h4></div>
							<div class="mui-col-xs-8"><h4>{{list.air_conditioner_cn}}</h4></div>
						</div>
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>客梯数量</h4></div>
							<div class="mui-col-xs-8"><h4>{{list.passenger_lift}}</h4></div>
						</div>
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>货梯数量</h4></div>
							<div class="mui-col-xs-8"><h4>{{list.cargo_lift}}</h4></div>
						</div>
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>总裁电梯</h4></div>
							<div class="mui-col-xs-8"><h4>{{list.president_lift}}</h4></div>
						</div>
					</div>
				</li>
			</ul>
			<!--3房源优势-->
			<div class="advantage">
				<div class="top">
					<h3>房源优势</h3>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-3" v-if="(list.house_feature[0] !== '')">
						<h5>{{list.house_feature[0]}}</h5>
					</div>
					<div class="mui-col-xs-3" v-if="(list.house_feature[1] !== '')">
						<h5>{{list.house_feature[1]}}</h5>
					</div>
					<div class="mui-col-xs-3" v-if="(list.house_feature[2] !== '')">
						<h5>{{list.house_feature[2]}}</h4>
					</div>
				</div>
			</div>
			<!--4交通及周边配套-->
			<div class="periphery">
				<div class="top">
					<h3>交通及周边配套</h3>
				</div>
				<div>
				    <div id="secondmap"></div>
				</div> 
					<img src="../images/house_detail_suppert.png" id="tomap" alt="" />
				</div>
				<!--5最下推荐-->
				<house-detail-list :api='2' ref='houseDetailList' style="margin-bottom:100px;"></house-detail-list>
				<!-- 预约看房弹框 -->
			</div>
		</div>
    </div>
</div>
@endsection