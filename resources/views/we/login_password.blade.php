@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="{{res('/css/we_login_password.css')}}">
@endsection
@section('body')
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
    <script src="{{res('/js/we_login_password.js')}}"></script>
@endsection