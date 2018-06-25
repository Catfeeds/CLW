<?php $__env->startSection('title', '地图详情'); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(res('/css/we_map_controls.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <input id="build_id" value="<?php echo e(json_encode($data->gps)); ?>" hidden>
    <div id="Vuemap" style="height:100%;">
        <baidu-map :zoom="14" class="map" style="height:100%;" :center="center">
            <bm-control style="right: 0px;">
                <div class="map-btn-list" id="js_btnTap">
                    <div class="map-btn-item active" data-name="地铁">
                        <div class="img-box">
                            <img src="<?php echo e(res('/we_img/house_detail_suppert01.png')); ?>" alt="">
                        </div>
                        <div class="text-box">地铁</div>
                    </div>
                    <div class="map-btn-item" data-name="公交">
                        <div class="img-box">
                            <img src="<?php echo e(res('/we_img/house_detail_suppert02.png')); ?>" alt="">
                        </div>
                        <div class="text-box">公交</div>
                    </div>
                    <div class="map-btn-item" data-name="餐厅">
                        <div class="img-box">
                            <img src="<?php echo e(res('/we_img/house_detail_suppert03.png')); ?>" alt="">
                        </div>
                        <div class="text-box">餐厅</div>
                    </div>
                    <div class="map-btn-item" data-name="酒店">
                        <div class="img-box">
                            <img src="<?php echo e(res('/we_img/house_detail_suppert04.png')); ?>" alt="">
                        </div>
                        <div class="text-box">酒店</div>
                    </div>
                    <div class="map-btn-item" data-name="银行">
                        <div class="img-box">
                            <img src="<?php echo e(res('/we_img/house_detail_suppert05.png')); ?>" alt="">
                        </div>
                        <div class="text-box">银行</div>
                    </div>
                    <div class="map-btn-item" data-name="购物">
                        <div class="img-box">
                            <img src="<?php echo e(res('/we_img/house_detail_suppert06.png')); ?>" alt="">
                        </div>
                        <div class="text-box">购物</div>
                    </div>
                    <div class="map-btn-item" data-name="写字楼">
                        <div class="img-box">
                            <img src="<?php echo e(res('/we_img/house_detail_suppert07.png')); ?>" alt="">
                        </div>
                        <div class="text-box">写字楼</div>
                    </div>
                    <div class="map-btn-item" data-name="咖啡店" style="margin-bottom: 8px">
                        <div class="img-box">
                            <img src="<?php echo e(res('/we_img/house_detail_suppert08.png')); ?>" alt="">
                        </div>
                        <div class="text-box">咖啡店</div>
                    </div>
                </div>
            </bm-control>
            <bm-local-search :nearby="nearby" :keyword="keyword" :auto-viewport="true" selectFirstResult="true" :panel="false"></bm-local-search>
            <bm-marker :position="center" :dragging="true" animation="BMAP_ANIMATION_BOUNCE">
                <bm-label content="<?php echo e($data->name); ?>" :labelStyle="{color: 'red', fontSize : '24px'}" :offset="{width: -35, height: 30}"/>
            </bm-marker>
        </baidu-map>
    </div>
    <script src="<?php echo e(res('/js/we_map_detail.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('we.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>