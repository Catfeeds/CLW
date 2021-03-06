@extends('we.layout')
@section('title', '服务列表')
@section('header')
    <link rel="stylesheet" href="{{res('/css/we_user_revise_phone2.css')}}">
@endsection
@section('body')
  <div class="mui-content">
    <!-- 进度条 -->
    <div class="mui-row progress">
      <div class="mui-col-xs-5 original">1.验证原号码</div>
      <div class="mui-col-xs-2"><img src="{{res('/we_img/house_detail_drop_down.png')}}"></div>
      <div class="mui-col-xs-5 binding">2.绑定新手机</div>
    </div>
    <div class="first">
      <div class="getSms">
        <div class="tel"><input type="tel" id="tel" value="" placeholder="请输入手机号"></div>
        <div class="sms">
          <a href="#" class="mui-pull-right" id="getSms">发送验证码</a>
          <a href="#" class="mui-pull-right mui-hidden" id="time"></a>
        </div>
      </div>
      <div class="setSms">
        <input type="tel" id="sms" value="" placeholder="请输入验证码">
      </div>
    </div>
    <div class="loginOut">
        <button type="button">提交</button>
    </div>
  </div>
  <script src="{{res('/js/we_user_revise_phone2.js')}}"></script>
@endsection