@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="/css/login_password.css">
@endsection
@section('body')
    <header class="mui-bar mui-bar-transparent">
        <a class="mui-action-back mui-pull-left"><img src="../images/login_back.png" style="width:10px;height:18px;margin-top:12px;"></a>
        <span class="mui-title">找回密码</span>
    </header>
    <div class="mui-content">
        <form class="mui-input-group">
            <div class="mui-input-row marTop phone">
                <input type="tel" id="tel" class="mui-numbox-input" placeholder="请输入手机号">
                <a href="#" class="mui-pull-right" id="getSms">获取验证码</a>
                <a href="#" class="mui-pull-right" id="time"></a>
            </div>
            <div class="mui-input-row marTop">
                <input type="tel" id="sms" placeholder="请输入验证码">
            </div>
            <div class="mui-input-row marTop">
                <input type="password" id="password" placeholder="请输入新密码">
            </div>
            <div class="loginBtn">
                <button type="button">确认</button>
            </div>
        </form>
    </div>
    <script src="/js/login_password.js"></script>
@endsection