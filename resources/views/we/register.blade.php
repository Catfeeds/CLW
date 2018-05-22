@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="/css/we_register.css">
@endsection
@section('body')
    <div class="mui-content" style="margin-top:0">
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
                <input type="password" id="password" placeholder="请设置登录密码">
            </div>
            <div class="loginBtn">
                <button type="button">立即登录</button>
            </div>
        </form>
    </div>
@endsection