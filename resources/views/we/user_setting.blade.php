@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="/css/we_user_setting.css">
@endsection
@section('body')
    <div class="mui-content">
        <div class="telNumber" id="reviseTel"><span>手机号码</span><a href="#" class="mui-pull-right"><span></span><img src="/we_img/house_detail_drop_down.png" ></a></div>
        <div class="telNumber" id="revisePwd"><span>修改密码</span><a href="#" class="mui-pull-right"><img src="/we_img/house_detail_drop_down.png" ></a></div>
        <div class="loginOut">
            <button type="button">退出登录</button>
        </div>
    </div>
@endsection