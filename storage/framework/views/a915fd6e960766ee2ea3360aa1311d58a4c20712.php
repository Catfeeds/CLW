<?php $__env->startSection('title', '我的收藏'); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="/css/we_user_browsing_history.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <input id="pageOne" value="<?php echo e(json_encode($res)); ?>" type="hidden"/>
    <div id="pullrefresh">
        <div class="mui-content" id="houseList">
            <house-list good-img='https://upload.chulouwang.com/FkcZNG1e4fXBBG-OmybpERvfyTjC' :list='list'></house-list>
            <div class="more">
                <button type="button">查看更多</button>
            </div>
        </div>
    </div>
    <script src="/js/we_user_collect.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('we.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>