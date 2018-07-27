@extends('home.layouts.layout')
@section('title', '商城列表页')
@section('header')
<link rel="stylesheet" href="/css/shop_list_worktool.css">
@endsection
@section('body')
  <!-- 列表页盒子 -->
  <div class="list_container">
    @include('shop.layout.common_area')
    <!-- 商品展示区 -->
    <div class="list_details">
      <ul class="show_details">
        @foreach($plants as $plant)
          <li class="show_detail">
            <a href="{{$plant->details_url}}" class="detail_pic">
              <img src="{{$plant->img}}" alt="">
            </a>
            <div class="product_name">{{$plant->name}}</div>
            <div class="product_price"><span>{{$plant->price}}</span>{{$plant->unit}}</div>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
  @include('home.footer')
@endsection
@section('script')
@endsection