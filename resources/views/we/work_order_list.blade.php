<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
    <link rel="shortcut icon" href="{{res('/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="safeString" content="{{ $safeString }}"/>
    <title>分配工单</title>
    <link rel="stylesheet" href="{{res('/css/we_work_order_list.css')}}">
    <script src="{{res('/js/we_manifest.js')}}"></script>
    <script src="{{res('/js/we_vendor.js')}}"></script>
</head>
<body>
<div class="list-content">
  <div id="userGuid" style="display:none">{{$user_guid}}</div>
  <mt-navbar v-model="selected" :fixed="isfixed">
    <mt-tab-item id="1">处理中</mt-tab-item>
    <mt-tab-item id="2">已关闭</mt-tab-item>
  </mt-navbar>
  <mt-tab-container v-model="selected">
  <mt-tab-container-item id="1">
    <mt-loadmore :top-method="loadTop" @top-status-change="handleTopChange" ref="loadmore">
      <div v-infinite-scroll="getDealList" infinite-scroll-disabled="pulldown1" infinite-scroll-distance="10">
        <div class="manage-list" v-for="(item, index) in unshopkowner" :key="index">
          <div class="manage-list-num">工单编号：@{{item.gd_identifier}}</div>
          <div class="manage-list-info">
            <div class="manage-list-row">
              <span class="manage-list-row-title">开始时间</span><span>：</span>
              <span class="manage-list-color">@{{item.created_at}}</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">工单类型</span><span>：</span>
              <span class="manage-list-color">@{{item.demand}}</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">区域</span><span>：</span>
              <span class="manage-list-color">@{{item.area}}</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">楼盘</span><span>：</span>
              <span class="manage-list-color">@{{item.building}}</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">面积</span><span>：</span>
              <span class="manage-list-color">@{{item.acreage}}</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">价格</span><span>：</span>
              <span class="manage-list-color">@{{item.price}}</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">需求详情</span><span>：</span>
              <span class="manage-list-remark">@{{item.remark}}</span>
            </div>
          </div>
          
          <a :href="'work_orders/'+ item.guid + '?user_guid=' + userGuid"><div class="manage-list-detail"><span>工单详情</span><i class="el-icon-arrow-right"></i></div></a>
        </div>
      </div>
      <div style="text-align:center" v-if="pullMore"><span>已加载全部</span></div>
      <div v-else style="text-align:center">正在加载</div>
    </mt-loadmore>
  </mt-tab-container-item>
  <mt-tab-container-item id="2">
    <mt-loadmore :top-method="unLoadTop" @top-status-change="unHandleTopChange" ref="unloadmore">
      <div v-infinite-scroll="getCloseList" infinite-scroll-disabled="pulldown2" infinite-scroll-distance="10">
        <div class="manage-list" v-for="(item, index) in shopkowner" :key="index">
          <div class="manage-list-num">工单编号：@{{item.gd_identifier}}</div>
          <div class="manage-list-info">
            <div class="manage-list-row">
              <span class="manage-list-row-title">开始时间</span><span>：</span>
              <span class="manage-list-color">@{{item.created_at}}</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">工单类型</span><span>：</span>
              <span class="manage-list-color">@{{item.demand}}</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">区域</span><span>：</span>
              <span class="manage-list-color">@{{item.area}}</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">楼盘</span><span>：</span>
              <span class="manage-list-color">@{{item.building}}</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">面积</span><span>：</span>
              <span class="manage-list-color">@{{item.acreage}}</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">价格</span><span>：</span>
              <span class="manage-list-color">@{{item.price}}</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">需求详情</span><span>：</span>
              <span class="manage-list-remark">@{{item.remark}}</span>
            </div>
          </div>
          <a :href="'work_orders/'+ item.guid + '?user_guid=' + userGuid"><div class="manage-list-detail"><span>工单详情</span><i class="el-icon-arrow-right"></i></div></a>
        </div>
      </div>
      <div v-if="unPullMore" style="text-align:center"><span>已加载全部</span></div>
      <div v-else style="text-align:center">正在加载</div>
    </mt-loadmore>
  </mt-tab-container-item>
  <div slot="top" class="mint-loadmore-top" v-if="topState === 'loading'">
    <!-- <span v-show="topState !== 'loading'&&unsalesman.length!==0" :class="{ 'rotate': topState === 'drop' }">↓</span> -->
    <span>Loading...</span>
  </div>
</mt-tab-container>
</div>
<script src="{{res('/js/we_work_order_list.js')}}"></script>
</body>
</html>
