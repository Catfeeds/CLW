<?php $__env->startSection('title', '服务列表'); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(res('/css/we_serve_index.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="mui-content">
        <div class="banner" id='VueServerList'>
            <img style="width: 100%;" src="https://upload.chulouwang.com/Fk7wZGD2B7xeQwLdoI4LrGNYen20">
        </div>
        <div id="serveListlVue" class="essential">
            <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="title">
                    <div class="border"></div>
                    <div class="nav"><?php echo e($items->name); ?></div>
                </div>
                <div class="list">
                    <div class="first mui-row">
                        <?php $__currentLoopData = $items->service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mui-col-xs-3" style="margin-bottom: 18px">
                                <a href="<?php echo e(url('/servers').'/'.$ite->id); ?>"> <img src="<?php echo e($ite->list_icon_url); ?>"><h5><?php echo e($ite->name); ?></h5></a>
                            </div>      
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php if(!$loop->last): ?>
                    <div class="finance"></div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <a href="tel:4000-580-888" onclick="auditToServer('服务首页')">
            <div style="position: fixed;bottom: 70px;right: 15px;z-index: 1000;">
                <img src="/we_img/button.png" style="width: 46px;">
            </div>
        </a>
        <!-- 底部导航 -->
        <?php echo $__env->make('we.tab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('we.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>