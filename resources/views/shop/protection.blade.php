@extends('home.layouts.layout')
@section('title', '商城列表页')
@section('header')
    <link rel="stylesheet" href="/css/shop_protection.css">
@endsection
@section('body')
    @include('shop.header')
    @include('shop.layout.indoor_protection')
    <div class="footer_banner" style="text-align:center;border-top:1px solid #ededed">
      <img src="/shop_img/index_better.jpg" alt="">
    </div>
    @include('home.footer')
@endsection
@section('script')
@endsection