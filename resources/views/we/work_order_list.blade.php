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
  <mt-navbar v-model="selected" :fixed="isfixed">
    <mt-tab-item id="1">处理中</mt-tab-item>
    <mt-tab-item id="2">已关闭</mt-tab-item>
  </mt-navbar>
  <mt-tab-container v-model="selected">
  <mt-tab-container-item id="1">
    <mt-loadmore :top-method="loadTop" @top-status-change="handleTopChange" ref="loadmore">
      <div v-infinite-scroll="getDealList" infinite-scroll-disabled="pulldown1" infinite-scroll-distance="10">
        <div class="manage-list">
          <div class="manage-list-num">工单编号：GD20180718073</div>
          <div class="manage-list-info">
            <div class="manage-list-row">
              <span class="manage-list-row-title">开始时间</span><span>：</span>
              <span class="manage-list-color">2017-04-01-8：00</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">工单类型</span><span>：</span>
              <span class="manage-list-color">投放房源</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">区域</span><span>：</span>
              <span class="manage-list-color">武昌区，汉口</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">楼盘</span><span>：</span>
              <span class="manage-list-color">光谷软件园，世贸中心</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">面积</span><span>：</span>
              <span class="manage-list-color">1000 ㎡</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">价格</span><span>：</span>
              <span class="manage-list-color">80-100 元/m²月</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">需求详情</span><span>：</span>
              <span class="manage-list-remark">武汉主城区地铁口，200平方米，带办公家具，单独场地，整洁</span>
            </div>
          </div>
          <a href="{{url('/work_order_detail')}}"><div class="manage-list-detail"><span>工单详情</span><i class="el-icon-arrow-right"></i></div></a>
        </div>
        <div class="manage-list">
          <div class="manage-list-num">工单编号：GD20180718073</div>
          <div class="manage-list-info">
            <div class="manage-list-row">
              <span class="manage-list-row-title">开始时间</span><span>：</span>
              <span class="manage-list-color">2017-04-01-8：00</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">工单类型</span><span>：</span>
              <span class="manage-list-color">投放房源</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">区域</span><span>：</span>
              <span class="manage-list-color">武昌区，汉口</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">楼盘</span><span>：</span>
              <span class="manage-list-color">光谷软件园，世贸中心</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">面积</span><span>：</span>
              <span class="manage-list-color">1000 ㎡</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">价格</span><span>：</span>
              <span class="manage-list-color">80-100 元/m²月</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">需求详情</span><span>：</span>
              <span class="manage-list-remark">武汉主城区地铁口，200平方米，带办公家具，单独场地，整洁</span>
            </div>
          </div>
          <a href="{{url('/work_order_detail')}}"><div class="manage-list-detail"><span>工单详情</span><i class="el-icon-arrow-right"></i></div></a>
        </div>
      </div>
    </mt-loadmore>
    <div slot="top" class="mint-loadmore-top">
      <!-- <span v-show="topState !== 'loading'&&unsalesman.length!==0" :class="{ 'rotate': topState === 'drop' }">↓</span> -->
      <span v-show="topState === 'loading'">Loading...</span>
    </div>
  </mt-tab-container-item>
  <mt-tab-container-item id="2">
    <mt-loadmore :top-method="unLoadTop" @top-status-change="unHandleTopChange" ref="unLoadmore">
      <div v-infinite-scroll="getCloseList" infinite-scroll-disabled="pulldown2" infinite-scroll-distance="10">
        <div class="manage-list">
          <div class="manage-list-num">工单编号：GD20180718073</div>
          <div class="manage-list-info">
            <div class="manage-list-row">
              <span class="manage-list-row-title">开始时间</span><span>：</span>
              <span class="manage-list-color">2017-04-01-8：00</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">工单类型</span><span>：</span>
              <span class="manage-list-color">投放房源</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">区域</span><span>：</span>
              <span class="manage-list-color">武昌区，汉口</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">楼盘</span><span>：</span>
              <span class="manage-list-color">光谷软件园，世贸中心</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">面积</span><span>：</span>
              <span class="manage-list-color">1000 ㎡</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">价格</span><span>：</span>
              <span class="manage-list-color">80-100 元/m²月</span>
            </div>
            <div class="manage-list-row">
              <span class="manage-list-row-title">需求详情</span><span>：</span>
              <span class="manage-list-remark">武汉主城区地铁口，200平方米，带办公家具，单独场地，整洁</span>
            </div>
          </div>
          <a href="{{url('/work_order_detail')}}"><div class="manage-list-detail"><span>工单详情</span><i class="el-icon-arrow-right"></i></div></a>
        </div>
      </div>
    </mt-loadmore>
  </mt-tab-container-item>
</mt-tab-container>
</div>
<script src="{{res('/js/we_work_order_list.js')}}"></script>
</body>
</html>
