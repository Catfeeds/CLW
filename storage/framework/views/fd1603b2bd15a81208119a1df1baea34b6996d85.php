<?php $__env->startSection('title', '楚楼网'); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(res('/css/we_house_detail.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div id="pullrefresh" class="mui-content">
	<input id="imgList" value="<?php echo e($house->pic_url); ?>" type="hidden"/>
	<input id="house_id" value="<?php echo e($house->id); ?>" type="hidden"/>
	<div class="pullrefresh" id="Vuehouse">
			<div class="mui-content" id="vueContent">
				<div class="swiper-container" id="swiperBanner">
					<detail-banner :list='imgList'></detail-banner>
				    <!-- 如果需要分页器 -->
				    <!--<div class="swiper-pagination"></div>-->
				</div>
				<!--1标题栏-->
				<div id="VueMain">
					<div class="titles">
						<div class="mui-row">
							<?php if($house->label_cn): ?>
							<div class="mui-col-xs-9">
								<h5 style="color:#333333"><?php echo e($house->title); ?></h5> 
							</div>
							<?php else: ?>
							<div class="mui-col-xs-12">
								<h5 style="color:#333333"><?php echo e($house->title); ?></h5>
							</div>
							<?php endif; ?>
					</div>
					<div class="uls">
						<div class="mui-row">
							<div class="mui-col-xs-4 blu bor"style="padding-right:10px;">
								<h3 style="height:20px;color:#333333"><?php echo e($house->unit_price); ?></h3>
								<h5>元/㎡•月</h5>
							</div>
							<div class="mui-col-xs-4 bor">
								<h3 style="height:20px;color:#333333"><?php echo e($house->constru_acreage); ?></h3>
								<h5>面积(㎡)</h5>
							</div>
							<div class="mui-col-xs-4 las">
								<h3 style="height:20px;color:#333333"><?php echo e($house->station_number); ?></h3>
								<h5>工位</h5>
							</div>
						</div>
					</div>
					<div style="padding-right: 15px;">
						<div>
							<h5 style="display: flex;">
								<div><img style="position: relative;top: 3px;" src="<?php echo e(res('/we_img/house_detail_address.png')); ?>"></div>
								<div style="line-height: 20px;"><?php echo e($house->address); ?></div>
							</h5>
						</div>
					</div>
							<!--<div>
								<div>
									<h5><img src="/we_img/images/house_detail_bus.png">距离2号线 光谷广场 约183米</h5>
								</div>
							</div>-->
						<?php if($house->label_cn): ?>
					<img class="choice" src="<?php echo e(res('/we_img/house_detail_better.png')); ?>">
							<?php endif; ?>
				</div>
				<!--2基础信息-->
				<div class="firstcard">
					<div class="top">
						<h3>基础信息</h3>
					</div>
				<div>
				<div class="mui-row">
					<div class="mui-col-xs-4"><h4>月租金</h4></div>
					<div class="mui-col-xs-6"><h4><?php echo e($house->total_price_cn); ?></h4></div>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-4"><h4>支付方式</h4></div>
					<div class="mui-col-xs-7"><h4><?php echo e($house->payment_type_cn); ?></h4></div>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-4"><h4>户型</h4></div>
						<div class="mui-col-xs-8"><h4><?php echo e($house->house_type); ?></h4></div>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-4"><h4>装修</h4></div>
					<div class="mui-col-xs-8"><h4><?php echo e($house->renovation_cn); ?></h4></div>
				</div>
				<div class="mui-row">
				    <div class="mui-col-xs-4"><h4>类型</h4></div>
					<div class="mui-col-xs-8"><h4><?php echo e($house->office_building_type_cn); ?></h4></div>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-4"><h4>所在楼层</h4></div>
					<div class="mui-col-xs-8"><h4><?php echo e($house->floor_cn); ?></h4></div>
				</div>
				<div class="mui-row">
				    <div class="mui-col-xs-4"><h4>朝向</h4></div>
					<div class="mui-col-xs-8"><h4><?php echo e($house->orientation_cn); ?></h4></div>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-4"><h4>入住时间</h4></div>
					<div class="mui-col-xs-8"><h4><?php echo e($house->check_in_time_cn); ?></h4></div>
				</div>
				<div class="mui-row">
				    <div class="mui-col-xs-4"><h4>最短租期</h4></div>
					<div class="mui-col-xs-8"><h4><?php echo e($house->shortest_lease_cn); ?></h4></div>
				</div>
				<div class="mui-row">
				    <div class="mui-col-xs-4"><h4>注册公司</h4></div>
					<div class="mui-col-xs-8"><h4><?php echo e($house->register_company_cn); ?></h4></div>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-4"><h4>可否拆分</h4></div>
					<div class="mui-col-xs-8"><h4><?php echo e($house->split_cn); ?></h4></div>
				</div>
			</div>
		</div>
		<!-- 楼座信息 -->
		<ul class="mui-table-view secondCard" style="border-top:10px solid #f4f4f4;">
			<li class="mui-table-view-cell mui-collapse" id="collapse">
				<a style="line-height:40px;color:#333333;" class="mui-navigate-right top" onclick="showInfo()">&nbsp;&nbsp;&nbsp;栋座信息</a>
					<div class="mui-collapse-content">
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>等级</h4></div>
							<div class="mui-col-xs-6"><h4><?php echo e($house->class); ?></h4></div>
						</div>
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>房屋结构</h4></div>
							<div class="mui-col-xs-7"><h4><?php echo e($house->structure); ?></h4></div>
						</div>
						<div class="mui-row">
						    <div class="mui-col-xs-4"><h4>总楼层</h4></div>
							<div class="mui-col-xs-8"><h4><?php echo e($house->total_floor); ?></h4></div>
						</div>
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>物业公司</h4></div>
							<div class="mui-col-xs-8"><h4><?php echo e($house->property_company); ?></h4></div>
						</div>
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>物业费</h4></div>
							<div class="mui-col-xs-8"><h4><?php echo e($house->property_fee); ?></h4></div>
						</div>
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>采暖方式</h4></div>
							<div class="mui-col-xs-8"><h4><?php echo e($house->heating); ?></h4></div>
						</div>
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>空调类型</h4></div>
							<div class="mui-col-xs-8"><h4><?php echo e($house->air_conditioner); ?></h4></div>
						</div>
						<div class="mui-row">
							<div class="mui-col-xs-4"><h4>电梯数量</h4></div>
							<div class="mui-col-xs-8"><h4><?php echo e($house->elevator_num); ?></h4></div>
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
                    <?php if($house->house_feature[0] !== ''): ?>
                        <div class="mui-col-xs-3">
                            <h5><?php echo e($house->house_feature[0]); ?></h5>
                        </div>
                    <?php endif; ?>
                    <?php if($house->house_feature[1] !== ''): ?>
                        <div class="mui-col-xs-3">
                            <h5><?php echo e($house->house_feature[1]); ?></h5>
                        </div>
                    <?php endif; ?>
                    <?php if($house->house_feature[2] !== ''): ?>
                        <div class="mui-col-xs-3">
                            <h5><?php echo e($house->house_feature[2]); ?></h5>
                        </div>
                    <?php endif; ?>
				</div>
			</div>
				<div id="VueBottomBox">
			<!--4交通及周边配套-->
				<div class="periphery">
					<div class="top">
					<h3>交通及周边配套</h3>
				</div>
					<div>
						<div id="secondmap">
							<baidu-map :zoom="14" class="map" style="display: flex;height:100%; flex-direction: column" :center='{"lng": <?php echo e($house->gps[0]); ?>, "lat": <?php echo e($house->gps[1]); ?> }'>
								<bm-view style="width: 100%; height:100%; flex: 1"></bm-view>
								<bm-marker :position='{"lng": <?php echo e($house->gps[0]); ?>, "lat": <?php echo e($house->gps[1]); ?> }'>
									<bm-label content="<?php echo e($house->building_name); ?>" :labelStyle="{color: 'red', fontSize : '24px'}" :offset="{width: -35, height: 30}"/>
								</bm-marker>
							</baidu-map>
						</div>
					</div>
					<a href="/get_map/<?php echo e($house->building_id); ?>" style="display: block;width: 100%;">
						<img style="display: block;width: 100%;" src="<?php echo e(res('/we_img/house_detail_suppert.png')); ?>" id="tomap" alt="" />
					</a>
				</div>
				<!--5最下推荐-->
				<house-detail-list :api='2' building ='<?php echo e($house->id); ?>' title="为你推荐" style="margin-bottom:65px;"></house-detail-list>
				<!-- 预约看房弹框 -->
			</div>
				<div class="mui-backdrop js_closes" id="backdrop" style="display: none">
					<div id="popover" class="mui-popover mui-active" style="z-index:10;">
						<div>
							<h4>预约信息</h4>
							<div>
								<span style="font-size:20px;" class="js_closes">
									×
								</span>
							</div>
						</div>
						<div>
							<form>
								<input type="text" id="names" placeholder="称谓" />
								<input type="tel" id="tel" placeholder="电话" />
							</form>
						</div>
						<div>
							<button type="button" id="upload" class="mui-btn mui-btn-primary">提交</button>
						</div>
					</div>
				</div>
				<footer id="footer" class="mui-row">
					<?php if(empty(session('user'))): ?>
						<div class="collect mui-col-xs-2">
							<a href="/logins/create?house_id=<?php echo e($house->id); ?>">
								<img src="<?php echo e(res('/we_img/detail_collect.png')); ?>" id="collect1"><span>收藏</span>
							</a>
						</div>
					<?php else: ?>
						<div class="collect mui-col-xs-2 js_collect pointer">
							
							<img src="<?php echo e(res('/we_img/detail_collect.png')); ?>" <?php if($house->collection): ?> class="mui-hidden" <?php endif; ?> id="collect1">
							<img src="<?php echo e(res('/we_img/detail_colletc1.png')); ?>" <?php if(!$house->collection): ?> class="mui-hidden" <?php endif; ?>  id="collect2">
							
							<span>收藏</span>
						</div>
					<?php endif; ?>

					<div class="mui-col-xs-4" id="free">
						<a href="tel:4000-580-888" onclick="auditToServer('房源详情')">
							<img src="/we_img/detail_free.png" class="freebtn">
						</a>
					</div>
					<div class="mui-col-xs-4" onclick="backdropShow()">
						<img src="<?php echo e(res('/we_img/detail_order.png')); ?>" class="freebtn">
					</div>
				</footer>
			</div>
		</div>
    </div>
</div>
<script src="<?php echo e(res('/js/we_house_detail.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('we.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>