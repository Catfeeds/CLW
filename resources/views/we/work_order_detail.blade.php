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
    <link rel="stylesheet" href="{{res('/css/we_work_order_detail.css')}}">
    <script src="{{res('/js/we_manifest.js')}}"></script>
    <script src="{{res('/js/we_vendor.js')}}"></script>
</head>
<body>
<div id="detail-body">
  <div class="detail-title">工单详情</div>
  <div class="detail-info">
    <div class="detail-row">
      <span class="detail-row-title">工单编号</span><span>：</span>
      <span class="detail-color">gd20180718073</span>
    </div>
    <div class="detail-row">
      <span class="detail-row-title">开始时间</span><span>：</span>
      <span class="detail-color">2017-04-01-8：00</span>
    </div>
    <div class="detail-row">
      <span class="detail-row-title">工单类型</span><span>：</span>
      <span class="detail-color">投放房源</span>
    </div>
    <div class="detail-row">
      <span class="detail-row-title">区域</span><span>：</span>
      <span class="detail-color">武昌区，汉口</span>
    </div>
    <div class="detail-row">
      <span class="detail-row-title">楼盘</span><span>：</span>
      <span class="detail-color">光谷软件园，世贸中心</span>
    </div>
    <div class="detail-row">
      <span class="detail-row-title">面积</span><span>：</span>
      <span class="detail-color">1000m²</span>
    </div>
    <div class="detail-row">
      <span class="detail-row-title">价格</span><span>：</span>
      <span class="detail-color">80-100 元/m²月</span>
    </div>
    <div class="detail-row">
      <span class="detail-row-title">需求详情</span><span>：</span>
      <span class="detail-remark">武汉主城区地铁口，200平方米，带办公家具，单独场地，整洁。</span>
    </div>
  </div>
  <div class="detail-concat">
    <div class="detail-name">
      <span class="detail-row-title">姓名</span><span>：</span>
      <span class="detail-color">易盼</span>
    </div>
    <div class="detail-phone">
      <span class="detail-row-title">手机号</span><span>：</span>
      <span class="detail-phone-color">17508642013</span>
    </div>
  </div>
  <div class="detail-choice">
    <div class="detail-choice-agent" @click="isShow">选择经纪人<i class="el-icon-arrow-down"></i></div>
    <div class="detail-confirm" @click="confirm">确认分配</div>
  </div>
  <div class="detail-title">工单进度</div>
  <div class="detail-step">
    <el-steps direction="vertical" :active="1" space="50px">
      <el-step>
        <div slot="icon"></div>
        <div slot="title">明天去看客户的房子(雷洋-汉街店-经纪人）</div>
        <div slot="description">2017-04-01 12:00:00</div>
      </el-step>
      <el-step>
        <div slot="icon"></div>
        <div slot="title">明天去看客户的房子(雷洋-汉街店-经纪人）</div>
        <div slot="description">2017-04-01 12:00:00</div>
      </el-step>
      <el-step>
        <div slot="icon"></div>
        <div slot="title">明天去看客户的房子(雷洋-汉街店-经纪人）</div>
        <div slot="description">2017-04-01 12:00:00</div>
      </el-step>
    </el-steps>
  </div>
  <mt-actionsheet
    :actions="actions"
    v-model="sheetVisible">
  </mt-actionsheet>
</div>
<script src="{{res('/js/we_work_order_detail.js')}}"></script>
</body>
</html>