@extends('we.layout')
@section('title', '楚楼网-注册账号')
@section('header')
    <link rel="stylesheet" href="{{res('/css/we_register.css')}}">
@endsection
@section('body')
    <div class="mui-content" id="app">
        <form class="mui-input-group">
            <div class="mui-input-row marTop phone">
                <input type="tel" id="tel" class="mui-numbox-input" placeholder="请输入手机号">
                <a href="#"  class="mui-pull-right" id="getSms">获取验证码</a>
            </div>
            <div class="mui-input-row marTop">
                <input type="tel" v-model="sms" id="sms" placeholder="请输入验证码">
            </div>
            <div class="mui-input-row marTop">
                <input type="password" id="password" placeholder="请设置登录密码">
            </div>
            <div class="loginBtn">
                <button type="button" id="submit">立即登录</button>
            </div>
        </form>
    </div>
    <script src="{{res('/js/we_register.js')}}"></script>
@endsection