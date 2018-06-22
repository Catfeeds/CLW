<?php $__env->startSection('title', '浏览记录'); ?>   
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(res('/css/we_user_browsing_history.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <input id="pageOne" value="<?php echo e(json_encode($res)); ?>" type="hidden"/>
    <div id="pullrefresh">
        <div class="mui-content" id="houseList">
            <house-list good-img='https://upload.chulouwang.com/FkcZNG1e4fXBBG-OmybpERvfyTjC' :list='list'></house-list>
            <div class="more" v-if="getData">
                <button type="button">查看更多</button>
            </div>
            <div class="more" v-if="!getData && status">
                <div class="loading">
                    <i class="mui-icon mui-icon-spinner-cycle mui-spin"></i> 正在加载 ...
                </div>
            </div>
            <div id="nothing" style="color: #999;margin-top:60%;text-align:center">暂无浏览记录</div>
            <div class="more" v-if="prompt">没有更多数据了</div>
        </div>
    </div>
    <script src="<?php echo e(res('/js/we_user_brows_history.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('we.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>