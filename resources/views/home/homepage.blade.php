@extends('home.layouts.layout')
@section('title', '首页')
@section('header')
  <link rel="stylesheet" href="/css/home_page.css">
@endsection
@section('body')
  <div class="container_box">
    <!--搜索区域-->
    <div class="search_area">
      <div class="search_box">
        <div class="search_title">找写字楼，就上楚楼网</div>
        <div class="search_inp clearfix">
          <input type="text" placeholder="搜索关键词" class="f_l">
          <button class="check_right f_l">马上找房</button>
          <button class="check_map">地图找房</button>
        </div>
        <div class="result">
          <div class="result_area">区域:
            <a href="javascript:void(0);">洪山</a>
            <a href="javascript:void(0);">武昌</a>
            <a href="javascript:void(0);">江汉</a>
            <a href="javascript:void(0);">汉阳</a>
            <a href="javascript:void(0);">江岸</a>
            <a href="javascript:void(0);">江夏</a>
            <a href="javascript:void(0);">东西湖</a>
            <a href="javascript:void(0);">沌口</a>
            <a href="javascript:void(0);">硚口</a>
            <a href="javascript:void(0);">更多>></a>
          </div>
          <div class="result_acverge">面积:
          <a href="javascript:void(0);">100m²以下</a>
            <a href="javascript:void(0);">100-200m²</a>
            <a href="javascript:void(0);">200-300m²</a>
            <a href="javascript:void(0);">300-500m²</a>
            <a href="javascript:void(0);">500-700m²</a>
            <a href="javascript:void(0);">700-1000m²</a>
            <a href="javascript:void(0);">1000m²以上</a>
          </div>
          <div class="result_price">价格:
          <a href="javascript:void(0);">0-40元/m²·月</a>
            <a href="javascript:void(0);">40-60元/m²·月</a>
            <a href="javascript:void(0);">60-80元/m²·月</a>
            <a href="javascript:void(0);">8-120元/m²·月</a>
            <a href="javascript:void(0);">120-140元/m²·月</a>
            <a href="javascript:void(0);">140元/m²·月以上</a>
          </div>
        </div>
      </div>
    </div>
    <!--企业重点-->
    <div class="company_point">
      <div class="point_box">
        <div class="detail clearfix">
          <div class="detail_circle  f_l"></div>
          <div class="detail_article f_l">
            <span>100%真实房源</span>
          </div>
        </div>
        <div class="detail clearfix">
          <div class="detail_circle f_l">
           
          </div>
          <div class="detail_article f_l">
            <span>细化筛选</span>
          </div>
        </div>
        <div class="detail clearfix">
          <div class="detail_circle  f_l">
            
          </div>
          <div class="detail_article f_l">
            <span>贵宾服务</span>
          </div>
        </div>
        <div class="detail clearfix">
          <div class="detail_circle  f_l"></div>
          <div class="detail_article f_l">
            <span>增值服务</span>
          </div>
        </div>
      </div>
    </div>
    <!--企业服务-->
    <div class="company_serve">
      <div class="serve_title">
        <div class="serve_title_1">企业服务</div>
        <div class="line"></div>
        <div class="serve_title_2">让办公更舒心</div>
      </div>
      <div class="serve_details">
        <a href="javascript:void(0);">
          <div class="serve_detail f_l">
            <div class="icon"></div>
            <div>工商财税</div>
          </div>
        </a>
        <a href="javascript:void(0);">
          <div class="serve_detail f_l">
            <div class="icon"></div>
            <div>工商财税</div>
          </div>
        </a>
        <a href="javascript:void(0);">
          <div class="serve_detail f_l">
            <div class="icon"></div>
            <div>工商财税</div>
          </div>
        </a>
        <a href="javascript:void(0);">
          <div class="serve_detail f_l">
            <div class="icon"></div>
            <div>工商财税</div>
          </div>
        </a>
        <a href="javascript:void(0);">
          <div class="serve_detail f_l">
            <div class="icon"></div>
            <div>工商财税</div>
          </div>
        </a>
        <a href="javascript:void(0);">
          <div class="serve_detail f_l">
            <div class="icon"></div>
            <div>工商财税</div>
          </div>
        </a>
      </div>
    </div>
    <!--核心商圈-->
    <div class="trading_area">
      <div class="title_box clearfix">
        <div class="title_left f_l">
          <span class="title_head">
            核心商圈
          </span>
          <span class="title_detail">
            /享优质配套与大咖公司为邻
          </span>
        </div>
        <div class="title_right f_r">
          <a href="javascript:void(0);"class="get_more">查看全部＞</a>
        </div>
      </div>
      <div class="content_box clearfix">
        <a href="javascript:void(0);">
          <div class="detail">
            <div class="img_box">
              <img src="/we_img/house_acute.png" style="height:100%">
            </div>
            <div class="describe">
              <div class="describe_title">光谷</div>
              <div class="describe_acute"></div>
            </div>
          </div>
        </a>
        <a href="javascript:void(0);">
          <div class="detail">
            <div class="img_box">
              <img src="/we_img/house_acute.png" style="height:100%">
            </div>
            <div class="describe">
              <div class="describe_title">光谷</div>
              <div class="describe_acute"></div>
            </div>
          </div>
        </a>
        <a href="javascript:void(0);">
          <div class="detail">
            <div class="img_box">
              <img src="/we_img/house_acute.png" style="height:100%">
            </div>
            <div class="describe">
              <div class="describe_title">光谷</div>
              <div class="describe_acute"></div>
            </div>
          </div>
        </a>
        <a href="javascript:void(0);">
          <div class="detail">
            <div class="img_box">
              <img src="/we_img/house_acute.png" style="height:100%">
            </div>
            <div class="describe">
              <div class="describe_title">光谷</div>
              <div class="describe_acute"></div>
            </div>
          </div>
        </a>
        <div class="detail">
          <div class="img_box">
            <img src="/we_img/house_acute.png" style="height:100%">
          </div>
          <div class="describe">
            <div class="describe_title">光谷</div>
            <div class="describe_acute"></div>
          </div>
        </div>
      </div>
    </div>
    <!--精选专题-->
    <div class="classify">
      <div class="title_box">
        <div class="title_left f_l">
          <span class="title_head">
            精选专题
          </span>
          <span class="title_detail">
            /优质写字楼 聚你所需 
          </span>
        </div>
        <div class="title_right f_r">
          <a href="javascript:void(0);"class="get_more">查看全部＞</a>
        </div>
      </div>
      <div class="content_box clearfix">
        <div class="left_box f_l"></div>
        <div class="right_box f_r">
          <div class="right_head clearfix">
            <div class="head_left f_l"></div>
            <div class="head_right f_r"></div>
          </div>
          <div class="right_bottom clearfix">
            <div class="bottom_left f_l"></div>
            <div class="bottom_right f_r"></div>
          </div>
        </div>
      </div>
    </div>
    <!--精品写字楼-->
    <div class="jingpin">
      <div class="title_box">
        <div class="title_left f_l">
          <span class="title_head">
            精品写字楼
          </span>
          <span class="title_detail">
            /配套成熟，量身定制
          </span>
        </div>
        <div class="title_right f_r">
          <a href="javascript:void(0);"class="get_more">查看全部＞</a>
        </div>
      </div>
      <div class="content_box">
        <div class="top">
          <div class="item">
            <a href="javascript:void(0);">
              <div class="img_box">
                <img src="/we_img/house_acute.png" alt="房源图片">
              </div>
            </a>
            <div class="house_acute">
              <div class="house_title clearfix">
                <span class="house_name f_l">光谷新世界</span>
                <span class="house_price f_r"><span class="price">55-90</span>元/m²⋅月</span>
              </div>
              <div class="house_describe">
                光谷位于洪山，江夏区境内，地段好、高等院校林立，科研机构众多，被国务院确立为大众...
              </div>
              <div class="house_location">
                <span class="icon_loaction"><img src="/we_img/house_detail_address.png" alt="" style="width:8px;"></span>
                江夏区-东湖高新
              </div>
              <div class="house_special">
                <ul class="clearfix">
                  <li class="f_l">可注册</li>
                  <li class="f_l">地铁10分钟</li>
                  <li class="f_l">地标建筑</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <a href="javascript:void(0);">
              <div class="img_box">
                <img src="/we_img/house_acute.png" alt="房源图片">
              </div>
            </a>
            <div class="house_acute">
              <div class="house_title clearfix">
                <span class="house_name f_l">光谷新世界</span>
                <span class="house_price f_r"><span class="price">55-90</span>元/m²⋅月</span>
              </div>
              <div class="house_describe">
                光谷位于洪山，江夏区境内，地段好、高等院校林立，科研机构众多，被国务院确立为大众...
              </div>
              <div class="house_location">
                <span class="icon_loaction"><img src="/we_img/house_detail_address.png" alt="" style="width:8px;"></span>
                江夏区-东湖高新
              </div>
              <div class="house_special">
                <ul class="clearfix">
                  <li class="f_l">可注册</li>
                  <li class="f_l">地铁10分钟</li>
                  <li class="f_l">地标建筑</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <a href="javascript:void(0);">
              <div class="img_box">
                <img src="/we_img/house_acute.png" alt="房源图片">
              </div>
            </a>
            <div class="house_acute">
              <div class="house_title clearfix">
                <span class="house_name f_l">光谷新世界</span>
                <span class="house_price f_r"><span class="price">55-90</span>元/m²⋅月</span>
              </div>
              <div class="house_describe">
                光谷位于洪山，江夏区境内，地段好、高等院校林立，科研机构众多，被国务院确立为大众...
              </div>
              <div class="house_location">
                <span class="icon_loaction"><img src="/we_img/house_detail_address.png" alt="" style="width:8px;"></span>
                江夏区-东湖高新
              </div>
              <div class="house_special">
                <ul class="clearfix">
                  <li class="f_l">可注册</li>
                  <li class="f_l">地铁10分钟</li>
                  <li class="f_l">地标建筑</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="bottom">
          <div class="item">
            <a href="javascript:void(0);">
              <div class="img_box">
                <img src="/we_img/house_acute.png" alt="房源图片">
              </div>
            </a>
            <div class="house_acute">
              <div class="house_title clearfix">
                <span class="house_name f_l">光谷新世界</span>
                <span class="house_price f_r"><span class="price">55-90</span>元/m²⋅月</span>
              </div>
              <div class="house_describe">
                光谷位于洪山，江夏区境内，地段好、高等院校林立，科研机构众多，被国务院确立为大众...
              </div>
              <div class="house_location">
                <span class="icon_loaction"><img src="/we_img/house_detail_address.png" alt="" style="width:8px;"></span>
                江夏区-东湖高新
              </div>
              <div class="house_special">
                <ul class="clearfix">
                  <li class="f_l">可注册</li>
                  <li class="f_l">地铁10分钟</li>
                  <li class="f_l">地标建筑</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <a href="javascript:void(0);">
              <div class="img_box">
                <img src="/we_img/house_acute.png" alt="房源图片">
              </div>
            </a>
            <div class="house_acute">
              <div class="house_title clearfix">
                <span class="house_name f_l">光谷新世界</span>
                <span class="house_price f_r"><span class="price">55-90</span>元/m²⋅月</span>
              </div>
              <div class="house_describe">
                光谷位于洪山，江夏区境内，地段好、高等院校林立，科研机构众多，被国务院确立为大众...
              </div>
              <div class="house_location">
                <span class="icon_loaction"><img src="/we_img/house_detail_address.png" alt="" style="width:8px;"></span>
                江夏区-东湖高新
              </div>
              <div class="house_special">
                <ul class="clearfix">
                  <li class="f_l">可注册</li>
                  <li class="f_l">地铁10分钟</li>
                  <li class="f_l">地标建筑</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <a href="javascript:void(0);">
              <div class="img_box">
                <img src="/we_img/house_acute.png" alt="房源图片">
              </div>
            </a>
            <div class="house_acute">
              <div class="house_title clearfix">
                <span class="house_name f_l">光谷新世界</span>
                <span class="house_price f_r"><span class="price">55-90</span>元/m²⋅月</span>
              </div>
              <div class="house_describe">
                光谷位于洪山，江夏区境内，地段好、高等院校林立，科研机构众多，被国务院确立为大众...
              </div>
              <div class="house_location">
                <span class="icon_loaction"><img src="/we_img/house_detail_address.png" alt="" style="width:8px;"></span>
                江夏区-东湖高新
              </div>
              <div class="house_special">
                <ul class="clearfix">
                  <li class="f_l">可注册</li>
                  <li class="f_l">地铁10分钟</li>
                  <li class="f_l">地标建筑</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--联合办公-->
    <div class="cooperation">
      <div class="title_box">
        <div class="title_left f_l">
          <span class="title_head">
            联合办公
          </span>
          <span class="title_detail">
            /设施齐全，入驻即开工，休闲多样，助办公更高效
          </span>
        </div>
        <div class="title_right f_r">
          <a href="javascript:void(0);" class="get_more">查看全部＞</a>
        </div>
      </div>
      <div class="content_box clearfix">
        <div class="left_show f_l">
          <div class="left_title clearfix">
            <span>美百年</span>服务项
            <a href="javascript:void(0);"><div class="right_arrow f_r">＞</div></a>
          </div>
          <div class="left_content">
            <ul class="clearfix">
              <a href="javascript:void(0);">
                <li>
                  <div class="icon">
                    <img src="/we_img/wifi_img.png" alt="">
                  </div>
                  <div class="icon_name">无线wifi</div>
                </li>
              </a>
              <a href="javascript:void(0);">
                <li>
                  <div class="icon">
                    <img src="/we_img/coff_icon.png" alt="">
                  </div>
                  <div class="icon_name">免费咖啡茶饮</div>
                </li>
              </a>
              <a href="javascript:void(0);">
                <li>
                  <div class="icon">
                    <img src="/we_img/meeting_icon.png" alt="">
                  </div>
                  <div class="icon_name">会议室</div>
                </li>
              </a>
              <a href="javascript:void(0);">
                <li>
                  <div class="icon">
                    <img src="/we_img/airClean_icon.png" alt="">
                  </div>
                  <div class="icon_name">空气净化系统</div>
                </li>
              </a>
              <a href="javascript:void(0);">
                <li>
                  <div class="icon">
                    <img src="/we_img/qiantai_icon.png" alt="">
                  </div>
                  <div class="icon_name">前台服务</div>
                </li>
              </a>
              <a href="javascript:void(0);">
                <li>
                  <div class="icon">
                    <img src="/we_img/commit_icon.png" alt="">
                  </div>
                  <div class="icon_name">社区团队支持</div>
                </li>
              </a>
              <a href="javascript:void(0);">
                <li>
                  <div class="icon">
                    <img src="/we_img/secuty_icon.png" alt="">
                  </div>
                  <div class="icon_name">7x24保安服务</div>
                </li>
              </a>
              <a href="javascript:void(0);">
                <li>
                  <div class="icon">
                    <img src="/we_img/cleaning_icon.png" alt="">
                  </div>
                  <div class="icon_name">保洁服务</div>
                </li>
              </a>
              <a href="javascript:void(0);">
                <li>
                  <div class="icon">
                    <img src="/we_img/send_icon.png" alt="">
                  </div>
                  <div class="icon_name">快递服务</div>
                </li>
              </a>
              <a href="javascript:void(0);">
                <li>
                  <div class="icon">
                    <img src="/we_img/playRoom_icon.png" alt="">
                  </div>
                  <div class="icon_name">路演厅</div>
                </li>
              </a>
              <a href="javascript:void(0);">
                <li>
                  <div class="icon">
                    <img src="/we_img/wifi_img.png" alt="">
                  </div>
                  <div class="icon_name">无线wifi</div>
                </li>
              </a>
              <a href="javascript:void(0);">
                <li>
                  <div class="icon">
                    <img src="/we_img/copy_icon.png" alt="">
                  </div>
                  <div class="icon_name">智能云打印</div>
                </li>
              </a>
              <a href="javascript:void(0);">
                <li>
                  <div class="icon">
                    <img src="/we_img/code_icon.png" alt="">
                  </div>
                  <div class="icon_name">VRN空调服务</div>
                </li>
              </a>
            </ul>
          </div>
        </div>
        <div class="right f_r swiper-container" id="banner">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="/we_img/house_detail_banner01.jpg" alt="">
            </div>
            <div class="swiper-slide">
              <img src="/we_img/house_detail_banner02.jpg" alt="">  
            </div>
            <div class="swiper-slide">
              <img src="/we_img/house_detail_banner03.jpg" alt="">
            </div>
            <div class="swiper-slide">
              <img src="/we_img/house_detail_banner04.jpg" alt="">
            </div>
          </div>
          <div class="swiper-pagination">
            
          </div>
        </div>
      </div>
    </div>
    <!--企业服务-->
    <div class="company_service">
      <div class="title_box">
        <div class="title_left f_l">
          <span class="title_head">
            企业服务
          </span>
          <span class="title_detail">
            /让办公更舒心
          </span>
        </div>
        <div class="title_right f_r">
          <a href="javascript:void(0);" class="get_more">查看全部＞</a>
        </div>
      </div>
      <div class="content_box clearfix">
        <div class="item f_l">
          <a href="javascript:void(0);">
            <div class="item_title">绿植服务</div>
            <div class="item_describe">让办公更舒心</div>
            <div class="item_line"></div>
            <div class="item_price"><span>55-90</span>元/盆/月</div>
          </a>
        </div>
        <div class="item f_l">
          <a href="javascript:void(0);">
            <div class="item_title">绿植服务</div>
            <div class="item_describe">让办公更舒心</div>
            <div class="item_line"></div>
            <div class="item_price"><span>55-90</span>元/盆/月</div>
          </a>
        </div>
        <div class="item f_l">
          <a href="javascript:void(0);">
            <div class="item_title">绿植服务</div>
            <div class="item_describe">让办公更舒心</div>
            <div class="item_line"></div>
            <div class="item_price"><span>55-90</span>元/盆/月</div>
          </a>
        </div>
        <div class="item f_l">
          <a href="javascript:void(0);">
            <div class="item_title">搬家服务</div>
            <div class="item_describe">让办公更舒心</div>
            <div class="item_line"></div>
            <div class="item_price"><span>300</span>元/次</div>
          </a>
        </div>
      </div>
    </div>
    <!--功能-->
    <div class="function">
      <div class="function_area clearfix">
        <div class="lease f_l">
          <a href="javascript:void(0);">
            委托找房
          </a>
        </div>
        <div class="line"></div>
        <div class="rent f_r">
          <a href="javascript:void(0);">
            投放房源
          </a>
        </div>
      </div> 
    </div>
    <!--资讯中心-->
    <!--<div class="news">
      <div class="title_box">
        <div class="title_left f_l">
          <span class="title_head">
            资讯中心
          </span>
          <span class="title_detail">
            /让办公更舒心
          </span>
        </div>
        <div class="title_right f_r">
          <a href="javascript:void(0);" class="get_more">查看全部＞</a>
        </div>
      </div>
    </div>-->
    <!--底部-->
    
  </div>
@endsection
@section('script')
  <script src="/js/home_manifest.js"></script>
  <script src="/js/home_vendor.js"></script>
  <script src="/js/home_page.js"></script>
@endsection
