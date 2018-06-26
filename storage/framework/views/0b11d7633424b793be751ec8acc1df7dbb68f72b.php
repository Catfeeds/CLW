<?php $__env->startSection('title', $res->name); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="/css/we_serve_detail.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div>
        <footer id="footer" class="mui-row">
            <div class="collect mui-col-xs-6" style="text-align: center;">
                <img src="https://upload.chulouwang.com/Fskst8Zv9Hp78Z0loIoFj8-RF0QA">
                <span style="font-size: 20px;">4000-580-888</span>
            </div>
            <div class="mui-col-xs-6" id="free" style="text-align: center; margin-left: 10px">
                <a href="tel:4000-580-888">
                    <button id="btn_reservation" type="button" class="mui-btn mui-btn-primary" style="width: 180px; height: 48px; font-size:18px ">立即预约</button>
                </a>
            </div>
        </footer>
        <div style="margin-bottom: 64px;">
            <?php $__currentLoopData = $res->detail_url; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span style="display: flex; flex-direction: column;"><img style="width: 100%;" src="<?php echo e($img); ?>"></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('we.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>