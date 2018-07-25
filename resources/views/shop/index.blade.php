@extends('home.layouts.layout')
@section('title', '首页')
@section('header')
 <link rel="stylesheet" href="/css/shop_index.css">
@endsection
@section('body')
  <div class="main">
    <!-- 轮播 -->
    <div class="swiper-container js_banner">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="swiperPic" style="background-image:url(/shop_img/banner.jpg)"></div>
        </div>
      </div>
    </div>
    <!-- 一站式快捷服务 -->
    <div class="service">
      <div class="head">一站式快捷服务</div>
      <div class="serviceList">
        <div class="finance">
          <div class="border"></div>
          <div class="up">
            <div class="title">工商财税</div>
            <div class="detail">快速注册 简单创业</div>
          </div>
          <div><img src="/shop_img/finance.jpg"></div>
        </div>
        <div class="decoration">
          <div class="up">
            <div class="title">企业服务</div>
            <div class="detail">全包服务 无增项</div>
          </div>
          <div><img src="/shop_img/decoration.jpg"></div>
        </div>
        <div class="furniture">
          <div class="up">
            <div class="title">办公家具</div>
            <div class="detail">款式多样 按需定制</div>
          </div>
          <div><img src="/shop_img/furniture.jpg"></div>
        </div>
        <div class="clean">
          <div class="up">
            <div class="title">入住服务</div>
            <div class="detail">日常开荒 专项保洁</div>
          </div>
          <div><img src="/shop_img/clean.jpg"></div>
        </div>
        <div class="equipment">
          <div class="up">
            <div class="title">办公设备</div>
            <div class="detail">租电脑 零押金</div>
          </div>
          <div><img src="/shop_img/equipment.jpg"></div>
        </div>
        <div class="plants">
          <div class="up">
            <div class="title">绿植摆租</div>
            <div class="detail">套餐单品 免费养护</div>
          </div>
          <div><img src="/shop_img/plants.jpg"></div>
        </div>
      </div>
    </div>
    <!-- 广告 -->
    <div class="advertisement"><img src="/shop_img/register.jpg" alt=""></div>
    <!-- 1F 工商财税-->
    <div class="firstFloor">
      <div class="nav">
        <div class="hexagon">
          <div class="left"></div>
          <div class="center"></div>
          <div class="right"></div>
        </div>
        <div class="floorNum">1F</div>
        <div class="floorTitle">工商财税</div>
      </div>
      <div>

      </div>
    </div>
    <!-- 2F 办公设备-->
    <div></div>
    <!-- 3F 入住服务 -->
    <div></div>
    <!-- 4F 办公家具 -->
    <div></div>
    <!-- 5F 装修服务 -->
    <div></div>
    <!-- 热销机型 -->
    <div></div>
    <!-- 热销绿植 -->
    <div></div>
  </div>
  @include('home.footer')
@endsection
@section('script')
@endsection