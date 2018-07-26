@extends('home.layouts.layout')
@section('title', '商城列表页')
@section('header')
<link rel="stylesheet" href="/css/shop_list_worktool.css">
@endsection
@section('body')
  <!-- 列表页盒子 -->
  <div class="list_container">
    <!-- 头部面包屑导航 -->
    <div class="graybox top_link">
      <a href="{{url()->current()}}" class="home_page">首页</a>
      <span class="top_arrow">></span>
      <span class="current_page">{{$labelData['name']}}</span>
    </div>
    <!-- 筛选区域 -->
    <div class="select_area">
    @foreach($labelData['children'] as $labels)
      <!-- 类型筛选 -->
      <div class="select_option serve_select clearfix">
        <div class="select_title f_l">{{$labels['name']}}:</div>
        <ul class="select_details clearfix f_l">
          @foreach($labels['children'] as $label)
            <li class="f_l select_detail"><a class=" @if($label['status'])current @endif " href="{{$label['url']}}">{{$label['name']}}</a></li>
          @endforeach
        </ul>
      </div>
    @endforeach
    </div>
    <!-- 排序方式 -->
    <div class="graybox sort clearfix">
      <div class="sort_details f_l default_sort sort_current">
        <a href="javascript:void(0)">默认排序</a>
      </div>
      <div class="sort_details f_l price_sort">
        <a href="javascript:void(0)">价格由高到低</a>
      </div>
      <div class="sort_details f_l sell_sort">
        <a href="javascript:void(0)">销量由底到高</a>
      </div>
    </div>
    <!-- 商品展示区 -->
    <div class="list_details">
      <ul class="show_details">
        @foreach(['95.0','95.0','95.0','95.0','95.0','95.0','95.0','95.0'] as $per_price)
          <li class="show_detail">
            <a href="javascript:void(0)">
              <img src="/home_img/shop_plants.jpg" alt="">
            </a>
            <div class="product_name">Thinkpad T420 (14.1英寸 320G硬盘)</div>
            <div class="product_price"><span>{{$per_price}} </span>元/台/月</div>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
  @include('home.footer')
@endsection
@section('script')
@endsection