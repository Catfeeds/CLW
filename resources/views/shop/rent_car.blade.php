@extends('shop.layout.layout')
@section('title', '豪车租赁')
@section('header')
    <link rel="stylesheet" href="/css/shop_rent_car.css">
@endsection
@section('body')
    @include('shop.header')
    @include('shop.layout.nav')
    <div class="rentCar_container" style="box-sizing:border-box">
      <div id="appointment">
        <appoint></appoint>
      </div>
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
        <div class="model"><span>车型 </span>/ MODEL</div>
        <div class="border"></div>
        <div class="brand">
          <img src="/shop_img/car_brand.png" alt="">
        </div>
      </div>
      <div class="recommend">
        <div class="title">
          <span>推荐车型 </span>/ MODELS
        </div>
        <div class="border"></div>
        <div class="options">
          <div class="option">
            <img src="/shop_img/car1.jpg" alt="">
            <div class="name">
              马自达MX-5
            </div>
          </div>
          <div class="option">
            <img src="/shop_img/car2.jpg" alt="">
            <div class="name">
              法拉利 458 Italia红色
            </div>
          </div>
          <div class="option">
            <img src="/shop_img/car3.jpg" alt="">
            <div class="name">
            兰博基尼 550-2
            </div>
          </div>
          <div class="option">
            <img src="/shop_img/car4.jpg" alt="">
            <div class="name">
              宾利添越
            </div>
          </div>
          <div class="option">
            <img src="/shop_img/car5.jpg" alt="">
            <div class="name">
              玛莎拉蒂GHIBLI（蓝色）
            </div>
          </div>
          <div class="option">
            <img src="/shop_img/car6.jpg" alt="">
            <div class="name">
              保时捷Panamera
            </div>
          </div>
        </div>
      </div>
      <div class="promise">
        <div class="title"><span>服务承诺 </span>/ SERVICE COMMITMENT</div>
        <div class="border"></div>
        <div class="promise_box clearfix">
          <div class="img_box f_l">
            <img src="/shop_img/car7.png" alt="">
          </div>
          <div class="promission f_l">
            1、客户租车相关问题，如客户不便来我公司办理，我公司可派相关专业人员上门提供服务。<br>
            2、司机礼貌热情。<br>
            3、车容干净整洁无异味，司机在驾驶过程中不吸烟及无不良行为。<br>
            4、司机主动给乘客开关车门，协助乘客上车，主动帮助乘客提拿行李，<br>
            并协助办理相关手续以及提供乘客感兴趣的信息等<br>
            5、司机不涉及乘客个人隐私和商业秘密，在不违反国家法律法规的前提下满足乘客的需求。<br>
            6、预约业务提前15分钟到达指定地点。<br>
            7、保持车容车况良好，符合客户租车目的。<br>
            8、网站调度全程监控，24小时值班，让您租车无忧。<br>
          </div>
        </div>
      </div>      
    </div>
    <div class="footer_banner" style="text-align:center;border-top:1px solid #ededed">
      <img src="/shop_img/index_better.jpg" alt="">
    </div>
    @include('shop.footer')
@endsection
@section('script')
  <script src="/js/shop_slideBar.js"></script>
@endsection