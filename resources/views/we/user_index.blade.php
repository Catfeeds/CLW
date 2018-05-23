@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="/css/we_user_index.css">
@endsection
@section('body')
<div class="mui-content">
    <div class="header">
      <img src="/we_img/user_index_personal.jpg">
      <div class="picture" id="picture">
        <img src="/we_img/user_index_head.png">
        <h5 id="tel">182****2493</h5>
      </div>
    </div>
    <div class="main-content">
      <div class="top mui-row">
        <!-- 委托找房 -->
        <div id="entrust" class="mui-col-xs-3 entrust">
          <img src="/we_img/user_index_entrust.png">
          <h5>委托找房</h5>
        </div>
        <!-- 投放房源 -->
        <div id="launch" class="mui-col-xs-5 entrust">
          <div class="mui-row">
            <div class="border mui-col-xs-1"></div>
            <div class="mui-col-xs-10">
              <img src="/we_img/user_index_launch.png">
              <h5>投放房源</h5>
            </div>
            <div class="border mui-col-xs-1"></div>
          </div>
        </div>
        <!-- 浏览记录 -->
        <div id="browse" class="mui-col-xs-3 entrust">
          <img src="/we_img/user_index_browse.png">
          <h5>浏览器记录</h5>
        </div>
      </div>
      <!-- 我的收藏 -->
      <div class="collection" id="collection">
        <span>我的收藏</span><a href="#" class="mui-pull-right"><img src="/we_img/house_detail_drop_down.png"></a>
      </div>
      <!-- 电话咨询 -->
      <div class="userList" id="consult">
        <span>电话咨询</span><a href="#" class="mui-pull-right"><span>4000-580-888</span><img src="/we_img/house_detail_drop_down.png"></a>
      </div>
      <!-- 关于我们 -->
      <div class="userList" id="aboutUs">
        <span>关于我们</span><a href="#" class="mui-pull-right"><img src="/we_img/house_detail_drop_down.png"></a>
      </div>
      <!-- 个人设置 -->
      <div class="userList" id="setting">
        <span>个人设置</span><a href="#" class="mui-pull-right"><img src="/we_img/house_detail_drop_down.png"></a>
      </div>
    </div>
  </div>
@endsection