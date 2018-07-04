@extends('home.layouts.layout')
@section('title', '登录页面')
  <link rel="stylesheet" href="/css/home_register.css">
@section('header')
@section('body')
  <div class="register_container">
    <div class="title">新用户注册</div>
    <form action="" method="POST">
      <label for="username"><input type="text" id="username" name="username" placeholder="设置用户名称"/></label>
      <label for="phone"><input type="text" id="phone" name="phone" placeholder="输入手机号码"/></label>
      <label for="confirm"><input type="text" id="confirm" name="confirm" placeholder="短信验证码"/></label>
      <label for="password"><input type="password" id="password" name="password" placeholder="设置6-20位的登录密码"/></label>
      <label for="confirm_password"><input type="password" id="confirm_password" name="confirm_password" placeholder="请再次输入登录密码"/></label>
      <div class="agree"><input type="checkbox" class="checkbox" id="checkbox"><label for="checkbox">已阅读并同意《<span>用户服务协议</span>》</label></div>
    </form>
  </div>
@endsection
@section('script')

@endsection