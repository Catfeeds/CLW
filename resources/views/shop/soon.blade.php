@extends('shop.layout.layout')
@section('title', '办公家具详情')
@section('header')
  <link rel="stylesheet" href="{{shopRes('/css/shop_soon.css')}}">
@endsection
@section('body')
  @include('shop.header')
  <div class="nothing">
    <div class="notPic">
      <img src="{{shopRes('/shop_img/coming_soon.jpg')}}" alt="">
    </div>
  </div>
  @include('shop.footer')
@endsection
@section('script')
@endsection