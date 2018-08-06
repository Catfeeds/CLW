@extends('shop.layout.layout')
@section('title', '日常保洁列表')
@section('header')
    <link rel="stylesheet" href="/css/shop_list_clean.css">
@endsection
@section('body')
  @include('shop.header')
  @include('shop.layout.list_clean_common')
  <div id="appoint">
    <appoint></appoint>
  </div>
  @include('home.footer')
@endsection
@section('script')
<script src="/js/shop_list_clean.js"></script>
@endsection