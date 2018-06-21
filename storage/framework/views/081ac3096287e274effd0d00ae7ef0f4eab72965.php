<?php $__env->startSection('title', '楚楼网'); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="/css/we_login_new.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div id="content" class="mui-content">
        <div class="login">
            账号密码登录
        </div>
        <form class="mui-input-group">
            <div class="mui-input-row marTop">
                <input name="tel" class="mui-numbox-input" id="tel" value="" type="tel" placeholder="请输入手机号">
            </div>
            <div class="mui-input-row marTop pwd">
                <input name="password" id="password" value="" type="password" placeholder="请输入密码">
                <a href="/forget_pwd" class="mui-pull-right">忘记密码?</a>
            </div>
            <div class="loginBtn">
                <button type="button">登录</button>
            </div>
        </form>
        <div class="shortcut">
            <a href="<?php echo e(url('/quick_login_view')); ?>">手机快捷登录</a>
            <a href="<?php echo e(url('/registers/create')); ?>" id="register">注册</a>
        </div>
        <!-- 第三方登录 -->
        <!-- <div class="other">
          <div class="dotted"></div>
          <span>第三方登录</span>
          <div class="weChat"><img src="/we_img/login_wechat.png"></div>
        </div> -->
        <div class="agree">
            <span>注册/登录即代表同意《</span><a href="/user_agreement">楚楼网用户使用协议</a><span>》</span>
        </div>
    </div>
    <script src="/js/we_login_new.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('we.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>