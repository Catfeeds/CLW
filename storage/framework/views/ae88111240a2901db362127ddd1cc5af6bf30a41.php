<div id="alltab" style="display:flex;position:fixed;justify-content:space-around;background:white;height:49px;z-index:300;bottom:0;
        width:100%;padding:8px 0 7px 0;border-top:1px solid #f4f4f4;">
    <a class="tabs" style="text-align:center" href="/">
        <?php if(Request::segment(1) !== null): ?><img src="<?php echo e(res('/we_img/tab1.png')); ?>" style="height:20px;margin-bottom:-4px;"><?php endif; ?>
        <?php if(Request::segment(1) == null): ?><img src="<?php echo e(res('/we_img/tab1_active.png')); ?>" style="height:20px;margin-bottom:-4px;"><?php endif; ?>
        <?php if(Request::segment(1) !== null): ?><div style="font-size:10px;color:#333333;">首页</div><?php endif; ?>
        <?php if(Request::segment(1) == null): ?><div style="font-size:10px;color:#276FFB;">首页</div><?php endif; ?>
    </a>
    <a class="tabs" style="text-align:center" href="/buildings">
        <?php if(Request::segment(1) !== 'buildings'): ?><img src="<?php echo e(res('/we_img/tab2.png')); ?>" style="height:20px;margin-bottom:-4px;"><?php endif; ?>
        <?php if(Request::segment(1) == "buildings"): ?><img src="<?php echo e(res('/we_img/tab2_active.png')); ?>" style="height:20px;margin-bottom:-4px;"><?php endif; ?>
        <?php if(Request::segment(1) !== 'buildings'): ?><div style="font-size:10px;color:#333333;">找房</div><?php endif; ?>
        <?php if(Request::segment(1) == 'buildings'): ?><div style="font-size:10px;color:#276FFB;">找房</div><?php endif; ?>
    </a>
    <a class="tabs" style="text-align:center" href="/servers">
        <?php if(Request::segment(1) !== 'servers'): ?><img src="<?php echo e(res('/we_img/tab3.png')); ?>" style="height:20px;margin-bottom:-4px;"><?php endif; ?>
        <?php if(Request::segment(1) == 'servers'): ?><img src="<?php echo e(res('/we_img/tab3_active.png')); ?>" style="height:20px;margin-bottom:-4px;"><?php endif; ?>
        <?php if(Request::segment(1) !== 'servers'): ?><div style="font-size:10px;color:#333333;">服务</div><?php endif; ?>
        <?php if(Request::segment(1) == 'servers'): ?><div style="font-size:10px;color:#276FFB;">服务</div><?php endif; ?>
    </a>
    <a class="tabs" style="text-align:center" href="/user">
        <?php if(Request::segment(1) !== 'user'): ?><img src="<?php echo e(res('/we_img/tab4.png')); ?>" style="height:20px;margin-bottom:-4px;" ><?php endif; ?>
        <?php if(Request::segment(1) == 'user'): ?><img src="<?php echo e(res('/we_img/tab4_active.png')); ?>" style="height:20px;margin-bottom:-4px;"><?php endif; ?>
        <?php if(Request::segment(1) !== 'user'): ?><div style="font-size:10px;color:#333333;">我的</div><?php endif; ?>
        <?php if(Request::segment(1) == 'user'): ?><div style="font-size:10px;color:#276FFB;">我的</div><?php endif; ?>
    </a>
</div>