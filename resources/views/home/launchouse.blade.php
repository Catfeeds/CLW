@extends('home.layouts.layout')
@section('title', '投放房源')
@section('header')
  <link rel="stylesheet" href="/css/home_launchouse.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>

  </style>
@endsection
@section('body')
  @include('home.nav')
  <div class="container">
    <div class="title">楚楼网帮您出租!</div>
    <div class="min_title">海量客源,快速成交</div>
    <div class="form_container">
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
        <li><img src="/home_img/sellhouse_submit.png" /><div>提交信息</div></li>
        <li><img src="/home_img/collect_info.png" /><div>采集房源信息</div></li>
        <li><img src="/home_img/visit.png" /><div>上门实勘</div></li>
        <li><img src="/home_img/spread.png" /><div>线上推广</div></li>
      </ul>
    </div>
  </div>
@endsection
@section('script')
  <script src="/js/home_launchouse.js"></script>
@endsection