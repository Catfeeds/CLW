@extends('home.layouts.layout')
@section('title', '登录页面')
<link rel="stylesheet" href="/css/home_login.css">
@section('header')
@section('body')
  <div class="container">
    <div class="header"></div>
    <div class="login_container">
      <div class="form_box">
        <div class="title">用户登录</div>
        <form action="/login" method="POST" id="login_form">
          <input type="text" placeholder="用户名称/手机号" id="username" name="username"/>
          <input type="password" placeholder="请输入密码" id="password" name="password" />
          <button class="login_btn" name="login_btn">登录</button>
        </form>
        <div class="others">
            <a href="{{url('/register')}}" class="forget">忘记密码</a>
            <a href="{{url('/register')}}" class="register">新用户注册</a>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script src="/js/home_login.js"></script>
@endsection