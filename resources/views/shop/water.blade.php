@extends('home.layouts.layout')
@section('title', '桶装水')
@section('header')
    <link rel="stylesheet" href="/css/shop_water.css">
@endsection
@section('body')
    @include('shop.header')
    @include('shop.layout.mineral_water')
      <div class="footer_banner" style="text-align:center;border-top:1px solid #ededed">
        <img src="/shop_img/index_better.jpg" alt="">
      </div>
    @include('home.footer')
@endsection
@section('script')
@endsection