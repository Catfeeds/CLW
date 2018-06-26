<?php $__env->startSection('title', '楚楼网'); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="/css/we_user_setting.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="mui-content">
        <div class="telNumber" id="reviseTel"><span>手机号码</span><a href="#" class="mui-pull-right"><span id="tel"><?php echo e(session('user')->tel); ?></span><img src="/we_img/house_detail_drop_down.png" ></a></div>
        <div class="telNumber" id="revisePwd"><span>修改密码</span><a href="#" class="mui-pull-right"><img src="/we_img/house_detail_drop_down.png" ></a></div>
        <div class="loginOut">
            <button type="button">退出登录</button>
        </div>
    </div>
    <script src="/js/we_user_setting.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('we.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>