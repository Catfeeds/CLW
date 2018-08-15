@extends('shop.layout.layout')
@section('title', '绿植租摆')
@section('header')
    <link rel="stylesheet" href="/css/shop_plant_rent.css">
@endsection
@section('body')
    @include('shop.header')
    @include('shop.layout.nav')
    <div class="plant_container">
      <div class="banner">
        <div class="banner_title1">金钱树 绿植租赁</div>
        <div class="title2">防辐射，净化甲醛，二甲苯，二手烟，是写字楼的天然清道夫</div>
      </div>
      <div class="plant_archives clearfix">
        <div class="img_box">
          <img src="/shop_img/plants_img.jpg" alt="">
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
            <li class="des">金钱树</li>
            <li class="des">金币树、雪铁芋、泽米叶天南星、扎米莲</li>
            <li class="des">客厅、书房、起居室</li>
            <li class="des">招财进宝、荣华富贵</li>
            <li class="des">喜暖热略干、半阴及温度变化小的环境，耐干旱，畏寒冷</li>
            <li class="des">旺气生财，寓意吉祥，提升格调</li>
          </ul>
        </div>
      </div>
      <div class="knowledge">
        <div class="title">养护小知识</div>
        <div class="needing">
          <div class="require">
            <div class="detail">
              <img src="/shop_img/require1.png" alt="" class="img1">
              <div class="detail_name">浇水频率</div>
              <div class="border"></div>
              <img src="/shop_img/star4.png" alt="">
              <div class="detail_do">7天浇1次水 秋冬控制水量</div>
            </div>
            <div class="detail">
              <img src="/shop_img/require2.png" alt="" class="img1">
              <div class="detail_name">光照要求</div>
              <div class="border"></div>
              <img src="/shop_img/star3.png" alt="">
              <div class="detail_do">耐阴 散射光即可</div>
            </div>
            <div class="detail">
              <img src="/shop_img/require3.png" alt="" class="img1">
              <div class="detail_name">通风需求</div>
              <div class="border"></div>
              <img src="/shop_img/star4.png" alt="">
              <div class="detail_do">
                20~28°为宜<br>
                冬季室温不低于8°
              </div>
            </div>
            <div class="detail">
              <img src="/shop_img/require4.png" alt="" class="img1">
              <div class="detail_name">温度指数</div>
              <div class="border"></div>
              <img src="/shop_img/star5.png" alt="">
              <div class="detail_do">
                20~28°为宜<br>
                冬季室温不低于8°
              </div>
            </div>
            <div class="detail">
              <img src="/shop_img/require5.png" alt="" class="img1">
              <div class="detail_name">施肥要求</div>
              <div class="border"></div>
              <img src="/shop_img/star3.png" alt="">
              <div class="detail_do">每两周施一次肥</div>
            </div>
            <div class="detail">
              <img src="/shop_img/require6.png" alt="" class="img1">
              <div class="detail_name">病虫灾害</div>
              <div class="border"></div>
              <img src="/shop_img/star2.png" alt="">
              <div class="detail_do">
                易受介壳虫灾害，可用40% <br> 
                氧化乐果1000倍液喷杀
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="plant_put">
        <div class="title">摆放场景</div>
        <div class="title2">金钱树适合摆放在在办公桌上，会给人一种蓬勃向上和青翠欲滴的清新感觉。</div>
        <div class="plants_img">
          <img src="/shop_img/plants_img1.jpg" alt="">
          <img src="/shop_img/plants_img2.jpg" alt="">
          <img src="/shop_img/plants_img3.jpg" alt="">
        </div>
      </div>
      <div class="us_serve">
        <div class="title">选择我们的原因</div>
      </div>
      <div class="promise">
        <div class="title">我们的承诺</div>
        <div class="details">
          <div class="detail">
            <img src="/shop_img/rent_plant_detail1.jpg" alt="">
            <div class="name">48小时内送到保障</div>
          </div>
          <div class="detail">
          <div class="name">完好无损送货到位</div>
            <img src="/shop_img/rent_plant_detail2.jpg" alt="">
          </div>
          <div class="detail">
            <img src="/shop_img/rent_plant_detail3.jpg" alt="">
            <div class="name">不满意可直接拒收</div>
          </div>
          <div class="detail">
          <div class="name">免费养护指导</div>
            <img src="/shop_img/rent_plant_detail4.jpg" alt="">
          </div>
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