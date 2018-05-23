@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="/css/we_user_revise_password.css">
@endsection
@section('body')
  <div class="mui-content">
    <div class="mui-input-group">
      <!-- 旧密码 -->
      <div class="mui-input-row">
        <label>旧密码</label>
        <input type="password" id="oldPwd" placeholder="请输入旧密码">  
      </div>
      <!-- 电话 -->
      <div class="mui-input-row">
        <label>新密码</label>
        <input type="password" id="newPwd" placeholder="请输入新密码(6-20位数字或字母)">
      </div>
      <div class="mui-input-row">
        <label>确认密码</label>
        <input type="password" id="confirmPwd" placeholder="请再次输入新密码">
      </div>
    </div>
    <div class="loginOut">
        <button type="button">提交</button>
    </div>
  </div>
  <script src="/js/we_user_revise_password.js"></script>
@endsection
