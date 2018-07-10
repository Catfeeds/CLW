@extends('home.layouts.layout')
@section('title', '投放房源')
@section('header')
  <link rel="stylesheet" href="/css/home_launchouse.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
  <style>

  </style>
@endsection
@section('body')
  @include('home.nav')
  <div class="box" style="width:100%;background-image:url('/home_img/sellhouse_back.jpg');background-position:center;background-size:cover">
    <div class="container">
      <div class="title">楚楼网帮您出租!</div>
      <div class="min_title">海量客源,快速成交</div>z
      <div class="form_container" style="margin-bottom:63px;">
        <form id="commentForm">
          <div class="connect">
            <span>*</span>联系人
          </div>
          <div class="content">
            <input name="appellation" type="text" placeholder="联系人姓名"/>
          </div>
          <div class="phone">
            <span>*</span>联系电话
          </div>
          <div class="content">
            <input name="tel" type="text" placeholder="联系人手机号">
          </div>
          <div class="connect">
            <span>*</span>投放写字楼
          </div>
          <div class="content">
            <div class="area">
              <select placeholder="区域">
                {{--<option value="1">asd</option>--}}
              </select>
              <select placeholder="商圈">
                {{--<option value="1">asd</option>--}}
              </select>
            </div>
            <div>
              <input name="tel" type="text" placeholder="写字楼名称">
            </div>
          </div>
          <button type="submit">提交房源</button>
        </form>
      </div>
      <div class="detail">
        <ul>
          <li><img src="/home_img/sellhouse_submit.png" /><div>提交委托</div><img src="/home_img/sell_arrow.png" alt="" class="arrow"></li>
          <li><img src="/home_img/collect_info.png" style="padding-top:6px"/><div>采集房源信息</div><img src="/home_img/sell_arrow.png" alt="" class="arrow"></li>
          <li><img src="/home_img/vistor_home.png" style="padding-top:1px"/><div>上门实勘</div><img src="/home_img/sell_arrow.png" alt="" class="arrow"></li>
          <li><img src="/home_img/spread.png" /><div>线上推广</div></li>
        </ul>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script src="/js/home_launchouse.js"></script>
@endsection