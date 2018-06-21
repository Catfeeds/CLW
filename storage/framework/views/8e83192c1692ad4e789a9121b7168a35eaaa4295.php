<?php $__env->startSection('title', '楚楼网'); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(res('/css/we_user_index.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="mui-content" style="background-color: #ffffff;">
    <div class="header">
      <img src="<?php echo e(res('/we_img/user_index_personal.jpg')); ?>">
      <div class="picture" id="picture">
        <img src="<?php echo e(res('/we_img/user_index_head.png')); ?>">
        <h5 id="tel"><?php echo e(session('user')->tel); ?></h5>
      </div>
    </div>
    <div class="main-content" style="background-color: #ffffff;">
      <div class="top mui-row">
        <!-- 委托找房 -->
        <a href="/user_find_house" id="entrust" class="mui-col-xs-3 entrust">
          <div>
            <img src="<?php echo e(res('/we_img/user_index_entrust.png')); ?>">
            <h5>委托找房</h5>
          </div>
        </a>
        <!-- 投放房源 -->
        <a href="/user_house_resources"  id="launch" class="mui-col-xs-5 entrust">
          <div>
            <div class="mui-row">
              <div class="border mui-col-xs-1"></div>
              <div class="mui-col-xs-10">
                <img src="<?php echo e(res('/we_img/user_index_launch.png')); ?>">
                <h5>投放房源</h5>
              </div>
              <div class="border mui-col-xs-1"></div>
            </div>
          </div>
        </a>
        <!-- 浏览记录 -->
        <a href="/browse_records" id="browse" class="mui-col-xs-3 entrust">
          <div>
            <img src="/we_img/user_index_browse.png">
            <h5>浏览记录</h5>
          </div>
        </a>
      </div>
      <!-- 我的收藏 -->
      <a href="/collections">
      <div class="collection" id="collection">
        <span>我的收藏</span><span class="mui-pull-right"><img src="<?php echo e(res('/we_img/house_detail_drop_down.png')); ?>"></span>
      </div>
      </a>
      <!-- 电话咨询 -->
      <a href="tel:4000-580-888" onclick="auditToServer('个人中心')">
        <div class="userList" id="consult">
          <span>电话咨询</span>
          <span class="mui-pull-right"><span>4000-580-888</span><img src="<?php echo e(res('/we_img/house_detail_drop_down.png')); ?>">
         </span>
        </div>
      </a>
      <!-- 关于我们 -->
      <a href="/user_about_us">
        <div class="userList" id="aboutUs">
          <span>关于我们</span><span class="mui-pull-right"><img src="<?php echo e(res('/we_img/house_detail_drop_down.png')); ?>"></span>
        </div>
      </a>
      <!-- 个人设置 -->
      <a href="/user_setting">
        <div class="userList" id="setting">
          <span>个人设置</span><span class="mui-pull-right"><img src="<?php echo e(res('/we_img/house_detail_drop_down.png')); ?>"></span>
        </div>
      </a>
    </div>
    <!-- 底部导航 -->
        <?php echo $__env->make('we.tab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
  <script src="<?php echo e(res('/js/we_user_index.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('we.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>