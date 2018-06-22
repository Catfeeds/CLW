<?php $__env->startSection('title', '楚楼网'); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(res('/css/we_user_about_us.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
  <div class="mui-content">
    <div class="logo">
      <img src="<?php echo e(res('/we_img/user_logo.png')); ?>">
    </div>
    <div class="title">
      <div style="font-size:25px;">找写字楼，就找楚楼网</div>
      <div style="margin-top:40px;">客服热线：4000-580-888</div>
      <div>客服邮箱：service@chulouwang.com</div>
    </div>
    <div class="agreement">
      <a href="/user_agreement">《楚楼网用户协议》</a>
      <div>CopyRight @ 楚楼网2015-2017</div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('we.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>