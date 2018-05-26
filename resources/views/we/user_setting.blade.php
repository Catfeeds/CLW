@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="{{res('/css/we_user_setting.css')}}">
@endsection
@section('body')
    <div class="mui-content">
        <a href="/old_tel_validate_view">
            <div class="telNumber" id="reviseTel">
                <span>手机号码</span>
                <span class="mui-pull-right">
                    <span id="tel">{{session('user')->tel}}</span>
                    <img src="{{res('/we_img/house_detail_drop_down.png')}}">
                </span>
            </div>
        </a>
        <a href="/revise_password">
            <div class="telNumber" id="revisePwd"><span>修改密码</span><span class="mui-pull-right"><img src="{{res('/we_img/house_detail_drop_down.png')}}" ></span></div>
        </a>
        <div class="loginOut">
            <button type="button">退出登录</button>
        </div>
    </div>
    <script src="{{res('/js/we_user_setting.js')}}"></script>
@endsection