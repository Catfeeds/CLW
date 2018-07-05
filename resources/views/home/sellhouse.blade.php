@extends('home.layouts.layout')
@section('title', '投放房源')
@section('header')
  <link rel="stylesheet" href="/css/home_sellhouse.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
@endsection
@section('body')
  @include('home.nav')
  <div class="container">
    <div class="title">楚楼网帮您找房!</div>
    <div class="min_title">一键委托,轻松快捷</div>
    <div class="form_container">
      <form action="">
        <div class="connect">
          <span>*</span>联系人
        </div>
        <input type="text" placeholder="联系人姓名"/>
        <div class="phone">
          <span>*</span>联系电话
        </div>
        <input type="text" placeholder="联系人手机号">
        <div class="need">需求描述</div>
        <textarea name="" id="need" cols="20" placeholder="如:大智路附近,200平米的写字楼,简装带办公家具,租金50元左右/平米每月,有地铁最好..."></textarea>
        <button>立即委托</button>
      </form>
    </div>
    <div class="detail">
      <ul>
        <li><img src="/home_img/sellhouse_submit.png" /><div>提交委托</div></li>
        <li><img src="/home_img/sellhouse_guest.png" /><div>客户回访</div></li>
        <li><img src="/home_img/sellhouse_perfomer.png" /><div>专业服务</div></li>
        <li><img src="/home_img/sellhouse_house.png" /><div>实地看房</div></li>
      </ul>
    </div>
  </div>
@endsection
@section('script')
@endsection