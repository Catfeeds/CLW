@extends('shop.layout.layout')
@section('title', '办公家具详情')
@section('header')
  <link rel="stylesheet" href="/css/shop_soon.css">
@endsection
@section('body')
  @include('shop.header')
  <div class="nothing">
    <div class="notPic">
      <img src="/shop_img/coming_soon.jpg" alt="">
    </div>
  </div>
  @include('home.footer')
@endsection
@section('script')
@endsection