@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="{{res('/css/we_user_index.css')}}">
@endsection
@section('body')
<div class="mui-content" style="background-color: #ffffff;">
    <div class="header">
      <img src="{{res('/we_img/user_index_personal.jpg')}}">
      <div class="picture" id="picture">
        <img src="{{res('/we_img/user_index_head.png')}}">
        <h5 id="tel">{{session('user')->tel}}</h5>
      </div>
    </div>
    <div class="main-content" style="background-color: #ffffff;">
      <div class="top mui-row">
        <!-- 委托找房 -->
        <a href="/user_find_house" id="entrust" class="mui-col-xs-3 entrust">
          <div>
            <img src="{{res('/we_img/user_index_entrust.png')}}">
            <h5>委托找房</h5>
          </div>
        </a>
        <!-- 投放房源 -->
        <a href="/user_house_resources"  id="launch" class="mui-col-xs-5 entrust">
          <div>
            <div class="mui-row">
              <div class="border mui-col-xs-1"></div>
              <div class="mui-col-xs-10">
                <img src="{{res('/we_img/user_index_launch.png')}}">
                <h5>投放房源</h5>
              </div>
              <div class="border mui-col-xs-1"></div>
            </div>
          </div>
        </a>
        <!-- 浏览记录 -->
        <a href="/browse_records" id="browse" class="mui-col-xs-3 entrust">
          <div>
            <img src="{{res('/we_img/user_index_browse.png')}}">
            <h5>浏览器记录</h5>
          </div>
        </a>
      </div>
      <!-- 我的收藏 -->
      <a href="/collections">
      <div class="collection" id="collection">
        <span>我的收藏</span><span class="mui-pull-right"><img src="{{res('/we_img/house_detail_drop_down.png')}}"></span>
      </div>
      </a>
      <!-- 电话咨询 -->
      <a href="tel:4000-580-888">
        <div class="userList" id="consult">
          <span>电话咨询</span>
          <span class="mui-pull-right"><span>4000-580-888</span><img src="{{res('/we_img/house_detail_drop_down.png')}}">
         </span>
        </div>
      </a>
      <!-- 关于我们 -->
      <a href="/user_about_us">
        <div class="userList" id="aboutUs">
          <span>关于我们</span><span class="mui-pull-right"><img src="{{res('/we_img/house_detail_drop_down.png')}}"></span>
        </div>
      </a>
      <!-- 个人设置 -->
      <a href="/user_setting">
        <div class="userList" id="setting">
          <span>个人设置</span><span class="mui-pull-right"><img src="{{res('/we_img/house_detail_drop_down.png')}}"></span>
        </div>
      </a>
    </div>
    <!-- 底部导航 -->
        @include('we.tab')
  </div>
  <script src="{{res('/js/we_user_index.js')}}"></script>
@endsection