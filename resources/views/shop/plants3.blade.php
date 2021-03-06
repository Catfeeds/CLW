@extends('shop.layout.layout')
@section('title', '绿植租赁详情')
@section('header')
    <link rel="stylesheet" href="{{shopRes('/css/shop_plant_rent.css')}}">
@endsection
@section('body')
    @include('shop.header')
    @include('shop.layout.nav')
    <div class="plant_container">
      <div id="appointment">
        <appoint></appoint>
      </div>
      <div class="banner" style="background: url('{{shopRes('/shop_img/plant_rent_banner.jpg')}}') no-repeat center;">
        <div class="banner_title1">幸福树 绿植租赁</div>
        <div class="title2">防辐射，净化甲醛，二甲苯，二手烟，是写字楼的天然清道夫</div>
      </div>
      <div class="plant_archives clearfix" style="background: url('{{shopRes('/shop_img/plant_archives.jpg')}}') no-repeat center;">
        <div class="img_box">
          <img src="{{shopRes('/shop_img/plants_img_happiness1.jpg')}}" alt="">
        </div>
        <div class="plant_info f_r clearfix">
          <ul class="info_name f_l">
            <li class="name">名称</li>
            <li class="name">别名</li>
            <li class="name">播放位置</li>
            <li class="name">花语</li>
            <li class="name">特点</li>
            <li class="name">作用价值</li>
          </ul>
          <ul class="info_des f_l">
            <li class="des">幸福树</li>
            <li class="des">豆角树、接骨凉伞、牛尾树、朝阳花</li>
            <li class="des">卧室，书房，客厅，办公桌</li>
            <li class="des">幸福平安</li>
            <li class="des">喜高温多湿、阳光足的环境。耐高温，畏寒冷，宜湿润，忌干燥</li>
            <li class="des">美观，净化空气</li>
          </ul>
        </div>
      </div>
      <div class="knowledge">
        <div class="title" style="background: url('{{shopRes('/shop_img/plant_rent_knowledge.jpg')}}') no-repeat center;">养护小知识</div>
        <div class="needing">
          <div class="require">
            <div class="detail">
              <img src="{{shopRes('/shop_img/require1.png')}}" alt="" class="img1">
              <div class="detail_name">浇水频率</div>
              <div class="border"></div>
              <img src="{{shopRes('/shop_img/star4.png')}}" alt="">
              <div class="detail_do">7天浇1次水 秋冬控制水量</div>
            </div>
            <div class="detail">
              <img src="{{shopRes('/shop_img/require2.png')}}" alt="" class="img1">
              <div class="detail_name">光照要求</div>
              <div class="border"></div>
              <img src="{{shopRes('/shop_img/star3.png')}}" alt="">
              <div class="detail_do">耐阴 散射光即可</div>
            </div>
            <div class="detail">
              <img src="{{shopRes('/shop_img/require3.png')}}" alt="" class="img1">
              <div class="detail_name">通风需求</div>
              <div class="border"></div>
              <img src="{{shopRes('/shop_img/star4.png')}}" alt="">
              <div class="detail_do">
              摆在良好的通风处
              </div>
            </div>
            <div class="detail">
              <img src="{{shopRes('/shop_img/require4.png')}}" alt="" class="img1">
              <div class="detail_name">温度指数</div>
              <div class="border"></div>
              <img src="{{shopRes('/shop_img/star5.png')}}" alt="">
              <div class="detail_do">
                20~28°为宜<br>
                冬季室温不低于8°
              </div>
            </div>
            <div class="detail">
              <img src="{{shopRes('/shop_img/require5.png')}}" alt="" class="img1">
              <div class="detail_name">施肥要求</div>
              <div class="border"></div>
              <img src="{{shopRes('/shop_img/star3.png')}}" alt="">
              <div class="detail_do">每两周施一次肥</div>
            </div>
            <div class="detail">
              <img src="{{shopRes('/shop_img/require6.png')}}" alt="" class="img1">
              <div class="detail_name">病虫灾害</div>
              <div class="border"></div>
              <img src="{{shopRes('/shop_img/star2.png')}}" alt="">
              <div class="detail_do">
                易受介壳虫灾害，可用40% <br> 
                氧化乐果1000倍液喷杀
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="plant_put" style="background: url('{{shopRes('/shop_img/plant_out.jpg')}}') no-repeat center;">
        <div class="title">摆放场景</div>
        <div class="title2">幸福树适合巧妙搭配去装扮办公室，让办公室充满浪漫的色彩，成为靓丽的一道风景线!</div>
        <div class="plants_img">
          <img src="{{shopRes('/shop_img/plants_img_happiness2.jpg')}}" alt="">
          <img src="{{shopRes('/shop_img/plants_img_happiness3.jpg')}}" alt="">
          <img src="{{shopRes('/shop_img/plants_img_happiness4.jpg')}}" alt="">
        </div>
      </div>
      <div class="us_serve" style="background: url('{{shopRes('/shop_img/us_serve_back.jpg')}}') no-repeat center;">
        <div class="title">选择我们的原因</div>
      </div>
      <div class="promise">
        <div class="title" style="background: url('{{shopRes('/shop_img/rent_plant_promise_back.jpg')}}') no-repeat center;">我们的承诺</div>
        <div class="details">
          <div class="detail">
            <img src="{{shopRes('/shop_img/rent_plant_detail1.jpg')}}" alt="">
            <div class="name">48小时内送到保障</div>
          </div>
          <div class="detail">
          <div class="name">完好无损送货到位</div>
            <img src="{{shopRes('/shop_img/rent_plant_detail2.jpg')}}" alt="">
          </div>
          <div class="detail">
            <img src="{{shopRes('/shop_img/rent_plant_detail3.jpg')}}" alt="">
            <div class="name">不满意可直接拒收</div>
          </div>
          <div class="detail">
          <div class="name">免费养护指导</div>
            <img src="{{shopRes('/shop_img/rent_plant_detail4.jpg')}}" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="footer_banner" style="text-align:center;border-top:1px solid #ededed">
      <img src="{{shopRes('/shop_img/index_better.jpg')}}" alt="">
    </div>
    @include('shop.footer')
@endsection
@section('script')
<script src="{{shopRes('/js/shop_slideBar.js')}}"></script>
@endsection