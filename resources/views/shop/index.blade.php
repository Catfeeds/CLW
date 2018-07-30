@extends('shop.layout.layout')
@section('title', '首页')
@section('header')
 <link rel="stylesheet" href="/css/shop_index.css">
@endsection
@section('body')
@include('shop.header')
  <div class="main">
    <!-- 轮播 -->
    <div class="banner">
      <div class="bannerSelect">
        <ul class="select_list"> 
          <li class="select_list_aside">
            <div class="list_aside">
              <div class="list_aside_right">
                <div class="aside_right_title">工商财税</div>
                <div class="aside_right_detail">公司注册&nbsp;&nbsp;&nbsp;&nbsp;财务税务</div>
              </div>
              <div><img src="/shop_img/index_back.png" alt=""></div>
            </div>
            <ul class="select_list_right">
              <li>
                <div class="total_classify">代理记账 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>小规模记账</span></a>
                  <a href="javascript:void(0)">|<span>一般纳税人代理记账</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">税务代办 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>税收筹划</span></a>
                  <a href="javascript:void(0)">|<span>税控器解锁</span></a>
                  <a href="javascript:void(0)">|<span>报税系统解锁</span></a>
                  <a href="javascript:void(0)">|<span>发票增版/增量</span></a>
                  <a href="javascript:void(0)">|<span>申办一般纳税人</span></a>
                  <a href="javascript:void(0)">|<span>税控代办及票种核定</span></a>
                  <a href="javascript:void(0)">|<span>所得税汇算清缴</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">财务审计 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>年度财务报表审计</span></a>
                  <a href="javascript:void(0)">|<span>所得税汇算清缴审计</span></a>
                  <a href="javascript:void(0)">|<span>验资报告</span></a>
                  <a href="javascript:void(0)">|<span>专项审计</span></a>
                  <a href="javascript:void(0)">|<span>税审</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">工商代办 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>有限责任公司注册</span></a>
                  <a href="javascript:void(0)">|<span>外商独资公司注册</span></a>
                  <a href="javascript:void(0)">|<span>合伙企业注册</span></a>
                  <a href="javascript:void(0)">|<span>个人独资企业注册</span></a>
                  <a href="javascript:void(0)">|<span>公司注册地址</span></a>
                  <a href="javascript:void(0)">|<span>分公司注册</span></a>
                  <a href="javascript:void(0)">|<span>一般人注册地址</span></a>
                </div>
              </li>
            </ul>
          </li>
          <li class="select_list_aside">
            <div class="list_aside">
              <div class="list_aside_right">
                <div class="aside_right_title">办公设备</div>
                <div class="aside_right_detail">打印机&nbsp;&nbsp;&nbsp;&nbsp;电脑</div>
              </div>
              <div><img src="/shop_img/index_back.png" alt=""></div>
            </div>
            <ul class="select_list_right">
              <li>
                <div class="total_classify">电脑设备 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>笔记本</span></a>
                  <a href="javascript:void(0)">|<span>台式机</span></a>
                  <a href="javascript:void(0)">|<span>一体机</span></a>
                  <a href="javascript:void(0)">|<span>平板电脑</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">打印复印 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>设备租赁</span></a>
                  <a href="javascript:void(0)">|<span>半价合约机</span></a>
                  <a href="javascript:void(0)">|<span>设备免费送</span></a>
                  <a href="javascript:void(0)">|<span>全包服务</span></a>
                </div>
              </li>
            </ul>
          </li>
          <li class="select_list_aside">
            <div class="list_aside">
              <div class="list_aside_right">
                <div class="aside_right_title">入驻服务</div>
                <div class="aside_right_detail">绿植&nbsp;&nbsp;&nbsp;&nbsp;保洁&nbsp;&nbsp;&nbsp;&nbsp;搬家&nbsp;&nbsp;&nbsp;&nbsp;桶装水</div>
              </div>
              <div><img src="/shop_img/index_back.png" alt=""></div>
            </div>
            <ul class="select_list_right">
              <li>
                <div class="total_classify">保洁服务 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>日常保洁</span></a>
                  <a href="javascript:void(0)">|<span>开荒保洁</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">搬家服务 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>搬家服务</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">绿植服务 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>绿植单品</span></a>
                  <a href="javascript:void(0)">|<span>绿植套餐</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">室内环保 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>室内环保</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">饮水服务 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>桶装水</span></a>
                </div>
              </li>
            </ul>
          </li>
          <li class="select_list_aside">
            <div class="list_aside">
              <div class="list_aside_right">
                <div class="aside_right_title">装饰装修</div>
                <div class="aside_right_detail">办公装修&nbsp;&nbsp;&nbsp;&nbsp;综合布线</div>
              </div>
              <div><img src="/shop_img/index_back.png" alt=""></div>
            </div>
            <ul class="select_list_right">
              <li>
                <div class="total_classify">室内装修 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>室内装修</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">综合布线 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>综合布线</span></a>
                </div>
              </li>
            </ul>
          </li>
          <li class="select_list_aside">
            <div class="list_aside">
              <div class="list_aside_right">
                <div class="aside_right_title">办公家具</div>
                <div class="aside_right_detail">班台&nbsp;&nbsp;&nbsp;&nbsp;工位&nbsp;&nbsp;&nbsp;&nbsp;办公椅</div>
              </div>
              <div><img src="/shop_img/index_back.png" alt=""></div>
            </div>
            <ul class="select_list_right">
              <li>
                <div class="total_classify">班台 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>班台</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">会议桌 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>会议桌</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">办公桌 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>办公桌</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">文件柜 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>文件柜</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">沙发 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>沙发</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">前台 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>前台</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">办公椅 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>办公椅</span></a>
                </div>
              </li>
            </ul>
          </li>
          <li class="select_list_aside">
            <div class="list_aside">
              <div class="list_aside_right">
                <div class="aside_right_title">其他</div>
                <div class="aside_right_detail">图文广告&nbsp;&nbsp;&nbsp;&nbsp;金融支持&nbsp;&nbsp;&nbsp;&nbsp;豪车租赁</div>
              </div>
              <div><img src="/shop_img/index_back.png" alt=""></div>
            </div>
            <ul class="select_list_right">
              <li>
                <div class="total_classify">图文广告 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>图文快印</span></a>
                  <a href="javascript:void(0)">|<span>商务印品</span></a>
                  <a href="javascript:void(0)">|<span>企业广告</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">金融 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>金融支持</span></a>
                </div>
              </li>
              <li>
                <div class="total_classify">豪车 &nbsp;&nbsp;> </div>
                <div class="classify_list">
                  <a href="javascript:void(0)">|<span>豪车租赁</span></a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="swiper-container js_banner">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="swiperPic" style="background-image:url(/shop_img/banner.jpg)"></div>
          </div>
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
        <a href="{{url('/companyDecorat')}}">
          <div class="decoration">
            <div class="border"></div>
            <div class="up">
              <div class="title">企业装修</div>
              <div class="detail">全包服务 无增项</div>
            </div>
            <div><img src="/shop_img/decoration.jpg"></div>
          </div>
        </a>
        <a href="{{url('/furniture')}}">
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
              <div class="title">入驻服务</div>
              <div class="detail">日常开荒 专项保洁</div>
            </div>
            <div><img src="/shop_img/clean.jpg"></div>
          </div>
        </a>
        <a href="{{url('/computers')}}">
          <div class="equipment">
            <div class="border"></div>
            <div class="up">
              <div class="title">办公设备</div>
              <div class="detail">租电脑 零押金</div>
            </div>
            <div><img src="/shop_img/equipment.jpg"></div>
          </div>
        </a>
        <a href="{{url('/plants')}}">
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
        <a href="{{url('/business_taxes')}}"><div><img src="/shop_img/index_first.jpg" alt=""></div></a>
        <div class="first_right">
          <div class="small_scale">
            <a href="{{url('/business_taxes/1')}}">
              <div class="small_scale_up">
                <div class="small_scale_title">小规模纳税人 代理记账</div>
                <div class="small_scale_detail">30项代账服务 满足您的账务需求</div>
                <img src="/shop_img/index_first_01.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
            <a href="{{url('/business_taxes/1')}}">
              <div class="small_scale_up">
                <div class="small_scale_title">年度财务报表审计</div>
                <div class="small_scale_detail">专业财务审计意见，满足第三方的要求</div>
                <img src="/shop_img/index_first_04.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
          </div>
          <div class="small_scale">
            <a href="{{url('/business_taxes/1')}}">
              <div class="small_scale_up">
                <div class="small_scale_title">一般纳税人 代理记账</div>
                <div class="small_scale_detail">五对一 省钱又省心</div>
                <img src="/shop_img/index_first_02.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
            <a href="{{url('/business_taxes/1')}}">
              <div class="small_scale_up">
                <div class="small_scale_title">税审</div>
                <div class="small_scale_detail">12年专业经验 为您服务</div>
                <img src="/shop_img/index_first_05.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
          </div>
          <div class="small_scale">
            <a href="{{url('/business_taxes/1')}}">
              <div class="small_scale_up">
                <div class="small_scale_title">税务筹划</div>
                <div class="small_scale_detail">为企业提供合法合规财税优惠服务</div>
                <img src="/shop_img/index_first_03.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
            <a href="{{url('/business_taxes/1')}}">
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
        <a href="{{url('/computers?labels=15')}}"><img src="/shop_img/index_second_01.jpg" alt=""></a>
        <div class="second_right">
          <a href="{{url('/computers?labels=14')}}">
            <div class="seconde_work">
              <img src="/shop_img/index_second_02.jpg" alt="">
              <div class="seconde_work_title">电脑租赁</div>
              <div class="seconde_work_detail">免押金 一台起租 随租随还</div>
            </div>
          </a>
          <a href="{{url('/computers?labels=17')}}">
            <div class="seconde_work">
              <img src="/shop_img/index_second_03.jpg" alt="">
              <div class="seconde_work_title">打印复印</div>
              <div class="seconde_work_detail">全包服务</div>
            </div>
          </a>
          <a href="{{url('/computers?labels=15')}}">
            <div class="seconde_work">
              <img src="/shop_img/index_second_04.jpg" alt="">
              <div class="seconde_work_title">一体机租赁</div>
              <div class="seconde_work_detail">苹果一体机  设计专用</div>
            </div>
          </a>
          <a href="{{url('/computers?labels=16')}}">
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
        <a href="{{url('/cleanup')}}"><img src="/shop_img/index_third_01.jpg" alt=""></a>
        <div class="third_right">
          <a href="{{url('/cleanup')}}">
            <div class="seconde_work">
              <img src="/shop_img/index_third_02.jpg" alt="">
              <div class="seconde_work_title">保洁服务</div>
              <div class="seconde_work_detail">日常开荒  全面服务</div>
            </div>
          </a>
          <a href="{{url('/water')}}">
            <div class="seconde_work">
              <img src="/shop_img/index_third_03.jpg" alt="">
              <div class="seconde_work_title">桶装水</div>
              <div class="seconde_work_detail">景田  极速达  无押金</div>
            </div>
          </a>
          <a href="{{url('/plants')}}">
            <div class="seconde_work">
              <img src="/shop_img/index_third_04.jpg" alt="">
              <div class="seconde_work_title">绿植服务</div>
              <div class="seconde_work_detail">租赁买卖  品种多样</div>
            </div>
          </a>
          <a href="{{URL('/houseMv')}}">
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
        <a href="{{url('/furniture')}}"><div><img src="/shop_img/index_four_01.jpg" alt=""></div></a>
        <div class="four_right">
          <div class="small_scale">
            <a href="{{url('/furniture?labels=42')}}">
              <div class="small_scale_up">
                <div class="small_scale_title">班台</div>
                <div class="small_scale_detail">品质承诺，上门安装</div>
                <img src="/shop_img/index_four_02.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
            <a href="{{url('/furniture?labels=47')}}">
              <div class="small_scale_up">
                <div class="small_scale_title">前台</div>
                <div class="small_scale_detail">品质承诺，上门安装</div>
                <img src="/shop_img/index_four_05.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
          </div>
          <div class="small_scale">
            <a href="{{url('/furniture?labels=46')}}">
              <div class="small_scale_up">
                <div class="small_scale_title">办公沙发</div>
                <div class="small_scale_detail">品质承诺，上门安装</div>
                <img src="/shop_img/index_four_03.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
            <a href="{{url('/furniture?labels=45')}}">
              <div class="small_scale_up">
                <div class="small_scale_title">资料柜</div>
                <div class="small_scale_detail">品质承诺，上门安装</div>
                <img src="/shop_img/index_four_06.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
          </div>
          <div class="small_scale">
            <a href="{{url('/furniture?labels=43')}}">
              <div class="small_scale_up">
                <div class="small_scale_title">会议桌</div>
                <div class="small_scale_detail">品质承诺，上门安装</div>
                <img src="/shop_img/index_four_04.jpg" alt="">
              </div>
            </a>
            <div class="small_scale_border"></div>
            <a href="{{url('/furniture?labels=49')}}">
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
            <a href="{{url('/companyDecorat')}}"><div class="check">立即查看</div></a>
          </div>
        </div>
        <a href="{{url('/wiring')}}">
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
        <a href="{{url('/computers')}}">
          <div><img src="/shop_img/index_sale_model_01.jpg" alt=""></div>
        </a>
        <div class="sale_model_right">
          <div class="modeFirst">
            <a href="{{url('/computers/1')}}">
              <div class="modeBox">
                <div class="modeTitle">Apple iPad 9.7英寸平板电脑</div>
                <div class="modeDetail">方寸间 乐趣全开</div>
                <div class="price">
                  <div class="unitPrice">¥ 99/月</div>
                  <div><img src="/shop_img/index_sale_model_02.jpg" alt=""></div>
                </div>
              </div>
            </a>
            <a href="{{url('/computers/2')}}">
              <div class="modeBox">
                <div class="modeTitle">全新 联想/Lenovo 启天M410</div>
                <div class="modeDetail">主动商务，高效易用</div>
                <div class="price">
                  <div class="unitPrice">¥ 99/月</div>
                  <div><img src="/shop_img/index_sale_model_03.jpg" alt=""></div>
                </div>
              </div>
            </a>
          </div>
          <a href="{{url('/computers/3')}}">
            <div class="modelSecond">
              <div class="modeTitle">新一代成铭 3980</div>
                <div class="modeDetail">专属定制 低价高效</div>
                <div class="unitPrice">¥ 99/月</div>
                <div><img src="/shop_img/index_sale_model_04.jpg" alt=""></div>
            </div>
          </a>
          <div class="modeThird">
            <a href="{{url('/computers/4')}}">
              <div class="modeBox">
                <div class="modeTitle">Apple iPad 9.7英寸平板电脑</div>
                <div class="modeDetail">方寸间 乐趣全开</div>
                <div class="price">
                  <div><img src="/shop_img/index_sale_model_05.jpg" alt=""></div>
                  <div class="unitPrice">¥ 99/月</div>
                </div>
              </div>
            </a>
            <a href="{{url('/computers/5')}}">
              <div class="modeBox">
                <div class="modeTitle">Apple iPad 9.7英寸平板电脑</div>
                <div class="modeDetail">方寸间 乐趣全开</div>
                <div class="price">
                  <div><img src="/shop_img/index_sale_model_06.jpg" alt=""></div>
                  <div class="unitPrice">¥ 99/月</div>
                </div>
              </div>
            </a>
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
        <a href="{{url('/plants')}}">
          <div><img src="/shop_img/index_sale_plants_01.jpg" alt=""></div>
        </a>
        <div class="sale_model_right">
          <div class="modeFirst">
            <a href="{{url('/plants/1')}}">
              <div class="modeBox">
                <div class="modeTitle">Apple iPad 9.7英寸平板电脑</div>
                <div class="modeDetail">方寸间 乐趣全开</div>
                <div class="price">
                  <div class="unitPrice">¥ 99/月</div>
                  <div><img src="/shop_img/index_sale_plants_02.jpg" alt=""></div>
                </div>
              </div>
            </a>
            <a href="{{url('/plants/2')}}">
              <div class="modeBox">
                <div class="modeTitle">全新 联想/Lenovo 启天M410</div>
                <div class="modeDetail">主动商务，高效易用</div>
                <div class="price">
                  <div class="unitPrice">¥ 99/月</div>
                  <div><img src="/shop_img/index_sale_plants_03.jpg" alt=""></div>
                </div>
              </div>
            </a>
          </div>
          <a href="{{url('/plants/3')}}">
            <div class="modelSecond">
              <div class="modeTitle">新一代成铭 3980</div>
              <div class="modeDetail">专属定制 低价高效</div>
              <div class="unitPrice">¥ 99/月</div>
              <div><img src="/shop_img/index_sale_plants_04.jpg" alt=""></div>
            </div>
          </a>
          <div class="modeThird">
            <a href="{{url('/plants/4')}}">
              <div class="modeBox">
                <div class="modeTitle">Apple iPad 9.7英寸平板电脑</div>
                <div class="modeDetail">方寸间 乐趣全开</div>
                <div class="price">
                  <div><img src="/shop_img/index_sale_plants_05.jpg" alt=""></div>
                  <div class="unitPrice">¥ 99/月</div>
                </div>
              </div>
            </a>
            <a href="{{url('/plants/5')}}">
              <div class="modeBox">
                <div class="modeTitle">Apple iPad 9.7英寸平板电脑</div>
                <div class="modeDetail">方寸间 乐趣全开</div>
                <div class="price">
                  <div><img src="/shop_img/index_sale_plants_06.jpg" alt=""></div>
                  <div class="unitPrice">¥ 99/月</div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- 客服 -->
    <div class="customService">
      <img class="customServicePic" src="/shop_img/custom_service.png" alt="">
      <div class="customBox">
        <ul>
          <li class="find">没有找到合适的企业服务?</li>
          <li class="free">免费咨询 , 立即回复</li>
        </ul>
        <div class="consult">
          <div>
            <input type="text" placeholder="请输入电话号码">
            <div class="error"><img src="/shop_img/alert.svg"> <div>手机号码格式错误</div></div>
          </div>
          <button>立即预约</button>
        </div>
      </div>
    </div>
    <!-- 优势 -->
    <div class="better"><div style="background:url(/shop_img/index_better.jpg) no-repeat"></div></div>
    <!-- 楼梯导航 -->
    <div class="elevator">
      <ul class="elevator_list">
        <li class="louti active">工商财税</li>
        <li class="louti">办公设备</li>
        <li class="louti">入驻服务</li>
        <li class="louti">办公家具</li>
        <li class="louti">装修服务</li>
        <li class="louti">热销机型</li>
        <li class="louti">热销绿植</li>
        <li class="backTop">
          <ul>
            <!-- <li class="top">在线客服</li> -->
            <li class="top js_backTop"><div><img src="/shop_img/index_up.png" alt=""></div>顶部</li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  @include('home.footer')
@endsection
@section('script')
<script src='/js/shop_index.js'></script>
@endsection