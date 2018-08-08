@extends('home.layouts.layout')
@section('title', '豪车租赁')
@section('header')
    <link rel="stylesheet" href="/css/shop_rent_car.css">
@endsection
@section('body')
    @include('shop.header')
    <div class="rentCar_container">
      <div class="banner"></div>
      <div class="details">
        <div class="details_box">
          <div class="detail clearfix">
            <div class="detail_img f_l">
              <img src="/shop_img/car_detail1.png" alt="">
            </div>
            <div class="detail_des f_l">
              <div class="name">行业最低价</div>
              <div class="des">
                以低于行业30%的价格<br>
                享受高品质租车服务
              </div>
            </div>
          </div>
          <div class="detail clearfix">
            <div class="detail_img f_l">
              <img src="/shop_img/car_detail2.png" alt="">
            </div>
            <div class="detail_des f_l">
              <div class="name">安心驾驶</div>
              <div class="des">
                所有汽车都经过严格筛选<br> 
                且签署安全保障协议和保险
              </div>
            </div>
          </div>
          <div class="detail clearfix">
            <div class="detail_img f_l">
              <img src="/shop_img/car_detail3.png" alt="">
            </div>
            <div class="detail_des f_l">
              <div class="name">简单快捷</div>
              <div class="des">
                简单快捷，您可在20分钟<br>
                内就能获得爱车和使用权
              </div>
            </div>
          </div>
        </div>
        <div class="model"><span>车型 </span>/MODEL</div>
        <div class="border"></div>
        <div class="brand">
          <img src="/shop_img/car_brand.png" alt="">
        </div>
      </div>
      <div class="recommend"></div>
      <div class="promise"> </div>
    </div>
    @include('home.footer')
@endsection
@section('script')
@endsection