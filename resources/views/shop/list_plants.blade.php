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
      <span class="current_page">绿植摆租</span>
    </div>
    <!-- 筛选区域 -->
    <div class="select_area">
      <!-- 类型筛选 -->
      <div class="select_option serve_select clearfix">
        <div class="select_title f_l">服务类别:</div>
        <ul class="select_details clearfix f_l">
          @foreach(['全部','绿植单品','绿植套餐','绿植养护'] as $serve)
            <li class="f_l select_detail"><a href="javascrpit:void(0)">{{$serve}}</a></li>
          @endforeach
        </ul>
      </div>
      <!-- 品牌筛选 -->
      <div class="select_option clearfix">
        <div class="select_title f_l">绿植功效</div>
        <ul class="select_details clearfix f_l">
          @foreach(['全部','美观','净化空气','净化甲醛'] as $price)
            <li class="f_l select_detail"><a href="javascrpit:void(0)">{{$price}}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="select_option price_select clearfix">
        <div class="select_title f_l">适合面积</div>
        <ul class="select_details clearfix f_l">
          @foreach(['全部','0-100','100-200','200以上'] as $price)
            <li class="f_l select_detail"><a href="javascrpit:void(0)">{{$price}}</a></li>
          @endforeach
        </ul>
      </div>
      <!-- 尺寸筛选 -->
      <div class="select_option size_select clearfix">
        <div class="select_title f_l">盆栽类型</div>
        <ul class="select_details clearfix f_l">
          @foreach(['全部','大型盆栽','中型盆栽','中型偏小盆栽','小型盆栽'] as $size)
            <li class="f_l select_detail"><a href="javascrpit:void(0)">{{$size}}</a></li>
          @endforeach
        </ul>
      </div>
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