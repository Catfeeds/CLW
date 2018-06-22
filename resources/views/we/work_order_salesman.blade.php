<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
    <link rel="shortcut icon" href="{{res('/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    {{--<meta name="tel" content="{{ $tel }}"/>--}}
    <meta name="tel" content="15807290654"/>
    <title>楚楼网</title>
    <link rel="stylesheet" href="{{res('/css/we_work.css')}}">
    <script src="{{res('/js/we_manifest.js')}}"></script>
    <script src="{{res('/js/we_vendor.js')}}"></script>
</head>
<body>
<div id="app">
    <mt-navbar v-model="selected">
        <mt-tab-item id="1">待确定</mt-tab-item>
        <mt-tab-item id="2">已确定</mt-tab-item>
    </mt-navbar>
    <!-- tab-container -->
    <mt-tab-container v-model="selected">
            <mt-tab-container-item id="1">
                <mt-loadmore :top-method="unloadTop" @top-status-change="unhandleTopChange" ref="unloadmore">
                <div v-infinite-scroll="getUnList"
                    infinite-scroll-disabled="pulldown1"
                    infinite-scroll-distance="10">
                    <div v-for="(item, index) in unsalesman" :key="index">
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
                            <div class="f-1 jus-start"><span>分配时间: </span><span>@{{item.created_at}}</span></div>
                            <mt-button size="small" type="primary" plain @click="sheet(item.id,index)">确定</mt-button>
                        </div>
                    </div>
                </div>
                </mt-loadmore>
                <div slot="top" class="mint-loadmore-top">
                    <span v-show="topStatus !== 'loading'&&unsalesman.length!==0" :class="{ 'rotate': topStatus === 'drop' }">↓</span>
                    <span v-show="topStatus === 'loading'">Loading...</span>
                </div>
            </mt-tab-container-item>
        <mt-tab-container-item id="2">
            <mt-loadmore :top-method="loadTop" @top-status-change="handleTopChange" ref="loadmore">
                <div v-infinite-scroll="getList"
                     infinite-scroll-disabled="pulldown2"
                     infinite-scroll-distance="100">
                    <div v-for="(item,index) in salesman" :key="index">
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
                            <div v-if="item.entry">
                                <img src="/we_img/work_confirm.png">
                                <div class="text">已录入系统</div>
                            </div>
                            <div v-else>
                                <img src="/we_img/work_unconfirm.png">
                                <div class="text">未录入系统</div>
                            </div>
                        </div>
                    </div>
                </div>
            </mt-loadmore>
            <div slot="top" class="mint-loadmore-top">
                <span v-show="untopStatus !== 'loading'&&salesman.length!==0" :class="{ 'rotate': untopStatus === 'drop' }">↓</span>
                <span v-show="untopStatus === 'loading'">Loading...</span>
            </div>
        </mt-tab-container-item>
    </mt-tab-container>
    <div slot="top" class="mint-loadmore-top">
        <span v-show="topStatus !== 'loading'" :class="{ 'rotate': topStatus === 'drop' }">↓</span>
        <span v-show="topStatus === 'loading'">Loading...</span>
    </div>
</div>
<script src="{{res('/js/we_work_order_salesman.js')}}"></script>
</body>
</html>