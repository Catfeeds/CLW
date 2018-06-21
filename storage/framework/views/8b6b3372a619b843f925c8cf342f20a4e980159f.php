<?php $__env->startSection('title', '楚楼网'); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="/css/we_building_index.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <input id="pageOne" value="<?php echo e(json_encode($data)); ?>" type="hidden"/>
    <input id="request" value="<?php echo e(json_encode($req)); ?>" type="hidden">
    <div id="buildingList">
        <header id="header" class="mui-bar mui-bar-nav">
            <div class="select-box">
                <building-select ref='buildingSelect' @flush-data='changeData'></building-select>
            </div>
        </header>
        <div class="main-content">
            <building-list position-img='/we_img/index_positon.png' good-img='/we_img/index_good.png' :list='list'></building-list>
            <?php if(!$data['data']->count()): ?>
                <div class="nothing" v-if="noDataShow">
                    <img src="/we_img/nothing.png">
                    <div style="color: #666">很抱歉，暂无匹配的房源</div>
                    <form>
                        <div class="input-box">
                            <input id="telInput" type="text" placeholder="请输入手机号"/>
                        </div>
                        <div class="btn-box">
                            <button type="button" class="mui-btn mui-btn-primary" id="addBook" @touchend='findHouse'>委托找房</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
            <div class="more" v-if="getData" @touchend='getMore'>
                <button type="button">查看更多</button>
            </div>
            <div class="more" v-if="!getData && status">
                <div class="loading">
                    <i class="mui-icon mui-icon-spinner-cycle mui-spin"></i> 正在加载 ...
                </div>
            </div>
            <div class="more" v-if="status">没有更多数据了</div>
        </div>
    </div>
    <!-- 底部导航 -->
        <?php echo $__env->make('we.tab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script src="/js/we_building_index.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('we.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>