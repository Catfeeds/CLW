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
  <div id="userGuid" style="display:none">{{$user_guid}}</div>
  <div id="gdGuid" style="display:none">{{$res['guid']}}</div>
  <div id="appellation" style="display:none">{{$appellation}}</div>
  <div id="demand" style="display:none">{{$res['demand']}}</div>
  <div class="detail-title"><span class="title">工单详情</span><a href="{{url('/work_orders?user_guid='.$user_guid)}}"><span class="order-list">工单列表</span></a></div>
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
      <a href="{{url('tel:'.$res['tel'])}}"><span class="detail-phone-color">{{$res['tel']}}</span></a>
    </div>
  </div>
  <!-- 分配工单 -->
  @if($res['distribution'])
  <div class="detail-choice">
    <div class="detail-choice-agent" @click="isShow"><span>选择经纪人</span><i class="el-icon-arrow-down"></i></div>
    <div class="detail-confirm" @click="confirm">确认分配</div>
  </div>
  @endif
  <!-- 确定工单 -->
  @if($res['determine'])
  <div class="detail-choice">
    <div class="detail-confirm" @click="confirmGet">确定收到工单</div>
  </div>
  @endif
  <!-- 处理工单 -->
  @if($res['operate'])
  <div class="detail-choice">
    <div class="detail-confirm" @click="operate">选择操作<i class="el-icon-arrow-down"></i></div>
  </div>
  @endif
  <div class="detail-title">工单进度</div>
  <div class="detail-step">
    <el-steps direction="vertical" :active="1">
      <el-step>
        <div slot="icon"></div>
        <div slot="title" style="line-height:25px;">测试测试测试测试测试测试测试测试测试测试测试测试</div>
        <div slot="description" style="margin-top:5px">2018-10-11</div>
      </el-step>
      <el-step>
        <div slot="icon"></div>
        <div slot="title" style="line-height:25px;">试测试测试测试测试试测试测试测试测试试测试测试测试测试测试测试测试测试测试</div>
        <div slot="description" style="margin-top:5px">2018-10-11</div>
      </el-step>
      <el-step>
        <div slot="icon"></div>
        <div slot="title" style="line-height:25px;">测试测试</div>
        <div slot="description" style="margin-top:5px">2018-10-11</div>
      </el-step>
      @foreach ($res['schedule'] as $item)
      <el-step>
        <div slot="icon"></div>
        <div slot="title" style="line-height:25px;">{{$item->content}}</div>
        <div slot="description" style="margin-top:5px">{{$item->created_at}}</div>
      </el-step>
      @endforeach
    </el-steps>
  </div>
  <mt-actionsheet
    :actions="actions"
    cancel-text=""
    v-model="sheetVisible">
  </mt-actionsheet>
  <mt-actionsheet
    :actions="actions2"
    cancel-text=""
    v-model="sheetVisible1">
  </mt-actionsheet>
</div>
<script src="{{res('/js/we_work_order_detail.js')}}"></script>
</body>
</html>
