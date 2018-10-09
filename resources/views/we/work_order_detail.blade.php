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
      <span class="detail-color">{{$res['gd_identifier']}}</span>
    </div>
    <div class="detail-row">
      <span class="detail-row-title">开始时间</span><span>：</span>
      <span class="detail-color">{{$res['created_at']}}</span>
    </div>
    <div class="detail-row">
      <span class="detail-row-title">工单类型</span><span>：</span>
      <span class="detail-color">{{$res['demand_cn']}}</span>
    </div>
    <div class="detail-row">
      <span class="detail-row-title">区域</span><span>：</span>
      <span class="detail-color">{{$res['area']}}</span>
    </div>
    <div class="detail-row">
      <span class="detail-row-title">楼盘</span><span>：</span>
      <span class="detail-color">{{$res['building']}}</span>
    </div>
    <div class="detail-row">
      <span class="detail-row-title">面积</span><span>：</span>
      <span class="detail-color">{{$res['acreage']}}</span>
    </div>
    <div class="detail-row">
      <span class="detail-row-title">价格</span><span>：</span>
      <span class="detail-color">{{$res['price']}}</span>
    </div>
    <div class="detail-row">
      <span class="detail-row-title">需求详情</span><span>：</span>
      <span class="detail-remark">{{$res['remark']}}</span>
    </div>
  </div>
  <div class="detail-concat">
    <div class="detail-name">
      <span class="detail-row-title">姓名</span><span>：</span>
      <span class="detail-color">{{$res['name']}}</span>
    </div>
    <div class="detail-phone">
      <span class="detail-row-title">手机号</span><span>：</span>
      <span class="detail-phone-color">{{$res['tel']}}</span>
    </div>
  </div>
  <!-- 分配工单 -->
  <div class="detail-choice">
    <div class="detail-choice-agent" @click="isShow">选择经纪人<i class="el-icon-arrow-down"></i></div>
    <div class="detail-confirm" @click="confirm">确认分配</div>
  </div>
  <!-- 确定工单 -->
  <!-- <div class="detail-choice">
    <div class="detail-confirm" @click="confirmGet">确定收到工单</div>
  </div> -->
  <!-- 处理工单 -->
  <!-- <div class="detail-choice">
    <div class="detail-confirm" @click="operate">选择操作<i class="el-icon-arrow-down"></i></div>
  </div> -->
  <div class="detail-title">工单进度</div>
  <div class="detail-step">
    <el-steps direction="vertical" :active="1" space="100px">
      @foreach ($res['schedule'] as $item)
      <el-step>
        <div slot="icon"></div>
        <div slot="title" style="line-height:25px;">{{$item->content}}</div>
        <div slot="description" style="margin-top:5px">{{$item->created_at}}</div>
      </el-step>
      @endforeach
      <!-- <el-step>
        <div slot="icon"></div>
        <div slot="title">明天去看客户的房子(<span class="agentStyle">雷洋-汉街店</span>-经纪人）</div>
        <div slot="description">2017-04-01 12:00:00</div>
      </el-step>
      <el-step>
        <div slot="icon"></div>
        <div slot="title">明天去看客户的房子(<span class="agentStyle">雷洋-汉街店</span>-经纪人）</div>
        <div slot="description">2017-04-01 12:00:00</div>
      </el-step> -->
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
