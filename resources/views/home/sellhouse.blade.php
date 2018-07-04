@extends('home.layouts.layout')
@section('title', '投放房源')
@section('header')
  <link rel="stylesheet" href="/css/home_sellhouse.css">
@endsection
@section('body')
  <div class="container">
    <div class="title">楚楼网帮您找房!</div>
    <div class="min_title">一键委托,轻松快捷</div>
    <div class="form_container">
      <form action="">
        <div class="connect">
          <span>*</span>联系人
        </div>
        <input type="text" placeholder=""/>
      </form>
    </div>
  </div>
@endsection
@section('script')
@endsection