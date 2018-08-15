@extends('shop.layout.layout')
@section('title', '办公家具详情')
@section('header')
    <link rel="stylesheet" href="/css/shop_pantai.css">
@endsection
@section('body')
  @include('shop.header')
  @include('shop.layout.nav')
  <div class="proscenium_container">
    <!-- banner部分 -->
    <div id="appointment">
      <appoint></appoint>
    </div>
    <div class="banner">
      <div class="title">办公家具 (<span class="page_name" style="font-size:60px">班台</span>)</div>
      <div class="title2">休闲时尚 品质办公生活</div>
    </div>
    <!-- 配色部分 -->
    <div class="color">
      <div class="title">
        <span class="span1">是否</span><span class="span2">想拥有一个</span>轻松简约的办公环境?
        <img src="/shop_img/title_back.png" alt="">
      </div>
      <div class="color_border">COLOR</div>
      <div class="product_color">商品颜色</div>
      <div class="color_show">
        <div class="show_des">
          <div class="des_title">魅力“十色”</div>
          <div class="des_title2">总有一款适合你!</div>
          <div class="des_eng_title">
            charm ten color<br>
            There's always one part of you!
          </div>
        </div>
        <div class="colors">
          <img src="/shop_img/colors.jpg" alt="">
        </div>
      </div>
      <div class="annotation">注：更多桌面色卡可直接拨打4000-580-888咨询</div>
    </div>

    <!-- 前台描述部分 -->
    <div class="proscenium_des">
      <div class="eng_title">SIMPLE  BUT  NOT  SIMPLE</div>
      <div class="zn_title">简约却不简单超越平凡</div>
      <div class="title2">
        方形元素的应用体现高效有序的办公氛围，在设计中充分利用版式鱼布艺的碰撞,严谨中带着舒适，无论从实用性，还是审美方面。都是实力追求完美
      </div>
    </div>
    <!-- 产品展示部分 -->
    <div class="proscenium_show">
      <div class="title">产品展示</div>
      <div class="products">
        <div class="left">
          <img src="/shop_img/pantai_show1.jpg" alt="">
        </div>
        <div class="right">
          <div class="right_top">
            <img src="/shop_img/pantai_show2.jpg" alt="">
          </div>
          <div class="right_bottom">
            <img src="/shop_img/pantai_show3.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- 优选材质部分 -->
    <div class="prefect_material">
      <div class="title">精选优质材质</div>
      <div class="title1">
        面材：采用MFC三聚氰胺板光滑平直，颜色、均匀；基材：采用环保基材，符合E3环保标准。<br>
        封边：木纹清晰、美观、颜色均匀、不易腐蚀、抗弯强度适中、断裂强度适中  
      </div>
      <div class="materails">
        <div class="item">
          <img src="/shop_img/material1.png" alt="">
          <div class="item_name">原料</div>
        </div>
        <div class="item">
          <img src="/shop_img/material2.png" alt="">
          <div class="item_name">实木颗粒</div>
        </div>
        <div class="item">
          <img src="/shop_img/material3.png" alt="">
          <div class="item_name">高密度压制</div>
        </div>
      </div>
    </div>
    <!-- 专业包装部分 -->
    <div class="profession_pack">
      <div class="title">专业包装+多层保护</div>
      <div class="eng_title">Professional packaging & Multi layer protection</div>
      <div class="packing_steps">
        <img src="/shop_img/packing_steps.jpg" alt="">
      </div>
    </div>
    <!-- 服务流程 -->
    <div class="serve_steps">
      <div class="title">服务流程</div>
      <div class="serve_box">
        <div class="serve_step">
          <img src="/shop_img/serve_step1.jpg" alt="">
          <div class="serve_step_name">01 网上了解您的需求</div>
        </div>
        <div class="serve_step">
          <img src="/shop_img/serve_step2.jpg" alt="">
          <div class="serve_step_name">02 设计师上门洽谈</div>
        </div>
        <div class="serve_step">
          <img src="/shop_img/serve_step3.jpg" alt="">
          <div class="serve_step_name">03 实地参考考察</div>
        </div>
        <div class="serve_step">
          <img src="/shop_img/serve_step4.jpg" alt="">
          <div class="serve_step_name">04 整体预算</div>
        </div>
        <div class="serve_step">
          <img src="/shop_img/serve_step5.jpg" alt="">
          <div class="serve_step_name">05 安装交付</div>
        </div>
        <div class="serve_step">
          <img src="/shop_img/serve_step6.jpg" alt="">
          <div class="serve_step_name">06 增值服务</div>
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
            <img src="/shop_img/proscenium1.jpg" alt="">
          </div>
          <div class="right_box f_l">
            <div class="eng">High quality</div>
            <div class="chz">优质</div>
            <div class="red"></div>
            <div class="black"></div>
            <div class="tellent_describe">
            15年办公家具设计制作经验，商<br />
            城管家全程质量把关
            </div>
          </div>
        </div>
        <div class="content clearfix">
          <div class="img f_l">
            <img src="/shop_img/proscenium2.jpg" alt="">
          </div>
          <div class="right_box f_l">
            <div class="eng">Low price</div>
            <div class="chz">低价</div>
            <div class="red"></div>
            <div class="black"></div>
            <div class="tellent_describe">
            去掉中间商的层层加价，给予您<br />
            实惠的出厂价格
            </div>
          </div>
        </div>
        <div class="content clearfix">
          <div class="img f_l">
            <img src="/shop_img/proscenium3.jpg" alt="">
          </div>
          <div class="right_box f_l">
            <div class="eng">Intimate service</div>
            <div class="chz">贴心服务 </div>
            <div class="red"></div>
            <div class="black"></div>
            <div class="tellent_describe">
            免费上门测量，免费设计方案；<br />
            免费配送，免费上门安装
            </div>
          </div>
        </div>
        <div class="content clearfix">
          <div class="img f_l">
            <img src="/shop_img/proscenium4.jpg" alt="">
          </div>
          <div class="right_box f_l">
            <div class="eng">Rest assured after sale</div>
            <div class="chz">放心售后</div>
            <div class="red"></div>
            <div class="black"></div>
            <div class="tellent_describe">
            3年内免费更换零部件，所售家具<br />
            终身保修
            </div>
          </div>
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