@extends('home.layouts.layout')
@section('title', '金融支持')
@section('header')
    <link rel="stylesheet" href="/css/shop_finance.css">
@endsection
@section('body')
  @include('shop.header')
  @include('shop.layout.nav')
  <div class="finance_container">
    <div class="banner"></div>
    <div class="serves">
      <div class="title">服务内容</div>
      <div class="border"></div>
      <div class="serves_des">
        为个人和小微企业提供更加安全、高效、低成本的金融服务，优秀的管理团队和资源整合优势为客户提供<br>
        更低利率、更具价值的贷款产品，满足企业不同程度的资金需求。
      </div>
      <div class="items">        
        <div class="item">
          <img src="/shop_img/finance_serve1.jpg" alt="">
          <div class="item_des">
            <div class="item_title">信用贷款</div>
            <div class="item_name">有打卡工资</div>
          </div>
          
        </div>
        <div class="item">
          <img src="/shop_img/finance_serve2.jpg" alt="">
          <div class="item_des">
            <div class="item_title">房产押贷款</div>
            <div class="item_name">有房</div>
          </div>
          
        </div>
        <div class="item">
          <img src="/shop_img/finance_serve3.jpg" alt="">
          <div class="item_des">
            <div class="item_title">汽车押贷</div>
            <div class="item_name">有车</div>
          </div>
          
        </div>
        <div class="item">
          <img src="/shop_img/finance_serve4.jpg" alt="">
          <div class="item_des">
            <div class="item_title">企业贷款</div>
            <div class="item_name">企业主</div>
          </div>
        </div>
      </div>
    </div>
    <div class="us_talent">
      <div class="title">为什么选择我们</div>
      <div class="border"></div>
      <div class="img_box">
        <img src="/shop_img/finance_talent.jpg" alt="">
      </div>
    </div>
  </div>  
  <div class="footer_banner" style="text-align:center;border-top:1px solid #ededed">
    <img src="/shop_img/index_better.jpg" alt="">
  </div>
  @include('home.footer')
@endsection
@section('script')
@endsection