@extends('shop.layout.layout')
@section('title', '小规模记账详情')
@section('header')
<link rel="stylesheet" href="/css/shop_list_charge.css">
@endsection
@section('body')
  @include('shop.header')
  <!-- 列表页盒子 -->
  @include('shop.layout.charge')
  @include('home.footer')
@endsection
@section('script')
<script src="/js/shop_list_charge.js"></script>
@endsection