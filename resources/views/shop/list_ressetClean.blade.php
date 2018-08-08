@extends('shop.layout.layout')
@section('title', '开荒保洁列表')
@section('header')
    <link rel="stylesheet" href="/css/shop_list_ressetClean.css">
@endsection
@section('body')
  @include('shop.header')
  @include('shop.layout.list_clean_common')
  <div id="appoint">
    <appoint></appoint>
  </div>
  <div class="footer_banner" style="text-align:center">
    <img src="/shop_img/index_better.jpg" alt="">
  </div>
  @include('home.footer')
@endsection
@section('script')
<script src="/js/shop_list_ressetClean.js"></script>
@endsection