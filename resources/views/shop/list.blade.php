@extends('home.layouts.layout')
@section('title', '商城列表页')
 <link rel="stylesheet" href="/css/shop_list.css">
@section('header')
@endsection
@section('body')
  <!-- 列表页盒子 -->
  <div class="list_container">
    <!-- 头部面包屑导航 -->
    <div class="">
      <a href="javascript:void(0)"><span>首页</span></a>
      <span>></span>
      <span>电脑设备</span>
    </div>
  </div>
  @include('home.footer')
@endsection
@section('script')
@endsection