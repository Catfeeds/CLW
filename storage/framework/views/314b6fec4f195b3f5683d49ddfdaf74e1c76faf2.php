<?php $__env->startSection('title', '楚楼网'); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href=<?php echo e(res("/css/we_home.css")); ?>>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="mui-content">
        <div class="swiper-container" id="swiperBanner">
            <!-- 轮播图 -->
            <div class="swiper-wrapper" id="VueBanner">
                <div class="swiper-slide">
                    <a href="#"><img src="<?php echo e(res('/we_img/temp_index_1.png')); ?>" /></a>
                </div>
            </div>
            <!-- 如果需要分页器 -->
            <!-- <div class="swiper-pagination"></div> -->
        </div>

        <div class="main-content">
            <!-- 分类按钮 -->
            <div class="index_buttonList" id='VueServerList'>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="buttonList">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="buttonItem">
                            <span>
                              <a href="<?php if($item['name']==='全部'): ?><?php echo e(url('/servers')); ?><?php else: ?><?php echo e(url('/servers').'/'.$item['id']); ?><?php endif; ?>">
                                <img src="<?php echo e($item['icon']); ?>" />
                                <div><?php echo e($item['name']); ?></div>
                              </a>
                            </span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- 滚动广播 -->
            <div class="broadcast-box">
                <div class="img-box"><img src="<?php echo e(res('/we_img/index_broadcast.svg')); ?>" alt="小喇叭"></div>
                <div class="swiper-box">
                    <div class="swiper-container" id="swiperBroadcast">
                        <div class="swiper-wrapper" id="VueBroadcast">
                            <?php $__currentLoopData = $systemNotices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <a href="#"><?php echo e($item->title); ?></a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 精品推荐 -->
            <div class="index_title">精品推荐</div>
            <!-- 精品推荐列表 -->
            <div class="indexSideslip">
                <div class="qualityList" id="VueQualityList">
                    <?php $__currentLoopData = $recommends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="/recommends/<?php echo e($item->id); ?>" class="qualityItem">
                    <img src="<?php echo e($item->pic_cn); ?>">
                    <div class="quality-text">
                        <div class="quality-title"><?php echo e($item->title); ?></div>
                        <div class="quality-describe"><?php echo e($item->introduce); ?></div>
                    </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <!-- 投放房源 -->
            <div class="launchHouse-box">
                <div class="launchHouse-content">
                    <img src="<?php echo e(res('/we_img/index_launchHouse.jpg')); ?>">
                    <div class="launchHouse-form">
                        <form>
                            <div class="input-box">
                                <input id="telInput" type="text" placeholder="请输入您的手机号"/>
                            </div>
                            <div class="btn-box">
                                <button type="button" class="mui-btn mui-btn-primary" id="addBook">立即体验</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- 推荐服务 -->
            <div class="index_title">推荐服务</div>

            <!-- 推荐服务大 -->
            <div id="VueintroServer">
                <?php if(!empty($serviceRecommends['first'])): ?>
                <div class="index-serverFirst">
                    <a href="<?php echo e(url('/servers').'/'.$serviceRecommends['first']['service_id']); ?>">
                    <img src="<?php echo e($serviceRecommends['first']['pic_cn']); ?>" alt="">
                    </a>
                </div>
                <?php endif; ?>
                <!-- 推荐服务列表 -->
                <div class="indexSideslip">
                    <div class="serverList">
                        <?php if(!empty($serviceRecommends['second'])): ?>
                            <?php $__currentLoopData = $serviceRecommends['second']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="serverItem" href="<?php echo e(url('/servers').'/'.$item['service_id']); ?>">
                                    <img src="<?php echo e($item['pic_cn']); ?>" alt="">
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if(count($hotBlocks) === 5): ?>
            <!-- 热门商圈 -->
            <div class="hot-block" id="VueHotBlock" v-if='list.length >= 5'>
                <div class="index_title">热门商圈</div>
                <div class="hot-block-box">
                    <a href='/buildings?condition={"area_id":<?php echo e($hotBlocks[0]->block->area_id); ?>,"block_id":<?php echo e($hotBlocks[0]->block_id); ?>}' class="hot-1">
                        <img src="<?php echo e($hotBlocks[0]->img_cn); ?>">
                    </a>
                    <ul>
                        <li class="display-flex">
                            <a href='/buildings?condition={"area_id":<?php echo e($hotBlocks[1]->block->area_id); ?>,"block_id":<?php echo e($hotBlocks[1]->block_id); ?>}' >
                            <img src="<?php echo e($hotBlocks[1]->img_cn); ?>">
                            </a>
                            <a href='/buildings?condition={"area_id":<?php echo e($hotBlocks[2]->block->area_id); ?>,"block_id":<?php echo e($hotBlocks[2]->block_id); ?>}' >
                            <img src="<?php echo e($hotBlocks[2]->img_cn); ?>">
                            </a>
                        </li>
                        <li class="display-flex">
                            <a href='/buildings?condition={"area_id":<?php echo e($hotBlocks[3]->block->area_id); ?>,"block_id":<?php echo e($hotBlocks[3]->block_id); ?>}'>
                            <img src="<?php echo e($hotBlocks[3]->img_cn); ?>">
                            </a>
                            <a href='/buildings?condition={"area_id":<?php echo e($hotBlocks[4]->block->area_id); ?>,"block_id":<?php echo e($hotBlocks[4]->block_id); ?>}' >
                            <img src="<?php echo e($hotBlocks[4]->img_cn); ?>">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
            <!-- 写字楼推荐 -->
            <div class="index_title">写字楼推荐</div>
            <div class="indexSideslip">
                <div class="buildingList">
                    <?php $__currentLoopData = $buildingRecommends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class='buildingItem' href="/buildings/<?php echo e($item->building_id); ?>" >
                    <img src="<?php echo e($item->img_cn); ?>" alt="">
                    <div class="building-text">
                        <div class="building-title"><?php echo e($item->building_name); ?></div>
                        <div class="building-describe"><img src="<?php echo e(res('/we_img/index_positon.png')); ?>" alt=""><?php echo e($item->address_cn); ?></div>
                    </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="area-title">
                区域
            </div>
            <div class="area-list">
                <a href="/buildings">全部</a>
                <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href='/buildings?condition={"area_id":<?php echo e($item->id); ?>}'><?php echo e(strchr($item->name, "区", true)); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="better">猜你喜欢</div>
            
            <input id="listAppData" type="hidden" value="<?php echo e(json_encode($buildings)); ?>">
            <div class="guessList">
                <div id="listApp">
                    <building-list position-img='<?php echo e(res('/we_img/index_positon.png')); ?>' good-img='<?php echo e(res('/we_img/index_good.png')); ?>' :list='list'></building-list>
                    <div class="more" v-if="getData" @click='getMore'>
                        <button>查看更多</button>
                    </div>
                    <div class="more" v-if="!getData && status">
                        <div type="button" class="loading"><i class="mui-icon mui-icon-spinner-cycle mui-spin"></i>正在加载 ...</div>
                    </div>
                    <div class="more" v-if="prompt">没有更多数据了</div>
                </div>
            </div>
        </div>
        <!-- 委托投放弹窗 -->
        <div class="mui-backdrop" id="backdrop" style="display: none">
            <div id="popover" class="mui-popover bookHouse mui-active">
                <div class="book-box">
                    <div class="title">请选择你所需要的服务</div>
                    <div class="book-contentBox">
                        <div class="img-box">
                            <div><img id="lookForHouse" src="<?php echo e(res('/we_img/index_lookForHouse.png')); ?>" alt=""></div>
                            <div><img id="peltHouse" src="<?php echo e(res('/we_img/index_pletHouse.png')); ?>" class="right" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- 电话 -->
        
        <!-- 底部导航 -->
        <?php echo $__env->make('we.tab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <script src=<?php echo e(res("/js/we_home.js")); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('we.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>