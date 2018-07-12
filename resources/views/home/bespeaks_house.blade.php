@extends('home.layouts.layout')
@section('title', '委托房源')
@section('header')
  <link rel="stylesheet" href="{{homeRes('/css/home_sellhouse.css')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
  <style>

  </style>
@endsection
@section('body')
  @include('home.nav')
  <div class="box" style="background-image:url('/home_img/sellhouse_background.jpg');background-position:center;background-size:cover;width:100%;height:100%;">
    <div class="container">
      <div class="title">楚楼网帮您找房!</div>
      <div class="min_title">一键委托,轻松快捷</div>
      <div class="form_container">
        <form id="commentForm">
          <div class="connect">
            <span>*</span>联系人
          </div>
          <div class="content">
            <input name="appellation" type="text" placeholder="联系人姓名"/>
          </div>
          <div class="phone">
            <span>*</span>联系电话
          </div>
          <div class="content">
            <input name="tel" type="text" placeholder="联系人手机号">
          </div>
          <div class="need">需求描述</div>
          <textarea name="demand" id="need" cols="20" placeholder="如:大智路附近,200平米的写字楼,简装带办公家具,租金50元左右/平米每月,有地铁最好..."></textarea>
          <button type="submit">立即委托</button>
        </form>
      </div>
      <div class="detail">
        <ul>
          <li><img src="{{homeRes('/home_img/sellhouse_submit.png')}}" /><div>提交委托</div><img src="homeRes('/home_img/sell_arrow.png')}}" alt="" class="arrow"></li>
          <li><img src="{{homeRes('/home_img/sellhouse_guest.png')}}" /><div>客户回访</div><img src="homeRes('/home_img/sell_arrow.png')}}" alt="" class="arrow"></li>
          <li><img src="{{homeRes('/home_img/sellhouse_perfomer.png')}}" /><div>专业服务</div><img src="homeRes('/home_img/sell_arrow.png')}}" alt="" class="arrow"></li>
          <li><img src="{{homeRes('/home_img/sellhouse_house.png')}}" /><div>实地看房</div></li>
        </ul>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script src="{{homeRes('/js/home_sellhouse.js')}}"></script>
@endsection