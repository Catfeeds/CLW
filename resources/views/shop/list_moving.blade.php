@extends('shop.layout.layout')
@section('title', '搬家服务')
@section('header')
  <link rel="stylesheet" href="/css/shop_list_moving.css">
@endsection
@section('body')
  @include('shop.header')
  @include('shop.layout.move')
  @include('home.footer')
@endsection
@section('script')
@endsection