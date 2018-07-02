@extends('home.layouts.layout')
@section('title', '个人中心')
@section('header')
  <link rel="stylesheet" href="/css/home_personal.css">
  <link rel="stylesheet" href="/css/home_pagination.css">
@endsection
@section('body')
  <div class="personal">
    <div class="container clearfix">
      <div class="title">
        <div class="menu"><a href="javascript:void(0);">首页</a> > <a href="javascript:void(0);">消息通知</a></div>
      </div>
      <div class="left_container f_l">
        <div class="personal_login">
          <div class="personal_logo"></div>
          <a href="javascript:void(0);" class="login_btn">立即登录</a>
        </div>
        <div class="my_account">
          <h4 class="account_title">我的账户</h4>
          <div class="account_content">
            <div class="account_item">
              
            </div>
            <div class="account_item"></div>
            <div class="account_item"></div>
            <div class="account_item"></div>
            <div class="account_item"></div>
            <div class="account_item"></div>
            <div class="account_item"></div>
          </div>
        </div>
        <div class="help_center">
          <h4 class="help_title">帮助中心</h4>
          <div class="help_content">
            <div class="help_item"></div>
            <div class="help_item"></div>
          </div>
        </div>
      </div>
      <div class="right_container f_r">
        <div class="right_title">
          <ul class="clearfix">
            <li class="f_l">
              <a href="javascript:void(0);">活动消息</a>
            </li>
            <li class="f_l">
              <a href="javascript:void(0);">服务消息</a>
            </li>
            <li class="f_l">
              <a href="javascript:void(0);">系统消息</a>
            </li>
          </ul>
        </div>
        <div class="right_content clearfix">
          <!-- <div class="detail">
            <a href="javascript:void(0);">
              <div class="img_box">
                <img src="" alt="">
              </div>
              <h3 class="detail_name"></h3>
              <div class="detail_time"></div>
              <div class="detail_describe"></div>
            </a>
          </div> -->
        </div>
        <div class="pagination">
          <ul class="page" id="page"></ul>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="/js/home_personal.js"></script>
@endsection