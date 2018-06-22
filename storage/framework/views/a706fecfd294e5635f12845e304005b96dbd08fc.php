<?php $__env->startSection('title', '楚楼网-精选楼盘'); ?>
<?php $__env->startSection('header'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <input type="hidden" id="listAppData" value="<?php echo e(json_encode($data)); ?>" />
    <div id="app">
        <div class="main-content">
            <building-list position-img='/we_img/index_positon.png' good-img='/we_img/index_good.png' :list='list'></building-list>
        </div>
    </div>
    <script src="<?php echo e(res('/js/we_recommed.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('we.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>