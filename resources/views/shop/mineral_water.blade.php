@extends('shop.layout.layout')
@section('header')
    <link rel="stylesheet" href="{{shopRes('/css/shop_mineral_water.css')}}">
@endsection
@section('body')
    @include('shop.header')
    @include('shop.layout.servList')
    <div class="water_container">
        <div class="banner" style="background: url('{{shopRes('/shop_img/water_banner.jpg')}}') no-repeat center;"></div>
        <div class="describe" style="background: url('{{shopRes('/shop_img/water_des.jpg')}}') no-repeat center;">
          <div class="title clearfix">
            <img src="{{shopRes('/shop_img/water_band.jpg')}}" alt="" class="f_l">
            <div class="f_l">水中贵族</div>
          </div>
          <div class="water_introduce">
            一出生就注定属于水中贵族的景田天然山泉水，她时刻奉献着美<br>
            貌，贵气，品质，价值
          </div>
        </div>
        <div class="show">
          <div class="title">产品展示</div>
          <div class="products">
            <div class="product">
              <img src="{{shopRes('/shop_img/water_prod1.png')}}" alt="">
              <div class="pd_name">景田百岁山</div>
            </div>
            <div class="product">
              <img src="{{shopRes('/shop_img/water_prod2.png')}}" alt="">
              <div class="pd_name">景田一次性桶装水</div>
            </div>
            <div class="product">
              <img src="{{shopRes('/shop_img/water_prod3.png')}}" alt="">
              <div class="pd_name">景田纯净水</div>
            </div>
            <div class="product">
              <img src="{{shopRes('/shop_img/water_prod4.png')}}" alt="">
              <div class="pd_name">景田本来旺饮用水</div>
            </div>
            <div class="product">
              <img src="{{shopRes('/shop_img/water_prod5.png')}}" alt="">
              <div class="pd_name">景田百岁山支装水</div>
            </div>
            <div class="product">
              <img src="{{shopRes('/shop_img/water_prod6.png')}}" alt="">
              <div class="pd_name">景田纯净水</div>
            </div>
          </div>
        </div>
        <div class="light">
          <div class="title">5大产品亮点</div>
          <div class="contents">
            <div class="content">
              <div class="num">1.景田四重防伪盖</div>
              <div class="name">带有景田logo的一次性合格证膜,带有景田专利蓝色密封圈,带有一次性易拉开手柄,桶盖侧面带有“景田”凹凸字体</div>
            </div>
            <div class="content">
              <div class="num">2.景田专利水桶</div>
              <div class="name">
                水桶采用德国拜尔食品级全新料，利用日本ASB设备一次性注、拉、吹成型，ASB设备是目前全球生产PC饮用桶最先进的设备之一。水桶颜色光泽度好，密封
                性强，确保景田山泉水买得舒心，喝的放心！</div>
            </div>
            <div class="content">
              <div class="num">3.景田水中贵族身份认证</div>
            </div>
            <div class="content">
              <div class="num">4.景田好水源</div>
            </div>
            <div class="content">
              <div class="num">5.景田天然泉水PH7.1水质呈弱碱性长期饮用有利于健康</div>
            </div>
            <img src="{{shopRes('/shop_img/water_back.jpg')}}" alt="" class="back">
          </div>
        </div>
      </div>
    <div class="footer_banner" style="text-align:center">
      <img src="{{shopRes('/shop_img/index_better.jpg')}}" alt="">
    </div>
    <div id="appointment">
      <appoint></appoint>
    </div>
    @include('shop.footer')
@endsection
@section('script')
  <script src="{{shopRes('/js/shop_tex_plant.js')}}"></script>
@endsection