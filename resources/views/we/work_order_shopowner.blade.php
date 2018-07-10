<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
    <link rel="shortcut icon" href="{{res('/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="safeString" content="{{ $safeString }}"/>
    <meta name="tel" content="{{ $tel }}"/>
    <title>楚楼网</title>
    <link rel="stylesheet" href="{{res('/css/we_work.css')}}">
    <script src="{{res('/js/we_manifest.js')}}"></script>
    <script src="{{res('/js/we_vendor.js')}}"></script>
</head>
<body>
<div id="app">
    <mt-navbar v-model="selected">
        <mt-tab-item id="1">待处理</mt-tab-item>
        <mt-tab-item id="2">已处理</mt-tab-item>
    </mt-navbar>
    <!-- tab-container -->
    <mt-tab-container v-model="selected">
        <mt-tab-container-item id="1">
            <mt-loadmore :top-method="unloadTop" @top-status-change="unhandleTopChange" ref="unloadmore">
                <div v-infinite-scroll="getUnList"
                     infinite-scroll-disabled="pulldown1"
                     infinite-scroll-distance="100">
                    <div v-for="(item, index) in unshopkowner" :key="index">
                        <div class="main">
                            <div class="list-header">
                                <div class="f-1 jus-start"><span>工单号: </span><span> @{{item.identifier}}</span></div>
                            </div>
                            <div class="list-body">
                                <div class="one"><span>需求:</span><span> @{{item.demand_cn}}</span></div>
                                <div><span>姓名:</span><span> @{{item.name}}</span></div>
                                <div><span>电话:</span><span> @{{item.tel}}</span></div>
                                <div><span>内容:</span><span> @{{item.position}}</span></div>
                            </div>
                        </div>
                        <div class="list-bottom">
                            <div class="f-1 jus-start"><span>录入时间: </span><span>@{{item.created_at}}</span></div>
                            <button class="button" @click="sheet(item.id, index)">分配</button>
                        </div>
                    </div>
                </div>
            </mt-loadmore>
            <div slot="top" class="mint-loadmore-top">
                <span v-show="pulldown1">再无更多</span>
                {{--<span v-show="topStatus !== 'loading'&&unshopkowner.length!==0" :class="{ 'rotate': topStatus === 'drop' }">↓</span>--}}
                <span v-show="topStatus === 'loading'">Loading...</span>
            </div>
        </mt-tab-container-item>
        <mt-tab-container-item id="2">
            <mt-loadmore :top-method="loadTop" @top-status-change="handleTopChange" ref="loadmore">
            <div v-infinite-scroll="getList"
                 infinite-scroll-disabled="pulldown2"
                 infinite-scroll-distance="100">
                <div v-for="(item, index) in shopkowner" :key="index">
                    <div class="main">
                        <div class="list-header">
                            <div class="f-1 jus-start"><span>工单号: </span><span> @{{item.identifier}}</span></div>
                            <div class="f-1 jus-end" style="font-weight:normal"><img src="/we_img/work_people.png">分配给业务员 @{{ item.staff }}</div>
                        </div>
                        <div class="list-body">
                            <div class="one"><span>需求:</span><span> @{{item.demand_cn}}</span></div>
                            <div><span>姓名:</span><span> @{{item.name}}</span></div>
                            <div><span>电话:</span><span> @{{item.tel}}</span></div>
                            <div><span>内容:</span><span> @{{item.position}}</span></div>
                        </div>
                    </div>
                    <div class="list-bottom">
                        <div class="f-1 jus-start"><span>录入时间: </span><span>@{{item.created_at}}</span></div>
                        <div v-if="item.determine === 2">
                            <img style="left: 305px" src="/we_img/work_confirm.png">
                            <div class="text">已确定</div>
                        </div>
                        <div v-if="item.determine === 1">
                            <img style="left: 305px" src="/we_img/work_unknow.png">
                            <div class="text">未确定</div>
                        </div>
                        <div v-if="item.determine === 3">
                            <img style="left: 305px" src="/we_img/work_confirm.png">
                            <div class="text">已反馈</div>
                        </div>
                    </div>
                </div>
            </div>
            </mt-loadmore>
            <div slot="top" class="mint-loadmore-top">
                {{--<span v-show="untopStatus !== 'loading'&&shopkowner.length!==0" :class="{ 'rotate': untopStatus === 'drop' }">↓</span>--}}
                <span v-show="untopStatus === 'loading'">Loading...</span>
            </div>
        </mt-tab-container-item>
    </mt-tab-container>
    <mt-actionsheet
            :actions="actions"
            v-model="sheetVisible">
    </mt-actionsheet>
</div>
<script src="{{res('/js/we_work_order_shopowner.js')}}"></script>
</body>
</html>
