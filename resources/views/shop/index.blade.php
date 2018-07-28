@extends('home.layouts.layout')
@section('title', '首页')
@section('header')
 <link rel="stylesheet" href="/css/shop_index.css">
@endsection
@section('body')
@include('shop.header')
  <div class="main">
    <!-- 轮播 -->
    <div class="swiper-container js_banner">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="swiperPic" style="background-image:url(/shop_img/banner.jpg)"></div>
        </div>
      </div>
    </div>
    <!-- 一站式快捷服务 -->
    <div class="service">
      <div class="head">一站式快捷服务</div>
      <div class="serviceList">
        <a href="javascript:void(0)">
          <div class="finance">
            <div class="border"></div>
            <div class="up">
              <div class="title">工商财税</div>
              <div class="detail">快速注册 简单创业</div>
            </div>
            <div><img src="/shop_img/finance.jpg"></div>
          </div>
        </a>
        <a href="javascript:void(0)">
          <div class="decoration">
            <div class="border"></div>
            <div class="up">
              <div class="title">企业服务</div>
              <div class="detail">全包服务 无增项</div>
            </div>
            <div><img src="/shop_img/decoration.jpg"></div>
          </div>
        </a>
        <a href="javascript:void(0)">
          <div class="furniture">
            <div class="border"></div>
            <div class="up">
              <div class="title">办公家具</div>
              <div class="detail">款式多样 按需定制</div>
            </div>
            <div><img src="/shop_img/furniture.jpg"></div>
          </div>
        </a>
        <a href="javascript:void(0)">
          <div class="clean">
            <div class="border"></div>
            <div class="up">
              <div class="title">入住服务</div>
              <div class="detail">日常开荒 专项保洁</div>
            </div>
            <div><img src="/shop_img/clean.jpg"></div>
          </div>
        </a>
        <a href="javascript:void(0)">
          <div class="equipment">
            <div class="border"></div>
            <div class="up">
              <div class="title">办公设备</div>
              <div class="detail">租电脑 零押金</div>
            </div>
            <div><img src="/shop_img/equipment.jpg"></div>
          </div>
        </a>
        <a href="javascript:void(0)">
          <div class="plants">
            <div class="border"></div>
            <div class="up">
              <div class="title">绿植摆租</div>
              <div class="detail">套餐单品 免费养护</div>
            </div>
            <div><img src="/shop_img/plants.jpg"></div>
          </div>
        </a>
      </div>
    </div>
    <!-- 广告 -->
    <div class="advertisement"><img src="/shop_img/register.jpg" alt=""></div>
    <!-- 1F 工商财税-->
    <div class="firstFloor louti1">
      <div class="nav">
        <div class="hexagon">
          <div class="left"></div>
          <div class="center"></div>
          <div class="right"></div>
        </div>
        <div class="floorNum">1F</div>
        <div class="floorTitle">工商财税</div>
      </div>
      <div class="content">
        <a href="javascript:void(0)"><div><img src="/shop_img/index_first.jpg" alt=""></div></a>
        <div class="first_right">
          <div class="small_scale">
            <a href="javascript:void(0)">
              <div class="small_scale_up">
                <div class="small_scale_title">小规模纳税人 代理记账</div>
                <div class="small_scale_detail">30项代账服务 满足您的账务需求</div>
                <img src="/shop_img/index_first_01.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
            <a href="javascript:void(0)">
              <div class="small_scale_up">
                <div class="small_scale_title">年度财务报表审计</div>
                <div class="small_scale_detail">专业财务审计意见，满足第三方的要求</div>
                <img src="/shop_img/index_first_04.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
          </div>
          <div class="small_scale">
            <a href="javascript:void(0)">
              <div class="small_scale_up">
                <div class="small_scale_title">一般纳税人 代理记账</div>
                <div class="small_scale_detail">五对一 省钱又省心</div>
                <img src="/shop_img/index_first_02.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
            <a href="javascript:void(0)">
              <div class="small_scale_up">
                <div class="small_scale_title">税审</div>
                <div class="small_scale_detail">12年专业经验 为您服务</div>
                <img src="/shop_img/index_first_05.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
          </div>
          <div class="small_scale">
            <a href="javascript:void(0)">
              <div class="small_scale_up">
                <div class="small_scale_title">税务筹划</div>
                <div class="small_scale_detail">为企业提供合法合规财税优惠服务</div>
                <img src="/shop_img/index_first_03.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
            <a href="javascript:void(0)">
              <div class="small_scale_up">
                <div class="small_scale_title">验资报告</div>
                <div class="small_scale_detail">注会协贴标，正规，专业</div>
                <img src="/shop_img/index_first_06.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- 2F 办公设备-->
    <div class="secondFloor louti2">
      <div class="nav">
        <div class="hexagon">
          <div class="left"></div>
          <div class="center"></div>
          <div class="right"></div>
        </div>
        <div class="floorNum">2F</div>
        <div class="floorTitle">办公设备</div>
      </div>
      <div class="content">
        <a href="javascript:void(0)"><img src="/shop_img/index_second_01.jpg" alt=""></a>
        <div class="second_right">
          <a href="javascript:void(0)">
            <div class="seconde_work">
              <img src="/shop_img/index_second_02.jpg" alt="">
              <div class="seconde_work_title">电脑租赁</div>
              <div class="seconde_work_detail">免押金 一台起租 随租随还</div>
            </div>
          </a>
          <a href="javascript:void(0)">
            <div class="seconde_work">
              <img src="/shop_img/index_second_03.jpg" alt="">
              <div class="seconde_work_title">打印复印</div>
              <div class="seconde_work_detail">全包服务</div>
            </div>
          </a>
          <a href="javascript:void(0)">
            <div class="seconde_work">
              <img src="/shop_img/index_second_04.jpg" alt="">
              <div class="seconde_work_title">一体机租赁</div>
              <div class="seconde_work_detail">苹果一体机  设计专用</div>
            </div>
          </a>
          <a href="javascript:void(0)">
            <div class="seconde_work">
              <img src="/shop_img/index_second_05.jpg" alt="">
              <div class="seconde_work_title">平板电脑</div>
              <div class="seconde_work_detail">超轻薄  携带方便</div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <!-- 3F 入住服务 -->
    <div class="thirdFloor louti3">
      <div class="nav">
        <div class="hexagon">
          <div class="left"></div>
          <div class="center"></div>
          <div class="right"></div>
        </div>
        <div class="floorNum">3F</div>
        <div class="floorTitle">入驻服务</div>
      </div>
      <div class="content">
        <a href="javascript:void(0)"><img src="/shop_img/index_third_01.jpg" alt=""></a>
        <div class="third_right">
          <a href="javascript:void(0)">
            <div class="seconde_work">
              <img src="/shop_img/index_third_02.jpg" alt="">
              <div class="seconde_work_title">保洁服务</div>
              <div class="seconde_work_detail">日常开荒  全面服务</div>
            </div>
          </a>
          <a href="javascript:void(0)">
            <div class="seconde_work">
              <img src="/shop_img/index_third_03.jpg" alt="">
              <div class="seconde_work_title">桶装水</div>
              <div class="seconde_work_detail">景田  极速达  无押金</div>
            </div>
          </a>
          <a href="javascript:void(0)">
            <div class="seconde_work">
              <img src="/shop_img/index_third_04.jpg" alt="">
              <div class="seconde_work_title">绿植服务</div>
              <div class="seconde_work_detail">租赁买卖  品种多样</div>
            </div>
          </a>
          <a href="javascript:void(0)">
            <div class="seconde_work">
              <img src="/shop_img/index_third_05.jpg" alt="">
              <div class="seconde_work_title">搬家服务</div>
              <div class="seconde_work_detail">快速搬家 省时省力省心</div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <!-- 4F 办公家具 -->
    <div class="fourFloor louti4">
      <div class="nav">
        <div class="hexagon">
          <div class="left"></div>
          <div class="center"></div>
          <div class="right"></div>
        </div>
        <div class="floorNum">4F</div>
        <div class="floorTitle">办公家具</div>
      </div>
      <div class="content">
        <a href="javascript:void(0)"><div><img src="/shop_img/index_four_01.jpg" alt=""></div></a>
        <div class="four_right">
          <div class="small_scale">
            <a href="javascript:void(0)">
              <div class="small_scale_up">
                <div class="small_scale_title">班台</div>
                <div class="small_scale_detail">品质承诺，上门安装</div>
                <img src="/shop_img/index_four_02.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
            <a href="javascript:void(0)">
              <div class="small_scale_up">
                <div class="small_scale_title">前台</div>
                <div class="small_scale_detail">品质承诺，上门安装</div>
                <img src="/shop_img/index_four_05.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
          </div>
          <div class="small_scale">
            <a href="javascript:void(0)">
              <div class="small_scale_up">
                <div class="small_scale_title">办公沙发</div>
                <div class="small_scale_detail">品质承诺，上门安装</div>
                <img src="/shop_img/index_four_03.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
            <a href="javascript:void(0)">
              <div class="small_scale_up">
                <div class="small_scale_title">资料柜</div>
                <div class="small_scale_detail">品质承诺，上门安装</div>
                <img src="/shop_img/index_four_06.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
          </div>
          <div class="small_scale">
            <a href="javascript:void(0)">
              <div class="small_scale_up">
                <div class="small_scale_title">会议桌</div>
                <div class="small_scale_detail">品质承诺，上门安装</div>
                <img src="/shop_img/index_four_04.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
            <a href="javascript:void(0)">
              <div class="small_scale_up">
                <div class="small_scale_title">办公组合</div>
                <div class="small_scale_detail">品质承诺，上门安装</div>
                <img src="/shop_img/index_four_07.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- 5F 装修服务 -->
    <div class="fiveFloor louti5">
      <div class="nav">
        <div class="hexagon">
          <div class="left"></div>
          <div class="center"></div>
          <div class="right"></div>
        </div>
        <div class="floorNum">5F</div>
        <div class="floorTitle">装修服务</div>
      </div>
      <div class="content">
        <div class="leftBg" style="background:url(/shop_img/index_five_left.jpg)">
          <div class="fiveBox">
            <div class="interiorTrim">室内装修</div>
            <ul>
              <li>透明流程</li>
              <li>包工包料</li>
              <li>免费方案</li>
              <li>一站式服务</li>
            </ul>
            <a href="javascript:void(0)"><div class="check">立即查看</div></a>
          </div>
        </div>
        <a href="javascript:void(0)">
          <div class="fiveRight">
            <div class="fiveRightTitle">综合布线</div>
            <ul>
              <li>布线全包一站式</li>
              <li>满足您的各种所需</li>
            </ul>
            <div><img src="/shop_img/index_five_right.jpg" alt=""></div>
          </div>
        </a>
      </div>
    </div>
    <!-- 广告 -->
    <div class="advertisement"><img src="/shop_img/index_office_furniture.jpg" alt=""></div>
    <!-- 热销机型 -->
    <div class="hot_sale_model louti6">
      <div class="nav">
        <div class="hexagon">
          <div class="left"></div>
          <div class="center"></div>
          <div class="right"></div>
        </div>
        <div class="floorNum"><img src="/shop_img/index_hot_sale.png" alt=""></div>
        <div class="floorTitle">热销机型</div>
      </div>
      <div class="content">
        <a href="javascript:void(0)">
          <div><img src="/shop_img/index_sale_model_01.jpg" alt=""></div>
        </a>
        <div class="sale_model_right">
          <div class="modeFirst">
            <div class="modeBox">
              <div class="modeTitle">Apple iPad 9.7英寸平板电脑</div>
              <div class="modeDetail">方寸间 乐趣全开</div>
              <div class="price">
                <div class="unitPrice">¥ 99/月</div>
                <div><img src="/shop_img/index_sale_model_02.jpg" alt=""></div>
              </div>
            </div>
            <div class="modeBox">
              <div class="modeTitle">全新 联想/Lenovo 启天M410</div>
              <div class="modeDetail">主动商务，高效易用</div>
              <div class="price">
                <div class="unitPrice">¥ 99/月</div>
                <div><img src="/shop_img/index_sale_model_03.jpg" alt=""></div>
              </div>
            </div>
          </div>
          <div class="modelSecond">
            <div class="modeTitle">新一代成铭 3980</div>
              <div class="modeDetail">专属定制 低价高效</div>
              <div class="unitPrice">¥ 99/月</div>
              <div><img src="/shop_img/index_sale_model_04.jpg" alt=""></div>
          </div>
          <div class="modeThird">
            <div class="modeBox">
              <div class="modeTitle">Apple iPad 9.7英寸平板电脑</div>
              <div class="modeDetail">方寸间 乐趣全开</div>
              <div class="price">
                <div><img src="/shop_img/index_sale_model_05.jpg" alt=""></div>
                <div class="unitPrice">¥ 99/月</div>
              </div>
            </div>
            <div class="modeBox">
              <div class="modeTitle">Apple iPad 9.7英寸平板电脑</div>
              <div class="modeDetail">方寸间 乐趣全开</div>
              <div class="price">
                <div><img src="/shop_img/index_sale_model_06.jpg" alt=""></div>
                <div class="unitPrice">¥ 99/月</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 热销绿植 -->
    <div class="hot_sale_plants louti7">
      <div class="nav">
        <div class="hexagon">
          <div class="left"></div>
          <div class="center"></div>
          <div class="right"></div>
        </div>
        <div class="floorNum"><img src="/shop_img/index_hot_sale.png" alt=""></div>
        <div class="floorTitle">热销绿植</div>
      </div>
      <div class="content">
        <a href="javascript:void(0)">
          <div><img src="/shop_img/index_sale_plants_01.jpg" alt=""></div>
        </a>
        <div class="sale_model_right">
          <div class="modeFirst">
            <div class="modeBox">
              <div class="modeTitle">Apple iPad 9.7英寸平板电脑</div>
              <div class="modeDetail">方寸间 乐趣全开</div>
              <div class="price">
                <div class="unitPrice">¥ 99/月</div>
                <div><img src="/shop_img/index_sale_plants_02.jpg" alt=""></div>
              </div>
            </div>
            <div class="modeBox">
              <div class="modeTitle">全新 联想/Lenovo 启天M410</div>
              <div class="modeDetail">主动商务，高效易用</div>
              <div class="price">
                <div class="unitPrice">¥ 99/月</div>
                <div><img src="/shop_img/index_sale_plants_03.jpg" alt=""></div>
              </div>
            </div>
          </div>
          <div class="modelSecond">
            <div class="modeTitle">新一代成铭 3980</div>
              <div class="modeDetail">专属定制 低价高效</div>
              <div class="unitPrice">¥ 99/月</div>
              <div><img src="/shop_img/index_sale_plants_04.jpg" alt=""></div>
          </div>
          <div class="modeThird">
            <div class="modeBox">
              <div class="modeTitle">Apple iPad 9.7英寸平板电脑</div>
              <div class="modeDetail">方寸间 乐趣全开</div>
              <div class="price">
                <div><img src="/shop_img/index_sale_plants_05.jpg" alt=""></div>
                <div class="unitPrice">¥ 99/月</div>
              </div>
            </div>
            <div class="modeBox">
              <div class="modeTitle">Apple iPad 9.7英寸平板电脑</div>
              <div class="modeDetail">方寸间 乐趣全开</div>
              <div class="price">
                <div><img src="/shop_img/index_sale_plants_06.jpg" alt=""></div>
                <div class="unitPrice">¥ 99/月</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 客服 -->
    <div class="customService">
      <img src="/shop_img/custom_service.png" alt="">
      <div class="customBox">
        <ul>
          <li class="find">没有找到合适的企业服务?</li>
          <li class="free">免费咨询 , 立即回复</li>
        </ul>
        <div class="consult"><input type="text"><button>立即咨询</button></div>
      </div>
    </div>
    <!-- 优势 -->
    <div style="border-top: 1px solid #eeeded"><img src="/shop_img/index_better.jpg" alt=""></div>
    <!-- 楼梯导航 -->
    <div class="elevator">
      <ul class="elevator_list">
        <li class="louti">工商财税</li>
        <li class="louti">办公设备</li>
        <li class="louti">入驻服务</li>
        <li class="louti">办公家具</li>
        <li class="louti">装修服务</li>
        <li class="louti">热销机型</li>
        <li class="louti">热销绿植</li>
        <li class="top">在线客服</li>
        <li class="top"><div><img src="/shop_img/index_up.png" alt=""></div>顶部</li>
      </ul>
    </div>
  </div>
  @include('home.footer')
@endsection
@section('script')
<script src='/js/shop_index.js'></script>
@endsection