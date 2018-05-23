@extends('we.layout')
@section('title', '服务列表')
@section('header')
    <link rel="stylesheet" href="/css/we_user_revise_phone1.css">
@endsection
@section('body')
  <div class="mui-content">
    <!-- 进度条 -->
    <div class="mui-row progress">
      <div class="mui-col-xs-5 original">1.验证原号码</div>
      <div class="mui-col-xs-2"><img src="/we_img/house_detail_drop_down.png"></div>
      <div class="mui-col-xs-5">2.绑定新手机</div>
    </div>
    <div class="first">
      <div class="getSms" id="sms">
        <div class="tel"></div>
        <div class="sms">
          <a href="#" class="mui-pull-right" id="getSms">发送验证码</a>
          <a href="#" class="mui-pull-right mui-hidden" id="time"></a>
        </div>
      </div>
      <div class="setSms">
        <input type="tel" id="setSms" value="" placeholder="请输入验证码">
      </div>
    </div>
    <div class="loginOut">
        <button type="button">下一步</button>
    </div>
  </div>
@endsection