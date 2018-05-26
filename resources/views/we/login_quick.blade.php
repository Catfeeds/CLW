@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="/css/we_login_quick.css">
@endsection
@section('body')
<div class="mui-content">
    <div class="login">
      手机快捷登录
    </div>
    <form class="mui-input-group">
      <div class="mui-input-row marTop phone">
        <input type="number" id="tel" class="mui-numbox-input" placeholder="请输入手机号">
        <a href="#" class="mui-pull-right" id="getSms">获取验证码</a>
      </div>
      <div class="mui-input-row marTop">
        <input type="tel" id="sms" placeholder="请输入验证码">
      </div>
      <div class="loginBtn">
        <button type="button">登录</button>
      </div>
    </form>
    <div class="shortcut">
      <a href="/logins/create">账号密码登录</a>
      <a href="/registers/create" id="register">注册</a>
    </div>
    <!-- <div class="other">
      <div class="dotted"></div>
      <span>第三方登录</span>
      <div class="weChat"><img src="../images/login_wechat.png"></div>
    </div> -->
    <div class="agree" id="agree">
      <span>注册/登录即代表同意《</span><a href="user_agreement">楚楼网用户使用协议</a><span>》</span>
    </div>
  </div>
<script src="/js/we_login_quick.js"></script>
@endsection