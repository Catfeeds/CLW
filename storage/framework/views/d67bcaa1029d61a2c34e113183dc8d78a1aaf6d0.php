<?php $__env->startSection('title', '楚楼网'); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(res('/css/we_user_setting.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="mui-content">
        <a href="/old_tel_validate_view">
            <div class="telNumber" id="reviseTel">
                <span>手机号码</span>
                <span class="mui-pull-right">
                    <span id="tel"><?php echo e(session('user')->tel); ?></span>
                    <img src="<?php echo e(res('/we_img/house_detail_drop_down.png')); ?>">
                </span>
            </div>
        </a>
        <a href="/revise_password">
            <div class="telNumber" id="revisePwd"><span>修改密码</span><span class="mui-pull-right"><img src="<?php echo e(res('/we_img/house_detail_drop_down.png')); ?>" ></span></div>
        </a>
        <div class="loginOut">
            <button type="button">退出登录</button>
        </div>
    </div>
    <script src="<?php echo e(res('/js/we_user_setting.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('we.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>