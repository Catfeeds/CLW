<?php $__env->startSection('title', '楚楼网-注册账号'); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="/css/we_register.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <header class="mui-bar mui-bar-transparent">
        <span class="mui-title">注册账号</span>
    </header>
    <div class="mui-content">
        <form class="mui-input-group">
            <div class="mui-input-row marTop phone">
                <input type="tel" id="tel" class="mui-numbox-input" placeholder="请输入手机号">
                <a href="#" class="mui-pull-right" id="getSms">获取验证码</a>
                <a href="#" class="mui-pull-right" id="time"></a>
            </div>
            <div class="mui-input-row marTop">
                <input type="tel" id="sms" placeholder="请输入验证码">
            </div>
            <div class="mui-input-row marTop">
                <input type="password" id="password" placeholder="请设置登录密码">
            </div>
            <div class="loginBtn">
                <button type="button">立即登录</button>
            </div>
        </form>
    </div>
    <script src="/js/we_register.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('we.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>