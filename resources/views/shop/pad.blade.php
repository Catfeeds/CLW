@extends('shop.layout.layout')
@section('title', '电脑租赁')
@section('header')
    <link rel="stylesheet" href="/css/shop_rent_computer.css">
@endsection
@section('body')
  @include('shop.header')
  <div class="rent_conputer_container">
    <div class="banner" style="background:url('/shop_img/pad_banner.jpg')"></div>
    <!-- 电脑性能 -->
    <div class="computer_propetry">
      <div class="title">强大多任务处理能力</div>
      <div class="title2">
        优威派克携手京东方，提升一体机视觉体验，采用京东方全新A+级IPS硬屏，不仅拥有98%的SRGB覆盖率表现，<br>
        更有细窄微边技术，给你全视觉沉浸体验
      </div>
      <div class="propetry">
        <div class="propetry_img" style="padding-top:35px">
          <img src="/shop_img/pad_propetry.png" alt="">
        </div>
        <div class="propetry_des" style="margin-left:110px">
          <div class="des">
            <div class="des_name">极速</div>
            <div class="des_info">
              读写速度更快，给上班族节<br>
              省更多时间
            </div>
          </div>
          <div class="des">
            <div class="des_name">稳定</div>
            <div class="des_info">
              即使意外跌落，数据丢失可<br>
              能性更小
            </div>
          </div>
          <div class="des">
            <div class="des_name">可靠</div>
            <div class="des_info">
              即使意外跌落，数据丢失可<br>
              质量更有保障
            </div>
          </div>
          <div class="des">
            <div class="des_name">耐用</div>
            <div class="des_info">
              区块写入方式做读写功能，<br>
              寿命更长
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 性价比 -->
    <div class="computer_talent">
      <div class="title">性能过剩的时代，实用主义更具性价比</div>
      <div class="arrow">
        <img src="/shop_img/computer_arrow.png" alt="">
      </div>
      <div class="form">
        <div class="form_info clearfix">
          <div class="form_name f_l">显示屏</div>
          <div class="form_des f_l">14.1英寸   1366*768 /1600*900  高清宽屏</div>
        </div>
        <div class="form_info clearfix" style="background-color:rgba(242,196,223,0.4)">
          <div class="form_name f_l">电源</div>
          <div class="form_des f_l">180W电源适配器，稳定运行</div>
        </div>
        <div class="form_info clearfix">
          <div class="form_name f_l">集成</div>
          <div class="form_des f_l">内置WIFI  蓝牙  双杨音器  丰富接口</div>
        </div>
        <div class="form_info clearfix" style="background-color:rgba(242,196,223,0.4)">
          <div class="form_name f_l">系统</div>
          <div class="form_des f_l">Windows7 中文体验版</div>
        </div>
        <div class="form_info clearfix">
          <div class="form_name f_l">厚度</div>
          <div class="form_des f_l">20.0mm及以上</div>
        </div>
      </div>
    </div>
    <!-- 应用场景 -->
    <div class="scene" style="height:785px">
      <div class="title" style="margin-bottom:70px;">适用场景</div>
      <div class="pad_scenes">
        <div class="pad_scene">
          <img src="/shop_img/pad_scene1.jpg" alt="">
          <div class="pad_scene_name">影音娱乐</div>
        </div>
        <div class="pad_scene">
          <img src="/shop_img/pad_scene2.jpg" alt="">
          <div class="pad_scene_name">商务出行</div>
        </div>
        <div class="pad_scene">
          <img src="/shop_img/pad_scene3.jpg" alt="">
          <div class="pad_scene_name">移动办公</div>
        </div>
        <div class="pad_scene">
          <img src="/shop_img/pad_scene4.jpg" alt="">
          <div class="pad_scene_name">日常学习</div>
        </div>
      </div>
    </div>
    <!-- 电脑细节 -->
    <div class="computer_details" style="height:885px">
      <div class="title" style="margin-bottom:20px">真视界  不打折还原精彩</div>
      <div class="title2" style="font-size:18px;color:#333;margin-bottom:65px;text-align:center;line-height:25px">
        采用14英寸LED 1600*900 高分炫丽屏，结合高纯度LED背光,无论游戏，影音还是办公，<br>
        高清的视野无疑让您体验更加畅快，发挥更淋漓
      </div>
      <div class="details_box">
        <div class="left">
          <img src="/shop_img/pad_detail1.jpg" alt="">
        </div>
        <div class="right">
          <div class="right_top" style="margin-bottom:17px;">
            <img src="/shop_img/pad_detail2.jpg" alt="">
          </div>
          <div class="right_bottom">
            <img src="/shop_img/pad_detail3.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- 电脑集成计划 -->
    <div class="plants">
      <div class="title">内置WIFI、蓝牙、音响，更贴心的集成方案</div>
      <div class="title2">你想要的，就是我们要做的。WIFI蓝牙，喇叭等一应俱全，办公一体机，我们更贴心</div>
      <div class="plant">
        <div class="wifi plant_info" style="margin-right:127px">
          <img src="/shop_img/computer_wifi.png" alt="">
          <div class="name">内置WIFI  无线上网</div>
        </div>
        <div class="sound plant_info">
          <img src="/shop_img/computer_sound.png" alt="">
          <div class="name" style="margin-top:34px">双扬音器  不再是 “无声机”</div>
        </div>
      </div>
    </div>
    <!-- 服务保障 -->
    <div class="our_tellent">
      <div class="tellent_title">
        <div class="tellent_title">
          服务保障
        </div>
      </div>
      <div class="tellent_contents">
        <div class="content clearfix">
          <div class="img f_l">
            <img src="/shop_img/computer_serve1.jpg" alt="">
          </div>
          <div class="right_box f_l">
            <div class="eng">Free Delivery</div>
            <div class="chz">免费送货</div>
            <div class="red"></div>
            <div class="black"></div>
            <div class="tellent_describe">
            顺丰快运将客户所订机器<br />
            快递上门
            </div>
          </div>
        </div>
        <div class="content clearfix">
          <div class="img f_l">
            <img src="/shop_img/computer_serve2.jpg" alt="">
          </div>
          <div class="right_box f_l">
            <div class="eng">Full warranty</div>
            <div class="chz">全程保修</div>
            <div class="red"></div>
            <div class="black"></div>
            <div class="tellent_describe">
            正常使用情况下出现故障，<br />
            免费提供维修服务
            </div>
          </div>
        </div>
        <div class="content clearfix">
          <div class="img f_l">
            <img src="/shop_img/computer_serve3.jpg" alt="">
          </div>
          <div class="right_box f_l">
            <div class="eng">Follow the rent</div>
            <div class="chz">随租随还</div>
            <div class="red"></div>
            <div class="black"></div>
            <div class="tellent_describe">
            租赁过程中，电脑设备的型号和<br />
            数量均可灵活进行调整
            </div>
          </div>
        </div>
        <div class="content clearfix">
          <div class="img f_l">
            <img src="/shop_img/computer_serve4.jpg" alt="">
          </div>
          <div class="right_box f_l">
            <div class="eng">Deposit free lease</div>
            <div class="chz">免押金租赁</div>
            <div class="red"></div>
            <div class="black"></div>
            <div class="tellent_describe">
            凡符合授信额度范围内的企业，<br />
            无需支付押金
            </div>
          </div>
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